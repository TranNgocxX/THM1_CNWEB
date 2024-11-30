<?
include 'db_conn.php';

$flowers = array();
$sql = "SELECT * FROM HOA";
$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_assoc($result)) {
    $flowers[] = $row;
}

?>
