<?php
//session_start();
//if($_SESSION['volunteerDatabase']!=1)
//{
//    exit("stop do that");
//}
if(isset($_POST["showVolunteers"]))

{
    showall();
}
else if(isset($_POST['colcon']))
{
    deleteFun();
}
else if(isset($_POST["name_txt"])&&isset($_POST["idtype_txt"])&&isset($_POST["idins_txt"])
&&isset($_POST["birth_txt"])&&isset($_POST["tel_txt"])&&isset($_POST["dona_txt"])
&&isset($_POST["least_txt"])&&isset($_POST["studyid_txt"])&&isset($_POST["start_txt"])&&isset($_POST["end_txt"]))
{

    insertFun();
}
else if(isset($_POST['search_txt'])&&isset($_POST['searchby'])) {

    searchVolFun();
}

else if(isset($_POST["updname"])&&isset($_POST["updidtype"])&&isset($_POST["updid"])
    &&isset($_POST["updbirth"])&&isset($_POST["updtel"])&&isset($_POST["upddon"])
    &&isset($_POST["updleast"])&&isset($_POST["updstdid"])&&isset($_POST["updstart"])&&isset($_POST["updend"]))
{
  updateVolInfo();
}
else if(isset($_POST['showIncompleteRecordes']))
{

    showIncompleteRecordesFun();
}


function showall(){
    $conn = mysqli_connect("localhost", "root", "", "Projectdatabase");
    $output='';
    if ($conn->connect_error) {
        die("connection faild" . $conn->connect_error);
    }

    $qry = "SELECT * from  Volunteer ";
    $result = $conn->query($qry);
    if ($result->num_rows > 0) {
        $output.=  "<tr id='trupd'>
                <td style='width:12vw'><input type='text' id='nameupd'></td>
                <td> <select id='volupdtype' ><option value='ID' >ID</option><option value='passport'>passport</option></select></td>
                <td><input type='number' id='idupd'></td>
                <td><input type='date' id='birthupd'></td>
                <td><input type='tel' id='telupd'></td>
                <td><input type='date' id='donupd'></td>
                <td><input type='date' id='leastupd'></td>
                <td><input type='text' id='studyupd'></td>
                <td><input type='date' id='startupd'></td>
                 <td><input type='date' id='endupd'></td>
                 <td id='tdbutupd'><button id='saveupdbut'><b>Save</b></button></td> </tr><tr id='linebetupdtr'> 
                  <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>";

        $output.=  "<tr >
                <th style='width:12vw'><b>Name</b></th>
                <th><b>ID Type</b></th>
                <th><b>ID</b></th>
                <th><b>Date Of Birth</b></th>
                <th><b>Tel #</b></th>
                <th><b>Blood Donation</b></th>
                <th><b>Least Study</b></th>
                <th><b>Study ID</b></th>
                <th><b>Study Start</b></th>
                <th><b>Study End</b></th>
                <th><b>delete</b></th>
                <th><b>change</b></th>
            </tr>";
        while ($row = $result->fetch_assoc()) {
            $output.= '<tr class="name_vol_td" style="width:12vw"><td >' . $row['volname'] . '</td><td>' . $row['idtype'] . '</td><td>'
                . $row['id'] . '</td><td>' . $row['dateofbirth'] . '</td><td>' . $row['telnum'] . '</td><td>' . $row['bloddonation']
                . '</td><td>' . $row['leaststudy'] . '</td><td>' . $row['studyid'] . '</td><td>' . $row['studystart'] . '</td><td>'
                . $row['studyend'] . '</td><td><button class="deletebut">X</button>'.'</td><td>'.'<button class="updatebut">change</button>'.'</td></tr>';
        }
        $output.=  "<tr>
                <td style='width:12vw'><input type='text' id='nameins'></td>
                <td> <select id='volinstype' style='width: 4vw'><option value='ID' >ID</option><option value='passport'>passport</option></select></td>
                <td id='idtd' ><input type='number' id='idins'></td>
                <td><input type='date' id='birthins'></td>
                <td><input type='tel' id='telins'></td>
                <td><input type='date' id='donins'></td>
                <td><input type='date' id='leastins'></td>
                <td><input type='text' id='studyins'></td>
                <td><input type='date' id='startins'></td>
                 <td><input type='date' id='endins'></td>
                 <td><button id='insertbut'>Insert</button></td> </tr>";
          echo $output;
    }
    else {
        $output.=  "<tr id='trupd'>
                <td style='width:12vw'><input type='text' id='nameupd'></td>
                <td> <select id='volupdtype' ><option value='ID' >ID</option><option value='passport'>passport</option></select></td>
                <td><input type='number' id='idupd'></td>
                <td><input type='date' id='birthupd'></td>
                <td><input type='tel' id='telupd'></td>
                <td><input type='date' id='donupd'></td>
                <td><input type='date' id='leastupd'></td>
                <td><input type='text' id='studyupd'></td>
                <td><input type='date' id='startupd'></td>
                 <td><input type='date' id='endupd'></td>
                 <td id='tdbutupd'><button id='saveupdbut'><b>Save</b></button></td> </tr><tr id='linebetupdtr'>
                 <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>";
        $output.=  "<tr >
                <th style='width:12vw'><b>Name</b></th>
                <th><b>ID Type</b></th>
                <th><b>ID</b></th>
                <th><b>Date Of Birth</b></th>
                <th><b>Tel #</b></th>
                <th><b>Blood Donation</b></th>
                <th><b>Least Study</b></th>
                <th><b>Study ID</b></th>
                <th><b>Study Start</b></th>
                <th><b>Study End</b></th>
                <th><b>delete</b></th>
                <th><b>change</b></th>
                
            </tr>";
        $output.=  "<tr>
                <td style='width:12vw'><input type='text' id='nameins'></td>
                <td> <select id='volinstype'  style='width: 4vw'><option value='ID' >ID</option><option value='passport'>passport</option></select></td>
                <td id='idtd' ><input type='number' id='idins'></td>
                <td><input type='date' id='birthins'></td>
                <td><input type='tel' id='telins'></td>
                <td><input type='date' id='donins'></td>
                <td><input type='date' id='leastins'></td>
                <td><input type='text' id='studyins'></td>
                <td><input type='date' id='startins'></td>
                 <td><input type='date' id='endins'></td>
                 <td><button id='insertbut'>Insert</button></td> </tr>";

        echo $output;
    }
    $conn->close();
}//end func
function deleteFun()
{
    $deltemp=$_POST['colcon'];
    $conn = mysqli_connect("localhost", "root", "", "Projectdatabase");
    if ($conn->connect_error) {
        die("connection faild" . $conn->connect_error);
    }
    // sql to delete a record
    $sql = "DELETE FROM Volunteer WHERE id= $deltemp";
    $conn->query($sql);
    $conn->close();
    showall();
}//end func

