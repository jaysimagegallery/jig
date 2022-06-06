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

$pin = $_GET['pin'];
$album = $_GET['album'];
$ain = $_GET['ain'];




?>

<br>

<div class="breadcrumb">


<?php
	$sql0 = "SELECT name,photodir FROM photos WHERE pin='$pin'";
		$result0 = mysqli_query($dbconnect, $sql0);
		$row0 = mysqli_fetch_row($result0);
			$name = $row0[0];
			$photodir = $row0[1];

	if ($photodir == "/") {
		echo "&nbsp;$photodir$name";
	} else {
		echo "&nbsp;$photodir/$name";
	}

?>
</div>
<br>
<?php
			$descrip = $_GET['change'];
			if ($descrip == "successfully") {
			echo "<div class=\"success\"><img class=\"checkmark\" src=\"../images/system/checkmark.png\"> $notice44</div>";
			}

			$iminfo = $_GET['change'];
			if ($iminfo == "infosuccess") {
			echo "<div class=\"success\"><img class=\"checkmark\" src=\"../images/system/checkmark.png\"> $notice45</div>";
			}
?>
<br>
<div class="yourphotoadmin">
<?php
	if ($photodir == "/") {


		if (mime_content_type("../images/gallery/$directory$name") == "video/ogg" || mime_content_type("../images/gallery/$directory$name") == "video/webm" || mime_content_type("../images/gallery/$directory$name") == "video/mp4") {

			echo "<video class=\"photopageadmin fade\" src=\"../images/gallery$photodir$name\" controls></video>";
		
		} else {

	echo "<img class=\"photopageadmin fade\" src=\"../images/gallery$photodir$name\">";

		}

} else {

		if (mime_content_type("../images/gallery$photodir/$name") == "video/ogg" || mime_content_type("../images/gallery$photodir/$name") == "video/webm" || mime_content_type("../images/gallery$photodir/$name") == "video/mp4") {

			echo "<video class=\"photopageadmin fade\" src=\"../images/gallery$photodir/$name\" controls></video>";
		
		} else {

	echo "<img class=\"photopageadmin fade\" src=\"../images/gallery$photodir/$name\">";
}
}
?>
</div>
<div class="yourphotodescription fade">
<?php echo $descriptiontitle; ?>
<br>
<?php
$sql1 = "SELECT description,enablegps FROM photos WHERE pin='$pin'";
		$result1 = mysqli_query($dbconnect, $sql1);
		$row1 = mysqli_fetch_row($result1);
			$description = $row1[0];
			$enablegps = $row1[1];

?>
<form action="updesc.php" method="post">
<textarea maxlength="4990" name="description" class="desctext" placeholder="<?php echo $photodesc; ?>"><?php echo strip_tags($description); ?></textarea>
<input name="submit" type="submit" class="subdesc" value="<?php echo $button4; ?>">
<input type="hidden" name="pin" value="<?php echo $pin; ?>">
<input type="hidden" name="album" value="<?php echo $album; ?>">
<input type="hidden" name="ain" value="<?php echo $ain; ?>">
</form>      


<br>
</div>

