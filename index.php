<?php
session_start();
require ('config.php');

$action = $_GET['action'];

if ($action == "logout") {


	 if ($ausername != "") {
	 	$loggedinuser = $_SESSION['ausername'];
	 } else {
	 	$loggedinuser = $_SESSION['musername'];
	 }


	 unset($_SESSION['ausername']);
	 unset($_SESSION['apassword']);
	 unset($ausername);
	 unset($apassword);
	 unset($_SESSION['musername']);
	 unset($_SESSION['mpassword']);
	 unset($musername);
	 unset($mpassword);
	 unset($_COOKIE['ausername']);
     unset($_COOKIE['acookieid']);
	 unset($_COOKIE['musername']);
     unset($_COOKIE['mcookieid']);
     setcookie("musername", "", time() - 3600, '/', $_SERVER['HTTP_HOST'], true, true);
	 setcookie("mcookieid", "", time() - 3600, '/', $_SERVER['HTTP_HOST'], true, true);
	 setcookie("ausername", "", time() - 3600, '/', $_SERVER['HTTP_HOST'], true, true);
	 setcookie("acookieid", "", time() - 3600, '/', $_SERVER['HTTP_HOST'], true, true);


	 $sql8a = "UPDATE members SET cookieid = '' WHERE username = '$loggedinuser'";
	 $result8a = mysqli_query($dbconnect, $sql8a);

	 unset ($loggedinuser);

	 header ("Location:index.php#logoutsuccess");
}

$sqlb = "SELECT username,cookieid FROM members LIMIT 1";
	$resultb = mysqli_query($dbconnect, $sqlb);
	$rowb = mysqli_fetch_row($resultb);
	$adminusername =  $rowb[0];
	$admincookieid = $rowb[1];

$stmt1 = $dbconnect -> prepare("SELECT password FROM members WHERE username = ?");
$stmt1 -> bind_param('s', $adminusername);
$stmt1 -> execute();
$stmt1 -> store_result();
$stmt1 -> bind_result($adminpassword);
$stmt1 -> fetch();

//ausername = Admininstrator
//museranme = Member

$amcookieid = $_COOKIE['mcookieid'];

$sqld = "SELECT COUNT(*) FROM members WHERE cookieid = '$amcookieid'";
		$resultd = mysqli_query($dbconnect, $sqld);
		$rowd = mysqli_fetch_array($resultd);
		$usercookieid =  $rowd[0];

		if ($usercookieid[0] == 0 && !isset($_SESSION['musername'])) {

			 if ($ausername != "") {
	 	$loggedinuser = $_SESSION['ausername'];
	 } else {
	 	$loggedinuser = $_SESSION['musername'];
	 }

	 unset($_SESSION['ausername']);
	 unset($_SESSION['apassword']);
	 unset($ausername);
	 unset($apassword);
	 unset($_SESSION['musername']);
	 unset($_SESSION['mpassword']);
	 unset($musername);
	 unset($mpassword);
	 unset($_COOKIE['ausername']);
     unset($_COOKIE['acookieid']);
	 unset($_COOKIE['musername']);
     unset($_COOKIE['mcookieid']);
     setcookie("musername", "", time() - 3600, '/', $_SERVER['HTTP_HOST'], true, true);
	 setcookie("mcookieid", "", time() - 3600, '/', $_SERVER['HTTP_HOST'], true, true);
	 setcookie("ausername", "", time() - 3600, '/', $_SERVER['HTTP_HOST'], true, true);
	 setcookie("acookieid", "", time() - 3600, '/', $_SERVER['HTTP_HOST'], true, true);


	 $sql9a = "UPDATE members SET cookieid = '' WHERE username = '$loggedinuser'";
	 $result9a = mysqli_query($dbconnect, $sql9a);

	 unset ($loggedinuser);

}