function insertFun()
{
    $name1=$_POST["name_txt"];
    $voltype=$_POST["idtype_txt"];
    $volid=$_POST["idins_txt"];
    $volbirth=$_POST["birth_txt"];
    $voltel=$_POST["tel_txt"];
    $blooddon=$_POST["dona_txt"];
    $leaststudy=$_POST["least_txt"];
    $studyid=$_POST["studyid_txt"];
    $startdate=$_POST["start_txt"];
    $enddate=$_POST["end_txt"];
    $flag1=0;
    $flag2=0;
    $conn = mysqli_connect("localhost", "root", "", "Projectdatabase");
    if ($conn->connect_error) {
        die("connection faild" . $conn->connect_error);
    }

    $sql="SELECT id from volunteer ";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            if($row['id']==$volid)
            {
                $flag1=1;
                echo "<script>alert('invalid id')</script>";
            }
        }
    }
    if($flag1==0) {

        $sql = "SELECT id_study from study where id_study=$studyid ";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
           $flag2=1;
            $qry = "INSERT INTO volunteer (volname , idtype , id , dateofbirth ,telnum ,bloddonation,leaststudy,studyid,studystart,studyend) values 
            ('$name1','$voltype',$volid,'$volbirth',$voltel,'$blooddon','$leaststudy',$studyid,'$startdate','$enddate')";
            if ($conn->query($qry) == TRUE) {
            }

            $flag1 = 0;
            showall();

        }

        else
       {

            echo "<script>alert('invalid study id')</script>";

       }
    }

    $conn->close();

}//end fun
function    searchVolFun(){
    $conn = mysqli_connect("localhost", "root", "", "Projectdatabase");
    $output='';
    if ($conn->connect_error) {
        die("connection faild" . $conn->connect_error);
    }
    $qry="";
    if($_POST['searchby']=='vol_id'){
    $vol_id=$_POST['search_txt'];
    $qry = "SELECT * from  Volunteer where id= $vol_id";
    $result = $conn->query($qry);
    }
    elseif ($_POST['searchby']=='study_id')
    {
        $study_id=$_POST['search_txt'];
        $qry = "SELECT * from  Volunteer where studyid= $study_id";
        $result = $conn->query($qry);
    }
    if ($result->num_rows > 0) {
        $output.=  "<tr id='trupd'>
                <td style='width:12vw'><input type='text' id='nameupd'></td>
                <td> <select id='volupdtype' ><option value='ID' >ID</option><option value='passport'>passport</option></select></td>
                <td><input type='number' id='idupd'></td>
                <td><input type='date' id='birthupd'></td>
                <td><input type='tel' id='telupd'></td>
                <td><input type='date' id='donupd'></td>
                <td><input type='date' id='leastupd'></td>
                <td><input type='text' id='studyupd'></td>
                <td><input type='date' id='startupd'></td>
                 <td><input type='date' id='endupd'></td>
                 <td id='tdbutupd'><button id='saveupdbut'><b>Save</b></button></td> </tr><tr id='linebetupdtr'> 
                  <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>";
        $output.=  "<tr >
                <th style='width:12vw'><b>Name</b></th>
                <th><b>ID Type</b></th>
                <th><b>ID</b></th>
                <th><b>Date Of Birth</b></th>
                <th><b>Tel #</b></th>
                <th><b>Blood Donation</b></th>
                <th><b>Least Study</b></th>
                <th><b>Study ID</b></th>
                <th><b>Study Start</b></th>
                <th><b>Study End</b></th>
                <th><b>delete</b></th>
                <th><b>change</b></th>
            </tr>";
        while ($row = $result->fetch_assoc()) {
            $output.= '<tr><td style="width:12vw">' . $row['volname'] . '</td><td>' . $row['idtype'] . '</td><td>'
                . $row['id'] . '</td><td>' . $row['dateofbirth'] . '</td><td>' . $row['telnum'] . '</td><td>' . $row['bloddonation']
                . '</td><td>' . $row['leaststudy'] . '</td><td>' . $row['studyid'] . '</td><td>' . $row['studystart'] . '</td><td>'
                . $row['studyend'] . '</td><td><button class="deletebut">x</button>'.'</td><td>'.'<button class="updatebut">change</button>'.'</td></tr>';
        }

    }
    else
    {
        $output.=  "<tr >
                <th style='width:12vw'><b>Name</b></th>
                <th><b>ID Type</b></th>
                <th><b>ID</b></th>
                <th><b>Date Of Birth</b></th>
                <th><b>Tel #</b></th>
                <th><b>Blood Donation</b></th>
                <th><b>Least Study</b></th>
                <th><b>Study ID</b></th>
                <th><b>Study Start</b></th>
                <th><b>Study End</b></th>
                <th><b>delete</b></th>
                <th><b>change</b></th>
            </tr>";
    }

    $conn->close();
    echo  $output;
}
function updateVolInfo()
{
    $checkID=0;
    $volname=$_POST["updname"];
    $volidtype=$_POST["updidtype"];
    $volid=$_POST["updid"];
    $volbirth=$_POST["updbirth"];
    $voltel=$_POST["updtel"];
    $voldon=$_POST["upddon"];
    $volleast=$_POST["updleast"];
    $volstdid=$_POST["updstdid"];
    $volstart=$_POST["updstart"];
    $volend=$_POST["updend"];
    $oldvolid=$_POST['oldvolid'];
    $conn = mysqli_connect("localhost", "root", "", "Projectdatabase");
    if ($conn->connect_error) {
        die("connection faild" . $conn->connect_error);
    }
    $qry="SELECT id  from volunteer ";
    $result = $conn->query($qry);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            if($row['id'] !=$oldvolid)
            {if($row['id']==$volid){$checkID=1;}}

        }
    }
 if($checkID==1)
 {
     echo "-1";
 }
 else {
     if ($oldvolid != -1) {
         $sql = "UPDATE volunteer SET volname= '$volname',idtype='$volidtype' , id=$volid , dateofbirth='$volbirth', telnum= $voltel , bloddonation='$voldon'
         ,leaststudy='$volleast',studyid=$volstdid,studystart='$volstart',studyend='$volend' where id=$oldvolid";
         if ($conn->query($sql) === TRUE) {

         } else {
             echo "Error updating record: " . $conn->error;
         }
     } else {
         echo "error";
     }
 }
    $checkID=0;
    $conn->close();
    showall();
}

