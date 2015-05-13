<?php

require_once 'file:///Applications/XAMPP/xamppfiles/lib/php/includes/' .
    'reader/config.inc.php';

require $inc_path . 'connection.inc.php';

$OK = false;
$done = false;
$conn = dbConnect('write');
$stmt = $conn->stmt_init();

// Get the details of the selected record
if (isset($_GET['article_id']) && !$_POST) {

    // Prepare the query.
    $sql = 'SELECT article_id, image_id, title, article
        FROM blog WHERE article_id = ?';
    $stmt->prepare($sql);
    // Bind the query parameter.
    $stmt->bind_param('i', $_GET['article_id']);
    // Bind the results to variables
    $stmt->bind_result($article_id, $image_id, $title, $article);
    // Execute the query and pop the results.
    $OK = $stmt->execute();
    $stmt->fetch();
    $stmt->free_result();
}

// If form has been submitted, update the record.
if (isset($_POST ['update'])) {

    // prepare update query
    if (!empty($_POST['article'])) {

        $sql = 'UPDATE blog SET image_id = ?, title = ?, article = ?
            WHERE article_id = ?';
        $stmt->prepare($sql);
        $stmt->bind_param(
            'issi',
            $_POST['image_id'],
            $_POST['title'],
            $_POST['article'],
            $_POST['article_id']
        );

    } else {

        $sql = 'UPDATE blog SET image_id = NULL, title = ?, article = ?
            WHERE article_id = ?';
        $stmt->prepare($sql);
        $stmt->bind_param(
            'issi',
            $_POST['title'],
            $_POST['article'],
            $_POST['article_id']
        );
    }

    $stmt->execute();
    $done = $stmt->affected_rows;

    // Redirect if $_GET['article_id'] not defined
    if ($done || !isset($_GET['article_id'])) {

        header('Location: blog_list.php');
        exit;
    }

    // Store error message if query fails
    if (isset($stmt) && !$OK && !$done) {

        $error = $stmt->error;
    }
}

// If the form is cancelled, redirect to the list page.
if (isset($_POST['cancel'])) {

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

</head>

<body>

    <div id="page">

        <header><h1>Reader</h1></header>

        <!-- Main content  -->
        <div id="main_content">

            <!-- The update record form -->
            <h2>Update</h2>

            <?php
            if (isset($error)) {

                echo "<p class=\"alert\">Error: $error</p>";
            }

            if ($article_id == 0) {

            ?>

            <p class="alert">Invalid request: record does not exist.</p>

            <?php
            } else {

            ?>

            <form id="form2" action="" method="post">
                <p>
                    <label for="title">Title:</label><br>
                    <input name="title" type="text" class="formbox"
                        id="title"
                        value="<?php echo htmlentities($title, ENT_COMPAT, 'utf-8'); ?>">
                </p>
                <p>
                    <label for="article">Article:</label><br>
                    <textarea name="article" cols="60" rows="8"
                        class="formbox" id="article"><?php echo htmlentities($article, ENT_COMPAT, 'utf-8');?>
                    </textarea>
                    <input name="article_id" type="hidden" value="<?php
                        echo $article_id; ?>">
                </p>

                <p>
                    <input type="submit" name="update" value="Update Entry"
                        id="update">
                    <input type="submit" name="cancel" value="Cancel"
                        id="cancel">
                    <input name="article_id" type="hidden"
                        value="<?php echo $article_id; ?>">
                </p>
            </form><!-- End of update form -->
            <?php
            }
            ?>
        </div><!-- Main content ends -->

    </div><!-- Container ends -->

    <!-- footer -->
    <?php require $inc_path . 'footer.inc.php'; ?>

</body>
</html>