<?php

	$sql1 = "SELECT * FROM photos WHERE pin = '$pin'";
		$result1 = mysqli_query($dbconnect, $sql1);
		while ($list1 = mysqli_fetch_array($result1)) {
			$name = $list1['name'];
			$photodir = $list1['photodir'];
			$ain = $list1['ain'];
			$status = $list1['status'];
			$photodate = $list1['photodate'];
			$cameramake = $list1['cameramake'];
			$cameramodel = $list1['cameramodel'];
			$orientation = $list1['orientation'];
			$iscolor = $list1['iscolor'];
			$xres = $list1['xres'];
			$yres = $list1['yres'];
			$resolutionunit = $list1['resolutionunit'];
			$focusdistance = $list1['focusdistance'];
			$focallength = $list1['focallength'];
			$software = $list1['software'];
			$apfnumber = $list1['apfnumber'];
			$apvalue = $list1['apvalue'];
			$shutterspeed = $list1['shutterspeed'];
			$brightnessvalue = $list1['brightnessvalue'];
			$sharpness = $list1['sharpness'];
			$colorspace = $list1['colorspace'];
			$interoperabilityindex = $list1['interoperabilityindex'];
			$interoperabilityversion = $list1['interoperabilityversion'];
			$scenecapturetype = $list1['scenecapturetype'];
			$exposuretime = $list1['exposuretime'];
			$flash = $list1['flash'];
			$saturation = $list1['saturation'];
			$whitebalance = $list1['whitebalance'];
			$subjectdistance = $list1['subjectdistance'];
			$isospeedratings = $list1['isospeedratings'];
			$contrast = $list1['contrast'];		
			$latdeg = $list1['latdeg'];
			$latmin = $list1['latmin'];
			$latsec = $list1['latsec'];
			$latsign = $list1['latsign'];
			$gpslatref = $list1['gpslatref'];
			$londeg = $list1['londeg'];
			$lonmin = $list1['lonmin'];
			$lonsec = $list1['lonsec'];
			$lonsign = $list1['lonsign'];
			$gpslonref = $list1['gpslonref'];
			$altitude = $list1['gpsaltitude'];
			$altref = $list1['altref'];
			$fl35mm = $list1['fl35mm'];
			$metering = $list1['metering'];
			$subsectime = $list1['subsectime'];
			$subsectimeoriginal = $list1['subsectimeoriginal'];
			$subsectimedigitized = $list1['subsectimedigitized'];
			$flashpixversion = $list1['flashpixversion'];
			$imageuniqueid = $list1['imageuniqueid'];
			$exifver = $list1['exifver'];
			$componentsconfiguration = $list1['componentsconfiguration'];
			$ycbcrpositioning = $list1['ycbcrpositioning'];
			$scenetype = $list1['scenetype'];
			$exposurebiasvalue = $list1['exposurebiasvalue'];
			$exposuremode = $list1['exposuremode'];
			$lightsource = $list1['lightsource'];
			$filesource = $list1['filesource'];
			$digitalzoomratio = $list1['digitalzoomratio'];
			$customrendered = $list1['customrendered'];
			$compressedbitsperpixel = $list1['compressedbitsperpixel'];
			$maxaperturevalue = $list1['maxaperturevalue'];
			$exposureprogram = $list1['exposureprogram'];
			$description = $list1['description'];
			$enablegps = $list1['enablegps'];
			$showphotodate = $list1['showphotodate'];
			$showcameramake = $list1['showcameramake'];
			$showcameramodel = $list1['showcameramodel'];
			$showorientation = $list1['showorientation'];
			$showiscolor = $list1['showiscolor'];
			$showxres = $list1['showxres'];
			$showyres = $list1['showyres'];
			$showresolutionunit = $list1['showresolutionunit'];
			$showfocusdistance = $list1['showfocusdistance'];
			$showfocallength = $list1['showfocallength'];
			$showsoftware = $list1['showsoftware'];
			$showaperturefnumber = $list1['showaperturefnumber'];
			$showaperturevalue = $list1['showaperturevalue'];
			$showshutterspeed = $list1['showshutterspeed'];
			$showbrightnessvalue = $list1['showbrightnessvalue'];
			$showsharpness = $list1['showsharpness'];
			$showcolorspace = $list1['showcolorspace'];
			$showscenecapturetype = $list1['showscenecapturetype'];
			$showexposuretime = $list1['showexposuretime'];
			$showflash = $list1['showflash'];
			$showsaturation = $list1['showsaturation'];
			$showwhitebalance = $list1['showwhitebalance'];
			$showinteroperabilityindex = $list1['showinteroperabilityindex'];
			$showinteroperabilityversion = $list1['showinteroperabilityversion'];
			$showsubjectdistance = $list1['showsubjectdistance'];
			$showisospeedratings = $list1['showisospeedratings'];
			$showcontrast = $list1['showcontrast'];
			$showfl35mm = $list1['showfl35mm'];
			$showmetering = $list1['showmetering'];
			$showsubsectime = $list1['showsubsectime'];
			$showsubsectimeoriginal = $list1['showsubsectimeoriginal'];
			$showsubsectimedigitized = $list1['showsubsectimedigitized'];
			$showflashpixversion = $list1['showflashpixversion'];
			$showimageuniqueid = $list1['showimageuniqueid'];
			$showexifver = $list1['showexifver'];
			$showcomponentsconfiguration = $list1['showcomponentsconfiguration'];
			$showycbcrpositioning = $list1['showycbcrpositioning'];
			$showscenetype = $list1['showscenetype'];
			$showexposurebiasvalue = $list1['showexposurebiasvalue'];
			$showexposuremode = $list1['showexposuremode'];
			$showlightsource = $list1['showlightsource'];
			$showfilesource = $list1['showfilesource'];
			$showdigitalzoomratio = $list1['showdigitalzoomratio'];
			$showcustomrendered = $list1['showcustomrendered'];
			$showcompressedbitsperpixel = $list1['showcompressedbitsperpixel'];
			$showmaxaperturevalue = $list1['showmaxaperturevalue'];
			$showexposureprogram = $list1['showexposureprogram'];
			$showgpsaltitude = $list1['showgpsaltitude'];
			$showname = $list1['showname'];
			$showmimetype = $list1['showmimetype'];
			$showdimensions = $list1['showdimensions'];
			$showsize = $list1['showsize'];
}
?>


<div class="photoinfo">

<?php
	if ($photodir == "/") {
	$image = "../images/gallery$photodir$name";
	
} else {
	$image = "../images/gallery$photodir/$name";
}
	$exif = exif_read_data($image, 0, true);

?>
<br>
<div class="thephotoinfo">
<form action="upphotoinfo.php" method="post">
	<fieldset class="pfs">
		<legend><a id="post"></a><?php echo $imageinfo; ?></legend>
<div class="fade">
	

<?php 

//Photo name
echo "<div class=\"column1\">";
		echo "<input class=\"exifinfo\" type=\"checkbox\" name=\"showname\" value=\"yes\" title=\"$endis\""; ?> <?php if ($showname == "yes") { echo "checked"; } ?> <?php echo "\"> $photoname: "; 

		echo basename("$image"); 

		 
echo "</div>";

// Date photo was taken

 			
echo "<div class=\"column1\">";

				echo "<input class=\"exifinfo\" type=\"checkbox\" name=\"showphotodate\" value=\"yes\" title=\"$endis\""; ?> <?php if ($showphotodate == "yes") { echo "checked"; } ?> <?php echo "\"> $phdate: ";

			if ($photodate == "") { 
				echo $unavailable; 
			} else { 
				$convertphotodate = date("D M jS, Y @ g:i a", strtotime($photodate));
				echo $convertphotodate;
			} 

	 
echo "</div>";


// Unique ID

	echo "<div class=\"column1\">";

		echo "<input class=\"exifinfo\" type=\"checkbox\" name=\"showimageuniqueid\" value=\"yes\" title=\"$endis\""; ?> <?php if ($showimageuniqueid == "yes") { echo "checked"; } ?> <?php echo "\"> $titleiuid: "; 

	if ($imageuniqueid == "") { 
		echo $unavailable; 
	} else { 
		echo $imageuniqueid; 
	} 


	 echo "</div>";


// File size in MB
echo "<div class=\"column1\">";
			echo "<input class=\"exifinfo\" type=\"checkbox\" name=\"showsize\" value=\"yes\" title=\"$endis\""; ?> <?php if ($showsize == "yes") { echo "checked"; } ?> <?php echo "\"> $photosize: ";

				$fsb = filesize ("$image");
				$fsmb = $fsb / 1000000;	
				$fskb = $fsb / 1000;


			if ($fsb == "") {	
					
				echo $unavailable; 

			}	elseif (substr($fsmb, 0, 1) == "0") {


				echo round ($fskb, 6);
				echo " KB";


			} else {
				
				echo round($fsmb, 6);
				echo " MB";

			}


 				 
