<?php

session_start();
$_POST['logout_nbu']=1;

if(isset($_POST['Show_Received_Studies_Without_Any_Sort'])){
    Show_Received_Studies_Without_Any_Sort();

}
else if(isset($_POST['Show_Received_Studies_With_Sort_By_Name'])){
    Show_Received_Studies_With_Sort_By_Name();
}
else if (isset($_POST['Show_Received_Studies_With_Sort_By_ID'])){
    Show_Received_Studies_With_Sort_By_ID();
}
else if(isset($_POST['Show_Received_Studies_With_Sort_By_Date'])){
    Show_Received_Studies_With_Sort_By_Date();
}
else if(isset($_POST['Show_Accepted_Studies_Without_Any_Sort'])){
    Show_Accepted_Studies_Without_Any_Sort();

}
else if(isset($_POST['Show_Accepted_Studies_With_Sort_By_Name'])){
    Show_Accepted_Studies_With_Sort_By_Name();
}
else if (isset($_POST['Show_Accepted_Studies_With_Sort_By_ID'])){
    Show_Accepted_Studies_With_Sort_By_ID();
}
else if(isset($_POST['Show_Accepted_Studies_With_Sort_By_Date'])){
    Show_Accepted_Studies_With_Sort_By_Date();
}
else if(isset($_POST['Show_Rejected_Studies_Without_Any_Sort'])){
    Show_Rejected_Studies_Without_Any_Sort();

}
else if(isset($_POST['Show_Rejected_Studies_With_Sort_By_Name'])){
    Show_Rejected_Studies_With_Sort_By_Name();
}
else if (isset($_POST['Show_Rejected_Studies_With_Sort_By_ID'])){
    Show_Rejected_Studies_With_Sort_By_ID();
}
else if(isset($_POST['Show_Rejected_Studies_With_Sort_By_Date'])){
    Show_Rejected_Studies_With_Sort_By_Date();
}

if(isset($_POST['flag_Add_To_Accepted']) && $_POST['flag_Add_To_Accepted']=="Add_To_Accepted_Studies"){
    Add_To_Accepted_Studies();

}

if(isset($_POST['flag_Add_To_Rejected']) && $_POST['flag_Add_To_Rejected']=="Add_To_Rejected_Studies"){
    Add_To_Rejected_Studies();

}

if(isset($_POST['flag_for_delete'])){
    $The_ID=$_POST['id_for_delete'];
    if($_POST['flag_for_delete']=="delete_from_received_files"){
        Delete_From_Received_Files($The_ID);

    }
    else if($_POST['flag_for_delete']=="delete_from_accepted_files"){
        Delete_From_Accepted_Files($The_ID);

    }
    else if($_POST['flag_for_delete']=="delete_from_rejected_files"){
        Delete_From_Rejected_Files($The_ID);

    }

}

if(isset($_POST['flag_for_search'])){

    $Search_Data=$_POST['SearchData'];

    if($_POST['flag_for_search']=="search_in_received_files"){
        if($_POST['Search_Type']=="Search_By_Name") {
            Search_In_Received_Files_By_Name($Search_Data);
        }
        else if($_POST['Search_Type']=="Search_By_ID"){
            Search_In_Received_Files_By_ID($Search_Data);
        }
    }
    else if($_POST['flag_for_search']=="search_in_accepted_files"){
        if($_POST['Search_Type']=="Search_By_Name") {
            Search_In_Accepted_Files_By_Name($Search_Data);
        }
        else if($_POST['Search_Type']=="Search_By_ID"){
            Search_In_Accepted_Files_By_ID($Search_Data);
        }

    }
    else if($_POST['flag_for_search']=="search_in_rejected_files"){
        if($_POST['Search_Type']=="Search_By_Name") {
            Search_In_Rejected_Files_By_Name($Search_Data);
        }
        else if($_POST['Search_Type']=="Search_By_ID"){
            Search_In_Rejected_Files_By_ID($Search_Data);
        }

    }

}

if(isset($_POST['flag_Add_To_Received_Studies_From_Accepted_Studies']) && $_POST['flag_Add_To_Received_Studies_From_Accepted_Studies']=="Add_To_Received_Studies_From_Accepted_Studies"){

    Add_To_Received_Studies_From_Accepted_Studies();

}

if(isset($_POST['flag_Add_To_Received_Studies_From_Rejected_Studies']) && $_POST['flag_Add_To_Received_Studies_From_Rejected_Studies']=="Add_To_Received_Studies_From_Rejected_Studies"){

    Add_To_Received_Studies_From_Rejected_Studies();

}

if(isset($_POST['study_text_flag']) && $_POST['study_text_flag']=="study_text") {
    $id_for_the_text=$_POST['id_for_get_the_text'];
    store_the_study_text($id_for_the_text);

}

function Show_Received_Studies_Without_Any_Sort(){
    $host="localhost";
    $username="root";
    $password="";
    $db_name="irb_db";

    $conn=mysqli_connect($host,$username,$password,$db_name);

    if (mysqli_connect_errno()) {
        echo "can not connect to Database";
        exit;
    }

    $sql="SELECT * FROM received_files";

    $result=$conn->query($sql);

    $output="";

    if($result->num_rows>0){
        $output.="<table id=\"IRB_Table\">
                 <tr><th class=\"table_Header\">Delete</th>
                     <th class=\"table_Header\">Study ID</th>
                     <th class=\"table_Header\">Study Name</th>
                     <th class=\"table_Header\">Study File</th>
                     <th class=\"table_Header\">Date Of Arrival</th>
                     <th class=\"table_Header\">Accept</th>
                     <th class=\"table_Header\">Reject</th>
                     </tr>";

        while($row=$result->fetch_assoc()){

            $output.="<tr>"
                ."<td class=\"table_Data\"><input type=\"checkbox\"></td>"
                ."<td class=\"table_Data\">".$row['study_id']."</td>"
                ."<td class=\"table_Data\">".$row['study_name']."</td>"
                ."<td class=\"table_Data\"><a target='_blank' href='View_Study_File_IRB.php? id=".$row['study_id']."'>".$row['file_name']."</a></td>"
                ."<td class=\"table_Data\">".$row['date_of_recived']."</td>"
                ."<td class=\"table_Data\"><input type=\"checkbox\"></td>"
                ."<td class=\"table_Data\"><input type=\"checkbox\"></td>"
                ."</tr>";

        }

        $output.="</table>";

    }

    else{
        $output.="<table id=\"IRB_Table\">
                 <tr><th class=\"table_Header\">Delete</th>
                     <th class=\"table_Header\">Study ID</th>
                     <th class=\"table_Header\">Study Name</th>
                     <th class=\"table_Header\">Study File</th>
                     <th class=\"table_Header\">Date Of Arrival</th>
                     <th class=\"table_Header\">Accept</th>
                     <th class=\"table_Header\">Reject</th>
                     </tr></table>";


    }

    $button="<br><br><button id='sub'>Submit</button>";


    echo $output;

    echo $button;



    $conn->close();


}

function Show_Received_Studies_With_Sort_By_Name(){
    $host="localhost";
    $username="root";
    $password="";
    $db_name="irb_db";

    $conn=mysqli_connect($host,$username,$password,$db_name);

    if (mysqli_connect_errno()) {
        echo "can not connect to Database";
        exit;
    }

    $sql="SELECT * FROM received_files ORDER BY study_name ASC";

    $result=$conn->query($sql);

    $output="";

    if($result->num_rows>0){
        $output.="<table id=\"IRB_Table\">
                 <tr><th class=\"table_Header\">Delete</th>
                     <th class=\"table_Header\">Study ID</th>
                     <th class=\"table_Header\">Study Name</th>
                     <th class=\"table_Header\">Study File</th>
                     <th class=\"table_Header\">Date Of Arrival</th>
                     <th class=\"table_Header\">Accept</th>
                     <th class=\"table_Header\">Reject</th>
                     </tr>";

        while($row=$result->fetch_assoc()){

            $output.="<tr>"
                ."<td class=\"table_Data\"><input type=\"checkbox\"></td>"
                ."<td class=\"table_Data\">".$row['study_id']."</td>"
                ."<td class=\"table_Data\">".$row['study_name']."</td>"
                ."<td class=\"table_Data\"><a target='_blank' href='View_Study_File_IRB.php? id=".$row['study_id']."'>".$row['file_name']."</a></td>"
                ."<td class=\"table_Data\">".$row['date_of_recived']."</td>"
                ."<td class=\"table_Data\"><input type=\"checkbox\"></td>"
                ."<td class=\"table_Data\"><input type=\"checkbox\"></td>"
                ."</tr>";

        }

        $output.="</table>";

    }

    else{
        $output.="<table id=\"IRB_Table\">
                 <tr><th class=\"table_Header\">Delete</th>
                     <th class=\"table_Header\">Study ID</th>
                     <th class=\"table_Header\">Study Name</th>
                     <th class=\"table_Header\">Study File</th>
                     <th class=\"table_Header\">Date Of Arrival</th>
                     <th class=\"table_Header\">Accept</th>
                     <th class=\"table_Header\">Reject</th>
                     </tr></table>";
    }



    $button="<br><br><button id='sub'>Submit</button>";

    echo $output;

    echo $button;

    $conn->close();


}

