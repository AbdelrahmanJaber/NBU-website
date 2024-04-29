<?php
session_start();
$_POST['logout_nbu']=1;
if(isset($_POST["showStudys"]))
{
    showStudys();
}
else if(isset($_POST["addStubutName"]))
{
   addStudtFun();
}

else if(isset($_POST['colcon']))
{
    deleteStudyFun();
}
else if(isset($_POST['search_study_txt']) && isset($_POST['search_study_by']))
{
    searchStudyFun();
}
function showStudys()
{
    $conn = mysqli_connect("localhost", "root", "", "Projectdatabase");
    $output='';
    if ($conn->connect_error) {
        die("connection faild" . $conn->connect_error);
    }

    $qry = "SELECT * from  study ";
    $result = $conn->query($qry);
    if ($result->num_rows > 0) {
        $output.=  "<tr >

                <th><b>Study ID</b></th>
                <th><b>Study Name</b></th>
                <th><b>Study File</b></th>
                 <th><b>Created Date</b></th>
                <th><b> Delete </b></th> 
            
                
                
            </tr>";
        while ($row = $result->fetch_assoc()) {
            $output.= '<tr><td>' . $row['id_study'] . '</td><td>' . $row['name_study'] . '</td>'."<td><a target='_blank' href='viewFile.php? id=".$row['id_study']."'>".$row['name_file']."</a></td>"
              .'<td>'. $row['studyCreatedDate'] . '</td>' .  '<td id="delete_std_td"><button class="deletestudbut">delete</button></td></tr>';
        }

        echo $output;
    }

    else {
        $output.=  "<tr >
                <th><b>Study ID</b></th>
                <th><b>Study Name</b></th>
                <th><b>Study File</b></th>
                  <th><b>Created Date</b></th>
                <th><b> Delete </b></th>
    
                
            </tr>";
        echo $output;

    }
    $conn->close();

}

function addStudtFun(){
    $studyID=$_POST['studyID'];
    $studyName=$_POST['studyName'];
    $studyDate=$_POST['study_created_date'];
    $pdf = addslashes(file_get_contents($_FILES['studyFile']['tmp_name']));
    $filetype = addslashes($_FILES['studyFile']['type']);
    $namepdf = addslashes($_FILES['studyFile']['name']);

    $ext2 =explode('/',$filetype);
    $uploadFileType1=strtolower($ext2[1]);
    $flag2=0;
    //check file size
    if ($_FILES["studyFile"]["size"] > 1000000) {
        echo "<script> alert('Sorry, your file is too large') </script>";
    }
    else {

        if ($uploadFileType1 != "pdf" && $uploadFileType1 != "docx" && $uploadFileType1 != "txt"
            && $uploadFileType1 != "wps" && $uploadFileType1 != "plain" && $uploadFileType1 != "octet-stream") {
            echo "just pdf , word , text files can be send";
        }

        else {
            $conn = mysqli_connect("localhost", "root", "", "Projectdatabase");
            if ($conn->connect_error) {
                die("connection faild" . $conn->connect_error);
            }


            $sql = "SELECT id_study from study  ";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    if ($row['id_study'] == $studyID) {
                        $flag2 = 1;

                    }
                }
            }
            if ($flag2 == 1) {
                echo "<script>alert('invalid study id')</script>";
            } else {
                $sql = "INSERT INTO study (id_study, name_study,name_file,content_file,file_type,studyCreatedDate) VALUES ( $studyID, '$studyName','$namepdf',  '$pdf','$filetype','$studyDate')";

                if ($conn->query($sql) === TRUE)
                {
                    echo "Saved correctly";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }

                $conn->close();
            }
        }
    }
}
function deleteStudyFun()
{
    $deltemp=$_POST['colcon'];
    $conn = mysqli_connect("localhost", "root", "", "Projectdatabase");
    if ($conn->connect_error) {
        die("connection faild" . $conn->connect_error);
    }

    // sql to delete a record
    $sql = "DELETE FROM study WHERE id_study= $deltemp";
    $conn->query($sql);

    $conn->close();
    showStudys();
}//end func

function searchStudyFun()
{
    $conn = mysqli_connect("localhost", "root", "", "Projectdatabase");
    $output='';
    $result ='';
    if ($conn->connect_error) {
        die("connection faild" . $conn->connect_error);
    }
    $qry="";
    if($_POST['search_study_by']=='study_id'){
        $study_id=$_POST['search_study_txt'];
        $qry = "SELECT * from  study where id_study= $study_id";
        $result = $conn->query($qry);
    }
    elseif ($_POST['search_study_by']=='study_name')
    {
        $study_name=$_POST['search_study_txt'];
        $qry = "SELECT * from  study where name_study= '$study_name'";
        $result = $conn->query($qry);
    }
    if ($result ->num_rows > 0) {
        $output.=  "<tr>
                <th><b>Study ID</b></th>
                <th><b>Study Name</b></th>
                <th><b>Study File</b></th>
                  <th><b>Created Date</b></th>
                <th><b> Delete </b></th>
                
                
            </tr>";
        while ($row = $result-> fetch_assoc()) {
            $output.= '<tr><td>' . $row['id_study'] . '</td><td>' . $row['name_study'] . '</td>'."<td><a target='_blank' href='viewFile.php? id=".$row['id_study']."'>".$row['name_file']."</a></td>"
                .'<td>'. $row['studyCreatedDate'] . '</td>' .  '<td id="delete_std_td"><button class="deletestudbut">delete</button></td></tr>';
        }


    }
    else{
        $output.=  "<tr>
                <th><b>Study ID</b></th>
                <th><b>Study Name</b></th>
                <th><b>Study File</b></th>
                  <th><b>Created Date</b></th>
                <th><b> Delete </b></th>
                
            </tr>";
    }
    $conn->close();
    echo $output;
}//end searchStudyFun()

?>

<!DOCTYPE html>
<html>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="NajahBioUnitCSS.css">

</head>
<body>
<script>
    $(document).ready(function () {
        $(".deletestudbut").click(function () {
            var result=$(this).closest('tr');
            var colcon=result.find('td:eq(0)').text();
            if(confirm("Are you sure you want to delete this ? "))
            {

                        $.ajax({
                            method: "post",
                            data:{colcon},
                            url: "studyDatabase.php",
                            dataType: "html",
                            success: function (response) {
                                $('#tablestudy').html(response);
                            }
                        });
            }

        });

    });

</script>

</body>
</html>

