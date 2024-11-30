 <?php
include 'products.php';

if (isset($_GET['action']) && isset($_GET['id'])) {
    $action = $_GET['action'];
    $id = intval($_GET['id']); // Lấy ID của sản phẩm (chỉ số mảng)

    if ($id >= 0 && $id < count($products)) {
        if ($action === 'edit') {
            $productToEdit = $products[$id];
        } elseif ($action === 'delete') {
            unset($products[$id]);
            $products = array_values($products); // Đặt lại chỉ số mảng
            // Lưu lại thay đổi
            file_put_contents('products.php', "<?php \$products = " . var_export($products, true) . "; ?>");
            header('Location: inde.php'); // Quay lại trang chính
            exit;
        }
    } else {
        echo "ID không hợp lệ!";
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['name']) && isset($_POST['price']) && isset($_POST['id'])) {
    $id = intval($_POST['id']);
    $products[$id]['name'] = htmlspecialchars($_POST['name']);
    $products[$id]['price'] = htmlspecialchars($_POST['price']);
    // Lưu lại thay đổi
    file_put_contents('products.php', "<?php \$products = " . var_export($products, true) . "; ?>");
    header('Location: inde.php'); // Quay lại trang chính
    exit;
}
?>

<?php if (isset($productToEdit)): ?>
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
            <input type="hidden" name="id" value="<?= $id ?>">
            <div class="mb-3">
                <label for="name" class="form-label">Tên sản phẩm</label>
                <input type="text" class="form-control" id="name" name="name" value="<?= htmlspecialchars($productToEdit['name']) ?>" required>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Giá sản phẩm</label>
                <input type="number" class="form-control" id="price" name="price" value="<?= htmlspecialchars($productToEdit['price']) ?>" required>
            </div>
            <button type="submit" class="btn btn-success">Lưu</button>
            <a href="inde.php" class="btn btn-secondary">Hủy</a>
        </form>
    </div>
</body>
</html>
