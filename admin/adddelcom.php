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

	$submit = $_POST['submit'];
	$cid = $_POST['cid'];
	$delete = $_POST['delete'];
	$approve = $_POST['approve'];

if (isset($approve)) {

	$sql = "UPDATE comments SET live='yes' WHERE cid ='$cid'";
	$result=mysqli_query($dbconnect,$sql);

	header('Location: index.php?menu=comments&mod=approved');

}

if (isset($delete)) {

	$sql2 = "DELETE FROM comments WHERE cid = '$cid'";
	$result2=mysqli_query($dbconnect,$sql2);

	header('Location: index.php?menu=comments&mod=deleted');

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
