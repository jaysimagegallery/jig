<?php
    header("Content-type: text/css; charset: UTF-8");
?>

<?php
include ('config.php');
$sql1 = "SELECT current FROM theme WHERE item = 'FontFamily' AND inuse = 'yes'";
    $result = mysqli_query($dbconnect, $sql1);

    while ($list = mysqli_fetch_array($result)) {

    	$fontfamily = $list[0];
	}

$sql2 = "SELECT current FROM theme WHERE item = 'FontColor' AND inuse = 'yes'";
    $result2 = mysqli_query($dbconnect, $sql2);

    while ($list2 = mysqli_fetch_array($result2)) {

    	$fontcolor = $list2[0];
	}     

$sql3 = "SELECT current FROM theme WHERE item = 'OuterBackgroundColor' AND inuse = 'yes'";
    $result3 = mysqli_query($dbconnect, $sql3);

    while ($list3 = mysqli_fetch_array($result3)) {

    	$obg = $list3[0];
	}

$sql4 = "SELECT current FROM theme WHERE item = 'InnerBackgroundColor' AND inuse = 'yes'";
    $result4 = mysqli_query($dbconnect, $sql4);

    while ($list4 = mysqli_fetch_array($result4)) {

    	$ibc = $list4[0];
	}

$sql5 = "SELECT current FROM theme WHERE item = 'SelectedTab' AND inuse = 'yes'";
    $result5 = mysqli_query($dbconnect, $sql5);

    while ($list5 = mysqli_fetch_array($result5)) {

    	$seltab = $list5[0];
	}

$sql5a = "SELECT current FROM theme WHERE item = 'SelectedTabFontColor' AND inuse = 'yes'";
    $result5a = mysqli_query($dbconnect, $sql5a);

    while ($list5a = mysqli_fetch_array($result5a)) {

    	$stfc = $list5a[0];
	}	

$sql6 = "SELECT current FROM theme WHERE item = 'UnselectedTab' AND inuse = 'yes'";
    $result6 = mysqli_query($dbconnect, $sql6);

    while ($list6 = mysqli_fetch_array($result6)) {

    	$unseltab = $list6[0];
	}

$sql6a = "SELECT current FROM theme WHERE item = 'UnselectedTabFontColor' AND inuse = 'yes'";
    $result6a = mysqli_query($dbconnect, $sql6a);

    while ($list6a = mysqli_fetch_array($result6a)) {

    	$ustfc = $list6a[0];
	}

$sql7 = "SELECT current FROM theme WHERE item = 'Buttons' AND inuse = 'yes'";
    $result7 = mysqli_query($dbconnect, $sql7);

    while ($list7 = mysqli_fetch_array($result7)) {

    	$buttons = $list7[0];
	}

$sql8 = "SELECT current FROM theme WHERE item = 'ButtonTextColor' AND inuse = 'yes'";
    $result8 = mysqli_query($dbconnect, $sql8);

    while ($list8 = mysqli_fetch_array($result8)) {

    	$btc = $list8[0];
	}


$sql9 = "SELECT current FROM theme WHERE item = 'InnerAlbumBorder' AND inuse = 'yes'";
    $result9 = mysqli_query($dbconnect, $sql9);

    while ($list9 = mysqli_fetch_array($result9)) {

    	$iab = $list9[0];
	}


$sql10 = "SELECT current FROM theme WHERE item = 'AlbumBackgroundColor' AND inuse = 'yes'";
    $result10 = mysqli_query($dbconnect, $sql10);

    while ($list10 = mysqli_fetch_array($result10)) {

    	$abc = $list10[0];
	}

$sql11 = "SELECT current FROM theme WHERE item = 'AlbumFontColor' AND inuse = 'yes'";
    $result11 = mysqli_query($dbconnect, $sql11);

    while ($list11 = mysqli_fetch_array($result11)) {

    	$afc = $list11[0];
	}

$sql12 = "SELECT current FROM theme WHERE item = 'BreadcrumbFontColor' AND inuse = 'yes'";
    $result12 = mysqli_query($dbconnect, $sql12);

    while ($list12 = mysqli_fetch_array($result12)) {

    	$breadfont = $list12[0];
	}

$sql13 = "SELECT current FROM theme WHERE item = 'Breadcrumb' AND inuse = 'yes'";
    $result13 = mysqli_query($dbconnect, $sql13);

    while ($list13 = mysqli_fetch_array($result13)) {

    	$breadcrumb = $list13[0];
	}

$sql14 = "SELECT current FROM theme WHERE item = 'Divider' AND inuse = 'yes'";
    $result14 = mysqli_query($dbconnect, $sql14);

    while ($list14 = mysqli_fetch_array($result14)) {

    	$divider = $list14[0];
	}

$sql15 = "SELECT current FROM theme WHERE item = 'TextboxBorder' AND inuse = 'yes'";
    $result15 = mysqli_query($dbconnect, $sql15);

    while ($list15 = mysqli_fetch_array($result15)) {

    	$tbb = $list15[0];
	}

$sql16 = "SELECT current FROM theme WHERE item = 'TextboxBackground' AND inuse = 'yes'";
    $result16 = mysqli_query($dbconnect, $sql16);

    while ($list16 = mysqli_fetch_array($result16)) {

    	$tbbg = $list16[0];
	}

$sql17 = "SELECT current FROM theme WHERE item = 'Borders' AND inuse = 'yes'";
    $result17 = mysqli_query($dbconnect, $sql17);

    while ($list17 = mysqli_fetch_array($result17)) {

    	$borders = $list17[0];
	}

$sql18 = "SELECT current FROM theme WHERE item = 'FailedloginTextColor' AND inuse = 'yes'";
    $result18 = mysqli_query($dbconnect, $sql18);

    while ($list18 = mysqli_fetch_array($result18)) {

    	$failedlogintextcolor = $list18[0];
	}

$sql19 = "SELECT current FROM theme WHERE item = 'NextPrevDisabledText' AND inuse = 'yes'";
    $result19 = mysqli_query($dbconnect, $sql19);

    while ($list19 = mysqli_fetch_array($result19)) {

    	$npdt = $list19[0];
	}	

$sql20 = "SELECT current FROM theme WHERE item = 'NextPrevBackground' AND inuse = 'yes'";
    $result20 = mysqli_query($dbconnect, $sql20);

    while ($list20 = mysqli_fetch_array($result20)) {

    	$npbg = $list20[0];
	}
$sql21 = "SELECT current FROM theme WHERE item = 'DefaultLinkColor' AND inuse = 'yes'";
    $result21 = mysqli_query($dbconnect, $sql21);

    while ($list21 = mysqli_fetch_array($result21)) {

    	$dlc = $list21[0];
	}	
$sql22 = "SELECT current FROM theme WHERE item = 'VisitedLinkColor' AND inuse = 'yes'";
    $result22 = mysqli_query($dbconnect, $sql22);

    while ($list22 = mysqli_fetch_array($result22)) {

    	$vlc = $list22[0];
	}		
$sql23 = "SELECT current FROM theme WHERE item = 'SuccessFailureBackground' AND inuse = 'yes'";
    $result23 = mysqli_query($dbconnect, $sql23);

    while ($list23 = mysqli_fetch_array($result23)) {

    	$sfbg = $list23[0];
	}	
$sql24 = "SELECT current FROM theme WHERE item = 'SuccessFailureBorder' AND inuse = 'yes'";
    $result24 = mysqli_query($dbconnect, $sql24);

    while ($list24 = mysqli_fetch_array($result24)) {

    	$sfb = $list24[0];
	}	

$sql25 = "SELECT fadeeffect FROM general";
	$result25 = mysqli_query($dbconnect, $sql25);
	$row25 = mysqli_fetch_row($result25);
		$timer = $row25[0];

 mysqli_close($dbconnect);			
?>

/* Popup if on mobile */

div#mobile { display: none; }

<?php
if(isset($_COOKIE["mobile"])){
?>
div#mobile {
 display: none; 
}
@media only screen and (max-device-width:1224px) {
.main {
	margin-top: -21px !important;
	margin-bottom: 0 !important;
}
}

<?php
} else {
?>
@media only screen and (max-device-width:480px) {

div#mobile { 
	padding: 25px 25px 0 25px; 
	display: table;
    margin: 0 0 45px 0;
    width: 1170px;
    text-align: center;
    font-size: 42px;
   	background-color: #<?php echo "$ibc"; ?>;
	color: #<?php echo "$fontcolor"; ?>;
}

.cookiebutton {
	margin: 40px 0 50px 0;
}

.main {
	margin-top: -45px !important;
}


}
@media only screen and (max-device-width:1224px) {
.main {
	margin-top: -21px !important;
	margin-bottom: 0 !important;
}
}

<?php
setcookie("mobile", "mobile", time()+ 31556926);
}
?>




/* CSS Document */

html {
	height: 101%;
}

a {
	color:#<?php echo "$dlc"; ?>;
	text-decoration: none !important;
	background: none !important;
	outline: 0;
}

a:visited {
	color: #<?php echo "$vlc"; ?>;
	text-decoration: none !important;
	background: none !important;
}

body {
	font-family: '<?php echo "$fontfamily"; ?>', <?php if ($fontfamily == 'Open Sans' || $fontfamily == 'Aldrich' || $fontfamily == 'Commissioner' || $fontfamily == 'Capriola' || $fontfamily == 'Rubik' || $fontfamily == 'Muli' || $fontfamily == 'Acme' || $fontfamily == 'Secular One' || $fontfamily == 'Raleway' || $fontfamily == 'Ubuntu' || $fontfamily == 'Nunito Sans') { echo "sans-serif";  } elseif ($fontfamily == 'Courier Prime') { echo "monospace"; } else { echo "cursive"; } ?> !important;
	margin: 0;
	padding: 0;
	color: #<?php echo "$fontcolor"; ?>;
	background-color: #<?php echo "$obg"; ?> !important;
	font-size: 16px;
}

h1 {
	color: #<?php echo "$fontcolor"; ?> !important;	
}

h2 {
	color: #<?php echo "$fontcolor"; ?> !important;	
}

