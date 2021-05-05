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

	$update = $_GET["mod"];

		if ($update == "approved") {
			echo "<div class=\"success\"><img class=\"checkmark\" src=\"../images/system/checkmark.png\"> $notice18</div><br />";
		}

		if ($update == "deleted") {
			echo "<div class=\"success\"><img class=\"checkmark\" src=\"../images/system/checkmark.png\"> $notice19</div><br />";
		}

?>	

<div class="aswrapper">
	<div class="iaswrapper">
		<fieldset class="acfs">
			<legend><?php echo $commentmod; ?></legend>
				<div class="fade">
<?php

	$sql = "SELECT * FROM comments WHERE live = 'no' ORDER BY cid ASC";
	$result = mysqli_query($dbconnect, $sql);
	$countrows = mysqli_num_rows($result);

	if ($countrows >= 1) {

		echo "<br><hr class=\"divider\"><br>";

	} else {
		echo "<span class=\"nonemod\">$nocomments</span>";
			}

	while ($list = mysqli_fetch_array($result)) {
		$username = $list['username'];
		$name = $list['name'];
		$comment = $list['comment'];
		$pin = $list['pin'];
		$cid = $list['cid'];
		$commentdate = $list['commentdate'];


		$sql2 = "SELECT ain FROM photos WHERE pin='$pin'";
		$result2 = mysqli_query($dbconnect, $sql2);						
		$row2 = mysqli_fetch_row($result2);
			$ain = $row2[0];

		$sql3 = "SELECT album FROM albums WHERE ain='$ain'";
		$result3 = mysqli_query($dbconnect, $sql3);						
		$row3 = mysqli_fetch_row($result3);
			$album = $row3[0];

							
if ($username == "Anonymous" && $name !="") {

		echo "<div class=\"thecomment\">"; 
		echo "<form onsubmit=\"return confirm('$deletecomment')\" action=\"adddelcom.php\" method=\"post\">";
		echo "<input name=\"submit\" type=\"submit\" class=\"approvecomment\" value=\"$delcomment\">";
		echo "<input type=\"hidden\" name=\"cid\" value=\"$cid\">";
		echo "<input type=\"hidden\" name=\"delete\" value=\"delete\"></form>";
		
		echo "<form onsubmit=\"return confirm('$approvecomment')\" action=\"adddelcom.php\" method=\"post\">";
		echo "<input name=\"submit\" type=\"submit\" class=\"deletecomment\" value=\"$appcomment\">";
		echo "<input type=\"hidden\" name=\"cid\" value=\"$cid\">";
		echo "<input type=\"hidden\" name=\"approve\" value=\"approve\"></form> ";
	
		echo "<div class=\"author\">$name ($username) $submittedcomment <a target=\"_blank\" href=\"../index.php?album=$album&ain=$ain&pin=$pin\">$thisphoto</a>";
		echo "<br><div class=\"commentdate\">$commentdate</div></div>";

	} else {
		echo "<div class=\"thecomment\"><form onsubmit=\"return confirm('$deletecomment')\" action=\"adddelcom.php\" method=\"post\">";
		echo "<input name=\"submit\" type=\"submit\" class=\"approvecomment\" value=\"$delcomment\">";
		echo "<input type=\"hidden\" name=\"cid\" value=\"$cid\">";
		echo "<input type=\"hidden\" name=\"delete\" value=\"delete\"></form>";

		echo "<form onsubmit=\"return confirm('$approvecomment')\" action=\"adddelcom.php\" method=\"post\">";
		echo "<input name=\"submit\" type=\"submit\" class=\"deletecomment\" value=\"$appcomment\">";
		echo "<input type=\"hidden\" name=\"cid\" value=\"$cid\">";
		echo "<input type=\"hidden\" name=\"approve\" value=\"approve\"></form>";

		echo "<div class=\"author\">$username $submittedcomment <a target=\"_blank\" href=\"../index.php?album=$album&ain=$ain&pin=$pin\">$thisphoto</a>";
		echo "<br><div class=\"commentdate\">$commentdate</div></div>";
	}
		echo "<br>$comment</div><br><hr class=\"divider\">";
		
								
?>

<br>

<?php
}
?>
</div>
</fieldset>

<br>

</div>
</div>
</div>

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