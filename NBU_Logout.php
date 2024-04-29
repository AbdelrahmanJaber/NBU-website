<?php
session_start();
unset ($_SESSION["login_nbu"]);
header('Location: NBULogin.html');
?>