echo "</div>";

//Camera Make

	echo "<div class=\"column1\">";

		echo "<input class=\"exifinfo\" type=\"checkbox\" name=\"showcameramake\" value=\"yes\" title=\"$endis\""; ?> <?php if ($showcameramake == "yes") { echo "checked"; } ?> <?php echo "\"> $cammake: "; 

	if ($cameramake == "") { 
		echo $unavailable; 
	} else { 
		echo $cameramake; 
	} 


	 echo "</div>";


// Camera Model	

 echo "<div class=\"column1\">";
				echo "<input class=\"exifinfo\" type=\"checkbox\" name=\"showcameramodel\" value=\"yes\" title=\"$endis\""; ?> <?php if ($showcameramodel == "yes") { echo "checked"; } ?> <?php echo "\"> $cammod: ";

	if ($cameramodel == "") { 
		echo $unavailable; 
	} else { 
		echo $cameramodel; 
	} 

 echo "</div>";

//Mime type
echo "<div class=\"column1\">";
echo "<input class=\"exifinfo\" type=\"checkbox\" name=\"showmimetype\" value=\"yes\" title=\"$endis\""; ?> <?php if ($showmimetype == "yes") { echo "checked"; } ?> <?php echo "\"> $mimtype: ";

	if (mime_content_type("$image") == "") { 
		echo $unavailable; 
	} else { 
		echo mime_content_type("$image"); 
	} 
echo "</div>";



echo "<div class=\"column1\">";
			echo "<input class=\"exifinfo\" type=\"checkbox\" name=\"showdimensions\" value=\"yes\" title=\"$endis\""; ?> <?php if ($showdimensions == "yes") { echo "checked"; } ?> <?php echo "\"> $photodim: ";
		
	list($width, $height) = getimagesize("$image");

	if ($width == "" || $height == "") {
		echo $unavailable; 
	} else {
		echo "$width"; 
		echo "px $by ";
		echo "$height";
		echo "px";
	}


echo "</div>";
		

// File source
echo "<div class=\"column1\">";

				echo "<input class=\"exifinfo\" type=\"checkbox\" name=\"showfilesource\" value=\"yes\" title=\"$endis\""; ?> <?php if ($showfilesource == "yes") { echo "checked"; } ?> <?php echo "\"> $titlefs: "; 

	if ($filesource == "") { 
		echo $unavailable; 
	} else { 
		echo "Digital Still Camera"; 
	} 


	 echo "</div>";

//Resolution

	
		echo "<div class=\"column1\">";

			echo "<input class=\"exifinfo\" type=\"checkbox\" name=\"showxres\" value=\"yes\" title=\"$endis\""; ?> <?php if ($showxres == "yes") { echo "checked"; } ?> <?php echo "\"> $xyres: ";

			if ($xresolution == "" OR $yresolution == "") {

			} else {

		$xresolution = explode('/', $xres);
		$thex = ($xresolution[0] / $xresolution[1]);

		$yresolution = explode('/', $yres);
		$they = ($yresolution[0] / $yresolution[1]);


		if ($thex == "" || $they == "" || is_nan($thex) || is_nan($they)) { 
				echo $unavailable; 
			} else { 
				echo " X = ";
				echo $thex; 

				if ($resolutionunit == "2") {
					echo " PPI";
				} elseif($resolutionunit == "3") {
					echo " PPC";
				}

				echo "&nbsp; Y = ";
				echo $they;

				if ($resolutionunit == "2") {
					echo " PPI";
				} elseif($resolutionunit == "3") {
					echo " PPC";
				}

			} 
}
			 echo "</div>";

//orientation

echo "<div class=\"column1\">";

				echo "<input class=\"exifinfo\" type=\"checkbox\" name=\"showorientation\" value=\"yes\" title=\"$endis\""; ?> <?php if ($showorientation == "yes") { echo "checked"; } ?> <?php echo "\"> $titleorient: ";

			if ($orientation == "") { 
				echo $unavailable; 
			} elseif ($orientation == "1") { 
				echo $topleft; 
			} elseif ($orientation == "2") {
				echo $topright;
			} elseif ($orientation == "3") { 
				echo $botright; 
			} elseif ($orientation == "4") {
				echo $botleft;
			} elseif ($orientation == "5") { 
				echo $lefttop; 
			} elseif ($orientation == "6") {
				echo $righttop;
			} elseif ($orientation == "7") { 
				echo $rightbot; 
			} elseif ($orientation == "8") {
				echo $leftbot;
			} else {
				echo $orientation;
			}

	 
echo "</div>";


//is color
echo "<div class=\"column1\">";

				echo "<input class=\"exifinfo\" type=\"checkbox\" name=\"showiscolor\" value=\"yes\" title=\"$endis\""; ?> <?php if ($showiscolor == "yes") { echo "checked"; } ?> <?php echo "\"> $titleic: ";

			if ($iscolor == "") { 
				echo $unavailable; 
			} elseif ($iscolor == "0") { 
				echo $notcolor; 
			} elseif ($iscolor == "1") {
				echo $itscolor;
			} else {
				echo $iscolor;
			}

	 
echo "</div>";


echo "<div class=\"column1\">";
			 echo "<input class=\"exifinfo\" type=\"checkbox\" name=\"showcolorspace\" value=\"yes\" title=\"$endis\""; ?> <?php if ($showcolorspace == "yes") { echo "checked"; } ?> <?php echo "\"> $titlecolsp: ";

			if ($colorspace == "") { 
				echo $unavailable; 
			} elseif ($colorspace == "1") { 
				echo "sRGB"; 
			} elseif ($colorspace == "65535") {
				echo "Uncalibrated";
			} else {
				echo $colorspace;
			}

 echo "</div>";


