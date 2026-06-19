<?php

/**
 * Base URLs for the three Dig4E course sites.
 *
 * Production uses image/audio/video.dig4e.com. On localhost (or 127.0.0.1),
 * uses sibling folder names under the same host and port as this hub site.
 */

function dig4e_is_local_request() {
    $host = $_SERVER['HTTP_HOST'] ?? '';
    $host_only = preg_replace('/:\d+$/', '', $host);
    return in_array($host_only, array('localhost', '127.0.0.1'), true);
}

function dig4e_request_root() {
    $scheme = (! empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
    $host = $_SERVER['HTTP_HOST'] ?? 'localhost';
    return $scheme . '://' . $host;
}

function dig4e_course_bases() {
    static $bases = null;
    if ( $bases !== null ) {
        return $bases;
    }

    if ( dig4e_is_local_request() ) {
        $root = dig4e_request_root();
        $bases = array(
            'imaging' => $root . '/dig4e_imaging',
            'audio'   => $root . '/dig4e_audio',
            'video'   => $root . '/dig4e_video',
        );
    } else {
        $bases = array(
            'imaging' => 'https://image.dig4e.com',
            'audio'   => 'https://audio.dig4e.com',
            'video'   => 'https://video.dig4e.com',
        );
    }

    return $bases;
}

function dig4e_course_url($site, $path = '') {
    $bases = dig4e_course_bases();
    if ( ! isset($bases[$site]) ) {
        return '';
    }
    $base = rtrim($bases[$site], '/');
    if ( $path === '' ) {
        return $base;
    }
    return $base . '/' . ltrim($path, '/');
}
