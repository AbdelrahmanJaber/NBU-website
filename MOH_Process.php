<?php
session_start();
$_POST['logout_nbu']=1;

if(isset($_POST['Show_Received_Studies'])){
    Show_Received_Studies();
}

if(isset($_POST['Sort_By_Name'])){
    Sort_By_Name();
}

if(isset($_POST['Sort_By_ID'])){
    Sort_By_ID();
}

if(isset($_POST['Sort_By_Date'])){
    Sort_By_Date();
}

if(isset($_POST["flag"]) && $_POST["flag"]=="Delete"){
    Delete_From_MOH_Table();

}

if(isset($_POST["Search"]) && $_POST["Search"]=="Search_Flag"){
    if($_POST['Search_Type']=="Search_By_Name") {
        Search_In_MOH_Table_By_Name();
    }
    else if($_POST['Search_Type']=="Search_By_ID"){
        Search_In_MOH_Table_By_ID();
    }

}

function Show_Received_Studies(){
    $host="localhost";
    $username="root";
    $password="";
    $db_name="moh_db";

    $conn=mysqli_connect($host,$username,$password,$db_name);

    if (mysqli_connect_errno()) {
        echo "can not connect to Database";
        exit;
    }

    $sql="SELECT * FROM received_files";

    $result=$conn->query($sql);

    $output="";

    if($result->num_rows>0){
        $output.="<table id=\"MOH_Table\">
                 <tr><th class=\"table_Header\"></th>
                     <th class=\"table_Header\">Study ID</th>
                     <th class=\"table_Header\">Study Name</th>
                     <th class=\"table_Header\">Study File</th>
                     <th class=\"table_Header\">Volunteers File</th>
                     <th class=\"table_Header\">Date Of Arrival</th>
                     </tr>";

        while($row=$result->fetch_assoc()){

            $output.="<tr>"
                ."<td class=\"table_Data\"><input type=\"checkbox\"></td>"
                ."<td class=\"table_Data\">".$row['study_id']."</td>"
                ."<td class=\"table_Data\">".$row['study_name']."</td>"
                ."<td class=\"table_Data\"><a target='_blank' href='View_Study_File_MOH.php? id=".$row['study_id']."'>".$row['study_file_name']."</a></td>"
                ."<td class=\"table_Data\"><a target='_blank' href='View_Volunteers_File_MOH.php? id=".$row['study_id']."'>".$row['volunteer_file_name']."</a></td>"
                ."<td class=\"table_Data\">".$row['date_of_received']."</td>"
                ."</tr>";

        }

        $output.="</table>";

    }

    else{
        $output.="<table id=\"MOH_Table\">
                 <tr><th class=\"table_Header\"></th>
                     <th class=\"table_Header\">Study ID</th>
                     <th class=\"table_Header\">Study Name</th>
                     <th class=\"table_Header\">Study File</th>
                     <th class=\"table_Header\">Volunteers File</th>
                     <th class=\"table_Header\">Date Of Arrival</th>
                     </tr></table>";
    }



    echo $output;

    $conn->close();


}

function Sort_By_Name(){
    $host="localhost";
    $username="root";
    $password="";
    $db_name="moh_db";

    $conn=mysqli_connect($host,$username,$password,$db_name);

    if (mysqli_connect_errno()) {
        echo "can not connect to Database";
        exit;
    }

    $sql="SELECT * FROM received_files ORDER BY study_name ASC";

    $result=$conn->query($sql);

    $output="";

    if($result->num_rows>0){
        $output.="<table id=\"MOH_Table\">
                 <tr><th class=\"table_Header\"></th>
                     <th class=\"table_Header\">Study ID</th>
                     <th class=\"table_Header\">Study Name</th>
                     <th class=\"table_Header\">Study File</th>
                     <th class=\"table_Header\">Volunteers File</th>
                     <th class=\"table_Header\">Date Of Arrival</th>
                     </tr>";

        while($row=$result->fetch_assoc()){

            $output.="<tr>"
                ."<td class=\"table_Data\"><input type=\"checkbox\"></td>"
                ."<td class=\"table_Data\">".$row['study_id']."</td>"
                ."<td class=\"table_Data\">".$row['study_name']."</td>"
                ."<td class=\"table_Data\"><a target='_blank' href='View_Study_File_MOH.php? id=".$row['study_id']."'>".$row['study_file_name']."</a></td>"
                ."<td class=\"table_Data\"><a target='_blank' href='View_Volunteers_File_MOH.php? id=".$row['study_id']."'>".$row['volunteer_file_name']."</a></td>"
                ."<td class=\"table_Data\">".$row['date_of_received']."</td>"
                ."</tr>";

        }

        $output.="</table>";

    }

    else{
        $output.="<table id=\"MOH_Table\">
                 <tr><th class=\"table_Header\"></th>
                     <th class=\"table_Header\">Study ID</th>
                     <th class=\"table_Header\">Study Name</th>
                     <th class=\"table_Header\">Study File</th>
                     <th class=\"table_Header\">Volunteers File</th>
                     <th class=\"table_Header\">Date Of Arrival</th>
                     </tr></table>";
    }



    echo $output;

    $conn->close();


}