h1.p {
	color: #222222 !important;	
}

h2 a {
	color: #<?php echo "$fontcolor"; ?> !important;	
}

.main {
	width: 100%;
	margin: auto 0;
	margin-top: 15px;
	margin-bottom: 38px;
}

.imain {
	width: 1170px;
	background-color: #<?php echo "$ibc"; ?>;
	border-top: 1px solid #<?php echo "$borders"; ?>;
	border-left: 1px solid #<?php echo "$borders"; ?>;	
	border-right: 1px solid #<?php echo "$borders"; ?>;
	
	padding: 25px 25px 0 25px; 
	display: table;
    	margin: 0 auto;
}

.logo {
	float: left;
	height: 64px;
	width: 64px;
	padding-right: 10px;
}

.header, header a {
	width: 1170px;
	background-color: #<?php echo "$ibc"; ?>;
	border: 1px solid #<?php echo "$borders"; ?>;
	padding: 25px 25px 0 25px; 
	display: table;
    margin: 0 auto;
	border-radius: 3px 3px 0 0;
	color: #<?php echo "$fontcolor"; ?> !important;
}

.footer {
	width: 1170px;
	height: 20px;
	background-color: #<?php echo "$ibc"; ?>;
	border-left: 1px solid #<?php echo "$borders"; ?>;
	border-right: 1px solid #<?php echo "$borders"; ?>;
	border-bottom: 1px solid #<?php echo "$borders"; ?>;
	padding: 0 25px 25px 25px; 
	display: table;
	margin: 0 auto;
	border-radius: 0 0 3px 3px;
	color: #<?php echo "$fontcolor"; ?> !important;
}

.breadcrumb {
	background-color: #<?php echo "$breadcrumb"; ?>;
	padding: 8px;
	border-radius: 3px;	
	font-size: 20px;
	color: #<?php echo "$breadfont"; ?>;
	overflow-wrap: break-word;
	width: 1153px;
}

.fade {
	animation: fadein <?php echo "$timer"; ?>s;
}

@keyframes fadein {
    from { opacity: 0; }
    to   { opacity: 1; }
}

.titles {
	font-size: 18px;
	font-weight: bold;
	padding-left: 3px;
}

.title {
	font-size: 32px;
}

.title a {
	color: #<?php echo "$fontcolor"; ?> !important; 
	text-decoration: none;
}

.subtitle {

}

.toggle {
	float: right;
	margin: -19px 2px 0 0;
}

.toggle a {
	text-decoration: none;
}

.toggle2 {
	float: right;
	margin: -3px 2px 0 0;
}

.toggle2 a {
	text-decoration: none;
}

.failedlogin {
	color: #<?php echo "$failedlogintextcolor"; ?>;
	font-weight: bold;
	font-size: 18px;
}

.adminmenu {
	width: 100%;
	display: table;
	margin: 0 auto;
	margin-top: 8px;
}

.adminmenu a {
	color: #<?php echo "$fontcolor"; ?> !important;
	text-decoration: none;
}

.adminmenuitem {
	width: 200px;
	border: 1px solid #<?php echo "$unseltab"; ?>;
	border-radius: 3px 3px 0 0;
	background-color: #<?php echo "$unseltab"; ?> !important;
	float: left;
	padding: 8px;
	margin: 0 8px 0 8px;
	font-size: 20px;
	color: #<?php echo "$ustfc"; ?> !important;
}

.selected {
	background-color: #<?php echo "$seltab"; ?> !important;
	border: 1px solid #<?php echo "$seltab"; ?>;
	color: #<?php echo "$stfc"; ?> !important;
}

.selected a {
	color: #<?php echo "$ibc"; ?>;
}

.options {
	padding: 9px 9x 0 9px;
	overflow: hidden;
}

.logintext {
	text-align: left;
	width: 160px;
	float: left;
	height: 25px;
	padding: 11px 4px 0 4px;
}

.loginbox {
	padding: 8px 4px 0 4px;
	font-size: 16px;
	height: 29px;
	width: 375px;
	font-family: '<?php echo "$fontfamily"; ?>', <?php if ($fontfamily == 'Open Sans' || $fontfamily == 'Aldrich' || $fontfamily == 'Commissioner' || $fontfamily == 'Capriola' || $fontfamily == 'Rubik' || $fontfamily == 'Muli' || $fontfamily == 'Acme' || $fontfamily == 'Secular One' || $fontfamily == 'Raleway' || $fontfamily == 'Ubuntu' || $fontfamily == 'Nunito Sans') { echo "sans-serif";  } elseif ($fontfamily == 'Courier Prime') { echo "monospace"; } else { echo "cursive"; } ?> !important;
}

.memloginbox {
	padding: 8px 4px 0 4px;
	font-size: 16px;
	height: 29px;
	width: 375px;
	font-family: '<?php echo "$fontfamily"; ?>', <?php if ($fontfamily == 'Open Sans' || $fontfamily == 'Aldrich' || $fontfamily == 'Commissioner' || $fontfamily == 'Capriola' || $fontfamily == 'Rubik' || $fontfamily == 'Muli' || $fontfamily == 'Acme' || $fontfamily == 'Secular One' || $fontfamily == 'Raleway' || $fontfamily == 'Ubuntu' || $fontfamily == 'Nunito Sans') { echo "sans-serif";  } elseif ($fontfamily == 'Courier Prime') { echo "monospace"; } else { echo "cursive"; } ?> !important;
	margin: 0 auto;
}

.usernamelogin {
	padding: 3px 4px 5px 4px;
	border: 1px solid #<?php echo "$borders"; ?>;
	background-color: #<?php echo "$tbbg"; ?>;
	font-size: 16px;
	height: 24px;
	width: 375px;
	font-family: '<?php echo "$fontfamily"; ?>', <?php if ($fontfamily == 'Open Sans' || $fontfamily == 'Aldrich' || $fontfamily == 'Commissioner' || $fontfamily == 'Capriola' || $fontfamily == 'Rubik' || $fontfamily == 'Muli' || $fontfamily == 'Acme' || $fontfamily == 'Secular One' || $fontfamily == 'Raleway' || $fontfamily == 'Ubuntu' || $fontfamily == 'Nunito Sans') { echo "sans-serif";  } elseif ($fontfamily == 'Courier Prime') { echo "monospace"; } else { echo "cursive"; } ?> !important;
	float: left;
}

.passwordlogin {
	border: 1px solid #<?php echo "$borders"; ?>;
	background-color: #<?php echo "$tbbg"; ?>;
	padding: 3px 4px 5px 4px;
	font-size: 16px;
	height: 24px;
	width: 375px;
	font-family: '<?php echo "$fontfamily"; ?>', <?php if ($fontfamily == 'Open Sans' || $fontfamily == 'Aldrich' || $fontfamily == 'Commissioner' || $fontfamily == 'Capriola' || $fontfamily == 'Rubik' || $fontfamily == 'Muli' || $fontfamily == 'Acme' || $fontfamily == 'Secular One' || $fontfamily == 'Raleway' || $fontfamily == 'Ubuntu' || $fontfamily == 'Nunito Sans') { echo "sans-serif";  } elseif ($fontfamily == 'Courier Prime') { echo "monospace"; } else { echo "cursive"; } ?> !important;
	float: left;
}

.memloginform {
	text-align: center;
}

.getkeys {
	font-size: 14px;
	padding: 0 0 24px 0;
	width: 650px;
}

.gkeys {
	float: left;
	height: 50px;
	width: 145px;
}

.gkeys2 {
	margin-top: -3px;
	float: left;
	height: 50px;
	width: 385px;
}

.googlebox {
	padding: 4px 4px 4px 4px;
	font-size: 16px;
	height: 29px;
	width: 385px;
	font-family: '<?php echo "$fontfamily"; ?>', <?php if ($fontfamily == 'Open Sans' || $fontfamily == 'Aldrich' || $fontfamily == 'Commissioner' || $fontfamily == 'Capriola' || $fontfamily == 'Rubik' || $fontfamily == 'Muli' || $fontfamily == 'Acme' || $fontfamily == 'Secular One' || $fontfamily == 'Raleway' || $fontfamily == 'Ubuntu' || $fontfamily == 'Nunito Sans') { echo "sans-serif";  } elseif ($fontfamily == 'Courier Prime') { echo "monospace"; } else { echo "cursive"; } ?> !important;
	border: 1px solid #<?php echo "$tbb"; ?>;
	background-color: #<?php echo "$tbbg"; ?>;
}

.memberemailtextbox {
	padding: 4px 12px 4px 4px;
	font-size: 16px;
	height: 29px;
	width: 238px;
	font-family: '<?php echo "$fontfamily"; ?>', <?php if ($fontfamily == 'Open Sans' || $fontfamily == 'Aldrich' || $fontfamily == 'Commissioner' || $fontfamily == 'Capriola' || $fontfamily == 'Rubik' || $fontfamily == 'Muli' || $fontfamily == 'Acme' || $fontfamily == 'Secular One' || $fontfamily == 'Raleway' || $fontfamily == 'Ubuntu' || $fontfamily == 'Nunito Sans') { echo "sans-serif";  } elseif ($fontfamily == 'Courier Prime') { echo "monospace"; } else { echo "cursive"; } ?> !important;
	border: 1px solid #<?php echo "$tbb"; ?>;
	background-color: #<?php echo "$tbbg"; ?>;
	float: left;
}

.textbox {
	padding: 4px 12px 4px 4px;
	font-size: 16px;
	height: 29px;
	width: 256px;
	font-family: '<?php echo "$fontfamily"; ?>', <?php if ($fontfamily == 'Open Sans' || $fontfamily == 'Aldrich' || $fontfamily == 'Commissioner' || $fontfamily == 'Capriola' || $fontfamily == 'Rubik' || $fontfamily == 'Muli' || $fontfamily == 'Acme' || $fontfamily == 'Secular One' || $fontfamily == 'Raleway' || $fontfamily == 'Ubuntu' || $fontfamily == 'Nunito Sans') { echo "sans-serif";  } elseif ($fontfamily == 'Courier Prime') { echo "monospace"; } else { echo "cursive"; } ?> !important;
	border: 1px solid #<?php echo "$tbb"; ?>;
	background-color: #<?php echo "$tbbg"; ?>;
	margin-left: 3px;
}