if ($_COOKIE["acookieid"] === $admincookieid && $_COOKIE['mcookieid'] === $admincookieid) {

	$_SESSION['ausername'] = $_COOKIE["ausername"];


		$thecookie = $_COOKIE["acookieid"];

		$sqlc = "SELECT COUNT(*) FROM members WHERE username = '$adminusername' AND cookieid = '$thecookie'";
		$resultc = mysqli_query($dbconnect, $sqlc);
		$rowc = mysqli_fetch_array($resultc);
		$iscookie =  $rowc[0];


		if ($iscookie[0] == 1) {

	$_SESSION['apassword'] = $adminpassword;

		}
}

if  ($_SESSION['ausername'] == $adminusername && $_SESSION['apassword'] == $adminpassword) {

} else {
		$loginemail = $_POST['username'];

	if (filter_var($loginemail, FILTER_VALIDATE_EMAIL)) {

		$sqlc = "SELECT COUNT(*) FROM members WHERE email = '$loginemail'";
		$resultc = mysqli_query($dbconnect, $sqlc);
		$ismember = mysqli_fetch_array($resultc);

			if ($ismember[0] == 1) {

					$sqld = "SELECT username FROM members WHERE email = '$loginemail'";
					$resultd = mysqli_query($dbconnect, $sqld);
					$rowd = mysqli_fetch_row($resultd);
						$membername= $rowd[0];


						if ($membername === $adminusername) {

							
				$ausername = $adminusername;
				$_POST['username'] = $adminusername;
				$musername = $membername;

						} else {

				$musername = $membername;
				$_POST['username'] = $membername;
					}

			}

	} else {

		$ausername = htmlspecialchars(strip_tags($_POST['username']));
		$musername = htmlspecialchars(strip_tags($_POST['username']));

	}
	$apassword = htmlspecialchars(strip_tags($_POST['password']));
	$login = $_POST['login'];

	if (password_verify($apassword, $adminpassword)) {
	$count1 = $stmt1->num_rows;
	}

	if ($count1 == 1) {
	$_SESSION['ausername'] = "$ausername";
	$_SESSION['apassword'] = "$adminpassword";



	if ($_SESSION['ausername'] == $adminusername) {

		if(!empty($_POST["remember"])) {



				
	$sql1a = "SELECT cookieid FROM members WHERE username = '$ausername'";
	$result1a = mysqli_query($dbconnect, $sql1a);						
	$row1a = mysqli_fetch_row($result1a);
		$iscookieid = $row1a[0];
		
			if ($iscookieid == "") {


					do {

						$co = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
						$cookieid = "";
						for ($j = 0; $j < 75; $j++) {
     		   			$cookieid .= $co[rand(0, 61)];
    					}


    						$sql6a = "SELECT COUNT(*) FROM members WHERE username = '$adminusername' AND cookieid = '$cookieid'";
							$result6a = mysqli_query($dbconnect, $sql6a);						
							$checkcookie = mysqli_fetch_array($result6a);

    				} while ($checkcookie[0] != "0");


    			} else {
    				$cookieid = $iscookieid;
    			}

    					
    						if ($_SESSION['ausername'] == $adminusername) {
								$sql7a = "UPDATE members SET cookieid = '$cookieid' WHERE username = '$musername'";
								$result7a = mysqli_query($dbconnect, $sql7a);
}

	
	setcookie ("ausername", $ausername,time()+ 31556926, '/', $_SERVER['HTTP_HOST'], true, true);
	setcookie ("acookieid", $cookieid,time()+ 31556926, '/', $_SERVER['HTTP_HOST'], true, true); 
} else {
	setcookie("ausername","");
	setcookie("acookieid","");
}
} else {
	//nothing
}

}



}



$mpassword = htmlspecialchars(strip_tags($_POST['password']));
$login = $_POST['login'];

$stmt = $dbconnect -> prepare("SELECT password FROM members WHERE username = ?");
$stmt -> bind_param('s', $musername);
$stmt -> execute();
$stmt -> store_result();
$stmt -> bind_result($thepassword);
$stmt -> fetch();