function Sort_By_ID(){
    $host="localhost";
    $username="root";
    $password="";
    $db_name="moh_db";

    $conn=mysqli_connect($host,$username,$password,$db_name);

    if (mysqli_connect_errno()) {
        echo "can not connect to Database";
        exit;
    }

    $sql="SELECT * FROM received_files ORDER BY study_id ASC";

    $result=$conn->query($sql);

    $output="";

    if($result->num_rows>0){
        $output.="<table id=\"MOH_Table\">
                 <tr><th class=\"table_Header\"></th>
                     <th class=\"table_Header\">Study ID</th>
                     <th class=\"table_Header\">Study Name</th>
                     <th class=\"table_Header\">Study File</th>
                     <th class=\"table_Header\">Volunteers File</th>
                     <th class=\"table_Header\">Date Of Arrival</th>
                     </tr>";

        while($row=$result->fetch_assoc()){

            $output.="<tr>"
                ."<td class=\"table_Data\"><input type=\"checkbox\"></td>"
                ."<td class=\"table_Data\">".$row['study_id']."</td>"
                ."<td class=\"table_Data\">".$row['study_name']."</td>"
                ."<td class=\"table_Data\"><a target='_blank' href='View_Study_File_MOH.php? id=".$row['study_id']."'>".$row['study_file_name']."</a></td>"
                ."<td class=\"table_Data\"><a target='_blank' href='View_Volunteers_File_MOH.php? id=".$row['study_id']."'>".$row['volunteer_file_name']."</a></td>"
                ."<td class=\"table_Data\">".$row['date_of_received']."</td>"
                ."</tr>";

        }

        $output.="</table>";

    }

    else{
        $output.="<table id=\"MOH_Table\">
                 <tr><th class=\"table_Header\"></th>
                     <th class=\"table_Header\">Study ID</th>
                     <th class=\"table_Header\">Study Name</th>
                     <th class=\"table_Header\">Study File</th>
                     <th class=\"table_Header\">Volunteers File</th>
                     <th class=\"table_Header\">Date Of Arrival</th>
                     </tr></table>";
    }



    echo $output;

    $conn->close();


}

function Sort_By_Date(){
    $host="localhost";
    $username="root";
    $password="";
    $db_name="moh_db";

    $conn=mysqli_connect($host,$username,$password,$db_name);

    if (mysqli_connect_errno()) {
        echo "can not connect to Database";
        exit;
    }

    $sql="SELECT * FROM received_files ORDER BY date_of_received DESC";

    $result=$conn->query($sql);

    $output="";

    if($result->num_rows>0){
        $output.="<table id=\"MOH_Table\">
                 <tr><th class=\"table_Header\"></th>
                     <th class=\"table_Header\">Study ID</th>
                     <th class=\"table_Header\">Study Name</th>
                     <th class=\"table_Header\">Study File</th>
                     <th class=\"table_Header\">Volunteers File</th>
                     <th class=\"table_Header\">Date Of Arrival</th>
                     </tr>";

        while($row=$result->fetch_assoc()){

            $output.="<tr>"
                ."<td class=\"table_Data\"><input type=\"checkbox\"></td>"
                ."<td class=\"table_Data\">".$row['study_id']."</td>"
                ."<td class=\"table_Data\">".$row['study_name']."</td>"
                ."<td class=\"table_Data\"><a target='_blank' href='View_Study_File_MOH.php? id=".$row['study_id']."'>".$row['study_file_name']."</a></td>"
                ."<td class=\"table_Data\"><a target='_blank' href='View_Volunteers_File_MOH.php? id=".$row['study_id']."'>".$row['volunteer_file_name']."</a></td>"
                ."<td class=\"table_Data\">".$row['date_of_received']."</td>"
                ."</tr>";

        }

        $output.="</table>";

    }

    else{
        $output.="<table id=\"MOH_Table\">
                 <tr><th class=\"table_Header\"></th>
                     <th class=\"table_Header\">Study ID</th>
                     <th class=\"table_Header\">Study Name</th>
                     <th class=\"table_Header\">Study File</th>
                     <th class=\"table_Header\">Volunteers File</th>
                     <th class=\"table_Header\">Date Of Arrival</th>
                     </tr></table>";
    }



    echo $output;

    $conn->close();


}

