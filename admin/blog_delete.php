<?php

require_once 'file:///Applications/XAMPP/xamppfiles/lib/php/includes/' .
    'reader/config.inc.php';

require_once $inc_path . 'connection.inc.php';

$conn = dbConnect('write');

$OK = false;
$deleted = false;

$stmt = $conn->stmt_init();

// Get the details of a selcted record
if (isset($_GET['article_id']) && !$_POST) {

    // Prepare the query.
    $sql = 'SELECT article_id, title, article FROM blog WHERE article_id = ?';

    if ($stmt->prepare($sql)) {

        $stmt->bind_param('i', $_GET['article_id']);
        $stmt->bind_result($article_id, $title, $article);
        $OK = $stmt->execute();
        $stmt->fetch();
    }
}

// If the form has been submitted, prompt user, delete the record.
if (isset($_POST['delete'])) {

    // Update the query.
    $sql = 'DELETE FROM blog WHERE article_id = ?';
    if ($stmt->prepare($sql)) {

        $stmt->bind_param('i', $_POST['article_id']);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {

            $deleted = true;

        } else {

            $error = 'There was a problem deleting the record.';
        }
    }
}

// If the form is cancelled, redirect to the list page.
if (isset($_POST['cancel']) || isset($_POST['list'])) {

    header('Location: blog_list.php');
    exit;
}

?>

<!DOCTYPE html>
<html>

<head>

    <title>Reader</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
    
    <style type="text/css">
    /* Local styles */
    .blog_rev
    {
        font-style: italic;
        color: #999;
    }
    </style>

</head>

<body>

    <div id="page">

        <h1>Reader</h1>

        <!-- Main content  -->
        <div id="main_content">

            <!-- The update record form -->
            <h2>Confirm/Delete</h2>
            <?php
            if (isset($error)) {

                echo "<p class=\"alert\">Error: $error</p>";
            }

            if ($deleted == false) {?>

                <form id="form1" action="" method="post">

                    <p><label for="title">Title:</label></p>
                    <h3 class="blog_rev"><?php echo
                        htmlentities($title, ENT_COMPAT, 'utf-8'); ?></h3>

                    <input name="article_id" type="hidden" value="<?php
                        echo $article_id; ?>">
                    <p>
                    <input type="submit" name="cancel" value="Cancel"
                        id="cancel">
                    <input type="submit" name="delete" value="Confirm Deletion"
                        id="delete">
                    </p>

                </form><!-- End of update form -->

            <?php
            } else {?>

                <p><em>Record deleted.</em></p>
                <form id="form2" action="" method="post">
                    <!--.. List existing entries -->
                    <input type="submit" name="list"
                        value="List existing entries" id="list">
                </form>
            <?php
            }
            ?>
        </div><!-- Main content ends -->

    </div><!-- Container ends -->

    <!-- footer -->
    <?php require $inc_path . 'footer.inc.php'; ?>

</body>
</html>