<?php

//Do not use $ or ' or " or \ 

$dbserver = "localhost";
$dbusername = "";
$dbpassword = "";
$dbname = "jig";

$dbconnect = mysqli_connect($dbserver, $dbusername, $dbpassword, $dbname);

if (mysqli_connect_errno()) {
    printf("Connection failed: %s\n", mysqli_connect_error());
    exit();
}
?>
