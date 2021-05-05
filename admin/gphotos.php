<?php

// Display descending so newest photo displays first 

	$sql7 = "SELECT * FROM photos WHERE ain = 1 ORDER BY displayorder DESC LIMIT $newpicpage, $picpage";
	$result7 = mysqli_query($dbconnect, $sql7);
	while ($list7 = mysqli_fetch_array($result7)) {
		$name = $list7['name'];
		$ain = $list7['ain'];
		$pin = $list7['pin'];

		echo "<div class=\"orootalbum\">";
		echo "<fieldset class=\"adfieldset\"> <legend>";
		echo "<form action=\"delphoto.php\" class=\"form\" method=\"post\" "; 
?> 
onsubmit="return confirm('<?php echo $deletephoto; ?>');" 
<?php 
		echo "><input type=\"hidden\" name=\"pin\" value=\"$pin\"><input type=\"hidden\" name=\"ain\" value=\"1\"><input type=\"hidden\" name=\"namedit\" value=\"";
		echo $list7['name'];
		echo "\">";
		echo "<input type=\"submit\" value=\" \" class=\"deletebutton\" name=\"delete\" title=\"$pdelete\"></form>"; 
		

	$sql11 = "SELECT status FROM photos WHERE ain = '$ain' and name = '$name'";
	$result11 = mysqli_query($dbconnect, $sql11);
	$row11 = mysqli_fetch_row($result11);
	$status2 = $row11[0];


	if ($status2 == "public") {

		echo "<form action=\"pubpriphoto.php\" method=\"post\" class=\"form\">";
		echo "<input type=\"submit\" value=\" \" class=\"pubbutton\" name=\"pubbutton\" title=\"$pubphoto\">";
		echo "<input type=\"hidden\" name=\"pubpri\" value=\"makeprivate\">";
		echo "<input type=\"hidden\" name=\"name\" value=\"$name\">";
		echo "<input type=\"hidden\" name=\"page\" value=\"$page\">";
		echo "<input type=\"hidden\" name=\"ain\" value=\"1\"></form>";

	} else {

		echo "<form action=\"pubpriphoto.php\" method=\"post\" class=\"form\">";
		echo "<input type=\"submit\" value=\" \" class=\"pributton\" name=\"pributton\" title=\"$priphoto\">";
		echo "<input type=\"hidden\" name=\"pubpri\" value=\"makepublic\">";
		echo "<input type=\"hidden\" name=\"name\" value=\"$name\">";
		echo "<input type=\"hidden\" name=\"page\" value=\"$page\">";
		echo "<input type=\"hidden\" name=\"ain\" value=\"1\"></form>";
	
	}

	$sql8 = "SELECT displayorder FROM photos WHERE ain = '$ain' and name = '$name'";
	$result8 = mysqli_query($dbconnect, $sql8);
	$row8 = mysqli_fetch_row($result8);
		$displayorder1 =  $row8[0];
						
	$sql9 = "SELECT MIN(displayorder) FROM photos WHERE ain='$ain'";
	$result9 = mysqli_query($dbconnect, $sql9);
	$row9 = mysqli_fetch_row($result9);
		$mindisplayorder1 =  $row9[0];
			
	$sql10 = "SELECT MAX(displayorder) FROM photos WHERE ain='$ain'";
	$result10 = mysqli_query($dbconnect, $sql10);
	$row10 = mysqli_fetch_row($result10);
		$maxdisplayorder1 =  $row10[0];

	if ($displayorder1 == $maxdisplayorder1) {

		echo  "<img class=\"upbuttongrey\" src=\"../images/system/upgrey.png\">";

	} else {

		echo  "<form action=\"udphoto.php\" method=\"post\" class=\"form\">";
		echo "<input type=\"submit\" value=\" \" class=\"upbutton\" name=\"upbutton\" title=\"$cdo\">";
		echo "<input type=\"hidden\" name=\"name\" value=\"$name\">";
		echo "<input type=\"hidden\" name=\"ain\" value=\"$ain\">";
		echo "<input type=\"hidden\" name=\"updown\" value=\"up\"></form>";
	}

	if ($displayorder1 == $mindisplayorder1) {

		echo  "<img class=\"downbuttongrey\" src=\"../images/system/downgrey.png\">";
	
	} else {

		echo "<form action=\"udphoto.php\" method=\"post\" class=\"form\">";
		echo "<input type=\"submit\" value=\" \" class=\"downbutton\" name=\"downbutton\" title=\"$cdo\">";
		echo "<input type=\"hidden\" name=\"name\" value=\"$name\">";
		echo "<input type=\"hidden\" name=\"ain\" value=\"$ain\">";
		echo "<input type=\"hidden\" name=\"updown\" value=\"down\"></form>";
	}

	//Shorten name otherwise album doesn't render properly

		$size2 = strlen($name);

			if ($size2 >= 14) {

				$start2 = mb_substr($name, 0, 5);
				$end2 = mb_substr($name, -7);
				echo "$start2...$end2";

			} else {

				echo $name;

			}

		echo "</legend><div class=\"rootalbum\">";	

		if (mime_content_type("../images/gallery/$directory$name") == "video/ogg" || mime_content_type("../images/gallery/$directory$name") == "video/webm" || mime_content_type("../images/gallery/$directory$name") == "video/mp4") {

		echo "<a class=\"subalbums\" href=\"index.php?menu=photo&album=$album&ain=$ain&pin=$pin\">";	
		echo "<img class=\"photograph fade\" src=\"../images/system/play.png\"></div>";
		echo "</a>";

	} else {

		echo "<a class=\"subalbums\" href=\"index.php?menu=photo&album=$album&ain=$ain&pin=$pin\">";	
		echo "<img class=\"photograph fade\" src=\"../images/thumbnails/$name\"></div>";
		echo "</a>";

	}



		echo "</fieldset></div>";
}

?>