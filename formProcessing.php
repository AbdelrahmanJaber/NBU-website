<?php
if(isset($_POST["name"])&&isset($_POST["gender"])&&isset($_POST["birthday"])&&isset($_POST["nationality"])&&
isset($_POST["identification"])&&isset($_POST["phone"])&&isset($_POST["email"])&&isset($_POST["Residence"]))
{
    $v_name = $_POST["name"];
    $v_gender = $_POST["gender"];
    $v_birthdate = $_POST["birthday"];
    $v_nationality = $_POST["nationality"];
    $v_id = $_POST["identification"];
    $v_phone = $_POST["phone"];
    $v_email = $_POST["email"];
    $v_residence = $_POST["Residence"];
    $currDate=date("Y-m-d");
    $flag=0;
    if ($v_name != '' && $v_gender != '' && $v_birthdate != '' && $v_nationality != '' && $v_id != '' && $v_phone && $v_email != '' && $v_residence != '') {
        $conn = mysqli_connect("localhost", "root", "", "Projectdatabase");
        if ($conn->connect_error) {
            die("connection faild" . $conn->connect_error);
        }

        $sql1 = "SELECT v_id FROM tableforms";
        $result = $conn->query($sql1);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                if ($row['v_id'] == $v_id) {
                    $flag = 1;
                }
            }
        }
        if ($flag == 1) {
            echo '<script>alert("رقم الهوية \ الجواز غير صحيح")</script>';
            $conn->close();
        } else {
            $sql = "INSERT INTO tableforms (v_name,v_gender,v_birth,v_nat,v_id,v_phone,v_email,v_res,curr_date)
       VALUES ('$v_name', '$v_gender', '$v_birthdate','$v_nationality',$v_id,$v_phone,'$v_email','$v_residence','$currDate')";

            if ($conn->query($sql) === TRUE) {
                echo "<div style='position: center; background-color: rgba(70,130,320,.5); width: 200px; border:2px solid green ; border-radius: 20px; margin-top: 15%;margin-left: 42%'><h1 style='font-size: 24px;color: forestgreen;font-family: Andalus;text-align: center'>تم ارسال الطلب بنجاح</h1>
             <p style='text-align: center'><a href='formFile.php' style='text-align: center; margin-bottom: 20px;font-size: 16px' >ارسال رد اخر </a></p></div>";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

            $conn->close();
        }
    }
}
else if(isset($_POST['nameVol']) && isset($_POST['birthVol']) && isset($_POST['idVol']) && isset($_POST['phoneVol']) && isset($_POST['idTypeVol']))
{
   addTOVolunteerTable();
}
else if (isset($_POST["showAllforms"])) {
    showAllFormsFun();
    }


