<?php include 'header.php'; ?>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars($_POST['name']);
    $price = htmlspecialchars($_POST['price']);

    include 'products.php';

    $products[] = ['name' => $name, 'price' => $price];

    $data = '<?php $products = ' . var_export($products, true) . ';';
    file_put_contents('products.php', $data);

    header('Location: inde.php');
    exit();
}
?>

<main class="py-4">
    <div class="container">
        <h2>Thêm sản phẩm mới</h2>
        <form method="POST" action="addcategory.php">
            <div class="mb-3">
                <label for="name" class="form-label">Tên sản phẩm</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Giá thành</label>
                <input type="number" class="form-control" id="price" name="price" required>
            </div>
            <button type="submit" class="btn btn-success">Thêm sản phẩm</button>
            <a href="inde.php" class="btn btn-secondary">Hủy</a>
        </form>
    </div>
</main>

<?php include 'footer.php'; ?>
