<?php

$postercomment = strip_tags(nl2br($_SESSION['postercomment']));
$postername = $_SESSION['postername'];

$pin = $_GET['pin'];
$album = $_GET['album'];
$urlain = $_GET['ain'];

$sql0 = "SELECT username FROM members LIMIT 1";
	$result0 = mysqli_query($dbconnect, $sql0);
	$row0 = mysqli_fetch_row($result0);
	$adminusername =  $row0[0];

$stmt1 = $dbconnect -> prepare("SELECT password FROM members WHERE username = '$adminusername'");
$stmt1 -> bind_param('s', $adminusername);
$stmt1 -> execute();
$stmt1 -> store_result();
$stmt1 -> bind_result($adminpassword);
$stmt1 -> fetch();
	
	$sql = "SELECT * FROM photos WHERE pin = '$pin'";
		$result = mysqli_query($dbconnect, $sql);
		while ($list = mysqli_fetch_array($result)) {
			$name = $list['name'];
			$photodir = $list['photodir'];
			$ain = $list['ain'];
			$status = $list['status'];
			$photodate = $list['photodate'];
			$cameramake = $list['cameramake'];
			$cameramodel = $list['cameramodel'];
			$orientation = $list['orientation'];
			$iscolor = $list['iscolor'];
			$xres = $list['xres'];
			$yres = $list['yres'];
			$resolutionunit = $list['resolutionunit'];
			$focusdistance = $list['focusdistance'];
			$focallength = $list['focallength'];
			$software = $list['software'];
			$apfnumber = $list['apfnumber'];
			$apvalue = $list['apvalue'];
			$shutterspeed = $list['shutterspeed'];
			$brightnessvalue = $list['brightnessvalue'];
			$sharpness = $list['sharpness'];
			$colorspace = $list['colorspace'];
			$interoperabilityindex = $list['interoperabilityindex'];
			$interoperabilityversion = $list['interoperabilityversion'];
			$scenecapturetype = $list['scenecapturetype'];
			$exposuretime = $list['exposuretime'];
			$flash = $list['flash'];
			$saturation = $list['saturation'];
			$whitebalance = $list['whitebalance'];
			$subjectdistance = $list['subjectdistance'];
			$isospeedratings = $list['isospeedratings'];
			$contrast = $list['contrast'];		
			$latdeg = $list['latdeg'];
			$latmin = $list['latmin'];
			$latsec = $list['latsec'];
			$latsign = $list['latsign'];
			$gpslatref = $list['gpslatref'];
			$londeg = $list['londeg'];
			$lonmin = $list['lonmin'];
			$lonsec = $list['lonsec'];
			$lonsign = $list['lonsign'];
			$gpslonref = $list['gpslonref'];
			$altitude = $list['gpsaltitude'];
			$altref = $list['altref'];
			$fl35mm = $list['fl35mm'];
			$metering = $list['metering'];
			$exifver = $list['exifver'];
			$subsectime = $list['subsectime'];
			$subsectimeoriginal = $list['subsectimeoriginal'];
			$subsectimedigitized = $list['subsectimedigitized'];
			$flashpixversion = $list['flashpixversion'];
			$imageuniqueid = $list['imageuniqueid'];
			$componentsconfiguration = $list['componentsconfiguration'];
			$ycbcrpositioning = $list['ycbcrpositioning'];
			$scenetype = $list['scenetype'];
			$exposurebiasvalue = $list['exposurebiasvalue'];
			$exposuremode = $list['exposuremode'];
			$lightsource = $list['lightsource'];
			$filesource = $list['filesource'];
			$digitalzoomratio = $list['digitalzoomratio'];
			$customrendered = $list['customrendered'];
			$compressedbitsperpixel = $list['compressedbitsperpixel'];
			$maxaperturevalue = $list['maxaperturevalue'];
			$exposureprogram = $list['exposureprogram'];
			$description = $list['description'];
			$enablegps = $list['enablegps'];
			$showphotodate = $list['showphotodate'];
			$showcameramake = $list['showcameramake'];
			$showcameramodel = $list['showcameramodel'];
			$showorientation = $list['showorientation'];
			$showiscolor = $list['showiscolor'];
			$showxres = $list['showxres'];
			$showyres = $list['showyres'];
			$showresolutionunit = $list['showresolutionunit'];
			$showfocusdistance = $list['showfocusdistance'];
			$showfocallength = $list['showfocallength'];
			$showsoftware = $list['showsoftware'];
			$showaperturefnumber = $list['showaperturefnumber'];
			$showaperturevalue = $list['showaperturevalue'];
			$showshutterspeed = $list['showshutterspeed'];
			$showbrightnessvalue = $list['showbrightnessvalue'];
			$showsharpness = $list['showsharpness'];
			$showcolorspace = $list['showcolorspace'];
			$showscenecapturetype = $list['showscenecapturetype'];
			$showexposuretime = $list['showexposuretime'];
			$showflash = $list['showflash'];
			$showsaturation = $list['showsaturation'];
			$showwhitebalance = $list['showwhitebalance'];
			$showinteroperabilityindex = $list['showinteroperabilityindex'];
			$showinteroperabilityversion = $list['showinteroperabilityversion'];
			$showsubjectdistance = $list['showsubjectdistance'];
			$showisospeedratings = $list['showisospeedratings'];
			$showcontrast = $list['showcontrast'];
			$showfl35mm = $list['showfl35mm'];
			$showmetering = $list['showmetering'];
			$showexifver = $list['showexifver'];
			$showsubsectime = $list['showsubsectime'];
			$showsubsectimeoriginal = $list['showsubsectimeoriginal'];
			$showsubsectimedigitized = $list['showsubsectimedigitized'];
			$showflashpixversion = $list['showflashpixversion'];
			$showimageuniqueid = $list['showimageuniqueid'];
			$showcomponentsconfiguration = $list['showcomponentsconfiguration'];
			$showycbcrpositioning = $list['showycbcrpositioning'];
			$showscenetype = $list['showscenetype'];
			$showexposurebiasvalue = $list['showexposurebiasvalue'];
			$showexposuremode = $list['showexposuremode'];
			$showlightsource = $list['showlightsource'];
			$showfilesource = $list['showfilesource'];
			$showdigitalzoomratio = $list['showdigitalzoomratio'];
			$showcustomrendered = $list['showcustomrendered'];
			$showcompressedbitsperpixel = $list['showcompressedbitsperpixel'];
			$showmaxaperturevalue = $list['showmaxaperturevalue'];
			$showexposureprogram = $list['showexposureprogram'];
			$showgpsaltitude = $list['showgpsaltitude'];
			$showdate = $list['showdate'];
			$showname = $list['showname'];
			$showmimetype = $list['showmimetype'];
			$showdimensions = $list['showdimensions'];
			$showsize = $list['showsize'];
		}

