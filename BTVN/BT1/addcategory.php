<?php
include 'db.php';
include 'header.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Lấy dữ liệu từ form
    $ten = htmlspecialchars($_POST['ten']);
    $gia = htmlspecialchars($_POST['gia']);

    $sql = "INSERT INTO products (name, price) VALUES ('$ten', '$gia')";
    $conn->query($sql);

    header('Location: index.php');
    exit();
}
?>

<main class="py-4">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white text-center">
                        <h2>Thêm sản phẩm mới</h2>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="addcategory.php">
                            <div class="mb-3">
                                <label for="ten" class="form-label">Tên sản phẩm</label>
                                <input type="text" class="form-control" id="ten" name="ten" required>
                            </div>
                            <div class="mb-3">
                                <label for="gia" class="form-label">Giá thành</label>
                                <input type="number" class="form-control" id="gia" name="gia" required>
                            </div>
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-success">Thêm sản phẩm</button>
                                <a href="index.php" class="btn btn-secondary">Hủy</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php include 'footer.php'; ?>
