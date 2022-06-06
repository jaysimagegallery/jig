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

echo "We ran into a problem...<br><br>You may be trying to run JIG without meeting the minimum system requirements.<br><br>JIG requires PHP 7.2 and libgd 2.2.5<br><br>Make sure the PHP fileinfo support enabled.<br><br>Make sure you have PHP GD support enabled.<br><br>Make sure you have PHP Mbstring support enabled.<br><br>When you log into the Adminstration section of JIG phpinfo (the purple section) will tell you all about your current PHP configuration. Scroll down and make sure fileinfo and mbstring is listed. Check the GD section and make sure that GD Headers is showing.<br><br>If you are not using Ubuntu Server 18.04/20.04 LTS it may be the case that you are missing other required PHP extensions.<br><br>Please fix any issues and try again. <a href=\"javascript:history.go(-1)\">Go back</a>.<br><br>";

$page = $_SESSION['page'];
$photos = $_FILES['photos'];
$ain = $_SESSION['ain'];
$menu = $_SESSION['menu'];
$album = $_SESSION['album'];


//Total number of files attempted to be uploaded
$totalfilesuploaded = count($_FILES['photos']['name']);

if ($ain == "") {
    $ain = 1;
}

if ($page == "") {
    $page = 1;
}

$sql = "SELECT albumdir FROM albums WHERE ain = '$ain' ";
        $result = mysqli_query($dbconnect, $sql);
        $row = mysqli_fetch_array($result);
        $albumdir = $row[0]; 


//Create arrays
$tempnames = array();
$names = array();
$repeats = array();
$mimtypes = array();


$originals = '../images/originals';
$uploaddirectory = '../images/gallery';
$thumbuploaddir = '../images/thumbnails';


foreach ($_FILES["photos"]["error"] as $key => $mistake) {
    if ($mistake == UPLOAD_ERR_OK) {
        $tempname = $_FILES["photos"]["tmp_name"][$key];
        $name = basename($_FILES["photos"]["name"][$key]);
 

        if ($menu == "gallery") {

        $sql1 = "SELECT name FROM photos WHERE name = '$name' AND photodir = '/'";
            $result1 = mysqli_query($dbconnect, $sql1);                       
            $row1 = mysqli_fetch_row($result1);
                $repeat = $row1[0];

        } else {

            $sql1 = "SELECT name FROM photos WHERE name = '$name' AND photodir = '$albumdir'";
            $result1 = mysqli_query($dbconnect, $sql1);                       
            $row1 = mysqli_fetch_row($result1);
                $repeat = $row1[0];
        }


//Add each item into the array, these will have met the PHP upload settings
$tempnames[] = $tempname;
$names[] = $name;
//Repeats = If the photo name is already taken then enter it into the array as a value. 
//If name is not taken then an empty value is entered into array..
$repeats[] = $repeat;
//Count number repeats in array .
$count = count(array_count_values($repeats)); 

//Get mimetype of each file
$mimetype = mime_content_type($tempname);
//Add the mimetype of each uploaded item to array
$mimetypes[] = $mimetype; 

    }
}

//Count total number of files processed into the names array
$totalfilesprocessed = count($names);
//Allowed filettypes
$allow = array("image/jpeg", "image/svg+xml", "image/png", "image/gif", "image/bmp", "image/x-ms-bmp", "video/mp4", "video/webm", "video/ogg");

//Count the number of items in the mimetypes array that are allowed
$searchcount = count(array_intersect($mimetypes, $allow));
//Count total number of entries in the mimetypes array.
$mtcount = count($mimetypes);

