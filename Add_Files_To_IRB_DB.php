<?php

$host="localhost";
$username="root";
$password="";
$db_Name="irb_db";
$flag=0;

$Study_ID=$_POST['study_id_toIRB'];
$Study_Name=$_POST['study_name_toIRB'];

$File_Name=addslashes($_FILES['study_file_toIRB']['name']);
$File_Content=addslashes(file_get_contents($_FILES['study_file_toIRB']['tmp_name']));
$File_Type=addslashes($_FILES['study_file_toIRB']['type']);

$Date_Of_Sent=$_POST['date_of_sent_toIRB'];

$Study_announcement=$_POST['textareaName'];

$ext1 =explode('/',$File_Type);



if ($_FILES["study_file_toIRB"]["size"] > 1000000 ) {
    echo "Sorry, your file is too large.";

}
else {
    if ($ext1[1]!= "pdf" && $ext1[1] != "docx" && $ext1[1] != "txt"
        && $ext1[1] != "wps" && $ext1[1] != "plain") {
        echo "just pdf , word , text files can be send";
    } else {
        $conn = mysqli_connect($host, $username, $password, $db_Name);

        if (mysqli_connect_errno()) {
            echo "can not connect to Database";
            exit;
        }
        $sql2 = "SELECT * FROM received_files where study_id= $Study_ID";
        $result = $conn->query($sql2);
        if ($result->num_rows > 0) {
            $flag = 1;
        }
        if ($flag == 1) {
            echo "<script>alert('Invalid study ID')</script>";

        } else {

            $sql = "INSERT INTO received_files (study_id,study_name,file_type,file_name,file_content,date_of_recived,study_text) VALUES ('$Study_ID','$Study_Name','$File_Type','$File_Name','$File_Content','$Date_Of_Sent','$Study_announcement')";

            $result = $conn->query($sql);

            if ($result) {

                echo "Sent correctly";

            } else {
                echo "ERROR !!!" . "<br" . $conn->error;
            }
            $conn->close();
            $conn2 = mysqli_connect("localhost", "root", "", "Projectdatabase");
            if ($conn2->connect_error) {
                die("connection faild" . $conn2->connect_error);
            }
            $sql1 = "INSERT INTO sent_to_irb (study_id,study_name,date_of_sent) VALUES
                     ($Study_ID, '$Study_Name','$Date_Of_Sent')";

            if ($conn2->query($sql1) === TRUE) {

            } else {
                echo "Error: " . $sql . "<br>" . $conn2->error;
            }

            $conn2->close();
        }
    }
}
?>