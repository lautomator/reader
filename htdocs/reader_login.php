<?php

require_once 'file:///Applications/XAMPP/xamppfiles/lib/php/includes/' .
    'reader/setup.php';

require_once 'file:///Applications/XAMPP/xamppfiles/lib/php/includes/' .
    'reader/config.inc.php';

require_once $inc_path . 'connection.inc.php';

require $inc_path . 'functions.php';

// // Session
if (isset($_POST['login'])) {

    session_start();

    // trim any leading or trailing whitespace.
    $username = trim($_POST['username']);

    // encrypt the password
    $password = trim($_POST['pwd']);

    // redirect upon succesfull login.
    $redirect = 'reader.php';

    // include the authenticaton script.
    include_once $inc_path . 'authenticate_mysqli.inc.php';
}

$smarty = new Reader();
$smarty->assign('reader_date', $reader_date);
$smarty->assign('reader_yrs', copyrightYears());
$smarty->assign('error', '');

// $smarty->debugging = true;
$smarty->display('login.tpl');

?>