function Show_Received_Studies_With_Sort_By_ID(){
    $host="localhost";
    $username="root";
    $password="";
    $db_name="irb_db";

    $conn=mysqli_connect($host,$username,$password,$db_name);

    if (mysqli_connect_errno()) {
        echo "can not connect to Database";
        exit;
    }

    $sql="SELECT * FROM received_files ORDER BY study_id ASC";

    $result=$conn->query($sql);

    $output="";

    if($result->num_rows>0){
        $output.="<table id=\"IRB_Table\">
                 <tr><th class=\"table_Header\">Delete</th>
                     <th class=\"table_Header\">Study ID</th>
                     <th class=\"table_Header\">Study Name</th>
                     <th class=\"table_Header\">Study File</th>
                     <th class=\"table_Header\">Date Of Arrival</th>
                     <th class=\"table_Header\">Accept</th>
                     <th class=\"table_Header\">Reject</th>
                     </tr>";

        while($row=$result->fetch_assoc()){

            $output.="<tr>"
                ."<td class=\"table_Data\"><input type=\"checkbox\"></td>"
                ."<td class=\"table_Data\">".$row['study_id']."</td>"
                ."<td class=\"table_Data\">".$row['study_name']."</td>"
                ."<td class=\"table_Data\"><a target='_blank' href='View_Study_File_IRB.php? id=".$row['study_id']."'>".$row['file_name']."</a></td>"
                ."<td class=\"table_Data\">".$row['date_of_recived']."</td>"
                ."<td class=\"table_Data\"><input type=\"checkbox\"></td>"
                ."<td class=\"table_Data\"><input type=\"checkbox\"></td>"
                ."</tr>";

        }

        $output.="</table>";

    }

    else{
        $output.="<table id=\"IRB_Table\">
                 <tr><th class=\"table_Header\">Delete</th>
                     <th class=\"table_Header\">Study ID</th>
                     <th class=\"table_Header\">Study Name</th>
                     <th class=\"table_Header\">Study File</th>
                     <th class=\"table_Header\">Date Of Arrival</th>
                     <th class=\"table_Header\">Accept</th>
                     <th class=\"table_Header\">Reject</th>
                     </tr></table>";
    }



    $button="<br><br><button id='sub'>Submit</button>";

    echo $output;

    echo $button;

    $conn->close();


}

function Show_Received_Studies_With_Sort_By_Date(){
    $host="localhost";
    $username="root";
    $password="";
    $db_name="irb_db";

    $conn=mysqli_connect($host,$username,$password,$db_name);

    if (mysqli_connect_errno()) {
        echo "can not connect to Database";
        exit;
    }

    $sql="SELECT * FROM received_files ORDER BY date_of_recived DESC";

    $result=$conn->query($sql);

    $output="";

    if($result->num_rows>0){
        $output.="<table id=\"IRB_Table\">
                 <tr><th class=\"table_Header\">Delete</th>
                     <th class=\"table_Header\">Study ID</th>
                     <th class=\"table_Header\">Study Name</th>
                     <th class=\"table_Header\">Study File</th>
                     <th class=\"table_Header\">Date Of Arrival</th>
                     <th class=\"table_Header\">Accept</th>
                     <th class=\"table_Header\">Reject</th>
                     </tr>";

        while($row=$result->fetch_assoc()){

            $output.="<tr>"
                ."<td class=\"table_Data\"><input type=\"checkbox\"></td>"
                ."<td class=\"table_Data\">".$row['study_id']."</td>"
                ."<td class=\"table_Data\">".$row['study_name']."</td>"
                ."<td class=\"table_Data\"><a target='_blank' href='View_Study_File_IRB.php? id=".$row['study_id']."'>".$row['file_name']."</a></td>"
                ."<td class=\"table_Data\">".$row['date_of_recived']."</td>"
                ."<td class=\"table_Data\"><input type=\"checkbox\"></td>"
                ."<td class=\"table_Data\"><input type=\"checkbox\"></td>"
                ."</tr>";

        }

        $output.="</table>";

    }

    else{
        $output.="<table id=\"IRB_Table\">
                 <tr><th class=\"table_Header\">Delete</th>
                     <th class=\"table_Header\">Study ID</th>
                     <th class=\"table_Header\">Study Name</th>
                     <th class=\"table_Header\">Study File</th>
                     <th class=\"table_Header\">Date Of Arrival</th>
                     <th class=\"table_Header\">Accept</th>
                     <th class=\"table_Header\">Reject</th>
                     </tr></table>";
    }



    $button="<br><br><button id='sub'>Submit</button>";

    echo $output;

    echo $button;

    $conn->close();


}


function Add_To_Accepted_Studies(){
    $Study_ID=$_POST['Study_ID'];

    $host="localhost";
    $username="root";
    $password="";
    $dbname="irb_db";

    $conn=mysqli_connect($host,$username,$password,$dbname);

    $conn_to_select=mysqli_connect($host,$username,$password,$dbname);

    $conn_to_add_to_accepted_table=mysqli_connect($host,$username,$password,$dbname);

    if (mysqli_connect_errno()) {
        echo "can not connect to Database";
        exit;
    }

    $sql="DELETE FROM received_files WHERE study_id='$Study_ID'";

    $sql_to_select="SELECT * FROM received_files WHERE study_id='$Study_ID'";


    $result=$conn_to_select->query($sql_to_select);

    $row=$result->fetch_assoc();

    $StudyID=$row['study_id'];
    $Study_Name=$row['study_name'];

    $File_Name=$row['file_name'];
    $File_Content=addslashes($row['file_content']);
    $File_Type=$row['file_type'];

    $Date_Of_Sent=$row['date_of_recived'];

    $Study_announcement=$row['study_text'];



    $sql_to_add_to_accepted_table="INSERT INTO accepted_studies(study_id,study_name,file_type,file_name,file_content,date_of_recived,study_text) VALUES ('$StudyID','$Study_Name','$File_Type','$File_Name','$File_Content','$Date_Of_Sent','$Study_announcement')";



    $conn_to_add_to_accepted_table->query($sql_to_add_to_accepted_table);

    $conn->query($sql);




    $conn_to_select->close();

    $conn_to_add_to_accepted_table->close();

    $conn->close();


    Show_Received_Studies_Without_Any_Sort();

}

