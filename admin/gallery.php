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
	
	$repeats = $_SESSION['repeats'];
	$photoupload = $_SESSION['photoupload'];
	$counting = $_SESSION['counting'];	
	$page = $_GET['page'];
	$_SESSION['page'] = $page;
	$menu = $_GET['menu'];
	$_SESSION['menu'] = $menu;
	$ain = $_GET['ain'];
	$_SESSION['ain'] = $ain;
?>
<div class="options">
	<div class="aswrapper">
		<div class="iaswrapper">
			<div class="addstuff fade">
				<form action="createalbum.php" method="post">
  					<span class="boxhead"><?php echo $calbum; ?></span><br>
	  				<input type="text" name="album" class="textbox" placeholder="<?php echo $albumname; ?>" required autofocus> 
					<input type="submit" value="<?php echo $button1; ?>" class="updatebutton" name="<?php echo $create; ?>"> 
				</form>
	
			</div>
			<div class="emptyspace">&nbsp;</div>

			<div class="addstuff fade">
				<form action="addphoto.php" method="post" multipart="" enctype="multipart/form-data" onsubmit="processing()">
  					<div id="warning" class="warning"><?php echo $upwarn1; ?><br><?php echo $upwarn2; ?><br><?php echo $upwarn3; ?></div>
  					<div id="processing" class="processing">
    					<img src="../images/system/processing.gif" width="225" height ="65"/>
					</div>
  				<span class="boxhead"><?php echo $aphotos; ?></span><br>
	  				<input id="fileinput" type="file" name="photos[]" class="upbox" placeholder="<?php echo $uploadphotos; ?>" multiple required> 
					<input type="hidden" name="ain" value="<?php echo $ain; ?>">	  				
					<input type="submit" value="<?php echo $button3; ?>" class="uploadbutton" name="<?php echo $create; ?>">
					<input type="hidden" name="menu" value="gallery"> 
				</form> 
			<div class="supportedtypes">JPG, SVG, PNG, GIF, BMP, MP4, WEBM, OGG</div>
		</div>
	</div>
</div>
<br>
	<hr class="divider">
<br>
<div class="breadcrumb">
	&nbsp;/
</div>
<br>
<?php 
	
			if ($photoupload == "requirements") {

				echo "<div class=\"success\"><img class=\"checkmark\" src=\"../images/system/checkmark.png\"> $notice30</div>";
				unset ($_SESSION['photoupload']);
				unset ($photoupload);
			}

			if ($photoupload == "nophoto") {

				echo "<div class=\"success\"><img class=\"checkmark\" src=\"../images/system/checkmark.png\"> $notice31</div>";
				unset ($_SESSION['photoupload']);
				unset ($photoupload);
			}

			if ($photoupload == "nophotos") {

				echo "<div class=\"success\"><img class=\"checkmark\" src=\"../images/system/checkmark.png\"> $notice37</div>";
				unset ($_SESSION['photoupload']);
				unset ($photoupload);
				
			}

			if ($photoupload == "successes") {

				if ($counting == "0") {
				echo "<div class=\"success\"><img class=\"checkmark\" src=\"../images/system/checkmark.png\"> $notice38</div>";
				unset ($_SESSION['photoupload']);
				unset ($_SESSION['repeats']);
				unset ($photoupload);
				unset ($repeats);
	
				} elseif ($counting == "1") {
				echo "<div class=\"success\"><img class=\"checkmark\" src=\"../images/system/checkmark.png\"> <div class=\"notice\">$notice32<br><ol>";
				$exclude = array("");
				foreach ($repeats as $key => $value) {
					if (!in_array($value, $exclude))  {

				echo "<li>$value</li>";
	
					}
				}
				echo "</ol>$notice35</div></div>";
				unset ($_SESSION['photoupload']);
				unset ($_SESSION['repeats']);
				unset ($photoupload);
				unset ($repeats);
	
				} elseif ($counting > "1") {
	
				echo "<div class=\"success\"><img class=\"checkmark\" src=\"../images/system/checkmark.png\"> <div class=\"notice\">$notice33<br><ol>";
				$exclude = array("");
				foreach ($repeats as $key => $value) {
					if (!in_array($value, $exclude))  {

				echo "<li>$value</li>";
	
					}
				}
				echo "</ol>$notice36</div></div>";
				unset ($_SESSION['photoupload']);
				unset ($_SESSION['repeats']);
				unset ($photoupload);
				unset ($repeats);
				} 
				
			}
			
			if ($photoupload == "success") {
				
				echo "<div class=\"success\"><img class=\"checkmark\" src=\"../images/system/checkmark.png\"> $notice34</div>";
				unset ($_SESSION['photoupload']);
				unset ($photoupload);
	
			}

			$update = $_GET["update"];
			if ($update == "changed") {
			echo "<div class=\"success\"><img class=\"checkmark\" src=\"../images/system/checkmark.png\"> $notice1</div>";
			}

			$update = $_GET["update"];
			if ($update == "successfully") {
			echo "<div class=\"success\"><img class=\"checkmark\" src=\"../images/system/checkmark.png\"> $notice2</div>";
			}

			$update = $_GET["update"];
			if ($update == "taken") {
			echo "<div class=\"failure\"><img class=\"failureimg\" src=\"../images/system/failure.png\"> $notice3</div>";
			}

			$delete = $_GET['delete'];
			if ($delete == "successfully") {
			echo "<div class=\"success\"><img class=\"checkmark\" src=\"../images/system/checkmark.png\"> $notice4</div>";
			}

			$update = $_GET['update'];
			if ($update == "uploadsuccess") {
			echo "<div class=\"success\"><img class=\"checkmark\" src=\"../images/system/checkmark.png\"> $notice6</div>";
			}

			$delphoto = $_GET['delphoto'];
			if ($delphoto == "successfully") {
			echo "<div class=\"success\"><img class=\"checkmark\" src=\"../images/system/checkmark.png\"> $notice7</div>";
			}

			$update = $_GET["update"];
			if ($update == "private") {
			echo "<div class=\"success\"><img class=\"checkmark\" src=\"../images/system/checkmark.png\"> $notice11</div>";
			}

			$update = $_GET["update"];
			if ($update == "public") {
			echo "<div class=\"success\"><img class=\"checkmark\" src=\"../images/system/checkmark.png\"> $notice12</div>";
			}

			$update = $_GET["update"];
			if ($update == "photoprivate") {
			echo "<div class=\"success\"><img class=\"checkmark\" src=\"../images/system/checkmark.png\"> $notice14</div>";
			}

			$update = $_GET["update"];
			if ($update == "photopublic") {
			echo "<div class=\"success\"><img class=\"checkmark\" src=\"../images/system/checkmark.png\"> $notice15</div>";
			}

			$update = $_GET["update"];
			if ($update == "uft") {
			echo "<div class=\"success\"><img class=\"checkmark\" src=\"../images/system/checkmark.png\"> $notice21</div><br />";
			}

