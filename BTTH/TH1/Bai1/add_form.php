<!DOCTYPE html>
<html>
<head>
    <title>Thêm</title>
</head>
<body>
    <h1>Thêm Hoa Mới</h1>
    <form method="POST" action="add.php" enctype="multipart/form-data">
        <label for="name"> Tên Hoa:</label><br>
        <input type="text" id="name" name="name" required><br><br>
        <label for="description"> Mô tả:</label><br>
        <textarea id="description" name="description" required></textarea><br><br>
        <label for="image">Ảnh:</label><br>
        <input type="file" id="image" name="image" required><br><br>
        <input type="submit" value="Thêm Hoa">
    </form>
    <a href="admin.php">Quay lại trang quản lý</a>
</body>
</html>