function Show_Accepted_Studies_Without_Any_Sort(){
    $host="localhost";
    $username="root";
    $password="";
    $db_name="irb_db";

    $conn=mysqli_connect($host,$username,$password,$db_name);

    if (mysqli_connect_errno()) {
        echo "can not connect to Database";
        exit;
    }

    $sql="SELECT * FROM accepted_studies";

    $result=$conn->query($sql);

    $output="";

    if($result->num_rows>0) {

        $output .= "<table id=\"IRB_Table\">
                 <tr><th class=\"table_Header\">Delete</th>
                     <th class=\"table_Header\">Study ID</th>
                     <th class=\"table_Header\">Study Name</th>
                     <th class=\"table_Header\">Study File</th>
                     <th class=\"table_Header\">Date Of Arrival</th>     
                     <th class=\"table_Header\">Restore</th>
                     <th class=\"table_Header\">Post</th>
                     </tr>";

        while ($row = $result->fetch_assoc()) {


            if ($row['flag_for_posted_studies'] == 1) {

                $output .= "<tr>"
                    . "<td class=\"table_Data\"><input type=\"checkbox\"></td>"
                    . "<td class=\"table_Data\">" . $row['study_id'] . "</td>"
                    . "<td class=\"table_Data\">" . $row['study_name'] . "</td>"
                    . "<td class=\"table_Data\"><a target='_blank' href='View_Accepted_Studies.php? id=" . $row['study_id'] . "'>" . $row['file_name'] . "</a></td>"
                    . "<td class=\"table_Data\">" . $row['date_of_recived'] . "</td>"
                    . "<td class=\"table_Data\"><input type=\"checkbox\" disabled></td>"
                    . "<td class=\"table_Data\"><p class='posted_statement'>POSTED</p></td>"
                    . "</tr>";

            } else {
                $output .= "<tr>"
                    . "<td class=\"table_Data\"><input type=\"checkbox\"></td>"
                    . "<td class=\"table_Data\">" . $row['study_id'] . "</td>"
                    . "<td class=\"table_Data\">" . $row['study_name'] . "</td>"
                    . "<td class=\"table_Data\"><a target='_blank' href='View_Accepted_Studies.php? id=" . $row['study_id'] . "'>" . $row['file_name'] . "</a></td>"
                    . "<td class=\"table_Data\">" . $row['date_of_recived'] . "</td>"
                    . "<td class=\"table_Data\"><input type=\"checkbox\"></td>"
                    . "<td class=\"table_Data\"><button class='post'>Post</button></td>"
                    . "</tr>";
            }

        }
        $output .= "</table>";
    }

    else{
        $output.="<table id=\"IRB_Table\">
                 <tr><th class=\"table_Header\">Delete</th>
                     <th class=\"table_Header\">Study ID</th>
                     <th class=\"table_Header\">Study Name</th>
                     <th class=\"table_Header\">Study File</th>
                     <th class=\"table_Header\">Date Of Arrival</th>
                     <th class=\"table_Header\">Restore</th>
                     <th class=\"table_Header\">Post</th>
                     </tr></table>";
    }

    $button="</br></br><button id='restore_for_accepted_studies'>Restore</button>";

    echo $output;

    echo $button;

    $conn->close();

}

function Show_Accepted_Studies_With_Sort_By_Name(){
    $host="localhost";
    $username="root";
    $password="";
    $db_name="irb_db";

    $conn=mysqli_connect($host,$username,$password,$db_name);

    if (mysqli_connect_errno()) {
        echo "can not connect to Database";
        exit;
    }

    $sql="SELECT * FROM accepted_studies ORDER BY study_name ASC";

    $result=$conn->query($sql);

    $output="";

    if($result->num_rows>0) {

        $output .= "<table id=\"IRB_Table\">
                 <tr><th class=\"table_Header\">Delete</th>
                     <th class=\"table_Header\">Study ID</th>
                     <th class=\"table_Header\">Study Name</th>
                     <th class=\"table_Header\">Study File</th>
                     <th class=\"table_Header\">Date Of Arrival</th>     
                     <th class=\"table_Header\">Restore</th>
                     <th class=\"table_Header\">Post</th>
                     </tr>";

        while ($row = $result->fetch_assoc()) {


            if ($row['flag_for_posted_studies'] == 1) {

                $output .= "<tr>"
                    . "<td class=\"table_Data\"><input type=\"checkbox\"></td>"
                    . "<td class=\"table_Data\">" . $row['study_id'] . "</td>"
                    . "<td class=\"table_Data\">" . $row['study_name'] . "</td>"
                    . "<td class=\"table_Data\"><a target='_blank' href='View_Accepted_Studies.php? id=" . $row['study_id'] . "'>" . $row['file_name'] . "</a></td>"
                    . "<td class=\"table_Data\">" . $row['date_of_recived'] . "</td>"
                    . "<td class=\"table_Data\"><input type=\"checkbox\" disabled></td>"
                    . "<td class=\"table_Data\"><p class='posted_statement'>POSTED</p></td>"
                    . "</tr>";

            } else {
                $output .= "<tr>"
                    . "<td class=\"table_Data\"><input type=\"checkbox\"></td>"
                    . "<td class=\"table_Data\">" . $row['study_id'] . "</td>"
                    . "<td class=\"table_Data\">" . $row['study_name'] . "</td>"
                    . "<td class=\"table_Data\"><a target='_blank' href='View_Accepted_Studies.php? id=" . $row['study_id'] . "'>" . $row['file_name'] . "</a></td>"
                    . "<td class=\"table_Data\">" . $row['date_of_recived'] . "</td>"
                    . "<td class=\"table_Data\"><input type=\"checkbox\"></td>"
                    . "<td class=\"table_Data\"><button class='post'>Post</button></td>"
                    . "</tr>";
            }

        }
        $output .= "</table>";
    }

    else{
        $output.="<table id=\"IRB_Table\">
                 <tr><th class=\"table_Header\">Delete</th>
                     <th class=\"table_Header\">Study ID</th>
                     <th class=\"table_Header\">Study Name</th>
                     <th class=\"table_Header\">Study File</th>
                     <th class=\"table_Header\">Date Of Arrival</th>
                     <th class=\"table_Header\">Restore</th>
                     <th class=\"table_Header\">Post</th>
                     </tr></table>";
    }

    $button="</br></br><button id='restore_for_accepted_studies'>Restore</button>";

    echo $output;

    echo $button;

    $conn->close();
}


function Show_Accepted_Studies_With_Sort_By_ID(){
    $host="localhost";
    $username="root";
    $password="";
    $db_name="irb_db";

    $conn=mysqli_connect($host,$username,$password,$db_name);

    if (mysqli_connect_errno()) {
        echo "can not connect to Database";
        exit;
    }

    $sql="SELECT * FROM accepted_studies ORDER BY study_id ASC";

    $result=$conn->query($sql);

    $output="";

    if($result->num_rows>0) {

        $output .= "<table id=\"IRB_Table\">
                 <tr><th class=\"table_Header\">Delete</th>
                     <th class=\"table_Header\">Study ID</th>
                     <th class=\"table_Header\">Study Name</th>
                     <th class=\"table_Header\">Study File</th>
                     <th class=\"table_Header\">Date Of Arrival</th>     
                     <th class=\"table_Header\">Restore</th>
                     <th class=\"table_Header\">Post</th>
                     </tr>";

        while ($row = $result->fetch_assoc()) {


            if ($row['flag_for_posted_studies'] == 1) {

                $output .= "<tr>"
                    . "<td class=\"table_Data\"><input type=\"checkbox\"></td>"
                    . "<td class=\"table_Data\">" . $row['study_id'] . "</td>"
                    . "<td class=\"table_Data\">" . $row['study_name'] . "</td>"
                    . "<td class=\"table_Data\"><a target='_blank' href='View_Accepted_Studies.php? id=" . $row['study_id'] . "'>" . $row['file_name'] . "</a></td>"
                    . "<td class=\"table_Data\">" . $row['date_of_recived'] . "</td>"
                    . "<td class=\"table_Data\"><input type=\"checkbox\" disabled></td>"
                    . "<td class=\"table_Data\"><p class='posted_statement'>POSTED</p></td>"
                    . "</tr>";

            } else {
                $output .= "<tr>"
                    . "<td class=\"table_Data\"><input type=\"checkbox\"></td>"
                    . "<td class=\"table_Data\">" . $row['study_id'] . "</td>"
                    . "<td class=\"table_Data\">" . $row['study_name'] . "</td>"
                    . "<td class=\"table_Data\"><a target='_blank' href='View_Accepted_Studies.php? id=" . $row['study_id'] . "'>" . $row['file_name'] . "</a></td>"
                    . "<td class=\"table_Data\">" . $row['date_of_recived'] . "</td>"
                    . "<td class=\"table_Data\"><input type=\"checkbox\"></td>"
                    . "<td class=\"table_Data\"><button class='post'>Post</button></td>"
                    . "</tr>";
            }

        }
        $output .= "</table>";
    }

    else{
        $output.="<table id=\"IRB_Table\">
                 <tr><th class=\"table_Header\">Delete</th>
                     <th class=\"table_Header\">Study ID</th>
                     <th class=\"table_Header\">Study Name</th>
                     <th class=\"table_Header\">Study File</th>
                     <th class=\"table_Header\">Date Of Arrival</th>
                     <th class=\"table_Header\">Restore</th>
                     <th class=\"table_Header\">Post</th>
                     </tr></table>";
    }

    $button="</br></br><button id='restore_for_accepted_studies'>Restore</button>";

    echo $output;

    echo $button;

    $conn->close();

}

