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

?>

<div class="options">

<?php 

	$update = $_GET["upload"];
	if ($update == "successfully") {
		echo "<div class=\"success\"><img class=\"checkmark\" src=\"../images/system/checkmark.png\">  $notice27a </div><br />";
	}

	$update = $_GET["updated"];
	if ($update == "successfully") {
		echo "<div class=\"success\"><img class=\"checkmark\" src=\"../images/system/checkmark.png\">  $notice26 </div><br />";
	}

	$update2 = $_GET["delete"];
	if ($update2 == "successfully") {
		echo "<div class=\"success\"><img class=\"checkmark\" src=\"../images/system/checkmark.png\">  $notice27 </div><br />";
	}

	$update2 = $_GET["delete"];
	if ($update2 == "nothing") {
		echo "<div class=\"failure\"><img class=\"failureimg\" src=\"../images/system/failure.png\">  $notice28 </div><br />";
	}

	$update3 = $_GET["update"];
	if ($update3 == "taken") {
		echo "<div class=\"failure\"><img class=\"failureimg\" src=\"../images/system/failure.png\">  $notice29 </div><br />";
	}

	$update4 = $_GET["change"];
	if ($update4 == "successfully") {
		echo "<div class=\"success\"><img class=\"checkmark\" src=\"../images/system/checkmark.png\">  $notice27b </div><br />";
	}

	$update5 = $_GET["update"];
	if ($update5 == "unsupported") {
		echo "<div class=\"success\"><img class=\"checkmark\" src=\"../images/system/checkmark.png\">  $notice43 </div><br />";
	}

?>		
<br>
<div class="aswrapper fade">
	<div class="iaswrapper">
		<div><span class="boxhead"><?php echo $to; ?></span></div>
		<br>
		<div class="twrapper">
			<form action="changetheme.php" method="post">
			<div class="seltheme"><?php echo $selecttheme; ?></div>
			<div class="seltheme2">

<?php
	
	$sql = "SELECT DISTINCT name FROM theme WHERE inuse = 'yes'";
    $result = mysqli_query($dbconnect, $sql);
    $row = mysqli_fetch_row($result);

		echo "<input type=\"hidden\" name=\"name\" value=\""; 
    	echo $row[0]; 
    	echo "\">"; 

?>

<select name="theme" class="todd">

<?php

	$sql1 = "SELECT DISTINCT name FROM theme WHERE inuse = 'yes'";
	$result1 = mysqli_query($dbconnect, $sql1);
	$row1 = mysqli_fetch_row($result1);
		$themename = $row1[0];

		echo "<option value=\"$themename\">$themename</option>";


	$sql1a = "SELECT DISTINCT name FROM theme WHERE name != '$themename' ORDER BY name";
    $result1a = mysqli_query($dbconnect, $sql1a);
    while ($list1a = mysqli_fetch_array($result1a)) {

		echo "<option value=\"";
		echo $list1a['name'];
		echo "\">"; echo $list1a['name']; echo "</option>";
}
?>

</select> &nbsp; <input type="submit" class="themebutton2" name="changetheme" value="<?php echo $button2; ?>">

<br><br>

			</div>
			</form>

	<form action="dlt.php" method="post">
		<div class="seltheme"><?php echo $dlt; ?></div>
		<div class="seltheme2">
			<input name="downloadtheme" type="text" class="textbox3" placeholder="<?php echo $gian; ?>" required>
			<input type="submit" class="themebutton2" name="downtheme" value="<?php echo $downbutton; ?>">
		<br><br>
		</div>
	</form>

	<form action="ult.php" method="post" multipart="" enctype="multipart/form-data">
		<div class="seltheme"><?php echo $ult; ?></div>
		<div class="seltheme2">
			<input type="file" name="uploadtheme[]" class="upbox" placeholder="" required>
			<input type="submit" class="uploadthemebutton" name="upthemebutton" value="<?php echo $upbutton; ?>">
		<br><br>
		</div>
	</form>

	<form action="deltheme.php" method="post">
		<div class="seltheme3"><?php echo $delt; ?></div>
			<div class="seltheme4">
				<select name="name" class="todd">

<?php	

	$sql2 = "SELECT DISTINCT name FROM theme WHERE name != 'Aubergine' AND name != 'DarkMode' AND name != 'Default' AND name != 'Greyscale' AND name != 'Pumpkin' AND name != 'Valentines' AND inuse != 'yes'";
    $result2 = mysqli_query($dbconnect, $sql2);
    while ($list2 = mysqli_fetch_array($result2)) {
    	$name = $list2['name'];

		echo "<option value=\"$name\">$name</option>";
	}
	if ($name == "") {
		echo "<option value=\"na\">$na</option>";
	}
?>
				</select> &nbsp; <input type="submit" class="themebutton2" name="deletetheme" value="<?php echo $deltheme; ?>">
		<br><br>
		</div>
	</form>

<form action="upfade.php" method="post">
			<div class="seltheme"><?php echo $fadeeffect; ?></div>
			<div class="seltheme2">

<select name="fade" class="todd">

<?php

	$sql9 = "SELECT fadeeffect FROM general";
	$result9 = mysqli_query($dbconnect, $sql9);
	$row9 = mysqli_fetch_row($result9);
		$timer = $row9[0];

		echo "<option value=\"$timer\">"; if ($timer == 0) { echo $fadeoff; } else { echo $timer; } echo "</option>";
		echo "<option value=\"0\">$fadeoff</option>";
		echo "<option value=\"0.5\">0.5 ($fadeveryfast)</option>";
		echo "<option value=\"1\">1 ($fadefast)</option>";
		echo "<option value=\"1.5\">1.5 ($fadedefault)</option>";
		echo "<option value=\"2\">2 ($fadeslow)</option>";
		echo "<option value=\"2.5\">2.5 ($fadeveryslow)</option>";


