<?php

require_once 'file:///Applications/XAMPP/xamppfiles/lib/php/includes/' .
    'reader/setup.php';

require_once 'file:///Applications/XAMPP/xamppfiles/lib/php/includes/' .
    'reader/config.inc.php';

require_once $inc_path . 'session_timeout.inc.php';

require_once $inc_path . 'connection.inc.php';

require $inc_path . 'logout.inc.php';

require $inc_path . 'functions.php';

// insert
if (isset($_POST['insert'])) {

    header('Location: blog_post.php');
    exit;
}

// view
if (isset($_POST['view'])) {

    header('Location: ../reader.php');
    exit;
}

$smarty = new Reader();
$smarty->assign('reader_date', $reader_date);
$smarty->assign('reader_yrs', copyrightYears());
$smarty->assign('entries_read', dbConnectRead());

// $smarty->debugging = true;
$smarty->display('blog_list.tpl');

?>