function Show_Accepted_Studies_With_Sort_By_Date(){
    $host="localhost";
    $username="root";
    $password="";
    $db_name="irb_db";

    $conn=mysqli_connect($host,$username,$password,$db_name);

    if (mysqli_connect_errno()) {
        echo "can not connect to Database";
        exit;
    }

    $sql="SELECT * FROM accepted_studies ORDER BY date_of_recived DESC";

    $result=$conn->query($sql);

    $output="";

    if($result->num_rows>0) {

        $output .= "<table id=\"IRB_Table\">
                 <tr><th class=\"table_Header\">Delete</th>
                     <th class=\"table_Header\">Study ID</th>
                     <th class=\"table_Header\">Study Name</th>
                     <th class=\"table_Header\">Study File</th>
                     <th class=\"table_Header\">Date Of Arrival</th>     
                     <th class=\"table_Header\">Restore</th>
                     <th class=\"table_Header\">Post</th>
                     </tr>";

        while ($row = $result->fetch_assoc()) {


            if ($row['flag_for_posted_studies'] == 1) {

                $output .= "<tr>"
                    . "<td class=\"table_Data\"><input type=\"checkbox\"></td>"
                    . "<td class=\"table_Data\">" . $row['study_id'] . "</td>"
                    . "<td class=\"table_Data\">" . $row['study_name'] . "</td>"
                    . "<td class=\"table_Data\"><a target='_blank' href='View_Accepted_Studies.php? id=" . $row['study_id'] . "'>" . $row['file_name'] . "</a></td>"
                    . "<td class=\"table_Data\">" . $row['date_of_recived'] . "</td>"
                    . "<td class=\"table_Data\"><input type=\"checkbox\" disabled></td>"
                    . "<td class=\"table_Data\"><p class='posted_statement'>POSTED</p></td>"
                    . "</tr>";

            } else {
                $output .= "<tr>"
                    . "<td class=\"table_Data\"><input type=\"checkbox\"></td>"
                    . "<td class=\"table_Data\">" . $row['study_id'] . "</td>"
                    . "<td class=\"table_Data\">" . $row['study_name'] . "</td>"
                    . "<td class=\"table_Data\"><a target='_blank' href='View_Accepted_Studies.php? id=" . $row['study_id'] . "'>" . $row['file_name'] . "</a></td>"
                    . "<td class=\"table_Data\">" . $row['date_of_recived'] . "</td>"
                    . "<td class=\"table_Data\"><input type=\"checkbox\"></td>"
                    . "<td class=\"table_Data\"><button class='post'>Post</button></td>"
                    . "</tr>";
            }

        }
        $output .= "</table>";
    }

    else{
        $output.="<table id=\"IRB_Table\">
                 <tr><th class=\"table_Header\">Delete</th>
                     <th class=\"table_Header\">Study ID</th>
                     <th class=\"table_Header\">Study Name</th>
                     <th class=\"table_Header\">Study File</th>
                     <th class=\"table_Header\">Date Of Arrival</th>
                     <th class=\"table_Header\">Restore</th>
                     <th class=\"table_Header\">Post</th>
                     </tr></table>";
    }

    $button="</br></br><button id='restore_for_accepted_studies'>Restore</button>";

    echo $output;

    echo $button;

    $conn->close();

}

function Add_To_Rejected_Studies(){
    $Study_ID = $_POST['Study_ID'];

    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "irb_db";

    $conn = mysqli_connect($host, $username, $password, $dbname);

    $conn_to_select = mysqli_connect($host, $username, $password, $dbname);

    $conn_to_add_to_rejected_table = mysqli_connect($host, $username, $password, $dbname);

    if (mysqli_connect_errno()) {
        echo "can not connect to Database";
        exit;
    }

    $sql = "DELETE FROM received_files WHERE study_id='$Study_ID'";

    $sql_to_select = "SELECT * FROM received_files WHERE study_id='$Study_ID'";


    $result = $conn_to_select->query($sql_to_select);

    $row = $result->fetch_assoc();

    $StudyID = $row['study_id'];
    $Study_Name = $row['study_name'];

    $File_Name = $row['file_name'];
    $File_Content = addslashes($row['file_content']);
    $File_Type = $row['file_type'];

    $Date_Of_Sent = $row['date_of_recived'];

    $Study_announcement = $row['study_text'];


    $sql_to_add_to_rejected_table = "INSERT INTO rejected_studies(study_id,study_name,file_type,file_name,file_content,date_of_recived,study_text) VALUES ('$StudyID','$Study_Name','$File_Type','$File_Name','$File_Content','$Date_Of_Sent','$Study_announcement')";


    $conn_to_add_to_rejected_table->query($sql_to_add_to_rejected_table);

    $conn->query($sql);


    $conn_to_select->close();

    $conn_to_add_to_rejected_table->close();

    $conn->close();


    Show_Received_Studies_Without_Any_Sort();

}

function Show_Rejected_Studies_Without_Any_Sort(){
    $host="localhost";
    $username="root";
    $password="";
    $db_name="irb_db";

    $conn=mysqli_connect($host,$username,$password,$db_name);

    if (mysqli_connect_errno()) {
        echo "can not connect to Database";
        exit;
    }

    $sql="SELECT * FROM rejected_studies";

    $result=$conn->query($sql);

    $output="";

    if($result->num_rows>0){
        $output.="<table id=\"IRB_Table\">
                 <tr><th class=\"table_Header\">Delete</th>
                     <th class=\"table_Header\">Study ID</th>
                     <th class=\"table_Header\">Study Name</th>
                     <th class=\"table_Header\">Study File</th>
                     <th class=\"table_Header\">Date Of Arrival</th>    
                     <th class=\"table_Header\">Restore</th>        
                     </tr>";

        while($row=$result->fetch_assoc()){

            $output.="<tr>"
                ."<td class=\"table_Data\"><input type=\"checkbox\"></td>"
                ."<td class=\"table_Data\">".$row['study_id']."</td>"
                ."<td class=\"table_Data\">".$row['study_name']."</td>"
                ."<td class=\"table_Data\"><a target='_blank' href='View_Rejected_Studies.php? id=".$row['study_id']."'>".$row['file_name']."</a></td>"
                ."<td class=\"table_Data\">".$row['date_of_recived']."</td>"
                ."<td class=\"table_Data\"><input type=\"checkbox\"></td>"
                ."</tr>";

        }

        $output.="</table>";

    }

    else{
        $output.="<table id=\"IRB_Table\">
                 <tr><th class=\"table_Header\">Delete</th>
                     <th class=\"table_Header\">Study ID</th>
                     <th class=\"table_Header\">Study Name</th>
                     <th class=\"table_Header\">Study File</th>
                     <th class=\"table_Header\">Date Of Arrival</th>
                     <th class=\"table_Header\">Restore</th>
                     </tr></table>";
    }


    $button="</br></br><button id='restore_for_rejected_studies'>Restore</button>";

    echo $output;

    echo $button;

    $conn->close();

}