?>

</select> &nbsp; <input type="submit" class="themebutton2" name="changetheme" value="<?php echo $button2; ?>">

<br><br><br>

			</div>
			</form>


</div>
<div>

	<span class="boxhead"><?php echo $cct; ?></span><span class="boxhead">:  

<?php	

	$sql3 = "SELECT * FROM theme WHERE item = 'FontFamily' AND inuse = 'yes'";
    $result3 = mysqli_query($dbconnect, $sql3);
    while ($list3 = mysqli_fetch_array($result3)) {

	echo $list3['name'];
}
?>
	</span>
</div>
<div>&nbsp;</div>
<div>&nbsp;</div>

<div class="twrapper">
	<div class="itemtitle"><?php echo $themeitem; ?></div> 
	<div class="defaulttitle"><?php echo $themedefault; ?></div> 
	<div class="currenttitle"><form method="post" action="updatetheme.php"><input class="resetthemebutton" type="submit" value=" " name="reset" title="<?php echo $resettheme; ?>"></form><?php echo $themecurrent; ?></div>

	<form action="updatetheme.php" method="post">

	<?php	
	$sql4 = "SELECT defaults,current FROM theme WHERE item = 'FontFamily' AND inuse = 'yes'";
    $result4 = mysqli_query($dbconnect, $sql4);
    $row4 = mysqli_fetch_array($result4);
    	$defaultfont = $row4[0];
    	$currentfont = $row4[1];
    	$exclude = array("$currentfont");
    ?>

	<div class="fontitem"><?php echo "$fontfam"; ?></div> <div class="fontdefault"><?php echo $defaultfont; ?></div> <div class="fontcurrent">

	<select name="FontFamily" class="fontfamily" onchange="this.form.submit()">

	<?php

	echo "<option value=\"$currentfont\">$currentfont</option>";

	$fonts = array("Acme", "Aldrich", "Capriola", "Comfortaa", "Commissioner", "Courier Prime", "Dancing Script", "Delius", "Joti One", "Muli", "Nunito Sans", "Open Sans", "Permanent Marker", "Secular One", "Raleway", "Righteous", "Rubik", "Schoolbell", "Walter Turncoat", "Ubuntu");

	foreach ($fonts as $key => $value) {

    if (!in_array($value, $exclude))  {

			echo "<option value=\"$value\">$value</option>";
	
		}
	}
?>

	</select>
</div>

<?php	
	$sql5 = "SELECT * FROM theme WHERE item != 'FontFamily' and inuse = 'yes'";
    $result5 = mysqli_query($dbconnect, $sql5);
    while ($list5 = mysqli_fetch_array($result5)) {
    	$item = $list5['item'];
    	
    	echo "<div class=\"item\">"; 

    	if ($item == "FontColor") {
    		echo $textcolor;
    	}

    	if ($item == "OuterBackgroundColor") {
    		echo $obc;
    	}
    	
    	if ($item == "InnerBackgroundColor") {
    		echo $ibc;
    	}

    	if ($item == "SelectedTab") {
    		echo $st;
    	}


    	if ($item == "SelectedTabFontColor") {
    		echo $stt;
    	}


    	if ($item == "UnselectedTab") {
    		echo $ust;
    	}


    	if ($item == "UnselectedTabFontColor") {
    		echo $ustt;
    	}


    	if ($item == "Buttons") {
    		echo $but;
    	}


    	if ($item == "ButtonTextColor") {
    		echo $butt;
    	}


    	if ($item == "InnerAlbumBorder") {
    		echo $iab;
    	}


    	if ($item == "AlbumBackgroundColor") {
    		echo $abc;
    	}


    	if ($item == "AlbumFontColor") {
    		echo $at;
    	}


    	if ($item == "BreadcrumbFontColor") {
    		echo $bt;
    	}


    	if ($item == "Breadcrumb") {
    		echo $bread;
    	}


    	if ($item == "Divider") {
    		echo $divider;
    	}


    	if ($item == "TextboxBorder") {
    		echo $boxborder;
    	}


    	if ($item == "TextboxBackground") {
    		echo $boxbg;
    	}

		
		if ($item == "Borders") {
    		echo $borders;
    	}


    	if ($item == "FailedLoginTextColor") {
    		echo $flt;
    	}


    	if ($item == "NextPrevDisabledText") {
    		echo $npdt;
    	}


		if ($item == "NextPrevBackground") {
    		echo $npbg;
    	}


		if ($item == "DefaultLinkColor") {
    		echo $lc;
    	}


		if ($item == "VisitedLinkColor") {
    		echo $vlc;
    	}


		if ($item == "SuccessFailureBackground") {
    		echo $sfbg;
    	}


		if ($item == "SuccessFailureBorder") {
    		echo $sfb;
    	}



    	echo "</div>"; 
    	$defaultcolor = $list5['defaults'];
    	$currentcolor = $list5['current'];
    	echo "<div class=\"default\">#"; echo $defaultcolor; echo "<div class=\"defcolpreview\" style=\"background-color: #$defaultcolor;\"></div></div>"; 
    	echo "<div class=\"current\"><div class=\"curcolpreview\" style=\"background-color: #$currentcolor;\"></div>#<input name=\""; echo $list5['item']; echo "\" type=\"text\" class=\"textbox2\" placeholder=\""; echo $currentcolor; 
    	echo "\"></input></div>"; 
    	echo "<input type=\"hidden\" name=\"name\" value=\""; 
    	echo $list5['name']; 
    	echo "\">"; 
  	}
?>
			</div>
		</div>
<input type="submit" class="themebutton" name="updatetheme" value="<?php echo $button2; ?>">
	</div>
</div>


<br><br>	
</form>


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