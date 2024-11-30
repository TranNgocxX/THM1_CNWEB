<?php include 'header.php'; ?>
<?php include 'products.php'; ?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

<main class="py-4">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <a href="addcategory.php" class="btn btn-success">Thêm mới</a>
        </div>

        <!-- Bảng sp -->
        <div class="table-responsive">
            <table class="table table-bordered ">
                <thead class="table-grey">
                    <tr>
                        <th>#</th>
                        <th>Sản phẩm</th>
                        <th>Giá thành</th>
                        <th class="text-center">Sửa</th>
                        <th class="text-center">Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($products as $index => $product): ?>
                    <tr>
                        <td><?= $index + 1 ?></td>
                        <td><?= htmlspecialchars($product['name']) ?></td>
                        <td><?= htmlspecialchars($product['price']) ?> VND</td>
                        <td class="text-center">
                            <!-- sửa -->
                            <!-- <a href="#" class="btn btn-primary btn-sm"> -->
                            <a href="category.php?action=edit&id=<?= $index ?>" class="btn btn-primary btn-sm">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                        </td>
                        <td class="text-center">
                            <!-- xóa -->
                            <!-- <a href="#" class="btn btn-primary btn-sm"> -->
                            <a href="category.php?action=delete&id=<?= $index ?>" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?');">
                                <i class="bi bi-trash"></i>
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
