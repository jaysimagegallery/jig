<?php

session_start();
include ('../config.php');

$sql1 = "SELECT username FROM members LIMIT 1";
    $result1 = mysqli_query($dbconnect, $sql1);
    $row1 = mysqli_fetch_row($result1);
    $adminusername =  $row1[0];

$stmt1 = $dbconnect -> prepare("SELECT password FROM members WHERE username = ?");
$stmt1 -> bind_param('s', $adminusername);
$stmt1 -> execute();
$stmt1 -> store_result();
$stmt1 -> bind_result($adminpassword);
$stmt1 -> fetch();

if  ($_SESSION['ausername'] == $adminusername && $_SESSION['apassword'] == $adminpassword) {

$description = nl2br(strip_tags(htmlspecialchars($_POST['description'], ENT_QUOTES)));
$pin = $_POST['pin'];
$album = $_POST['album'];
$ain = $_POST['ain'];


	$sql1 = "UPDATE photos SET description = '$description' WHERE pin = '$pin'";
	mysqli_query($dbconnect, $sql1);

    header('Location: index.php?menu=photo&album='.$album.'&ain='.$ain.'&pin='.$pin.'&change=successfully');

} else {
    
    include ('../config.php');
    $sql = "SELECT language FROM general";
    $result = mysqli_query($dbconnect, $sql);
    $row = mysqli_fetch_row($result);
    $language =  strtolower($row[0]);
    require("../languages/$language.php");

        echo $accd;

    
}
?>
