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

	$title = htmlspecialchars(strip_tags($_POST['title']), ENT_QUOTES);
	$tiupdate = $_POST['tiupdate'];
	$subtitle = htmlspecialchars(strip_tags($_POST['subtitle']), ENT_QUOTES);
	$subupdate = $_POST['subupdate'];
	$language = $_POST['language'];
	$numpage = $_POST['numpage'];
	$picpage = $_POST['picpage'];
	$comments = $_POST['comments'];
	$order = $_POST['order'];
	$recaptcha = $_POST['recaptcha'];
	$sitekey = $_POST['sitekey'];
	$secretkey = $_POST['secretkey'];
	$watermark = $_POST['watermark'];
	$imagewatermark = $_FILES['imagewatermark'];
	$textwatermark = htmlspecialchars(strip_tags($_POST['textwatermark']), ENT_QUOTES);
	$secupdate = $_POST['secupdate'];
	$siupdate = $_POST['siupdate'];
	$wmupdate = $_POST['wmupdate'];
	$upload = $_POST['upload'];
	$wmtextcolor = $_POST['wmtextcolor'];
	$wmposition = $_POST['wmposition'];
	$hideinfo = $_POST['hideinfo'];
	$wmclear = $_POST['wmclear'];
	$apdorder = $_POST['apdorder'];
	$branding = $_POST['branding'];
	$contactform = $_POST['contactform'];
	$notifyanon = $_POST['notifyanon'];

if ($tiupdate == "add") {
$stmt = $dbconnect->prepare("UPDATE general SET title = ?");
		$stmt->bind_param("s", $title);
		$stmt->execute();
header('Location: index.php?menu=general&update=successfully');
}

if ($tiupdate == "clear") {
$sql1a = "UPDATE general SET title=''";
mysqli_query($dbconnect, $sql1a);	
header('Location: index.php?menu=general&update=successfully');
}

if ($subupdate == "add") {
$stmt2 = $dbconnect->prepare("UPDATE general SET subtitle = ?");
		$stmt2->bind_param("s", $subtitle);
		$stmt2->execute();
header('Location: index.php?menu=general&update=successfully');
}

if ($subupdate == "clear") {
$sql2a = "UPDATE general SET subtitle=''";
mysqli_query($dbconnect, $sql2a);	
header('Location: index.php?menu=general&update=successfully');
}

if (isset($language)) {
$sql3 = "UPDATE general SET language='$language'";
mysqli_query($dbconnect, $sql3);
header('Location: index.php?menu=general&update=successfully');
}

if (isset($numpage)) {
$stmt4 = $dbconnect->prepare("UPDATE general SET numpage = ?");
		$stmt4->bind_param("i", $numpage);
		$stmt4->execute();
header('Location: index.php?menu=general&update=successfully');
}

if (isset($picpage)) {
$stmt5 = $dbconnect->prepare("UPDATE general SET picpage = ?");
		$stmt5->bind_param("i", $picpage);
		$stmt5->execute();
header('Location: index.php?menu=general&update=successfully');
}

if (isset($hideinfo)) {
$sql6 = "UPDATE general SET hideinfo='$hideinfo'";
mysqli_query($dbconnect, $sql6);
header('Location: index.php?menu=general&update=successfully');
}

if (isset($comments)) {
$sql7 = "UPDATE general SET comments='$comments'";
mysqli_query($dbconnect, $sql7);
header('Location: index.php?menu=general&update=successfully');
}

if (isset($order)) {
$sql8 = "UPDATE general SET commentorder='$order'";
mysqli_query($dbconnect, $sql8);
header('Location: index.php?menu=general&update=successfully');
}

if (isset($recaptcha)) {
$sql9 = "UPDATE general SET recaptcha='$recaptcha'";
mysqli_query($dbconnect, $sql9);
header('Location: index.php?menu=general&update=successfully');
}