$sql0 = "SELECT hideinfo FROM general";
		$result0 = mysqli_query($dbconnect, $sql0);
		$row0 = mysqli_fetch_row($result0);
		$hideinfo = $row0[0];


$sql1a = "SELECT albumdir FROM albums WHERE ain='$ain' and album='$album'";
		$result1a = mysqli_query($dbconnect, $sql1a);
		$row1a = mysqli_fetch_row($result1a);
		$albumdir = $row1a[0];


if ((empty($ain) && empty($album)) || $ain != $urlain) {
	$albumdir = "null";
} elseif (($ain == "1" &&  $album == "root") && $theain != "1") {
	$albumdir = "/";
}

if ($albumdir == $photodir) {

if (isset($_SESSION['musername']) || $_SESSION['ausername'] == "$adminusername" || $status == "public") {


?>

<br>

<div class="breadcrumb">

<?php 

	if ($photodir == "/") {
		echo "&nbsp;$photodir$name";
	} else {
		echo "&nbsp;$photodir/$name";
	}
?>
</div>
<br>

<div class="yourphoto fade">
<br>
<?php

if ($photodir == "/") {

		if (mime_content_type("images/gallery/$directory$name") == "video/ogg" || mime_content_type("images/gallery/$directory$name") == "video/webm" || mime_content_type("images/gallery/$directory$name") == "video/mp4") {

			echo "<video class=\"photopage\" src=\"images/gallery$photodir$name\" controls></video>";
		
		} else {

	echo "<img class=\"photopage\" src=\"images/gallery$photodir$name\">";
		}

} else {

	if (mime_content_type("images/gallery$albumdir/$name") == "video/ogg" || mime_content_type("images/gallery$albumdir/$name") == "video/webm" || mime_content_type("images/gallery$albumdir/$name") == "video/mp4") {
			echo "<video class=\"photopage\" src=\"images/gallery$albumdir/$name\" controls></video>";
		
		} else {


	echo "<img class=\"photopage\" src=\"images/gallery$photodir/$name\">";
		}
}
?>
</div>

<?php 
		if ($description == "") {
			//don't show anything
		} else {
?>
<br>
<div class="thephotoinfo">

	<fieldset class="pfs">
		<legend><?php echo $descriptiontitle; ?></legend>

		<div class="photodescription fade"><?php echo $description; ?></div>
	
	</fieldset>
</div>	
<?php
}
?>
<div class="photoinfo">

<?php
	if ($photodir == "/") {
	$image = "images/gallery$photodir$name";
	
} else {
	$image = "images/gallery$photodir/$name";
}
	$exif = exif_read_data($image, 0, true);

?>
<?php
if ($hideinfo == "no") {
?>
<br>
<div class="thephotoinfo">

	<fieldset class="pfs">
		<legend></a><?php echo $imageinfo; ?></legend>
		<div class="fade">
	

<?php 

//Photo name
if ($showname == "yes") {
echo "<div class=\"column1\">";
		echo "$photoname: "; 

		echo basename("$image"); 

		 
echo "</div>";
}


// Date photo was taken

 			if ($showphotodate == "yes") {
echo "<div class=\"column1\">";

				echo "$phdate: ";

			if ($photodate == "") { 
				echo $unavailable; 
			} else { 
				$convertphotodate = date("D M jS, Y @ g:i a", strtotime($photodate));
				echo $convertphotodate;
			} 

	 
echo "</div>";
		}

// Unique image id

 			if ($showimageuniqueid == "yes") {
echo "<div class=\"column1\">";

				echo "$titleiuid: ";

			if ($imageuniqueid == "") { 
				echo $unavailable; 
			} else { 
				echo $imageuniqueid; 
			} 

	 
echo "</div>";
		}

		if ($showsize == "yes") {
// File size in MB
echo "<div class=\"column1\">";
			echo "$photosize: ";

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
}

		// Camera Make

	if ($showcameramake == "yes") {	
	echo "<div class=\"column1\">";

		echo "$cammake: "; 

	if ($cameramake == "") { 
		echo $unavailable; 
	} else { 
		echo $cameramake; 
	} 


	 echo "</div>";
}

// Camera Model	
	if ($showcameramodel == "yes") { 
 echo "<div class=\"column1\">";
				echo "$cammod: ";

	if ($cameramodel == "") { 
		echo $unavailable; 
	} else { 
		echo $cameramodel; 
	} 

 echo "</div>";
}


if ($showmimetype == "yes") {
//Mime type
echo "<div class=\"column1\">";
echo "$mimtype: ";

	if (mime_content_type("$image") == "") { 
		echo $unavailable; 
	} else { 
		echo mime_content_type("$image"); 
	} 
echo "</div>";
}

// Photo dimensions
if ($showdimensions == "yes") {
echo "<div class=\"column1\">";
			echo "$photodim: ";
		
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
}

// File source

	if ($showfilesource == "yes") {	
	echo "<div class=\"column1\">";

		echo "$titlefs: "; 

	if ($filesource == "") { 
		echo $unavailable; 
	} else { 
		echo "Digital Still Camera"; 
	} 


	 echo "</div>";
}

//Resolution

	if ($showxres == "yes" && $showyres == "yes") {
		echo "<div class=\"column1\">";

			echo "$xyres: ";

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

			 echo "</div>";
}

// orientation
	if ($showorientation == "yes") { 
 echo "<div class=\"column1\">";
				echo "$titleorient: ";

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
}



// is color
	if ($showiscolor == "yes") { 
 echo "<div class=\"column1\">";
				echo "$titleic: ";

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
}


// Color space		

	if ($showcolorspace == "yes") {	
echo "<div class=\"column1\">";
			echo "$titlecolsp: ";

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
}

// Software	

	if ($showsoftware == "yes") {	
		 echo "<div class=\"column1\">";
		echo "$titlesoftware: ";


		if ($software == "") { 
				echo $unavailable; 
			} else { 
				echo $software; 
			} 

			  echo "</div>";
}


// ycbcrpositioning	

	if ($showycbcrpositioning == "yes") {	
		 echo "<div class=\"column1\">";
		echo "$titleycbcrpositioning: ";


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
}

// componentsconfiguration

	if ($showcomponentsconfiguration == "yes") {

echo "<div class=\"column1\">";
				echo "$titlecomcon: ";

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


	}


//subsectime

				if ($showsubsectime == "yes") {
echo "<div class=\"column1\">";
				echo "$titlesubsectime: ";

			if ($subsectime == "") { 
				echo $unavailable; 
			} else { 
				echo $subsectime; 
			} 

	 echo "</div>";
}

// subsectimeoriginal

			if ($showsubsectimeoriginal == "yes") {
echo "<div class=\"column1\">";
				echo "$titlesubsectimeoriginal: ";

			if ($subsectimeoriginal == "") { 
				echo $unavailable; 
			} else { 
				echo $subsectimeoriginal; 
			} 

	 echo "</div>";
}
// subsectimedigitized

			if ($showsubsectimedigitized == "yes") {
echo "<div class=\"column1\">";
				echo "$titlesubsectimedigitized: ";

			if ($subsectimedigitized == "") { 
				echo $unavailable; 
			} else { 
				echo $subsectimedigitized; 
			} 

	 echo "</div>";
}




// Focus Distance

			if ($showfocusdistance == "yes") {
echo "<div class=\"column1\">";
				echo "$titlefdist: ";

			if ($focusdistance == "") { 
				echo $unavailable; 
			} else { 
				echo $focusdistance; 
			} 

	 echo "</div>";
}

// Focal Length

	if ($showfocallength == "yes") {	

		echo "<div class=\"column1\">";
				echo "$titleflength: ";

				$foclen = explode('/', $focallength);
				$fc = ($foclen[0] / $foclen[1]);


			if ($focallength == "" || is_nan($fc)) { 
				echo $unavailable; 
			} else { 
				echo "$fc mm"; 
			} 
 echo "</div>";
}

// 35mm

			if ($showfl35mm == "yes") {

				 echo "<div class=\"column1\">";
				echo "$title35: ";

			if ($fl35mm == "") { 
				echo $unavailable; 
			} else { 
				echo "$fl35mm mm"; 
			} 

			 echo "</div>";
}



// Aperature Value
		if ($showaperturevalue == "yes") {	
				
echo "<div class=\"column1\">";
				echo "$titleaplength: ";

				$apval = explode('/', $apvalue);
				$av = ($apval[0] / $apval[1]);

			if ($av == "" || is_nan($av)) { 
				echo $unavailable; 
			} else { 
				echo $av; 
			} 

			 echo "</div>";
}

// Aperature F Number

			if ($showaperturefnumber == "yes") {
echo "<div class=\"column1\">";
				echo "$titleafnumber: ";

			if ($apfnumber == "") { 
				echo $unavailable; 
			} else { 
				echo $apfnumber; 
			} 
		echo "</div>";
}

// Max Aperature Number

			if ($showmaxaperturevalue == "yes") {
echo "<div class=\"column1\">";
				echo "$titleman: ";

			$maxap = explode('/', $maxaperturevalue);
				$ap = ($maxap[0] / $maxap[1]);

			if (is_nan($ap)) { 
				echo $unavailable; 
			} else {
				echo "$ap";
			} 

		echo "</div>";
}


// Scene Type

			if ($showscenetype == "yes") {
echo "<div class=\"column1\">";
				echo "$titlesctype: ";

			if ($scenetype == "") { 
				echo $unavailable; 
			} elseif (preg_match('/1/', $scenetype)) { 
				echo $dirphoto; 
			} else {
				echo $scenetype;
			}

	 echo "</div>";
}

//Screen capture type

			if ($showscenecapturetype == "yes") {	
			
echo "<div class=\"column1\">";
			echo "$titlesct: ";

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
		}

//Custom rendered

			if ($showcustomrendered == "yes") {	
			
echo "<div class=\"column1\">";
			echo "$titlecr: ";

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
		}


// Contrast Value
		if ($showcontrast == "yes") {	
 echo "<div class=\"column1\">";
				echo "$titlecontrast: ";

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

}
//Sharpness

			if ($showsharpness == "yes") {	
 echo "<div class=\"column1\">";
			echo "$titlesharp: ";

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
}

//Brightness Value
	
		if ($showbrightnessvalue == "yes") {
echo "<div class=\"column1\">";
			$brival = explode('/', $brightnessvalue);
			$bv = ($brival[0] / $brival[1]);

			$numerator = $brival[0];

			echo "$titlebrightness: ";

			if ($numerator == "FFFFFFFF") {

				echo "Unknown";

			} elseif ($bv == "" || is_nan($bv)) { 
				echo $unavailable; 
			} else { 
				echo $bv; 
			} 
		
		echo "</div>";
		}

// saturation Value

		if ($showsaturation == "yes") {
 echo "<div class=\"column1\">";
				echo "$titlesat: ";

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
}


//White Balance
		

		if ($showwhitebalance == "yes") {	
			
echo "<div class=\"column1\">";
			echo "$titlewb: ";

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
}

	if ($showmetering == "yes") {



		echo "<div class=\"column1\">";
			echo "$titlemeter: ";

			if ($metering == "") { 
				echo $unavailable; 
			} elseif ($metering == "0") { 
				echo "Unknown"; 
			} elseif ($metering == "1") {
				echo "Average";
			} elseif ($metering == "2") {
				echo "Center Weighted Average";
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
		}

	// Digital Zoom

if ($showdigitalzoomratio == "yes") {	
	echo "<div class=\"column1\">";
			echo "$titledzr: ";


				$dsre = explode('/', $digitalzoomratio);
				$top = $dsre[0];
				$bottom = $dsre[1];

				$zoom = $top/$bottom;



				if ($digitalzoomratio == "") {

				echo $unavailable; 
			} elseif ($top == "0") { 
				echo $zoomnotused; 
			} else {
				echo $zoom;
				echo "x";
			}
echo "<br></div>";
		}

		// lightsource

			if ($showlightsource == "yes") {
echo "<div class=\"column1\">";
				echo "$titlels: ";

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
}

// flashpixversion


			if ($showflashpixversion == "yes") {
		echo "<div class=\"column1\">";
			echo "$titleflashver: ";

			if ($flashpixversion == "") { 
				echo $unavailable; 
			} else { 
				echo $flashpixversion; 
			} 
		
		echo "<br></div>";
		}



//Flash
		if ($showflash == "yes") {	
echo "<div class=\"column1\">";
			echo "$titleflash: ";

			if ($flash == "") { 
				echo $unavailable; 
			} else { 
				//Flash menu
				echo $flash; 
				echo " <div class=\"flash\"><img src=\"images/system/flash.png\">";

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

}

	if ($showisospeedratings == "yes") {
 echo "<div class=\"column1\">";
			echo "$titleiso: ";

			if ($isospeedratings == "") { 
				echo $unavailable; 
			} else { 
				echo $isospeedratings; 
			} 

	 echo "</div>";

}


	if ($showcompressedbitsperpixel == "yes") {
 echo "<div class=\"column1\">";
			echo "$titlecbps: ";

			$cbpp = explode('/', $compressedbitsperpixel);
				$cp = ($cbpp[0] / $cbpp[1]);



				if (is_nan($cp) || $cp == "") {

				echo $unavailable; 
			} else { 
				echo $cp; 
			} 

	 echo "</div>";

}





//Interoperability Indes	
	if ($showinteroperabilityindex == "yes") {	
		echo "<div class=\"column1\">";

			echo "$titleii: ";



			if ($interoperabilityindex == "") { 
				echo $unavailable; 
			} else { 
				echo $interoperabilityindex; 
			} 

				echo "</div>";

}

//Interoperability Version
	if ($showinteroperabilityversion == "yes") {	
		echo "<div class=\"column1\">";

			echo "$titleiov: ";



			if ($interoperabilityversion == "") { 
				echo $unavailable; 
			} else { 
				echo $interoperabilityversion; 
			} 

				echo "</div>";

}


	
?>


	
<?php 


//Subject distance
		if ($showsubjectdistance == "yes") {
 echo "<div class=\"column1\">";
			echo "$titlesd: ";


				$subdis = explode('/', $subjectdistance);
				$sd = ($subdis[0] / $subdis[1]);

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
}


 ?>




<?php 

if ($showshutterspeed == "yes") {	
	echo "<div class=\"column1\">";
			echo "$titleshutter: ";


				$shuspe = explode('/', $shutterspeed);
				$spv = ($shuspe[0] / $shuspe[1]);

				if (is_nan($spv) || $spv == "") {

				echo $unavailable; 
			} else { 
				
				$ssd = round(1/pow(2,-$spv),0);
				echo "1/$ssd s";

			} 
echo "<br></div>";
		}

//Exposure time
			
		
		if ($showexposuretime == "yes") {

			 echo "<div class=\"column1\">";
			echo "$titleet: ";

			$extime = explode('/', $exposuretime);
		$et = ($extime[0] / $extime[1]);


			if ($et == "" || is_nan($et) ) { 
				echo $unavailable; 
			} else { 
				$set = round(1/$et,0);
				echo "1/$set s";
			} 

									 echo "</div>";

	}

// Exposure Bias Value

			if ($showexposurebiasvalue == "yes") {
echo "<div class=\"column1\">";
				echo "$titleebv: ";

			if ($exposurebiasvalue == "") { 
				echo $unavailable; 
			} else { 
				echo $exposurebiasvalue; 
			} 
		echo "</div>";
}

//Exposure Mode
		if ($showexposuremode == "yes") {
 echo "<div class=\"column1\">";
			echo "$titlesem: ";


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
}

//Exposure program
			
		
		if ($showexposureprogram == "yes") {

			 echo "<div class=\"column1\">";
			echo "$titleep: ";

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

	}




			if ($showexifver == "yes") {
echo "<div class=\"column1\">";
			echo "$titleexifver: ";

			if ($exifver == "") { 
				echo $unavailable; 
			} else { 
				echo $exifver; 
			} 
		
echo "<br></div>";
		}

// GPS

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


if (is_nan($gpslat) || is_nan($gpslon)) {

    $gpslat = "";
    $gpslon = "";
}		
	if ($enablegps == "yes") {
echo "<div class=\"column2\">";
if ($enablegps == "no") {

	
	echo "$location: $nogps";


} else {


if ($gpslat == "" || $gpslon == "") {

	echo "$location: $nogps";

} else {

	echo "$seeiton";
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

}
echo "<br></div>";
}
?>
</div>
</fieldset>
<a id="post"></a>
</div>
<?php

} else {
	//Hide photo information
}

$update = $_GET["post"];
			if ($update == "moderation") {
			echo "<br><div class=\"success\"><img class=\"checkmark\" src=\"images/system/checkmark.png\"> $notice16</div>";
			unset ($postercomment);
			unset ($postername);
			unset ($_SESSION['postercomment']);
			unset ($_SESSION['postername']);
			}

$update = $_GET["post"];
			if ($update == "approved") {
			echo "<br><div class=\"success\"><img class=\"checkmark\" src=\"images/system/checkmark.png\"> $notice17</div>";
			unset ($postercomment);
			unset ($postername);
			unset ($_SESSION['postercomment']);
			unset ($_SESSION['postername']);
			}

$update = $_GET["mod"];
		if ($update == "deleted") {
			echo "<br><div class=\"success\"><img class=\"checkmark\" src=\"images/system/checkmark.png\"> $notice19</div>";
		}

$update = $_GET["post"];
		if ($update == "recaptcha") {
			echo "<br><div class=\"failure\"><img class=\"failureimg\" src=\"images/system/failure.png\"> $notice22</div>";
		}

	$sql1 = "SELECT comments FROM general";
	$result1 = mysqli_query($dbconnect, $sql1);						
	$row1 = mysqli_fetch_row($result1);
		$enablecomments = $row1[0];

 $page = $_GET['page'];

//Only administration or members can leave comments
	if ($enablecomments == yesmembers) {

	if  (isset($_SESSION['musername']) || $_SESSION['musername'] == "$adminusername") {

?>

<br>
	<hr class="divider">
<br>

<form action="postcomment.php" method="post">
	<div class="commentbox"> 
		<div class="userinfo"><span class="boxhead"><?php echo $postacomment; ?></span></div>
			<div class="userinfo">		
<?php 

	$musername = $_SESSION['musername'];

	if ($_SESSION['musername'] != "") {

	$sql3 = "SELECT first,last FROM members WHERE username='$musername'";
	$result3 = mysqli_query($dbconnect, $sql3);						
		$row3 = mysqli_fetch_row($result3);
		$firstname = $row3[0];
		$lastname = $row3[1];

		echo "<input type=\"text\" class=\"textbox fade\" placeholder=\"$musername\" readonly>";
		echo "<input type=\"hidden\" name=\"username\" value=\"$musername\">";
		echo "<input type=\"hidden\" name=\"postername\" value=\"$firstname $lastname\">";
		echo "<input type=\"hidden\" name=\"photodir\" value=\"$photodir\">";
		echo "<input type=\"hidden\" name=\"postername\" value=\"$firstname $lastname\">";
		echo "<input type=\"hidden\" name=\"album\" value=\"$album\">";
		echo "<input type=\"hidden\" name=\"ain\" value=\"$ain\">";
		echo "<input type=\"hidden\" name=\"page\" value=\"$page\">";
	}
?>
			
	<input type="hidden" name="pin" value="<?php echo $pin; ?>">
</div> 

<div class="usercomment">
	<textarea class="fade" maxlength="9990" name="comment" rows="5" placeholder="<?php echo $textnohtml; ?>" required><?php echo $postercomment; ?></textarea>
</div>

<?php 
//If Google recaptcha is enabled, show it

	$sql2 = "SELECT recaptcha,sitekey,secretkey FROM general";
	$result2 = mysqli_query($dbconnect, $sql2);						
	$row2 = mysqli_fetch_row($result2);
		$enablerecaptcha = $row2[0];
		$sitekey = $row2[1];
		$secretkey = $row2[2];

	if ($enablerecaptcha == "yes") {

if ($sitekey == ""){
?>
		<div class="subcap fade">
    	<div class="missing"><?php echo $missingsk; ?></div>
	</div>


<?php
	} elseif ($secretkey == "") {
  ?>
  <div class="subcap fade">
      <div class="missing"><?php echo $missingsek; ?></div>
  </div>
<?php 
} else {

?>
 	<div class="subcap fade">
    	<div class="g-recaptcha" data-sitekey="<?php echo $sitekey; ?>"></div>
	</div>
<?php
}
?>

	<div class="subcap2 fade">
    	<input name="submit" type="submit" value="<?php echo $button4; ?>" class="subcombutton">
	</div>
<?php 
	} else {
?>

	<div class="subcap2 fade">
    	<input type="submit" value="<?php echo $button4; ?>" class="subcombuttonnorc fade">
	</div>

<?php
	}
?>
</div>
</form>

<br>
<hr class="divider">
<br>

<?php
	} 
} elseif ($enablecomments == "yesanyone") {

//Anyone (anonymous) can comment

	$sql3 = "SELECT recaptcha,sitekey,secretkey FROM general";
		$result3 = mysqli_query($dbconnect, $sql3);						
		$row3 = mysqli_fetch_row($result3);
		$enablerecaptcha = $row3[0];
		$sitekey = $row3[1];
		$secretkey = $row3[2];
?>

<br>
	<hr class="divider">
<br>
	<form action="postcomment.php" method="post">
		<div class="commentbox"> 
			<div class="userinfo"><span class="boxhead"><?php echo $postacomment; ?></span></div>
				<div class="userinfo">
<?php 

$musername = $_SESSION['musername'];

	
if ($_SESSION['musername'] != "") {
						
	$sql4 = "SELECT first,last FROM members WHERE username='$musername'";
					$result4 = mysqli_query($dbconnect, $sql4);						
					$row4 = mysqli_fetch_row($result4);
					$firstname = $row4[0];
					$lastname = $row4[1];

		echo "<input type=\"text\" class=\"textbox fade\" placeholder=\"$musername\" readonly>";
		echo "<input type=\"hidden\" name=\"username\" value=\"$musername\">";
		echo "<input type=\"hidden\" name=\"postername\" value=\"$firstname $lastname\">";
		echo "<input type=\"hidden\" name=\"photodir\" value=\"$photodir\">";
		echo "<input type=\"hidden\" name=\"album\" value=\"$album\">";
		echo "<input type=\"hidden\" name=\"ain\" value=\"$ain\">";
		echo "<input type=\"hidden\" name=\"page\" value=\"$page\">";

	} else {

		echo "<input type=\"hidden\" name=\"username\" value=\"Anonymous\">";
		echo "<input type=\"hidden\" name=\"photodir\" value=\"$photodir\">";
		echo " <input type=\"text\" name=\"postername\" class=\"textbox fade\" value=\"$postername\" placeholder=\"$nameop\"> &nbsp; $notaguest";
		echo "<input type=\"hidden\" name=\"album\" value=\"$album\">";
		echo "<input type=\"hidden\" name=\"ain\" value=\"$ain\">";
		echo "<input type=\"hidden\" name=\"page\" value=\"$page\">";
	}
?> 			
		<input type="hidden" name="pin" value="<?php echo $pin; ?>">
	</div> 
	<div class="usercomment">
		<textarea class="fade" maxlength="9990" name="comment" rows="5" placeholder="<?php echo $textnohtml; ?>" required><?php echo $postercomment; ?></textarea>
	</div>

<?php 

	if ($enablerecaptcha == "yes") {

		if ($sitekey == ""){
?>
		<div class="subcap fade">
    	<div class="missing"><?php echo $missingsk; ?></div>
	</div>


<?php
	} elseif ($secretkey == "") {
  ?>
  <div class="subcap fade">
      <div class="missing"><?php echo $missingsek; ?></div>
  </div>
<?php 
} else {

?>
 	<div class="subcap fade">
    	<div class="g-recaptcha" data-sitekey="<?php echo $sitekey; ?>"></div>
	</div>
<?php
}
?>
	<div class="subcap2 fade">
    	<input name="submit" type="submit" value="<?php echo $button4; ?>" class="subcombutton">
	</div>

<?php 
	} else {
?>
		<div class="subcap2 fade">
    	<input type="submit" value="<?php echo $button4; ?>" class="subcombuttonnorc fade">
	</div>

<?php
	}
?>

	</div>
</form>
<br>
	<hr class="divider">
<br>

<?php

} else {

	//Comments have been turned off, No comments are displayed 
}

	if ($enablecomments != "no") {

?>

<br>
	<div class="thephotocomments">

		<fieldset class="cfs">
			<legend><a id="comments"></a><?php echo $tab5; ?></legend>
<?php
	
	$page = $_GET['page'];

	if ($page == "" || $page == 1) {

		$newcommentpage = 0;
		$commentpage = 25;

	} else {

		$newcommentpage = ($page - 1) * 25;
		$commentpage = 25;
	}		


	$sql10 = "SELECT commentorder FROM general";
		$result10 = mysqli_query($dbconnect, $sql10);
		$row10 = mysqli_fetch_row($result10);
		$commentorder = $row10[0];


	$sql6 = "SELECT * FROM comments WHERE pin = '$pin' AND live = 'yes' ORDER BY cid $commentorder LIMIT $newcommentpage, $commentpage";
	$result6 = mysqli_query($dbconnect, $sql6);

		$countrows = mysqli_num_rows($result6);

	if ($countrows >= 1) {

		echo "<br><hr class=\"divider\">";
	
	
								}
	while ($list6 = mysqli_fetch_array($result6)) {
		$username = $list6['username'];
		$name = $list6['name'];
		$comment = $list6['comment'];
		$cid = $list6['cid'];
		$commentdate = $list6['commentdate'];

		$convertdate = date("l F jS, Y", strtotime($commentdate));

	$sql7 = "SELECT photo,mimetype FROM members WHERE username = '$username '";
		$result7 = mysqli_query($dbconnect, $sql7);
		$row7 = mysqli_fetch_row($result7);
		$photo = base64_encode($row7[0]);
		$mimetype = $row7[1];



	if ($username == "Anonymous" && $name !="") {

		echo "<div class=\"thecomment\"><br>";

	if  ($_SESSION['ausername'] == "$adminusername") {

		echo "<form onsubmit=\"return confirm('$deletecomment')\" action=\"deletecomment.php\" method=\"post\">";
		echo "<input name=\"submit\" type=\"submit\" class=\"deletelivecomment\" value=\"$delcomment\"><br>";
		echo "<input type=\"hidden\" name=\"cid\" value=\"$cid\">";
		echo "<input type=\"hidden\" name=\"album\" value=\"$album\">";
		echo "<input type=\"hidden\" name=\"ain\" value=\"$ain\">";
		echo "<input type=\"hidden\" name=\"pin\" value=\"$pin\"></form>";
	}
		if ($photo != "") {
		echo "<div class=\"profilephotocommentdiv fade\"><img src=\"data:$mimetype;charset=utf8;base64,$photo\" class=\"profilephoto\"></div>";
		} else {}
		echo "<div class=\"author fade\">$postedby $name ($guest)<br> <div class=\"commentdate\">$convertdate</div></div>";

	} else {

		echo "<div class=\"thecomment fade\"><br>";

	if  ($_SESSION['ausername'] == "$adminusername") {

		echo "<form onsubmit=\"return confirm('$deletecomment')\" action=\"deletecomment.php\" method=\"post\">";
		echo "<input name=\"submit\" type=\"submit\" class=\"deletelivecomment\" value=\"$delcomment\"><br>";
		echo "<input type=\"hidden\" name=\"cid\" value=\"$cid\">";
		echo "<input type=\"hidden\" name=\"album\" value=\"$album\">";
		echo "<input type=\"hidden\" name=\"ain\" value=\"$ain\">";
		echo "<input type=\"hidden\" name=\"pin\" value=\"$pin\"></form>";
	} 
		if ($photo != "") {
		echo "<div class=\"profilephotocommentdiv fade\"><img src=\"data:$mimetype;charset=utf8;base64,$photo\" class=\"profilephoto\"></div>";
		} else {}
		echo "<div class=\"author fade\">$postedby "; if ($username == "Anonymous") { echo $anonymous; } else { echo $username; } echo "<br> <div class=\"commentdate\">$convertdate</div></div>";
	}

		echo "<br>$comment</div><br>";
		
		echo "<hr class=\"divider\">";
	}		

	if ($countrows == 0) {
		echo "<span class=\"nocomments\">$commentsnone</span>";
	}
?>

<br>
<?php
#Begin pagination

if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}


#pages


	$sql8 = "SELECT COUNT(*) FROM comments WHERE pin = '$pin'";
	$result8 = mysqli_query($dbconnect,$sql8);

	$commentrows = mysqli_fetch_array($result8)[0];
	$commenttotal = ceil($commentrows / 25);

?>
<div class="pagiwrapper">
<div class="paginationdiv">
	
<?php
	if ($page == 1) {

		echo "<div class=\"boxed1 disabled fade\">$first</div>";

	} else {

   		echo "<a href=\"index.php?album=$album&ain=$ain&pin=$pin&page=1#comments\"><div class=\"boxed1 fade\">$first</div></a>";
    }

		

   if ($page <= 1){ 

    	echo "<div class=\"boxed disabled fade\">$prev</div>";
    
    } else { 

    	echo "<a href=\"index.php?album=$album&ain=$ain&pin=$pin&page=";
    	echo $page - 1;
    	echo "#comments\"><div class=\"boxed fade\">$prev</div></a>";
    }


	$highestpagenumber = $commenttotal;


    if($page == $highestpagenumber || $highestpagenumber == 0) { 

	 	echo "<div class=\"boxed disabled fade\">$next</div>"; 

   	} else {

  		echo "<a href=\"index.php?album=$album&ain=$ain&pin=$pin&page=";
  		echo $page + 1;
        echo "#comments\"> <div class=\"boxed fade\">$next</div></a>";

}

   	if ($page == $highestpagenumber || $highestpagenumber == 0) { 

	    echo "<div class=\"boxed disabled fade\">$last</div>";

	} else {
 	
 		echo "<a href=\"index.php?album=$album&ain=$ain&pin=$pin&page=$highestpagenumber#comments\"><div class=\"boxed\">$last</div></a>";
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
?>



		</fieldset>
	</div>

<?php
}

?>
</div>


<!--The next 3 <div> tags shouldn't be closed -->
<div>

<?php
	} elseif ($status == "private") {
		//if photo is private show nothing
		echo "<div class=\"nothing\">$nothinghere";
	}

} else {
		//if nothing is there show nothing
	echo "<div class=\"nothing\">$nothinghere";
}
?>
