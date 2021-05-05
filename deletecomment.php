<?php

session_start();
include ('config.php');

$submit = $_POST['submit'];
$pin = $_POST['pin'];
$cid = $_POST['cid'];
$album = $_POST['album'];
$ain = $_POST['ain'];
$selfdelete = $_POST['selfdelete'];


if (isset($submit) && isset($selfdelete)) {

	$sql = "DELETE FROM comments WHERE cid = '$cid'";
	$result=mysqli_query($dbconnect,$sql);

	header('Location: index.php?menu=account&mod=deleted');

	} elseif (isset($submit) && !isset($selfdelete)) {

	$sql1 = "DELETE FROM comments WHERE cid = '$cid'";
	$result1=mysqli_query($dbconnect,$sql1);

	header('Location: index.php?album='.$album.'&ain='.$ain.'&pin='.$pin.'&mod=deleted#post');
}

if ($submit == "" && $selfdelete == "" && $album == "" && $ain == "" && $pin == "") {
	header('Location: index.php');
}

?>