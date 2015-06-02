<?php

// define('SMARTY_DIR', '/opt/lampp/lib/php/Smarty-3.1.20/libs/');
// require_once SMARTY_DIR . 'Smarty.class.php';
// $smarty = new Smarty();

$inc_path = '/home/automato/lib/php/includes/reader/';

// Session
$error = '';

if (isset($_POST['login'])) {

    session_start();

    // Trim any leading or trailing whitespace.
    $username = trim($_POST['username']);

    // Encrypt the password.
    $password = trim($_POST['pwd']);

    // Redirect upon succesfull login.
    $redirect = 'reader.php';

    // Include the authenticaton script.
    include_once $inc_path . 'authenticate_mysqli.inc.php';
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

            <h2>Login</h2>

            <?php

            // Display errors
            if ($error) {

                echo "<p class=\"alert\">$error</p>";

            } elseif (isset($_GET['expired'])) {

                echo "<p class=\"alert\">Your session has expired.
                    Please login again.</p>";
            }
            ?>

            <form id="form2" method="post" action="">
                <label for="username">Username: </label>
                <input type="text" name="username" id="username"><br>
                <label for="pwd">Password: </label>
                <input type="password" name="pwd" id="pwd"><br>
                <input type="submit" name="login" id="login" value="Login">
            </form>

        </div>

        <!--// footer //-->
        <?php require $inc_path . 'footer.inc.php'; ?>

    </body>
</html>