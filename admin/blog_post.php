<?php

$inc_path = 'XXXXXXXXXXXXXXX';

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

        <h1>Reader</h1>

        <!--// Main content  //-->
        <div id="main_content">

            <!--// The insert record form //-->
            <h3>Insert a new blog entry</h3>
            <!--// Error handling. //-->
            <?php
            if (isset($error)) {
                echo "<p class=\"alert\">$error</p>";
            }
            ?>

            <form id="form1" action="" method="post">
                <p>
                    <label for="title">Title:</label><br>
                    <input name="title" type="text" class="formbox"
                        id="title">
                </p>
                <p>
                    <label for="article">Article:</label><br>
                    <textarea name="article" cols="60" rows="8"
                        class="formbox" id="article"></textarea>
                </p>
                <p>
                    <!--// Insert the entry //-->
                    <input type="submit" name="insert" value="Post"
                        id="insert">
                    <!--.. List existing entries //-->
                    <input type="submit" name="list" value="Cancel"
                        id="list">
                    <!--// Clear the form //-->
                     <input type="submit" name="clear" value="Clear"
                        id="clear">
                    <?php
                    // Clear the form if the user wants to start again.
                    if (isset($_POST['clear'])) {?>

                        <script type="text/javascript">
                        // Reset the form
                        document.getElementById("form1").reset();
                        </script>

                    <?php
                    }
                    ?>
                </p>
            </form><!--// End of insert form //-->
        </div><!--// Main content ends //-->
    </div><!--// Container ends //-->

    <!-- footer -->
    <?php require $inc_path . 'footer.inc.php'; ?>

</body>
</html>
