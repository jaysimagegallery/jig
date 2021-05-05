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

$filename = $_FILES["uploadtheme"]["name"][0]; 
$tempname = $_FILES["uploadtheme"]["tmp_name"][0]; 
$mimetype = mime_content_type($tempname);

if ($mimetype != "text/plain") {

 	header('Location: index.php?menu=theme&update=unsupported');

 }


$theme = eval(file_get_contents($_FILES["uploadtheme"]["tmp_name"][0]));
$result = mysqli_query($dbconnect, "SELECT * FROM theme WHERE name LIKE '$name'");
$counting = mysqli_num_rows($result);

if (empty($name) || empty($fontcolor) || empty($obc) || empty($ibc) || empty($seltab) || empty($stfc) || empty($unseltab) || empty($ustfc) || empty($buttons) || empty($btc) || empty($iab) || empty($abc) || empty($afc) || empty($breadfont) || empty($breadcrumb) || empty($divider) || empty($tbb) || empty($tbbg) || empty($borders) || empty($failedlogintextcolor) || empty($npdt) || empty($npbg) || empty($dlc) || empty($vlc) || empty($sfbg) || empty($sfb)) {

	 	header('Location: index.php?menu=theme&update=unsupported');


}elseif ($counting != 0){
 
	header('Location: index.php?menu=theme&update=taken');

  } else {


$sql1 = "INSERT INTO theme (name, item, defaults, current, inuse) VALUES ('$name', 'FontFamily', '$fontfamily', '$fontfamily', 'no')";
mysqli_query($dbconnect, $sql1);


$sql2 = "INSERT INTO theme (name, item, defaults, current, inuse) VALUES ('$name', 'FontColor', '$fontcolor', '$fontcolor', 'no')";
mysqli_query($dbconnect, $sql2);


$sql3 = "INSERT INTO theme (name, item, defaults, current, inuse) VALUES ('$name', 'OuterBackgroundColor', '$obc', '$obc', 'no')";
mysqli_query($dbconnect, $sql3);


$sql4 = "INSERT INTO theme (name, item, defaults, current, inuse) VALUES ('$name', 'InnerBackgroundColor', '$ibc', '$ibc', 'no')";
mysqli_query($dbconnect, $sql4);


$sql5 = "INSERT INTO theme (name, item, defaults, current, inuse) VALUES ('$name', 'SelectedTab', '$seltab', '$seltab', 'no')";
mysqli_query($dbconnect, $sql5);


$sql5a = "INSERT INTO theme (name, item, defaults, current, inuse) VALUES ('$name', 'SelectedTabFontColor', '$stfc', '$stfc', 'no')";
mysqli_query($dbconnect, $sql5a);


$sql6 = "INSERT INTO theme (name, item, defaults, current, inuse) VALUES ('$name', 'UnselectedTab', '$unseltab', '$unseltab', 'no')";
mysqli_query($dbconnect, $sql6);


$sql6a = "INSERT INTO theme (name, item, defaults, current, inuse) VALUES ('$name', 'UnselectedTabFontColor', '$ustfc', '$ustfc', 'no')";
mysqli_query($dbconnect, $sql6a);


$sql7 = "INSERT INTO theme (name, item, defaults, current, inuse) VALUES ('$name', 'Buttons', '$buttons', '$buttons', 'no')";
mysqli_query($dbconnect, $sql7);


$sql8 = "INSERT INTO theme (name, item, defaults, current, inuse) VALUES ('$name', 'ButtonTextColor', '$btc', '$btc', 'no')";
mysqli_query($dbconnect, $sql8);


$sql9 = "INSERT INTO theme (name, item, defaults, current, inuse) VALUES ('$name', 'InnerAlbumBorder', '$iab', '$iab', 'no')";
mysqli_query($dbconnect, $sql9);


$sql10 = "INSERT INTO theme (name, item, defaults, current, inuse) VALUES ('$name', 'AlbumBackgroundColor', '$abc', '$abc', 'no')";
mysqli_query($dbconnect, $sql10);


$sql11 = "INSERT INTO theme (name, item, defaults, current, inuse) VALUES ('$name', 'AlbumFontColor', '$afc', '$afc', 'no')";
mysqli_query($dbconnect, $sql11);


$sql12 = "INSERT INTO theme (name, item, defaults, current, inuse) VALUES ('$name', 'BreadcrumbFontColor', '$breadfont', '$breadfont', 'no')";
mysqli_query($dbconnect, $sql12);


$sql13 = "INSERT INTO theme (name, item, defaults, current, inuse) VALUES ('$name', 'Breadcrumb', '$breadcrumb', '$breadcrumb', 'no')";
mysqli_query($dbconnect, $sql13);


$sql14 = "INSERT INTO theme (name, item, defaults, current, inuse) VALUES ('$name', 'Divider', '$divider', '$divider', 'no')";
mysqli_query($dbconnect, $sql14);


$sql15 = "INSERT INTO theme (name, item, defaults, current, inuse) VALUES ('$name', 'TextboxBorder', '$tbb', '$tbb', 'no')";
mysqli_query($dbconnect, $sql15);


$sql16 = "INSERT INTO theme (name, item, defaults, current, inuse) VALUES ('$name', 'TextboxBackground', '$tbbg', '$tbbg', 'no')";
mysqli_query($dbconnect, $sql16);


$sql17 = "INSERT INTO theme (name, item, defaults, current, inuse) VALUES ('$name', 'Borders', '$borders', '$borders', 'no')";
mysqli_query($dbconnect, $sql17);


$sql18 = "INSERT INTO theme (name, item, defaults, current, inuse) VALUES ('$name', 'FailedLoginTextColor', '$failedlogintextcolor', '$failedlogintextcolor', 'no')";
mysqli_query($dbconnect, $sql18);


$sql19 = "INSERT INTO theme (name, item, defaults, current, inuse) VALUES ('$name', 'NextPrevDisabledText', '$npdt', '$npdt', 'no')";
mysqli_query($dbconnect, $sql19);


$sql20 = "INSERT INTO theme (name, item, defaults, current, inuse) VALUES ('$name', 'NextPrevBackground', '$npbg', '$npbg', 'no')";
mysqli_query($dbconnect, $sql20);


$sql21 = "INSERT INTO theme (name, item, defaults, current, inuse) VALUES ('$name', 'DefaultLinkColor', '$dlc', '$dlc', 'no')";
mysqli_query($dbconnect, $sql21);


$sql22 = "INSERT INTO theme (name, item, defaults, current, inuse) VALUES ('$name', 'VisitedLinkColor', '$vlc', '$vlc', 'no')";
mysqli_query($dbconnect, $sql22);


$sql23 = "INSERT INTO theme (name, item, defaults, current, inuse) VALUES ('$name', 'SuccessFailureBackground', '$sfbg', '$sfbg', 'no')";
mysqli_query($dbconnect, $sql23);


$sql24 = "INSERT INTO theme (name, item, defaults, current, inuse) VALUES ('$name', 'SuccessFailureBorder', '$sfb', '$sfb', 'no')";
mysqli_query($dbconnect, $sql24);


header('Location: index.php?menu=theme&upload=successfully');

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