function  showIncompleteRecordesFun()
{

    $conn = mysqli_connect("localhost", "root", "", "Projectdatabase");
    $output='';
    if ($conn->connect_error) {
        die("connection faild" . $conn->connect_error);
    }

        $qry = "SELECT * from  Volunteer where studyid=0";
        $result = $conn->query($qry);
    if ($result->num_rows > 0) {
        $output.=  "<tr id='trupd'>
                <td style='width:12vw'><input type='text' id='nameupd'></td>
                <td> <select id='volupdtype' ><option value='ID' >ID</option><option value='passport'>passport</option></select></td>
                <td><input type='number' id='idupd'></td>
                <td><input type='date' id='birthupd'></td>
                <td><input type='tel' id='telupd'></td>
                <td><input type='date' id='donupd'></td>
                <td><input type='date' id='leastupd'></td>
                <td><input type='text' id='studyupd'></td>
                <td><input type='date' id='startupd'></td>
                 <td><input type='date' id='endupd'></td>
                 <td id='tdbutupd'><button id='saveupdbut'><b>Save</b></button></td> </tr><tr id='linebetupdtr'> 
                  <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>";
        $output.=  "<tr >
                <th style='width:12vw'><b>Name</b></th>
                <th><b>ID Type</b></th>
                <th><b>ID</b></th>
                <th><b>Date Of Birth</b></th>
                <th><b>Tel #</b></th>
                <th><b>Blood Donation</b></th>
                <th><b>Least Study</b></th>
                <th><b>Study ID</b></th>
                <th><b>Study Start</b></th>
                <th><b>Study End</b></th>
                <th><b>delete</b></th>
                <th><b>change</b></th>
            </tr>";
        while ($row = $result->fetch_assoc()) {
            $output.= '<tr><td style="width:12vw">' . $row['volname'] . '</td><td>' . $row['idtype'] . '</td><td>'
                . $row['id'] . '</td><td>' . $row['dateofbirth'] . '</td><td>' . $row['telnum'] . '</td><td>' . $row['bloddonation']
                . '</td><td>' . $row['leaststudy'] . '</td><td>' . $row['studyid'] . '</td><td>' . $row['studystart'] . '</td><td>'
                . $row['studyend'] . '</td><td><button class="deletebut">x</button>'.'</td><td>'.'<button class="updatebut">change</button>'.'</td></tr>';
        }

    }
    else
    {
        $output.=  "<tr >
                <th style='width:12vw'><b>Name</b></th>
                <th><b>ID Type</b></th>
                <th><b>ID</b></th>
                <th><b>Date Of Birth</b></th>
                <th><b>Tel #</b></th>
                <th><b>Blood Donation</b></th>
                <th><b>Least Study</b></th>
                <th><b>Study ID</b></th>
                <th><b>Study Start</b></th>
                <th><b>Study End</b></th>
                <th><b>delete</b></th>
                <th><b>change</b></th>
            </tr>";
    }

    $conn->close();
    echo  $output;
}

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

        $("#insertbut").click(function () {
            var name_txt = $("#nameins").val();
            var idtype_txt = $('#volinstype').val();
            var idins_txt = $('#idins').val();
            var birth_txt = $('#birthins').val();
            var tel_txt = $('#telins').val();
            var dona_txt = $('#donins').val();
            var least_txt = $('#leastins').val();
            var studyid_txt = $('#studyins').val();
            var start_txt = $('#startins').val();
            var end_txt = $('#endins').val();
            var flag = 0;
            var flag2=0;
            var flag3=0;
            var d=new Date();
            var current_year= d.getFullYear();
            var current_month=d.getMonth()+1;
            var current_day=d.getDate();
            var  split_birthDate=birth_txt.split('-')
            var get_year=current_year-split_birthDate[0];
            var get_month=current_month-split_birthDate[1];
             var get_day=current_day-split_birthDate[2];
            if(get_year<18){flag2=1;}
            else if(get_year==18){
                if(get_month < 0)
                {
                    flag2=1;
                }
                else if(get_month == 0)
                {
                    if(get_day < 0)
                    {
                        flag2=1;
                    }
                }
            }
            else if (get_year > 45)
             {flag3=1;}

            if (name_txt == '') {
                flag = 1;
            }
            if (idtype_txt == '') {
                flag = 1;
            }
            if (idins_txt == '') {
                flag = 1;
            }
            if (birth_txt == '') {
                flag = 1;
            }
            if (tel_txt == '') {
                flag = 1;
            }
            if (dona_txt == '') {
                flag = 1;
            }
            if (least_txt == '') {
                flag = 1;
            }
            if (studyid_txt == '') {
                flag = 1;
            }
            if (start_txt == '') {
                flag = 1;
            }
            if (end_txt == '') {
                flag = 1;
            }
            if(flag==1)
            {
                alert("Empty fields ");

            }
            else if(flag2==1)
            {
                alert("Age less than 18");
            }
            else if(flag3==1)
            {
            alert("Age grater than 45 ");
            }
            else
            {
                $.ajax({
                    method: "post",
                    url: "volunteerDatabase.php",
                    data: {name_txt,idtype_txt,idins_txt,birth_txt,tel_txt,dona_txt,least_txt,studyid_txt,start_txt,end_txt},
                    dataType: "html",
                    success: function (response) {
                        $('#tablevolun').html(response);
                    }
                });
            }

            flag=flag2=flag3=0;
        });

        $(".deletebut").click(function () {
            var result = $(this).closest('tr');
            var colcon = result.find('td:eq(2)').text();
            if(confirm("Are you sure you want to delete this ? "))
            {
               $.ajax({
                        method: "post",
                        url: "volunteerDatabase.php",
                        data: {colcon},
                        dataType: "html",
                        success: function(response) {
                            $('#tablevolun').html(response);
                        }

            });
            }   //end if
        });


        var oldvolid=-1;
        $(".updatebut").click(function () {
            var result = $(this).closest('tr');
            var upd_name = result.find('td:eq(0)').text();
            var upd_idtype = result.find('td:eq(1)').text();
            var upd_id = result.find('td:eq(2)').text();
            var upd_birth = result.find('td:eq(3)').text();
            var upd_tel = result.find('td:eq(4)').text();
            var upd_bloddon = result.find('td:eq(5)').text();
            var upd_least = result.find('td:eq(6)').text();
            var upd_studid = result.find('td:eq(7)').text();
            var upd_start = result.find('td:eq(8)').text();
            var upd_end = result.find('td:eq(9)').text();

            $('#nameupd').val(upd_name);
            $('#volupdtype').val(upd_idtype);
            $('#idupd').val(upd_id);
            $('#birthupd').val(upd_birth);
            $('#telupd').val(upd_tel);
            $('#donupd').val(upd_bloddon);
            $('#leastupd').val(upd_least);
            $('#startupd').val(upd_start);
            $('#endupd').val(upd_end);
            $('#studyupd').val(upd_studid);
            oldvolid=upd_id;
    });
        $("#saveupdbut").click(function () {
          var updname= $('#nameupd').val();
           var updidtype= $('#volupdtype').val();
          var updid= $('#idupd').val();
         var  updbirth=  $('#birthupd').val();
         var  updtel=  $('#telupd').val();
         var  upddon=   $('#donupd').val();
        var   updleast=  $('#leastupd').val();
         var  updstart= $('#startupd').val();
         var  updend=  $('#endupd').val();
         var  updstdid=   $('#studyupd').val();
         var flag = 0;
            if (updname == '') {
                flag = 1;
            }
            if (updidtype == '') {
                flag = 1;
            }
            if (updid== '') {
                flag = 1;
            }
            if (updbirth == '') {
                flag = 1;
            }
            if (updtel== '') {
                flag = 1;
            }
            if (upddon== '') {
                flag = 1;
            }
            if (updleast== '') {
                flag = 1;
            }
            if (updstart== '') {
                flag = 1;
            }
            if (updend== '') {
                flag = 1;
            }
            if (updstdid== '') {
                flag = 1;
            }

            if(flag==1)
            {
                alert("Empty fields ");

            }
            else
            {
                $.ajax({
                    method: "post",
                    url: "volunteerDatabase.php",
                    data: {updname,updidtype,updid,updbirth,updtel,upddon,updleast,updstdid,updstart,updend,oldvolid},
                    dataType: "html",
                    success: function (response) {
                        if (response=='-1')
                        {
                            alert("This ID Previously used ");
                        }
                        else {
                        $('#tablevolun').html(response);}
                    }
                });
            }

        });

    }); // end document.ready

</script>
</body>
</html>
