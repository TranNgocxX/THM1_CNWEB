<?php
include 'db.php';
include 'header.php';

$dsachSP = [];
$sql = "SELECT * FROM products";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $dsachSP[] = $row;
    }
}
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

<main class="py-4">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <a href="addcategory.php" class="btn btn-success btn-lg">
                <i class="bi bi-plus-circle me-2"></i>Thêm mới
            </a>
        </div>

        <div class="table-responsive shadow-sm">
            <table class="table table-bordered table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Sản phẩm</th>
                        <th>Giá thành</th>
                        <th class="text-center">Sửa</th>
                        <th class="text-center">Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($dsachSP as $index => $sanPhamItem): ?>
                    <tr>
                        <td><?= $index + 1 ?></td>
                        <td><?= htmlspecialchars($sanPhamItem['name']) ?></td>
                        <td><?= htmlspecialchars($sanPhamItem['price']) ?> VND</td>
                        <td class="text-center">
                            <a href="category.php?HanhDong=sua&id=<?= $index ?>" class="btn btn-primary btn-sm">
                                <i class="bi bi-pencil-square"></i> Sửa
                            </a>
                        </td>
                        <td class="text-center">
                            <a href="category.php?HanhDong=xoa&id=<?= $index ?>" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?');">
                                <i class="bi bi-trash"></i> Xóa
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</main>

<?php include 'footer.php'; ?>