function Delete_From_MOH_Table(){
    $id=$_POST["id"];

    $host="localhost";
    $username="root";
    $password="";
    $dbname="moh_db";

    $conn=mysqli_connect($host,$username,$password,$dbname);

    if (mysqli_connect_errno()) {
        echo "can not connect to Database";
        exit;
    }


    $sql="DELETE FROM received_files WHERE study_id='$id'";

    $result=$conn->query($sql);

    $conn->close();

    Show_Received_Studies();

}

function  Search_In_MOH_Table_By_Name(){
    $Search_Data=$_POST["SearchData"];

    $host="localhost";
    $username="root";
    $password="";
    $dbname="moh_db";

    $conn=mysqli_connect($host,$username,$password,$dbname);

    if (mysqli_connect_errno()) {
        echo "can not connect to Database";
        exit;
    }


    $sql="SELECT * FROM received_files WHERE study_name LIKE '$Search_Data%';";

    $result=$conn->query($sql);

    $output="";

    if($result->num_rows>0){
        $output.="<table id=\"MOH_Table\">
                 <tr><th class=\"table_Header\"></th>
                     <th class=\"table_Header\">Study ID</th>
                     <th class=\"table_Header\">Study Name</th>
                     <th class=\"table_Header\">Study File</th>
                     <th class=\"table_Header\">Volunteers File</th>
                     <th class=\"table_Header\">Date Of Arrival</th>
                     </tr>";

        while($row=$result->fetch_assoc()){

            $output.="<tr>"
                ."<td class=\"table_Data\"><input type=\"checkbox\"></td>"
                ."<td class=\"table_Data\">".$row['study_id']."</td>"
                ."<td class=\"table_Data\">".$row['study_name']."</td>"
                ."<td class=\"table_Data\"><a target='_blank' href='View_Study_File_MOH.php? id=".$row['study_id']."'>".$row['study_file_name']."</a></td>"
                ."<td class=\"table_Data\"><a target='_blank' href='View_Volunteers_File_MOH.php? id=".$row['study_id']."'>".$row['volunteer_file_name']."</a></td>"
                ."<td class=\"table_Data\">".$row['date_of_received']."</td>"
                ."</tr>";

        }

        $output.="</table>";

    }

    else{
        $output.="<table id=\"MOH_Table\">
                 <tr><th class=\"table_Header\"></th>
                     <th class=\"table_Header\">Study ID</th>
                     <th class=\"table_Header\">Study Name</th>
                     <th class=\"table_Header\">Study File</th>
                     <th class=\"table_Header\">Volunteers File</th>
                     <th class=\"table_Header\">Date Of Arrival</th>
                     </tr></table>";
    }

    echo $output;

    $conn->close();

}

function  Search_In_MOH_Table_By_ID(){
    $Search_Data=$_POST["SearchData"];

    $host="localhost";
    $username="root";
    $password="";
    $dbname="moh_db";

    $conn=mysqli_connect($host,$username,$password,$dbname);

    if (mysqli_connect_errno()) {
        echo "can not connect to Database";
        exit;
    }


    $sql="SELECT * FROM received_files WHERE study_id LIKE '$Search_Data%';";

    $result=$conn->query($sql);

    $output="";

    if($result->num_rows>0){
        $output.="<table id=\"MOH_Table\">
                 <tr><th class=\"table_Header\"></th>
                     <th class=\"table_Header\">Study ID</th>
                     <th class=\"table_Header\">Study Name</th>
                     <th class=\"table_Header\">Study File</th>
                     <th class=\"table_Header\">Volunteers File</th>
                     <th class=\"table_Header\">Date Of Arrival</th>
                     </tr>";

        while($row=$result->fetch_assoc()){

            $output.="<tr>"
                ."<td class=\"table_Data\"><input type=\"checkbox\"></td>"
                ."<td class=\"table_Data\">".$row['study_id']."</td>"
                ."<td class=\"table_Data\">".$row['study_name']."</td>"
                ."<td class=\"table_Data\"><a target='_blank' href='View_Study_File_MOH.php? id=".$row['study_id']."'>".$row['study_file_name']."</a></td>"
                ."<td class=\"table_Data\"><a target='_blank' href='View_Volunteers_File_MOH.php? id=".$row['study_id']."'>".$row['volunteer_file_name']."</a></td>"
                ."<td class=\"table_Data\">".$row['date_of_received']."</td>"
                ."</tr>";

        }

        $output.="</table>";

    }

    else{
        $output.="<table id=\"MOH_Table\">
                 <tr><th class=\"table_Header\"></th>
                     <th class=\"table_Header\">Study ID</th>
                     <th class=\"table_Header\">Study Name</th>
                     <th class=\"table_Header\">Study File</th>
                     <th class=\"table_Header\">Volunteers File</th>
                     <th class=\"table_Header\">Date Of Arrival</th>
                     </tr></table>";
    }

    echo $output;

    $conn->close();

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="MOH.css">

</head>
<body>

</body>
</html>