// Software	


		 echo "<div class=\"column1\">";
		 echo "<input class=\"exifinfo\" type=\"checkbox\" name=\"showsoftware\" value=\"yes\" title=\"$endis\""; ?> <?php if ($showsoftware == "yes") { echo "checked"; } ?> <?php echo "\"> $titlesoftware: ";


		if ($software == "") { 
				echo $unavailable; 
			} else { 
				echo $software; 
			} 

			  echo "</div>";


// ycbcrpositioning	

	 echo "<div class=\"column1\">";
		 echo "<input class=\"exifinfo\" type=\"checkbox\" name=\"showycbcrpositioning\" value=\"yes\" title=\"$endis\""; ?> <?php if ($showycbcrpositioning == "yes") { echo "checked"; } ?> <?php echo "\"> $titleycbcrpositioning: ";


		if ($ycbcrpositioning == "") { 
				echo $unavailable; 
			} elseif ($ycbcrpositioning == "1") { 
				echo "Center"; 
			} elseif ($ycbcrpositioning == "2") {
				echo "Cosited";
			} else {
				echo $ycbcrpositioning;
			}

			  echo "</div>";


// componentsconfiguration

	 echo "<div class=\"column1\">";
		 echo "<input class=\"exifinfo\" type=\"checkbox\" name=\"showcomponentsconfiguration\" value=\"yes\" title=\"$endis\""; ?> <?php if ($showcomponentsconfiguration == "yes") { echo "checked"; } ?> <?php echo "\"> $titlecomcon: ";

			if ($componentsconfiguration == "") { 
				echo $unavailable; 
			} else { 
				$ccarray = str_split($componentsconfiguration);

				$a = $ccarray[0]; 
				$b = $ccarray[1];
				$c = $ccarray[2]; 
				$d = $ccarray[3];
				$e = $ccarray[4]; 
				$f = $ccarray[5];
				$g = $ccarray[6]; 
				$h = $ccarray[7];

				$one = "$a$b";
				$two = "$c$d";
				$three = "$e$f";
				$four = "$g$h";
				
				if ($one == "00") {
					echo "-";
				} elseif ($one == "01") {
					echo "Y";
				} elseif ($one == "02") {
					echo "Cb";
				} elseif ($one == "03") {
					echo "Cr";
				} elseif ($one == "04") {
					echo "R";
				} elseif ($one == "05") {
					echo "G";
				} elseif ($one == "06") {
					echo "B";
				} elseif ($one == "Other") {
					echo "Res";
				}

				if ($two == "00") {
					echo " -";
				} elseif ($two == "01") {
					echo " Y";
				} elseif ($two == "02") {
					echo " Cb";
				} elseif ($two == "03") {
					echo " Cr";
				} elseif ($two == "04") {
					echo " R";
				} elseif ($two == "05") {
					echo " G";
				} elseif ($two == "06") {
					echo " B";
				} elseif ($two == "Other") {
					echo " Res";
				}

				if ($three == "00") {
					echo " -";
				} elseif ($three == "01") {
					echo " Y";
				} elseif ($three == "02") {
					echo " Cb";
				} elseif ($three == "03") {
					echo " Cr";
				} elseif ($three == "04") {
					echo " R";
				} elseif ($three == "05") {
					echo " G";
				} elseif ($three == "06") {
					echo " B";
				} elseif ($three == "Other") {
					echo " Res";
				}

				if ($four == "00") {
					echo " -";
				} elseif ($four == "01") {
					echo " Y";
				} elseif ($four == "02") {
					echo " Cb";
				} elseif ($four == "03") {
					echo " Cr";
				} elseif ($four == "04") {
					echo " R";
				} elseif ($four == "05") {
					echo " G";
				} elseif ($four == "06") {
					echo " B";
				} elseif ($four == "Other") {
					echo " Res";
				}


			} 

	 echo "</div>";


// subsectime

	echo "<div class=\"column1\">";

		echo "<input class=\"exifinfo\" type=\"checkbox\" name=\"showsubsectime\" value=\"yes\" title=\"$endis\""; ?> <?php if ($showsubsectime == "yes") { echo "checked"; } ?> <?php echo "\"> $titlesubsectime: "; 

	if ($subsectime == "") { 
		echo $unavailable; 
	} else { 
		echo $subsectime; 
	} 


	 echo "</div>";

// subsectimeoriginal

	echo "<div class=\"column1\">";

		echo "<input class=\"exifinfo\" type=\"checkbox\" name=\"showsubsectimeoriginal\" value=\"yes\" title=\"$endis\""; ?> <?php if ($showsubsectimeoriginal == "yes") { echo "checked"; } ?> <?php echo "\"> $titlesubsectimeoriginal: "; 

	if ($subsectimeoriginal == "") { 
		echo $unavailable; 
	} else { 
		echo $subsectimeoriginal; 
	} 


	 echo "</div>";

// Unique ID

	echo "<div class=\"column1\">";

		echo "<input class=\"exifinfo\" type=\"checkbox\" name=\"showsubsectimedigitized\" value=\"yes\" title=\"$endis\""; ?> <?php if ($showsubsectimedigitized == "yes") { echo "checked"; } ?> <?php echo "\"> $titlesubsectimedigitized: "; 

	if ($subsectimedigitized == "") { 
		echo $unavailable; 
	} else { 
		echo $subsectimedigitized; 
	} 


	 echo "</div>";



// Focus Distance

		
echo "<div class=\"column1\">";
				echo "<input class=\"exifinfo\" type=\"checkbox\" name=\"showfocusdistance\" value=\"yes\" title=\"$endis\""; ?> <?php if ($showfocusdistance == "yes") { echo "checked"; } ?> <?php echo "\"> $titlefdist: ";

			if ($focusdistance == "") { 
				echo $unavailable; 
			} else { 
				echo $focusdistance; 
			} 

	 echo "</div>";


