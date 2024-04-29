<?php
if(isset($_POST['showAll'])) {

    showAll();
}
else if(isset($_POST['search_txt_irb'])&&isset($_POST['searchby_irb']))
{
    searchIRBFun();
}

else if(isset($_POST['colcon']))
{


    deleteFun();

}



function showAll(){
    $output =  "<tr id='trupd'>
                <th>Study ID</th>
                <th>Study Name</th>
                <th>Date of sent</th>
                <th>Delete</th>";
    $conn = new mysqli('localhost','root','','projectdatabase');
// Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM sent_to_irb";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $output.= '<tr><td>' . $row['study_id'] . '</td><td>' . $row['study_name'] . '</td><td>'
                . $row['date_of_sent'] . '</td><td style="width: 4vw"><button style="width: 100% 
           ;height: 100%;background: red ; color: white" class="delete_sent_to_irb">Delete</button></td></tr>';
        }
        echo $output;
    }
    else  {echo $output;}

    $conn->close();

}


function searchIRBFun()
{

    $conn = mysqli_connect("localhost", "root", "", "Projectdatabase");
    $output='';
    if ($conn->connect_error) {
        die("connection faild" . $conn->connect_error);
    }
    $qry="";
    if($_POST['searchby_irb']=='study_id'){
        $id=$_POST['search_txt_irb'];
        $qry = "SELECT * from  sent_to_irb where study_id= $id";
        $result = $conn->query($qry);
    }
    elseif ($_POST['searchby_irb']=='study_name')
    {
        $study_name=$_POST['search_txt_irb'];
        $qry = "SELECT * from   sent_to_irb where study_name= '$study_name'";
        $result = $conn->query($qry);
    }
    if ($result ->num_rows > 0) {
        $output =  "<tr id='trupd'>
                <th>Study ID</th>
                <th>Study Name</th>
                <th>Date of sent</th>
                <th>Delete</th>";

        while($row = $result->fetch_assoc()) {
            $output.= '<tr><td>' . $row['study_id'] . '</td><td>' . $row['study_name'] . '</td><td>'
                . $row['date_of_sent'] . '</td><td style="width: 4vw"><button style="width: 100%
           ;height: 100%;background: red ; color: white" class="delete_sent_to_irb">Delete</button></td></tr>';
        }


    }

    else
    {
        $output =  "<tr id='trupd'>
                <th>Study ID</th>
                <th>Study Name</th>
                <th>Date of sent</th>
                <th>Delete</th>";
    }

    $conn->close();
    echo  $output;

}
function deleteFun()
{
    $deltemp=$_POST['colcon'];
    $conn = mysqli_connect("localhost", "root", "", "Projectdatabase");
    if ($conn->connect_error) {
        die("connection faild" . $conn->connect_error);
    }
    // sql to delete a record
    $sql = "DELETE FROM sent_to_irb WHERE study_id= $deltemp";
    $conn->query($sql);
    $conn->close();
    showall();
}//end func
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
        $(".delete_sent_to_irb").click(function () {
            var result = $(this).closest('tr');
            var colcon = result.find('td:eq(0)').text();
            if(confirm("Are you sure you want to delete this ? "))
            {
                $.ajax({
                    method: "post",
                    url: "studies_sent_toIRB.php",
                    data: {colcon},
                    dataType: "html",
                    success: function(response) {
                        $('#mail_table_irb').html(response);
                    }

                });
            }   //end if
        });

    }); // end document.ready

</script>
</body>
</html>