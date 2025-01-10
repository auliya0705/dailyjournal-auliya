<?php
date_default_timezone_set('Asia/Jakarta');

$servername = "localhost";
$database = "webdailyjournal";
$username = "root";
$password = "";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error){
    die("Connection failed :" .$conn->connect_error);
}

// echo "Connected Succesfully<hr>";
?>