<?php
$servername = "localhost";
$database = "dtb_rjrefeicoes";
$username = "jonas";
$password = "jonas";
$conn = mysqli_connect($servername, $username, $password, $database);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>