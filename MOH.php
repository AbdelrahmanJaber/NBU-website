<?php
session_start();

if($_SESSION["login_moh"]!=1)
{
    header('Location: MOHLogin.html');
}

else {

    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Title</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet"
              href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="MOH.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script>
            function Get_Current_Date() {
                var current_date = new Date();

                var day = current_date.getDay();
                var The_Day = "";

                if (day == 0) {
                    The_Day = "الأحد";
                } else if (day == 1) {
                    The_Day = "الاثنين";
                } else if (day == 2) {
                    The_Day = "الثلاثاء";
                } else if (day == 3) {
                    The_Day = "الأربعاء";
                } else if (day == 4) {
                    The_Day = "الخميس";
                } else if (day == 5) {
                    The_Day = "الجمعة";
                } else if (day == 6) {
                    The_Day = "السبت";
                }

                var The_Day_In_Month = current_date.getDate();

                var The_Month = current_date.getMonth() + 1;

                var The_Year = current_date.getFullYear();

                var output = The_Day + "  " + The_Day_In_Month + "-" + The_Month + "-" + The_Year;

                $("#display_date").html(output);

            }

            $(document).ready(function () {

                setInterval(Get_Current_Date, 300);

                var flag_for_toggle = 0;
                $('#ShowMOH').click(function (e) {

                    e.preventDefault();

                    $.ajax({

                        method: "post",
                        url: "MOH_Process.php",
                        data: "Show_Received_Studies",
                        dataType: "html",
                        success: function (response) {
                            $("#Content1").html(response);
                        }
                    });
                    if (flag_for_toggle == 0) {
                        $("#Content1").hide();
                        $("#Content1").slideToggle("slow");
                        flag_for_toggle = 1;
                    } else {
                        $("#Content1").slideToggle("slow");
                    }
                });

                $('#Sort_By_Name').click(function (e) {

                    if (!($('#Content1').is(':empty'))) {

                        e.preventDefault();

                        $.ajax({

                            method: "post",
                            url: "MOH_Process.php",
                            data: "Sort_By_Name",
                            dataType: "html",
                            success: function (response) {
                                $("#Content1").html(response);
                            }
                        });
                    }
                });

                $('#Sort_By_ID').click(function (e) {

                    if (!($('#Content1').is(':empty'))) {

                        e.preventDefault();

                        $.ajax({

                            method: "post",
                            url: "MOH_Process.php",
                            data: "Sort_By_ID",
                            dataType: "html",
                            success: function (response) {
                                $("#Content1").html(response);
                            }
                        });
                    }
                });

                $('#Sort_By_Date').click(function (e) {

                    if (!($('#Content1').is(':empty'))) {

                        e.preventDefault();

                        $.ajax({

                            method: "post",
                            url: "MOH_Process.php",
                            data: "Sort_By_Date",
                            dataType: "html",
                            success: function (response) {
                                $("#Content1").html(response);
                            }
                        });
                    }
                });

                $("#Delete").click(function (e) {
                    var $checkBox;
                    var status;
                    var id;
                    var flag = "Delete";

                    if (!($('#Content1').is(':empty'))) {
                        $("#MOH_Table tr").each(function () {
                            $checkBox = $(this).find('input[type="checkbox"]');

                            if ($checkBox.length) {
                                status = $checkBox.prop('checked');
                                if (status == true) {
                                    id = $(this).find("td").eq(1).html();
                                    e.preventDefault();
                                    $.ajax({
                                        method: "post",
                                        url: "MOH_Process.php",
                                        data: {id, flag},
                                        dataType: "html",
                                        success: function (response) {
                                            $("#Content1").html(response);
                                        }

                                    });
                                }

                            }

                        });
                    }
                });

                $("#search").keyup(function (e) {

                    var SearchData = "";
                    var Search = "Search_Flag";
                    var numbers = /^[0-9]+$/;
                    SearchData = $("#search").val();
                    var Search_Type = "";
                    if (SearchData.match(numbers)) {
                        if (!($('#Content1').is(':empty'))) {
                            SearchData = $("#search").val();
                            Search_Type = "Search_By_ID";
                            e.preventDefault();

                            $.ajax({
                                method: "post",
                                url: "MOH_Process.php",
                                data: {SearchData, Search, Search_Type},
                                dataType: "html",
                                success: function (response) {
                                    $("#Content1").html(response);
                                }

                            });
                        }
                    } else {
                        if (!($('#Content1').is(':empty'))) {
                            SearchData = $("#search").val();
                            Search_Type = "Search_By_Name";
                            e.preventDefault();

                            $.ajax({
                                method: "post",
                                url: "MOH_Process.php",
                                data: {SearchData, Search, Search_Type},
                                dataType: "html",
                                success: function (response) {
                                    $("#Content1").html(response);
                                }

                            });
                        }
                    }
                });

            });
        </script>
    </head>
    <body>

    <div id="header">
        <img src="MOH.png" id="MOHimage">

        <button class="icon" id="youtube_icon"><a href="https://www.youtube.com/channel/UCaCGOGw1_Oyucwb1ymgSrQA"><i
                    class="fa fa-youtube"></i></a></button>

        <button class="icon" id="instagram_icon"><a href="https://www.instagram.com/palestine.moh/"><i
                    class="fa fa-instagram"></i></a></button>

        <button class="icon" id="twitter_icon"><a href="https://twitter.com/palestine_moh"><i class="fa fa-twitter"></i></a>
        </button>

        <button class="icon" id="facebook_icon"><a href="https://www.facebook.com/mohps/"><i class="fa fa-facebook"></i></a>
        </button>

        <div id="display_date"></div>
        <button id="log_out_moh_but"><b><a href="MOH_Logout.php">تسجيل الخروج</a></b></button>

    </div>


    <div class="topnav">
        <a class="active" href="#" id="ShowMOH">Show Received Studies</a>
        <div class="dropdown">
            <button class="dropbtn">Sort By
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
                <a href="#" id="Sort_By_Name">Name</a>
                <a href="#" id="Sort_By_ID">ID</a>
                <a href="#" id="Sort_By_Date">Date</a>
            </div>
        </div>
        <a href="#" id="Delete">Delete Selected Rows</a>
        <div class="search-container">
            <input type="text" placeholder="Search.." name="search" id="search">
            <button><i class="fa fa-search"></i></button>
        </div>


    </div>

    <div id="Content1"></div>


    </body>
    </html>
    <?php
}
        ?>