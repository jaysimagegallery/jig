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

	$album = $_POST['album'];
	$pain = $_POST['pain'];

	$result = mysqli_query($dbconnect, "SELECT * FROM albums WHERE pain = '$pain' and albumdir LIKE '%$album'");
	$counting = mysqli_num_rows($result);

// If album name exists don't create album 

	if ($counting != 0){

		header('Location: index.php?menu=subalbum&ain='.$pain.'&update=taken'); 

 	} else {



	$sql1 = "SELECT album,albumdir FROM albums WHERE ain = '$pain' ";
	$result1 = mysqli_query($dbconnect, $sql1);
	$list1 = mysqli_fetch_array($result1);
		$parentalbum = $list1[0];
		$albumdir = $list1[1]; 

	// Count albums then add 1 to determine display order

	$result2 = mysqli_query($dbconnect, "SELECT MAX(displayorder) FROM albums WHERE pain = '$pain' LIMIT 1");
	$row2 = mysqli_fetch_row($result2);
	$number =  $row2[0];

	$displayorder = $number + 1;	
	$status = "public";
	$albumdir2 = "$albumdir/$album";

	$stmt = $dbconnect->prepare("INSERT INTO albums (album, pain, parentalbum, albumdir, displayorder, status) VALUES (?, ?, ?, ?,?,?)");
		$stmt->bind_param("sissis", $album, $pain, $parentalbum, $albumdir2, $displayorder, $status);
		$stmt->execute();


	$directory = "$albumdir/$album";
    
    exec ("chmod ugo+x ../images/originals");
	mkdir('../images/originals/'.$directory, 0777, true);
	$createindex = fopen("../images/originals/$directory/index.html", "w");
    exec ("chmod ugo-x ../images/originals");

	mkdir('../images/gallery/'.$directory, 0777, true);
	$createindex1 = fopen("../images/gallery/$directory/index.html", "w");

	mkdir('../images/thumbnails/'.$directory, 0777, true);
	$createindex2 = fopen("../images/thumbnails/$directory/index.html", "w");

	header('Location: index.php?menu=subalbum&ain='.$pain.'&page=1&update=successfully');
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
