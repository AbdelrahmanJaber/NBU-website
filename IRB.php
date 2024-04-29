<?php
session_start();

if($_SESSION["login_irb"]!=1)
{
    header('Location: IRBLogin.html');
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
        <link rel="stylesheet" href="IRB.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script>
            function Get_Current_Date() {
                var current_date = new Date();

                var day = current_date.getDay();
                var The_Day = "";

                if (day == 0) {
                    The_Day = "Sunday";
                } else if (day == 1) {
                    The_Day = "Monday";
                } else if (day == 2) {
                    The_Day = "Tuesday";
                } else if (day == 3) {
                    The_Day = "Wednesday";
                } else if (day == 4) {
                    The_Day = "Thursday";
                } else if (day == 5) {
                    The_Day = "Friday";
                } else if (day == 6) {
                    The_Day = "Saturday";
                }

                var The_Day_In_Month = current_date.getDate();

                var The_Month = current_date.getMonth() + 1;

                var The_Year = current_date.getFullYear();

                var output = The_Day + ":" + "&nbsp&nbsp" + The_Day_In_Month + "/" + The_Month + "/" + The_Year;

                $("#display_date").html(output);

            }

            function Selector(The_Table, The_Sort_Type) {
                // alert(The_Table);
                // alert(The_Sort_Type);


                if (The_Table == 0 && The_Sort_Type == 1) {
                    // alert("nothing");
                } else if (The_Table == 0 && The_Sort_Type == 2) {
                    // alert("nothing");
                } else if (The_Table == 0 && The_Sort_Type == 3) {
                    // alert("nothing");
                } else if (The_Table == 1 && The_Sort_Type == 0) {
                    // alert("rec without sort");

                    $.ajax({

                        method: "post",
                        url: "IRB_Process.php",
                        data: "Show_Received_Studies_Without_Any_Sort",
                        dataType: "html",
                        success: function (response) {
                            $("#Content").html(response);
                        }
                    });
                } else if (The_Table == 1 && The_Sort_Type == 1) {
                    //alert("rec with sort name");

                    $.ajax({

                        method: "post",
                        url: "IRB_Process.php",
                        data: "Show_Received_Studies_With_Sort_By_Name",
                        dataType: "html",
                        success: function (response) {
                            $("#Content").html(response);
                        }
                    });
                } else if (The_Table == 1 && The_Sort_Type == 2) {
                    // alert("rec with sort id");

                    $.ajax({

                        method: "post",
                        url: "IRB_Process.php",
                        data: "Show_Received_Studies_With_Sort_By_ID",
                        dataType: "html",
                        success: function (response) {
                            $("#Content").html(response);
                        }
                    });
                } else if (The_Table == 1 && The_Sort_Type == 3) {
                    // alert("rec with sort date");

                    $.ajax({

                        method: "post",
                        url: "IRB_Process.php",
                        data: "Show_Received_Studies_With_Sort_By_Date",
                        dataType: "html",
                        success: function (response) {
                            $("#Content").html(response);
                        }
                    });
                } else if (The_Table == 2 && The_Sort_Type == 0) {
                    // alert("acc without sort");

                    $.ajax({

                        method: "post",
                        url: "IRB_Process.php",
                        data: "Show_Accepted_Studies_Without_Any_Sort",
                        dataType: "html",
                        success: function (response) {
                            $("#Content").html(response);
                        }
                    });
                } else if (The_Table == 2 && The_Sort_Type == 1) {
                    // alert("acc with sort name");

                    $.ajax({

                        method: "post",
                        url: "IRB_Process.php",
                        data: "Show_Accepted_Studies_With_Sort_By_Name",
                        dataType: "html",
                        success: function (response) {
                            $("#Content").html(response);
                        }
                    });

                } else if (The_Table == 2 && The_Sort_Type == 2) {
                    // alert("acc with sort id");

                    $.ajax({

                        method: "post",
                        url: "IRB_Process.php",
                        data: "Show_Accepted_Studies_With_Sort_By_ID",
                        dataType: "html",
                        success: function (response) {
                            $("#Content").html(response);
                        }
                    });

                } else if (The_Table == 2 && The_Sort_Type == 3) {
                    // alert("acc with sort date");

                    $.ajax({

                        method: "post",
                        url: "IRB_Process.php",
                        data: "Show_Accepted_Studies_With_Sort_By_Date",
                        dataType: "html",
                        success: function (response) {
                            $("#Content").html(response);
                        }
                    });

                } else if (The_Table == 3 && The_Sort_Type == 0) {
                    // alert("rej without sort");

                    $.ajax({

                        method: "post",
                        url: "IRB_Process.php",
                        data: "Show_Rejected_Studies_Without_Any_Sort",
                        dataType: "html",
                        success: function (response) {
                            $("#Content").html(response);
                        }
                    });
                } else if (The_Table == 3 && The_Sort_Type == 1) {
                    // alert("rej with sort name");

                    $.ajax({

                        method: "post",
                        url: "IRB_Process.php",
                        data: "Show_Rejected_Studies_With_Sort_By_Name",
                        dataType: "html",
                        success: function (response) {
                            $("#Content").html(response);
                        }
                    });
                } else if (The_Table == 3 && The_Sort_Type == 2) {
                    // alert("rej with sort id");

                    $.ajax({

                        method: "post",
                        url: "IRB_Process.php",
                        data: "Show_Rejected_Studies_With_Sort_By_ID",
                        dataType: "html",
                        success: function (response) {
                            $("#Content").html(response);
                        }
                    });
                } else if (The_Table == 3 && The_Sort_Type == 3) {
                    // alert("rej with sort date");

                    $.ajax({

                        method: "post",
                        url: "IRB_Process.php",
                        data: "Show_Rejected_Studies_With_Sort_By_Date",
                        dataType: "html",
                        success: function (response) {
                            $("#Content").html(response);
                        }
                    });
                }


            }

            $(document).ready(function () {


                setInterval(Get_Current_Date, 300);

                var Table = 0;
                var Sort_Type = 0;

                $('#Received_Studies').click(function (e) {
                    e.preventDefault();
                    Table = 1;
                    //  Table="REC TABLE";
                    Selector(Table, Sort_Type);
                });

                $('#Accepted_Studies').click(function (e) {
                    e.preventDefault();
                    Table = 2;
                    // Table="Acc TABLE";
                    Selector(Table, Sort_Type);
                });

                $('#Rejected_Studies').click(function (e) {
                    e.preventDefault();
                    Table = 3;
                    // Table="REJ TABLE";
                    Selector(Table, Sort_Type);
                });

                $("#Sort_By_Name").click(function (e) {
                    e.preventDefault();
                    Sort_Type = 1;
                    Selector(Table, Sort_Type);
                });

                $("#Sort_By_ID").click(function (e) {
                    e.preventDefault();
                    Sort_Type = 2;
                    Selector(Table, Sort_Type);
                });

                $("#Sort_By_Date").click(function (e) {
                    e.preventDefault();
                    Sort_Type = 3;
                    Selector(Table, Sort_Type);
                });


                $("#Delete").click(function (e) {

                    e.preventDefault();
                    var $checkbox_Delete;
                    var length_for_checkbox_delete;
                    var status_for_checkbox_delete;
                    var id_for_delete;
                    var flag_for_delete;

                    if (Table == 0) {
                        //there is no table
                    } else if (Table == 1) {

                        $("#IRB_Table tr").each(function () {

                            $checkbox_Delete = $(this).find("td input[type=\"checkbox\"]").eq(0);

                            length_for_checkbox_delete = $checkbox_Delete.length;

                            if (length_for_checkbox_delete != 0) {

                                status_for_checkbox_delete = $checkbox_Delete.prop('checked');

                                id_for_delete = $(this).find("td").eq(1).html();

                                if (status_for_checkbox_delete == true) {

                                    flag_for_delete = "delete_from_received_files";

                                    $.ajax({
                                        method: "post",
                                        url: "IRB_Process.php",
                                        data: {flag_for_delete, id_for_delete},
                                        dataType: "html",
                                        success: function (response) {
                                            $("#Content").html(response);
                                        }

                                    });

                                }

                            }


                        });

                    } else if (Table == 2) {
                        $("#IRB_Table tr").each(function () {

                            $checkbox_Delete = $(this).find("td input[type=\"checkbox\"]").eq(0);

                            length_for_checkbox_delete = $checkbox_Delete.length;

                            if (length_for_checkbox_delete != 0) {

                                status_for_checkbox_delete = $checkbox_Delete.prop('checked');

                                id_for_delete = $(this).find("td").eq(1).html();

                                if (status_for_checkbox_delete == true) {

                                    flag_for_delete = "delete_from_accepted_files";

                                    $.ajax({
                                        method: "post",
                                        url: "IRB_Process.php",
                                        data: {flag_for_delete, id_for_delete},
                                        dataType: "html",
                                        success: function (response) {
                                            $("#Content").html(response);
                                        }

                                    });

                                }

                            }


                        });
                    } else if (Table == 3) {
                        $("#IRB_Table tr").each(function () {

                            $checkbox_Delete = $(this).find("td input[type=\"checkbox\"]").eq(0);

                            length_for_checkbox_delete = $checkbox_Delete.length;

                            if (length_for_checkbox_delete != 0) {

                                status_for_checkbox_delete = $checkbox_Delete.prop('checked');

                                id_for_delete = $(this).find("td").eq(1).html();

                                if (status_for_checkbox_delete == true) {

                                    flag_for_delete = "delete_from_rejected_files";

                                    $.ajax({
                                        method: "post",
                                        url: "IRB_Process.php",
                                        data: {flag_for_delete, id_for_delete},
                                        dataType: "html",
                                        success: function (response) {
                                            $("#Content").html(response);
                                        }

                                    });

                                }

                            }


                        });

                    }

                });


                $("#search").keyup(function (e) {
                    e.preventDefault();

                    var SearchData = "";
                    var numbers = /^[0-9]+$/;
                    SearchData = $("#search").val();
                    var Search_Type = "";
                    var flag_for_search;

                    if (Table == 0) {
                        //No Table
                    } else if (Table == 1) {
                        flag_for_search = "search_in_received_files";

                        if (SearchData.match(numbers)) {

                            SearchData = $("#search").val();
                            Search_Type = "Search_By_ID";

                            $.ajax({
                                method: "post",
                                url: "IRB_Process.php",
                                data: {SearchData, Search_Type, flag_for_search},
                                dataType: "html",
                                success: function (response) {
                                    $("#Content").html(response);
                                }

                            });
                        } else {
                            SearchData = $("#search").val();
                            Search_Type = "Search_By_Name";
                            e.preventDefault();

                            $.ajax({
                                method: "post",
                                url: "IRB_Process.php",
                                data: {SearchData, Search_Type, flag_for_search},
                                dataType: "html",
                                success: function (response) {
                                    $("#Content").html(response);
                                }

                            });
                        }
                    } else if (Table == 2) {
                        flag_for_search = "search_in_accepted_files";

                        if (SearchData.match(numbers)) {

                            SearchData = $("#search").val();
                            Search_Type = "Search_By_ID";

                            $.ajax({
                                method: "post",
                                url: "IRB_Process.php",
                                data: {SearchData, Search_Type, flag_for_search},
                                dataType: "html",
                                success: function (response) {
                                    $("#Content").html(response);
                                }

                            });
                        } else {
                            SearchData = $("#search").val();
                            Search_Type = "Search_By_Name";
                            e.preventDefault();

                            $.ajax({
                                method: "post",
                                url: "IRB_Process.php",
                                data: {SearchData, Search_Type, flag_for_search},
                                dataType: "html",
                                success: function (response) {
                                    $("#Content").html(response);
                                }

                            });
                        }

                    } else if (Table == 3) {
                        flag_for_search = "search_in_rejected_files";

                        if (SearchData.match(numbers)) {

                            SearchData = $("#search").val();
                            Search_Type = "Search_By_ID";

                            $.ajax({
                                method: "post",
                                url: "IRB_Process.php",
                                data: {SearchData, Search_Type, flag_for_search},
                                dataType: "html",
                                success: function (response) {
                                    $("#Content").html(response);
                                }

                            });
                        } else {
                            SearchData = $("#search").val();
                            Search_Type = "Search_By_Name";
                            e.preventDefault();

                            $.ajax({
                                method: "post",
                                url: "IRB_Process.php",
                                data: {SearchData, Search_Type, flag_for_search},
                                dataType: "html",
                                success: function (response) {
                                    $("#Content").html(response);
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
        <img src="IRB.png" id="IRB_Img">
        <div id="display_date"></div>
        <button id="irb_logout_but"><b><a href="IRB_Logout.php" style=" text-decoration: none;">Log Out</a></b></button>
    </div>

    <div class="topnav">

        <div class="dropdown">
            <button class="dropbtn">Show
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
                <a href="#" id="Received_Studies">Received Studies</a>
                <a href="#" id="Accepted_Studies">Accepted Studies</a>
                <a href="#" id="Rejected_Studies">Rejected Studies</a>
            </div>
        </div>

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
        <a href="#" id="Delete">Delete</a>
        <div class="search-container">
            <input type="text" placeholder="Search.." name="search" id="search">
            <button><i class="fa fa-search"></i></button>
        </div>


    </div>

    <div id="Content"></div>


    </body>
    </html>
    <?php
}
?>