{* Smarty *}

{extends file="base.tpl"}

{block name=main}

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

            $filename = "./img/{$row['filename']}";
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

{/block}