// Focal Length

	

		echo "<div class=\"column1\">";
				echo "<input class=\"exifinfo\" type=\"checkbox\" name=\"showfocallength\" value=\"yes\" title=\"$endis\""; ?> <?php if ($showfocallength == "yes") { echo "checked"; } ?> <?php echo "\"> $titleflength: ";

				if ($focallength == "") {

				} else {

				$foclen = explode('/', $focallength);
				$fc = ($foclen[0] / $foclen[1]);
}

			if ($focallength == "" || is_nan($fc)) { 
				echo $unavailable; 
			} else { 
				echo "$fc mm"; 
			} 
 echo "</div>";


// 35mm

			

				 echo "<div class=\"column1\">";
				echo "<input class=\"exifinfo\" type=\"checkbox\" name=\"showfl35mm\" value=\"yes\" title=\"$endis\""; ?> <?php if ($showfl35mm == "yes") { echo "checked"; } ?> <?php echo "\"> $title35: ";

			if ($fl35mm == "") { 
				echo $unavailable; 
			} else { 
				echo "$fl35mm mm"; 
			} 

			 echo "</div>";




// Aperature Value
		
				
echo "<div class=\"column1\">";
				echo "<input class=\"exifinfo\" type=\"checkbox\" name=\"showaperturevalue\" value=\"yes\" title=\"$endis\""; ?> <?php if ($showaperturevalue == "yes") { echo "checked"; } ?> <?php echo "\"> $titleaplength: ";

				if ($av == "") {

				} else {

				$apval = explode('/', $apvalue);
				$av = ($apval[0] / $apval[1]);
}
			if ($av == "" || is_nan($av)) { 
				echo $unavailable; 
			} else { 
				echo $av; 
			} 

			 echo "</div>";


// Aperature F Number

		
echo "<div class=\"column1\">";
				echo "<input class=\"exifinfo\" type=\"checkbox\" name=\"showaperturefnumber\" value=\"yes\" title=\"$endis\""; ?> <?php if ($showaperturefnumber == "yes") { echo "checked"; } ?> <?php echo "\"> $titleafnumber: ";

			if ($apfnumber == "") { 
				echo $unavailable; 
			} else { 
				echo $apfnumber; 
			} 
		echo "</div>";


// Max Aperature Number

			echo "<div class=\"column1\">";
				echo "<input class=\"exifinfo\" type=\"checkbox\" name=\"showmaxaperturevalue\" value=\"yes\" title=\"$endis\""; ?> <?php if ($showmaxaperturevalue == "yes") { echo "checked"; } ?> <?php echo "\"> $titleman: ";

				if ($ap == "") {

				} else {

			$maxap = explode('/', $maxaperturevalue);
				$ap = ($maxap[0] / $maxap[1]);

			}

			if (is_nan($ap)) { 
				echo $unavailable; 
			} else {
				echo "$ap ($maxaperturevalue)";
			} 


		echo "</div>";



// Scene Type

			echo "<div class=\"column1\">";
				echo "<input class=\"exifinfo\" type=\"checkbox\" name=\"showscenetype\" value=\"yes\" title=\"$endis\""; ?> <?php if ($showscenetype == "yes") { echo "checked"; } ?> <?php echo "\"> $titlesctype: ";

			if ($scenetype == "") { 
				echo $unavailable; 
			} elseif (preg_match('/1/', $scenetype)) { 
				echo $dirphoto; 
			} else {
				echo $scenetype;
			}

	 echo "</div>";


//Scene capture type

				
			
echo "<div class=\"column1\">";
			echo "<input class=\"exifinfo\" type=\"checkbox\" name=\"showscenecapturetype\" value=\"yes\" title=\"$endis\""; ?> <?php if ($showscenecapturetype == "yes") { echo "checked"; } ?> <?php echo "\"> $titlesct: ";

			if ($scenecapturetype == "") { 
				echo $unavailable; 
			} elseif ($scenecapturetype == "0") { 
				echo "Standard"; 
			} elseif ($scenecapturetype == "1") {
				echo "Landscape";
			} elseif ($scenecapturetype == "2") {
				echo "Portrait";
			} elseif ($scenecapturetype == "3") {
				echo "Night Scene";
			} else {
				echo $scenecapturetype;
			}

			
echo "</div>";
		
//Customed Rendered

		echo "<div class=\"column1\">";
			echo "<input class=\"exifinfo\" type=\"checkbox\" name=\"showcustomrendered\" value=\"yes\" title=\"$endis\""; ?> <?php if ($showcustomrendered == "yes") { echo "checked"; } ?> <?php echo "\"> $titlecr: ";

			if ($customrendered == "") { 
				echo $unavailable; 
			} elseif ($customrendered == "0") { 
				echo "Normal"; 
			} elseif ($customrendered == "1") {
				echo "Custom";
			} else {
				echo $customrendered;
			}

			
echo "</div>";
		


// Contrast Value
		
 echo "<div class=\"column1\">";
				echo "<input class=\"exifinfo\" type=\"checkbox\" name=\"showcontrast\" value=\"yes\" title=\"$endis\""; ?> <?php if ($showcontrast == "yes") { echo "checked"; } ?> <?php echo "\"> $titlecontrast: ";

			if ($contrast == "") { 
				echo $unavailable; 
			} elseif ($contrast == "0") { 
				echo "Normal"; 
			} elseif ($contrast == "1") {
				echo "Soft";
			} elseif ($contrast == "2") {
				echo "Hard";
			} else {
				echo $contrast;
			}
			 echo "</div>";


//Sharpness


 echo "<div class=\"column1\">";
			echo "<input class=\"exifinfo\" type=\"checkbox\" name=\"showsharpness\" value=\"yes\" title=\"$endis\""; ?> <?php if ($showsharpness == "yes") { echo "checked"; } ?> <?php echo "\"> $titlesharp: ";

			if ($sharpness == "") { 
				echo $unavailable; 
			} elseif ($sharpness == "0") { 
				echo "Normal"; 
			} elseif ($sharpness == "1") {
				echo "Soft";
			} elseif ($sharpness == "2") {
				echo "Hard";
			} else {
				echo $sharpness;
			}			

		 echo "</div>";


//Brightness Value
	