else if (isset($_POST['colcon']))
{
    $deltemp=$_POST['colcon'];
    $conn = mysqli_connect("localhost", "root", "", "Projectdatabase");
    if ($conn->connect_error) {
        die("connection faild" . $conn->connect_error);
    }

    // sql to delete a record
    $sql = "DELETE FROM tableforms WHERE v_id= $deltemp";
    $conn->query($sql);
    $conn->close();
    showAllFormsFun();

}
else if(isset($_POST['show_all_palestine_forms']))
{

    selectALLPalestineFormsFun();
}
elseif(isset($_POST['sortForms']))
{
    sortFormsFun();
}
function  showAllFormsFun(){
    $conn = mysqli_connect("localhost", "root", "", "Projectdatabase");
    $output = '';
    if ($conn->connect_error) {
        die("connection faild" . $conn->connect_error);
    }
    $qry = "SELECT * from  tableforms ";
    $result = $conn->query($qry);
    if ($result->num_rows > 0) {
        $output .= "<tr >
                <th><b>Name</b></th>
                <th><b>Gender</b></th>
                <th><b>Birth date </b></th>
                <th><b>Nationality</b></th>
                <th><b>ID</b></th>
                <th><b>Phone # </b></th>
                <th><b>Email</b></th>
                <th><b>Residence</b></th>
                <th><b> </b></th> 
                <th><b>last post</b></th>
                 <th><b> Delete </b></th>
                 <th><b> Save</b></th>
                
            </tr>";
        while ($row = $result->fetch_assoc()) {
            $output .= '<tr><td>' . $row['v_name'] . '</td><td>' . $row['v_gender'] . '</td><td>' . $row['v_birth'] . '</td><td>' . $row['v_nat'] . '</td><td>' . $row['v_id'] . '</td><td>' . $row['v_phone']
                . '</td><td>' . $row['v_email'] . '</td><td>' . $row['v_res'] .'<td id="lastpost_td" ><button class="last_post_but" >check</button>'.'</td><td id="getdate_td">'.'</td>'.'<td id="deleteform_td"><button class="deleteformbut">Delete</button>'.'</td><td id="saveform_td"><button class="save_form">Save</button>'.'</td></tr>';
        }

        echo $output;
    }
    else {
        $output .= "<tr >
                <th><b>Name</b></th>
                <th><b>Gender</b></th>
                <th><b>Birth date </b></th>
                <th><b>Nationality</b></th>
                <th><b>ID</b></th>
                <th><b>Phone # </b></th>
                <th><b>Email</b></th>
                <th><b>Residence</b></th>
                <th><b> last post</b></th>  
                 <th><b>last post</b></th>
                 <th><b> Delete </b></th>
                 <th><b> Save</b></th>
                
            </tr>";
        echo $output;

    }
}
function addTOVolunteerTable()
{
    $volname=$_POST["nameVol"];
    $volid=(int)$_POST["idVol"];
    $volbirth=$_POST["birthVol"];
    $voltel=(int)$_POST["phoneVol"];
    $volidtype=$_POST['idTypeVol'];
    $conn = mysqli_connect("localhost", "root", "", "Projectdatabase");



$sql = "SELECT * FROM volunteer where id= $volid";
$result = $conn->query($sql);
      if ($result->num_rows > 0) {
      echo "1";
     }
     else {


        $qry = "INSERT INTO volunteer (volname , idtype , id , dateofbirth ,telnum ,bloddonation,leaststudy,studyid,studystart,studyend) values 
        ('$volname','$volidtype',$volid,'$volbirth',$voltel,'0000-00-00','0000-00-00',0000,'0000-00-00','0000-00-00')";

        $conn->query($qry);

     }
    $conn->close();
}
function  selectALLPalestineFormsFun()
{
    $id_type_temp='';
    $output='';
    if($_POST['show_all_palestine_forms']=='Palestine'){$id_type_temp='فلسطين';}

    $conn = mysqli_connect("localhost", "root", "", "Projectdatabase");
    if ($conn->connect_error) {
        die("connection faild" . $conn->connect_error);
    }
    if($id_type_temp=='فلسطين') {
        $qry = "SELECT * from  tableforms where v_nat='فلسطين'";
        $result = $conn->query($qry);
        if ($result->num_rows > 0) {
            $output .= "<tr >
                <th><b>Name</b></th>
                <th><b>Gender</b></th>
                <th><b>Birth date </b></th>
                <th><b>Nationality</b></th>
                <th><b>ID</b></th>
                <th><b>Phone # </b></th>
                <th><b>Email</b></th>
                <th><b>Residence</b></th>
                <th><b> </b></th> 
                <th><b>last post</b></th>
                 <th><b> Delete </b></th>
                 <th><b> Save</b></th>
                
            </tr>";
            while ($row = $result->fetch_assoc()) {
                $output .= '<tr><td>' . $row['v_name'] . '</td><td>' . $row['v_gender'] . '</td><td>' . $row['v_birth'] . '</td><td>' . $row['v_nat'] . '</td><td>' . $row['v_id'] . '</td><td>' . $row['v_phone']
                    . '</td><td>' . $row['v_email'] . '</td><td>' . $row['v_res'] . '<td id="lastpost_td" ><button class="last_post_but" >check</button>' . '</td><td id="getdate_td">' . '</td>' . '<td id="deleteform_td"><button class="deleteformbut">Delete</button>' . '</td><td id="saveform_td"><button class="save_form">Save</button>' . '</td></tr>';
            }

            echo $output;
        }
    }
    else if($id_type_temp=='') {
        $qry = "SELECT * from  tableforms";
        $result = $conn->query($qry);
        if ($result->num_rows > 0) {
            $output .= "<tr >
                <th><b>Name</b></th>
                <th><b>Gender</b></th>
                <th><b>Birth date </b></th>
                <th><b>Nationality</b></th>
                <th><b>ID</b></th>
                <th><b>Phone # </b></th>
                <th><b>Email</b></th>
                <th><b>Residence</b></th>
                <th><b> </b></th> 
                <th><b>last post</b></th>
                 <th><b> Delete </b></th>
                 <th><b> Save</b></th>
                
            </tr>";
            while ($row = $result->fetch_assoc()) {
                $output .= '<tr><td>' . $row['v_name'] . '</td><td>' . $row['v_gender'] . '</td><td>' . $row['v_birth'] . '</td><td>' . $row['v_nat'] . '</td><td>' . $row['v_id'] . '</td><td>' . $row['v_phone']
                    . '</td><td>' . $row['v_email'] . '</td><td>' . $row['v_res'] . '<td id="lastpost_td" ><button class="last_post_but" >check</button>' . '</td><td id="getdate_td">' . '</td>' . '<td id="deleteform_td"><button class="deleteformbut">Delete</button>' . '</td><td id="saveform_td"><button class="save_form">Save</button>' . '</td></tr>';
            }

            echo $output;
        }
    }
}
function sortFormsFun()
{
    $conn = mysqli_connect("localhost", "root", "", "Projectdatabase");
    $output = '';
    if ($conn->connect_error) {
        die("connection faild" . $conn->connect_error);
    }
    $qry = "SELECT * from  tableforms ORDER BY curr_date desc ; ";
    $result = $conn->query($qry);
    if ($result->num_rows > 0) {
        $output .= "<tr >
                <th><b>Name</b></th>
                <th><b>Gender</b></th>
                <th><b>Birth date </b></th>
                <th><b>Nationality</b></th>
                <th><b>ID</b></th>
                <th><b>Phone # </b></th>
                <th><b>Email</b></th>
                <th><b>Residence</b></th>
                <th><b> </b></th> 
                <th><b>last post</b></th>
                 <th><b> Delete </b></th>
                 <th><b> Save</b></th>
                
            </tr>";
        while ($row = $result->fetch_assoc()) {
            $output .= '<tr><td>' . $row['v_name'] . '</td><td>' . $row['v_gender'] . '</td><td>' . $row['v_birth'] . '</td><td>' . $row['v_nat'] . '</td><td>' . $row['v_id'] . '</td><td>' . $row['v_phone']
                . '</td><td>' . $row['v_email'] . '</td><td>' . $row['v_res'] .'<td id="lastpost_td" ><button class="last_post_but" >check</button>'.'</td><td id="getdate_td">'.'</td>'.'<td id="deleteform_td"><button class="deleteformbut">Delete</button>'.'</td><td id="saveform_td"><button class="save_form">Save</button>'.'</td></tr>';
        }

        echo $output;
    }
    else {
        $output .= "<tr >
                <th><b>Name</b></th>
                <th><b>Gender</b></th>
                <th><b>Birth date </b></th>
                <th><b>Nationality</b></th>
                <th><b>ID</b></th>
                <th><b>Phone # </b></th>
                <th><b>Email</b></th>
                <th><b>Residence</b></th>
                <th><b> last post</b></th>  
                 <th><b>last post</b></th>
                 <th><b> Delete </b></th>
                 <th><b> Save</b></th>
                
            </tr>";
        echo $output;

    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body>

<script>
    $(document).ready(function () {
    $(".deleteformbut").click(function () {
        var result = $(this).closest('tr');
        var colcon = result.find('td:eq(4)').text();
        if(confirm("Are you sure you want to delete this ? ")) {

            $.ajax({
                method: "post",
                url: "formProcessing.php",
                data: {colcon},
                dataType: "html",
                success: function (response) {
                    $('#tableforms').html(response);
                }

            });
        }
            });
        $(".save_form").click(function () {

            var result = $(this).closest('tr');
            var nameVol = result.find('td:eq(0)').text();
            var birthVol=result.find('td:eq(2)').text();
            var idVol=result.find('td:eq(4)').text();
            var phoneVol=result.find('td:eq(5)').text();
            var findidType=result.find('td:eq(3)').text();
         //   var disableButton=result.find('td:eq(3)').disable();
            var idTypeVol='';
            if(findidType == 'فلسطين' )
            {
                idTypeVol="ID";
            }
            else
            {idTypeVol="passport";}
            var flag = 0;
            if (nameVol== '') {
                flag = 1;
            }
            if (birthVol == '') {
                flag = 1;
            }
            if (idVol == '') {
                flag = 1;
            }
            if (phoneVol== '') {
                flag = 1;
            }
            if(idTypeVol=='')
            {
                flag=1;
            }
            if(flag==1)
            {
                alert("Empty fields ");

            }
            else
            {
                $.ajax({
                    method: "post",
                    url: "formProcessing.php",
                    data:{nameVol,birthVol,idVol,phoneVol,idTypeVol},
                    dataType: "html",
                    success: function (response) {

                    }
                });

            }
            flag=0;
         });
        $(".last_post_but").click(function () {
            var result = $(this).closest('tr');
            var get_last_study_date = result.find('td:eq(4)').text();
                $.ajax({
                    method: "post",
                    url: "checkVolunteer.php",
                    data: {get_last_study_date},
                    dataType: "html",
                    success: function(response) {
                        result.find('td:eq(9)').text(response);

                    }

                });
        });
    });
</script>
</body>
</html>
