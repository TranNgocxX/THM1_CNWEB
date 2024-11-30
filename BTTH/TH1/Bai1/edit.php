<?php
include "db_conn.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['ID'])) {
        $ID = $_POST['ID'];
        $name = $_POST['name'];
        $description = $_POST['description'];
        $image = $_FILES['image']['name'];

        // Kiểm tra và di chuyển file ảnh mới nếu có
        if ($image) {
            $target_dir = "images/";
            $target_file = $target_dir . basename($image);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

            // Kiểm tra định dạng file
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
                echo "Chỉ chấp nhận file JPG, JPEG, PNG & GIF.";
                $uploadOk = 0;
            }

            if ($uploadOk && move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
                $sql = "UPDATE HOA SET name='$name', description='$description', image='$image' WHERE ID='$ID'";
            } else {
                echo "Có lỗi khi tải file.";
                exit();
            }
        } else {
            $sql = "UPDATE HOA SET name='$name', description='$description' WHERE ID='$ID'";
        }

        if (mysqli_query($conn, $sql)) {
            echo "Cập nhật hoa thành công!";
            header("Location: admin.php");
            exit();
        } else {
            echo "Lỗi: " . $sql . "<br>" . mysqli_error($conn);
        }
    } else {
        echo "Không nhận được ID.";
    }
}
?>