function Show_Rejected_Studies_With_Sort_By_Name(){
    $host="localhost";
    $username="root";
    $password="";
    $db_name="irb_db";

    $conn=mysqli_connect($host,$username,$password,$db_name);

    if (mysqli_connect_errno()) {
        echo "can not connect to Database";
        exit;
    }

    $sql="SELECT * FROM rejected_studies ORDER BY study_name ASC";

    $result=$conn->query($sql);

    $output="";

    if($result->num_rows>0){
        $output.="<table id=\"IRB_Table\">
                 <tr><th class=\"table_Header\">Delete</th>
                     <th class=\"table_Header\">Study ID</th>
                     <th class=\"table_Header\">Study Name</th>
                     <th class=\"table_Header\">Study File</th>
                     <th class=\"table_Header\">Date Of Arrival</th>
                      <th class=\"table_Header\">Restore</th>             
                     </tr>";

        while($row=$result->fetch_assoc()){

            $output.="<tr>"
                ."<td class=\"table_Data\"><input type=\"checkbox\"></td>"
                ."<td class=\"table_Data\">".$row['study_id']."</td>"
                ."<td class=\"table_Data\">".$row['study_name']."</td>"
                ."<td class=\"table_Data\"><a target='_blank' href='View_Rejected_Studies.php? id=".$row['study_id']."'>".$row['file_name']."</a></td>"
                ."<td class=\"table_Data\">".$row['date_of_recived']."</td>"
                ."<td class=\"table_Data\"><input type=\"checkbox\"></td>"
                ."</tr>";

        }

        $output.="</table>";

    }

    else{
        $output.="<table id=\"IRB_Table\">
                 <tr><th class=\"table_Header\">Delete</th>
                     <th class=\"table_Header\">Study ID</th>
                     <th class=\"table_Header\">Study Name</th>
                     <th class=\"table_Header\">Study File</th>
                     <th class=\"table_Header\">Date Of Arrival</th>
                     <th class=\"table_Header\">Restore</th>
                     </tr></table>";
    }



    $button="</br></br><button id='restore_for_rejected_studies'>Restore</button>";

    echo $output;

    echo $button;

    $conn->close();

}


function Show_Rejected_Studies_With_Sort_By_ID(){
    $host="localhost";
    $username="root";
    $password="";
    $db_name="irb_db";

    $conn=mysqli_connect($host,$username,$password,$db_name);

    if (mysqli_connect_errno()) {
        echo "can not connect to Database";
        exit;
    }

    $sql="SELECT * FROM rejected_studies ORDER BY study_id ASC";

    $result=$conn->query($sql);

    $output="";

    if($result->num_rows>0){
        $output.="<table id=\"IRB_Table\">
                 <tr><th class=\"table_Header\">Delete</th>
                     <th class=\"table_Header\">Study ID</th>
                     <th class=\"table_Header\">Study Name</th>
                     <th class=\"table_Header\">Study File</th>
                     <th class=\"table_Header\">Date Of Arrival</th>   
                     <th class=\"table_Header\">Restore</th>          
                     </tr>";

        while($row=$result->fetch_assoc()){

            $output.="<tr>"
                ."<td class=\"table_Data\"><input type=\"checkbox\"></td>"
                ."<td class=\"table_Data\">".$row['study_id']."</td>"
                ."<td class=\"table_Data\">".$row['study_name']."</td>"
                ."<td class=\"table_Data\"><a target='_blank' href='View_Rejected_Studies.php? id=".$row['study_id']."'>".$row['file_name']."</a></td>"
                ."<td class=\"table_Data\">".$row['date_of_recived']."</td>"
                ."<td class=\"table_Data\"><input type=\"checkbox\"></td>"
                ."</tr>";

        }

        $output.="</table>";

    }

    else{
        $output.="<table id=\"IRB_Table\">
                 <tr><th class=\"table_Header\">Delete</th>
                     <th class=\"table_Header\">Study ID</th>
                     <th class=\"table_Header\">Study Name</th>
                     <th class=\"table_Header\">Study File</th>
                     <th class=\"table_Header\">Date Of Arrival</th>
                     <th class=\"table_Header\">Restore</th>
                     </tr></table>";
    }


    $button="</br></br><button id='restore_for_rejected_studies'>Restore</button>";

    echo $output;

    echo $button;

    $conn->close();

}

function Show_Rejected_Studies_With_Sort_By_Date(){
    $host="localhost";
    $username="root";
    $password="";
    $db_name="irb_db";

    $conn=mysqli_connect($host,$username,$password,$db_name);

    if (mysqli_connect_errno()) {
        echo "can not connect to Database";
        exit;
    }

    $sql="SELECT * FROM rejected_studies ORDER BY date_of_recived DESC";

    $result=$conn->query($sql);

    $output="";

    if($result->num_rows>0){
        $output.="<table id=\"IRB_Table\">
                 <tr><th class=\"table_Header\">Delete</th>
                     <th class=\"table_Header\">Study ID</th>
                     <th class=\"table_Header\">Study Name</th>
                     <th class=\"table_Header\">Study File</th>
                     <th class=\"table_Header\">Date Of Arrival</th>    
                     <th class=\"table_Header\">Restore</th>         
                     </tr>";

        while($row=$result->fetch_assoc()){

            $output.="<tr>"
                ."<td class=\"table_Data\"><input type=\"checkbox\"></td>"
                ."<td class=\"table_Data\">".$row['study_id']."</td>"
                ."<td class=\"table_Data\">".$row['study_name']."</td>"
                ."<td class=\"table_Data\"><a target='_blank' href='View_Rejected_Studies.php? id=".$row['study_id']."'>".$row['file_name']."</a></td>"
                ."<td class=\"table_Data\">".$row['date_of_recived']."</td>"
                ."<td class=\"table_Data\"><input type=\"checkbox\"></td>"
                ."</tr>";

        }

        $output.="</table>";

    }

    else{
        $output.="<table id=\"IRB_Table\">
                 <tr><th class=\"table_Header\">Delete</th>
                     <th class=\"table_Header\">Study ID</th>
                     <th class=\"table_Header\">Study Name</th>
                     <th class=\"table_Header\">Study File</th>
                     <th class=\"table_Header\">Date Of Arrival</th>
                      <th class=\"table_Header\">Restore</th>
                     </tr></table>";
    }


    $button="</br></br><button id='restore_for_rejected_studies'>Restore</button>";

    echo $output;

    echo $button;

    $conn->close();

}

function Delete_From_Received_Files($The_ID){
    $The_ID_FOR_DELETE=$The_ID;

    $host="localhost";
    $username="root";
    $password="";
    $dbname="irb_db";

    $conn=mysqli_connect($host,$username,$password,$dbname);

    if (mysqli_connect_errno()) {
        echo "can not connect to Database";
        exit;
    }


    $sql="DELETE FROM received_files WHERE study_id='$The_ID_FOR_DELETE'";

    $result=$conn->query($sql);

    $conn->close();

    //I choose to show the received studies table with sort by id after deleting
    Show_Received_Studies_With_Sort_By_ID();



}

function Delete_From_Accepted_Files($The_ID){
    $The_ID_FOR_DELETE=$The_ID;

    $host="localhost";
    $username="root";
    $password="";
    $dbname="irb_db";

    $conn=mysqli_connect($host,$username,$password,$dbname);

    if (mysqli_connect_errno()) {
        echo "can not connect to Database";
        exit;
    }


    $sql="DELETE FROM accepted_studies WHERE study_id='$The_ID_FOR_DELETE'";

    $result=$conn->query($sql);

    $conn->close();

    //I choose to show the accepted studies table with sort by id after deleting
    Show_Accepted_Studies_With_Sort_By_ID();



}

function Delete_From_Rejected_Files($The_ID){
    $The_ID_FOR_DELETE=$The_ID;

    $host="localhost";
    $username="root";
    $password="";
    $dbname="irb_db";

    $conn=mysqli_connect($host,$username,$password,$dbname);

    if (mysqli_connect_errno()) {
        echo "can not connect to Database";
        exit;
    }


    $sql="DELETE FROM rejected_studies WHERE study_id='$The_ID_FOR_DELETE'";

    $result=$conn->query($sql);

    $conn->close();

    //I choose to show the rejected studies table with sort by id after deleting
    Show_Rejected_Studies_With_Sort_By_ID();

}

