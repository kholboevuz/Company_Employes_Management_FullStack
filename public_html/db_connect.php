<?php
/* Database connection start */
$servername = "localhost";
$username = "cc56635_text";
$password = "EDKNzJa7";
$dbname = "cc56635_text";
$conn = mysqli_connect($servername, $username, $password, $dbname) or die("Connection failed: " . mysqli_connect_error());
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
?>