echo "<div class=\"column1\">";

			if ($brightnessvalue == "") {

			} else {
			$brival = explode('/', $brightnessvalue);
			$bv = ($brival[0] / $brival[1]);
}
			$numerator = $brival[0];

			echo "<input class=\"exifinfo\" type=\"checkbox\" name=\"showbrightnessvalue\" value=\"yes\" title=\"$endis\""; ?> <?php if ($showbrightnessvalue == "yes") { echo "checked"; } ?> <?php echo "\"> $titlebrightness: ";

			if ($numerator == "FFFFFFFF") {

				echo "Unknown";

			} elseif ($bv == "" || is_nan($bv)) { 
				echo $unavailable; 
			} else { 
				echo $bv; 
			} 
		
		echo "</div>";
		

// saturation Value

	
 echo "<div class=\"column1\">";
				echo "<input class=\"exifinfo\" type=\"checkbox\" name=\"showsaturation\" value=\"yes\" title=\"$endis\""; ?> <?php if ($showsaturation == "yes") { echo "checked"; } ?> <?php echo "\"> $titlesat: ";

			if ($saturation == "") { 
				echo $unavailable; 
			} elseif ($saturation == "0") { 
				echo "Normal"; 
			} elseif ($saturation == "1") {
				echo "Low saturation";
			} elseif ($saturation == "2") {
				echo "High saturation";
			} else {
				echo $saturation;
			}


			 echo "</div>";



//White Balance
		

		
			
echo "<div class=\"column1\">";
			echo "<input class=\"exifinfo\" type=\"checkbox\" name=\"showwhitebalance\" value=\"yes\" title=\"$endis\""; ?> <?php if ($showwhitebalance == "yes") { echo "checked"; } ?> <?php echo "\"> $titlewb: ";

			if ($whitebalance == "") { 
				echo $unavailable; 
			} elseif ($whitebalance == "0") { 
				echo "Auto"; 
			} elseif ($whitebalance == "1") {
				echo "Manual";
			} else {
				echo $whitebalance;
			}
		 echo "</div>";


	


		echo "<div class=\"column1\">";
			echo "<input class=\"exifinfo\" type=\"checkbox\" name=\"showmetering\" value=\"yes\" title=\"$endis\""; ?> <?php if ($showmetering == "yes") { echo "checked"; } ?> <?php echo "\"> $titlemeter: ";

			if ($metering == "") { 
				echo $unavailable; 
			} elseif ($metering == "0") { 
				echo "Unknown"; 
			} elseif ($metering == "1") {
				echo "Average";
			} elseif ($metering == "2") {
				echo "CenterWeightedAverage";
			} elseif ($metering == "3") {
				echo "Spot";
			} elseif ($metering == "4") {
				echo "MultiSpot";
			} elseif ($metering == "5") {
				echo "Pattern";
			} elseif ($metering == "6") {
				echo "Partial";
			} elseif ($metering == "255") {
				echo "Other";
			} else {
				echo $scenecapturetype;
			}

			echo "<br></div>";
		

	// Digital Zoom

echo "<div class=\"column1\">";
			echo "<input class=\"exifinfo\" type=\"checkbox\" name=\"showdigitalzoomratio\" value=\"yes\" title=\"$endis\""; ?> <?php if ($showdigitalzoomratio == "yes") { echo "checked"; } ?> <?php echo "\"> $titledzr: ";


				$dsre = explode('/', $digitalzoomratio);
				$top = $dsre[0];



				if ($digitalzoomratio == "") {

				echo $unavailable; 
			} elseif ($top == "0") { 
				echo "Digital zoom not used"; 
			} else {
				echo $digitalzoomratio;
			}
echo "<br></div>";
		

		// lightsource

			echo "<div class=\"column1\">";
			echo "<input class=\"exifinfo\" type=\"checkbox\" name=\"showlightsource\" value=\"yes\" title=\"$endis\""; ?> <?php if ($showlightsource == "yes") { echo "checked"; } ?> <?php echo "\"> $titlels: ";

			if ($lightsource == "") { 
				echo $unavailable; 
			} elseif ($lightsource == "0") { 
				echo "Unknown"; 
			} elseif ($lightsource == "1") {
				echo "Daylight";
			} elseif ($lightsource == "2") {
				echo "Fluorescent";
			} elseif ($lightsource == "3") { 
				echo "Tungsten"; 
			} elseif ($lightsource == "4") {
				echo "Flash";
			} elseif ($lightsource == "9") {
				echo "Fine weather";
			} elseif ($lightsource == "10") { 
				echo "Cloudy weather"; 
			} elseif ($lightsource == "11") {
				echo "Shade";
			} elseif ($lightsource == "12") {
				echo "Daylight fluorescent";
			} elseif ($lightsource == "13") { 
				echo "Day white fluorescent"; 
			} elseif ($lightsource == "14") {
				echo "Cool white fluorescent";
			} elseif ($lightsource == "15") {
				echo "White fluorescent";
			} elseif ($lightsource == "17") { 
				echo "Standard light A"; 
			} elseif ($lightsource == "18") {
				echo "Standard light B";
			} elseif ($lightsource == "19") {
				echo "Standard light C";
			} elseif ($lightsource == "20") { 
				echo "D55"; 
			} elseif ($lightsource == "21") {
				echo "D65";
			} elseif ($lightsource == "22") {
				echo "D75";
			} elseif ($lightsource == "23") { 
				echo "D50"; 
			} elseif ($lightsource == "24") {
				echo "ISO studio tungsten";
			} elseif ($lightsource == "255") {
				echo "Other light source";
			} else {
				echo $lightsource;
			}
		echo "</div>";

// flashpix version

	echo "<div class=\"column1\">";

		echo "<input class=\"exifinfo\" type=\"checkbox\" name=\"showflashpixversion\" value=\"yes\" title=\"$endis\""; ?> <?php if ($showflashpixversion == "yes") { echo "checked"; } ?> <?php echo "\"> $titleflashver: "; 

	if ($flashpixversion == "") { 
		echo $unavailable; 
	} else { 
		echo $flashpixversion; 
	} 


	 echo "</div>";