function Search_In_Received_Files_By_Name($Search_Data){

    $The_Search_Data =$Search_Data;

    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "irb_db";

    $conn = mysqli_connect($host, $username, $password, $dbname);

    if (mysqli_connect_errno()) {
        echo "can not connect to Database";
        exit;
    }


    $sql = "SELECT * FROM received_files WHERE study_name LIKE '$The_Search_Data%';";

    $result=$conn->query($sql);

    $output="";

    if($result->num_rows>0){
        $output.="<table id=\"IRB_Table\">
                 <tr><th class=\"table_Header\">Delete</th>
                     <th class=\"table_Header\">Study ID</th>
                     <th class=\"table_Header\">Study Name</th>
                     <th class=\"table_Header\">Study File</th>
                     <th class=\"table_Header\">Date Of Arrival</th>
                     <th class=\"table_Header\">Accept</th>
                     <th class=\"table_Header\">Reject</th>
                     </tr>";

        while($row=$result->fetch_assoc()){

            $output.="<tr>"
                ."<td class=\"table_Data\"><input type=\"checkbox\"></td>"
                ."<td class=\"table_Data\">".$row['study_id']."</td>"
                ."<td class=\"table_Data\">".$row['study_name']."</td>"
                ."<td class=\"table_Data\"><a target='_blank' href='View_Study_File_IRB.php? id=".$row['study_id']."'>".$row['file_name']."</a></td>"
                ."<td class=\"table_Data\">".$row['date_of_recived']."</td>"
                ."<td class=\"table_Data\"><input type=\"checkbox\"></td>"
                ."<td class=\"table_Data\"><input type=\"checkbox\"></td>"
                ."</tr>";

        }

        $output.="</table>";

    }

    else{
        $output.="<table id=\"IRB_Table\">
                 <tr><th class=\"table_Header\">Delete</th>
                     <th class=\"table_Header\">Study ID</th>
                     <th class=\"table_Header\">Study Name</th>
                     <th class=\"table_Header\">Study File</th>
                     <th class=\"table_Header\">Date Of Arrival</th>
                     <th class=\"table_Header\">Accept</th>
                     <th class=\"table_Header\">Reject</th>
                     </tr></table>";
    }



    $button="<br><br><button id='sub'>Submit</button>";

    echo $output;

    echo $button;

    $conn->close();

}

function Search_In_Received_Files_By_ID($Search_Data){

    $The_Search_Data =$Search_Data;

    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "irb_db";

    $conn = mysqli_connect($host, $username, $password, $dbname);

    if (mysqli_connect_errno()) {
        echo "can not connect to Database";
        exit;
    }


    $sql = "SELECT * FROM received_files WHERE study_id LIKE '$The_Search_Data%';";

    $result=$conn->query($sql);

    $output="";

    if($result->num_rows>0){
        $output.="<table id=\"IRB_Table\">
                 <tr><th class=\"table_Header\">Delete</th>
                     <th class=\"table_Header\">Study ID</th>
                     <th class=\"table_Header\">Study Name</th>
                     <th class=\"table_Header\">Study File</th>
                     <th class=\"table_Header\">Date Of Arrival</th>
                     <th class=\"table_Header\">Accept</th>
                     <th class=\"table_Header\">Reject</th>
                     </tr>";

        while($row=$result->fetch_assoc()){

            $output.="<tr>"
                ."<td class=\"table_Data\"><input type=\"checkbox\"></td>"
                ."<td class=\"table_Data\">".$row['study_id']."</td>"
                ."<td class=\"table_Data\">".$row['study_name']."</td>"
                ."<td class=\"table_Data\"><a target='_blank' href='View_Study_File_IRB.php? id=".$row['study_id']."'>".$row['file_name']."</a></td>"
                ."<td class=\"table_Data\">".$row['date_of_recived']."</td>"
                ."<td class=\"table_Data\"><input type=\"checkbox\"></td>"
                ."<td class=\"table_Data\"><input type=\"checkbox\"></td>"
                ."</tr>";

        }

        $output.="</table>";

    }

    else{
        $output.="<table id=\"IRB_Table\">
                 <tr><th class=\"table_Header\">Delete</th>
                     <th class=\"table_Header\">Study ID</th>
                     <th class=\"table_Header\">Study Name</th>
                     <th class=\"table_Header\">Study File</th>
                     <th class=\"table_Header\">Date Of Arrival</th>
                     <th class=\"table_Header\">Accept</th>
                     <th class=\"table_Header\">Reject</th>
                     </tr></table>";
    }



    $button="<br><br><button id='sub'>Submit</button>";

    echo $output;

    echo $button;

    $conn->close();

}

function Search_In_Accepted_Files_By_Name($Search_Data)
{

    $The_Search_Data = $Search_Data;

    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "irb_db";

    $conn = mysqli_connect($host, $username, $password, $dbname);

    if (mysqli_connect_errno()) {
        echo "can not connect to Database";
        exit;
    }


    $sql = "SELECT * FROM accepted_studies WHERE study_name LIKE '$The_Search_Data%';";

    $result = $conn->query($sql);

    $output = "";

    if($result->num_rows>0) {

        $output .= "<table id=\"IRB_Table\">
                 <tr><th class=\"table_Header\">Delete</th>
                     <th class=\"table_Header\">Study ID</th>
                     <th class=\"table_Header\">Study Name</th>
                     <th class=\"table_Header\">Study File</th>
                     <th class=\"table_Header\">Date Of Arrival</th>     
                     <th class=\"table_Header\">Restore</th>
                     <th class=\"table_Header\">Post</th>
                     </tr>";

        while ($row = $result->fetch_assoc()) {


            if ($row['flag_for_posted_studies'] == 1) {

                $output .= "<tr>"
                    . "<td class=\"table_Data\"><input type=\"checkbox\"></td>"
                    . "<td class=\"table_Data\">" . $row['study_id'] . "</td>"
                    . "<td class=\"table_Data\">" . $row['study_name'] . "</td>"
                    . "<td class=\"table_Data\"><a target='_blank' href='View_Accepted_Studies.php? id=" . $row['study_id'] . "'>" . $row['file_name'] . "</a></td>"
                    . "<td class=\"table_Data\">" . $row['date_of_recived'] . "</td>"
                    . "<td class=\"table_Data\"><input type=\"checkbox\" disabled></td>"
                    . "<td class=\"table_Data\"><p class='posted_statement'>POSTED</p></td>"
                    . "</tr>";

            } else {
                $output .= "<tr>"
                    . "<td class=\"table_Data\"><input type=\"checkbox\"></td>"
                    . "<td class=\"table_Data\">" . $row['study_id'] . "</td>"
                    . "<td class=\"table_Data\">" . $row['study_name'] . "</td>"
                    . "<td class=\"table_Data\"><a target='_blank' href='View_Accepted_Studies.php? id=" . $row['study_id'] . "'>" . $row['file_name'] . "</a></td>"
                    . "<td class=\"table_Data\">" . $row['date_of_recived'] . "</td>"
                    . "<td class=\"table_Data\"><input type=\"checkbox\"></td>"
                    . "<td class=\"table_Data\"><button class='post'>Post</button></td>"
                    . "</tr>";
            }

        }
        $output .= "</table>";
    }

    else{
        $output.="<table id=\"IRB_Table\">
                 <tr><th class=\"table_Header\">Delete</th>
                     <th class=\"table_Header\">Study ID</th>
                     <th class=\"table_Header\">Study Name</th>
                     <th class=\"table_Header\">Study File</th>
                     <th class=\"table_Header\">Date Of Arrival</th>
                     <th class=\"table_Header\">Restore</th>
                     <th class=\"table_Header\">Post</th>
                     </tr></table>";
    }

    $button="</br></br><button id='restore_for_accepted_studies'>Restore</button>";

    echo $output;

    echo $button;

    $conn->close();

}

