<?php
session_start();

unset ($_SESSION["login_moh"]);
header('Location: MOHLogin.html');
?>
