{* Smarty *}

{config_load file="reader.conf"}

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="This is a blog.">

    <link rel="icon" href="images/TBA" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <script src="js/reader-ga.js"></script>

    <title>{#blogTitle#}</title>

</head>

<body>

    <!-- page -->
    <div id="page">

        <header><h1>{#blogTitle#}</h1></header>

        <!-- main -->
        <div id="main_content">

            {block name=main}{/block}

        </div><!-- main ends -->
    </div><!-- page ends -->

    <!-- footer -->
    <footer>
        <p class="footerText">
            {$reader_date} | &copy;{$reader_yrs} {#blogAuthor#}
        </p>
    </footer>

</body>
</html>
