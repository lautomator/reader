<?php

require_once 'file:///Applications/XAMPP/xamppfiles/lib/php/includes/' .
    'reader/config.inc.php';

// Logout
if (isset($_POST['logout'])) {
    
    // Empty the session array.
    $_SESSION = array();
    
    // Invalidate the session cookie.
    if (isset($_COOKIE[session_name()])) {
        setcookie(session_name(), '', time()-86400, '/');
    }
    
    // End the session and redirect.
    session_destroy();
    
    // Redirect to the login page.
    header("Location: $home");
}
?>

<!--// Logout form: //-->
<form id="logoutForm" method="post" action="">
    <input name="logout" type="submit" id="logout"
    value="Logout">
</form>
