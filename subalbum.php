
<?php

session_start();
include ('config.php');

$ain = $_GET['ain'];
$showalbum = $_GET['album'];

if ($_GET['ain'] == "") {
	header('Location: index.php');
}


	$sql = "SELECT * FROM albums WHERE ain = '$ain' ";
	$result = mysqli_query($dbconnect, $sql);
	while ($list = mysqli_fetch_array($result)) {
		$albumname = $list['album'];
		$pain = $list['pain'];
		$parentalbum = $list['parentalbum'];
		$status = $list['status'];
	}

if (isset($_SESSION['musername']) || $_SESSION['ausername'] == "$adminusername" || $status == "public")  {

?>


<?php


	$sql1a = "SELECT * FROM albums WHERE ain = '$ain' AND album = '$showalbum'";
	$result1a = mysqli_query($dbconnect, $sql1a);
	while ($list1a = mysqli_fetch_array($result1a)) {
		$thealbumname = $list1a['album'];
	}



	if ($thealbumname == "") {

			echo "<div class=\"nothing\">$nothinghere";
	} else {

?>
<br>
<div class="breadcrumb">


<?php 

	$sql1 = "SELECT albumdir FROM albums WHERE ain = '$ain' ";
	$result1 = mysqli_query($dbconnect, $sql1);
	$row1 = mysqli_fetch_row($result1);
		$albumdir = $row1[0]; 
	
echo "&nbsp;$albumdir";


?>
 	
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

} else {

	$newpicpage = ($page - 1) * $picpage;
}

	$sql4 = "SELECT numpage FROM general";
	$result4 = mysqli_query($dbconnect, $sql4);	
	$row4 = mysqli_fetch_row($result4);
		$numpage = $row4[0];

$page = $_GET['page'];
	
if ($page == "" || $page == 1) {

	$newpage = 0;

} else {

	$newpage = ($page - 1) * $numpage;
}
					


	//Album/Photo display order

	$sql5 = "SELECT apdorder FROM general";
	$result5 = mysqli_query($dbconnect, $sql5);						
	$row5 = mysqli_fetch_row($result5);
	$apdorder = $row5[0];

	if ($apdorder == "albums") {

		include ("salbums.php");

		include ("sphotos.php");

	} else {

		include ("sphotos.php");

		include ("salbums.php");

	}



#Begin pagination

if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}

$sql13 = "SELECT album FROM albums WHERE ain = '$ain'";
	$result13 = mysqli_query($dbconnect, $sql13);						
	$row13 = mysqli_fetch_row($result13);
		$album = $row13[0];

#pages

if  (isset($_SESSION['musername']) || $_SESSION['ausername'] == "$adminusername") {

	$sql14 = "SELECT COUNT(*) FROM albums WHERE parentalbum = '$album'";
	$result14 = mysqli_query($dbconnect,$sql14);

	$pagerows = mysqli_fetch_array($result14)[0];
	$pgtotal = ceil($pagerows / $numpage);

} else {

	$sql15 = "SELECT COUNT(*) FROM albums WHERE parentalbum = '$album' AND status = 'public'";
	$result15 = mysqli_query($dbconnect,$sql15);

	$pagerows = mysqli_fetch_array($result15)[0];
	$pgtotal = ceil($pagerows / $numpage);
}

#pictures

if  (isset($_SESSION['musername']) || $_SESSION['ausername'] == "$adminusername") {
	$sql16 = "SELECT COUNT(*) FROM photos WHERE ain = '$ain'"; 
	$result16 = mysqli_query($dbconnect,$sql16);

	$picrows = mysqli_fetch_array($result16)[0];
	$ptotal = ceil($picrows / $picpage);

} else {

	$sql17 = "SELECT COUNT(*) FROM photos WHERE ain = '$ain' AND status ='public'"; 
	$result17 = mysqli_query($dbconnect,$sql17);

	$picrows = mysqli_fetch_array($result17)[0];
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

   		echo "<a href=\"index.php?menu=subalbum&album=$album&ain=$ain&page=1\"><div class=\"boxed1 fade\">$first</div></a>";
    }

		

   if ($page <= 1){ 

    	echo "<div class=\"boxed disabled fade\">$prev</div>";
    
    } else { 

    	echo "<a href=\"index.php?menu=subalbum&album=$album&ain=$ain&page=";
		echo $page - 1;
		echo "\"><div class=\"boxed fade\">$prev</div></a>"; 
    }


	$highestpagenumber = max($pgtotal, $ptotal);

    if($page == $highestpagenumber || $highestpagenumber == 0) { 

	 	echo "<div class=\"boxed disabled fade\">$next</div>"; 

   	} else {

  		echo "<a href=\"index.php?menu=subalbum&album=$album&ain=$ain&page="; 
		echo $page + 1;
		echo "\"><div class=\"boxed fade\">$next</div></a>";

}

   	if ($page == $highestpagenumber || $highestpagenumber == 0) { 

	    echo "<div class=\"boxed disabled fade\">$last</div>";

	} else {
 	
 		echo "<a href=\"index.php?menu=subalbum&album=$album&ain=$ain&page=$highestpagenumber\"><div class=\"boxed fade\">$last</div></a>";
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
	}

	

	} elseif ($status == "private") {
		//if album is private show nothing	
	echo "<div class=\"nothing\">$nothinghere";

}
?>