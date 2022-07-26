<?php

include ("config.php");

$submit = $_POST['create'];
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$password2 = $_POST['password2'];
?>

<!DOCTYPE html>
<html>
<head>
	<meta  charset="utf-8">
	<meta  name="description"  content="<?php echo $subtitle; ?>">
	<meta  name="keywords"  content="jig, image, gallery">
	<!-- echo time make href unique and prevents loading old theme from cache-->
	<link rel="stylesheet" type="text/css" href="style.php?<?php echo time(); ?>">
	
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">

	<title>JIG Setup</title>

	<script src='https://www.google.com/recaptcha/api.js'></script>
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">

	<meta name="viewport" content="width=1224">

</head>
<body>
	<div class="main">
		<div class="header">
			<a href="setup.php"><img class="logo" src="images/system/adminlogo.png"></a>
			<span class="title">
				<a href="setup.php">Jay's Image Gallery</a></span>
			<br>	
			<span class="subtitle">JIG setup script</span>
			<br>
			<br>
			<div class="adminmenu">
				<a href="setup.php">
					<div class="adminmenuitem selected">
						Setup<img class="menugraphic" src="images/system/general.png">
					</div>
				</a>
			</div>
		</div>
			
		<div class="imain">



<div class="options fade">
	<div class="aswrapper">
		<div class="iaswrapper">

		<?php

if (isset($submit)) {

if ($password === $password2) {


$hash = password_hash($password, PASSWORD_DEFAULT);

$stmt = $dbconnect->prepare("UPDATE members SET username=?, email=?, password=? WHERE username='$username'");
		$stmt->bind_param("sss", $username, $email, $hash);
		$stmt->execute();

mysqli_close($dbconnect);

echo "<div class=\"success\"><img class=\"checkmark\" src=\"images/system/checkmark.png\"> You have successfully setup JIG! <a style=\"text-decoration: underline !important;\" href=\"index.php\">Click here</a> to visit your Gallery.</div><br>";

} else {
	echo "<div class=\"failure\"><img class=\"failureimg\" src=\"images/system/failure.png\"> Password mismatch, <a style=\"text-decoration: underline !important;\" href=\"setup.php\">click here</a> to try again</div><br>";
}
} else {


$sql = "SELECT email,password FROM members LIMIT 1";
	$result = mysqli_query($dbconnect, $sql);						
	$row = mysqli_fetch_row($result);
	$email1 = $row[0];
	$password1 = $row[1];

	if ($email1 == "" || $password1 == "") {
?>
<span class="boxhead">Welcome to the JIG setup wizard</span>
<br><br>
<form action="setup.php" method="post">
		Setup your Administrator account<br><br>
			<div class="memitem2">
			<input type="email" name="email" class="textbox" placeholder="Administrator email" required>
		</div>

<br><br>

		<div class="memitem2">
			<input type="text" name="username" class="textbox" placeholder="Administrator username" required>
		</div>
<br><br>

		<div class="memitem2">
			<input type="password" name="password" class="textbox" placeholder="Administrator password" required> again  
			<input type="password" name="password2" class="textbox" placeholder="Administrator password" required></div>
			
<br><br><br>

<input type="submit" name="create" value="Submit" class="createbutton"> 
<br><br>
</form>
<?php


		
	} else {

echo "You have already setup JIG<br><br>";
}
}
?>
</div>
</div>





</div>


</div>
<div class="footer">
			<hr class="divider">
			<br>
			
			<span class="copyright">&copy 2021 <?php $year = date('Y'); if ($year == "2021") { } else { echo " - "; echo date('Y'); } ?> <a href="mailto:jaysimagegallery@gmail.com">Jason Carson</a></span>
			<span class="product">Powered by <a target=\_blank\ href=https://github.com/jigscript/jig\>JIG</a></span>
					</div>



		</div>
	</body>
</html>
