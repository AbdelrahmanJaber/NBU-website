<?php

session_start();
unset ($_SESSION["login_irb"]);
header('Location: IRBLogin.html');

?>