//Flash
		
echo "<div class=\"column1\">";
			echo "<input class=\"exifinfo\" type=\"checkbox\" name=\"showflash\" value=\"yes\" title=\"$endis\""; ?> <?php if ($showflash == "yes") { echo "checked"; } ?> <?php echo "\"> $titleflash: ";

			if ($flash == "") { 
				echo $unavailable; 
			} else { 
				//Flash menu
				echo $flash; 
				echo " <div class=\"flash\"><img src=\"../images/system/flash.png\">";

				echo "<span class=\"flashinfo\">0 = $noflash
1 = $fired
5 = $frnd
7 = $frd
8 = $odnf
9 = $of
11 = $ornd
15 = $ord
16 = $odnf
20 = $odnfrnd
24 = $adnf
25 = $af
29 = $afrnd
31 = $afrd
32 = $nff
48 = $onff
65 = $frer
69 = $frerrnd
71 = $frerrd
73 = $orer
77 = $orerrnd
79 = $orerrd
80 = $offrer
88 = $adnfere
89 = $afrer
93 = $afrerrnd
95 = $afrerrd</span>";
				echo "</div>";
			} 
			


					echo "<br></div>";
		

 echo "<div class=\"column1\">";
			echo "<input class=\"exifinfo\" type=\"checkbox\" name=\"showisospeedratings\" value=\"yes\" title=\"$endis\""; ?> <?php if ($showisospeedratings == "yes") { echo "checked"; } ?> <?php echo "\"> $titleiso: ";

			if ($isospeedratings == "") { 
				echo $unavailable; 
			} else { 
				echo $isospeedratings; 
			} 

	 echo "</div>";


//echo "<div class=\"column1\">";
//			echo "<input class=\"exifinfo\" type=\"checkbox\" name=\"showcompressedbitsperpixel\" value=\"yes\" title=\"$endis\""; 
	 ?> <?php 
	 //if ($showcompressedbitsperpixel == "yes") { echo "checked"; } 
	 ?> <?php 
	 //echo "\"> $titlecbps//: ";

	//		$cbpp = explode('/', $compressedbitsperpixel);
	//			$cp = ($cbpp[0] / $cbpp[1]);



	//			if (is_nan($cp) || $cp == "") {

	//			echo $unavailable; 
	//		} else { 
	//			echo $cp; 
	//		} 

	 //echo "</div>";




//Interoperability Indes	
	
		echo "<div class=\"column1\">";

			echo "<input class=\"exifinfo\" type=\"checkbox\" name=\"showinteroperabilityindex\" value=\"yes\" title=\"$endis\""; ?> <?php if ($showinteroperabilityindex == "yes") { echo "checked"; } ?> <?php echo "\"> $titleii: ";



			if ($interoperabilityindex == "") { 
				echo $unavailable; 
			} else { 
				echo $interoperabilityindex; 
			} 

				echo "</div>";

	

//Interoperability Indes	
	
		echo "<div class=\"column1\">";

			echo "<input class=\"exifinfo\" type=\"checkbox\" name=\"showinteroperabilityversion\" value=\"yes\" title=\"$endis\""; ?> <?php if ($showinteroperabilityversion == "yes") { echo "checked"; } ?> <?php echo "\"> $titleiov: ";



			if ($interoperabilityversion == "") { 
				echo $unavailable; 
			} else { 
				echo $interoperabilityversion; 
			} 

				echo "</div>";


?>


	
<?php 


//Subject distance
	
 echo "<div class=\"column1\">";
			echo "<input class=\"exifinfo\" type=\"checkbox\" name=\"showsubjectdistance\" value=\"yes\" title=\"$endis\""; ?> <?php if ($showsubjectdistance == "yes") { echo "checked"; } ?> <?php echo "\"> $titlesd: ";


				if ($subjectdistance == "") {

				} else {

				$subdis = explode('/', $subjectdistance);
				$sd = ($subdis[0] / $subdis[1]);
}
				$numerator2 = $subdis[0];


			if (is_nan($sd)) { 
				echo $unavailable; 
			} elseif ($numerator2 == "FFFFFFFF") { 
				echo $infinity; 
			} elseif ($numerator2 == "0") {
				echo $disunk;
			} else {
				echo "$sd m";
			}

 echo "</div>";


	echo "<div class=\"column1\">";
			echo "<input class=\"exifinfo\" type=\"checkbox\" name=\"showshutterspeed\" value=\"yes\" title=\"$endis\""; ?> <?php if ($showshutterspeed == "yes") { echo "checked"; } ?> <?php echo "\"> $titleshutter: ";

			if ($shutterspeed == "") {

				} else {

			$shuspe = explode('/', $shutterspeed);
				$spv = ($shuspe[0] / $shuspe[1]);
			}
				if (is_nan($spv) || $spv == "") {

				echo $unavailable; 
			} else { 
				
				$ssd = round(1/pow(2,-$spv),0);
				echo "1/$ssd s";

			} 
			
echo "<br></div>";




//Exposure time
			
		
		
			 echo "<div class=\"column1\">";
			echo "<input class=\"exifinfo\" type=\"checkbox\" name=\"showexposuretime\" value=\"yes\" title=\"$endis\""; ?> <?php if ($showexposuretime == "yes") { echo "checked"; } ?> <?php echo "\"> $titleet: ";

			if ($exposuretime == "") {

			} else {

			$extime = explode('/', $exposuretime);
		$et = ($extime[0] / $extime[1]);
			}


		if ($et == "" || is_nan($et) ) { 
				echo $unavailable; 
			} else { 
				$set = round(1/$et,0);
				echo "1/$set s";
			} 

									 echo "</div>";


// Exposure Bias Value
 echo "<div class=\"column1\">";
			echo "<input class=\"exifinfo\" type=\"checkbox\" name=\"showexposurebiasvalue\" value=\"yes\" title=\"$endis\""; ?> <?php if ($showexposurebiasvalue == "yes") { echo "checked"; } ?> <?php echo "\"> $titleebv: ";

			if ($exposurebiasvalue == "") { 
				echo $unavailable; 
			} else { 
				echo $exposurebiasvalue; 
			} 
		echo "</div>";

