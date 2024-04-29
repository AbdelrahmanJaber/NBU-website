<?php
session_start();
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Show</title>
</head>
<body>


<?php

echo "The Text is: " . $_SESSION["study_text"];
//print_r($_SESSION);

?>


</body>
</html>