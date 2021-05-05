<?php

	// Display descending so newest album displays first

	$sql2 = "SELECT * FROM albums WHERE parentalbum = 'root' AND album != 'None' ORDER BY displayorder DESC LIMIT $newpage, $numpage";
	$result2 = mysqli_query($dbconnect, $sql2);
	while ($list2 = mysqli_fetch_array($result2)) {
		$ain = $list2['ain'];
		$pain = $list2['pain'];
		$album = $list2['album'];
	
		echo "<div class=\"orootalbum\">";
		echo "<fieldset class=\"adfieldset\"> <legend>";
		echo "<form action=\"delalbum.php\" class=\"form\" method=\"post\"";
				?> 
		onsubmit="return confirm('<?php echo $dletealbum; ?>');" 
				<?php
		echo "<input type=\"hidden\" name=\"pain\" value=\"1\"><input type=\"hidden\" name=\"ain\" value=\"$ain\"><input type=\"hidden\" name=\"album\" value=\"";
		echo $list2['album'];
		echo "\">";
		echo "<input type=\"submit\" value=\" \" class=\"deletebutton\" name=\"delete\" title=\"$adelete\"></form>";


	$sql6 = "SELECT status FROM albums WHERE ain = '$ain'";
	$result6 = mysqli_query($dbconnect, $sql6);
	$row6 = mysqli_fetch_row($result6);
		$status = $row6[0];

	if ($status == "public") {

		echo "<form action=\"pubpri.php\" method=\"post\" class=\"form\">";
		echo "<input type=\"submit\" value=\" \" class=\"pubbutton\" name=\"pubbutton\" title=\"$pub\">";
		echo "<input type=\"hidden\" name=\"pubpri\" value=\"makeprivate\">";
		echo "<input type=\"hidden\" name=\"album\" value=\"$album\">";
		echo "<input type=\"hidden\" name=\"page\" value=\"$page\">";
		echo "<input type=\"hidden\" name=\"ain\" value=\"";
		echo $list2['ain'];
		echo "\"></form>";

	} else {

		echo "<form action=\"pubpri.php\" method=\"post\" class=\"form\">";
		echo "<input type=\"submit\" value=\" \" class=\"pributton\" name=\"pributton\" title=\"$pri\">";
		echo "<input type=\"hidden\" name=\"pubpri\" value=\"makepublic\">";
		echo "<input type=\"hidden\" name=\"album\" value=\"$album\">";
		echo "<input type=\"hidden\" name=\"page\" value=\"$page\">";
		echo "<input type=\"hidden\" name=\"ain\" value=\"";
		echo $list2['ain'];
		echo "\"></form>";
	}


	$sql3 = "SELECT displayorder FROM albums WHERE ain = '$ain'";
	$result3 = mysqli_query($dbconnect, $sql3);
	$row3 = mysqli_fetch_row($result3);
		$displayorder =  $row3[0];
						
	$sql4 = "SELECT MIN(displayorder) FROM albums WHERE pain='$pain' AND album != 'None'";
	$result4 = mysqli_query($dbconnect, $sql4);
	$row4 = mysqli_fetch_row($result4);
		$mindisplayorder =  $row4[0];

	$sql5 = "SELECT MAX(displayorder) FROM albums WHERE pain='$pain'";
	$result5 = mysqli_query($dbconnect, $sql5);
	$row5 = mysqli_fetch_row($result5);
		$maxdisplayorder =  $row5[0];


	if ($displayorder == $maxdisplayorder) {

		echo  "<img class=\"upbuttongrey\" src=\"../images/system/upgrey.png\">";
		
	} else {

		echo "<form action=\"udalbum.php\" method=\"post\" class=\"form\">";
		echo "<input type=\"submit\" value=\" \" class=\"upbutton\" name=\"upbutton\" title=\"$cdo\">";
		echo "<input type=\"hidden\" name=\"updown\" value=\"up\">";
		echo "<input type=\"hidden\" name=\"pain\" value=\"1\">";
		echo "<input type=\"hidden\" name=\"page\" value=\"$page\">";
		echo "<input type=\"hidden\" name=\"pain\" value=\"1\">";
		echo "<input type=\"hidden\" name=\"ain\" value=\"";
		echo $list2['ain'];
		echo "\"></form>";
	}


	if ($displayorder == $mindisplayorder) {

		echo  "<img class=\"downbuttongrey\" src=\"../images/system/downgrey.png\">";
	
	} else {

		echo " <form action=\"udalbum.php\" method=\"post\" class=\"form\">";
		echo "<input type=\"submit\" value=\" \" class=\"downbutton\" name=\"downbutton\" title=\"$cdo\">";
		echo "<input type=\"hidden\" name=\"updown\" value=\"down\">";
		echo "<input type=\"hidden\" name=\"pain\" value=\"1\">";
		echo "<input type=\"hidden\" name=\"page\" value=\"$page\">";
		echo "<input type=\"hidden\" name=\"ain\" value=\"";
		echo $list2['ain'];
		echo "\"></form>";

	}

	//Shorten album name, if too long album won't render properly

	$size = strlen($album);

		if ($size >= 12) {

			$start = mb_substr($album, 0, 7);
			$end = mb_substr($album, -3);

				echo "$start...$end";

		} else {

				echo $album;
		}

		echo "</legend><div class=\"rootalbum\"> ";		
		echo "<a class=\"subalbums\" href=\"index.php?menu=subalbum&album=$album&ain=";
		echo $list2['ain']; 	
		echo "&page=1";
		echo "\"><img class=\"albumcover fade\" src=\"../images/system/album.png\"><span class=\"sub\"></span><br>";
		echo "</a><br>";
		echo "</form>";
		echo "<br><div class=\"more\">";
		echo "<a class=\"subalbums\" href=\"index.php?menu=subalbum&album=&ain=";
		echo $list2['ain']; 
		echo "&page=1";		
		echo "\">$viewcreate";
		echo "</a><br />";
		echo "</div></div></fieldset></div>";	
}

?>