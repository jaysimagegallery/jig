<?php

$album = $_GET['album'];

if  (isset($_SESSION['musername']) || $_SESSION['ausername'] == "$adminusername") {

	// Display descending so newest photo displays first
	$sql6 = "SELECT * FROM photos WHERE ain = '$ain' ORDER BY displayorder DESC LIMIT $newpicpage, $picpage";
	$result6 = mysqli_query($dbconnect, $sql6);
	while ($list6 = mysqli_fetch_array($result6)) {
			$name = $list6['name'];
			$pin = $list6['pin'];
	
	$sql7 = "SELECT * FROM albums WHERE ain = '$ain'";
	$result7 = mysqli_query($dbconnect, $sql7);
	while ($list7 = mysqli_fetch_array($result7)) {
			$albumdir = $list7['albumdir'];
	
		echo "<div class=\"orootalbum\"><fieldset class=\"fieldset\"> <legend>";
	
		// Shorten name if it is too long, otherwise album doesn't render properly

		$size2 = strlen($name);

			if ($size2 >= 22) {

					$start2 = mb_substr($name, 0, 13);
					$end2 = mb_substr($name, -7);

					echo "$start2...$end2";
			
			} else {
				echo $name;
			}
		
		echo " </legend><div class=\"rootalbum\"> ";	

if (mime_content_type("images/gallery$albumdir/$name") == "video/ogg" || mime_content_type("images/gallery$albumdir/$name") == "video/webm" || mime_content_type("images/gallery$albumdir/$name") == "video/mp4") {

			echo "<a href=\"index.php?album=$album&ain=$ain&pin=$pin\"><img class=\"photograph fade\" src=\"images/system/play.png\"></a></div>";
		
		} else {




		echo "<a href=\"index.php?album=$album&ain=$ain&pin=$pin\"><img class=\"photograph fade\" src=\"images/gallery$albumdir/$name\"></a></div>";
	}
		echo "</fieldset></div>";
		}
	}
} else {

	/* Display descending so newest photo displays first */
	$sql7 = "SELECT * FROM photos WHERE ain = '$ain' AND status = 'public' ORDER BY displayorder DESC LIMIT $newpicpage, $picpage";
	$result7 = mysqli_query($dbconnect, $sql7);
	while ($list7 = mysqli_fetch_array($result7)) {
			$name = $list7['name'];
			$pin = $list7['pin'];
	
	$sql8 = "SELECT * FROM albums WHERE ain = '$ain'";
	$result8 = mysqli_query($dbconnect, $sql8);
	while ($list8 = mysqli_fetch_array($result8)) {
			$albumdir = $list8['albumdir'];

		echo "<div class=\"orootalbum\"><fieldset class=\"fieldset\"> <legend>";
		

		// Shorten name if it is too long, otherwise album doesn't render properly

		$size2 = strlen($name);
			
			if ($size2 >= 22) {

				$start2 = mb_substr($name, 0, 13);
				$end2 = mb_substr($name, -7);

				echo "$start2...$end2";
			
			} else {
				echo $name;
			}
	
		echo " </legend><div class=\"rootalbum\"> ";		
		if (mime_content_type("images/gallery$albumdir/$name") == "video/ogg" || mime_content_type("images/gallery$albumdir/$name") == "video/webm" || mime_content_type("images/gallery$albumdir/$name") == "video/mp4") {

			echo "<a href=\"index.php?album=$album&ain=$ain&pin=$pin\"><img class=\"photograph fade\" src=\"images/system/play.png\"></a><div>";
		
		} else {



			echo "<a href=\"index.php?album=$album&ain=$ain&pin=$pin\"><img class=\"photograph fade\" src=\"images/gallery$albumdir/$name\"></a></div>";
			}
			echo "</fieldset></div>";
		}
	}
}

?>