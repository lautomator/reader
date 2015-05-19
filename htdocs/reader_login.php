<?php

require_once 'file:///Applications/XAMPP/xamppfiles/lib/php/includes/' .
    'reader/setup.php';

require_once 'file:///Applications/XAMPP/xamppfiles/lib/php/includes/' .
    'reader/config.inc.php';

require_once $inc_path . 'connection.inc.php';

require $inc_path . 'functions.php';

$err = '';

// Session
if (isset($_POST['login'])) {

    session_start();

    // include the authenticaton script.
    include_once $inc_path . 'authenticate_mysqli.inc.php';

    // escape html chars
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['pwd']);
    
    if (!validatePwd($username, $password)) {
        $err = 'Invalid username or password.';
    }
}

$smarty = new Reader();
$smarty->assign('reader_date', $reader_date);
$smarty->assign('reader_yrs', copyrightYears());
$smarty->assign('error', $err);

// $smarty->debugging = true;
$smarty->display('login.tpl');

?>


