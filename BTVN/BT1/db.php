<?php
$server = "localhost";
$user = "root";
$password = "";
$dbname = "QLCH";

$conn = new mysqli($server, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Lỗi: " . $conn->connect_error);
}
?>
