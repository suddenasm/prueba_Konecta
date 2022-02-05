<?php
$server = "localhost";
$db = "inventory_management";
$username = "root";
$password = "";
$conn = new mysqli($server, $username, $password, $db);
if ($conn ->connect_error) {
    die("Connection failed: " . mysqli_connect_error());
}
?>