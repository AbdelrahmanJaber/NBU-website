<?php

$host="localhost";
$username="root";
$password="";
$dbname="irb_db";

$conn=mysqli_connect($host,$username,$password,$dbname);

if (mysqli_connect_errno()) {
    echo "can not connect to Database";
    exit;
}

$id=isset($_GET['id']) ? $_GET['id'] : "";

$sql = "SELECT * from  accepted_studies where study_id = $id;";

$result = $conn->query($sql);

if ($result->num_rows > 0) {

    $row = $result->fetch_assoc();
    header('Content-Type:'.$row['file_type']);
    echo $row['file_content'];

}
?>
