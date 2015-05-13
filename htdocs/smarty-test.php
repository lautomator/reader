<?php

require_once 'file:///Applications/XAMPP/xamppfiles/lib/php/includes/' .
    'reader/setup.php';

$smarty = new Reader();

$smarty->assign('name','John');

// //** un-comment the following line to show the debug console
$smarty->debugging = true;

$smarty->display('smarty-test.tpl');

?>