if (password_verify($mpassword, $thepassword)) {
	$count = $stmt->num_rows;
}


		$sqlc = "SELECT cookieid FROM members WHERE username = '$musername'";
	$resultc = mysqli_query($dbconnect, $sqlc);
	$rowc = mysqli_fetch_row($resultc);
	$usercookieid = $rowc[0];

if ($count == 1) {
	$_SESSION['musername'] = "$musername";
	$_SESSION['mpassword'] = "$mpassword";

			if(!empty($_POST["remember"])) {


				$sql1a2 = "SELECT cookieid FROM members WHERE username = '$musername'";
	$result1a2 = mysqli_query($dbconnect, $sql1a2);						
	$row1a2 = mysqli_fetch_row($result1a2);
		$iscookieid2 = $row1a2[0];
		
			if ($iscookieid2 == "") {


					do {

						$co2 = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
						$cookieid2 = "";
						for ($j = 0; $j < 75; $j++) {
     		   			$cookieid2 .= $co2[rand(0, 61)];
    					}


    						$sql6b = "SELECT COUNT(*) FROM members WHERE username = '$musername' AND cookieid = '$cookieid2'";
							$result6b = mysqli_query($dbconnect, $sql6b);						
							$checkcookie2 = mysqli_fetch_array($result6b);

    				} while ($checkcookie2[0] != "0");

    			} else {
    				$cookieid2 = $iscookieid2;
    			}

    					if ($_SESSION['musername'] != $adminusername) {

								$sql7b = "UPDATE members SET cookieid = '$cookieid2' WHERE username = '$musername'";
								$result7b = mysqli_query($dbconnect, $sql7b);
							}	


	setcookie ("musername", $musername,time()+ 31556926, '/', $_SERVER['HTTP_HOST'], true, true);

		if ($_SESSION['musername'] == $adminusername) {

			setcookie ("mcookieid", $cookieid,time()+ 31556926, '/', $_SERVER['HTTP_HOST'], true, true); 

		 } else {

	setcookie ("mcookieid", $cookieid2,time()+ 31556926, '/', $_SERVER['HTTP_HOST'], true, true);
		}
} else {
	setcookie("musername","");
	setcookie("mcookieid","");
}
}

if (isset($_COOKIE["musername"]) && isset($_COOKIE["mcookieid"])) {

	
	if ($musername == $adminusername) {

		$_SESSION['musername'] = $adminusername;

	} else {


	$_SESSION['musername'] = $_COOKIE["musername"];
	
	}

	$thecookie2 = $_COOKIE["mcookieid"];

		$sqld = "SELECT COUNT(*) FROM members WHERE username = '$musername' AND cookieid = '$thecookie2'";
		$resultd = mysqli_query($dbconnect, $sqld);
		$rowd = mysqli_fetch_array($resultd);
		$iscookie2 =  $rowd[0];


		if ($iscookie2[0] == 1) {

	$_SESSION['mpassword'] = $thepassword;

		}
}


$_SESSION['album'] = $_GET['album'];

	$sql1 = "SELECT title,subtitle FROM general";
	$result1 = mysqli_query($dbconnect, $sql1);						
	$row1 = mysqli_fetch_row($result1);
		$title = $row1[0];
		$subtitle = $row1[1];
?>

<!DOCTYPE html>
<html>
<head>
	<meta  charset="utf-8">
	<meta  name="description"  content="<?php echo $subtitle; ?>">
	<meta  name="keywords"  content="jig, image, gallery">
	<!-- echo time make href unique and prevents loading old theme from cache-->
	<link rel="stylesheet" type="text/css" href="style.php?<?php echo time(); ?>">
	
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

	<title><?php echo $title ?></title>

	<script src='https://www.google.com/recaptcha/api.js'></script>
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">

	<meta name="viewport" content="width=1224">

</head>
<body>
<?php 

	$sql = "SELECT language FROM general";
	$result = mysqli_query($dbconnect, $sql);
	$row = mysqli_fetch_row($result);
	$language =  strtolower($row[0]);
	require("languages/$language.php"); 

