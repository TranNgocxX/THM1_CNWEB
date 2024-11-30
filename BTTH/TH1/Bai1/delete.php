<?php
include "db_conn.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ID = $_POST['ID'];

    $sql = "DELETE FROM HOA WHERE ID = $ID";

    if (mysqli_query($conn, $sql)) {
        echo "Xóa thành công!";
        header("Location: admin.php");
    } else {
        echo "Lỗi: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>
