<?php
// File name: connect_to_db.php

include_once $_SERVER['DOCUMENT_ROOT']."/includes/constants.php";

function connectToDb()
{
    $mysqli = new mysqli(LIVE_DB_ADDRESS, LIVE_DB_USERNAME, LIVE_DB_PASSWORD, LIVE_DB_NAME);

    if (mysqli_connect_errno())
    {
        $connection_error = sprintf("Connect failed: %s\n", mysqli_connect_error());
        $subject = "Database Connection Error";
        $body = "Error: $connection_error";
        //todo: email error to admin
        echo "Error";
        exit();
    }
   return $mysqli;
}

function disconnectDb($mysqli)
{
    $mysqli->close();
}

?>