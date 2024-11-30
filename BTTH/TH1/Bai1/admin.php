<?php
include "db_conn.php";
$flowers = array();
$sql = "SELECT * FROM HOA";
$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_assoc($result)) {
    $flowers[] = $row;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Quản lý các loài hoa</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        img {
            max-width: 100px;
        }
        form {
            display: inline;
        }
    </style>
</head>
<body>
    <h1>Quản lý các loài hoa</h1>
    <a href="add_form.php">Thêm Hoa Mới</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên</th>
                <th>Mô tả</th>
                <th>Ảnh</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($flowers as $flower): ?>
                <tr>
                    <td><?php echo $flower['ID']; ?></td>
                    <td><?php echo $flower['name']; ?></td>
                    <td><?php echo $flower['description']; ?></td>
                    <td><img src="images/<?php echo $flower['image']; ?>" alt="<?php echo $flower['name']; ?>"></td>
                    <td>
                        <a href="edit_form.php?ID=<?php echo $flower['ID']; ?>"> Sửa </a>
                        <form method="POST" action="delete.php" onsubmit="return confirm('Bạn có chắc chắn muốn xóa hoa này?');">
                            <input type="hidden" name="ID" value="<?php echo $flower['ID']; ?>">
                            <input type="submit" value="Xóa">
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <a href="index1.php">Quay lại trang chủ</a>
</body>
</html>