.textbox2 {
	padding: 4px 4px 4px 4px;
	font-size: 16px;
	height: 29px;
	width: 202px;
	font-family: '<?php echo "$fontfamily"; ?>', <?php if ($fontfamily == 'Open Sans' || $fontfamily == 'Aldrich' || $fontfamily == 'Commissioner' || $fontfamily == 'Capriola' || $fontfamily == 'Rubik' || $fontfamily == 'Muli' || $fontfamily == 'Acme' || $fontfamily == 'Secular One' || $fontfamily == 'Raleway' || $fontfamily == 'Ubuntu' || $fontfamily == 'Nunito Sans') { echo "sans-serif";  } elseif ($fontfamily == 'Courier Prime') { echo "monospace"; } else { echo "cursive"; } ?> !important;
	border: 1px solid #<?php echo "$tbb"; ?>;
	background-color: #<?php echo "$tbbg"; ?>;
}

.textbox3 {
	padding: 4px 4px 4px 4px;
	font-size: 16px;
	height: 29px;
	width: 246px;
	font-family: '<?php echo "$fontfamily"; ?>', <?php if ($fontfamily == 'Open Sans' || $fontfamily == 'Aldrich' || $fontfamily == 'Commissioner' || $fontfamily == 'Capriola' || $fontfamily == 'Rubik' || $fontfamily == 'Muli' || $fontfamily == 'Acme' || $fontfamily == 'Secular One' || $fontfamily == 'Raleway' || $fontfamily == 'Ubuntu' || $fontfamily == 'Nunito Sans') { echo "sans-serif";  } elseif ($fontfamily == 'Courier Prime') { echo "monospace"; } else { echo "cursive"; } ?> !important;
	border: 1px solid #<?php echo "$tbb"; ?>;
	background-color: #<?php echo "$tbbg"; ?>;
}

.systemtextbox {
	padding: 4px 4px 4px 4px;
	border: 1px solid #<?php echo "$tbb"; ?>;
	font-size: 16px;
	height: 25px;
	width: 50px;
	background-color: #<?php echo "$tbbg"; ?>;
	font-family: '<?php echo "$fontfamily"; ?>', <?php if ($fontfamily == 'Open Sans' || $fontfamily == 'Aldrich' || $fontfamily == 'Commissioner' || $fontfamily == 'Capriola' || $fontfamily == 'Rubik' || $fontfamily == 'Muli' || $fontfamily == 'Acme' || $fontfamily == 'Secular One' || $fontfamily == 'Raleway' || $fontfamily == 'Ubuntu' || $fontfamily == 'Nunito Sans') { echo "sans-serif";  } elseif ($fontfamily == 'Courier Prime') { echo "monospace"; } else { echo "cursive"; } ?> !important;
}

.upbox {
	border: 1px solid #<?php echo "$tbb"; ?>;
	width: 250px;
	height: 30px;
	padding: 6px 2px 1px 2px;
	margin: 0 0 0 0;
	background-color: #<?php echo "$tbbg"; ?>;
	font-family: '<?php echo "$fontfamily"; ?>', <?php if ($fontfamily == 'Open Sans' || $fontfamily == 'Aldrich' || $fontfamily == 'Commissioner' || $fontfamily == 'Capriola' || $fontfamily == 'Rubik' || $fontfamily == 'Muli' || $fontfamily == 'Acme' || $fontfamily == 'Secular One' || $fontfamily == 'Raleway' || $fontfamily == 'Ubuntu' || $fontfamily == 'Nunito Sans') { echo "sans-serif";  } elseif ($fontfamily == 'Courier Prime') { echo "monospace"; } else { echo "cursive"; } ?> !important;
	float: left;
	margin-left: 3px;
}

.wupbox {
	border: 1px solid #<?php echo "$tbb"; ?>;
	width: 270px;
	height: 30px;
	padding: 6px 2px 1px 2px;
	margin: 0 0 0 0;
	background-color: #<?php echo "$tbbg"; ?>;
	font-family: '<?php echo "$fontfamily"; ?>', <?php if ($fontfamily == 'Open Sans' || $fontfamily == 'Aldrich' || $fontfamily == 'Commissioner' || $fontfamily == 'Capriola' || $fontfamily == 'Rubik' || $fontfamily == 'Muli' || $fontfamily == 'Acme' || $fontfamily == 'Secular One' || $fontfamily == 'Raleway' || $fontfamily == 'Ubuntu' || $fontfamily == 'Nunito Sans') { echo "sans-serif";  } elseif ($fontfamily == 'Courier Prime') { echo "monospace"; } else { echo "cursive"; } ?> !important;
	float: left;
	margin-left: 3px;
}

.boxhead {
	font-size: 20px;
	padding-left: 3px;
}

.gupdatebutton {
	background-color: #<?php echo "$buttons"; ?>;
	border: 1px solid #<?php echo "$buttons"; ?>;
	height: 39px;
	padding: 4px 0 4px 0;
	color: #<?php echo "$btc"; ?>;
	font-size: 16px;
	margin: -3px 0 0 10px;
	border-radius: 0 3px 3px 0;
	width: 110px;
	font-family: '<?php echo "$fontfamily"; ?>', <?php if ($fontfamily == 'Open Sans' || $fontfamily == 'Aldrich' || $fontfamily == 'Commissioner' || $fontfamily == 'Capriola' || $fontfamily == 'Rubik' || $fontfamily == 'Muli' || $fontfamily == 'Acme' || $fontfamily == 'Secular One' || $fontfamily == 'Raleway' || $fontfamily == 'Ubuntu' || $fontfamily == 'Nunito Sans') { echo "sans-serif";  } elseif ($fontfamily == 'Courier Prime') { echo "monospace"; } else { echo "cursive"; } ?> !important;
}	

.cookiebutton {
	background-color: #<?php echo "$buttons"; ?>;
	border: 1px solid #<?php echo "$buttons"; ?>;
	height: 100px;
	padding: 4px 0 4px 0;
	color: #<?php echo "$btc"; ?>;
	font-size: 48px;
	margin-left: -10px;
	border-radius: 0 3px 3px 0;
	width: 350px;
	font-family: '<?php echo "$fontfamily"; ?>', <?php if ($fontfamily == 'Open Sans' || $fontfamily == 'Aldrich' || $fontfamily == 'Commissioner' || $fontfamily == 'Capriola' || $fontfamily == 'Rubik' || $fontfamily == 'Muli' || $fontfamily == 'Acme' || $fontfamily == 'Secular One' || $fontfamily == 'Raleway' || $fontfamily == 'Ubuntu' || $fontfamily == 'Nunito Sans') { echo "sans-serif";  } elseif ($fontfamily == 'Courier Prime') { echo "monospace"; } else { echo "cursive"; } ?> !important;

}

.updatebuttonright {
	background-color: #<?php echo "$buttons"; ?>;
	border: 1px solid #<?php echo "$buttons"; ?>;
	height: 39px;
	padding: 4px 0 4px 0;
	color: #<?php echo "$btc"; ?>;
	font-size: 16px;
	margin-left: -10px;
	border-radius: 0 3px 3px 0;
	width: 107px;
	float: right;
	font-family: '<?php echo "$fontfamily"; ?>', <?php if ($fontfamily == 'Open Sans' || $fontfamily == 'Aldrich' || $fontfamily == 'Commissioner' || $fontfamily == 'Capriola' || $fontfamily == 'Rubik' || $fontfamily == 'Muli' || $fontfamily == 'Acme' || $fontfamily == 'Secular One' || $fontfamily == 'Raleway' || $fontfamily == 'Ubuntu' || $fontfamily == 'Nunito Sans') { echo "sans-serif";  } elseif ($fontfamily == 'Courier Prime') { echo "monospace"; } else { echo "cursive"; } ?> !important;
}


.updatebutton {
	background-color: #<?php echo "$buttons"; ?>;
	border: 1px solid #<?php echo "$buttons"; ?>;
	height: 39px;
	padding: 4px 0 4px 0;
	color: #<?php echo "$btc"; ?>;
	font-size: 16px;
	margin-left: -6px;
	border-radius: 0 3px 3px 0;
	width: 107px;
	font-family: '<?php echo "$fontfamily"; ?>', <?php if ($fontfamily == 'Open Sans' || $fontfamily == 'Aldrich' || $fontfamily == 'Commissioner' || $fontfamily == 'Capriola' || $fontfamily == 'Rubik' || $fontfamily == 'Muli' || $fontfamily == 'Acme' || $fontfamily == 'Secular One' || $fontfamily == 'Raleway' || $fontfamily == 'Ubuntu' || $fontfamily == 'Nunito Sans') { echo "sans-serif";  } elseif ($fontfamily == 'Courier Prime') { echo "monospace"; } else { echo "cursive"; } ?> !important;
}	

.updatebutton2 {
	background-color: #<?php echo "$buttons"; ?>;
	border: 1px solid #<?php echo "$buttons"; ?>;
	height: 39px;
	padding: 4px 0 4px 0;
	color: #<?php echo "$btc"; ?>;
	font-size: 16px;
	margin-left: -10px;
	border-radius: 0 3px 3px 0;
	width: 110px;
	font-family: '<?php echo "$fontfamily"; ?>', <?php if ($fontfamily == 'Open Sans' || $fontfamily == 'Aldrich' || $fontfamily == 'Commissioner' || $fontfamily == 'Capriola' || $fontfamily == 'Rubik' || $fontfamily == 'Muli' || $fontfamily == 'Acme' || $fontfamily == 'Secular One' || $fontfamily == 'Raleway' || $fontfamily == 'Ubuntu' || $fontfamily == 'Nunito Sans') { echo "sans-serif";  } elseif ($fontfamily == 'Courier Prime') { echo "monospace"; } else { echo "cursive"; } ?> !important;
}	

