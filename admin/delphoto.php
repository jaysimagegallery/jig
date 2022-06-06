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

  $name = $_POST['namedit'];
  $page = $_POST['page'];
  $ain = $_POST['ain'];
  $pin = $_POST['pin'];
  $album = $_SESSION['album'];

  $sql = "DELETE FROM comments WHERE pin = '$pin'";
  $result = mysqli_query($dbconnect, $sql);

  $sql1 = "SELECT albumdir FROM albums WHERE ain = '$ain'";
  $result1 = mysqli_query($dbconnect, $sql1);
  $row1 = mysqli_fetch_row($result1);
    $albumdir = $row1[0];
  
if ($albumdir == "/") {

  $originals = "../images/originals/$name";
  $directory = "../images/gallery/$name";
  $thumbdir = "../images/thumbnails/$name";

} else {

  $originals = "../images/originals/$albumdir/$name";
  $directory = "../images/gallery$albumdir/$name";
  $thumbdir = "../images/thumbnails$albumdir/$name";

}

  exec('rm -rf "'.$directory.'"');
  exec('rm -rf "'.$thumbdir.'"');
  exec ("chmod ugo+x ../images/originals");
  exec('rm -rf "'.$originals.'"');
  exec ("chmod ugo-x ../images/originals");

  $sql2 = "DELETE FROM photos WHERE ain = '$ain' AND name = '$name'";
  $result2 = mysqli_query($dbconnect, $sql2);
 
if ($ain == 1) {

        header('Location: index.php?menu=gallery&ain=1&delphoto=successfully');

} else {

        header('Location: index.php?menu=subalbum&album='.$album.'&ain='.$ain.'&page='.$page.'&delphoto=successfully');
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
