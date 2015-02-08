<?php

// Connect

function dbConnect($usertype, $connectionType = 'mysqli')
{

// === Edit these vars only === //

    $host = 'XXXXXXXXXXXXXX';
    $db = 'XXXXXXXXXXXXXX';

    if ($usertype == 'read') {

        $user = 'XXXXXXXXXXXXXX';
        $pwd = 'XXXXXXXXXXXXXX';

    } elseif ($usertype == 'write') {

        $user = 'XXXXXXXXXXXXXX';
        $pwd = 'XXXXXXXXXXXXXX';

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
