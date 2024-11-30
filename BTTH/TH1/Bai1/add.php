<?php
include "db_conn.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $image = $_FILES['image']['name'];

    // Di chuyển file ảnh vào thư mục images/
    move_uploaded_file($_FILES['image']['tmp_name'], "images/" . $image);

    $sql = "insert into HOA (name, description, image) values ('$name', '$description', '$image')";

    if (mysqli_query($conn, $sql)) {
        echo "Thêm hoa thành công!";
    } else {
        echo "Lỗi: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>