function Search_In_Accepted_Files_By_ID($Search_Data)
{

    $The_Search_Data = $Search_Data;

    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "irb_db";

    $conn = mysqli_connect($host, $username, $password, $dbname);

    if (mysqli_connect_errno()) {
        echo "can not connect to Database";
        exit;
    }


    $sql = "SELECT * FROM accepted_studies WHERE study_id LIKE '$The_Search_Data%';";

    $result = $conn->query($sql);

    if($result->num_rows>0) {

        $output .= "<table id=\"IRB_Table\">
                 <tr><th class=\"table_Header\">Delete</th>
                     <th class=\"table_Header\">Study ID</th>
                     <th class=\"table_Header\">Study Name</th>
                     <th class=\"table_Header\">Study File</th>
                     <th class=\"table_Header\">Date Of Arrival</th>     
                     <th class=\"table_Header\">Restore</th>
                     <th class=\"table_Header\">Post</th>
                     </tr>";

        while ($row = $result->fetch_assoc()) {


            if ($row['flag_for_posted_studies'] == 1) {

                $output .= "<tr>"
                    . "<td class=\"table_Data\"><input type=\"checkbox\"></td>"
                    . "<td class=\"table_Data\">" . $row['study_id'] . "</td>"
                    . "<td class=\"table_Data\">" . $row['study_name'] . "</td>"
                    . "<td class=\"table_Data\"><a target='_blank' href='View_Accepted_Studies.php? id=" . $row['study_id'] . "'>" . $row['file_name'] . "</a></td>"
                    . "<td class=\"table_Data\">" . $row['date_of_recived'] . "</td>"
                    . "<td class=\"table_Data\"><input type=\"checkbox\" disabled></td>"
                    . "<td class=\"table_Data\"><p class='posted_statement'>POSTED</p></td>"
                    . "</tr>";

            } else {
                $output .= "<tr>"
                    . "<td class=\"table_Data\"><input type=\"checkbox\"></td>"
                    . "<td class=\"table_Data\">" . $row['study_id'] . "</td>"
                    . "<td class=\"table_Data\">" . $row['study_name'] . "</td>"
                    . "<td class=\"table_Data\"><a target='_blank' href='View_Accepted_Studies.php? id=" . $row['study_id'] . "'>" . $row['file_name'] . "</a></td>"
                    . "<td class=\"table_Data\">" . $row['date_of_recived'] . "</td>"
                    . "<td class=\"table_Data\"><input type=\"checkbox\"></td>"
                    . "<td class=\"table_Data\"><button class='post'>Post</button></td>"
                    . "</tr>";
            }

        }
        $output .= "</table>";
    }

    else{
        $output.="<table id=\"IRB_Table\">
                 <tr><th class=\"table_Header\">Delete</th>
                     <th class=\"table_Header\">Study ID</th>
                     <th class=\"table_Header\">Study Name</th>
                     <th class=\"table_Header\">Study File</th>
                     <th class=\"table_Header\">Date Of Arrival</th>
                     <th class=\"table_Header\">Restore</th>
                     <th class=\"table_Header\">Post</th>
                     </tr></table>";
    }

    $button="</br></br><button id='restore_for_accepted_studies'>Restore</button>";

    echo $output;

    echo $button;

    $conn->close();

}

function Search_In_Rejected_Files_By_Name($Search_Data)
{

    $The_Search_Data = $Search_Data;

    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "irb_db";

    $conn = mysqli_connect($host, $username, $password, $dbname);

    if (mysqli_connect_errno()) {
        echo "can not connect to Database";
        exit;
    }


    $sql = "SELECT * FROM rejected_studies WHERE study_name LIKE '$The_Search_Data%';";

    $result = $conn->query($sql);

    $output = "";

    if ($result->num_rows > 0) {
        $output .= "<table id=\"IRB_Table\">
                 <tr><th class=\"table_Header\">Delete</th>
                     <th class=\"table_Header\">Study ID</th>
                     <th class=\"table_Header\">Study Name</th>
                     <th class=\"table_Header\">Study File</th>
                     <th class=\"table_Header\">Date Of Arrival</th>  
                     <th class=\"table_Header\">Restore</th>        
                     </tr>";

        while ($row = $result->fetch_assoc()) {

            $output .= "<tr>"
                . "<td class=\"table_Data\"><input type=\"checkbox\"></td>"
                . "<td class=\"table_Data\">" . $row['study_id'] . "</td>"
                . "<td class=\"table_Data\">" . $row['study_name'] . "</td>"
                . "<td class=\"table_Data\"><a target='_blank' href='View_Rejected_Studies.php? id=" . $row['study_id'] . "'>" . $row['file_name'] . "</a></td>"
                . "<td class=\"table_Data\">" . $row['date_of_recived'] . "</td>"
                . "<td class=\"table_Data\"><input type=\"checkbox\"></td>"
                . "</tr>";

        }

        $output .= "</table>";

    } else {
        $output .= "<table id=\"IRB_Table\">
                 <tr><th class=\"table_Header\">Delete</th>
                     <th class=\"table_Header\">Study ID</th>
                     <th class=\"table_Header\">Study Name</th>
                     <th class=\"table_Header\">Study File</th>
                     <th class=\"table_Header\">Date Of Arrival</th>
                     <th class=\"table_Header\">Restore</th>
                     </tr></table>";
    }



    $button="</br></br><button id='restore_for_rejected_studies'>Restore</button>";

    echo $output;

    echo $button;

    $conn->close();

}

function Search_In_Rejected_Files_By_ID($Search_Data)
{

    $The_Search_Data = $Search_Data;

    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "irb_db";

    $conn = mysqli_connect($host, $username, $password, $dbname);

    if (mysqli_connect_errno()) {
        echo "can not connect to Database";
        exit;
    }


    $sql = "SELECT * FROM rejected_studies WHERE study_id LIKE '$The_Search_Data%';";

    $result = $conn->query($sql);

    $output = "";

    if ($result->num_rows > 0) {
        $output .= "<table id=\"IRB_Table\">
                 <tr><th class=\"table_Header\">Delete</th>
                     <th class=\"table_Header\">Study ID</th>
                     <th class=\"table_Header\">Study Name</th>
                     <th class=\"table_Header\">Study File</th>
                     <th class=\"table_Header\">Date Of Arrival</th>   
                     <th class=\"table_Header\">Restore</th>       
                     </tr>";

        while ($row = $result->fetch_assoc()) {

            $output .= "<tr>"
                . "<td class=\"table_Data\"><input type=\"checkbox\"></td>"
                . "<td class=\"table_Data\">" . $row['study_id'] . "</td>"
                . "<td class=\"table_Data\">" . $row['study_name'] . "</td>"
                . "<td class=\"table_Data\"><a target='_blank' href='View_Rejected_Studies.php? id=" . $row['study_id'] . "'>" . $row['file_name'] . "</a></td>"
                . "<td class=\"table_Data\">" . $row['date_of_recived'] . "</td>"
                . "<td class=\"table_Data\"><input type=\"checkbox\"></td>"
                . "</tr>";

        }

        $output .= "</table>";

    } else {
        $output .= "<table id=\"IRB_Table\">
                 <tr><th class=\"table_Header\">Delete</th>
                     <th class=\"table_Header\">Study ID</th>
                     <th class=\"table_Header\">Study Name</th>
                     <th class=\"table_Header\">Study File</th>
                     <th class=\"table_Header\">Date Of Arrival</th>
                     <th class=\"table_Header\">Restore</th>
                     </tr></table>";
    }


    $button="</br></br><button id='restore_for_rejected_studies'>Restore</button>";

    echo $output;

    echo $button;

    $conn->close();

}

function Add_To_Received_Studies_From_Accepted_Studies(){
    $Study_ID = $_POST['Study_ID'];

    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "irb_db";

    $conn = mysqli_connect($host, $username, $password, $dbname);

    $conn_to_select_from_accepted_studies = mysqli_connect($host, $username, $password, $dbname);

    $conn_to_add_to_received_studies = mysqli_connect($host, $username, $password, $dbname);

    if (mysqli_connect_errno()) {
        echo "can not connect to Database";
        exit;
    }

    $sql = "DELETE FROM accepted_studies WHERE study_id='$Study_ID'";

    $sql_to_select_from_accepted_studies = "SELECT * FROM accepted_studies WHERE study_id='$Study_ID'";


    $result = $conn_to_select_from_accepted_studies->query($sql_to_select_from_accepted_studies);

    $row = $result->fetch_assoc();

    $StudyID = $row['study_id'];
    $Study_Name = $row['study_name'];

    $File_Name = $row['file_name'];
    $File_Content = addslashes($row['file_content']);
    $File_Type = $row['file_type'];

    $Date_Of_Sent = $row['date_of_recived'];

    $Study_announcement = $row['study_text'];


    $sql_to_add_to_received_studies = "INSERT INTO received_files(study_id,study_name,file_type,file_name,file_content,date_of_recived,study_text) VALUES ('$StudyID','$Study_Name','$File_Type','$File_Name','$File_Content','$Date_Of_Sent','$Study_announcement')";


    $conn_to_add_to_received_studies->query($sql_to_add_to_received_studies);

    $conn->query($sql);


    $conn_to_select_from_accepted_studies->close();

    $conn_to_add_to_received_studies->close();

    $conn->close();


    Show_Accepted_Studies_With_Sort_By_ID();



}

