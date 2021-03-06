<?php

// Start the sesssion and protect access to the page.
session_start();
ob_start();

// Set a time limit in seconds.
$timelimit = 600;

// Get the current time.
$now = time();

// Redirect if timeout occurs.
$redirect = 'http://localhost/reader/reader_login.php';

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
