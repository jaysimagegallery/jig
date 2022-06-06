<?php

session_start();
include ('config.php');

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

$musername = $_SESSION['musername'];


if  ($musername != "" || $_SESSION['apassword'] == $adminpassword) {

	$updatepassword = $_POST['updatepassword'];
	$updatepassword2 = $_POST['updatepassword2'];
	$email = $_POST['email'];
	$submit = $_POST['create'];
	$photos = $_FILES['photos'];
	$profilephoto = $_POST['profilephoto'];
	$delete = $_POST['delete'];
	$pusername = $_POST['pusername'];
	$username = $_POST['username'];


	$result = mysqli_query($dbconnect, "SELECT * FROM members WHERE email = '$email'");
	$counting = mysqli_num_rows($result);

	if (isset($email) && $email != "" && $counting != 0) { 

			header('Location: index.php?menu=account&update=emailtaken');

	} elseif (isset($email) && $email != "" && $counting == "0") {


		$stmt = $dbconnect->prepare("UPDATE members SET email =  ? WHERE username = '$username'");
		$stmt->bind_param("s", $email);
		$stmt->execute();

	 	header('Location: index.php?menu=account&update=emailsuccess');

	} elseif ($email == "" && $counting == "0") {
			header('Location: index.php?menu=account&update=emailblank');
	}

	if ($pusername != "") {

if ($updatepassword == "" || $updatepassword2 == "" ) {

		header('Location: index.php?menu=account&update=passwordblank');

	} elseif ($updatepassword === $updatepassword2) {

		$hash = password_hash($updatepassword, PASSWORD_DEFAULT);

		$stmt = $dbconnect->prepare("UPDATE members SET password = ? WHERE username = '$username'");
		$stmt->bind_param("s", $hash);
		$stmt->execute();

    	header('Location: index.php?menu=account&update=passwordsuccess');

	} else {

		header('Location: index.php?menu=account&update=mismatch');

	}
}

if (isset($profilephoto)) {

			$totalfilesuploaded = count($_FILES['photos']['name']);

			$names = array();

			foreach ($_FILES["photos"]["error"] as $key => $mistake) {
    		if ($mistake == UPLOAD_ERR_OK) {

		 	$tempname = $_FILES["photos"]["tmp_name"][0];
		 	$name = addslashes(file_get_contents($_FILES["photos"]["tmp_name"][0]));
		 	$photoname = basename($_FILES["photos"]["name"][0]);

		 	$names[] = $name;

			}		
			}
			
			$totalfilesprocessed = count($names);
			
		 	$mimetype = mime_content_type($tempname);

		 	if ($totalfilesuploaded != $totalfilesprocessed) {

			 		header('Location: index.php?menu=account&update=requirements');
			 	} elseif ($mimetype == "image/jpeg" || $mimetype == "image/png" || $mimetype == "image/gif" || $mimetype == "image/bmp" || $mimetype == "image/x-ms-bmp") {


		 			$stmt = $dbconnect->prepare("UPDATE members SET photo = ? WHERE username = '$username'");
		 			$null = NULL;
					$stmt->bind_param("b", $name);
					$stmt->send_long_data(0, file_get_contents($_FILES['photos']['tmp_name'][0])); 
					$stmt->execute();

					$stmt2 = $dbconnect->prepare("UPDATE members SET mimetype = ? WHERE username = '$username'");
					$stmt2->bind_param("s", $mimetype);
					$stmt2->execute();

					$stmt3 = $dbconnect->prepare("UPDATE members SET photoname = ? WHERE username = '$username'");
					$stmt3->bind_param("s", $photoname);
					$stmt3->execute();

		 			header('Location: index.php?menu=account&update=photosuccess');

		 			
		 		} elseif ($mimetype != "image/jpeg" || $mimetype != "image/png" || $mimetype != "image/gif" || $mimetype != "image/bmp" || $mimetype != "image/x-ms-bmp") {

					header('Location: index.php?menu=account&update=unsupported');

			 	} 

	}


	if (isset($delete)) {

		$stmt = $dbconnect->prepare("UPDATE members SET photoname = '', photo = '', mimetype = '' WHERE username = '$username'");
					$stmt->execute();

		header('Location: index.php?menu=account&update=delprofilepic');

	}


} else {

	echo "Permission denied. Please log in <a href=\"index.php#members\">here</a>.";
}


if (!isset($submit) && !isset($delete)) {
	header('Location: index.php');
}

?>