function Add_To_Received_Studies_From_Rejected_Studies(){
    $Study_ID = $_POST['Study_ID'];

    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "irb_db";

    $conn = mysqli_connect($host, $username, $password, $dbname);

    $conn_to_select_from_rejected_studies = mysqli_connect($host, $username, $password, $dbname);

    $conn_to_add_to_received_studies = mysqli_connect($host, $username, $password, $dbname);

    if (mysqli_connect_errno()) {
        echo "can not connect to Database";
        exit;
    }

    $sql = "DELETE FROM rejected_studies WHERE study_id='$Study_ID'";

    $sql_to_select_from_rejected_studies = "SELECT * FROM rejected_studies WHERE study_id='$Study_ID'";


    $result = $conn_to_select_from_rejected_studies->query($sql_to_select_from_rejected_studies);

    $row = $result->fetch_assoc();

    $StudyID = $row['study_id'];
    $Study_Name = $row['study_name'];

    $File_Name = $row['file_name'];
    $File_Content = addslashes($row['file_content']);
    $File_Type = $row['file_type'];

    $Date_Of_Sent = $row['date_of_recived'];

    $Study_announcement = $row['study_text'];


    $sql_to_add_to_received_studies = "INSERT INTO received_files(study_id,study_name,file_type,file_name,file_content,date_of_recived,study_text) VALUES ('$StudyID','$Study_Name','$File_Type','$File_Name','$File_Content','$Date_Of_Sent','$Study_announcement')";


    $conn_to_add_to_received_studies->query($sql_to_add_to_received_studies);

    $conn->query($sql);


    $conn_to_select_from_rejected_studies->close();

    $conn_to_add_to_received_studies->close();

    $conn->close();


    Show_Rejected_Studies_With_Sort_By_ID();

}

function store_the_study_text($id){
    $The_ID_For_The_Study_Text = $id;

    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "irb_db";

    $conn = mysqli_connect($host, $username, $password, $dbname);

    $conn_to_set_flag_for_posted_studies=mysqli_connect($host, $username, $password, $dbname);

    if (mysqli_connect_errno()) {
        echo "can not connect to Database";
        exit;
    }

    $sql = "SELECT study_text FROM accepted_studies WHERE study_id='$The_ID_For_The_Study_Text'";

    $sql_to_set_flag_for_posted_studies = "UPDATE accepted_studies set flag_for_posted_studies=1 WHERE study_id='$The_ID_For_The_Study_Text'";


    $result = $conn->query($sql);

    $row = $result->fetch_assoc();

    $The_Study_Text = $row['study_text'];

    $_SESSION["study_text"] = $The_Study_Text;




        $conn_to_set_flag_for_posted_studies->query($sql_to_set_flag_for_posted_studies);

    $conn->close();

    $conn_to_set_flag_for_posted_studies->close();

    Show_Accepted_Studies_With_Sort_By_ID();

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="IRB.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>




        function Add_To_Accepted_Studies(Study_ID){
            var flag_Add_To_Accepted="Add_To_Accepted_Studies";
            $.ajax({
                method:"post",
                url:"IRB_Process.php",
                data:{flag_Add_To_Accepted,Study_ID},
                dataType:"html",
                success:function(response){
                    $("#Content").html(response);
                }

            });
        }

        function Add_To_Rejected_Studies(Study_ID){
            var flag_Add_To_Rejected="Add_To_Rejected_Studies";
            $.ajax({
                method:"post",
                url:"IRB_Process.php",
                data:{flag_Add_To_Rejected,Study_ID},
                dataType:"html",
                success:function(response){
                    $("#Content").html(response);
                }

            });

        }

        function Add_To_Received_Studies_From_Accepted_Studies(Study_ID){
            var flag_Add_To_Received_Studies_From_Accepted_Studies="Add_To_Received_Studies_From_Accepted_Studies";
            $.ajax({
                method:"post",
                url:"IRB_Process.php",
                data:{flag_Add_To_Received_Studies_From_Accepted_Studies,Study_ID},
                dataType:"html",
                success:function(response){
                    $("#Content").html(response);
                }

            });

        }

        function Add_To_Received_Studies_From_Rejected_Studies(Study_ID){
            var flag_Add_To_Received_Studies_From_Rejected_Studies="Add_To_Received_Studies_From_Rejected_Studies";
            $.ajax({
                method:"post",
                url:"IRB_Process.php",
                data:{flag_Add_To_Received_Studies_From_Rejected_Studies,Study_ID},
                dataType:"html",
                success:function(response){
                    $("#Content").html(response);
                }

            });

        }


        $("#sub").click(function(e){
            e.preventDefault();
            var $checkbox_Accept;
            var $checkbox_Reject;
            var length_for_checkbox_accept;
            var length_for_checkbox_reject;
            var status_for_checkbox_accept;
            var status_for_checkbox_reject;
            var id;
            // var flag="Submit";

            $("#IRB_Table tr").each(function(){
                $checkbox_Accept=$(this).find("td input[type=\"checkbox\"]").eq(1);
                $checkbox_Reject=$(this).find("td input[type=\"checkbox\"]").eq(2);

                length_for_checkbox_accept=$checkbox_Accept.length;
                length_for_checkbox_reject=$checkbox_Reject.length;

                //to confirm there is a checkbox//And in the header the values will be 0,0
                if(length_for_checkbox_accept!=0 && length_for_checkbox_reject!=0){
                    status_for_checkbox_accept=$checkbox_Accept.prop('checked');
                    status_for_checkbox_reject=$checkbox_Reject.prop('checked');
                    id = $(this).find("td").eq(1).html();

                    //to check if the user enter the two options at the same time
                    if(status_for_checkbox_accept==true && status_for_checkbox_reject==true){
                        alert("Please Select Just One Choice In The Row Which Study ID="+id)
                    }

                    else if(status_for_checkbox_accept==true && status_for_checkbox_reject==false){
                        Add_To_Accepted_Studies(id);
                    }

                    else if(status_for_checkbox_accept==false && status_for_checkbox_reject==true){
                        Add_To_Rejected_Studies(id);
                    }

                    else if(status_for_checkbox_accept==false && status_for_checkbox_reject==false){
                        //the user didn't choose any thing
                    }
                }

            });

        });


        $('#restore_for_accepted_studies').click(function(e){
            e.preventDefault();
            var $checkbox_for_restore_accepted_studies_to_received_studies;
            var length_for_checkbox;
            var status_for_checkbox;
            var id;


            $("#IRB_Table tr").each(function(){
                $checkbox_for_restore_accepted_studies_to_received_studies=$(this).find("td input[type=\"checkbox\"]").eq(1);

                length_for_checkbox=$checkbox_for_restore_accepted_studies_to_received_studies.length;

                if(length_for_checkbox!=0){
                    status_for_checkbox=$checkbox_for_restore_accepted_studies_to_received_studies.prop('checked');

                    id = $(this).find("td").eq(1).html();

                    if(status_for_checkbox==false){
                        //the checkbox is not selected
                    }
                    else if(status_for_checkbox==true){
                        Add_To_Received_Studies_From_Accepted_Studies(id);

                    }

                }
            });

        });

        $('#restore_for_rejected_studies').click(function(e){
            e.preventDefault();
            var $checkbox_for_restore_rejected_studies_to_received_studies;
            var length_for_checkbox;
            var status_for_checkbox;
            var id;
            // var flag="Restore";

            $("#IRB_Table tr").each(function(){
                $checkbox_for_restore_rejected_studies_to_received_studies=$(this).find("td input[type=\"checkbox\"]").eq(1);

                length_for_checkbox=$checkbox_for_restore_rejected_studies_to_received_studies.length;

                if(length_for_checkbox!=0){
                    status_for_checkbox=$checkbox_for_restore_rejected_studies_to_received_studies.prop('checked');

                    id = $(this).find("td").eq(1).html();

                    if(status_for_checkbox==false){
                        //the checkbox is not selected
                    }
                    else if(status_for_checkbox==true){
                        Add_To_Received_Studies_From_Rejected_Studies(id);

                    }

                }
            });


        });

        $(".post").click(function(e) {
            e.preventDefault();

            var id_for_get_the_text;
            var study_text_flag="study_text";


            id_for_get_the_text=$(this).closest("tr").find("td").eq(1).html();

            $.ajax({

                method: "post",
                url: "IRB_Process.php",
                data: {id_for_get_the_text,study_text_flag},
                dataType: "html",
                success: function (response) {
                    $("#Content").html(response);
                }

            });

        });


    </script>

</head>
<body>

</body>
</html>

