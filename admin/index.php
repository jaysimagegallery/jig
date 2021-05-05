<?php
session_start();
require ('../config.php');

$sqlb = "SELECT username FROM members LIMIT 1";
	$resultb = mysqli_query($dbconnect, $sqlb);
	$rowb = mysqli_fetch_row($resultb);
	$adminusername =  $rowb[0];

$stmt1 = $dbconnect -> prepare("SELECT password FROM members WHERE username = '$adminusername'");
$stmt1 -> bind_param('s', $adminusername);
$stmt1 -> execute();
$stmt1 -> store_result();
$stmt1 -> bind_result($adminpassword);
$stmt1 -> fetch();

if  ($_SESSION['ausername'] == $adminusername && $_SESSION['apassword'] == $adminpassword) {

$menu = $_GET["menu"];

		$ipaddress = $_SERVER["REMOTE_ADDR"];	
		$sql1a = "DELETE FROM loginattempts WHERE ipaddress = '$ipaddress' AND user = 'Administrator'";
		$result1a = mysqli_query($dbconnect, $sql1a);

?>

<!DOCTYPE html>
<html>
	<head>
		<meta  charset="utf-8">
		<meta  name="description"  content="">
		<meta  name="keywords"  content="">
		<!-- echo time make href unique and prevents loading old theme from cache-->
		<link rel="stylesheet" type="text/css" href="../style.php?<?php echo time(); ?>">
		<?php

	$sql0 = "SELECT current FROM theme WHERE item='FontFamily' and inuse='yes'";
	$result0 = mysqli_query($dbconnect, $sql0);
	$row0 = mysqli_fetch_row($result0);
	$fontfamily =  $row0[0];


	if ($fontfamily == "Acme") {
		echo "<link href=\"https://fonts.googleapis.com/css2?family=Acme&display=swap\" rel=\"stylesheet\">";
	}

	if ($fontfamily == "Aldrich") {
		echo "<link href=\"https://fonts.googleapis.com/css2?family=Aldrich&display=swap\" rel=\"stylesheet\">";
	}
	
	if ($fontfamily == "Capriola") {
		echo "<link href=\"https://fonts.googleapis.com/css2?family=Capriola&display=swap\" rel=\"stylesheet\">";
	}

	if ($fontfamily == "Comfortaa") {
		echo "<link href=\"https://fonts.googleapis.com/css2?family=Comfortaa&display=swap\" rel=\"stylesheet\">";
	}

	if ($fontfamily == "Commissioner") {
		echo "<link href=\"https://fonts.googleapis.com/css2?family=Commissioner&display=swap\" rel=\"stylesheet\">";
	}

	if ($fontfamily == "Courier Prime") {
		echo "<link href=\"https://fonts.googleapis.com/css2?family=Courier+Prime&display=swap\" rel=\"stylesheet\">";
	}

	if ($fontfamily == "Dancing Script") {
		echo "<link href=\"https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap\" rel=\"stylesheet\">";
	}

	if ($fontfamily == "Delius") {
		echo "<link href=\"https://fonts.googleapis.com/css2?family=Delius&display=swap\" rel=\"stylesheet\">";
	}

	if ($fontfamily == "Walter Turncoat") {
		echo "<link href=\"https://fonts.googleapis.com/css2?family=Walter+Turncoat&display=swap\" rel=\"stylesheet\">";
	}

	if ($fontfamily == "Permanent Marker") {
		echo "<link href=\"https://fonts.googleapis.com/css2?family=Permanent+Marker&display=swap\" rel=\"stylesheet\">";
	}

	if ($fontfamily == "Joti One") {
		echo "<link href=\"https://fonts.googleapis.com/css2?family=Joti+One&display=swap\" rel=\"stylesheet\">";
	}

	if ($fontfamily == "Muli") {
		echo "<link href=\"https://fonts.googleapis.com/css2?family=Muli&display=swap\" rel=\"stylesheet\">";
	}

	if ($fontfamily == "Nunito Sans") {
		echo "<link href=\"https://fonts.googleapis.com/css2?family=Nunito+Sans&display=swap\" rel=\"stylesheet\">";
	}

	if ($fontfamily == "Open Sans") {
		echo "<link href=\"https://fonts.googleapis.com/css2?family=Open+Sans&display=swap\" rel=\"stylesheet\">";
	}

	if ($fontfamily == "Secular One") {
		echo "<link href=\"https://fonts.googleapis.com/css2?family=Secular+One&display=swap\" rel=\"stylesheet\">";
	}

	if ($fontfamily == "Raleway") {
		echo "<link href=\"https://fonts.googleapis.com/css2?family=Raleway&display=swap\" rel=\"stylesheet\">";
	}

	if ($fontfamily == "Righteous") {
		echo "<link href=\"https://fonts.googleapis.com/css2?family=Righteous&display=swap\" rel=\"stylesheet\">";
	}

	if ($fontfamily == "Rubik") {
		echo "<link href=\"https://fonts.googleapis.com/css2?family=Rubik&display=swap\" rel=\"stylesheet\">";
	}

	if ($fontfamily == "Schoolbell") {
		echo "<link href=\"https://fonts.googleapis.com/css2?family=Schoolbell&display=swap\" rel=\"stylesheet\">";
	}

	if ($fontfamily == "Ubuntu") {
		echo "<link href=\"https://fonts.googleapis.com/css2?family=Ubuntu&display=swap\" rel=\"stylesheet\">";
	}

	?>

		<title>JIG Administration</title>

		<link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">

		<meta name="viewport" content="width=1225">
		
<?php 

	$sql = "SELECT language FROM general";
	$result = mysqli_query($dbconnect, $sql);
	$row = mysqli_fetch_row($result);
			
		$language = strtolower($row[0]); 
	
		require("../languages/$language.php");
 ?>
</head>
<body>
	<div class="main">
		<div class="header">
			<span class="toggle2">
				<a href="../index.php"><?php echo $glink; ?> </a> <?php echo "(<a href=\"../index.php?action=logout\">$logout</a>)"; ?>
			</span>
			<img class="logo" src="../images/system/adminlogo.png">
			<span class="title">
				<a href="index.php"><?php echo $atitle; ?></a></span>
			<br>	
			<span class="subtitle"><?php echo $asubtitle; ?></span>
			<br>
			<br>
			<div class="adminmenu">
				<a href="index.php?menu=general">
					<div class="adminmenuitem <?php $menu = $_GET["menu"]; if ($menu == 'general') { echo 'selected'; } ?>">
						<?php echo $tab1; ?><img class="menugraphic" src="../images/system/general.png">
					</div>
				</a>
				<a href="index.php?menu=gallery">
					<div class="adminmenuitem <?php $menu = $_GET["menu"]; if ($menu == 'gallery' or $menu == 'subalbum') { echo 'selected'; } ?>">
						<?php echo $tab2; ?><img class="menugraphic" src="../images/system/camera.png">
					</div>
				</a>
				<a href="index.php?menu=theme">
					<div class="adminmenuitem <?php $menu = $_GET["menu"]; if ($menu == 'theme') { echo 'selected'; } ?>">
						<?php echo $tab3; ?><img class="menugraphic" src="../images/system/theme.png">
					</div>
				</a>
				<a href="index.php?menu=members">
					<div class="adminmenuitem <?php $menu = $_GET["menu"]; if ($menu == 'members') { echo 'selected'; } ?>">
						<?php echo $tab4; ?><img class="menugraphic" src="../images/system/members.png">
					</div>
				</a>
				<a href="index.php?menu=comments">
					<div class="adminmenuitem <?php $menu = $_GET["menu"]; if ($menu == 'comments') { echo 'selected'; } ?>">
					<?php
						$sql = "SELECT * FROM comments WHERE live = 'no'";
						$result = mysqli_query($dbconnect, $sql);
						$countrows = mysqli_num_rows($result);
							
							if ($countrows >= 1) {
								echo "<img class=\"newcomment\" src=\"../images/system/newcomment.png\">";
							}
					?>
					<img class="menugraphic" src="../images/system/comments.png">
					<span class="mai"><?php echo $tab5; ?></span>
					</div>
				</a>	
			</div>
		</div>
			
		<div class="imain">
			<?php 

				if (!$menu) {

					include ('default.php');

				} else {

					$file = "$menu.php";
					include ($file);
				}

			?>	
</div>
<div class="footer">
			<hr class="divider">
			<br>
			<?php
	
	$sql1 = "SELECT branding FROM general";
	$result1 = mysqli_query($dbconnect, $sql1);						
	$row1 = mysqli_fetch_row($result1);
	$branding = $row1[0];

	?>
			<span class="copyright">&copy 2021 <?php $year = date('Y'); if ($year == "2021") { } else { echo " - "; echo date('Y'); } ?> <a href="mailto:jaysimagegallery@gmail.com">Jason Carson</a></span>
			<span class="product"><?php echo $pow; ?> <a target=\_blank\ href=https://github.com/jaysimagegallery/jig\>JIG</a></span>
					</div>



		</div>

</body>
</html>

<?php

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