?>
<div id="mobile">
<?php echo $mobilemessage; ?>
<br>
<button class="cookiebutton" onClick="window.location.reload();"><?php echo $dismiss; ?></button>
</div>
<div class="main">

	<div class="header">
		
	<div class="toggle"><p>

<?php
	if  ($_SESSION['musername'] == "$adminusername") {
		echo "<a href=\"admin/index.php\">$alink2</a> (<a href=\"index.php?action=logout\">$logout</a>)</p>";
	} 
?>

<?php

if ($_SESSION['musername'] == $adminusername) {

} elseif  (isset($_SESSION['musername']) && (isset($_SESSION['mpassword']) || isset($_COOKIE['mcookieid']))) {
	$musername = $_SESSION['musername'];
	echo "$mlink2 $musername! (<a href=\"index.php?action=logout\">$logout</a>)</p>";
}
?>
</div>
<img class="logo" src="images/system/logo.png">
	<span class="title">
		<a href="index.php">
<?php 
	echo $title;
?>

		</a>
	</span>
<br>	

<span class="subtitle">
<?php
	echo $subtitle;
?>
</span>
<br><br>

<div class="adminmenu">

<a href="index.php">
	<div class="adminmenuitem <?php $menu = $_GET["menu"]; if ($menu == 'home' or $menu == '') { echo 'selected'; } ?>"><?php echo $hometab; ?>
	<img class="menugraphic" src="images/system/home.png">
	</div>
</a>

<a href="index.php?menu=account">
	<div class="adminmenuitem <?php $menu = $_GET["menu"]; if ($menu == 'account') { echo 'selected'; } ?>"><?php echo $tab6; ?>
	<img class="menugraphic" src="images/system/account.png">
	</div>
</a>
<?php
$sqla = "SELECT contactform FROM general";
$resulta = mysqli_query($dbconnect, $sqla);
				$rowa = mysqli_fetch_row($resulta);
				$contactform = $rowa[0];

if ($contactform == "yes") {
?>
<a href="index.php?menu=contact">
	<div class="adminmenuitem <?php $menu = $_GET["menu"]; if ($menu == 'contact') { echo 'selected'; } ?>"><?php echo $tab7; ?>
	<img class="menugraphic" src="images/system/contact.png">
	</div>
</a>
<?php
}
?>
</div>
</div>
<div class="imain">
	
<?php 
	
	$pin = $_GET['pin'];
	$ain = $_GET['ain'];
	$menu = $_GET["menu"];
	$album = $_GET['album'];

