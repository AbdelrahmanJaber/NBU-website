<?php
$id=(int)$_POST['get_last_study_date'];
$conn = new mysqli('localhost', 'root', '', 'projectdatabase');
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT leaststudy FROM volunteer where  id= $id";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        echo $row["leaststudy"];
    }
} else {
    echo "new Volunteer";
}
$conn ->close();
?>