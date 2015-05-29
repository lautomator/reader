<?php

require_once 'file:///Applications/XAMPP/xamppfiles/lib/php/includes/' .
    'reader/config.inc.php';

// Start the sesssion and protect access to the page.
session_start();
ob_start();

// Set a time limit in seconds.
$timelimit = 1800;

// Get the current time.
$now = time();

// If the session var is not set, redirect back to the login page.
if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated']
    != 'LittleCharlie') {

    header("Location: $redirect");
    exit;

} elseif ($now > $_SESSION['start'] + $timelimit) {

    // Destroy the session.
    $_SESSION = array();
    // Invalidate the session cookie.

    if (isset($_COOKIE[session_name()])) {

    setcookie(session_name(), '', time() - 86400, '/');
    // End the session and redirect.
    session_destroy();

    header("Location: {$redirect}?expired=yes");
    exit;

    } else {

        // Update the start time, if not idle.
        $_SESSION['start'] = time();
    }
}
