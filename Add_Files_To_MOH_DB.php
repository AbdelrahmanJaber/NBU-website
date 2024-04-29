<?php

$studyID=$_POST['study_id_toMOH'];
$studyName=$_POST['study_name_toMOH'];
$dateOfRecieved=$_POST['date_of_sent_toMOH'];

$study_File= addslashes(file_get_contents($_FILES['study_file_toMOH']['tmp_name']));
$study_filetype = addslashes($_FILES['study_file_toMOH']['type']);
$study_namefile = addslashes($_FILES['study_file_toMOH']['name']);


$ext1 =explode('/',$study_filetype);
$uploadFileType1=strtolower($ext1[1]);

$volunteers_File= addslashes(file_get_contents($_FILES['volunteers_file_toMOH']['tmp_name']));
$volunteers_filetype = addslashes($_FILES['volunteers_file_toMOH']['type']);
$volunteers_namefile = addslashes($_FILES['volunteers_file_toMOH']['name']);

$ext2 =explode('/',$volunteers_filetype);
$uploadFileType2=strtolower($ext2[1]);

$flag=0;
    if ($_FILES["volunteers_file_toMOH"]["size"] > 1000000 || $_FILES["study_file_toMOH"]["size"] > 1000000) {
        echo "Sorry, your file is too large.";

         }
    else {
        if ($uploadFileType1 != "pdf" && $uploadFileType1 != "docx" && $uploadFileType1 != "txt"
            && $uploadFileType1 != "wps" && $uploadFileType1 != "plain") {
            echo "just pdf , word , text files can be send";
        } else {
            if ($uploadFileType2 != "pdf" && $uploadFileType2 != "docx" && $uploadFileType2 != "txt"
                && $uploadFileType2 != "wps" && $uploadFileType2 != "plain" ) {
                echo "just pdf , word , text files can be send";
            } else {

                $conn1 = mysqli_connect("localhost", "root", "", "moh_db");
                if ($conn1->connect_error) {
                    die("connection faild" . $conn->connect_error);
                }

                $sql = "SELECT * FROM received_files where study_id=$studyID";
                $result = $conn1->query($sql);
                if ($result->num_rows > 0) {
                    $flag = 1;
                }

                if ($flag == 1) {
                    echo "<script>alert('Invalid study ID')</script>";
                } else {
                    $sql = "INSERT INTO received_files (study_id, study_name,study_file,volunteers_file,date_of_received,study_file_type,volunteer_file_type,study_file_name,volunteer_file_name) VALUES ($studyID, '$studyName','$study_File','$volunteers_File','$dateOfRecieved','$study_filetype','$volunteers_filetype','$study_namefile','$volunteers_namefile')";

                    if ($conn1->query($sql) === TRUE) {

                    } else {
                        echo "Error: " . $sql . "<br>" . $conn1->error;
                    }

                    $conn1->close();

                    $conn2 = mysqli_connect("localhost", "root", "", "Projectdatabase");
                    if ($conn2->connect_error) {
                        die("connection faild" . $conn2->connect_error);
                    }
                    $sql = "INSERT INTO sent_to_moh (study_id,study_name,date_of_sent) VALUES
                     ($studyID, '$studyName','$dateOfRecieved')";

                    if ($conn2->query($sql) === TRUE) {

                    }
                    else {
                        echo "Error: " . $sql . "<br>" . $conn2->error;
                    }

                    $conn2->close();
                    echo "Sent correctly";
                }
            }
        }
    }
?>
