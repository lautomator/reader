<?php

require_once 'file:///Applications/XAMPP/xamppfiles/lib/php/includes/' .
    'reader/setup.php';

require_once 'file:///Applications/XAMPP/xamppfiles/lib/php/includes/' .
    'reader/config.inc.php';

require $inc_path . 'functions.php';

$smarty = new Reader();

$smarty->assign('reader_date', $reader_date);
$smarty->assign('reader_yrs', copyrightYears());

// //** un-comment the following line to show the debug console
$smarty->debugging = true;

$smarty->display('base.tpl');

?>
