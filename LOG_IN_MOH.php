<?php

session_start();
$_SESSION["login_moh"] = 0;
$User_id = "";
$pass = "";
$host = "localhost";
$username = "root";
$password = "";
$dbname = "moh_db";


if ((isset($_POST["user_name1"]) && isset($_POST["password1"]))) {


    $User_id = (int)$_POST["user_name1"];
    $pass = $_POST["password1"];

    $db = new mysqli($host, $username, $password, $dbname);

    if (mysqli_connect_errno()) {
        echo "can not connect to Database";
        exit;
    }

    $sql = "SELECT * FROM moh_users WHERE user_id=? AND user_pass=?;";
    $stmt = mysqli_stmt_init($db);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "SQL statement failed";
        exit;
    } else {

        mysqli_stmt_bind_param($stmt, "is", $User_id, $pass);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        $flag = 1;
        while ($row = mysqli_fetch_assoc($result)) {
            $_SESSION["login_moh"] = 1;
            header('Location: MOH.php');
            $flag = 0;
            exit;
        }
        if ($flag == 1) {

            header('Location: MOHLogin.html');


        }

        $db->close();

    }


}

?>

