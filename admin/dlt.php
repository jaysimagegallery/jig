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

	$downloadtheme = $_POST['downloadtheme'];

	$sql = "SELECT * FROM theme WHERE inuse = 'yes'";
	$result = mysqli_query($dbconnect, $sql);
	while ($row = mysqli_fetch_assoc($result)) {
		$details[] = $row;
	}

$fontfamily = $details[0]["current"];
$fontcolor = $details[1]["current"];
$obc = $details[2]["current"];
$ibc = $details[3]["current"];
$seltab = $details[4]["current"];
$stfc = $details[5]["current"];
$unseltab = $details[6]["current"];
$ustfc = $details[7]["current"];
$buttons = $details[8]["current"];
$btc = $details[9]["current"];
$iab = $details[10]["current"];
$abc = $details[11]["current"];
$afc = $details[12]["current"];
$breadfont = $details[13]["current"];
$breadcrumb = $details[14]["current"];
$divider = $details[15]["current"];
$tbb = $details[16]["current"];
$tbbg = $details[17]["current"];
$borders = $details[18]["current"];
$failedlogintextcolor = $details[19]["current"];
$npdt = $details[20]["current"];
$npbg = $details[21]["current"];
$dlc = $details[22]["current"];
$vlc = $details[23]["current"];
$sfbg = $details[24]["current"];
$sfb = $details[25]["current"];

header("Content-type: text/plain");
header("Content-Disposition: attachment; filename=$downloadtheme.jig");

echo "/* Theme file for JIG (Jay's Image Gallery) 1.0 */";
echo "\n";
echo "/* Licensed under the AGPLv3 (or later) */";
echo "\n";
echo "\n";

echo "\$name = \"";
echo $downloadtheme;
echo "\";";

echo "\n";
echo "\$fontfamily = \"";
echo $fontfamily;
echo "\";";
echo "\n";

echo "\$fontcolor = \"";
echo $fontcolor;
echo "\";";
echo "\n";

echo "\$obc = \"";
echo $obc;
echo "\";";
echo "\n";

echo "\$ibc = \"";
echo $ibc;
echo "\";";
echo "\n";

echo "\$seltab = \"";
echo $seltab;
echo "\";";
echo "\n";

echo "\$stfc = \"";
echo $stfc;
echo "\";";
echo "\n";

echo "\$unseltab = \"";
echo $unseltab;
echo "\";";
echo "\n";

echo "\$ustfc = \"";
echo $ustfc;
echo "\";";
echo "\n";

echo "\$buttons = \"";
echo $buttons;
echo "\";";
echo "\n";

echo "\$btc = \"";
echo $btc;
echo "\";";
echo "\n";

echo "\$iab = \"";
echo $iab;
echo "\";";
echo "\n";

echo "\$abc = \"";
echo $abc;
echo "\";";
echo "\n";

echo "\$afc = \"";
echo $afc;
echo "\";";
echo "\n";

echo "\$breadfont = \"";
echo $breadfont;
echo "\";";
echo "\n";

echo "\$breadcrumb = \"";
echo $breadcrumb;
echo "\";";
echo "\n";

echo "\$divider = \"";
echo $divider;
echo "\";";
echo "\n";

echo "\$tbb = \"";
echo $tbb;
echo "\";";
echo "\n";

echo "\$tbbg = \"";
echo $tbbg;
echo "\";";
echo "\n";

echo "\$borders = \"";
echo $borders;
echo "\";";
echo "\n";

echo "\$failedlogintextcolor = \"";
echo $failedlogintextcolor;
echo "\";";
echo "\n";

echo "\$npdt = \"";
echo $npdt;
echo "\";";
echo "\n";

echo "\$npbg = \"";
echo $npbg;
echo "\";";
echo "\n";

echo "\$dlc = \"";
echo $dlc;
echo "\";";
echo "\n";

echo "\$vlc = \"";
echo $vlc;
echo "\";";
echo "\n";

echo "\$sfbg = \"";
echo $sfbg;
echo "\";";
echo "\n";

echo "\$sfb = \"";
echo $sfb;
echo "\";";

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