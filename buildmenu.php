<?php

function buildMenu() {
    global $CFG, $USER;

    // Drop a leftover sandbox course so hub chrome stays on the site login.
    \Tsugi\Controllers\Courses::restoreSiteLoginContext();

    $home = rtrim($CFG->apphome, '/');
    $R = $home . '/';
    $T = $CFG->wwwroot . '/';

    $adminmenu = isset($_COOKIE['adminmenu']) && $_COOKIE['adminmenu'] == "true";
    $isInstructor = (isset($USER) && $USER && isset($USER->instructor) && $USER->instructor)
        || (isset($_SESSION['instructor']) && $_SESSION['instructor']);

    $set = new \Tsugi\UI\MenuSet();
    $set->setHome($CFG->servicename, $CFG->apphome);
    $set->addLeft('About', $R.'about');
    $set->addLeft('Catalog', $T.'catalog');

    if ( isset($_SESSION['id']) ) {
        $submenu = new \Tsugi\UI\Menu();
        $submenu->addLink('Profile', $R.'profile');
        $submenu->addLink('Announcements', $R.'announcements');
        $submenu->addLink('Grades', $R.'grades');
        $submenu->addLink('Pages', $R.'pages');
        $submenu->addLink('Files', $R.'files');
        $submenu->addLink('Discussions', $R.'discussions');
        if ( $isInstructor ) {
            $submenu->addLink('Notifications', $R.'notifications');
        }
        if ( \Tsugi\Controllers\Settings::showInMenu() ) {
            $submenu->addLink('Settings', $R.'settings');
        }
        $submenu->addLink('My Courses', $T.'courses');
        if ( isset($CFG->google_map_api_key) && $CFG->google_map_api_key ) {
            $submenu->addLink('Map', $R.'map');
        }
        $submenu->addLink('Privacy', $R.'privacy');
        if ( ! empty($CFG->providekeys) ) {
            $submenu->addLink('LMS Integration', $T . 'settings');
        }
        if ( isset($CFG->google_classroom_secret) && (int) ($_SESSION['gc_count'] ?? 0) > 0 ) {
            $submenu->addLink('Google Classes', $T.'gclass/courses');
        }
        if ( $adminmenu ) {
            $submenu->addLink('Administer', $T . 'admin/');
        }
        $submenu->addLink('Logout', $R.'logout');
        if ( isset($_SESSION['avatar']) ) {
            $set->addRight('<img src="'.$_SESSION['avatar'].'" alt="'.htmlentities(__('User Profile Menu - Includes logout')).'" style="height: 2em;"/>', $submenu);
        } else {
            $set->addRight(htmlentities($_SESSION['displayname']), $submenu);
        }

        $set->addRight(
            '<tsugi-notifications api-url="'. htmlspecialchars($T . 'api/notifications.php') . '" notifications-view-url="'. htmlspecialchars($R . 'notifications') . '" announcements-view-url="'. htmlspecialchars($R . 'announcements') . '"></tsugi-notifications>',
            false,
            true,
            'hidden-xs tsugi-wc-nav-item'
        );
        if ( \Tsugi\Controllers\Courses::showCoursesWidget() ) {
            $set->addRight(
                \Tsugi\Controllers\Catalog::coursesWidgetTag(),
                false,
                true,
                'hidden-xs tsugi-wc-nav-item'
            );
        }
    } else {
        $set->addRight('Login', $R.'login');
    }

    return $set;
}
