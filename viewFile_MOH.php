<?php
$conn = mysqli_connect("localhost", "root", "", "Projectdatabase");
$id=isset($_GET['std_id']) ? $_GET['std_id'] : "";
$qry = "SELECT * from  studymoh where study_id= $id";

$result = $conn->query($qry);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    header('Content-Type:'.$row['study_file_type']);
    echo $row['study_file'];
}

$id2=isset($_GET['vol_id']) ? $_GET['vol_id'] : "";
$qry = "SELECT * from  studymoh where study_id= $id2";
$result = $conn->query($qry);
if ($result->num_rows > 0) {
$row = $result->fetch_assoc();
header('Content-Type:'.$row['volunteer_file_type']);
echo $row['volunteer_file'];
}
?>
