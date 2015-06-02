<?php

$inc_path = '/home/automato/lib/php/includes/reader/';

require_once $inc_path . 'session_timeout.inc.php';

require_once $inc_path . 'connection.inc.php';

$conn = dbConnect('read');

$sql = 'SELECT article_id, title, article,
    DATE_FORMAT(created, "%a, %b, %D, %Y") AS date_created
    FROM blog ORDER BY created DESC';

$result = $conn->query($sql) or die(mysqli_error());

$numRows = $result->num_rows;

// Insert an entry
if (isset($_POST['insert'])) {

    header('Location: admin/blog_post.php');
    exit;
}

if (isset($_POST['list'])) {

    header('Location: admin/blog_list.php');
    exit;
}

?>

<!DOCTYPE html>
<html>

<head>

    <title>Reader</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/styles.css">

    <script>
            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

            ga('create', 'UA-56241017-1', 'auto');
            ga('send', 'pageview');

    </script>

</head>

<body>

    <div id="page">

        <h1>Reader</h1>

        <div id="main_content">

            <p>You have successfully logged in.</p>

            <!--// Display existing blog entries, if any. //-->
            <p>Total records: <?php echo $numRows ?>.</p>

            <?php while ($row = $result->fetch_assoc()) {
            ?>

            <h3><?php echo $row['date_created'] . '&emsp;-->&emsp;' .
                $row['title']; ?></h3>

            <p><?php

                if (strlen($row['article']) > 99) {

                    // Just want the first 100 words and end on a sentence.
                    $extract = substr($row['article'], 0, 100);

                    // Find the position of the last space in the substring.
                    $lastsp = strpos($extract, ' ', 95);

                    if ($lastsp == null) {

                        // If the $lastpos does not yield a space,
                        // go back fruther to get it.
                        $lastsp = strpos($extract, ' ', 80);
                    }

                    echo substr($extract, 0, $lastsp) . '... ';

                ?>

                <a href="reader_blog.php#<?php  echo $row['article_id'] ?>">more</a>

                <?php

                } else {

                    echo $row['article'];

                }

                ?>

            </p>
            <p class="hrule">&nbsp;</p>
            <?php
            } ?>

            <!--// Post and List actions //-->
            <form id="form1" action="" method="post">
                <!--// Post a new entry //-->
                <p>
                <input type="submit" name="insert" value="Insert new entry"
                    id="insert">
                <!--// List existing entries //-->
                <input type="submit" name="list"
                    value="List existing entries" id="list">

                <?php
                // Call the logout script.
                require $inc_path . 'logout.inc.php';
                ?>

                </p>
            </form>

        </div><!--// Main content ends //-->
    </div><!--// Container ends //-->

    <!--// footer //-->
    <?php require $inc_path . 'footer.inc.php'; ?>

</body>
</html>
