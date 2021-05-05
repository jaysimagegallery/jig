<?php

// Display descending so newest album displays first 

/* Display everything if admin or member */

if  (isset($_SESSION['musername']) || $_SESSION['ausername'] == "$adminusername") {

	$sql5 = "SELECT * FROM albums WHERE pain = '$ain' ORDER BY displayorder DESC LIMIT $newpage, $numpage";
	$result5 = mysqli_query($dbconnect, $sql5);
	while ($list5 = mysqli_fetch_array($result5)) {
		$album = $list5['album']; 

		echo "<div class=\"orootalbum\"><fieldset class=\"fieldset\"> <legend>";
		
			// Shorten name if it is too long, otherwise album doesn't render properly
			$size = strlen($album);
			
				if ($size >= 20) {

					$start = mb_substr($album, 0, 15);
					$end = mb_substr($album, -3);

					echo "$start...$end";
			
				} else {
				
					echo $album;
				}
		
		echo " </legend> <div class=\"rootalbum\">";		
		echo "<a class=\"subalbums\" href=\"index.php?album=";
		echo $list5['album'];
		echo "&ain=";
		echo $list5['ain'];
			echo "&page=1";
		echo "\"><img class=\"albumcover fade\" src=\"images/system/album.png\" alt=\"\"></a><br>";
		echo "<input type=\"hidden\" name=\"albums\" value=\"";
		echo $list5['album']; 
		echo "\">";
		echo "<br><div class=\"more\">";
		echo "<a class=\"subalbums\" href=\"index.php?album=";
		echo $list5['album'];
		echo "&ain=";
		echo $list5['ain'];
		echo "&page=1";
		echo "\">$viewphotos";
		echo "</a><br>";
		echo "</div></div></fieldset></div>";	

	}

} else {

// Only show public folders for anonymous users


	$sql5 = "SELECT * FROM albums WHERE pain = '$ain' AND status = 'public' ORDER BY displayorder DESC LIMIT $newpage, $numpage";
	$result5 = mysqli_query($dbconnect, $sql5);
	while ($list5 = mysqli_fetch_array($result5)) {
			$album = $list5['album']; 

		echo "<div class=\"orootalbum\"><fieldset class=\"fieldset\"> <legend>";

		// Shorten name if it is too long, otherwise album doesn't render properly
		$size = strlen($album);
							
				if ($size >= 20) {

					$start = mb_substr($album, 0, 15);
					$end = mb_substr($album, -3);

					echo "$start...$end";
			
				} else {
					echo $album;
				}	 

		echo " </legend> <div class=\"rootalbum\">";		
		echo "<a class=\"subalbums\" href=\"index.php?album=";
		echo $list5['album'];
		echo "&ain=";
		echo $list5['ain'];
		echo "&page=1";
		echo "\"><img class=\"albumcover fade\" src=\"images/system/album.png\" alt=\"\"></a><br>";
		echo "<input type=\"hidden\" name=\"albums\" value=\"";
		echo $list5['album']; 
		echo "\">";
		echo "<br><div class=\"more\">";
		echo "<a class=\"subalbums\" href=\"index.php?album=";
		echo $list5['album'];
		echo "&ain=";
		echo $list5['ain'];
		echo "&page=1";
		echo "\">$viewphotos";
		echo "</a><br>";
		echo "</div></div></fieldset></div>";	

	}
}


?>