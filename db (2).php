<?php
$host = "sql210.infinityfree.com";
$username = "if0_39407318";
$password = "Pprince123"; // Replace with your actual DB password
$database = "if0_39407318_fitness";

$conn = mysqli_connect($host, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