.subcombutton {
	background-color: #<?php echo "$buttons"; ?>;
	border: 1px solid #<?php echo "$buttons"; ?>;
	height: 77px;
	width: 246px;
	margin-top: 6px;
	padding: 4px 0 4px 0;
	color: #<?php echo "$btc"; ?>;
	font-size: 16px;
	border-radius: 0 3px 3px 0;
	font-family: '<?php echo "$fontfamily"; ?>', <?php if ($fontfamily == 'Open Sans' || $fontfamily == 'Aldrich' || $fontfamily == 'Commissioner' || $fontfamily == 'Capriola' || $fontfamily == 'Rubik' || $fontfamily == 'Muli' || $fontfamily == 'Acme' || $fontfamily == 'Secular One' || $fontfamily == 'Raleway' || $fontfamily == 'Ubuntu' || $fontfamily == 'Nunito Sans') { echo "sans-serif";  } elseif ($fontfamily == 'Courier Prime') { echo "monospace"; } else { echo "cursive"; } ?> !important;
}	

.subcombuttonnorc {
	background-color: #<?php echo "$buttons"; ?>;
	border: 1px solid #<?php echo "$buttons"; ?>;
	height: 77px;
	width: 553px;
	margin-top: 6px;
	padding: 4px 0 4px 0;
	margin-left: 2px;
	color: #<?php echo "$btc"; ?>;
	font-size: 16px;
	border-radius: 0 3px 3px 0;
	font-family: '<?php echo "$fontfamily"; ?>', <?php if ($fontfamily == 'Open Sans' || $fontfamily == 'Aldrich' || $fontfamily == 'Commissioner' || $fontfamily == 'Capriola' || $fontfamily == 'Rubik' || $fontfamily == 'Muli' || $fontfamily == 'Acme' || $fontfamily == 'Secular One' || $fontfamily == 'Raleway' || $fontfamily == 'Ubuntu' || $fontfamily == 'Nunito Sans') { echo "sans-serif";  } elseif ($fontfamily == 'Courier Prime') { echo "monospace"; } else { echo "cursive"; } ?> !important;
}

.subdesc {
	background-color: #<?php echo "$buttons"; ?>;
	border: 1px solid #<?php echo "$buttons"; ?>;
	height: 50px;
	width: 549px;
	margin-top: 6px;
	padding: 4px 5px 4px 0;
	color: #<?php echo "$btc"; ?>;
	font-size: 16px;
	border-radius: 0 3px 3px 0;
	font-family: '<?php echo "$fontfamily"; ?>', <?php if ($fontfamily == 'Open Sans' || $fontfamily == 'Aldrich' || $fontfamily == 'Commissioner' || $fontfamily == 'Capriola' || $fontfamily == 'Rubik' || $fontfamily == 'Muli' || $fontfamily == 'Acme' || $fontfamily == 'Secular One' || $fontfamily == 'Raleway' || $fontfamily == 'Ubuntu' || $fontfamily == 'Nunito Sans') { echo "sans-serif";  } elseif ($fontfamily == 'Courier Prime') { echo "monospace"; } else { echo "cursive"; } ?> !important;
}


.delprofilepic {
	background-color: #<?php echo "$buttons"; ?>;
	border: 1px solid #<?php echo "$buttons"; ?>;
	height: 39px;
	margin-top: 10px;
	padding: 4px 0 4px 0;
	color: #<?php echo "$btc"; ?>;
	font-size: 16px;
	border-radius: 0 3px 3px 0;
	width: 107px;
	font-family: '<?php echo "$fontfamily"; ?>', <?php if ($fontfamily == 'Open Sans' || $fontfamily == 'Aldrich' || $fontfamily == 'Commissioner' || $fontfamily == 'Capriola' || $fontfamily == 'Rubik' || $fontfamily == 'Muli' || $fontfamily == 'Acme' || $fontfamily == 'Secular One' || $fontfamily == 'Raleway' || $fontfamily == 'Ubuntu' || $fontfamily == 'Nunito Sans') { echo "sans-serif";  } elseif ($fontfamily == 'Courier Prime') { echo "monospace"; } else { echo "cursive"; } ?> !important;
}

.sendemailbutton {
	background-color: #<?php echo "$buttons"; ?>;
	border: 1px solid #<?php echo "$buttons"; ?>;
	height: 39px;
	padding: 4px 0 4px 0;
	color: #<?php echo "$btc"; ?>;
	font-size: 16px;
	border-radius: 0 3px 3px 0;
	width: 107px;
	font-family: '<?php echo "$fontfamily"; ?>', <?php if ($fontfamily == 'Open Sans' || $fontfamily == 'Aldrich' || $fontfamily == 'Commissioner' || $fontfamily == 'Capriola' || $fontfamily == 'Rubik' || $fontfamily == 'Muli' || $fontfamily == 'Acme' || $fontfamily == 'Secular One' || $fontfamily == 'Raleway' || $fontfamily == 'Ubuntu' || $fontfamily == 'Nunito Sans') { echo "sans-serif";  } elseif ($fontfamily == 'Courier Prime') { echo "monospace"; } else { echo "cursive"; } ?> !important;
}	


.createbutton {
	background-color: #<?php echo "$buttons"; ?>;
	border: 1px solid #<?php echo "$buttons"; ?>;
	height: 39px;
	padding: 4px 0 4px 0;
	color: #<?php echo "$btc"; ?>;
	font-size: 16px;
	border-radius: 0 3px 3px 0;
	width: 107px;
	font-family: '<?php echo "$fontfamily"; ?>', <?php if ($fontfamily == 'Open Sans' || $fontfamily == 'Aldrich' || $fontfamily == 'Commissioner' || $fontfamily == 'Capriola' || $fontfamily == 'Rubik' || $fontfamily == 'Muli' || $fontfamily == 'Acme' || $fontfamily == 'Secular One' || $fontfamily == 'Raleway' || $fontfamily == 'Ubuntu' || $fontfamily == 'Nunito Sans') { echo "sans-serif";  } elseif ($fontfamily == 'Courier Prime') { echo "monospace"; } else { echo "cursive"; } ?> !important;
}	

.uploadbutton {
	background-color: #<?php echo "$buttons"; ?>;
	border: 1px solid #<?php echo "$buttons"; ?>;
	height: 39px;
	padding: 2px 10px 2px 10px;
	color: #<?php echo "$btc"; ?>;
	font-size: 16px;
	margin-left: -10px;
	border-radius: 0 3px 3px 0;
	width: 107px;
	font-family: '<?php echo "$fontfamily"; ?>', <?php if ($fontfamily == 'Open Sans' || $fontfamily == 'Aldrich' || $fontfamily == 'Commissioner' || $fontfamily == 'Capriola' || $fontfamily == 'Rubik' || $fontfamily == 'Muli' || $fontfamily == 'Acme' || $fontfamily == 'Secular One' || $fontfamily == 'Raleway' || $fontfamily == 'Ubuntu' || $fontfamily == 'Nunito Sans') { echo "sans-serif";  } elseif ($fontfamily == 'Courier Prime') { echo "monospace"; } else { echo "cursive"; } ?> !important;
	float: left
}

.uploadbutton2 {
	background-color: #<?php echo "$buttons"; ?>;
	border: 1px solid #<?php echo "$buttons"; ?>;
	height: 39px;
	padding: 2px 10px 2px 10px;
	color: #<?php echo "$btc"; ?>;
	font-size: 16px;
	margin-left: -10px;
	border-radius: 0 3px 3px 0;
	width: 110px;
	font-family: '<?php echo "$fontfamily"; ?>', <?php if ($fontfamily == 'Open Sans' || $fontfamily == 'Aldrich' || $fontfamily == 'Commissioner' || $fontfamily == 'Capriola' || $fontfamily == 'Rubik' || $fontfamily == 'Muli' || $fontfamily == 'Acme' || $fontfamily == 'Secular One' || $fontfamily == 'Raleway' || $fontfamily == 'Ubuntu' || $fontfamily == 'Nunito Sans') { echo "sans-serif";  } elseif ($fontfamily == 'Courier Prime') { echo "monospace"; } else { echo "cursive"; } ?> !important;
	float: left
}

.uploadthemebutton {
	background-color: #<?php echo "$buttons"; ?>;
	border: 1px solid #<?php echo "$buttons"; ?>;
	height: 39px;
	padding: 2px 10px 2px 10px;
	color: #<?php echo "$btc"; ?>;
	font-size: 16px;
	margin-left: -10px;
	border-radius: 3px 3px 3px 3px;
	width: 107px;
	font-family: '<?php echo "$fontfamily"; ?>', <?php if ($fontfamily == 'Open Sans' || $fontfamily == 'Aldrich' || $fontfamily == 'Commissioner' || $fontfamily == 'Capriola' || $fontfamily == 'Rubik' || $fontfamily == 'Muli' || $fontfamily == 'Acme' || $fontfamily == 'Secular One' || $fontfamily == 'Raleway' || $fontfamily == 'Ubuntu' || $fontfamily == 'Nunito Sans') { echo "sans-serif";  } elseif ($fontfamily == 'Courier Prime') { echo "monospace"; } else { echo "cursive"; } ?> !important;
	float: right	
}

.themebutton {
	background-color: #<?php echo "$buttons"; ?>;
	border: 1px solid #<?php echo "$buttons"; ?>;
	height: 35px;
	padding: 4px 0 4px 0;
	color: #<?php echo "$btc"; ?>;
	font-size: 16px;
	margin: 22px 147px 0 0px;
	border-radius: 3px 3px 3px 3px;
	width: 107px;
	float: right;
	text-align: center;
	font-family: '<?php echo "$fontfamily"; ?>', <?php if ($fontfamily == 'Open Sans' || $fontfamily == 'Aldrich' || $fontfamily == 'Commissioner' || $fontfamily == 'Capriola' || $fontfamily == 'Rubik' || $fontfamily == 'Muli' || $fontfamily == 'Acme' || $fontfamily == 'Secular One' || $fontfamily == 'Raleway' || $fontfamily == 'Ubuntu' || $fontfamily == 'Nunito Sans') { echo "sans-serif";  } elseif ($fontfamily == 'Courier Prime') { echo "monospace"; } else { echo "cursive"; } ?> !important;
}

