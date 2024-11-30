<?php
include "db_conn.php";

if (isset($_GET['ID'])) {
    $ID = $_GET['ID'];
    $sql = "SELECT * FROM HOA WHERE ID = $ID";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $flower = mysqli_fetch_assoc($result);
    } else {
        echo "Không tìm thấy hoa với ID này.";
        exit();
    }
} else {
    echo "Không nhận được ID";
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Chỉnh Sửa Hoa</title>
</head>
<body>
    <h1>Chỉnh Sửa Hoa</h1>
    <form method="POST" action="edit.php" enctype="multipart/form-data">
        <input type="hidden" name="ID" value="<?php echo $ID; ?>">
        <label for="name">Tên Hoa:</label><br>
        <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($flower['name']); ?>" required><br><br>
        <label for="description">Mô tả:</label><br>
        <textarea id="description" name="description" required><?php echo htmlspecialchars($flower['description']); ?></textarea><br><br>
        <label for="image">Ảnh:</label><br>
        <input type="file" id="image" name="image"><br><br>
        <input type="submit" value="Cập Nhật Hoa">
    </form>
    <a href="admin.php">Quay lại trang quản lý</a>
</body>
</html>
