<?php
include 'db.php';

$dsachSP = [];
$sql = "SELECT * FROM products";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $dsachSP[] = $row;
    }
}

if (isset($_GET['HanhDong']) && isset($_GET['id'])) {
    $HanhDong = $_GET['HanhDong'];
    $id = intval($_GET['id']);

    // Kiểm tra ID có hợp lệ không
    if ($id >= 0 && $id < count($dsachSP)) {
        if ($HanhDong === 'sua') {
            // Sửa sản phẩm
            $spSua = $dsachSP[$id];
        } elseif ($HanhDong === 'xoa') {
            // Xóa sản phẩm
            $sql = "DELETE FROM products WHERE id = {$dsachSP[$id]['id']}";
            if ($conn->query($sql) === TRUE) {
                echo "Xóa thành công!";
            } else {
                echo "Lỗi: " . $conn->error;
            }
            header('Location: index.php');
            exit;
        }
    } else {
        echo "ID không hợp lệ!";
    }
}

// Nếu là hành động sửa và có thông tin POST
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['ten']) && isset($_POST['gia']) && isset($_POST['id'])) {
    $id = intval($_POST['id']);
    $ten = htmlspecialchars($_POST['ten']);
    $gia = htmlspecialchars($_POST['gia']);

    $sql = "UPDATE products SET name='$ten', price='$gia' WHERE id=$id";
    $conn->query($sql);
    header('Location: index.php');
    exit;
}
?>

<!-- Hiển thị form sửa sản phẩm -->
<?php if (isset($spSua)): ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Sửa sản phẩm</title>
</head>
<body>
    <div class="container mt-5">
        <h2>Sửa sản phẩm</h2>
        <form method="POST">
            <input type="hidden" name="id" value="<?= $spSua['id'] ?>">
            <div class="mb-3">
                <label for="ten" class="form-label">Tên sản phẩm</label>
                <input type="text" class="form-control" id="ten" name="ten" value="<?= htmlspecialchars($spSua['name']) ?>" required>
            </div>
            <div class="mb-3">
                <label for="gia" class="form-label">Giá sản phẩm</label>
                <input type="number" class="form-control" id="gia" name="gia" value="<?= htmlspecialchars($spSua['price']) ?>" required>
            </div>
            <button type="submit" class="btn btn-success">Lưu</button>
            <a href="index.php" class="btn btn-secondary">Hủy</a>
        </form>
    </div>
</body>
</html>
<?php endif; ?>
