<?php
/* If member or admin is logged in show all albums*/
if  (isset($_SESSION['musername']) || $_SESSION['ausername'] == "$adminusername") {
			
/* Display descending so newest album displays first */
	$sql5 = "SELECT * FROM albums WHERE parentalbum = 'root' AND album != 'None' ORDER BY displayorder DESC LIMIT $newpage, $numpage";
	$result5 = mysqli_query($dbconnect, $sql5);
		while ($list5 = mysqli_fetch_array($result5)) {
			$album = $list5['album'];
			
			echo "<div class=\"orootalbum\"><fieldset class=\"fieldset\"> <legend>";

			//Shorten name if it is too long, otherwise albums don't render properly
				$size = strlen($album);
					if ($size >= 20) {
						$start = mb_substr($album, 0, 15);
						$end = mb_substr($album, -3);
						echo "$start...$end";
				
					} else {
				echo $album;
					}
			echo "</legend><div class=\"rootalbum\"> ";	
			echo "<a class=\"subalbums\" href=\"index.php?album=";
			echo $album;
			echo "&ain=";
			echo $list5['ain'];
			echo "&page=1";
			echo "\"><img class=\"albumcover fade\" src=\"images/system/album.png\">";
			echo "</a><br />";
			echo "<br /><div class=\"more\">";
			echo "<a class=\"subalbums\" href=\"index.php?album=";
			echo $album;
			echo "&ain=";
			echo $list5['ain'];
			echo "&page=1";
			echo "\">$viewphotos";
			echo "</a><br />";
			echo "</div></div></fieldset class=\"fieldset\"></div>";	
}
	} else {

/* If anonymous user only show public albums */

	$sql8 = "SELECT * FROM albums WHERE parentalbum = 'root' AND album != 'None' AND status = 'public' ORDER BY displayorder DESC LIMIT $newpage, $numpage";
	$result8 = mysqli_query($dbconnect, $sql8);
		while ($list8 = mysqli_fetch_array($result8)) {
			$album = $list8['album']; 
	
			echo "<div class=\"orootalbum\"><fieldset class=\"fieldset\"> <legend>";

		//Shorten name if it is too long, otherwise albums don't render properly					
		$size = strlen($album);
			if ($size >= 20) {
				$start = mb_substr($album, 0, 15);
				$end = mb_substr($album, -3);
			echo "$start...$end";
			} else {
			echo $album;
			}
				
			echo " </legend><div class=\"rootalbum\"> ";	
			echo "<a class=\"subalbums\" href=\"index.php?album=";
			echo $list8['album'];
			echo "&ain=";
			echo $list8['ain'];
			echo "&page=1";
			echo "\"><img class=\"albumcover fade\" src=\"images/system/album.png\">";
			echo "</a><br>";
			echo "<br /><div class=\"more\">";
			echo "<a class=\"subalbums\" href=\"index.php?album=";
			echo $album;
			echo "&ain=";
			echo $list8['ain'];
			echo "&page=1";
			echo "\">$viewphotos";
			echo "</a><br>";
			echo "</div></div></fieldset class=\"fieldset\"></div>";	
}
}

?>