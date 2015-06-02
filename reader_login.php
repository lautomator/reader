<?php

$inc_path = '/Applications/XAMPP/xamppfiles/lib/php/includes/reader/';

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