.themebutton2 {
	background-color: #<?php echo "$buttons"; ?>;
	border: 1px solid #<?php echo "$buttons"; ?>;
	height: 39px;
	padding: 4px 0 4px 0;
	color: #<?php echo "$btc"; ?>;
	font-size: 16px;
	border-radius: 3px 3px 3px 3px;
	width: 107px;
	float: right;
	text-align: center;
	font-family: '<?php echo "$fontfamily"; ?>', <?php if ($fontfamily == 'Open Sans' || $fontfamily == 'Aldrich' || $fontfamily == 'Commissioner' || $fontfamily == 'Capriola' || $fontfamily == 'Rubik' || $fontfamily == 'Muli' || $fontfamily == 'Acme' || $fontfamily == 'Secular One' || $fontfamily == 'Raleway' || $fontfamily == 'Ubuntu' || $fontfamily == 'Nunito Sans') { echo "sans-serif";  } elseif ($fontfamily == 'Courier Prime') { echo "monospace"; } else { echo "cursive"; } ?> !important;
}


.language {
	width: 269px;
	height: 39px;
	font-size: 16px;
	border: 1px solid #<?php echo "$tbb"; ?>;
	padding: 1px 8px 1px 4px;
	margin: 0 5px 0 0;
	background-color: #<?php echo "$tbbg"; ?>;
	font-family: '<?php echo "$fontfamily"; ?>', <?php if ($fontfamily == 'Open Sans' || $fontfamily == 'Aldrich' || $fontfamily == 'Commissioner' || $fontfamily == 'Capriola' || $fontfamily == 'Rubik' || $fontfamily == 'Muli' || $fontfamily == 'Acme' || $fontfamily == 'Secular One' || $fontfamily == 'Raleway' || $fontfamily == 'Ubuntu' || $fontfamily == 'Nunito Sans') { echo "sans-serif";  } elseif ($fontfamily == 'Courier Prime') { echo "monospace"; } else { echo "cursive"; } ?> !important;
	margin-left: 3px;
}

.chooseuser {
float: right;
	width: 276px;
	height: 39px;
	font-size: 16px;
	border: 1px solid #<?php echo "$tbb"; ?>;
	padding: 1px 8px 1px 4px;
	margin: 0 1px 0 0;
	background-color: #<?php echo "$tbbg"; ?>;
	font-family: '<?php echo "$fontfamily"; ?>', <?php if ($fontfamily == 'Open Sans' || $fontfamily == 'Aldrich' || $fontfamily == 'Commissioner' || $fontfamily == 'Capriola' || $fontfamily == 'Rubik' || $fontfamily == 'Muli' || $fontfamily == 'Acme' || $fontfamily == 'Secular One' || $fontfamily == 'Raleway' || $fontfamily == 'Ubuntu' || $fontfamily == 'Nunito Sans') { echo "sans-serif";  } elseif ($fontfamily == 'Courier Prime') { echo "monospace"; } else { echo "cursive"; } ?> !important;
}

.comments {
	width: 269px;
	height: 39px;
	font-size: 16px;
	border: 1px solid #<?php echo "$tbb"; ?>;
	padding: 1px 8px 1px 4px;
	margin: 0 5px 0 0;
	background-color: #<?php echo "$tbbg"; ?>;
	font-family: '<?php echo "$fontfamily"; ?>', <?php if ($fontfamily == 'Open Sans' || $fontfamily == 'Aldrich' || $fontfamily == 'Commissioner' || $fontfamily == 'Capriola' || $fontfamily == 'Rubik' || $fontfamily == 'Muli' || $fontfamily == 'Acme' || $fontfamily == 'Secular One' || $fontfamily == 'Raleway' || $fontfamily == 'Ubuntu' || $fontfamily == 'Nunito Sans') { echo "sans-serif";  } elseif ($fontfamily == 'Courier Prime') { echo "monospace"; } else { echo "cursive"; } ?> !important;
	margin-left: 3px;
}

.encf {
	width: 257px;
	height: 39px;
	font-size: 16px;
	border: 1px solid #<?php echo "$tbb"; ?>;
	padding: 1px 8px 1px 4px;
	margin: 0 5px 0 0;
	background-color: #<?php echo "$tbbg"; ?>;
	font-family: '<?php echo "$fontfamily"; ?>', <?php if ($fontfamily == 'Open Sans' || $fontfamily == 'Aldrich' || $fontfamily == 'Commissioner' || $fontfamily == 'Capriola' || $fontfamily == 'Rubik' || $fontfamily == 'Muli' || $fontfamily == 'Acme' || $fontfamily == 'Secular One' || $fontfamily == 'Raleway' || $fontfamily == 'Ubuntu' || $fontfamily == 'Nunito Sans') { echo "sans-serif";  } elseif ($fontfamily == 'Courier Prime') { echo "monospace"; } else { echo "cursive"; } ?> !important;
}

.display {
	width: 269px;
	height: 39px;
	font-size: 16px;
	border: 1px solid #<?php echo "$tbb"; ?>;
	padding: 1px 8px 1px 4px;
	margin: 0 5px 0 0;
	background-color: #<?php echo "$tbbg"; ?>;
	font-family: '<?php echo "$fontfamily"; ?>', <?php if ($fontfamily == 'Open Sans' || $fontfamily == 'Aldrich' || $fontfamily == 'Commissioner' || $fontfamily == 'Capriola' || $fontfamily == 'Rubik' || $fontfamily == 'Muli' || $fontfamily == 'Acme' || $fontfamily == 'Secular One' || $fontfamily == 'Raleway' || $fontfamily == 'Ubuntu' || $fontfamily == 'Nunito Sans') { echo "sans-serif";  } elseif ($fontfamily == 'Courier Prime') { echo "monospace"; } else { echo "cursive"; } ?> !important;
	margin-left: 3px;
}

.success {
	background-color: #<?php echo "$sfbg"; ?>;
	border: 1px dashed #<?php echo "$sfb"; ?>;
	padding: 8px 8px 8px 8px;
}

.failure {
	background-color: #<?php echo "$sfbg"; ?>;
	border: 1px dashed #<?php echo "$sfb"; ?>;
	padding: 8px 8px 8px 8px;
}

.checkmark {
	margin-bottom: -5px;		
}

.exifinfo {
	margin: 0 0 0 0;
}

.failureimg {
	margin-bottom: -5px;
	width:22px;
	height:22px;
}

.delete {
	margin-bottom: -3px;
}


.divider {
	border: 0;
	background-color: #<?php echo "$divider"; ?>;
	height: 2px;
	width: 980px;	
	overflow: hidden;
	margin-top: 1px;
	margin-bottom: -5px;
}


.themetitles {
	font-weight: bold;
	font-size: 26px;
}

.showthemename {
	font-weight: bold;
	font-size: 26px;
}
.section {
	font-size: 20px;
}

.yourphoto {
	width: 100%;
	text-align: center;
}

.name {
	padding-left: 3px;
}

.yourphotoadmin {
	width: 45%;
	text-align: center;
	float: left;
	padding-left: 35px;
}

.yourphotodescription {
	width: 555px;
	float: left;
	padding: 0 0 0 20px;
}

.nothing {
	width: 100%;
	text-align: center;
}

.youralbums {
	width: 100%;
	overflow: hidden;
	padding-left: 5px;
}

.orootalbum {
	float: left;
	background-color: #<?php echo "$fbc"; ?>;
	margin: 18px 21px 18px 21px;

}

.rootalbum {
	border: 1px solid #<?php echo "$iab"; ?>;
	padding: 10px 2px 10px 2px;
	font-size: 14px;
	height: 157px;
	width: 295px;
	border-radius: 3px;
	background-color: #<?php echo "$abc"; ?>;
	position: relative;	

}

.photograph {
	max-height:157px;
	max-width: 279px;
	width:  auto;
	height: auto;
	position: absolute;
	top: 0;
	bottom: 0;
	left: 0;
	right: 0;
	margin: auto;
}

.photopage {
	max-width: 1150px;
}

.photopageadmin {
	max-width: 527px;
	max-height: 296px;
}


.fieldset {
	width: 300px;
	border:1px solid #<?php echo "$borders"; ?>;
	background-color: #<?php echo "$ibc"; ?>;
	padding: 8px 19px 19px 19px;
	font-size: 16px;
	border-radius: 3px;
}

.adfieldset {
	width: 300px;
	border:1px solid #<?php echo "$borders"; ?>;
	background-color: #<?php echo "$ibc"; ?>;
	padding: 7px 19px 19px 19px;
	font-size: 16px;
	border-radius: 3px;
}

.albumcover {
	max-height:100%;
	max-width: 100%;
	width:  auto;
	height: auto;
	position: absolute;
	left: 0;
	right: 0;
	margin: auto;
}

.menugraphic {
	float: right;	
}

.sub {
	font-size: 14px;
}

.more {
	padding: 0 0 2px;
	bottom: 0;
	position: absolute;
	width: 100%;
	margin-left: -0px;
	text-align: center;
	font-size: 14px;
}

.more a {
	color: #<?php echo "$afc"; ?>;
}

.subalbums {
	text-decoration: none;
}

.deletebutton {
	width: 25px;
	height: 25px;
	background-color: #<?php echo "$abc"; ?>;
	background-image: url('images/system/delete.png');
	background-repeat: no-repeat;
	border: 1px solid #<?php echo "$borders"; ?>;
	margin: 0 5px 0 0;
}

.upbutton {
	width: 25px;
	height: 25px;
	background-color: #<?php echo "$abc"; ?>;
	background-image: url('images/system/up.png');
	background-repeat: no-repeat;
	border: 1px solid #<?php echo "$borders"; ?>;
	margin: 0 5px 0 0;
}

.upbuttongrey {
	width: 23px;
	height: 23px;
	background-color: #<?php echo "$abc"; ?>;
	background-image: url('images/system/upgrey.png');
	background-repeat: no-repeat;
	border: 1px solid #<?php echo "$borders"; ?>;
	margin: 0 5px 0 0;
	float: left;
}

