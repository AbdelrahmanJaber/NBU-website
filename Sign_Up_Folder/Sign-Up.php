<?php

if (isset($_POST['uName']) && isset($_POST['uID']) && isset($_POST['uEmail']) && isset($_POST['uPhone']) && isset($_POST['uPassword']) && isset($_POST['uCPassword'])) {

    if ($_POST['uPassword'] != $_POST['uCPassword']) {
        header("Location: Sign_Up_New.html");

    }

    if ($_POST['mem_level'] == 4) {
        header("Location: Sign_Up_New.html");

    }

    $Member_Level = $_POST['mem_level'];


    if ($Member_Level == 1) {
        //NBU member
        $host = "localhost";
        $username = "root";
        $password = "";
        $dbname = "projectdatabase";

        $db = new mysqli($host, $username, $password, $dbname);

        if (mysqli_connect_errno()) {
            echo "can not connect to Database";
            exit;
        }

        $UserName = mysqli_real_escape_string($db, $_POST['uName']);
        $UserID= mysqli_real_escape_string($db, $_POST['uID']);
        $UserEmail = mysqli_real_escape_string($db, $_POST['uEmail']);
        $UserPhone= mysqli_real_escape_string($db, $_POST['uPhone']);
        $UserPassword = mysqli_real_escape_string($db, $_POST['uPassword']);



        $sql = "INSERT INTO nbu_users (user_name,user_id,user_email,user_pass,user_phone) VALUES (?,?,?,?,?);";

        $stmt = mysqli_stmt_init($db);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo "SQL Error !!!";
            $db->close();
        } else {
            mysqli_stmt_bind_param($stmt, "sissi", $UserName,$UserID, $UserEmail,$UserPassword,$UserPhone);
            mysqli_stmt_execute($stmt);
            //success();
            $db->close();
            header("Location: SuccessRegistration.html");

        }

    }
    else if ($Member_Level == 2) {
        //MOH member
        $host = "localhost";
        $username = "root";
        $password = "";
        $dbname = "moh_db";

        $db = new mysqli($host, $username, $password, $dbname);

        if (mysqli_connect_errno()) {
            echo "can not connect to Database";
            exit;
        }

        $UserName = mysqli_real_escape_string($db, $_POST['uName']);
        $UserID= mysqli_real_escape_string($db, $_POST['uID']);
        $UserEmail = mysqli_real_escape_string($db, $_POST['uEmail']);
        $UserPhone= mysqli_real_escape_string($db, $_POST['uPhone']);
        $UserPassword = mysqli_real_escape_string($db, $_POST['uPassword']);



        $sql = "INSERT INTO moh_users (user_name,user_id,user_email,user_pass,user_phone) VALUES (?,?,?,?,?);";

        $stmt = mysqli_stmt_init($db);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo "SQL Error !!!";
            $db->close();
        } else {
            mysqli_stmt_bind_param($stmt, "sisis", $UserName,$UserID, $UserEmail,$UserPhone, $UserPassword);
            mysqli_stmt_execute($stmt);
            //success();
            $db->close();
            header("Location: SuccessRegistration.html");

        }

    }
    else if ($Member_Level == 3) {
        //IRB member
        $host = "localhost";
        $username = "root";
        $password = "";
        $dbname = "irb_db";

        $db = new mysqli($host, $username, $password, $dbname);

        if (mysqli_connect_errno()) {
            echo "can not connect to Database";
            exit;
        }

        $UserName = mysqli_real_escape_string($db, $_POST['uName']);
        $UserID= mysqli_real_escape_string($db, $_POST['uID']);
        $UserEmail = mysqli_real_escape_string($db, $_POST['uEmail']);
        $UserPhone= mysqli_real_escape_string($db, $_POST['uPhone']);
        $UserPassword = mysqli_real_escape_string($db, $_POST['uPassword']);



        $sql = "INSERT INTO irb_users (user_name,user_id,user_email,user_pass,user_phone) VALUES (?,?,?,?,?);";

        $stmt = mysqli_stmt_init($db);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo "SQL Error !!!";
            $db->close();
        } else {
            mysqli_stmt_bind_param($stmt, "sisis", $UserName,$UserID, $UserEmail,$UserPhone, $UserPassword);
            mysqli_stmt_execute($stmt);
            //success();
            $db->close();
            header("Location: SuccessRegistration.html");

        }

    }


}





