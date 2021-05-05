<?php

// Display descending so newest photo displays first

	$ain = $_GET['ain'];

	$sql8 = "SELECT * FROM photos WHERE ain = '$ain' ORDER BY displayorder DESC LIMIT $newpicpage, $picpage";
	$result8 = mysqli_query($dbconnect, $sql8);
	while ($list8 = mysqli_fetch_array($result8)) {
		$name = $list8['name'];
		$pin = $list8['pin'];

	$sql9 = "SELECT * FROM albums WHERE ain = '$ain'";
	$result9 = mysqli_query($dbconnect, $sql9);
	while ($list9 = mysqli_fetch_array($result9)) {
		$albumdir = $list9['albumdir'];
		$album = $list9['album'];
		

		echo "<div class=\"orootalbum\"><fieldset class=\"adfieldset\"> <legend>";
		echo "<form action=\"delphoto.php\" class=\"form\" method=\"post\""; ?> onsubmit="return confirm('<?php echo $deletephoto; ?>');" <?php 
		echo "<input type=\"hidden\" name=\"ain\" value=\"$ain\">";
		echo "<input type=\"hidden\" name=\"pin\" value=\"$pin\">";
		echo "<input type=\"hidden\" name=\"namedit\" value=\"";
		echo $list8['name'];
		echo "\"><input type=\"hidden\" name=\"page\" value=\"$page\">";
		echo "<input type=\"hidden\" name=\"ain\" value=\"$ain\">";
		echo "<input type=\"submit\" value=\" \" class=\"deletebutton\" name=\"delete\" title=\"$pdelete\"></form>"; 


	$sql12 = "SELECT status FROM photos WHERE ain = '$ain' AND name = '$name'";
	$result12 = mysqli_query($dbconnect, $sql12);
	$row12 = mysqli_fetch_row($result12);
	$status2 = $row12[0];


	if ($status2 == "public") {
	
		echo "<form action=\"pubpriphoto.php\" method=\"post\" class=\"form\">";
		echo "<input type=\"submit\" value=\" \" class=\"pubbutton\" name=\"pubbutton\" title=\"$pubphoto\">";
		echo "<input type=\"hidden\" name=\"pubpri\" value=\"makeprivate\">";
		echo "<input type=\"hidden\" name=\"ain\" value=\"$ain\">";
		echo "<input type=\"hidden\" name=\"name\" value=\"$name\">";
		echo "<input type=\"hidden\" name=\"page\" value=\"$page\">";
		echo "<input type=\"hidden\" name=\"pain\" value=\"$pain\">";
		echo "<input type=\"hidden\" name=\"ain\" value=\"$ain\"></form>";

	} else {

		echo "<form action=\"pubpriphoto.php\" method=\"post\" class=\"form\">";
		echo "<input type=\"submit\" value=\" \" class=\"pributton\" name=\"pributton\" title=\"$priphoto\">";
		echo "<input type=\"hidden\" name=\"pubpri\" value=\"makepublic\">";
		echo "<input type=\"hidden\" name=\"pain\" value=\"$pain\">";
		echo "<input type=\"hidden\" name=\"ain\" value=\"$ain\">";
		echo "<input type=\"hidden\" name=\"name\" value=\"$name\">";
		echo "<input type=\"hidden\" name=\"page\" value=\"$page\">";
		echo "<input type=\"hidden\" name=\"ain\" value=\"$ain\"></form>";
	}

	
	$sql10 = "SELECT displayorder FROM photos WHERE ain = '$ain' and name = '$name'";
	$result10 = mysqli_query($dbconnect, $sql10);
	$row10 = mysqli_fetch_row($result10);
		$displayorder1 =  $row10[0];
	
	$sql11 = "SELECT MIN(displayorder) FROM photos WHERE ain='$ain'";
	$result11 = mysqli_query($dbconnect, $sql11);
	$row11 = mysqli_fetch_row($result11);
		$mindisplayorder1 =  $row11[0];

	$sql12 = "SELECT MAX(displayorder) FROM photos WHERE ain='$ain'";
	$result12 = mysqli_query($dbconnect, $sql12);
	$row12 = mysqli_fetch_row($result12);
		$maxdisplayorder1 =  $row12[0];


	if ($displayorder1 == $maxdisplayorder1) {

		echo  "<img class=\"upbuttongrey\" src=\"../images/system/upgrey.png\">";

	} else {

		echo "<form action=\"udphoto.php\" method=\"post\" class=\"form\">";
		echo "<input type=\"submit\" value=\" \" class=\"upbutton\" name=\"upbutton\" title=\"$cdo\">";
		echo "<input type=\"hidden\" name=\"name\" value=\"$name\">";
		echo "<input type=\"hidden\" name=\"album\" value=\"$album\">";
		echo "<input type=\"hidden\" name=\"page\" value=\"$page\">";
		echo "<input type=\"hidden\" name=\"ain\" value=\"$ain\">";
		echo "<input type=\"hidden\" name=\"updown\" value=\"up\"></form>";
	}

	if ($displayorder1 == $mindisplayorder1) {

		echo  "<img class=\"downbuttongrey\" src=\"../images/system/downgrey.png\">";
	
	} else {

		echo "<form action=\"udphoto.php\" method=\"post\" class=\"form\">";
		echo "<input type=\"submit\" value=\" \" class=\"downbutton\" name=\"downbutton\" title=\"$cdo\">";
		echo "<input type=\"hidden\" name=\"name\" value=\"$name\">";
		echo "<input type=\"hidden\" name=\"album\" value=\"$album\">";
		echo "<input type=\"hidden\" name=\"page\" value=\"$page\">";
		echo "<input type=\"hidden\" name=\"ain\" value=\"$ain\">";
		echo "<input type=\"hidden\" name=\"updown\" value=\"down\"></form>";

	}


	//Shorten photo name if too long otherwise it doesn't render properly

	$size2 = strlen($name);

			if ($size2 >= 14) {

				$start2 = mb_substr($name, 0, 5);
				$end2 = mb_substr($name, -7);
				echo "$start2...$end2";
	
			} else {

				echo $name;

			}

		echo "</legend><div class=\"rootalbum\"> ";	

		if (mime_content_type("../images/gallery/$albumdir/$name") == "video/ogg" || mime_content_type("../images/gallery/$albumdir/$name") == "video/webm" || mime_content_type("../images/gallery/$albumdir/$name") == "video/mp4") {
		echo "<a class=\"subalbums\" href=\"index.php?menu=photo&album=$album&ain=$ain&pin=$pin\">";
		echo "<img class=\"photograph fade\" src=\"../images/system/play.png\"></div>";
		echo "</a>";

	} else {

		echo "<a class=\"subalbums\" href=\"index.php?menu=photo&album=$album&ain=$ain&pin=$pin\">";
		echo "<img class=\"photograph fade\" src=\"../images/thumbnails$albumdir/$name\"></div>";
		echo "</a>";

	}

		echo "</fieldset></div>";
	}

}

?>