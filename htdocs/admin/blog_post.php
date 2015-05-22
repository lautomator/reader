<?php

require_once 'file:///Applications/XAMPP/xamppfiles/lib/php/includes/' .
    'reader/setup.php';

require_once 'file:///Applications/XAMPP/xamppfiles/lib/php/includes/' .
    'reader/config.inc.php';

require_once $inc_path . 'session_timeout.inc.php';

require_once $inc_path . 'connection.inc.php';

require $inc_path . 'functions.php';

$smarty = new Reader();
$smarty->assign('reader_date', $reader_date);
$smarty->assign('reader_yrs', copyrightYears());

// $smarty->debugging = true;
$smarty->display('blog_post.tpl');

// process the post
if (isset($_POST['insert'])) {

    // verify fields have been completed
    verifyFields($_POST['title'], $_POST['article']);
}

// if the cancel button is pressed, redirect to the list page
if (isset($_POST['list'])) {

    header('Location: blog_list.php');
    exit;
}

?>
