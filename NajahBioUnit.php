<?php
session_start();

if($_SESSION["login_nbu"]!=1)
{
  header('Location: NBULogin.html');
}

else{

?>
<!DOCTYPE html>
<html>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="NajahBioUnitCSS.css">
</head>
<body>
<div id="bodyDiv">
    <div class="tab">
        <button class="tablinks" id="voltabbut" ><b>Volunteers</b></button>
        <button class="tablinks" id="stydystabbut"><b>Studies</b></button>
        <button class="tablinks" id="formstabbut" ><b>Forms</b></button>
        <button class="tablinks" id="mailtabbut" ><b>Mail</b></button>
        <p id="date_time_p"><b></b></p>
        <button id="sign_up_but"><b><a href="Sign_Up_Folder\Sign_Up_New.html" style="text-decoration: none">Sign Up</a></b></button>
        <button id="log_out_but"><b><a href="NBU_Logout.php" style="text-decoration: none">Log Out</a></b></button>

    </div>

           <div id="voltab">
                   <table id="searchtable">
                       <tr><td></td><td></td><td></td></tr>
                       <tr><td><select id="select_volid_studyid"><option value="vol_id"><b>Volunteer ID</b></option> <option value="study_id"><b>Study ID</b></option></select></td><td><input type="number" id="searchtextId"></td><td><button id="searchvolbut" >Search</button></td><td id="notexisttxt>"</td>
                       <td></td><td></td><td> <b><button id="show_incomplete_volunteer_data_but">show incomplete recordes</button></b></td></tr>

                   </table>

               <div id="updvoldiv">
                   <table id="updvoltable">

                   </table>
               </div>
               <div id="divtablevol" >
                   <table class="tablvol" id="tablevolun">
                   </table>
               </div>

            </div>
        <div id="studystab">

                <form action="studyDatabase.php" method="post" enctype="multipart/form-data">
                    <table id="tabletoaddnewstudy"><tr><th>study ID</th><td> <input type="number" name="studyID" class="inputaddstdclass"></td><th>Study Name</th><td><input type="text" name="studyName"  class="inputaddstdclass"></td><th>study file</th><td> <input type="file" name="studyFile" class="inputaddstdclass"> </td><th>Date created</th><td><input type="date" class="inputaddstdclass" name="study_created_date" id="study_created_date_id"> </td><td></td><td> <input type="submit" id="addStubutID" name="addStubutName" value="Add"></td></tr></table>
                </form>
                <table id="searchstdtable">
                    <tr><td><select id="select_studyid_studyname"><option value="study_id"><b>Study ID</b></option> <option value="study_name"><b>Study Name</b></option></select></td><td><input type="text" name="searchstdtxt" id="searchstdtxt_id"></td> <td><button id='searchstdbutid' name='searchstdbutname'><b>Search</b></button ></td></tr>
                </table>

            <div id="divtablestudy">
                <table class="tablvol" id="tablestudy">
                </table>
            </div>
          </div>
            <div id="formstab">
                <table id="form_table_sort">
                    <tr><td><b>Show</b></td><td><select id="select_all_pales_id" ><option>Palestine</option><option>All</option></select></td><td></td><td><button id="get_mod_forms_but"><b>the most recent</b></button></td></tr>
                </table>
                <div id="addstudydiv">
                <div id="divtablestudy">

                    <table class="tablvol" id="tableforms">
                    </table>
                </div>
            </div>
            </div>
                <div id="mailtab">
                    <table id="send_buttons_table"><tr><td><button id="sentbut_toMOH"><b>Send a study to MOH</b></button></td>
                            <td><button id="sentbut_toIRB"><b>Send a study to IRB </b></button>
                            </td><td><button id="studies_sent_to_MOH_but"><b>Studies sent to MOH</b></button></td>
                            <td><button id="studies_sent_to_IRB_but"><b>Studies sent to IRB</b></button></td></tr></table>




                    <div id="send_study_to_moh_div" >
                       <form method="post" action="Add_Files_To_MOH_DB.php" enctype="multipart/form-data" id="toMOH_form">
                      <table id="send_toMOH_Form_table">
                          <tr><td><b>Study ID</b></td><td><input type="number" name="study_id_toMOH" id="study_id_toMOH_id"></td></tr>
                         <tr><td ><b>Study Name</b></td><td><input type="text" name="study_name_toMOH" id="study_name_toMOH_id"></td></tr>
                      <tr><td ><b>Study File</b></td><td><input type="file" name="study_file_toMOH" id="study_file_toMOH_id"> </td></tr>
                       <tr> <td><b>Volunteers File</b></td><td><input type="file" name="volunteers_file_toMOH" id="volunteers_file_toMOH_id" > </td></tr>
                   <tr> <td ><b>Date of sent</b></td><td><input type="date" name="date_of_sent_toMOH" id="date_of_sent_toMOH_id"></td></tr>
                    <tr>  <td></td><td><input type="submit" name="submit_study_toMOH" value="Send" id="submit_study_toMOH_id" > </td></tr>
                      </table>
                       </form>
                    </div>
                    <div id="send_study_to_irb_div">
                            <form action="Add_Files_To_IRB_DB.php" method="post" enctype="multipart/form-data">
                            <table id="send_toIRB_Form_table">
                                <tr><td><b>Study ID</b></td><td><input type="number" name="study_id_toIRB" id="study_id_toIRB_id"></td></tr>
                                <tr><td ><b>Study Name</b></td><td><input type="text" name="study_name_toIRB" id="study_name_toIRB_id"></td></tr>
                                <tr><td ><b>Study File</b></td><td><input type="file" name="study_file_toIRB" id="study_file_toIRB"> </td></tr>
                                <tr> <td ><b>Date of sent</b></td><td><input type="date" name="date_of_sent_toIRB" id="date_of_sent_toIRB_id"></td></tr>
                                <tr><td><b>Enter the text for the study announcement</b></td><td><textarea name="textareaName" id="textareaName_id"></textarea></td></tr>
                                <tr>  <td></td><td><input type="submit" name="submit_study_toIRB" value="Send" id="submit_study_toIRB_id"> </td></tr>
                            </table>
                            </form>
                    </div>
                    <table id="search_maile_moh" class="search_mail_class">
                        <tr><td><select id="select_studyid_studyname_mail_moh"><option value="study_id"><b>Study ID</b></option> <option value="study_name"><b>Study Name</b></option></select></td><td><input type="text" id="searchstdtxt_mail_moh_id"></td> <td><button id='searchstdbutid_moh_mail' ><b>Search</b></button ></td></tr>
                    </table>
                    <table id="search_maile_irb" class="search_mail_class">
                        <tr><td><select id="select_studyid_studyname_mail_irb"><option value="study_id"><b>Study ID</b></option> <option value="study_name"><b>Study Name</b></option></select></td><td><input type="text" id="searchstdtxt_mail_irb_id"></td> <td><button id='searchstdbutid_irb_mail' ><b>Search</b></button ></td></tr>
                    </table>

                    <table id="mail_table_moh" class="tablvol" style="margin-top: 3vw">

                </table>
                <table id="mail_table_irb" class="tablvol" style="margin-top: 3vw">

                </table>
                </div>
<div id="footerDiv"></div>
<script>
    // //set created date
      var d = new Date();
      var year=d.getFullYear()
      var month=d.getMonth()+1;
      var days = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
      var day=d.getDate();
      var myVar = setInterval(myTimer, 1000);
      function myTimer() {
        var d = new Date();
        document.getElementById("date_time_p").innerHTML = month+'/'+day+'/'+year+'----'+d.toLocaleTimeString();
    }

    $(document).ready(function () {
        $("#voltabbut").click(function (e) {
            $("#studystab").hide();
            $("#formstab").hide();
            $("#mailtab").hide();
            $("#voltab").show();
            e.preventDefault();
            $.ajax({
                method: "post",
                url: "volunteerDatabase.php",
                data: "showVolunteers",
                dataType: "html",
                success: function (response) {
                    $('#tablevolun').html(response);
                }
            });
        });
        $("#stydystabbut").click(function (e) {
            $("#mailtab").hide();
            $("#voltab").hide();
            $("#formstab").hide();
            $("#studystab").show();
            e.preventDefault();
            $.ajax({
                method: "post",
                url: "studyDatabase.php",
                data: "showStudys",
                dataType: "html",
                success: function (response) {
                    $('#tablestudy').html(response);
                }
            });

        });
        $("#formstabbut").click(function (e) {
            $("#mailtab").hide();
            $("#voltab").hide();
            $("#studystab").hide();
            $("#formstab").show();
            e.preventDefault();
            $.ajax({
                method: "post",
                url: "formProcessing.php",
                data: "showAllforms",
                dataType: "html",
                success: function (response) {
                    $('#tableforms').html(response);
                }
            });
        });
        $("#mailtabbut").click(function (e) {
            e.preventDefault();
            $("#voltab").hide();
            $("#formstab").hide();
            $("#studystab").hide();
            $("#mailtab").show();

        });
        //volunteer search
        $("#searchvolbut").click(function (e) {
            e.preventDefault();
            var search_txt = $('#searchtextId').val();
            var searchby = $('#select_volid_studyid').val();

            if (search_txt == '') {
                alert('Empty id search ');
            } else {
                if (searchby == 'vol_id') {


                        $.ajax({
                        method: "post",
                        url: "volunteerDatabase.php",
                        data: {search_txt, searchby},
                        dataType: "html",
                        success: function (response) {
                            $('#tablevolun').html(response);
                        }
                    });
                } //end inner if
                else if (searchby == 'study_id') {
                    $.ajax({
                        method: "post",
                        url: "volunteerDatabase.php",
                        data: {search_txt, searchby},
                        dataType: "html",
                        success: function (response) {
                            $('#tablevolun').html(response);
                        }
                    });
                }//end inner else if
            }//end else
        });
        $("#searchstdbutid").click(function (e) {
            e.preventDefault();
            var search_study_txt = $('#searchstdtxt_id').val();
            var search_study_by = $('#select_studyid_studyname').val();
            if (search_study_txt == '') {
                alert('Empty id search ');
            }
            else {
                if (search_study_by == 'study_id') {

                    $.ajax({
                        method: "post",
                        url: "studyDatabase.php",
                        data: {search_study_txt,search_study_by},
                        dataType: "html",
                        success: function (response) {
                            $('#tablestudy').html(response);
                        }
                    });
                } //end inner if
                else if (search_study_by == 'study_name') {

                    $.ajax({
                        method: "post",
                        url: "studyDatabase.php",
                        data: {search_study_txt,search_study_by},
                        dataType: "html",
                        success: function (response) {
                            $('#tablestudy').html(response);
                        }
                    });
                }//end inner else if
            }//end else
        });
        $("#show_incomplete_volunteer_data_but").click(function (e) {
            e.preventDefault();
            $.ajax({
                method: "post",
                url: "volunteerDatabase.php",
                data: "showIncompleteRecordes",
                dataType: "html",
                success: function (response) {
                    $('#tablevolun').html(response);
                }
            });
        });
        $("#sentbut_toMOH").click(function () {
            $("#send_study_to_irb_div").hide();
            $("#send_study_to_moh_div").slideToggle("slow");
        });


        $("#sentbut_toIRB").click(function () {
            $("#send_study_to_moh_div").hide();
            $("#send_study_to_irb_div").slideToggle("slow");

        });

        $("#select_all_pales_id").mouseleave(function (e) {
            show_all_palestine_forms=  $("#select_all_pales_id").val();
            e.preventDefault();
             $.ajax({
                 method: "post",
                url: "formProcessing.php",
                data:{show_all_palestine_forms},
                dataType: "html",
                success: function (response) {
                    $('#tableforms').html(response);
                }
            });
        });
        $("#studies_sent_to_MOH_but").click(function (e) {
            $('#mail_table_irb').hide();
            $('#search_maile_irb').hide();
            $('#search_maile_moh').show();
            $('#mail_table_moh').show();
            var d = new Date();
            var timeSaved= d.toLocaleTimeString();
            e.preventDefault();
            $.ajax({
                method: "post",
                url: "studies_sent_toMOH.php",
                data: 'showAll',
                dataType: "html",
                success: function (response) {
                   $('#mail_table_moh').html(response);

                }
            });
        });
        $("#studies_sent_to_IRB_but").click(function (e) {
            $('#mail_table_moh').hide();
            $('#search_maile_moh').hide();
            $('#search_maile_irb').show();
            $('#mail_table_irb').show();
            e.preventDefault();
            $.ajax({
                method: "post",
                url: "studies_sent_toIRB.php",
                data: 'showAll',
                dataType: "html",
                success: function (response) {
                    $('#mail_table_irb').html(response);

                }
            });
        });
        // $("#toMOH_form").on('submit',function (e) {
        //      var that=$(this),
        //          url=that.attr('action'),
        //          type=that.attr('method'),
        //          data={};
        //
        //      that.find('[name]').each(function (index,value) {
        //          var that=$(this),
        //          name=that.attr('name'),
        //              value=that.val();
        //              data[name]=value;
        //      });
        //     $.ajax({
        //         url: url,
        //         type:type,
        //         data: data,
        //         success: function (response) {
        //         }
        //     });
        //     return false ;
        // });
        $("#searchstdbutid_moh_mail").click(function (e) {

            e.preventDefault();
            var search_txt_moh = $('#searchstdtxt_mail_moh_id').val();
            var searchby_moh= $('#select_studyid_studyname_mail_moh').val();

            if (search_txt_moh == '') {
                alert('Empty id search ');
            } else {
                $.ajax({
                    method: "post",
                    url: "studies_sent_toMOH.php",
                    data: {search_txt_moh, searchby_moh},
                    dataType: "html",
                    success: function (response) {
                        $('#mail_table_moh').html(response);
                    }
                });
            }

        });
        $("#searchstdbutid_irb_mail").click(function (e) {

            e.preventDefault();
            var search_txt_irb = $('#searchstdtxt_mail_irb_id').val();
            var searchby_irb= $('#select_studyid_studyname_mail_irb').val();

            if (search_txt_irb == '') {
                alert('Empty id search ');
            } else {
                $.ajax({
                    method: "post",
                    url: "studies_sent_toIRB.php",
                    data: {search_txt_irb, searchby_irb},
                    dataType: "html",
                    success: function (response) {
                        $('#mail_table_irb').html(response);
                    }
                });
            }

        });
        // $("#log_out_but").click(function (e) {
        //     e.preventDefault();
        //     $.ajax({
        //         method: "post",
        //         url: "NBU_Logout.php",
        //         data: 'logout_nbu',
        //         dataType: "html",
        //         success: function (response) {
        //            document.write(response);
        //         }
        //     });
        //
        // });
        $("#get_mod_forms_but").click(function (e) {

            e.preventDefault();
            $.ajax({
                method: "post",
                url: "formProcessing.php",
                data: 'sortForms',
                dataType: "html",
                success: function (response) {
                    $('#tableforms').html(response);
                }
            });

        });
    });
</script>
</body>
</html>
<?php
}
?>
