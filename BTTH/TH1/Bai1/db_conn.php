<?php
    $server = "localhost"; 
    $user = "root"; 
    $password = ""; 
    $database = "flowerss"; 

$conn = new mysqli($server, $user, $password, $database);

if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
} else {
    mysqli_query($conn, "SET NAMES 'utf8' ");
    //echo 'Đã kết nối thành công';
}

?>
