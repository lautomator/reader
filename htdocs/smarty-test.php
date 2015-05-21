<?php

require_once 'file:///Applications/XAMPP/xamppfiles/lib/php/includes/' .
    'reader/setup.php';

require_once 'file:///Applications/XAMPP/xamppfiles/lib/php/includes/' .
    'reader/config.inc.php';

require_once $inc_path . 'session_timeout.inc.php';

require_once $inc_path . 'connection.inc.php';

require $inc_path . 'functions.php';

// process the post TODO: this will be a function
if (isset($_POST['insert'])) {

    // Verify fields have been filled.
    if ($_POST['title'] || $_POST['article'] != null) {

        include_once $inc_path . 'connection.inc.php';

        $OK = false;
        $conn = dbConnect('write');
        $stmt = $conn->stmt_init();

        // Create SQL.
        $sql = 'INSERT INTO blog (title, article, created)
            VALUES(?, ?, NOW())';

        if ($stmt->prepare($sql)) {
            // Bind parameters and execute statement.
            $stmt->bind_param('ss', $_POST['title'], $_POST['article']);
            $stmt->execute();
            if ($stmt->affected_rows > 0) {

                $OK = true;

            }
        }

        // Redirect upon success or display error.
        if ($OK) {

            header('Location: blog_list.php');
            exit;

        } else {

            $error = $stmt->error;
        }
    } else {

        $error = "All fields must be completed.";
    }
}
// If the list entries button is pressed, redirect to the list page.
if (isset($_POST['list'])) {

    $proceed = true;
    header('Location: blog_list.php');
    exit;
}

// clear the form
// if (isset($_POST['clear'])) {
//  // TODO: need to implement javascript function in lieu of this.
// }


$smarty = new Reader();
$smarty->assign('err', $error);
$smarty->assign('reader_date', $reader_date);
$smarty->assign('reader_yrs', copyrightYears());

// $smarty->debugging = true;
$smarty->display('blog_post.tpl');

?>
