<?php
$mode = $_POST['mode'];

if ($mode == 'guest') {
    header("Location: user.php");
} else if ($mode == 'admin') {
    header("Location: admin.php");
} else {
    echo "Chế độ không hợp lệ.";
}
?>