.downbutton {
	width: 25px;
	height: 25px;
	background-color: #<?php echo "$abc"; ?>;
	background-image: url('images/system/down.png');
	background-repeat: no-repeat;
	border: 1px solid #<?php echo "$borders"; ?>;
	margin: 0 5px 0 0;
}

.downbuttongrey {
	width: 23px;
	height: 23px;
	background-color: #<?php echo "$abc"; ?>;
	background-image: url('images/system/downgrey.png');
	background-repeat: no-repeat;
	border: 1px solid #<?php echo "$borders"; ?>;
	margin: 0 3px 0 0;
	float: left;
}

.pubbutton {
	width: 25px;
	height: 25px;
	background-color: #<?php echo "$abc"; ?>;
	background-image: url('images/system/public.png');
	background-repeat: no-repeat;
	border: 1px solid #<?php echo "$borders"; ?>;
	margin: 0 5px 0 0;
}

.pributton {
	width: 25px;
	height: 25px;
	background-color: #<?php echo "$abc"; ?>;
	background-image: url('images/system/private.png');
	background-repeat: no-repeat;
	border: 1px solid #<?php echo "$borders"; ?>;
	margin: 0 5px 0 0;
}

.resetthemebutton {
	width: 25px;
	height: 25px;
	background-color: #<?php echo "$abc"; ?>;
	background-image: url('images/system/reset.png');
	background-repeat: no-repeat;
	border: 1px solid #<?php echo "$borders"; ?>;
	margin: 0 5px 0 0;
	float: right;
}

.form {
	float: left;
}

.forgot {
	font-size: 14px;
	text-align: center;
}

.addstuff {
	width: 400px;
	float: left;
	overflow: hidden;
	height: 90px;
}


.waddstuff {
	width: 400px;
	float: left;
	padding-left: 10px;
}


.wiaddstuff {
	float: left;
	margin: -90px 0 50px 10px;
	border: 3px dashed #<?php echo "$borders"; ?>; 
	border-radius: 3px;
	text-align: center;
	height: 370px;
	width: 370px;
}

.holdwatermark {
	text-align: center; 
	display: table-cell; 
	vertical-align: middle;
	width: 370px;
	height: 370px;
	padding: 2px 0 0 0;
}

.watermarkimage {
	max-height: 350px;
	max-width: 350px;
	width:  auto;
	height: auto;
}

.watermarknotes {
	width: 650px;
	float: left;
	padding: 5px 0 0 0;
	margin: 0 0 45px 0;
}

.cwi {
	text-align: right;
	font-size: 14px;
	padding: 0 65px 90px 0;
}

.gaddstuff {
	width: 650px;
	float: left;
	overflow: hidden;
}

.aswrapper {
	width: 100%;
	overflow: hidden;
	color: #<?php echo "$fontcolor"; ?>;
}

.iaswrapper {
	overflow: hidden;
	width: 1100px;
	float: right;
	padding-left: 3px;
	color: #<?php echo "$fontcolor"; ?>;
}

.emptyspace {
	float: left;
	width: 260px;
}

.gwrapper {
	width: 100%;
	height: 81px;
}

.thephotoinfo {
	width: 1127px;
	margin-left: 10px;
}

.thephotocomments {
	width: 1127px;
	margin-left: 10px;
}


.column1 {
	width: 370px;
	float: left;
	font-size: 16px;
	height: 50px;
}

.column2 {
	width: 370px;
	float: left;
	font-size: 16px;
	height: 100px;
}

.pfs {
	width: 1116px;
	font-size: 20px;
	border:1px solid #<?php echo "$borders"; ?>;
	padding: 25px 15px 17px 15px;
}

.cfs {
	width: 1116px;
	font-size: 20px;
	border:1px solid #<?php echo "$borders"; ?>;
}

.acfs {
	width: 1000px;
	font-size: 20px;
	border:1px solid #<?php echo "$borders"; ?>;
}

.twrapper {
	width: 1007px;
	margin: 0 auto;
	overflow: hidden;
}

.seltheme {
	width: 417px;
	float: left;
	margin: 8px 20px 0 0;	

}

.seltheme2 {
	width: 470px;
	float: left;
	margin: 0 20px 0 0;	
}

.seltheme3 {
	width: 417px;
	float: left;
	margin: 22px 20px 0 0;	

}

.seltheme4 {
	width: 470px;
	float: left;
	margin: 16px 20px 0 0;	
}



.itemtitle {
	width: 300px;
	float: left;
	font-size: 20px;
	font-weight: bold;
	border-bottom: 1px solid #<?php echo "$borders"; ?>;
	margin: 0 20px 15px 0;
}

.defaulttitle {
	width: 300px;
	float: left;
	font-size: 20px;
	font-weight: bold;
	border-bottom: 1px solid #<?php echo "$borders"; ?>;
	margin: 0 20px 15px 0;
}

.currenttitle {
	width: 300px;
	float: left;
	font-size: 20px;
	font-weight: bold;
	border-bottom: 1px solid #<?php echo "$borders"; ?>;
	margin: 0 0 15px 0;
}

.fontitem {
	margin: 15px 20px 15px 0;
	width: 300px;
	float: left;
	height: 40px;
}

.fontdefault {
	margin: 15px 20px 15px 0;
	width: 300px;
	float: left;
	height: 40px;
}

.fontcurrent {
	margin: 15px 20px 15px 0;
	width: 300px;
	float: left;
	height: 40px;
}

.item {
	width: 300px;
	float: left;
	margin: 24px 20px 17px 0;
	height: 40px;
}

.default {
	width: 300px;
	float: left;
	margin: 24px 20px 17px 0;
	height: 40px;
}

.current {
	width: 300px;
	float: left;
	margin: 10px 0 12px 0;
	height: 40px;
	padding: 8px 0 12px 0;
}

.fontfamily {    
	width: 267px;
	height: 39px;
	font-size: 16px;
	border: 1px solid #<?php echo "$tbb"; ?>;
	background-color: #<?php echo "$tbbg"; ?>;
	padding: 3px 8px 3px 4px;
	font-family: '<?php echo "$fontfamily"; ?>', <?php if ($fontfamily == 'Open Sans' || $fontfamily == 'Aldrich' || $fontfamily == 'Commissioner' || $fontfamily == 'Capriola' || $fontfamily == 'Rubik' || $fontfamily == 'Muli' || $fontfamily == 'Acme' || $fontfamily == 'Secular One' || $fontfamily == 'Raleway' || $fontfamily == 'Ubuntu' || $fontfamily == 'Nunito Sans') { echo "sans-serif";  } elseif ($fontfamily == 'Courier Prime') { echo "monospace"; } else { echo "cursive"; } ?> !important;
	margin: -9px 0 0 0;
}

.todd {    
	width: 256px;
	height: 39px;
	font-size: 16px;
	border: 1px solid #<?php echo "$tbb"; ?>;
	background-color: #<?php echo "$tbbg"; ?>;
	padding: 3px 8px 3px 4px;
	font-family: '<?php echo "$fontfamily"; ?>', <?php if ($fontfamily == 'Open Sans' || $fontfamily == 'Aldrich' || $fontfamily == 'Commissioner' || $fontfamily == 'Capriola' || $fontfamily == 'Rubik' || $fontfamily == 'Muli' || $fontfamily == 'Acme' || $fontfamily == 'Secular One' || $fontfamily == 'Raleway' || $fontfamily == 'Ubuntu' || $fontfamily == 'Nunito Sans') { echo "sans-serif";  } elseif ($fontfamily == 'Courier Prime') { echo "monospace"; } else { echo "cursive"; } ?> !important;
}

.back {
	margin: 0 0 -2px 0;
	float: left;
	padding: 4px 4px 0 0;
}

a.popup:target + div.popup { 
	display: block; 
}


a.popup {
	margin: -15px -500px 0 0;
	display: none;
	z-index: 1000; 
}

.popup {
	display: none;
	height: 128px; 
	position: absolute;
	margin: -7px 0 0 775px;
	width: 410px;
	background-color: #<?php echo "$ibc"; ?>;
}

a.mpopup:target + div.mpopup { 
	display: block; 
}


a.mpopup {
	margin: -15px -500px 0 0;
	display: none;
	z-index: 1000; 
}

.mpopup {
	display: none;
	height: 130px; 
	position: absolute;
	margin: -13px 0 0 743px;
	width: 450px;
	background-color: #<?php echo "$ibc"; ?>;
}

.welmem {
	float: right;
}

.welcome {
	float: right;
}

.double {
	margin: -10px;
}

.double2 {
	margin: -10px 1px -10px 0;
}

.loginbutton {
	background-color: #<?php echo "$buttons"; ?>;
	border: 1px solid #<?php echo "$buttons"; ?>;
	height: 34px;
	color: #<?php echo "$btc"; ?>;
	font-size: 16px;
	border-radius: 3px 3px 3px 3px;
	width: 150px;
	font-family: '<?php echo "$fontfamily"; ?>', <?php if ($fontfamily == 'Open Sans' || $fontfamily == 'Aldrich' || $fontfamily == 'Commissioner' || $fontfamily == 'Capriola' || $fontfamily == 'Rubik' || $fontfamily == 'Muli' || $fontfamily == 'Acme' || $fontfamily == 'Secular One' || $fontfamily == 'Raleway' || $fontfamily == 'Ubuntu' || $fontfamily == 'Nunito Sans') { echo "sans-serif";  } elseif ($fontfamily == 'Courier Prime') { echo "monospace"; } else { echo "cursive"; } ?> !important;
	float: right;
	margin: -3px -10px 0 0;
	padding: 3px 0 4px 0;
}	

.logbutdiv {
	width: 127px;
	height: 25px;
	padding: 11px 4px 0 9px;
}

.memlogbutdiv {
	width: 127px;
	margin: 0 auto;
	height: 25px;
	padding: 11px 4px 0 4px;
	margin-top: 5px;
}

.systemwrapper {
	padding: 0 0 0 75px;
	width: 510px;
}

.systemwrapper2 {
	padding: 0 0 0 75px;
}

.permissions {
	width: 115px;
	float: left;
}

.pms {

	width: 200px;
	float: left;
	padding-left: 35px;
}

