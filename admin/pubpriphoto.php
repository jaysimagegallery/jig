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

	$ain = $_POST['ain'];
	$name = $_POST['name'];
	$page = $_POST['page'];
	$pubpri = $_POST['pubpri'];
	$pain = $_POST['pain'];


if ($page == "") {
	
	$page = 1; 

}

if ($pubpri == "makeprivate") {

	$sql = "UPDATE photos SET status = 'private' WHERE ain = '$ain' AND name = '$name'";
	mysqli_query($dbconnect, $sql);

	if ($pain == "") {

	header('Location: index.php?menu=gallery&page='.$page.'&update=photoprivate');

	} else {

	header('Location: index.php?menu=subalbum&ain='.$ain.'&page='.$page.'&update=photoprivate');
	
	}
}


if ($pubpri == "makepublic") {

	$sql1 = "UPDATE photos SET status = 'public' WHERE ain = '$ain' AND name = '$name'";
	mysqli_query($dbconnect, $sql1);

	if ($pain == "") {

	header('Location: index.php?menu=gallery&page='.$page.'&update=photopublic');

	} else {

	header('Location: index.php?menu=subalbum&ain='.$ain.'&page='.$page.'&update=photopublic');
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