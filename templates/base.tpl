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

    <script>
            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

            ga('create', 'UA-56241017-1', 'auto');
            ga('send', 'pageview');
    </script>

    <title>{#blogTitle#}</title>

</head>

<body>

    <div id="page">

        <header><h1>{#blogTitle#}</h1></header>

        <!-- Main content  -->
        <div id="main_content">

            {block name=main}{/block}

        </div><!-- Main content ends -->
    </div><!-- Container ends -->

    <!-- footer -->
    <footer>
        <p class="hrule"></p>

        <p class="footerText"><?php print date('m/d/y') ?>
            &emsp;|&emsp;&copy; <?php copyrightYears(); ?>
            John Merigliano
        </p>
    </footer>

</body>
</html>
