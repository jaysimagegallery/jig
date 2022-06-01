<?php

session_start();
include ('config.php');

	$sql = "SELECT language FROM general";
	$result = mysqli_query($dbconnect, $sql);
	$row = mysqli_fetch_row($result);
	$language =  strtolower($row[0]);
	require("languages/$language.php");

$submit = $_POST['submit'];
$postername = htmlspecialchars(strip_tags($_POST['postername']));
$username = htmlspecialchars(strip_tags($_POST['username']));
$comment = nl2br(htmlspecialchars(strip_tags($_POST['comment']), ENT_QUOTES));
$pin = $_POST['pin'];
$no = "no";
$yes = "yes";
$photodir = $_POST['photodir'];
$ain = $_POST['ain'];
$album = $_POST['album'];
$page = $_POST['page'];

if ($page == "") {
	$page = 1;
}

$_SESSION['postercomment'] = $comment;
$_SESSION['postername'] =  $postername;

	$sql = "SELECT recaptcha,sitekey,secretkey FROM general";
	$result = mysqli_query($dbconnect, $sql);						
	$row = mysqli_fetch_row($result);
			$enablerecaptcha = $row[0];
			$sitekey = $row[1];
			$secretkey = $row[2];




if ($enablerecaptcha == "yes") {

	// grab recaptcha library
	require_once "recaptchalib.php";

	// empty response
	$response = null;
 
	// check secret key
	$reCaptcha = new ReCaptcha($secretkey);

	// if submitted check response
	if ($_POST["g-recaptcha-response"]) {
    	$response = $reCaptcha->verifyResponse(
        $_SERVER["REMOTE_ADDR"],
        $_POST["g-recaptcha-response"],
		$hidden = success
    );

}

//If user forgets to check the recaptcha box
if ($response == null && isset($submit)) {
		
	header('Location: index.php?album='.$album.'&ain='.$ain.'&pin='.$pin.'&page='.$page.'&post=recaptcha#post');

//If user checks recaptcha box
} elseif ($response != null && $response->success) {

		if ($username == "Anonymous") {
$no = "no";
		$commentdate = date('Y-m-d H:i:s');
		$stmt = $dbconnect->prepare("INSERT INTO comments (username, name, comment, pin, live, photodir, commentdate) VALUES (?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("sssisss", $username, $postername, $comment, $pin, $no, $photodir, $commentdate);
		$stmt->execute();

		$sql1 = "SELECT notifyanon FROM general";
		$result1 = mysqli_query($dbconnect, $sql1);
		$row1 = mysqli_fetch_array($result1);
			$notifyanon = $row1[0];
					
			if ($notifyanon == "yes") {
		
					$sql2 = "SELECT email FROM members WHERE username = 'Administrator'";
					$result2 = mysqli_query($dbconnect, $sql2);
					$row2 = mysqli_fetch_array($result2);
					$email = $row2[0];

			$domain = $_SERVER['SERVER_NAME'];

			if (isset($_SERVER['HTTPS'])) {

				$dir = dirname($_SERVER['PHP_SELF']);	
				$website = "https://$domain$dir";

					} else {
				$dir = dirname($_SERVER['PHP_SELF']);
				$website = "http://$domain$dir";
					
			}

			$finalmessage = "$anonmessage\n\n$sentfrom $website";


				mail("$email", "$jiganonemail", "$finalmessage", "From: $jigadmin<$email>");
	
			}


		header('Location: index.php?album='.$album.'&ain='.$ain.'&pin='.$pin.'&page='.$page.'&post=moderation#post');

} else {
$yes = "yes";
		$commentdate = date('Y-m-d H:i:s');
		$stmt = $dbconnect->prepare("INSERT INTO comments (username, name, comment, pin, live, photodir, commentdate) VALUES (?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("sssisss", $username, $postername, $comment, $pin, $yes, $photodir, $commentdate);
		$stmt->execute();


			$sql = "SELECT COUNT(*) FROM comments WHERE pin = '$pin'";
			$result = mysqli_query($dbconnect,$sql);
				$commentrows = mysqli_fetch_array($result)[0];
				$highestpagenumber = ceil($commentrows / 25);

					
			$sql1 = "SELECT commentorder FROM general";
			$result1 = mysqli_query($dbconnect, $sql1);
			$row1 = mysqli_fetch_row($result1);
				$commentorder = $row1[0];

				if ($commentorder == "ASC") {

					header('Location: index.php?album='.$album.'&ain='.$ain.'&pin='.$pin.'&page='.$highestpagenumber.'&post=approved#post');

				} else {

					header('Location: index.php?album='.$album.'&ain='.$ain.'&pin='.$pin.'&page=1&post=approved#post');

				}

		}
 	}

//If no recaptcha is used
} else {

		if ($username == "Anonymous") {
$no = "no";
		$commentdate = date('Y-m-d H:i:s');
		$stmt = $dbconnect->prepare("INSERT INTO comments (username, name, comment, pin, live, photodir, commentdate) VALUES (?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("sssisss", $username, $postername, $comment, $pin, $no, $photodir, $commentdate);
		$stmt->execute();

		$sql1 = "SELECT notifyanon FROM general";
		$result1 = mysqli_query($dbconnect, $sql1);
		$row1 = mysqli_fetch_array($result1);
			$notifyanon = $row1[0];
					
			if ($notifyanon == "yes") {
		
					$sql2 = "SELECT email FROM members WHERE username = 'Administrator'";
					$result2 = mysqli_query($dbconnect, $sql2);
					$row2 = mysqli_fetch_array($result2);
					$email = $row2[0];

			$domain = $_SERVER['SERVER_NAME'];

			if (isset($_SERVER['HTTPS'])) {

				$dir = dirname($_SERVER['PHP_SELF']);
				$website = "https://$domain$dir";

					} else {
	
				$dir = dirname($_SERVER['PHP_SELF']);
				$website = "http://$domain$dir";
					
			}

			$finalmessage = "$anonmessage\n\n$sentfrom $website";


				mail("$email", "$jiganonemail", "$finalmessage", "From: $jigadmin<$email>");
			}

		header('Location: index.php?album='.$album.'&ain='.$ain.'&pin='.$pin.'&page='.$page.'&post=moderation#post');

} else {
		$yes = "yes";
		$commentdate = date('Y-m-d H:i:s');
		$stmt = $dbconnect->prepare("INSERT INTO comments (username, name, comment, pin, live, photodir, commentdate) VALUES (?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("sssisss", $username, $postername, $comment, $pin, $yes, $photodir, $commentdate);
		$stmt->execute();

		$sql = "SELECT COUNT(*) FROM comments WHERE pin = '$pin'";
			$result = mysqli_query($dbconnect,$sql);
				$commentrows = mysqli_fetch_array($result)[0];
				$highestpagenumber = ceil($commentrows / 25);

					
			$sql1 = "SELECT commentorder FROM general";
			$result1 = mysqli_query($dbconnect, $sql1);
			$row1 = mysqli_fetch_row($result1);
				$commentorder = $row1[0];

				if ($commentorder == "ASC") {

					header('Location: index.php?album='.$album.'&ain='.$ain.'&pin='.$pin.'&page='.$highestpagenumber.'&post=approved#post');

				} else {

					header('Location: index.php?album='.$album.'&ain='.$ain.'&pin='.$pin.'&page=1&post=approved#post');

				}

	}
}

if ($album == "" && $ain == "" && $pin == "") {
	header('Location: index.php');
}

?>
