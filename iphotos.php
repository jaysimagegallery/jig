<?php

if  (isset($_SESSION['musername']) || $_SESSION['ausername'] == "$adminusername") {

	/* Display descending so newest photo displays first */
	$sql11 = "SELECT * FROM photos WHERE ain = 1 ORDER BY displayorder DESC LIMIT $newpicpage, $picpage";
	$result11 = mysqli_query($dbconnect, $sql11);
		while ($list11 = mysqli_fetch_array($result11)) {
			$name = $list11['name'];
			$pin = $list11['pin'];
			$directory = $list11['albumdir'];
		
			echo "<div class=\"orootalbum\"><fieldset class=\"fieldset\"> <legend>";
			//Shorten name if it is too long, otherwise thumnails don't render properly					
			$size2 = strlen($name);

				if ($size2 >= 22) {

					$start2 = mb_substr($name, 0, 13);
					$end2 = mb_substr($name, -7);
			echo "$start2...$end2";

			} else {
				echo $name;
			}
			
			echo " </legend><div class=\"rootalbum\"> ";	


				if (mime_content_type("images/gallery/$name") == "video/ogg" || mime_content_type("images/gallery/$name") == "video/webm" || mime_content_type("images/gallery/$name") == "video/mp4") {

			echo "<a href=\"index.php?album=root&ain=1&pin=$pin\"><img class=\"photograph fade\" src=\"images/system/play.png\"></a><div>";
		
		} else {



			echo "<a href=\"index.php?album=root&ain=1&pin=$pin\"><img class=\"photograph fade\" src=\"images/thumbnails/$directory$name\"></a></div>";
			}
			echo "</fieldset></div>";

			}
	} else {

/* If anonymous only show public photos */
	$sql12 = "SELECT * FROM photos WHERE ain = 1 AND status = 'public' ORDER BY displayorder DESC LIMIT $newpicpage, $picpage";
	$result12 = mysqli_query($dbconnect, $sql12);
		while ($list12 = mysqli_fetch_array($result12)) {
			$name = $list12['name'];
			$pin = $list12['pin'];
			$directory = $list12['albumdir'];
								
			echo "<div class=\"orootalbum\"><fieldset class=\"fieldset\"> <legend>";
			
			//Shorten name if it is too long, otherwise thumnails don't render properly				
			$size2 = strlen($name);

				if ($size2 >= 22) {
					$start2 = mb_substr($name, 0, 13);
					$end2 = mb_substr($name, -7);
			echo "$start2...$end2";
		} else {
				echo $name;
		}
			
			echo " </legend><div class=\"rootalbum\"> ";		
				if (mime_content_type("images/gallery/$name") == "video/ogg" || mime_content_type("images/gallery/$name") == "video/webm" || mime_content_type("images/gallery/$name") == "video/mp4") {

			echo "<a href=\"index.php?album=root&ain=1&pin=$pin\"><img class=\"photograph fade\" src=\"images/system/play.png\"></a><div>";
		
		} else {



			echo "<a href=\"index.php?album=root&ain=1&pin=$pin\"><img class=\"photograph fade\" src=\"images/thumbnails/$directory$name\"></a></div>";
			}
			echo "</fieldset></div>";

			
	}
}

?>