.umf {
	width: 200px;
	float: left;
	padding-left: 35px;
}

.mfu {
	width: 200px;
	float: left;
	padding-left: 20px;

}

.submitdiv {
	width: 110px;
	float: left;
	margin: -4px 0 0 0;
}

.systemstatus {
	width: 125px;
	float: left;
	align: center;
	margin: -4px 0 0 0;
}

.sysitems {
	font-weight: bold;
}

.systeminfo {
	margin: 0 auto;
	width: 940px;
}

.equation {
	width: 100%;
	font-size: 20px;
}

.multiply {
	float: left;
	width: 15px;
}

.hr {
border: 0;
	border-bottom: 2px solid #<?php echo "$tbb"; ?>;
}

.mehr {
	border: 0;
	border-bottom: 2px solid #<?php echo "$tbb"; ?>;
	width: 475px;
	float: left;
}

.anote {
	font-weight: bold;
}

.albumpages {
	width: 100%;
	text-align: center;
}


.boxed1 {
    width: 75px;
    border: 1px solid #<?php echo "$borders"; ?>;
    text-align: center;
    background-color: #<?php echo "$npbg"; ?>;
    padding: 4px 0 4px 0;
    color: #<?php echo "$dlc"; ?> !important;
    float: left;
    font-size: 16px;
}

.boxed {
    width: 75px;
    border: 1px solid #<?php echo "$borders"; ?>;
    text-align: center;
    background-color: #<?php echo "$npbg"; ?>;
    padding: 4px 0 4px 0;
    color: #<?php echo "$dlc"; ?> !important;
    float: left;
    border-left: none;
    font-size: 16px;
}

.disabled {
	color: #<?php echo "$npdt"; ?> !important;
}

.paginationdiv {
	width: 314px;
	overflow: hidden;
	text-align: center;
	margin: 0 auto;
}

.pagination {
	padding: 0 0 0 0;
}

.themeud {
	float: right;
	margin-left: 10px;
}

.username {
	padding: 3px 4px 5px 4px;
	border: 1px solid #<?php echo "$borders"; ?>;
	background-color: #<?php echo "$tbbg"; ?>;
	font-size: 16px;
	height: 24px;
	width: 245px;
	font-family: '<?php echo "$fontfamily"; ?>', <?php if ($fontfamily == 'Open Sans' || $fontfamily == 'Aldrich' || $fontfamily == 'Commissioner' || $fontfamily == 'Capriola' || $fontfamily == 'Rubik' || $fontfamily == 'Muli' || $fontfamily == 'Acme' || $fontfamily == 'Secular One' || $fontfamily == 'Raleway' || $fontfamily == 'Ubuntu' || $fontfamily == 'Nunito Sans') { echo "sans-serif";  } elseif ($fontfamily == 'Courier Prime') { echo "monospace"; } else { echo "cursive"; } ?> !important;
}

.password {
	border: 1px solid #<?php echo "$borders"; ?>;
	background-color: #<?php echo "$tbbg"; ?>;
	padding: 3px 4px 5px 4px;
	font-size: 16px;
	height: 24px;
	width: 245px;
	font-family: '<?php echo "$fontfamily"; ?>', <?php if ($fontfamily == 'Open Sans' || $fontfamily == 'Aldrich' || $fontfamily == 'Commissioner' || $fontfamily == 'Capriola' || $fontfamily == 'Rubik' || $fontfamily == 'Muli' || $fontfamily == 'Acme' || $fontfamily == 'Secular One' || $fontfamily == 'Raleway' || $fontfamily == 'Ubuntu' || $fontfamily == 'Nunito Sans') { echo "sans-serif";  } elseif ($fontfamily == 'Courier Prime') { echo "monospace"; } else { echo "cursive"; } ?> !important;
}

.syswrapper {
	width: 100%;
	margin: 0 auto;	
	overflow: hidden;
}

.sys1 {
	margin-left: 47px;
	width: 475px;
	float: left;
}

.sys2 {
	width: 560px;
	float: left;
}

.product {
	float: right
}

.product a {
	color: #<?php echo "$vlc"; ?> !important;
}

.supportedtypes {
	font-size: 14px;
	float: left;
	margin-left: 3px;
}

.needmta {
	font-size: 14px;
	float: left;
}

.adminforgotpassword {
	font-size: 14px;
	float: left;
	width: 300px;
	padding-top: 5px;
}

.pagenumber {
	width: 200px;
	text-align: center;
	font-size: 14px;
	margin: 0 auto;
	margin-top: -10px;
	padding: 50px 8px 0 0;		

}

.pagiwrapper {
	width: 100%;
	overflow: hidden;
}

.recommend {
	font-size: 14px;
}

.memitem {
	width: 175px;
	height: 30px;
	float: left;
	padding-top: 5px;
}

.memitem2 {
	height: 30px;
	float: left;
}

.listmembers {
	float: left;
	width: 350px;
	height: 75px;
}

textarea {
	font-size: 16px;
	font-family: '<?php echo "$fontfamily"; ?>', <?php if ($fontfamily == 'Open Sans' || $fontfamily == 'Aldrich' || $fontfamily == 'Commissioner' || $fontfamily == 'Capriola' || $fontfamily == 'Rubik' || $fontfamily == 'Muli' || $fontfamily == 'Acme' || $fontfamily == 'Secular One' || $fontfamily == 'Raleway' || $fontfamily == 'Ubuntu' || $fontfamily == 'Nunito Sans') { echo "sans-serif";  } elseif ($fontfamily == 'Courier Prime') { echo "monospace"; } else { echo "cursive"; } ?> !important;
	padding: 5px;
	width: 541px;
	border: 1px solid #<?php echo "$tbb"; ?>;
	background-color: #<?php echo "$tbbg"; ?>;
}

.emailtext {
	font-size: 16px;
	font-family: '<?php echo "$fontfamily"; ?>', <?php if ($fontfamily == 'Open Sans' || $fontfamily == 'Aldrich' || $fontfamily == 'Commissioner' || $fontfamily == 'Capriola' || $fontfamily == 'Rubik' || $fontfamily == 'Muli' || $fontfamily == 'Acme' || $fontfamily == 'Secular One' || $fontfamily == 'Raleway' || $fontfamily == 'Ubuntu' || $fontfamily == 'Nunito Sans') { echo "sans-serif";  } elseif ($fontfamily == 'Courier Prime') { echo "monospace"; } else { echo "cursive"; } ?> !important;
	padding: 5px;
	width: 373px;
	height: 165px;
	border: 1px solid #<?php echo "$tbb"; ?>;
	background-color: #<?php echo "$tbbg"; ?>;
	margin-top: 7px;
	margin-left: 3px;
}

.desctext {
	font-size: 16px;
	font-family: '<?php echo "$fontfamily"; ?>', <?php if ($fontfamily == 'Open Sans' || $fontfamily == 'Aldrich' || $fontfamily == 'Commissioner' || $fontfamily == 'Capriola' || $fontfamily == 'Rubik' || $fontfamily == 'Muli' || $fontfamily == 'Acme' || $fontfamily == 'Secular One' || $fontfamily == 'Raleway' || $fontfamily == 'Ubuntu' || $fontfamily == 'Nunito Sans') { echo "sans-serif";  } elseif ($fontfamily == 'Courier Prime') { echo "monospace"; } else { echo "cursive"; } ?> !important;
	padding: 5px;
	width: 537px;
	height: 197px;
	border: 1px solid #<?php echo "$tbb"; ?>;
	background-color: #<?php echo "$tbbg"; ?>;
	margin-top: 7px;
}

.usercomment {

	padding: 5px;
}

.subcap {
	float: left;
	padding: 3px 0 0 5px;
	float: left;
}

.missing {
	border: 1px solid #<?php echo "$buttons"; ?>;
	height: 70px;
	width: 285px;
	padding: 2px 7px 3px 10px;
	font-size: 16px;
	border-radius: 0 3px 3px 0;
	font-family: '<?php echo "$fontfamily"; ?>', <?php if ($fontfamily == 'Open Sans' || $fontfamily == 'Aldrich' || $fontfamily == 'Commissioner' || $fontfamily == 'Capriola' || $fontfamily == 'Rubik' || $fontfamily == 'Muli' || $fontfamily == 'Acme' || $fontfamily == 'Secular One' || $fontfamily == 'Raleway' || $fontfamily == 'Ubuntu' || $fontfamily == 'Nunito Sans') { echo "sans-serif";  } elseif ($fontfamily == 'Courier Prime') { echo "monospace"; } else { echo "cursive"; } ?> !important;
	display: table-cell; 
	vertical-align: middle;
}

.subcap2 {
	float: left;
	padding: 1px 0 0 3px;
	margin-top: -4px;
	text-align: center;
}

.userinfo {
	padding: 5px;
}

.commentbox {
	margin: 0 auto;
	width: 565px;
	overflow: hidden;
}

.author {
	margin-bottom: -15px;
}

.author a{
	text-decoration: underline !important;	
}

.thecomment {
	width: 980px;
	margin: 0 auto;
	font-size: 16px;
	line-height: 190%;

}

.approvecomment {
	float: right;
	background-color: #<?php echo "$buttons"; ?>;
	border: 1px solid #<?php echo "$buttons"; ?>;
	height: 32px;
	color: #<?php echo "$btc"; ?>;
	font-size: 14px;
	border-radius: 3px 3px 3px 3px;
	width: 107px;
	font-family: '<?php echo "$fontfamily"; ?>', <?php if ($fontfamily == 'Open Sans' || $fontfamily == 'Aldrich' || $fontfamily == 'Commissioner' || $fontfamily == 'Capriola' || $fontfamily == 'Rubik' || $fontfamily == 'Muli' || $fontfamily == 'Acme' || $fontfamily == 'Secular One' || $fontfamily == 'Raleway' || $fontfamily == 'Ubuntu' || $fontfamily == 'Nunito Sans') { echo "sans-serif";  } elseif ($fontfamily == 'Courier Prime') { echo "monospace"; } else { echo "cursive"; } ?> !important;
	text-align: center;

}

