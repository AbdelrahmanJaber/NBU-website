<?php
$conn = mysqli_connect("localhost", "root", "", "Projectdatabase");
$id=isset($_GET['id']) ? $_GET['id'] : "";
$qry = "SELECT * from  study where id_study= $id";

$result = $conn->query($qry);
if ($result->num_rows > 0) {
$row = $result->fetch_assoc();
header('Content-Type:'.$row['file_type']);
echo $row['content_file'];


}
?>

