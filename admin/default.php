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
?>

<div class="options fade">
	<div class="aswrapper">
		<div class="iaswrapper">
			<span class="boxhead"><?php echo $welcome; ?></span>
<br><br>

<div class="sys1">
	<?php echo $minnote; ?>
	<br><br>
	<?php echo $licnote; ?>
	<br><br>
	<?php echo $supformat; ?>	
</div>

<div class="sys2"><?php echo $minsys; ?>
<br><br>
<?php echo $insver; ?>
<br><br>
<?php echo $libgd; ?>
</div>

<br><br><br><br><br><br>

</div>
</div>

<hr class="divider">
<br>

<div class="aswrapper">
	<div class="iaswrapper">
		<span class="boxhead"><?php echo $sysinfo ?></span>
<br>
		<div class="sys1"><br><?php echo $distribution; ?>: <?php $distro = exec("cat /etc/os-release | sed -n '1 p' | cut -c 7-"); echo mb_substr($distro, 0, -1); echo " "; $release = exec("cat /etc/os-release | sed -n '2 p' | cut -c 10-");  echo mb_substr($release, 0, -1); if ($distro == "" || $release == "") { echo $unknown; } ?></div> 
		<div class="sys2"><br><?php echo $hostname; ?>: <?php $yourhostname = exec ("hostname -f"); if ($yourhostname == "") { echo $unknown; } else { echo $yourhostname;  } ?></div>
		<div class="sys1"><br><?php echo $kernel; ?>: <?php $yourkernel = php_uname('r'); if ($yourkernel == "") { echo $unknown; } else { echo $yourkernel; } ?></div>
		<div class="sys2"><br><?php echo $uptime; ?>: <?php $sysut = system("uptime -p | sed 's/up //g'"); if ($sysut == "") { echo $unknown; } ?></div>	
		<div class="sys1"><br><?php echo $cpu; ?>: <?php $yourcpu = system("cat /proc/cpuinfo | sed -n '5 p' | cut -c 13-"); if ($yourcpu == "") { echo $unknown; }?> </div>
		<div class="sys2"><br><?php echo $memory; ?>:
			&nbsp;<?php $memt = exec("cat /proc/meminfo | sed -n '1 p' | cut -c 16-32"); $memgbt = $memt/1000/1000; if ($memt != "") { echo round($memgbt,2)." GB ($total)"; } else { echo $unknown; } ?> 
			&nbsp;<?php $memf = exec("cat /proc/meminfo  | sed -n '2 p' | cut -c 16-32", $value); $memgbf = $memf/1000/1000; if ($memt != "") {echo round($memgbf,2)." GB ($free)"; } ?>
			&nbsp;<?php $memu = $memgbt - $memgbf; if ($memt != "") { echo round($memu,2)." GB ($used)"; } ?>				
		</div>
		<div class="sys1"><br><?php echo $loadavg; ?>: &nbsp;<?php $la = sys_getloadavg(); echo $la[0]; echo "&nbsp;&nbsp;$la[1]"; echo "&nbsp;&nbsp;$la[2]"; if ($la == "") { echo $unknown; } ?></div>
		<div class="sys2"><br><?php echo $swap; ?>: 
			&nbsp;<?php $swapt = exec("cat /proc/meminfo | sed -n '15 p' | cut -c 16-32"); $swapgbt = $swapt/1000/1000; if ($swapt != "") { echo round($swapgbt,2)." GB ($total)"; } else { echo $unknown; }; ?>
			&nbsp;<?php $swapf = exec("cat /proc/meminfo  | sed -n '16 p' | cut -c 16-32"); $swapgbf = $swapf/1000/1000; if ($swapt != "") echo round($swapgbf,2). " GB ($free)"; ?> 
			&nbsp;<?php $swapu = $swapgbt - $swapgbf; if ($swapt != "") { echo round($swapu,2)." GB ($used)"; } ?>
		</div>
	</div>
</div>
<br>
<hr class="divider">
<br>
<?php phpinfo(); ?>
<br>
</div>

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