.deletecomment {
	float: right;
	background-color: #<?php echo "$buttons"; ?>;
	border: 1px solid #<?php echo "$buttons"; ?>;
	height: 32px;
	color: #<?php echo "$btc"; ?>;
	font-size: 14px;
	border-radius: 3px 3px 3px 3px;
	width: 107px;
	font-family: '<?php echo "$fontfamily"; ?>', <?php if ($fontfamily == 'Open Sans' || $fontfamily == 'Aldrich' || $fontfamily == 'Commissioner' || $fontfamily == 'Capriola' || $fontfamily == 'Rubik' || $fontfamily == 'Muli' || $fontfamily == 'Acme' || $fontfamily == 'Secular One' || $fontfamily == 'Raleway' || $fontfamily == 'Ubuntu' || $fontfamily == 'Nunito Sans') { echo "sans-serif";  } elseif ($fontfamily == 'Courier Prime') { echo "monospace"; } else { echo "cursive"; } ?> !important;
	text-align: center;
margin-right: 5px;
}

.deletelivecomment {
	background-color: #<?php echo "$buttons"; ?>;
	border: 1px solid #<?php echo "$buttons"; ?>;
	height: 32px;
	color: #<?php echo "$btc"; ?>;
	font-size: 14px;
	border-radius: 3px 3px 3px 3px;
	width: 107px;
	font-family: '<?php echo "$fontfamily"; ?>', <?php if ($fontfamily == 'Open Sans' || $fontfamily == 'Aldrich' || $fontfamily == 'Commissioner' || $fontfamily == 'Capriola' || $fontfamily == 'Rubik' || $fontfamily == 'Muli' || $fontfamily == 'Acme' || $fontfamily == 'Secular One' || $fontfamily == 'Raleway' || $fontfamily == 'Ubuntu' || $fontfamily == 'Nunito Sans') { echo "sans-serif";  } elseif ($fontfamily == 'Courier Prime') { echo "monospace"; } else { echo "cursive"; } ?> !important;
	text-align: center;

}

.newcomment {
	float: left;
	margin: -20px -8px 0 -20px;
}

.processing {
	position: absolute; 
	height: 90px; 
	width: 400px; 
	background-color: #<?php echo "$ibc"; ?>;
	text-align: center;
	padding-top: 13px;
	display: none;
}

.warning {
	position: absolute; 
	height: 100px; 
	width: 550px; 
	background-color: #<?php echo "$ibc"; ?>;
	text-align: center;
	display: none;
	margin: -10px 0 0 -100px;
	line-height: 225%;
}

.notice {
	margin: -20px 0 0 30px;
}

.googlekeys {
	text-decoration: underline !important;
}

.googlemaps {
	text-decoration: underline !important;
}

.profilephoto {
	max-height:100px;
	max-width: 100px;
	width:  auto;
	height: auto;
	margin: 0 auto;
}

.profilephotodiv {
	width: 100px;
	height: 100px;
	float: left;
	padding-right: 10px;
	overflow: hidden;
}

.profilephotocommentdiv {
	width: 100px;
	height: 100px;
	float: right;
	padding:  5px 0 0 10px;;	
}

.profileinfo {
	float: left;
}

.commentdate {
	font-size: 14px;
	margin: -10px 0 0 0;
}

.leftmember {
	float: left;
}

.rightmember {
	float: left;
	padding: 0 0 0 50px;
}

.memberloginform {
	text-align: center;
	overflow: hidden;
}

.memwarn {
	text-align: center;
	width: 100%;
}

.submitted {
  animation: shrink 2s;
  transform-origin: 50.% 50%;
}

.hide {
	display: none;
}

@keyframes shrink {
	from { transform: none; }
	to { transform: scale(0); display: none ; }
}

.successful {
	display: none;
	margin: 0 auto;
	text-align: center;
	border: 2px solid #<?php echo "$tbb"; ?>;
	width: 381px;
	height: 219px;
}

.grow {
  transition: transform 2s ease-in;
  animation: grow 2s;
  display: inherit;
  transform-origin: 50% 50%;
}


@keyframes grow {
	from { transform: scale(.01); }
	to { transform: scale(1); }
}

.sentspin {
  transition: transform 4s ease-in;
  animation: iconspin 2s;
  display: inherit;
  margin-top: 10px;
}

@keyframes iconspin {
	from { top: 0px; }
	to { transform: rotate(360deg); }
}

.emailinstructions {
	width: 381px;
}

.flash {
  position: absolute;
  display: inline-block;
  margin: -3px 0 0 3px;
}

.flashinfo {
  display: none;
  background-color: #<?php echo "$ibc"; ?>;
  color: #<?php echo "$fontcolor"; ?>;
  border: 2px solid #<?php echo "$borders"; ?>;
  border-radius: 3px;
  padding: 8px;
  position: absolute;
  white-space: pre;
  bottom: 100%;
  left: -110px;
  line-height: 150%;
  font-size: 14px;
}

.flash:hover .flashinfo {
  display: initial;
}

.nonemod {
	font-size: 16px;
}

.nocomments {
	margin: 0 auto;
	display: table;
	font-size: 16px;
}

.checkgps {
	margin: 0 0 0 0;
}

.photodescription {
	font-size: 16px;
	padding: 10px 5px 10px 5px;
	line-height: 190%;
	margin: -20px 0 0 0;
}

.pri {
	width: 100%;
}

.ipri {
	width: 970px;
	margin-right: auto;
	margin-left: auto;
	overflow: hidden;
}

.contactemail {
	margin: 0 auto;
	width: 550px;
	overflow: hidden;
	padding-left: 50px;
	
}

.emailresults {
	width: 600px;
	padding: 10px 10px 10px 10px;
	border-top: 2px solid #<?php echo "$obg"; ?>;
	border-bottom: 2px solid #<?php echo "$obg"; ?>;
	margin: 0 auto;
}

.smalign {
	width: 100%;
	text-align: center;
}

.tbox {
	width: 475px;
	margin: 4px;
	border-radius: 3px;
	padding: 5px;
	font-size: 16px;
	font-family: '<?php echo "$fontfamily"; ?>', <?php if ($fontfamily == 'Open Sans' || $fontfamily == 'Aldrich' || $fontfamily == 'Commissioner' || $fontfamily == 'Capriola' || $fontfamily == 'Rubik' || $fontfamily == 'Muli' || $fontfamily == 'Acme' || $fontfamily == 'Secular One' || $fontfamily == 'Raleway' || $fontfamily == 'Ubuntu' || $fontfamily == 'Nunito Sans') { echo "sans-serif";  } elseif ($fontfamily == 'Courier Prime') { echo "monospace"; } else { echo "cursive"; } ?> !important;
	border: 1px solid #<?php echo "$tbb"; ?>;
	background-color: #<?php echo "$tbbg"; ?>;

}

.mbox {
	width: 475px;
	margin: 4px;
	height: 257px;
	border-radius: 3px;
	font-size: 16px;
	font-family: '<?php echo "$fontfamily"; ?>', <?php if ($fontfamily == 'Open Sans' || $fontfamily == 'Aldrich' || $fontfamily == 'Commissioner' || $fontfamily == 'Capriola' || $fontfamily == 'Rubik' || $fontfamily == 'Muli' || $fontfamily == 'Acme' || $fontfamily == 'Secular One' || $fontfamily == 'Raleway' || $fontfamily == 'Ubuntu' || $fontfamily == 'Nunito Sans') { echo "sans-serif";  } elseif ($fontfamily == 'Courier Prime') { echo "monospace"; } else { echo "cursive"; } ?> !important;
	padding: 5px;
	border: 1px solid #<?php echo "$tbb"; ?>;
	background-color: #<?php echo "$tbbg"; ?>;
}

.subcapcontact {
	float: left;
	padding: 3px 0 0 3px;
}

.subcapcontact2 {
	float: right;
	padding: 1px 0 0 3px;
	margin-right: 60px;
	margin-top: -4px;
	text-align: center;
}

.submitcontact {
	border: 1px solid #<?php echo "$buttons"; ?>;
	height: 78px;
	width: 175px;
	background-color: #<?php echo "$buttons"; ?>;
	color: #<?php echo "$btc"; ?>;
	font-size: 20px;
	border-radius: 3px;
	margin-top: 6px;
	font-weight: bold;
}

.submitcontactbig {
	border: 1px solid #<?php echo "$buttons"; ?>;
	height: 78px;
	width: 485px;
	background-color: #<?php echo "$buttons"; ?>;
	color: #<?php echo "$btc"; ?>;
	font-size: 20px;
	border-radius: 3px;
	margin-top: 6px;
	font-weight: bold;
}

 .brandalert {
	display: none;
    background-color: #<?php echo "$unseltab"; ?>;
    color: #<?php echo "$fontcolor"; ?>;
    border: 1px solid #<?php echo "$borders"; ?>;
    position: fixed;
    width: 550px;
    left: 50%;
    margin-left: -275px;
    height: 180px;
    top: 50%;
    margin-top: -90px;
    text-align: center;
    padding: 15px;
    border-radius: 3px;
}

.babutton {
	background-color: #<?php echo "$buttons"; ?>;
	border: 1px solid #<?php echo "$buttons"; ?>;
    height: 39px;
    padding: 4px 0 4px 0;
    font-size: 16px;
    text-align: center;
    border-radius: 0 3px 3px 0;
    width: 110px;
    color: #<?php echo "$btc"; ?>;
    margin-top: 15px;
    cursor: default;
}

a.goback {
	text-decoration: underline !important;
}

.uploadwarning {
	margin: 3px 0 0 50px;
	line-height: 200%;
}

a.guest {
	text-decoration: underline !important;
}

.bplink {
	text-decoration: underline !important;
}

.defcolpreview {
	float: left; 
	margin-top: -7px; 
	width: 37px; 
	height: 37px;
	margin-right: 5px;
	border: 1px solid #<?php echo "$borders"; ?>;
}

.curcolpreview {
	float: left; 
	width: 37px; 
	height: 37px;
	border: 1px solid #<?php echo "$borders"; ?>;
	margin-right: 5px;
}

.type {
	float: right;
	margin: -45px -37px 0 0;
	transform: rotate(10deg);
}