//Exposure Mode
	echo "<div class=\"column1\">";
			echo "<input class=\"exifinfo\" type=\"checkbox\" name=\"showexposuremode\" value=\"yes\" title=\"$endis\""; ?> <?php if ($showexposuremode == "yes") { echo "checked"; } ?> <?php echo "\"> $titlesem: ";


			if ($exposuremode == "") { 
				echo $unavailable; 
			} elseif ($exposuremode == "0") { 
				echo "Auto"; 
			} elseif ($exposuremode == "1") {
				echo "Manual";
			} elseif ($exposuremode == "2") {
				echo "Auto bracket";
			} else {
				echo $exposuremode;
			}

 echo "</div>";



//Exposure program
			
		
		 echo "<div class=\"column1\">";
			echo "<input class=\"exifinfo\" type=\"checkbox\" name=\"showexposureprogram\" value=\"yes\" title=\"$endis\""; ?> <?php if ($showexposureprogram == "yes") { echo "checked"; } ?> <?php echo "\"> $titleep: ";

			if ($exposureprogram == "") { 
				echo $unavailable; 
			} elseif ($exposureprogram == "0") { 
				echo "Not defined"; 
			} elseif ($exposureprogram == "1") {
				echo "Manual";
			} elseif ($exposureprogram == "2") {
				echo "Normal program";
			} elseif ($exposureprogram == "3") {
				echo "Aperture priority";
			} elseif ($exposureprogram == "4") {
				echo "Shutter priority";
			} elseif ($exposureprogram == "5") {
				echo "Creative program";
			} elseif ($exposureprogram == "6") {
				echo "Action program";
			} elseif ($exposureprogram == "7") {
				echo "Portrait mode";
			} elseif ($exposureprogram == "8") {
				echo "Landscape mode";
			} else {
				echo $exposureprogram;
			}


			 echo "</div>";

			
echo "<div class=\"column1\">";
			echo "<input class=\"exifinfo\" type=\"checkbox\" name=\"showexifver\" value=\"yes\" title=\"$endis\""; ?> <?php if ($showexifver == "yes") { echo "checked"; } ?> <?php echo "\"> $titleexifver: ";

			if ($exifver == "") { 
				echo $unavailable; 
			} else { 
				echo $exifver; 
			} 
		
echo "<br></div>";
		

// GPS

	if ($latdeg == "" || $latmin == "" || $latsec == "" || $londeg == "" || $lonmin == "" || $lonsec == "") {

	} else {

$latdegsplit = explode('/', $latdeg);
$latdegfinal = $latdegsplit[0] / $latdegsplit[1];

$latminsplit = explode('/', $latmin);
$latminfinal = $latminsplit[0] / $latminsplit[1];

$latsecsplit = explode('/', $latsec);
$latsecfinal = $latsecsplit[0] / $latsecsplit[1];

$londegsplit = explode('/', $londeg);
$londegfinal = $londegsplit[0] / $londegsplit[1];

$lonminsplit = explode('/', $lonmin);
$lonminfinal = $lonminsplit[0] / $lonminsplit[1];

$lonsecsplit = explode('/', $lonsec);
$lonsecfinal = $lonsecsplit[0] / $lonsecsplit[1];


$gpslat = $latsign * ($latdegfinal + ($latminfinal / 60) + ($latsecfinal / 3600));
$gpslon = $lonsign * ($londegfinal + ($lonminfinal / 60) + ($lonsecfinal / 3600));
}

if (is_nan($gpslat) || is_nan($gpslon)) {

    $gpslat = "";
    $gpslon = "";
}		
echo "<div class=\"column2\">";
if ($enablegps == "no") {

	
	echo "<input class=\"exifinfo\" type=\"checkbox\" name=\"enablegps\" value=\"yes\" title=\"$endis\""; ?> <?php if ($enablegps == "yes") { echo "checked"; } ?> <?php echo "\"> $location: $nogps";


} else {


if ($gpslat == "" || $gpslon == "") {

	echo "<input class=\"exifinfo\" type=\"checkbox\" name=\"enablegps\" value=\"yes\" title=\"$endis\""; ?> <?php if ($enablegps == "yes") { echo "checked"; } ?> <?php echo "\"> $location: $nogps";

} else {

	echo "<input class=\"exifinfo\" type=\"checkbox\" name=\"enablegps\" value=\"yes\" title=\"$endis\""; ?> <?php if ($enablegps == "yes") { echo "checked"; } ?> <?php echo "\"> $seeiton";
	echo "<a class=\"googlemaps\" target=\"_blank\" href=\"http://www.google.com/maps/place/";
	echo $gpslat;
	echo ",";
	echo $gpslon;
	echo "\">Google Maps </a><br>";
	echo $gpslat;
	echo " ";
	echo $gpslatref;      	
	echo "&nbsp&nbsp&nbsp;";
	echo $gpslon;
	echo " ";
	echo $gpslonref;

	$gpsalt = explode('/', $altitude);
	$gpsaltitude = ($gpsalt[0] / $gpsalt[1]);

	if (is_nan($gpsaltitude)) {

	} else {
	
		if ($altref == "1") {
		echo "<br>$reference: $below";
	} else {
		echo "<br>$reference: $above";
	}

		
		echo "<br>$alti: $gpsaltitude m";


	

	}


}
echo "<br></div>";
}

?>
<br><br><br>
<input name="submit" type="submit" class="updatebuttonright" value="<?php echo $button2; ?>">
<input type="hidden" name="pin" value="<?php echo $pin; ?>">
<input type="hidden" name="album" value="<?php echo $album; ?>">
<input type="hidden" name="ain" value="<?php echo $ain; ?>">
</div>
</fieldset>

</form>

</div>
</div>
<br>
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
