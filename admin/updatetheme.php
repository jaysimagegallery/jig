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


	$reset = $_POST['reset'];

	$fontfamily	 = $_POST['FontFamily'];
	$fontcolor = strtoupper($_POST['FontColor']);
	$obc = strtoupper($_POST['OuterBackgroundColor']);
	$ibc = strtoupper($_POST['InnerBackgroundColor']);
	$seltab = strtoupper($_POST['SelectedTab']);
	$stfc = strtoupper($_POST['SelectedTabFontColor']);
	$unseltab = strtoupper($_POST['UnselectedTab']);
	$ustfc = strtoupper($_POST['UnselectedTabFontColor']);
	$buttons = strtoupper($_POST['Buttons']);
	$btc = strtoupper($_POST['ButtonTextColor']);
	$iab = strtoupper($_POST['InnerAlbumBorder']);
	$abc = strtoupper($_POST['AlbumBackgroundColor']);
	$afc = strtoupper($_POST['AlbumFontColor']);
	$breadfont = strtoupper($_POST['BreadcrumbFontColor']);
	$breadcrumb = strtoupper($_POST['Breadcrumb']);
	$divider = strtoupper($_POST['Divider']);
	$tbb = strtoupper($_POST['TextboxBorder']);
	$tbbg = strtoupper($_POST['TextboxBackground']);
	$borders = strtoupper($_POST['Borders']);
	$failedlogintextcolor = strtoupper($_POST['FailedLoginTextColor']);
	$npdt = strtoupper($_POST['NextPrevDisabledText']);
	$npbg = strtoupper($_POST['NextPrevBackground']);
	$dlc = strtoupper($_POST['DefaultLinkColor']);
	$vlc = strtoupper($_POST['VisitedLinkColor']);
	$sfbg = strtoupper($_POST['SuccessFailureBackground']);
	$sfb = strtoupper($_POST['SuccessFailureBorder']);


if (isset($fontfamily)) {
$sql1 = "UPDATE theme SET current='$fontfamily' WHERE item='FontFamily' and inuse ='yes'";
mysqli_query($dbconnect, $sql1);
}

if ($fontcolor != "") {
$sql2 = "UPDATE theme SET current='$fontcolor' WHERE item='FontColor' and inuse ='yes'";
mysqli_query($dbconnect, $sql2);
}

if ($obc != "") {
$sql3 = "UPDATE theme SET current='$obc' WHERE item='OuterBackgroundColor' and inuse ='yes'";
mysqli_query($dbconnect, $sql3);
}

if ($ibc != "") {
$sql4 = "UPDATE theme SET current='$ibc' WHERE item='InnerBackgroundColor' and inuse ='yes'";
mysqli_query($dbconnect, $sql4);
}

if ($seltab != "") {
$sql5 = "UPDATE theme SET current='$seltab' WHERE item='SelectedTab' and inuse ='yes'";
mysqli_query($dbconnect, $sql5);
}

if ($stfc != "") {
$sql5a = "UPDATE theme SET current='$stfc' WHERE item='SelectedTabFontColor' and inuse ='yes'";
mysqli_query($dbconnect, $sql5a);
}

if ($unseltab != "") {
$sql6 = "UPDATE theme SET current='$unseltab' WHERE item='UnselectedTab' and inuse ='yes'";
mysqli_query($dbconnect, $sql6);
}

if ($ustfc != "") {
$sql6a = "UPDATE theme SET current='$ustfc' WHERE item='UnselectedTabFontColor' and inuse ='yes'";
mysqli_query($dbconnect, $sql6a);
}

if ($buttons != "") {
$sql7 = "UPDATE theme SET current='$buttons' WHERE item='Buttons' and inuse ='yes'";
mysqli_query($dbconnect, $sql7);
}

if ($btc != "") {
$sql8 = "UPDATE theme SET current='$btc' WHERE item='ButtonTextColor' and inuse ='yes'";
mysqli_query($dbconnect, $sql8);
}

if ($iab != "") {
$sql9 = "UPDATE theme SET current='$iab' WHERE item='InnerAlbumBorder' and inuse ='yes'";
mysqli_query($dbconnect, $sql9);
}

if ($abc != "") {
$sql10 = "UPDATE theme SET current='$abc' WHERE item='AlbumBackgroundColor' and inuse ='yes'";
mysqli_query($dbconnect, $sql10);
}

if ($afc != "") {
$sql11 = "UPDATE theme SET current='$afc' WHERE item='AlbumFontColor' and inuse ='yes'";
mysqli_query($dbconnect, $sql11);
}

if ($breadfont != "") {
$sql12 = "UPDATE theme SET current='$breadfont' WHERE item='BreadcrumbFontColor' and inuse ='yes'";
mysqli_query($dbconnect, $sql12);
}

if ($breadcrumb != "") {
$sql13 = "UPDATE theme SET current='$breadcrumb' WHERE item='Breadcrumb' and inuse ='yes'";
mysqli_query($dbconnect, $sql13);
}

if ($divider != "") {
$sql14 = "UPDATE theme SET current='$divider' WHERE item='Divider' and inuse ='yes'";
mysqli_query($dbconnect, $sql14);
}

if ($tbb != "") {
$sql15 = "UPDATE theme SET current='$tbb' WHERE item='TextboxBorder' and inuse ='yes'";
mysqli_query($dbconnect, $sql15);
}

if ($tbbg != "") {
$sql16 = "UPDATE theme SET current='$tbbg' WHERE item='TextboxBackground' and inuse ='yes'";
mysqli_query($dbconnect, $sql16);
}

if ($borders != "") {
$sql17 = "UPDATE theme SET current='$borders' WHERE item='Borders' and inuse ='yes'";
mysqli_query($dbconnect, $sql17);
}

if ($failedlogintextcolor != "") {
$sql18 = "UPDATE theme SET current='$failedlogintextcolor' WHERE item='FailedLoginTextColor' and inuse ='yes'";
mysqli_query($dbconnect, $sql18);
}

if ($npdt != "") {
$sql19 = "UPDATE theme SET current='$npdt' WHERE item='NextPrevDisabledText' and inuse ='yes'";
mysqli_query($dbconnect, $sql19);
}

if ($npbg != "") {
$sql20 = "UPDATE theme SET current='$npbg' WHERE item='NextPrevBackground' and inuse ='yes'";
mysqli_query($dbconnect, $sql20);
}

if ($dlc != "") {
$sql21 = "UPDATE theme SET current='$dlc' WHERE item='DefaultLinkColor' and inuse ='yes'";
mysqli_query($dbconnect, $sql21);
}

if ($vlc != "") {
$sql22 = "UPDATE theme SET current='$vlc' WHERE item='VisitedLinkColor' and inuse ='yes'";
mysqli_query($dbconnect, $sql22);
}

if ($sfbg != "") {
$sql23 = "UPDATE theme SET current='$sfbg' WHERE item='SuccessFailureBackground' and inuse ='yes'";
mysqli_query($dbconnect, $sql23);
}

if ($sfb != "") {
$sql24 = "UPDATE theme SET current='$sfb' WHERE item='SuccessFailureBorder' and inuse ='yes'";
mysqli_query($dbconnect, $sql24);
}

header('Location: index.php?menu=theme&updated=successfully');


if ($reset == " ") {

	$sql0 = "UPDATE theme SET current = defaults WHERE inuse = 'yes'";
	$result0 = mysqli_query($dbconnect, $sql0);

	header('Location: index.php?menu=theme&change=successfully');
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