if (isset($watermark)) {
$sql10 = "UPDATE general SET watermark='$watermark'";
mysqli_query($dbconnect, $sql10);
header('Location: index.php?menu=general&update=successfully');
}

if ($wmupdate == "add") {
$stmt11 = $dbconnect->prepare("UPDATE general SET textwatermark = ?");
		$stmt11->bind_param("s", $textwatermark);
		$stmt11->execute();
header('Location: index.php?menu=general&update=successfully');
}

if ($wmupdate == "clear") {
$sql11a = "UPDATE general SET textwatermark=''";
mysqli_query($dbconnect, $sql11a);	
header('Location: index.php?menu=general&update=successfully');
}

if (isset($wmtextcolor)) {
$sql12 = "UPDATE general SET wmtextcolor='$wmtextcolor'";
mysqli_query($dbconnect, $sql12);
header('Location: index.php?menu=general&update=successfully');
}

if (isset($wmposition)) {
$sql13 = "UPDATE general SET wmposition='$wmposition'";
mysqli_query($dbconnect, $sql13);
header('Location: index.php?menu=general&update=successfully');
}

if ($siupdate == "add") {
$stmt14 = $dbconnect->prepare("UPDATE general SET sitekey = ?");
		$stmt14->bind_param("s", $sitekey);
		$stmt14->execute();
header('Location: index.php?menu=general&update=successfully');
}

if ($siupdate == "clear") {
$sql14a = "UPDATE general SET sitekey=''";
mysqli_query($dbconnect, $sql14a);	
header('Location: index.php?menu=general&update=successfully');
}

if ($secupdate == "add") {
$stmt15 = $dbconnect->prepare("UPDATE general SET secretkey = ?");
		$stmt15->bind_param("s", $secretkey);
		$stmt15->execute();
header('Location: index.php?menu=general&update=successfully');
}

if ($secupdate == "clear") {
$sql15a = "UPDATE general SET secretkey=''";
mysqli_query($dbconnect, $sql15a);	
header('Location: index.php?menu=general&update=successfully');
}

if (isset($apdorder)) {
$sql17 = "UPDATE general SET apdorder='$apdorder'";
mysqli_query($dbconnect, $sql17);
header('Location: index.php?menu=general&update=successfully');
}

if (isset($upload)) {

	$name = $_FILES["imagewatermark"]['name'][0];
	$tempname = $_FILES["imagewatermark"]["tmp_name"][0];

if (exif_imagetype($tempname) == IMAGETYPE_GIF || exif_imagetype($tempname) == IMAGETYPE_JPEG || exif_imagetype($tempname) == IMAGETYPE_PNG || exif_imagetype($tempname) == IMAGETYPE_BMP) {

	move_uploaded_file($tempname, "../images/watermark/$name");


	$stmt15 = $dbconnect->prepare("UPDATE general SET imagewatermark = ?");
		$stmt15->bind_param("s", $name);
		$stmt15->execute();

		header('Location: index.php?menu=general&update=successfully');
	
	} else {

		header('Location: index.php?menu=general&update=uft');
	
	}
}

if (isset($wmclear)) {
$sql16a = "UPDATE general SET imagewatermark=''";
mysqli_query($dbconnect, $sql16a);	
exec('rm -rf "../images/watermark/"'.$wmclear.'');

header('Location: index.php?menu=general&update=successfully');
}

if (isset($branding)) {
$sql18 = "UPDATE general SET branding='$branding'";
mysqli_query($dbconnect, $sql18);
header('Location: index.php?menu=general&update=successfully');
}

if (isset($contactform)) {
$sql19 = "UPDATE general SET contactform = '$contactform'";
mysqli_query($dbconnect, $sql19);
header('Location: index.php?menu=general&update=successfully');
}

if (isset($notifyanon)) {
$sql20 = "UPDATE general SET notifyanon = '$notifyanon'";
mysqli_query($dbconnect, $sql20);
header('Location: index.php?menu=general&update=successfully');
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
