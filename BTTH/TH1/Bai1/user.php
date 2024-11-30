<?php
include "db_conn.php";
$flowers = array();
$sql = "SELECT * FROM HOA";
$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_assoc($result)) {
    $flowers[] = $row;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Danh sách các loài hoa</title>
</head>
<body>
    <h1>Danh sách các loài hoa</h1>
    <?php foreach ($flowers as $flower): ?>
        <div class="flower">
            <h2><?php echo $flower['name']; ?></h2>
            <p><?php echo $flower['description']; ?></p>
            <img src="images/<?php echo $flower['image']; ?>" alt="<?php echo $flower['name']; ?>">
        </div>
    <?php endforeach; ?>
    <a href="index1.php"> Quay lại trang chủ </a>
</body>
</html>
