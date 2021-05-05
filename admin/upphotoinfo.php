<?php

session_start();
include ('../config.php');

$sql1 = "SELECT username FROM members LIMIT 1";
    $result1 = mysqli_query($dbconnect, $sql1);
    $row1 = mysqli_fetch_row($result1);
    $adminusername =  $row1[0];

$stmt1 = $dbconnect -> prepare("SELECT password FROM members WHERE username = '$adminusername'");
$stmt1 -> bind_param('s', $adminusername);
$stmt1 -> execute();
$stmt1 -> store_result();
$stmt1 -> bind_result($adminpassword);
$stmt1 -> fetch();

if  ($_SESSION['ausername'] == $adminusername && $_SESSION['apassword'] == $adminpassword) {

$pin = $_POST['pin'];
$album = $_POST['album'];
$ain = $_POST['ain'];
$showphotodate = $_POST['showphotodate'];
$enablegps = $_POST['enablegps'];
$showcameramake = $_POST['showcameramake'];
$showcameramodel = $_POST['showcameramodel'];
$showxres = $_POST['showxres'];
$showyres = $_POST['showyres'];
$showresolutionunit = $_POST['showresolutionunit'];
$showfocusdistance = $_POST['showfocusdistance'];
$showfocallength = $_POST['showfocallength'];
$showsoftware = $_POST['showsoftware'];
$showaperturefnumber = $_POST['showaperturefnumber'];
$showaperturevalue = $_POST['showaperturevalue'];
$showshutterspeed = $_POST['showshutterspeed'];
$showbrightnessvalue = $_POST['showbrightnessvalue'];
$showsharpness = $_POST['showsharpness'];
$showcolorspace = $_POST['showcolorspace'];
$showscenecapturetype = $_POST['showscenecapturetype'];
$showexposuretime = $_POST['showexposuretime'];
$showflash = $_POST['showflash'];
$showsaturation = $_POST['showsaturation'];
$showwhitebalance = $_POST['showwhitebalance'];
$showinteroperabilityindex = $_POST['showinteroperabilityindex'];
$showsubjectdistance = $_POST['showsubjectdistance'];
$showisospeedratings = $_POST['showisospeedratings'];
$showcontrast = $_POST['showcontrast'];
$showfl35mm = $_POST['showfl35mm'];
$showmetering = $_POST['showmetering'];
$showexifver = $_POST['showexifver'];
$showgpsaltitude = $_POST['showgpsaltitude'];
$showname = $_POST['showname'];
$showmimetype = $_POST['showmimetype'];
$showdimensions = $_POST['showdimensions'];
$showsize = $_POST['showsize'];
$showycbcrpositioning = $_POST['showycbcrpositioning'];
$showcomponentsconfiguration = $_POST['showcomponentsconfiguration'];
$showscenetype = $_POST['showscenetype'];
$showexposurebiasvalue = $_POST['showexposurebiasvalue'];
$showexposuremode = $_POST['showexposuremode'];
$showlightsource = $_POST['showlightsource'];
$showfilesource = $_POST['showfilesource'];
$showdigitalzoomratio = $_POST['showdigitalzoomratio'];
$showcustomrendered = $_POST['showcustomrendered'];
$showcompressedbitsperpixel = $_POST['showcompressedbitsperpixel'];
$showmaxaperturevalue = $_POST['showmaxaperturevalue'];
$showexposureprogram = $_POST['showexposureprogram'];
$showorientation = $_POST['showorientation'];
$showinteroperabilityversion = $_POST['showinteroperabilityversion'];
$showsubsectime = $_POST['showsubsectime'];
$showsubsectimeoriginal = $_POST['showsubsectimeoriginal'];
$showsubsectimedigitized = $_POST['showsubsectimedigitized'];
$showflashpixversion = $_POST['showflashpixversion'];
$showimageuniqueid = $_POST['showimageuniqueid'];
$showiscolor = $_POST['showiscolor'];



if ($showcameramake == "") {
	$showcameramake = "no";
}

if ($showcameramodel == "") {
    $showcameramodel = "no";
}

if ($showxres == "") {
    $showxres = "no";
}

if ($showyres == "") {
    $showyres = "no";
}

if ($showresolutionunit == "") {
    $showresolutionunit = "no";
}

if ($showfocusdistance == "") {
    $showfocusdistance = "no";
}

if ($showfocallength == "") {
    $showfocallength = "no";
}

if ($showsoftware == "") {
    $showsoftware = "no";
}

if ($showaperturefnumber == "") {
    $showaperturefnumber = "no";
}

if ($showaperturevalue == "") {
    $showaperturevalue = "no";
}

if ($showshutterspeed == "") {
    $showshutterspeed = "no";
}

if ($showbrightnessvalue == "") {
    $showbrightnessvalue = "no";
}

if ($showsharpness == "") {
    $showsharpness = "no";
}

if ($showcolorspace == "") {
    $showcolorspace = "no";
}

if ($showscenecapturetype == "") {
    $showscenecapturetype = "no";
}

if ($showexposuretime == "") {
    $showexposuretime = "no";
}

if ($showflash == "") {
    $showflash = "no";
}

if ($showsaturation == "") {
    $showsaturation = "no";
}

if ($showwhitebalance == "") {
    $showwhitebalance = "no";
}

if ($showinteroperabilityindex == "") {
    $showinteroperabilityindex = "no";
}

if ($showsubjectdistance == "") {
    $showsubjectdistance = "no";
}

if ($showisospeedratings == "") {
    $showisospeedratings = "no";
}

if ($showcontrast == "") {
    $showcontrast = "no";
}

if ($showfl35mm == "") {
    $showfl35mm = "no";
}

if ($showmetering == "") {
    $showmetering = "no";
}

if ($showexifver == "") {
    $showexifver = "no";
}

if ($showgpsaltitude == "") {
    $showgpsaltitude = "no";
}

if ($showphotodate == "") {
    $showphotodate = "no";
}

if ($showname == "") {
    $showname = "no";
}

if ($showmimetype == "") {
    $showmimetype = "no";
}

if ($showdimensions == "") {
    $showdimensions = "no";
}

if ($showsize == "") {
    $showsize = "no";
}
	
if ($showycbcrpositioning == "") {
    $showycbcrpositioning = "no";
}

if ($showcomponentsconfiguration == "") {
    $showcomponentsconfiguration = "no";
}

if ($showscenetype == "") {
    $showscenetype = "no";
}

if ($showexposurebiasvalue == "") {
    $showexposurebiasvalue = "no";
}

if ($showexposuremode == "") {
    $showexposuremode = "no";
}

if ($showlightsource == "") {
    $showlightsource = "no";
}

if ($showfilesource == "") {
    $showfilesource = "no";
}

if ($showdigitalzoomratio == "") {
    $showdigitalzoomratio = "no";
}

if ($showcompressedbitsperpixel == "") {
    $showcompressedbitsperpixel = "no";
}

if ($showcustomrendered == "") {
    $showcustomrendered = "no";
}

if ($showmaxaperturevalue == "") {
    $showmaxaperturevalue = "no";
}

if ($showexposureprogram == "") {
    $showexposureprogram = "no";
}

if ($showorientation == "") {
    $showorientation = "no";
}

if ($showinteroperabilityversion == "") {
    $showinteroperabilityversion = "no";
}

if ($showsubsectime == "") {
    $showsubsectime = "no";
}

if ($showsubsectimeoriginal == "") {
    $showsubsectimeoriginal = "no";
}

if ($showsubsectimedigitized == "") {
    $showsubsectimedigitized = "no";
}

if ($showflashpixversion == "") {
    $showflashpixversion = "no";
}

if ($showimageuniqueid == "") {
    $showimageuniqueid = "no";
}

if ($showiscolor == "") {
    $showiscolor = "no";
}





	$sql1 = "UPDATE photos SET showcameramake = '$showcameramake' WHERE pin = '$pin'";
	mysqli_query($dbconnect, $sql1);

    $sql2 = "UPDATE photos SET showcameramodel = '$showcameramodel' WHERE pin = '$pin'";
    mysqli_query($dbconnect, $sql2);

     $sql3 = "UPDATE photos SET showxres = '$showxres' WHERE pin = '$pin'";
    mysqli_query($dbconnect, $sql3);

     $sql4 = "UPDATE photos SET showyres = '$showxres' WHERE pin = '$pin'";
    mysqli_query($dbconnect, $sql4);

     $sql5 = "UPDATE photos SET showresolutionunit = '$showresolutionunit' WHERE pin = '$pin'";
    mysqli_query($dbconnect, $sql5);

     $sql6 = "UPDATE photos SET showfocusdistance = '$showfocusdistance' WHERE pin = '$pin'";
    mysqli_query($dbconnect, $sql6);

     $sql7 = "UPDATE photos SET showfocallength = '$showfocallength' WHERE pin = '$pin'";
    mysqli_query($dbconnect, $sql7);

     $sql8 = "UPDATE photos SET showsoftware = '$showsoftware' WHERE pin = '$pin'";
    mysqli_query($dbconnect, $sql8);

     $sql9 = "UPDATE photos SET showaperturefnumber = '$showaperturefnumber' WHERE pin = '$pin'";
    mysqli_query($dbconnect, $sql9);

     $sql10 = "UPDATE photos SET showaperturevalue = '$showaperturevalue' WHERE pin = '$pin'";
    mysqli_query($dbconnect, $sql10);

     $sql11 = "UPDATE photos SET showshutterspeed = '$showshutterspeed' WHERE pin = '$pin'";
    mysqli_query($dbconnect, $sql11);

     $sql12 = "UPDATE photos SET showbrightnessvalue = '$showbrightnessvalue' WHERE pin = '$pin'";
    mysqli_query($dbconnect, $sql12);

     $sql13 = "UPDATE photos SET showsharpness = '$showsharpness' WHERE pin = '$pin'";
    mysqli_query($dbconnect, $sql13);

     $sql13a = "UPDATE photos SET showcolorspace = '$showcolorspace' WHERE pin = '$pin'";
    mysqli_query($dbconnect, $sql13a);

     $sql14 = "UPDATE photos SET showscenecapturetype = '$showscenecapturetype' WHERE pin = '$pin'";
    mysqli_query($dbconnect, $sql14);

     $sql15 = "UPDATE photos SET showexposuretime = '$showexposuretime' WHERE pin = '$pin'";
    mysqli_query($dbconnect, $sql15);

     $sql16 = "UPDATE photos SET showflash = '$showflash' WHERE pin = '$pin'";
    mysqli_query($dbconnect, $sql16);

     $sql17 = "UPDATE photos SET showsaturation = '$showsaturation' WHERE pin = '$pin'";
    mysqli_query($dbconnect, $sql17);

     $sql18 = "UPDATE photos SET showwhitebalance = '$showwhitebalance' WHERE pin = '$pin'";
    mysqli_query($dbconnect, $sql18);

     $sql19 = "UPDATE photos SET showinteroperabilityindex = '$showinteroperabilityindex' WHERE pin = '$pin'";
    mysqli_query($dbconnect, $sql19);

     $sql20 = "UPDATE photos SET showsubjectdistance = '$showsubjectdistance' WHERE pin = '$pin'";
    mysqli_query($dbconnect, $sql20);

     $sql21 = "UPDATE photos SET showisospeedratings = '$showisospeedratings' WHERE pin = '$pin'";
    mysqli_query($dbconnect, $sql21);

     $sql22 = "UPDATE photos SET showcontrast = '$showcontrast' WHERE pin = '$pin'";
    mysqli_query($dbconnect, $sql22);

     $sql23 = "UPDATE photos SET showfl35mm = '$showfl35mm' WHERE pin = '$pin'";
    mysqli_query($dbconnect, $sql23);

     $sql24 = "UPDATE photos SET showmetering = '$showmetering' WHERE pin = '$pin'";
    mysqli_query($dbconnect, $sql24);

     $sql25 = "UPDATE photos SET showexifver = '$showexifver' WHERE pin = '$pin'";
    mysqli_query($dbconnect, $sql25);

     $sql26 = "UPDATE photos SET showcameramodel = '$showcameramodel' WHERE pin = '$pin'";
    mysqli_query($dbconnect, $sql26);

     $sql27 = "UPDATE photos SET enablegps = '$enablegps' WHERE pin = '$pin'";
    mysqli_query($dbconnect, $sql27);

    $sql28 = "UPDATE photos SET showphotodate = '$showphotodate' WHERE pin = '$pin'";
    mysqli_query($dbconnect, $sql28);

     $sql29 = "UPDATE photos SET showname = '$showname' WHERE pin = '$pin'";
    mysqli_query($dbconnect, $sql29);

     $sql30 = "UPDATE photos SET showmimetype = '$showmimetype' WHERE pin = '$pin'";
    mysqli_query($dbconnect, $sql30);

     $sql31 = "UPDATE photos SET showdimensions = '$showdimensions' WHERE pin = '$pin'";
    mysqli_query($dbconnect, $sql31);

     $sql32 = "UPDATE photos SET showsize = '$showsize' WHERE pin = '$pin'";
    mysqli_query($dbconnect, $sql32);

    $sql33 = "UPDATE photos SET showycbcrpositioning = '$showycbcrpositioning' WHERE pin = '$pin'";
    mysqli_query($dbconnect, $sql33);

    $sql34 = "UPDATE photos SET showcomponentsconfiguration = '$showcomponentsconfiguration' WHERE pin = '$pin'";
    mysqli_query($dbconnect, $sql34);

    $sql35 = "UPDATE photos SET showscenetype = '$showscenetype' WHERE pin = '$pin'";
    mysqli_query($dbconnect, $sql35);

    $sql36 = "UPDATE photos SET showexposurebiasvalue = '$showexposurebiasvalue' WHERE pin = '$pin'";
    mysqli_query($dbconnect, $sql36);

    $sql37 = "UPDATE photos SET showexposuremode = '$showexposuremode' WHERE pin = '$pin'";
    mysqli_query($dbconnect, $sql37);

    $sql38 = "UPDATE photos SET showlightsource = '$showlightsource' WHERE pin = '$pin'";
    mysqli_query($dbconnect, $sql38);

    $sql39 = "UPDATE photos SET showfilesource = '$showfilesource' WHERE pin = '$pin'";
    mysqli_query($dbconnect, $sql39);

    $sql40 = "UPDATE photos SET showdigitalzoomratio = '$showdigitalzoomratio' WHERE pin = '$pin'";
    mysqli_query($dbconnect, $sql40);

    $sql41 = "UPDATE photos SET showcustomrendered = '$showcustomrendered' WHERE pin = '$pin'";
    mysqli_query($dbconnect, $sql41);

    $sql42 = "UPDATE photos SET showmaxaperturevalue = '$showmaxaperturevalue' WHERE pin = '$pin'";
    mysqli_query($dbconnect, $sql42);

    $sql43 = "UPDATE photos SET showexposureprogram = '$showexposureprogram' WHERE pin = '$pin'";
    mysqli_query($dbconnect, $sql43);

    $sql44 = "UPDATE photos SET showcompressedbitsperpixel = '$showcompressedbitsperpixel' WHERE pin = '$pin'";
    mysqli_query($dbconnect, $sql44);

    $sql45 = "UPDATE photos SET showorientation = '$showorientation' WHERE pin = '$pin'";
    mysqli_query($dbconnect, $sql45);

    $sql46 = "UPDATE photos SET showinteroperabilityversion = '$showinteroperabilityversion' WHERE pin = '$pin'";
    mysqli_query($dbconnect, $sql46);

    $sql47 = "UPDATE photos SET showsubsectime = '$showsubsectime' WHERE pin = '$pin'";
    mysqli_query($dbconnect, $sql47);

    $sql48 = "UPDATE photos SET showsubsectimeoriginal = '$showsubsectimeoriginal' WHERE pin = '$pin'";
    mysqli_query($dbconnect, $sql48);

    $sql49 = "UPDATE photos SET showsubsectimedigitized = '$showsubsectimedigitized' WHERE pin = '$pin'";
    mysqli_query($dbconnect, $sql49);

    $sql50 = "UPDATE photos SET showflashpixversion = '$showflashpixversion' WHERE pin = '$pin'";
    mysqli_query($dbconnect, $sql50);

    $sql51 = "UPDATE photos SET showimageuniqueid = '$showimageuniqueid' WHERE pin = '$pin'";
    mysqli_query($dbconnect, $sql51);

    $sql52 = "UPDATE photos SET showiscolor = '$showiscolor' WHERE pin = '$pin'";
    mysqli_query($dbconnect, $sql52);

	header('Location: index.php?menu=photo&album='.$album.'&ain='.$ain.'&pin='.$pin.'&change=infosuccess');


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