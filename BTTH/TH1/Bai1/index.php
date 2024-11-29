<?php
    include "db_conn.php";
?>

<!DOCTYPE html>
<html>
<head>
    <title> Chọn Chế độ hiển thị </title>
</head>
<body>
    <h1> Chào mừng đến với Trang Quản Lý Hoa </h1>
    <form method="POST" action="home.php">
        <input type="radio" id="guest" name="mode" value="user" checked>
        <label for="user">Người dùng khách</label><br>
        <input type="radio" id="admin" name="mode" value="admin">
        <label for="admin">Quản trị viên</label><br><br>
        <input type="submit" value="Chọn chế độ">
    </form>
</body>
</html>