?>	

<div class="youralbums">

<?php
	$sql = "SELECT picpage FROM general";
	$result = mysqli_query($dbconnect, $sql);						
	$row = mysqli_fetch_row($result);
		$picpage = $row[0];

	if ($page == "" || $page == 1) {

		$newpicpage = 0;
		$picturepage = $picpage;

	} else {

		$newpicpage = ($page - 1) * $picpage;

	}

	$sql1 = "SELECT numpage FROM general";
	$result1 = mysqli_query($dbconnect, $sql1);						
	$row1 = mysqli_fetch_row($result1);
		$numpage = $row1[0];

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

		include ("galbums.php");

		include ("gphotos.php");

	} else {

		include ("gphotos.php");

		include ("galbums.php");

	}

#Begin pagination

if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}

$thealbum = $_GET['album'];

#Albums

$sql12 = "SELECT COUNT(*) FROM albums WHERE parentalbum = 'root' AND album != 'None'";
$result12 = mysqli_query($dbconnect,$sql12);

$pagerows = mysqli_fetch_array($result12)[0];
$pgtotal = ceil($pagerows / $numpage);

#pictures

$sql13 = "SELECT COUNT(*) FROM photos WHERE ain = 1"; 
$result13 = mysqli_query($dbconnect,$sql13);

$picrows = mysqli_fetch_array($result13)[0];
$ptotal = ceil($picrows / $picpage);



?>
</div>
<div class="pagiwrapper">
<br>
<div class="paginationdiv">
	

<?php
	if ($page == 1) {

		echo "<div class=\"boxed1 disabled fade\">$first</div>";

	} else {

   		echo "<a href=\"index.php?menu=gallery&page=1\"><div class=\"boxed1 fade\">$first</div></a>";
    }

	if ($page <= 1){ 

    	echo "<div class=\"boxed disabled fade\">$prev</div>";
    
    } else { 

    	echo "<a href=\"index.php?menu=gallery&page=";
    	echo $page - 1;
    	echo "\"><div class=\"boxed fade\">$prev</div></a>"; 
    }

	$highestpagenumber = max($pgtotal, $ptotal);

    if($page == $highestpagenumber || $highestpagenumber == 0) { 

	 	echo "<div class=\"boxed disabled fade\">$next</div>"; 

   	} else {

  		echo "<a href=\"index.php?menu=gallery&page="; 
   		echo $page + 1;
   		echo "\"><div class=\"boxed fade\">$next</div></a>";

}

   	if ($page == $highestpagenumber || $highestpagenumber == 0) { 

	    echo "<div class=\"boxed disabled fade\">$last</div>";

	} else {
 	
 		echo "<a href=\"index.php?menu=gallery&page=$highestpagenumber\"><div class=\"boxed fade\">$last</div></a>";
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

<br>
</div>
<?php
$mfu= (int)(ini_get('max_file_uploads'));
?>

<script src="jquery351.js"></script>
<script type="text/javascript">
    function processing() {
   	var div = document.getElementById("processing");
        div.style.display = 'initial';
    }


    $(document).ready(function() {
  $('#fileinput').change(function() {
    if (this.files.length > '<?php echo $mfu; ?>')

    var div = document.getElementById("warning");
        div.style.display = 'initial';

        	// Get rid of warning after 10 seconds
            setTimeout(function() {
    	      	location.reload();
	        }, 7500);
  		});
});
</script>
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