if ($menu == "account") {
	
	include ("account.php");
	
	} elseif ($menu == "contact") {
			
	include ("contact.php");
		
	} else {

if (!empty($pin)) {
	
	include ("photo.php");

	} elseif (!$ain) {

?>
<br>
<div class="breadcrumb">
	 &nbsp;/
</div>
<br>

<div class="youralbums">
	
<?php
	$sql3 = "SELECT picpage FROM general";
	$result3 = mysqli_query($dbconnect, $sql3);						
	$row3 = mysqli_fetch_row($result3);
	$picpage = $row3[0];

	$page = $_GET['page'];

	if ($page == "" || $page == 1) {

		$newpicpage = 0;
		$picturepage = $picpage;

	} else {

		$newpicpage = ($page - 1) * $picpage;
	}

	$sql4 = "SELECT numpage FROM general";
	$result4 = mysqli_query($dbconnect, $sql4);						
	$row4 = mysqli_fetch_row($result4);
	$numpage = $row4[0];

	if ($page == "" || $page == 1) {

		$newpage = 0;
		$numberpage = $numpage;

	} else {

		$newpage = ($page - 1) * $numpage;
	}




	//Album/Photo display order

	$sql5 = "SELECT apdorder FROM general";
	$result5 = mysqli_query($dbconnect, $sql5);						
	$row5 = mysqli_fetch_row($result5);
	$apdorder = $row5[0];

	if ($apdorder == "albums") {

		include ("ialbums.php");

		include ("iphotos.php");

	} else {

		include ("iphotos.php");

		include ("ialbums.php");

	}


#Begin pagination

if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}


#pages

if  (isset($_SESSION['musername']) || $_SESSION['ausername'] == "$adminusername") {

	$sql13 = "SELECT COUNT(*) FROM albums WHERE parentalbum = 'root' AND album != 'None'";
	$result13 = mysqli_query($dbconnect,$sql13);

	$pagerows = mysqli_fetch_array($result13)[0];
	$pgtotal = ceil($pagerows / $numpage);

} else {

	$sql14 = "SELECT COUNT(*) FROM albums WHERE parentalbum = 'root' AND album != 'None' AND status = 'public'";
	$result14 = mysqli_query($dbconnect,$sql14);

	$pagerows = mysqli_fetch_array($result14)[0];
	$pgtotal = ceil($pagerows / $numpage);
}

#pictures

if  (isset($_SESSION['musername']) || $_SESSION['ausername'] == "$adminusername") {
	$sql15 = "SELECT COUNT(*) FROM photos WHERE ain = 1"; 
	$result15 = mysqli_query($dbconnect,$sql15);

	$picrows = mysqli_fetch_array($result15)[0];
	$ptotal = ceil($picrows / $picpage);

} else {

	$sql16 = "SELECT COUNT(*) FROM photos WHERE ain = 1 AND status ='public'"; 
	$result16 = mysqli_query($dbconnect,$sql16);

	$picrows = mysqli_fetch_array($result16)[0];
	$ptotal = ceil($picrows / $picpage);

}
?>
<div class="pagiwrapper">
<br>
<div class="paginationdiv">
	
<?php
	if ($page == 1) {

		echo "<div class=\"boxed1 disabled fade\">$first</div>";

	} else {

   		echo "<a href=\"index.php?page=1\"><div class=\"boxed1 fade\">$first</div></a>";
    }

		

   if ($page <= 1){ 

    	echo "<div class=\"boxed disabled fade\">$prev</div>";
    
    } else { 

    	echo "<a href=\"index.php?page=";
    	echo $page - 1;
    	echo "\"><div class=\"boxed fade\">$prev</div></a>";
    }


	$highestpagenumber = max($pgtotal, $ptotal);

    if($page == $highestpagenumber || $highestpagenumber == 0) { 

	 	echo "<div class=\"boxed disabled fade\">$next</div>"; 

   	} else {

  		echo "<a href=\"index.php?page=";
  		echo $page + 1;
   		echo "\"> <div class=\"boxed fade\">$next</div></a>";

}

   	if ($page == $highestpagenumber || $highestpagenumber == 0) { 

	    echo "<div class=\"boxed disabled fade\">$last</div>";

	} else {
 	
 		echo "<a href=\"index.php?page=$highestpagenumber\"><div class=\"boxed fade\">$last</div></a>";
}
?>
	


<?php

	if ($highestpagenumber == 0) {
		$totalpages = 1;
	} else {
		$totalpages = $highestpagenumber;
	}
?>

<div class="pagenumber"><?php echo "$page of $totalpages";  ?></div>

</div>
</div>


<?php
# End pagination

	} else {

		include ("subalbum.php");
	}

?>
</div>
<br>
	
<?php
}
?>
</div>

<div class="footer">
	<hr class="divider">
	<br>
<?php
	
	$sql17 = "SELECT branding FROM general";
	$result17 = mysqli_query($dbconnect, $sql17);						
	$row17 = mysqli_fetch_row($result17);
	$branding = $row17[0];

?>
	<span class="product"><?php if ($branding == "off") { echo "$pow <a target=\"_blank\" href=\"https://github.com/jaysimagegallery/jig\">JIG</a></span>"; } ?>
	
</div>

</body>
</html>
