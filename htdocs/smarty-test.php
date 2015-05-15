<?php

// This page is being used to develop and test smarty templates

require_once 'file:///Applications/XAMPP/xamppfiles/lib/php/includes/' .
    'reader/setup.php';

require_once 'file:///Applications/XAMPP/xamppfiles/lib/php/includes/' .
    'reader/config.inc.php';

require_once $inc_path . 'connection.inc.php';

require $inc_path . 'functions.php';

$smarty = new Reader();
$smarty->assign('reader_date', $reader_date);
$smarty->assign('reader_yrs', copyrightYears());
$smarty->assign('entries_read', dbConnectRead());
// $smarty->assign('format_entries', format_paragraphs());

// $smarty->debugging = true;
$smarty->display('index.tpl');

?>
