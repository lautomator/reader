<?php

$inc_path = '/home/automato/lib/php/includes/reader/';

require_once $inc_path . 'connection.inc.php' ;

$conn = dbConnect('read');
$sql = 'SELECT * FROM blog ORDER BY created DESC';
$result = $conn->query($sql) or die(mysqli_error());

// number of records
$numRows = $result->num_rows;

// Go to the insert page.
if (isset($_POST['insert'])) {

    header('Location: blog_post.php');
    exit;
}

if (isset($_POST['view'])) {

    header('Location: ../reader.php');
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
    /* local */
    td {
        border-bottom: dotted 1px #999;
    }

    th {
        border-bottom: solid 2px black;
    }

    th>h3 {
        margin-bottom: 0;
    }

    td>a {
        color: #B22222;
        text-decoration: none;
        font-family: arial, sans-serif;
        font-size: 12px;
    }

    td>a:hover {
        color: black;
        text-decoration: none;
    }

    </style>

</head>

<body>

    <div id="page">

        <h1>Reader</h1>

        <!--// Main content  //-->
        <div id="main_content">

        <?php
        // Check to see if there are any records in the DB.
        if ($numRows == 0) {?>

            <p class="alert">There are no records.</p>
            <p><a href="../reader.php">
                Write a blog entry.</a></p>
        <?php
        } else {?>

            <!--// Lists all of the blog entries: //-->
            <table>
                <tr>
                    <th scope="col"><h3>Created</h3></th>
                    <th scope="col"><h3>Title</h3></th>
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                </tr>
            <?php
                while ($row = $result->fetch_assoc()) {
            ?>
                <tr>
                    <td>
                        <?php echo $row['created']; ?>
                    </td>
                    <td>
                        <?php echo  substr($row['title'], 0, 10) . "..."; ?>
                    </td>
                    <td><a href="blog_update.php?article_id=<?php echo
                        $row['article_id'];?>">edit</td>
                    <td><a href="blog_delete.php?article_id=<?php echo
                        $row['article_id'];?>">delete</td>
                </tr>
                <?php
                }
                ?>
            </table>
            <form id="form1" action="" method="post">
                <p>
                <input type="submit" name="insert" value="Insert new entry"
                    id="insert">
                <input type="submit" name="view" value="View blog"
                    id="view">
                </p>
            </form>

        <?php
        }
        ?>

        </div><!--// Main content ends //-->

    </div><!--// Container ends //-->

    <!-- footer -->
    <?php require $inc_path .'footer.inc.php'; ?>
</body>
</html>