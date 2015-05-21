{* Smarty *}

{config_load file="reader.conf"}

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="{#blogSubject#}">
    <meta name="author" content="{#blogAuthor#}">


    <link rel="icon" href="images/TBA" type="image/x-icon">
    <link rel="stylesheet" type="text/css"
        href="http://localhost/reader/htdocs/css/styles.css">
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
        <p>&copy;&nbsp;{$reader_yrs} {#blogAuthor#} |
        today's date: {$reader_date}</p>
    </footer><!-- footer ends -->

</body>
</html>
