<?php

// Connect

function dbConnect($usertype, $connectionType = 'mysqli')
{

// === Edit these vars only === //

    $host = 'localhost';
    $db = 'reader';

    if ($usertype == 'read') {

        $user = 'root';
        $pwd = 'root';

    } elseif ($usertype == 'write') {

        $user = 'root';
        $pwd = 'root';

// ============================ //

    } else {

        exit('Unrecognized connection type');

    }

    if ($connectionType == 'mysqli') {

        $conn = new mysqli($host, $user, $pwd, $db);

        if ($conn->connect_error) {
            die('Cannot open database');
        }

        return $conn;

    } else {
        try {

            return new PDO("mysql:host=$host;dbname=$db", $user, $pwd);

        }

        catch (PDOException $e) {
            echo 'Cannot connect to database';
            exit;

        }
    }
}
