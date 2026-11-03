<?php
if ( ! isset($CFG) ) {
    http_response_code(404);
    exit;
}

/**
 * Site settings for the Dig4E hub. Included at the end of tsugi/config.php.
 * Secrets and the local database live in tsugi/config.php, which is not in git.
 */

$CFG->servicename = 'Dig4E';
$CFG->servicedesc = 'Digitization for Everybody';
$CFG->context_title = 'Digitization for Everybody';

$CFG->ownername = 'Dig4E';
$CFG->owneremail = 'Dig4Everybody@umich.edu';
$CFG->providekeys = true;

$CFG->privacy_url = $CFG->apphome . '/privacy';

// Michigan blue, matching the hub navigation.
$CFG->theme = array(
    "primary" => "#00274C",
    "secondary" => "#EEEEEE",
    "text" => "#111111",
    "text-light" => "#5E5E5E",
    "font-url" => "https://fonts.googleapis.com/css2?family=Source+Sans+3:wght@400;600;700",
    "font-family" => "'Source Sans 3', Corbel, Avenir, 'Lucida Grande', 'Lucida Sans', sans-serif",
    "font-size" => "16px",
);

$CFG->tool_folders = array("../tools", "../mod", "admin", "tool");
$CFG->install_folder = $CFG->dirroot.'/../mod';

$CFG->google_login_redirect = $CFG->apphome . "/login";

// The hub is a catalog of manifest courses (imaging, audio, video).
$CFG->show_courses_widget = true;
$CFG->show_course_catalog = true;

$CFG->sessionlifetime = 18*60*60;

$CFG->top_menu_callback = function() {
    global $CFG;
    $buildmenu = $CFG->dirroot.'/../buildmenu.php';
    if ( ! file_exists($buildmenu) ) {
        return false;
    }
    require_once $buildmenu;
    return buildMenu();
};