//If $mtcount and $searchcount are not equal, there was a file uploaded that wasn't the correct mimetype.
if ($searchcount != $mtcount) {

    if ($menu == "gallery") { //If adding a photo from the admin gallery page
       
        header('Location: index.php?menu=gallery&update=uft');

    } else { // If adding a photo from a subalbum
    
        header('Location: index.php?menu=subalbum&ain='.$ain.'&page='.$page.'&update=uft');

    }
//If totalnumber of files uploaded doesn't equal total number processed then at least 1 photo 
//didn't meet the upload_max_filesize requirement. If totalfilesuploaded was zero then the
//post_max_size requirement wasn't met.
} elseif ($totalfilesprocessed != $totalfilesuploaded || $totalfilesuploaded == "0") {

    if ($menu == "gallery") {

        $_SESSION['photoupload'] = "requirements"; 
        header('Location: index.php?menu=gallery&update=requirements');

    } else {
    
        $_SESSION['photoupload'] = "requirements"; 
        header('Location: index.php?menu=subalbum&ain='.$ain.'&page='.$page.'&update=requirements');

    }

//If the array of names (files uploaded) is the same as array of repeats (names already taken), then all files
//uploaded have the same names as photos already in the system. Since they are are all repeats we do nothing.
} elseif ($names === $repeats) {
 
    if ($count == 1) {

        if ($menu == "gallery") {

            $_SESSION['photoupload'] = "nophoto"; 
            header('Location: index.php?menu=gallery&update=nophoto');

        } else {

            $_SESSION['photoupload'] = "nophoto";
            header('Location: index.php?menu=subalbum&ain='.$ain.'&page='.$page.'&update=nophoto');
        
        }

    } else {

        if ($menu == "gallery") {

            $_SESSION['photoupload'] = "nophotos"; 
            header('Location: index.php?menu=gallery&update=nophotos');

        } else {
  
            $_SESSION['photoupload'] = "nophotos";
            header('Location: index.php?menu=subalbum&ain='.$ain.'&page='.$page.'&update=nophotos');
        
        }

    }

//If no files are repeats or some files are repeats process the original files but report that there are repeats
} elseif ($count >= "0") {
  
    $diff = array_diff($names, $repeats);

    foreach ($diff as $key => $value) {

        $tempphoto = $tempnames[$key];

            //Max sizes for thumbnails
            $maxheight = "157";
            $maxwidth = "279";

            list($origwidth, $origheight) = getimagesize($tempphoto);

            $width = $origwidth;
            $height = $origheight;

            //Thumbnail height
            if ($height > $maxheight) {
                $width = ($maxheight / $height) * $width;
                $height = $maxheight;
            }

            //Thumbnail width
            if ($width > $maxwidth) {
                $height = ($maxwidth / $width) * $height;
                $width = $maxwidth;
            }

        $createimage = imagecreatetruecolor($origwidth, $origheight);
        $createwmimage = imagecreatetruecolor($width, $height);

            if ($origheight <= $origheight) {
                $spacer = $origwidth;
            } else {
                $spacer = $origheight;
            }

    $sql2 = "SELECT watermark FROM general";
    $result2 = mysqli_query($dbconnect, $sql2);                       
    $row2 = mysqli_fetch_row($result2);
        $watermark = $row2[0];
                     
if ($watermark == "no") {

    // Do nothing

} elseif ($watermark == "yestext") {

    $sql3 = "SELECT wmposition,textwatermark,wmtextcolor FROM general";
    $result3 = mysqli_query($dbconnect, $sql3);                       
    $row3 = mysqli_fetch_row($result3);
        $wmposition = $row3[0];
        $textwatermark = $row3[1];
        $wmtextcolor = $row3[2];

        //Get watermark text length so we can position it properly. Must use monospace font.
        $textlength = strlen($textwatermark);
        
        //Text width using tiny font (8px) for thumbnails
        $twmlength = $textlength * 2.7;

        //Text width using small font size (12px) for small images, height less than 768px (XGA)
        $rswmlength = $textlength * 4;

        //Text width using medium font size (36px) for photos with height less than 1440px (FHD/QHD)
        $mwmlength = $textlength * 12;    

        //Text width using large font size (72px) for photos with height less than 2880px (4K/5K)
        $lwmlength = $textlength * 24;

        //Text width using very large font size (144px) for larger resoltuions like 5120px (8K)
        $vlwmlength = $textlength * 48;

        $font = '../admin/Inconsolata-Bold.ttf';

    if ($wmposition == "middle") {
                       
        //Thumbnail text position
        $thumbfinalwidth = $width / 2 - $twmlength; 
        $thumbfinalheight = $height / 2 + 4;    

        if ($origheight <= 768) {
            
            $textfinalwidth = $origwidth/2 -$rswmlength; 
            $textfinalheight = $origheight/2 + 6;
            
        } elseif ($origheight <= 1440) {
                
            $textfinalwidth = $origwidth/2 - $mwmlength; 
            $textfinalheight = $origheight/2 + 12;

        } elseif ($origheight <= 2880) {
        
            $textfinalwidth = $origwidth/2 -$lwmlength; 
            $textfinalheight = $origheight/2 + 36;
        } else {

            $textfinalwidth = $origwidth/2 -$vlwmlength; 
            $textfinalheight = $origheight/2 + 72;

        }
                       
    } elseif ($wmposition == "topleft") {

        //Thumbnail text position
        $thumbfinalwidth = 3; 
        $thumbfinalheight = 12;  

        if ($origheight <= 768) {
        
            $textfinalwidth = (0.015*$spacer) + 5;
            $textfinalheight = (0.015*$spacer) + 15;
            
        } elseif ($origheight <= 1440) {
        
            $textfinalwidth = (0.015*$spacer); 
            $textfinalheight = (0.015*$spacer) + 18;
            
        } elseif ($origheight <= 2880) {
        
            $textfinalwidth = (0.015*$spacer); 
            $textfinalheight = (0.015*$spacer) + 54;
        
        } else {

            $textfinalwidth = (0.015*$spacer); 
            $textfinalheight = (0.015*$spacer) + 108;
        }

    } elseif ($wmposition == "bottomleft") {
    
        //Thumbnail text position
        $thumbfinalwidth = 3; 
        $thumbfinalheight = $height - 6;  

        if ($origheight <= 768) {
        
            $textfinalwidth = (0.015*$spacer) + 5; 
            $textfinalheight = $origheight - (0.015*$spacer) - 5;
            
        } elseif ($origheight <= 1440) {
        
            $textfinalwidth = (0.015*$spacer); 
            $textfinalheight = $origheight - (0.015*$spacer) - 2;
            
        } elseif ($origheight <= 2880) {
        
            $textfinalwidth = (0.015*$spacer); 
            $textfinalheight = $origheight - (0.015*$spacer) - 4;
           
        } else {

            $textfinalwidth = (0.015*$spacer); 
            $textfinalheight = $origheight - (0.015*$spacer) - 8;

        }

    } elseif ($wmposition == "topright") {
      
        //Thumbnail text position
        $thumbfinalwidth = $width - $twmlength*2 - 8; 
        $thumbfinalheight = 15;  

        if ($origheight <= 768) {
         
            $textfinalwidth = $origwidth - $rswmlength*2 - 10; 
            $textfinalheight = (0.015*$spacer) + 15;
            
        } elseif ($origheight <= 1440) {
        
            $textfinalwidth = $origwidth - $mwmlength*2 - (0.015*$spacer); 
            $textfinalheight = (0.015*$spacer) + 18;
            
        } elseif($origheight <= 2880) {
        
            $textfinalwidth = $origwidth - $lwmlength*2 - (0.015*$spacer); 
            $textfinalheight = (0.015*$spacer) + 54;
            
        } else {
            $textfinalwidth = $origwidth - $vlwmlength*2 - (0.015*$spacer); 
            $textfinalheight = (0.015*$spacer) + 108;

        }

    } elseif ($wmposition == "bottomright") {
    
        //Thumbnail text position
        $thumbfinalwidth = $width - $twmlength*2 - 8; 
        $thumbfinalheight = $height - 6;  

        if ($origheight <= 768) {
        
            $textfinalwidth = $origwidth - $rswmlength*2 - 10; 
            $textfinalheight = $origheight - (0.015*$spacer) - 1;
            
        } elseif ($origheight <= 1440) {
        
            $textfinalwidth = $origwidth - $mwmlength*2 - (0.015*$spacer); 
            $textfinalheight = $origheight - (0.015*$spacer) - 2;
            
        } elseif ($origheight <= 2880) {
        
            $textfinalwidth = $origwidth - $lwmlength*2 - (0.015*$spacer); 
            $textfinalheight = $origheight - (0.015*$spacer) - 4;
        
        } else {

            $textfinalwidth = $origwidth - $vlwmlength*2 - (0.015*$spacer); 
            $textfinalheight = $origheight - (0.015*$spacer) - 8;


        }
    }
}  elseif ($watermark == "yesimage") {

    $sql4 = "SELECT wmposition,imagewatermark FROM general";  
    $result4 = mysqli_query($dbconnect, $sql4);                       
    $row4 = mysqli_fetch_row($result4);
        $wmposition = $row4[0];
        $waterimage = $row4[1];

    //Get mimetype of watermark
    $getmimetype = mime_content_type("../images/watermark/$waterimage");
    $exmimetype = explode('/', $getmimetype);
    $wmmimetype = $exmimetype[1];


    if ($wmmimetype == "jpeg") {
    
        $watermarkimage = imagecreatefromjpeg("../images/watermark/$waterimage");
     
    } elseif ($wmmimetype == "png") {
    
        $watermarkimage = imagecreatefrompng("../images/watermark/$waterimage");
    
    } elseif ($wmmimetype == "gif") {
    
        $watermarkimage = imagecreatefromgif("../images/watermark/$waterimage");
        
    } elseif ($wmmimetype == "bmp") {
      
        $watermarkimage = imagecreatefrombmp("../images/watermark/$waterimage");
        
    } elseif ($wmmimetype == "x-ms-bmp") {
      
        $watermarkimage = imagecreatefrombmp("../images/watermark/$waterimage");

    }

        $wmiwidth = imagesx($watermarkimage);
        $wmiheight = imagesy($watermarkimage);

    if ($wmposition == "middle") {
            
        $imagefinalwidth = $origwidth /2 - 0.5*$wmiwidth;
        $imagefinalheight = $origheight/2 - 0.5*$wmiheight;
           
    } elseif ($wmposition == "topleft") {

            if ($origheight <= 1000) {

                $imagefinalwidth = 15; 
                $imagefinalheight = 15; 

            } else {

                $imagefinalwidth = 0.01*$origwidth; 
                $imagefinalheight = 0.01*$origwidth;

            }

    } elseif ($wmposition == "bottomleft") {

            if ($origheight <= 1000) {

                $imagefinalwidth = 15; 
                $imagefinalheight = $origheight - $wmiheight - 15; 

            } else {

                $imagefinalwidth = 0.015*$origwidth; 
                $imagefinalheight = $origheight - $wmiheight - 0.015*$spacer; 

            }

    } elseif ($wmposition == "topright") {

            if ($origheight <= 1000) {
                
                $imagefinalwidth = $origwidth - $wmiwidth - 15; 
                $imagefinalheight = 15; 
            
            } else {
            
                $imagefinalwidth = $origwidth - $wmiwidth - 0.015*$spacer; 
                $imagefinalheight = 0.015*$spacer; 
            
            }


    } elseif ($wmposition == "bottomright") {

            if ($origheight <= 1000) {

                $imagefinalwidth = $origwidth - $wmiwidth - 15; 
                $imagefinalheight = $origheight - $wmiheight - 15; 

            } else {

                $imagefinalwidth = $origwidth - $wmiwidth - 0.015*$spacer; 
                $imagefinalheight = $origheight - $wmiheight - 0.015*$spacer; 

            }

    }
}


// Extract data from photo

$exif = exif_read_data($tempphoto, 0, true);

$comment = nl2br($exif['COMMENT']['0']);
$photodesc = nl2br($exif['IFD0']['ImageDescription']);

$copy = $exif['IFD0']['Copyright'];

if ($copy != "" && $comment == "" && $photodesc == "") {
    $copyright = "Copyright $copy";
    $description = "$copyright";

} elseif ($copy == "" && $comment != "" && $photodesc == "") {
    $description = "$comment";    

} elseif ($copy == "" && $comment == "" && $photodesc != "") {
    $description = "$photodesc";  

}elseif ($copy != "" && $comment != "" && $photodesc == "") {
    $copyright = "Copyright $copy";
    $description = "$comment<br><br>\n\nCopyright $copy";

} elseif ($copy != "" && $comment == $photodesc) {
     $copyright = "Copyright $copy";
    $description = "$photodesc<br><br>\n\n$copyright";

} elseif ($copy == "" && $comment == $photodesc) {
    $description = "$photodesc";

} elseif ($copy != "" && $comment == "" && $photodesc != "") {
     $copyright = "Copyright $copy";
    $description = "$photodesc<br><br>\n\n$copyright";

} elseif ($copy != "" && $comment != "" && $photodesc != "" ) {
    $copyright = "Copyright $copy";
    $description = "$photodesc<br><br>\n\n$comment<br><br>\n\n$copyright";

} elseif ($copy == "" && $comment != "" && $photodesc != "") {
    $description = "$photodesc<br><br>\n\n$comment";  


} elseif ($copy == "" && $comment == "" && $photodesc == "") {
   $description = "";     
}

$photodate = $exif['EXIF']['DateTimeOriginal'];

$cameramake = $exif['IFD0']['Make'];

$cameramodel = $exif['IFD0']['Model'];

$orientation = $exif['IFD0']['Orientation'];

$iscolor = $exif['COMPUTED']['IsColor'];

$xres = $exif['IFD0']['XResolution'];

$yres = $exif['IFD0']['YResolution'];

$resolutionunit = $exif['IFD0']['ResolutionUnit'];

$focusdistance = $exif['COMPUTED']['FocusDistance'];

$focallength = $exif["EXIF"]["FocalLength"];

$software = $exif['IFD0']['Software'];

$aperturefnumber = $exif['COMPUTED']['ApertureFNumber'];

$aperturevalue = $exif['EXIF']['ApertureValue'];

$shutterspeed = $exif['EXIF']['ShutterSpeedValue'];

$brightnessvalue = $exif['EXIF']['BrightnessValue'];

$sharpness = $exif["EXIF"]["Sharpness"];

$colorspace = $exif['EXIF']['ColorSpace'];

$scenecapturetype = $exif['EXIF']['SceneCaptureType'];

$exposuretime = $exif['EXIF']['ExposureTime'];

$flash = $exif['EXIF']['Flash'];

$saturation = $exif['EXIF']['Saturation'];

$whitebalance = $exif['EXIF']['WhiteBalance'];

$interoperabilityindex = $exif['INTEROP']['InterOperabilityIndex'];

$interoperabilityversion = $exif['INTEROP']['InterOperabilityVersion'];

$subjectdistance = $exif['EXIF']['SubjectDistance'];

$isospeedratings = $exif['EXIF']['ISOSpeedRatings'];

$contrast = $exif['EXIF']['Contrast'];

$fl35mm = $exif['EXIF']['FocalLengthIn35mmFilm'];

$metering = $exif['EXIF']['MeteringMode'];

$exifver = $exif['EXIF']['ExifVersion'];

$componentsconfiguration = bin2hex($exif["EXIF"]["ComponentsConfiguration"]);

$ycbcrpositioning = $exif["IFD0"]["YCbCrPositioning"];

$scenetype = bin2hex($exif["EXIF"]["SceneType"]);

$exposurebiasvalue = $exif["EXIF"]["ExposureBiasValue"];

$exposuremode = $exif["EXIF"]["ExposureMode"];

$lightsource = $exif["EXIF"]["LightSource"];

$filesource = bin2hex($exif["EXIF"]["FileSource"]);

$digitalzoomratio = $exif["EXIF"]["DigitalZoomRatio"];

$customrendered = $exif["EXIF"]["CustomRendered"];

$compressedbitsperpixel = $exif["EXIF"]["CompressedBitsPerPixel"];

$maxaperturevalue = $exif["EXIF"]["MaxApertureValue"];

$exposureprogram = $exif["EXIF"]["ExposureProgram"];

$subsectime = $exif["EXIF"]["SubSecTime"];

$subsectimeoriginal = $exif["EXIF"]["SubSecTimeOriginal"];

$subsectimedigitized = $exif["EXIF"]["SubSecTimeDigitized"];

$flashpixversion = $exif["EXIF"]["FlashPixVersion"];

$imageuniqueid = $exif["EXIF"]["ImageUniqueID"];

$gpsaltitude = $exif["GPS"]["GPSAltitude"];

$altref = bin2hex($exif["GPS"]["GPSAltitudeRef"]);

$latdeg = $exif["GPS"]["GPSLatitude"][0];

$latmin = $exif["GPS"]["GPSLatitude"][1];

$latsec = $exif["GPS"]["GPSLatitude"][2];

$gpslatref = $exif["GPS"]["GPSLatitudeRef"];

$londeg = $exif["GPS"]["GPSLongitude"][0];

$lonmin = $exif["GPS"]["GPSLongitude"][1];

$lonsec = $exif["GPS"]["GPSLongitude"][2];

$gpslonref = $exif["GPS"]["GPSLongitudeRef"];

if ($gpslatref == 'S') { $latsign = -1; } else { $latsign = 1; }

if ($gpslonref == 'W') { $lonsign = -1; } else { $lonsign = 1; }

$mimetype = mime_content_type($tempphoto);

    if ($mimetype == "image/jpeg") {
    
        if ($watermark == "no") {
            
            //Fullsize
            $image = imagecreatefromjpeg($tempphoto);
            
            //Thumbnail
            imagecopyresampled($createwmimage, $image, 0, 0, 0, 0, $width, $height, $origwidth, $origheight);
    

            if ($menu == "gallery") {
                
                imagejpeg($createwmimage, "$thumbuploaddir/$value");
                imagejpeg($image, "$uploaddirectory/$value");
  
            } else {
    
                imagejpeg($createwmimage, "$thumbuploaddir$albumdir/$value");
                imagejpeg($image, "$uploaddirectory$albumdir/$value");
 
            }
    
        } elseif ($watermark == "yestext") {

            $image = imagecreatefromjpeg($tempphoto);
    
            // Text color
            if ($wmtextcolor == "grey") {
            
                $color = imagecolorallocate($image, 211, 211, 211);
            
            } elseif ($wmtextcolor == "black") {
            
                $color = imagecolorallocate($image, 0, 0, 0);
                
            } elseif ($wmtextcolor == "white") {
            
                $color = imagecolorallocate($image, 255, 255, 255);
                
            } elseif ($wmtextcolor == "blue") {
            
                $color = imagecolorallocate($image, 0, 0, 255);
                
            } elseif ($wmtextcolor == "red") {
            
                $color = imagecolorallocate($image, 255, 0, 0);
                
            } elseif ($wmtextcolor == "green") {
            
                $color = imagecolorallocate($image, 0, 128, 0);
                
            } elseif ($wmtextcolor == "yellow") {
            
                $color = imagecolorallocate($image, 255, 255, 0);
                
            } elseif ($wmtextcolor == "purple") {
            
                $color = imagecolorallocate($image, 128, 0, 128);
                
            } elseif ($wmtextcolor == "orange") {
            
                $color = imagecolorallocate($image, 255, 165, 0);
                
            }
    
    
        
            imagecopyresampled($createimage, $image, 0, 0, 0, 0, $origwidth, $origheight, $origwidth, $origheight);

            // Add watermark and position it
    
            if ($origheight <= 768) {
     
                imagettftext($createimage, 12, 0, $textfinalwidth, $textfinalheight, $color, $font, $textwatermark);

            } elseif ($origheight <= 1440) {

                imagettftext($createimage, 36, 0, $textfinalwidth, $textfinalheight, $color, $font, $textwatermark);
    
            } elseif ($origheight <= 2880) {

                imagettftext($createimage, 72, 0, $textfinalwidth, $textfinalheight, $color, $font, $textwatermark);
    
            } else {

                imagettftext($createimage, 144, 0, $textfinalwidth, $textfinalheight, $color, $font, $textwatermark);
            }
    
            //Write image to disk

            if ($menu == "gallery") {
    
                imagejpeg($createimage, "$uploaddirectory/$value");
            
            } else {
     
                imagejpeg($createimage, "$uploaddirectory$albumdir/$value");
        
            }

            //Thumnail
            $wmimage = imagecreatefromjpeg($tempphoto);
            imagecopyresampled($createwmimage, $wmimage, 0, 0, 0, 0, $width, $height, $origwidth, $origheight);
            imagettftext($createwmimage, 8, 0, $thumbfinalwidth, $thumbfinalheight, $color, $font, $textwatermark);
    
            if ($menu == "gallery") {
    
                imagejpeg($createwmimage, "$thumbuploaddir/$value");
        
            } else {

                imagejpeg($createwmimage, "$thumbuploaddir$albumdir/$value");

            }

        } elseif ($watermark == "yesimage") {

                //Full size
                $image = imagecreatefromjpeg($tempphoto);
                imagecopy($image, $watermarkimage, $imagefinalwidth, $imagefinalheight, 0, 0, $wmiwidth, $wmiheight);

            if ($menu == "gallery") {
    
                imagejpeg($image, "$uploaddirectory/$value");
            
            } else {
     
                imagejpeg($image, "$uploaddirectory$albumdir/$value");
            }


                //Thumbnail
                imagecopyresampled($createwmimage, $image, 0, 0, 0, 0, $width, $height, $origwidth, $origheight);
    
            if ($menu == "gallery") {
    
                imagejpeg($createwmimage, "$thumbuploaddir/$value");
        
            } else {
    
                imagejpeg($createwmimage, "$thumbuploaddir$albumdir/$value");

            }
        }
}

   
    if ($mimetype == "image/png") {

        if ($watermark == "no") {
            
            $image = imagecreatefrompng($tempphoto);

            //Fullsize
            $background1 = imagecolorallocate($createimage , 0, 0, 0);
            imagecolortransparent($createimage, $background1);
            imagealphablending($createimage, false);
            imagesavealpha($createimage, true);
            imagecopyresampled($createimage, $image, 0, 0, 0, 0, $origwidth, $origheight, $origwidth, $origheight);

            //Thumbnail
            $background = imagecolorallocate($createwmimage , 0, 0, 0);
            imagecolortransparent($createwmimage, $background);
            imagealphablending($createwmimage, false);
            imagesavealpha($createwmimage, true);
            imagecopyresampled($createwmimage, $image, 0, 0, 0, 0, $width, $height, $origwidth, $origheight);
   

            if ($menu == "gallery") {

                imagepng($createwmimage, "$thumbuploaddir/$value");
                imagepng($createimage, "$uploaddirectory/$value");

            } else {

                imagepng($createwmimage, "$thumbuploaddir$albumdir/$value");
                imagepng($createimage, "$uploaddirectory$albumdir/$value");

            }

        } elseif ($watermark == "yestext") {

            $image = imagecreatefrompng($tempphoto);
            //Fullsize
            $background = imagecolorallocate($createimage , 0, 0, 0);
            imagecolortransparent($createimage, $background);
             
             //Does PNG have transparent pixel?
            $icfpngwidth  = imagesx($image);
            $icfpngheight = imagesy($image);

            for ($i = 0; $i < $icfpngwidth; $i++) { 
            for ($j = 0; $j < $icfpngheight; $j++) {
                if (imagecolorat($image, $i, $j) & 0x7F000000) {
                    imagealphablending($createimage, false);
                } else {
                    imagealphablending($createimage, true);
                }
            }
            }
            
            imagesavealpha($createimage, true);
            imagecopyresampled($createimage, $image, 0, 0, 0, 0, $origwidth, $origheight, $origwidth, $origheight);

            // Text color
            if ($wmtextcolor == "grey") {
            
                $color = imagecolorallocate($image, 211, 211, 211);
            
            } elseif ($wmtextcolor == "black") {
            
                $color = imagecolorallocate($image, 0, 0, 0);
                
            } elseif ($wmtextcolor == "white") {
            
                $color = imagecolorallocate($image, 255, 255, 255);
                
            }
    
            // Add watermark and position it
    
             if ($origheight <= 768) {
     
                imagettftext($createimage, 12, 0, $textfinalwidth, $textfinalheight, $color, $font, $textwatermark);

            } elseif ($origheight <= 1440) {

                imagettftext($createimage, 36, 0, $textfinalwidth, $textfinalheight, $color, $font, $textwatermark);
    
            } elseif ($origheight <= 2880) {

                imagettftext($createimage, 72, 0, $textfinalwidth, $textfinalheight, $color, $font, $textwatermark);
    
            } else {

                imagettftext($createimage, 144, 0, $textfinalwidth, $textfinalheight, $color, $font, $textwatermark);
            }
    
            if ($menu == "gallery") {
    
                imagepng($createimage, "$uploaddirectory/$value");
                
            } else {
     
                imagepng($createimage, "$uploaddirectory$albumdir/$value");
            
            }


            //Thumbnail
            $background = imagecolorallocate($createwmimage , 0, 0, 0);
            imagecolortransparent($createwmimage, $background);

            //Does PNG have transparent pixel? 
            for ($i = 0; $i < $icfpngwidth; $i++) { 
            for ($j = 0; $j < $icfpngheight; $j++) {
                if (imagecolorat($image, $i, $j) & 0x7F000000) {
                    imagealphablending($createwmimage, false);
                } else {
                    imagealphablending($createwmimage, true);
                }
            }
            }
     
            
            imagesavealpha($createwmimage, true);    
            imagecopyresampled($createwmimage, $image, 0, 0, 0, 0, $width, $height, $origwidth, $origheight);
            imagettftext($createwmimage, 8, 0, $thumbfinalwidth, $thumbfinalheight, $color, $font, $textwatermark);
    
            if ($menu == "gallery") {
    
                imagepng($createwmimage, "$thumbuploaddir/$value");
        
            } else {

                imagepng($createwmimage, "$thumbuploaddir$albumdir/$value");

            }
  
        } elseif ($watermark == "yesimage") {

            $image = imagecreatefrompng($tempphoto);

            //Fullsize
            $background = imagecolorallocate($createimage , 0, 0, 0);
            imagecolortransparent($createimage, $background);
            imagealphablending($createimage, false);
            imagesavealpha($createimage, true);
            imagecopy($image, $watermarkimage, $imagefinalwidth, $imagefinalheight, 0, 0, $wmiwidth, $wmiheight);
            imagecopyresampled($createimage, $image, 0, 0, 0, 0, $origwidth, $origheight, $origwidth, $origheight);
     
            if ($menu == "gallery") {
    
                imagepng($createimage, "$uploaddirectory/$value");
            
            } else {
                
                imagepng($createimage, "$uploaddirectory$albumdir/$value");
            
            }


            //Thumbnail

            imagecolortransparent($createwmimage, $background);
            imagealphablending($createwmimage, false);
            imagesavealpha($createwmimage, true);
            imagecopyresampled($createwmimage, $image, 0, 0, 0, 0, $width, $height, $origwidth, $origheight);
    
            if ($menu == "gallery") {
    
                imagepng($createwmimage, "$thumbuploaddir/$value");
        
            } else {

                imagepng($createwmimage, "$thumbuploaddir$albumdir/$value");

            }
        }
}

    if ($mimetype == "image/gif") {

        if ($watermark == "no") {
      
            $image = imagecreatefromgif($tempphoto);
            imagecopyresampled($createwmimage, $image, 0, 0, 0, 0, $width, $height, $origwidth, $origheight);

            if ($menu == "gallery") {

                imagegif($createwmimage, "$thumbuploaddir/$value");
                imagegif($image, "$uploaddirectory/$value");
        
            } else {

                imagegif($createwmimage, "$thumbuploaddir$albumdir/$value");
                imagegif($image, "$uploaddirectory$albumdir/$value");
            }

    } elseif ($watermark == "yestext") {

            //Fullsize
            $image = imagecreatefromgif($tempphoto);
     
            // Text color
            if ($wmtextcolor == "grey") {
            
                $color = imagecolorallocate($image, 211, 211, 211);
            
            } elseif ($wmtextcolor == "black") {
            
                $color = imagecolorallocate($image, 0, 0, 0);
                
            } elseif ($wmtextcolor == "white") {
            
                $color = imagecolorallocate($image, 255, 255, 255);
                
            }
    
            // Add watermark and position it
  
             if ($origheight <= 768) {
     
                imagettftext($createimage, 12, 0, $textfinalwidth, $textfinalheight, $color, $font, $textwatermark);

            } elseif ($origheight <= 1440) {

                imagettftext($createimage, 36, 0, $textfinalwidth, $textfinalheight, $color, $font, $textwatermark);
    
            } elseif ($origheight <= 2880) {

                imagettftext($createimage, 72, 0, $textfinalwidth, $textfinalheight, $color, $font, $textwatermark);
    
            } else {

                imagettftext($createimage, 144, 0, $textfinalwidth, $textfinalheight, $color, $font, $textwatermark);
            }
    
            if ($menu == "gallery") {
    
                imagegif($image, "$uploaddirectory/$value");
            
            } else {
     
                imagegif($image, "$uploaddirectory$albumdir/$value");
            
            }

            //Thumbnail
            $wmimage = imagecreatefromgif($tempphoto);
            $black = imagecolorallocate($createwmimage, 0, 0, 0);
            imagecolortransparent($createwmimage, $black);
            imagefilledrectangle($createwmimage, 0, 0, $width, $height, $black); 
            imagecopyresampled($createwmimage, $wmimage, 0, 0, 0, 0, $width, $height, $origwidth, $origheight);
            imagettftext($createwmimage, 8, 0, $thumbfinalwidth, $thumbfinalheight, $color, $font, $textwatermark);
        
            if ($menu == "gallery") {
    
                imagegif($createwmimage, "$thumbuploaddir/$value");
        
            } else {

                imagegif($createwmimage, "$thumbuploaddir$albumdir/$value");

            }
    
    } elseif ($watermark == "yesimage") {

            $image = imagecreatefromgif($tempphoto);

            //Fullsize
            $black = imagecolorallocate($createimage, 0, 0, 0);
            imagecolortransparent($createimage, $black);
            imagealphablending($createimage, true);
            imagesavealpha($createimage, true);
            imagefilledrectangle($createimage, 0, 0, $width, $height, $black); 
            imagecopy($image, $watermarkimage, $imagefinalwidth, $imagefinalheight, 0, 0, $wmiwidth, $wmiheight);
            imagecopyresampled($createimage, $image, 0, 0, 0, 0, $origwidth, $origheight, $origwidth, $origheight);

            if ($menu == "gallery") {
    
                imagegif($createimage, "$uploaddirectory/$value");
            
            } else {
     
                imagegif($createimage, "$uploaddirectory$albumdir/$value");
            
            }

            //Thumbnails
            imagecolortransparent($createwmimage, $background);
            imagealphablending($createwmimage, true);
            imagesavealpha($createwmimage, true);
            imagefilledrectangle($createwmimage, 0, 0, $width, $height, $black); 
            imagecopyresampled($createwmimage, $image, 0, 0, 0, 0, $width, $height, $origwidth, $origheight);
        
            if ($menu == "gallery") {
    
                imagegif($createwmimage, "$thumbuploaddir/$value");
        
            } else {

                imagegif($createwmimage, "$thumbuploaddir$albumdir/$value");

            }

        }
}
    
    if ($mimetype == "image/bmp" || $mimetype == "image/x-ms-bmp") {

        if ($watermark == "no") {
      
            $image = imagecreatefrombmp($tempphoto);
            imagecopyresampled($createwmimage, $image, 0, 0, 0, 0, $width, $height, $origwidth, $origheight);
    
            if ($menu == "gallery") {

                imagebmp($createwmimage, "$thumbuploaddir/$value");
                imagebmp($image, "$uploaddirectory/$value");
        
            } else {

                imagebmp($createwmimage, "$thumbuploaddir$albumdir/$value");
                imagebmp($image, "$uploaddirectory$albumdir/$value");
            }

        } elseif ($watermark == "yestext") {


            //Fullsize
            $image = imagecreatefrombmp($tempphoto);
            
            // Text color
            if ($wmtextcolor == "grey") {
            
                $color = imagecolorallocate($image, 211, 211, 211);
            
            } elseif ($wmtextcolor == "black") {
            
                $color = imagecolorallocate($image, 0, 0, 0);
                
            } elseif ($wmtextcolor == "white") {
            
                $color = imagecolorallocate($image, 255, 255, 255);
                
            }
    
            // Add watermark and position it
    
            imagecopyresampled($createimage, $image, 0, 0, 0, 0, $origwidth, $origheight, $origwidth, $origheight);

             if ($origheight <= 768) {
     
                imagettftext($createimage, 12, 0, $textfinalwidth, $textfinalheight, $color, $font, $textwatermark);

            } elseif ($origheight <= 1440) {

                imagettftext($createimage, 36, 0, $textfinalwidth, $textfinalheight, $color, $font, $textwatermark);
    
            } elseif ($origheight <= 2880) {

                imagettftext($createimage, 72, 0, $textfinalwidth, $textfinalheight, $color, $font, $textwatermark);
    
            } else {

                imagettftext($createimage, 144, 0, $textfinalwidth, $textfinalheight, $color, $font, $textwatermark);
            }
    

            if ($menu == "gallery") {
    
                imagebmp($createimage, "$uploaddirectory/$value");
            
            } else {
     
                imagebmp($createimage, "$uploaddirectory$albumdir/$value");
            
            }

            // THUMBNAIL
            $wmimage = imagecreatefrombmp($tempphoto);
            imagecopyresampled($createwmimage, $wmimage, 0, 0, 0, 0, $width, $height, $origwidth, $origheight);
            imagettftext($createwmimage, 8, 0, $thumbfinalwidth, $thumbfinalheight, $color, $font, $textwatermark);
        
            if ($menu == "gallery") {
    
                imagebmp($createwmimage, "$thumbuploaddir/$value");
        
            } else {

                imagebmp($createwmimage, "$thumbuploaddir$albumdir/$value");

            }
    
        } elseif ($watermark == "yesimage") {

            $image = imagecreatefrombmp($tempphoto);
            
            //Fullsize
            imagecopy($image, $watermarkimage, $imagefinalwidth, $imagefinalheight, 0, 0, $wmiwidth, $wmiheight);
    
            if ($menu == "gallery") {
    
                imagebmp($image, "$uploaddirectory/$value");
            
            } else {
     
                imagebmp($image, "$uploaddirectory$albumdir/$value");
            
            }

            //Thumbnails
            imagecopyresampled($createwmimage, $image, 0, 0, 0, 0, $width, $height, $origwidth, $origheight);
     
            if ($menu == "gallery") {
    
                imagebmp($createwmimage, "$thumbuploaddir/$value");
        
            } else {

                imagebmp($createwmimage, "$thumbuploaddir$albumdir/$value");

            }

        }
}
     
    if ($mimetype == "image/svg+xml") {

            if ($menu == "gallery") {

                //SVG doesn't have thumbnails,so just copy it to the thumbnail directory   
                move_uploaded_file($tempphoto, "$uploaddirectory/$value");
                copy("$uploaddirectory/$value", "$thumbuploaddir/$value");
    
            } else {

                move_uploaded_file($tempphoto, "$uploaddirectory$albumdir/$value");
                copy("$uploaddirectory$albumdir/$value", "$thumbuploaddir$albumdir/$value");
            }

}

    if ($mimetype == "video/mp4" || $mimetype == "video/webm" || $mimetype == "video/ogg") {

            if ($menu == "gallery") {

                //SVG doesn't have thumbnails,so just copy it to the thumbnail directory   
                move_uploaded_file($tempphoto, "$uploaddirectory/$value");
                copy("$uploaddirectory/$value", "$thumbuploaddir/$value");
                exec ("chmod ugo+x $originals");
                copy("$uploaddirectory/$value", "$originals/$value");
                chmod("$originals/$value", 0775);
                exec ("chmod ugo-x $originals");
    
            } else {

                move_uploaded_file($tempphoto, "$uploaddirectory$albumdir/$value");
                copy("$uploaddirectory$albumdir/$value", "$thumbuploaddir$albumdir/$value");
                exec ("chmod ugo+x $originals");
                copy("$uploaddirectory$albumdir/$value", "$originals$albumdir/$value");
                chmod("$originals/$value", 0775);
                exec ("chmod ugo-x $originals");
            }

}


//Write original file to disk, retains exif data.
     if ($menu == "gallery") {
        exec ("chmod ugo+x $originals");
        move_uploaded_file($tempphoto, "$originals/$value");
        chmod("$originals/$value", 0775);
        exec ("chmod ugo-x $originals");
    } else {
        exec ("chmod ugo+x $originals");
        move_uploaded_file($tempphoto, "$originals$albumdir/$value");
        chmod("$originals$albumdir/$value", 0775);
        exec ("chmod ugo-x $originals");
    }


    $result4 = mysqli_query($dbconnect, "SELECT MAX(displayorder) FROM photos WHERE ain = '$ain'");
    $row4 = mysqli_fetch_row($result4);
        $number =  $row4[0];

    $displayorder = $number + 1; 
    
    if ($albumdir == "") {
        $albumdir = "/";
    }

    if (!isset($photodate)) {
            $showphotodate = "no";
        } else {    
            $showphotodate = "yes";
        }

    if (!isset($cameramake)) {
            $showcameramake = "no";
        } else {    
            $showcameramake = "yes";
        }

    if (!isset($cameramodel)) {
            $showcameramodel = "no";
        } else {    
            $showcameramodel = "yes";
        }
    
    if (!isset($xres)) {
            $showxres = "no";
        } else {    
            $showxres = "yes";
        }

    if (!isset($yres)) {
            $showyres = "no";
        } else {    
            $showyres = "yes";
        }

    if (!isset($resolutionunit)) {
            $showresolutionunit = "no";
        } else {    
            $showresolutionunit = "yes";
        }

    if (!isset($focusdistance)) {
            $showfocusdistance = "no";
        } else {    
            $showfocusdistance = "yes";
        }

    if (!isset($focallength)) {
            $showfocallength = "no";
        } else {    
            $showfocallength = "yes";
        }

    if (!isset($software)) {
            $showsoftware = "no";
        } else {    
            $showsoftware = "yes";
        }
    
    if (!isset($aperturefnumber)) {
            $showaperturefnumber = "no";
        } else {    
            $showaperturefnumber = "yes";
        }

    if (!isset($aperturevalue)) {
            $showaperturevalue = "no";
        } else {    
            $showaperturevalue = "yes";
        }

    if (!isset($shutterspeed)) {
            $showshutterspeed = "no";
        } else {    
            $showshutterspeed = "yes";
        }

    if (!isset($brightnessvalue)) {
            $showbrightnessvalue = "no";
        } else {    
            $showbrightnessvalue = "yes";
        }

    if (!isset($sharpness)) {
            $showsharpness = "no";
        } else {    
            $showsharpness = "yes";
        }

    if (!isset($colorspace)) {
            $showcolorspace = "no";
        } else {    
            $showcolorspace = "yes";
        }

    if (!isset($scenecapturetype)) {
            $showscenecapturetype = "no";
        } else {    
            $showscenecapturetype = "yes";
        }

    if (!isset($exposuretime)) {
            $showexposuretime = "no";
        } else {    
            $showexposuretime = "yes";
        }

    if (!isset($flash)) {
            $showflash = "no";
        } else {    
            $showflash = "yes";
        }

    if (!isset($saturation)) {
            $showsaturation = "no";
        } else {    
            $showsaturation = "yes";
        }

    if (!isset($whitebalance)) {
            $showwhitebalance = "no";
        } else {    
            $showwhitebalance = "yes";
        }

    if (!isset($interoperabilityindex)) {
            $showinteroperabilityindex = "no";
        } else {    
            $showinteroperabilityindex = "yes";
        }

    if (!isset($interoperabilityversion)) {
            $showinteroperabilityversion = "no";
        } else {    
            $showinteroperabilityversion = "yes";
        }

    if (!isset($subjectdistance)) {
            $showsubjectdistance = "no";
        } else {    
            $showsubjectdistance = "yes";
        }

    if (!isset($isospeedratings)) {
            $showisospeedratings = "no";
        } else {    
            $showisospeedratings = "yes";
        }

    if (!isset($contrast)) {
            $showcontrast = "no";
        } else {    
            $showcontrast = "yes";
        }

    if (!isset($fl35mm)) {
            $showfl35mm = "no";
        } else {    
            $showfl35mm = "yes";
        }

    if (!isset($metering)) {
            $showmetering = "no";
        } else {    
            $showmetering = "yes";
        }

    if (!isset($orientation)) {
                $showorientation = "no";
        } else {    
            $showorientation = "yes";
        }

    if (!isset($iscolor)) {
                $showiscolor = "no";
        } else {    
            $showiscolor = "yes";
        }

    if (!isset($subsectime)) {
            $showsubsectime = "no";
        } else {    
            $showsubsectime = "yes";
        }

    if (!isset($subsectimeoriginal)) {
            $showsubsectimeoriginal = "no";
        } else {    
            $showsubsectimeoriginal = "yes";
        }

    if (!isset($subsectimedigitized)) {
            $showsubsectimedigitized = "no";
        } else {    
            $showsubsectimedigitized = "yes";
        }

    if (!isset($flashpixversion)) {
            $showflashpixversion = "no";
        } else {    
            $showflashpixversion = "yes";
        }

    if (!isset($imageuniqueid)) {

            $showimageuniqueid = "no";
        } else {    
            $showimageuniqueid = "yes";
        }


    if (!isset($exifver)) {
            $showexifver = "no";
        } else {    
            $showexifver = "yes";
        }
   
        if ($componentsconfiguration == "") {
             $showcomponentsconfiguration = "no";
        } else {    
            $showcomponentsconfiguration = "yes";
        }



if (!isset($ycbcrpositioning)) {
        $showycbcrpositioning = "no";
        } else {    
            $showycbcrpositioning = "yes";
        }

if ($scenetype == "") {
        $showscenetype = "no";
        } else {    
            $showscenetype = "yes";
        }

if (!isset($exposurebiasvalue)) {
        $showexposurebiasvalue = "no";
        } else {    
            $showexposurebiasvalue = "yes";
        }

if (!isset($exposuremode)) {
        $showexposuremode = "no";
        } else {    
            $showexposuremode = "yes";
        }

if (!isset($lightsource)) {
        $showlightsource = "no";
        } else {    
            $showlightsource = "yes";
        }

if ($filesource == "") {
        $showfilesource = "no";
        } else {    
            $showfilesource = "yes";
        }

if (!isset($digitalzoomratio)) {
        $showdigitalzoomratio = "no";
        } else {    
            $showdigitalzoomratio = "yes";
        }

if (!isset($customrendered)) {
        $showcustomrendered = "no";
        } else {    
            $showcustomrendered = "yes";
        }

if (!isset($compressedbitsperpixel)) {
        $showcompressedbitsperpixel = "no";
        } else {    
            $showcompressedbitsperpixel = "yes";
        }

if (!isset($maxaperturevalue)) {
        $showmaxaperturevalue = "no";
        } else {    
            $showmaxaperturevalue = "yes";
        }

if (!isset($exposureprogram)) {
        $showexposureprogram = "no";
        } else {    
            $showexposureprogram = "yes";
        }




    if (!isset($gpsaltitude)) {
            $showgpsaltitude = "no";
        } else {    
            $showgpsaltitude = "yes";
        }

    if ($latdeg == "" || $londeg == "") {
    	$enablegps = "no";
    	} else {	
    	$enablegps = "yes";
    	}






        $showname = "yes";
        $showmimetype = "yes";

            if ($mimetype == "video/ogg" || $mimetype == "video/webm" || $mimetype == "video/mp4") {

        $showdimensions = "no";

    } else {
        $showdimensions = "yes";
    }

        $showsize = "yes";

    $public = "public";
    
    if ($photodate == "") {
        $photodate = "";
    }

    if ($cameramake == "") {
        $cameramake = "";
    }

    if ($cameramodel == "") {
        $cameramodel = "";
    }

    if ($orientation == "") {
        $orientation = "";
    }

    if ($iscolor == "") {
        $iscolor = "";
    }

    if ($xres == "") {
        $xres = "";
    }

    if ($yres == "") {
        $yres = "";
    }

    if ($resolutionunit == "") {
        $resolutionunit = "";
    }

    if ($focusdistance == "") {
        $focusdistance = "";
    }

    if ($focallength == "") {
        $focallength = "";
    }

    if ($software == "") {
        $software = "";
    }

    if ($aperturefnumber == "") {
        $aperturefnumber = "";
    }

    if ($aperturevalue == "") {
        $aperturevalue = "";
    }


    if ($shutterspeed == "") {
        $shutterspeed = "";
    }

if ($brightnessvalue == "") {
        $brightnessvalue = "";
    }

if ($sharpness == "") {
        $sharpness = "";
    }

if ($colorspace == "") {
        $colorspace = "";
    }

if ($interoperabilityindex == "") {
        $interoperabilityindex = "";
    }

if ($interoperabilityversion == "") {
        $interoperabilityversion = "";
    }

if ($scenecapturetype == "") {
        $scenecapturetype = "";
    }

    if ($exposuretime == "") {
        $exposuretime = "";
    }

    if ($flash == "") {
        $flash = "";
    }

    if ($saturation == "") {
        $saturation = "";
    }

    if ($whitebalance == "") {
        $whitebalance = "";
    }

    if ($subjectdistance == "") {
        $subjectdistance = "";
    }

    if ($isospeedratings == "") {
        $isospeedratings = "";
    }

    if ($contrast == "") {
        $contrast = "";
    }

if ($fl35mm == "") {
        $fl35mm = "";
    }

    if ($metering == "") {
        $metering = "";
    }

if ($exifver == "") {
        $exifver = "";
    }

    if ($subsectime == "") {
        $subsectime = "";
    }

    if ($subsectimeoriginal == "") {
        $subsectimeoriginal = "";
    }

    if ($subsectimedigitized == "") {
        $subsectimedigitized = "";
    }

    if ($flashpixversion == "") {
        $flashpixversion = "";
    }

     if ($imageuniqueid == "") {
        $imageuniqueid = "";
    }

     if ($latdeg == "") {
        $latdeg = "";
    }

     if ($latmin == "") {
        $latmin = "";
    }

     if ($latsec == "") {
        $latsec = "";
    }

     if ($gpslatref == "") {
        $gpslatref = "";
    }

     if ($latsign == "") {
        $latsign = "";
    }

     if ($londeg == "") {
        $londeg = "";
    }

     if ($lonmin == "") {
        $lonmin = "";
    }

     if ($lonsec == "") {
        $lonsec = "";
    }

     if ($gpslonref == "") {
        $gpslonref = "";
    }

    if ($lonsign == "") {
        $lonsign = "";
    }

    if ($gpsaltitude == "") {
        $gpsaltitude = "";
    }

    if ($altref == "") {
        $altref = "";
    }

    if ($componentsconfiguration == "") {
        $componentsconfiguration = "";
    }

    if ($ycbcrpositioning == "") {
        $ycbcrpositioning = "";
    }

    if ($scenetype == "") {
        $scenetype = "";
    }

    if ($exposurebiasvalue == "") {
        $exposurebiasvalue = "";
    }
    if ($exposuremode == "") {
        $exposuremode = "";
    }
    if ($lightsource == "") {
        $lightsource = "";
    }

    if ($filesource == "") {
        $filesource = "";
    }

    if ($digitalzoomratio == "") {
        $digitalzoomratio = "";
    }

    if ($customrendered == "") {
        $customrendered = "";
    }

    if ($compressedbitsperpixel == "") {
        $compressedbitsperpixel = "";
    }

    if ($maxaperturevalue == "") {
        $maxaperturevalue = "";
    }

    if ($exposureprogram == "") {
        $exposureprogram = "";
    }

    if ($description == "") {
        $description = "";
    }

    if ($enablegps == "") {
        $enablegps = "";
    }

    $stmt = $dbconnect->prepare("INSERT INTO photos (name, ain, photodir, displayorder, status, photodate, cameramake, cameramodel, orientation, iscolor, xres, yres, resolutionunit, focusdistance, focallength, software, apfnumber, apvalue, shutterspeed, brightnessvalue, sharpness, colorspace, interoperabilityindex, interoperabilityversion, scenecapturetype, exposuretime, flash, saturation, whitebalance, subjectdistance, isospeedratings, contrast, fl35mm, metering, exifver, subsectime, subsectimeoriginal, subsectimedigitized, flashpixversion, imageuniqueid, latdeg, latmin, latsec, gpslatref, latsign, londeg, lonmin, lonsec, gpslonref, lonsign ,gpsaltitude, altref, componentsconfiguration, ycbcrpositioning, scenetype, exposurebiasvalue, exposuremode, lightsource, filesource, digitalzoomratio, customrendered, compressedbitsperpixel, maxaperturevalue, exposureprogram, description, enablegps, showphotodate, showcameramake, showcameramodel, showorientation, showiscolor, showxres, showyres, showresolutionunit, showfocusdistance, showfocallength, showsoftware, showaperturefnumber, showaperturevalue, showshutterspeed, showbrightnessvalue, showsharpness, showcolorspace, showscenecapturetype, showexposuretime, showflash, showsaturation, showwhitebalance, showinteroperabilityindex, showinteroperabilityversion, showsubjectdistance, showisospeedratings, showcontrast, showfl35mm, showmetering, showexifver, showsubsectime, showsubsectimeoriginal, showsubsectimedigitized, showflashpixversion, showimageuniqueid, showgpsaltitude, showname, showmimetype, showdimensions, showsize, showcomponentsconfiguration, showycbcrpositioning, showscenetype, showexposurebiasvalue, showexposuremode, showlightsource, showfilesource, showdigitalzoomratio, showcustomrendered, showcompressedbitsperpixel, showmaxaperturevalue, showexposureprogram) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sissssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss", $value, $ain, $albumdir, $displayorder, $public, $photodate, $cameramake, $cameramodel, $orientation, $iscolor, $xres, $yres, $resolutionunit, $focusdistance, $focallength, $software, $aperturefnumber, $aperturevalue, $shutterspeed, $brightnessvalue, $sharpness, $colorspace, $interoperabilityindex, $interoperabilityversion, $scenecapturetype, $exposuretime, $flash, $saturation, $whitebalance, $subjectdistance, $isospeedratings, $contrast, $fl35mm, $metering, $exifver, $subsectime, $subsectimeoriginal, $subsectimedigitized, $flashpixversion, $imageuniqueid, $latdeg, $latmin, $latsec, $gpslatref, $latsign, $londeg, $lonmin, $lonsec, $gpslonref, $lonsign, $gpsaltitude, $altref, $componentsconfiguration, $ycbcrpositioning, $scenetype, $exposurebiasvalue, $exposuremode, $lightsource, $filesource, $digitalzoomratio, $customrendered, $compressedbitsperpixel, $maxaperturevalue, $exposureprogram, $description, $enablegps, $showphotodate, $showcameramake, $showcameramodel, $showorientation, $showiscolor, $showxres, $showyres, $showresolutionunit, $showfocusdistance, $showfocallength, $showsoftware, $showaperturefnumber, $showaperturevalue, $showshutterspeed, $showbrightnessvalue, $showsharpness, $showcolorspace, $showscenecapturetype, $showexposuretime, $showflash, $showsaturation, $showwhitebalance, $showinteroperabilityindex, $showinteroperabilityversion, $showsubjectdistance, $showisospeedratings, $showcontrast, $showfl35mm, $showmetering, $showexifver, $showsubsectime, $showsubsectimeoriginal, $showsubsectimedigitized, $showflashpixversion, $showimageuniqueid, $showgpsaltitude, $showname, $showmimetype, $showdimensions, $showsize, $showcomponentsconfiguration, $showycbcrpositioning, $showscenetype, $showexposurebiasvalue, $showexposuremode, $showlightsource, $showfilesource, $showdigitalzoomratio, $showcustomrendered, $showcompressedbitsperpixel, $showmaxaperturevalue, $showexposureprogram);
    $stmt->execute();


}

    if ($menu == "gallery") {

            if ($totalfilesprocessed == 1) {

                //$count is used to report how many photos had repeat names.
                $_SESSION['repeats'] = $repeats;
                $_SESSION['photoupload'] = "success";
                $_SESSION['counting'] = $count;
                    header('Location: index.php?menu=gallery&page='.$page.'&update=success');

            } else {

                //$count is used to report how many photos had repeat names.
                $_SESSION['repeats'] = $repeats;
                $_SESSION['photoupload'] = "successes";
                $_SESSION['counting'] = $count;
                header('Location: index.php?menu=gallery&page='.$page.'&update=successes');

            }


    } else {
           
           if ($totalfilesprocessed == 1) {

                //$count is used to report how many photos had repeat names.
                $_SESSION['repeats'] = $repeats;
                $_SESSION['photoupload'] = "success";
                $_SESSION['counting'] = $count;
                header('Location: index.php?menu=subalbum&album='.$album.'&ain='.$ain.'&page='.$page.'&update=success');

            } else {

                //$count is used to report how many photos had repeat names.
                $_SESSION['repeats'] = $repeats;
                $_SESSION['photoupload'] = "successes";
                $_SESSION['counting'] = $count;
                header('Location: index.php?menu=subalbum&album='.$album.'&ain='.$ain.'&page='.$page.'&update=successes');

            }
    }

} 

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
