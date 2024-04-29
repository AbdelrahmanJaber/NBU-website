<?php

$host="localhost";
$username="root";
$password="";
$dbname="moh_db";

$conn=mysqli_connect($host,$username,$password,$dbname);

if (mysqli_connect_errno()) {
    echo "can not connect to Database";
    exit;
}

$id=isset($_GET['id']) ? $_GET['id'] : "";

$sql = "SELECT * from  received_files where study_ID = $id;";

$result = $conn->query($sql);

if ($result->num_rows > 0) {

    $row = $result->fetch_assoc();
    header('Content-Type:'.$row['study_file_type']);
    echo $row['study_file'];

}
?>
