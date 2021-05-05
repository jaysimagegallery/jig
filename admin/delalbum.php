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

$ain = $_POST['ain'];
$album = $_POST['album'];
$page = $_POST['page'];




$sql1 = "SELECT pain,albumdir FROM albums WHERE ain = '$ain' AND album = '$album'";
    $result1 = mysqli_query($dbconnect, $sql1);
    $row1 = mysqli_fetch_row($result1);
    $pain = $row1[0];
    $albumdir = $row1[1]; 


$originals = "../images/originals$albumdir";
$albumtory = "$albumdir";
$directory = "../images/gallery$albumdir";
$thumbdir = "../images/thumbnails$albumdir";

if ($pain == "1") {


  $sql2 = "DELETE FROM albums WHERE albumdir LIKE '/$album' OR albumdir LIKE '/$album/%'";
  $result2=mysqli_query($dbconnect,$sql2);

 exec('rm -rf "'.$directory.'"');
 exec('rm -rf "'.$thumbdir.'"');
 exec ("chmod ugo+x ../images/originals");
 exec('rm -rf "'.$originals.'"');
 exec ("chmod ugo-x ../images/originals");

  $sql3 = "DELETE FROM comments WHERE photodir LIKE '/$album' OR photodir LIKE '/$album/%'";
  $result3=mysqli_query($dbconnect,$sql3);
  
  $sql4 = "DELETE FROM photos WHERE photodir LIKE '/$album' OR photodir LIKE '/$album/%'";
  $result4=mysqli_query($dbconnect,$sql4);

      header('Location: index.php?menu=gallery&delete=successfully');
}

if ($pain > 1) {

  $sql5 = "DELETE FROM albums WHERE albumdir LIKE '$albumdir' OR albumdir LIKE '$albumdir/%'";
  $result5=mysqli_query($dbconnect,$sql5);

  exec('rm -rf "'.$directory.'"');
  exec('rm -rf "'.$thumbdir.'"');
  exec ("chmod ugo+x ../images/originals");
  exec('rm -rf "'.$originals.'"');
  exec ("chmod ugo-x ../images/originals");

  $sql6 = "DELETE FROM comments WHERE photodir LIKE '$albumtory%' OR photodir LIKE '/$albumtory/%'";
  $result6=mysqli_query($dbconnect,$sql6);
 

  $sql7 = "DELETE FROM photos WHERE photodir LIKE '$albumtory%' OR photodir LIKE '/$albumtory/%'";
  $result7=mysqli_query($dbconnect,$sql7);

      header('Location: index.php?menu=subalbum&ain='.$pain.'&page='.$page.'&delete=successfully');   

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