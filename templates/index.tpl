{* Smarty *}

{config_load file="reader.conf"}

<!DOCTYPE html>
<html>
<head>

    <title>{#blogTitle#}</title>
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

        <header><h1>Reader</h1></header>

        <!-- Main content  -->
        <div id="main_content">

            <!-- Display existing blog entries, if any. -->
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

            <!-- Use the article ID as an anchor -->
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

            <p class="hrule">&nbsp;</p>
            <?php
            }
            ?>

            <!-- Login -->
            <form id="form1" action="" method="post">
                <!-- Post a new entry -->
                <p>
                <input type="submit" name="login" value="Login"
                    id="login">
                </p>
            </form>
            <p>&nbsp;</p>

        </div><!-- Main content ends -->
    </div><!-- Container ends -->

    <!-- footer -->
    <?php require $inc_path . 'footer.inc.php'; ?>

</body>
</html>