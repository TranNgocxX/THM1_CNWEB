<?php
$conn = new mysqli('localhost', 'root', '', 'student_b3_csv');

if ($conn->connect_error) {
    die("Kết nối không thành công: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['csvFile'])) {
    $file = $_FILES['csvFile']['tmp_name'];

    if (!file_exists($file)) {
        die("Tệp tin này không tồn tại.");
    }

    if (($handle = fopen($file, "r")) !== FALSE) {
        $headers = fgetcsv($handle, 1000, ",");

        // Đọc dữ liệu
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            $Hoten = $data[0];
            $Ngaysinh = $data[1];
            $Lop = $data[2];
            $Diem = (float) $data[3];

            $stmt = $conn->prepare("INSERT INTO students (Hoten, Ngaysinh, Lop, Diem) VALUES (?, ?, ?, ?)");
            if (!$stmt) {
                die("Chuẩn bị câu lệnh thất bại: " . $conn->error);
            }
            $stmt->bind_param("sssd", $Hoten, $Ngaysinh, $Lop, $Diem);
            if (!$stmt->execute()) {
                die("Thực thi câu lệnh thất bại: " . $stmt->error);
            }
        }
        fclose($handle);
        echo "Dữ liệu đã được lưu vào csdl.";
    } else {
        echo "Không thể đọc tệp CSV.";
    }
} else {
    echo "Vui lòng tải lên tệp CSV.";
}

$conn->close();
?>
