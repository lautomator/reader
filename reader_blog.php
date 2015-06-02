<?php

$inc_path = '/Applications/XAMPP/xamppfiles/lib/php/includes/reader/';

require_once $inc_path . 'connection.inc.php';

// Create the database connection.
$conn = dbConnect('read');

// Select the databse.
// INNER will include only the records found with the exact match.
// LEFT includes every record, even if a matching key is not found.
$sql = 'SELECT article_id, image_id, title, article, filename, caption,
    DATE_FORMAT(created, "%a, %b, %D, %Y") AS date_created
    FROM blog LEFT JOIN photographs USING (image_id) ORDER BY created DESC';

$result = $conn->query($sql) or die(mysqli_error());

// Number of records
$numRows = $result->num_rows;

// If the insert entry button is pressed, redirect to the post page.
if (isset($_POST['insert'])) {

    header('Location: admin/blog_post.php');
    exit;

} if (isset($_POST['list'])) {

    header('Location: admin/blog_list.php');
    exit;
}

// Function to convert an otherwise long block of text into paragraphs.
function format_paragraphs($text)
{

    // Remove brackets and anything within them from Wiki text.
    $text = preg_replace('/\[\w+\]+/', '', $text);

    // Trim the text.
    $text = trim($text);

    return '<p>' . preg_replace('/[\r\n]+/', '</p><p>', $text . '</p>');
}

?>

<!DOCTYPE html>

<html>

<head>

    <title>Reader</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/styles.css">

</head>

<body>

    <div id="page">

        <h1>Reader</h1>

        <!--// Main content  //-->
        <div id="main_content">

            <!--// Display existing blog entries, if any. //-->
            <h2>Existing Blog Entries</h2>
            <p>Total records: <?php echo $numRows ?>.</p>
            <?php
            // Respond if there are no entries.
            if ($numRows == 0) {
                echo "<p class=\"alert\">There are no entries.</p>" .
                    "<p><a href=\"admin/blog_post.php\">
                    Post an entry</a></p>";
            }
            ?>

            <?php while ($row = $result->fetch_assoc()) { ?>

            <!--// Use the article ID as an anchor //-->
            <h3 id="<?php  echo $row['article_id'] ?>">
                <?php echo $row['date_created'] . '&emsp;-->&emsp;' . $row['title']; ?></h3>
                <?php
                // Article:
                echo format_paragraphs($row['article']);
                // Image, if any:
                if ($row['image_id'] != null) {

                    $filename = "./images/{$row['filename']}";
                    echo "<img src=\"$filename\" alt=\"{$row['caption']}\" />";
                }
                ?>

            <p><a href="reader.php">
                less</a></p>

            <p class="hrule">&nbsp;</p>
            <?php
            }
            ?>

            <!--// Post and List actions //-->
            <form id="form1" action="" method="post">
                <!--// Post a new entry //-->
                <p>
                <input type="submit" name="insert" value="Insert new entry"
                    id="insert">
                <!--// List existing entries //-->
                <input type="submit" name="list" value="List existing entries"
                    id="list">
                </p>
            </form>
            <p>&nbsp;</p>

        </div><!--// Main content ends //-->
    </div><!--// Container ends //-->

    <!-- footer -->
    <?php require $inc_path . 'footer.inc.php'; ?>


</body>
</html>
