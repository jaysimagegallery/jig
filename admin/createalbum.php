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

	$album = $_POST['album']; 
	$pain = 1;

	// If album name exists don't create album 
	$result1 = mysqli_query($dbconnect, "SELECT * FROM albums WHERE albumdir LIKE '/$album'");
	$counting = mysqli_num_rows($result1);

	if($counting != 0){
 		
 		header('Location: index.php?menu=gallery&update=taken');

 } else {

	// Count albums then add 1 to figure out display order
	$result2 = mysqli_query($dbconnect, "SELECT MAX(displayorder) FROM albums WHERE pain = '$pain' and album != 'None' LIMIT 1");
	$row2 = mysqli_fetch_row($result2);
	$number =  $row2[0];


	$displayorder = $number + 1;	


	$stmt = $dbconnect->prepare("INSERT INTO albums (album, pain, parentalbum, albumdir, displayorder, status) VALUES ('$album', '$pain', 'root', '/$album', '$displayorder', 'public')");
		$stmt->bind_param("sissis", $album, $pain, $parentalbum, $albumdir, $displayorder, $status);
		$stmt->execute();

    exec ("chmod ugo+x ../images/originals");
	mkdir('../images/originals/'.$album, 0777, true);
	$createindex = fopen("../images/originals/$album/index.html", "w");
	exec ("chmod ugo-x ../images/originals");

	mkdir('../images/gallery/'.$album, 0777, true);
	$createindex1 = fopen("../images/gallery/$album/index.html", "w");

	mkdir('../images/thumbnails/'.$album, 0777, true);
	$createindex2 = fopen("../images/thumbnails/$album/index.html", "w");

	header('Location: index.php?menu=gallery&update=successfully');

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



