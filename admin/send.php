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

	$sql1 = "SELECT language FROM general";
	$result1 = mysqli_query($dbconnect, $sql1);
	$row1 = mysqli_fetch_row($result1);
	$language =  strtolower($row1[0]);
	require("../languages/$language.php");
				
$domain = $_SERVER['SERVER_NAME'];

if (isset($_SERVER['HTTPS'])) {
	$fullurl = dirname($_SERVER['PHP_SELF']);
	$dir = str_replace("/admin", "",$fullurl);
	$website = "https://$domain$dir";

} else {
	$fullurl = dirname($_SERVER['PHP_SELF']);
	$dir = str_replace("/admin", "",$fullurl);
	$website = "http://$domain$dir";
}


$name = "$administrator";
$emailsubject = $_POST['emailsubject'];
$emailmessage = $_POST['emailmessage'];
$finalmessage = "$emailmessage\n\n$sentfrom $website";


	if ($emailsubject != "") {

$sql0 = "SELECT email FROM members WHERE username = 'Administrator'";
				$result0 = mysqli_query($dbconnect, $sql0);
				$row0 = mysqli_fetch_row($result0);
				$myemail = $row0[0];



$sql2 = "SELECT * FROM members WHERE username != 'Administrator'";
	$result2 = mysqli_query($dbconnect, $sql2);
		while ($list2 = mysqli_fetch_array($result2)) {
			$email = $list2['email'];

mail("$email", "$emailsubject", "$finalmessage", "From: $name <$myemail>");
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