<?php

require_once 'file:///Applications/XAMPP/xamppfiles/lib/php/includes/' .
    'reader/config.inc.php';

require_once 'file:///Applications/XAMPP/xamppfiles/lib/php/includes/' .
    'reader/connection.inc.php';

// Authenticate a user whose information is stored in a database.
// Establish a connection to the database.
$conn = dbConnect('read');
// Get the user details from the database.
$sql = 'SELECT salt, pwd FROM users WHERE username = ?';

// Init and prepared statement.
$stmt = $conn->stmt_init();
$stmt->prepare($sql);
$stmt->bind_param('s', $username);
$stmt->bind_result($salt, $storedPwd);
$stmt->execute();
$stmt->fetch();

// Validate the results of the query.
// Encrypt the submitted password with the salt and
// compare it with the stored password.
if (sha1($password . $salt) == $storedPwd) {

    // Generate a new session.
    $_SESSION['authenticated'] = 'LittleCharlie';
    // Get the time the session started/
    $_SESSION['start'] = time();
    session_regenerate_id();
    header("Location: $redirect");
    exit;

} else {

    $error = 'Invalid username or password.';
}
