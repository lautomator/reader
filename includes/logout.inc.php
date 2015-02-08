<?php

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
    header('Location: http://automaton.host-ed.me/reader/reader_login.php');
}
?>

<!--// Logout form: //-->
<form id="logoutForm" method="post" action="">
    <input name="logout" type="submit" id="logout"
    value="Logout">
</form>
