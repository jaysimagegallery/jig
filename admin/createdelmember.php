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

	$username = $_POST['username'];
	$password = $_POST['password'];
	$password2 = $_POST['password2'];
	$first = $_POST['first'];
	$last = $_POST['last'];
	$email = $_POST['email'];
	$create = $_POST['create'];
	$delete = $_POST['delete'];
	$cookieid = "";
	$photo = "";

if (isset($create)) {

	$result = mysqli_query($dbconnect, "SELECT * FROM members WHERE username = '$username'");
	$counting = mysqli_num_rows($result);

	$result2 = mysqli_query($dbconnect, "SELECT * FROM members WHERE email = '$email'");
	$counting2 = mysqli_num_rows($result2);


if ($counting != 0){
	
	 header('Location: index.php?menu=members&update=usernametaken');

 } elseif ($counting2 != 0) { 

 	header('Location: index.php?menu=members&update=emailtaken');


 } else {

	if ($password === $password2) {

		$hash = password_hash($password, PASSWORD_DEFAULT);


		$stmt = $dbconnect->prepare("INSERT INTO members (username, password, first, last, email, photoname, photo ,mimetype, cookieid) VALUES ('$username', '$hash', '$first', '$last', '$email', '', '', '', '')");
		$stmt->bind_param("s,s,s,s,s", $username, $password, $first, $last, $email, $photo);
		$stmt->execute();

    	header('Location: index.php?menu=members&created=success');

	} else {

		header('Location: index.php?menu=members&created=mismatch');

	}
	}
}

if (isset($delete)) {

	$sql2 = "DELETE FROM members WHERE username = '$username'";
    $del2 = mysqli_query($dbconnect, $sql2);  

    $sql3 = "DELETE FROM comments WHERE username = '$username'";
    $del3 = mysqli_query($dbconnect, $sql3);

		header('Location: index.php?menu=members&deleted=success');

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