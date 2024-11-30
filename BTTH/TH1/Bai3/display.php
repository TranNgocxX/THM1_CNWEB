<?php
$conn = new mysqli('localhost', 'root', '', 'student_b3_csv');

if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

$result = $conn->query("SELECT * FROM students");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sinh viên</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Danh sách sinh viên</h1>
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th> MSV </th>
                    <th> Tên </th>
                    <th> Ngày sinh </th>
                    <th> Lớp </th>
                    <th> Điểm </th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>{$row['msv']}</td>";
                        echo "<td>{$row['Hoten']}</td>";
                        echo "<td>{$row['Ngaysinh']}</td>";
                        echo "<td>{$row['Lop']}</td>";
                        echo "<td>{$row['Diem']}</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5' class='text-center'>Không có dữ liệu</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
