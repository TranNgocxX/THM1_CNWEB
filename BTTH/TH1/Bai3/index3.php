<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý sinh viên</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Quản lý sinh viên</h1>
        <div class="row mt-4">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        Upload CSV
                    </div>
                    <div class="card-body">
                        <p>Để thêm dữ liệu sinh viên từ file CSV, hãy chọn "Upload".</p>
                        <a href="upload.php" class="btn btn-primary">Upload CSV</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-success text-white">
                        Xem danh sách sinh viên
                    </div>
                    <div class="card-body">
                        <p>Xem toàn bộ dữ liệu sinh viên trong cơ sở dữ liệu.</p>
                        <a href="display.php" class="btn btn-success">Xem danh sách</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

