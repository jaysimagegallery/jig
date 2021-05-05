<?php

session_start();
include ('../config.php');

$sql1 = "SELECT username FROM members LIMIT 1";
	$result1 = mysqli_query($dbconnect, $sql1);
	$row1 = mysqli_fetch_row($result1);
	$adminusername =  $row1[0];

$stmt1 = $dbconnect -> prepare("SELECT password FROM members WHERE username = '$adminusername'");
$stmt1 -> bind_param('s', $adminusername);
$stmt1 -> execute();
$stmt1 -> store_result();
$stmt1 -> bind_result($adminpassword);
$stmt1 -> fetch();

if  ($_SESSION['ausername'] == $adminusername && $_SESSION['apassword'] == $adminpassword) {

	$updown = $_POST['updown'];
	$album = $_POST['album'];
	$ain = $_POST['ain'];
	$page = $_POST['page'];

if ($updown == "down") {

	$sql = "SELECT displayorder FROM albums WHERE ain = '$ain'";
	$result = mysqli_query($dbconnect, $sql);
	$row = mysqli_fetch_row($result);
	$origdo =  $row[0];

	$sql2 = "SELECT pain FROM albums WHERE ain = '$ain'";
	$result2 = mysqli_query($dbconnect, $sql2);
	$row2 = mysqli_fetch_row($result2);
	$pain =  $row2[0];

	$sql3 = "SELECT displayorder FROM albums WHERE displayorder < '$origdo' ORDER BY displayorder DESC LIMIT 1";
	$result3 = mysqli_query($dbconnect, $sql3);
	$row3 = mysqli_fetch_row($result3);
	$newdo =  $row3[0];


	$sql4 = "UPDATE albums SET displayorder='$origdo' WHERE displayorder='$newdo' AND pain='$pain'";
	$result4 = mysqli_query($dbconnect, $sql4);

	$sql5 = "UPDATE albums SET displayorder='$newdo' WHERE ain = '$ain'";
	$result5 = mysqli_query($dbconnect, $sql5);

if ($pain > 1){

        header('Location: index.php?menu=subalbum&album='.$album.'&ain='.$pain.'&page='.$page.'');

	} else {

	    header('Location: index.php?menu=gallery&page='.$page.'');

	}

}


if ($updown == "up") {


	$sql6 = "SELECT displayorder FROM albums WHERE ain = '$ain'";
	$result6 = mysqli_query($dbconnect, $sql6);
	$row6 = mysqli_fetch_row($result6);
	$origdo =  $row6[0];

	$sql7 = "SELECT pain FROM albums WHERE ain = '$ain'";
	$result7 = mysqli_query($dbconnect, $sql7);
	$row7 = mysqli_fetch_row($result7);
	$pain =  $row7[0];

	$sql8 = "SELECT displayorder FROM albums WHERE displayorder > '$origdo' ORDER BY displayorder ASC LIMIT 1";
	$result8 = mysqli_query($dbconnect, $sql8);
	$row8 = mysqli_fetch_row($result8);
	$newdo =  $row8[0];


	$sql9 = "UPDATE albums SET displayorder='$origdo' WHERE displayorder='$newdo' AND pain='$pain'";
	$result9 = mysqli_query($dbconnect, $sql9);

	$sql10 = "UPDATE albums SET displayorder='$newdo' WHERE ain = '$ain'";
	$result10 = mysqli_query($dbconnect, $sql10);

if ($pain > 1){
    
        header('Location: index.php?menu=subalbum&album='.$album.'&ain='.$pain.'&page='.$page.'');
	
	} else {
	
	    header('Location: index.php?menu=gallery&page='.$page.'');

	}

}


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