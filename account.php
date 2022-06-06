<?php

session_start();
require ('config.php');
$menu = $_GET['menu'];
$forgot = $_GET['password'];
$prrk = $_GET['pr'];
$email = $_POST['email'];
$newpassword = $_POST['newpassword'];
$newpassword2 = $_POST['newpassword2'];
$musername = $_SESSION['musername'];

$sql0 = "SELECT username FROM members LIMIT 1";
	$result0 = mysqli_query($dbconnect, $sql0);
	$row0 = mysqli_fetch_row($result0);
	$adminusername =  $row0[0];

$stmt1 = $dbconnect -> prepare("SELECT password FROM members WHERE username = ?");
$stmt1 -> bind_param('s', $adminusername);
$stmt1 -> execute();
$stmt1 -> store_result();
$stmt1 -> bind_result($adminpassword);
$stmt1 -> fetch();

if  (isset($_SESSION['musername']) || isset($_SESSION['ausername'])) {

		$ausername = $_SESSION['ausername'];

		$update = $_GET["update"];

		if ($update == "mismatch") {
			echo "<div class=\"failure\"><img class=\"failureimg\" src=\"images/system/failure.png\"> $notice23</div><br>";
		}

		if ($update == "passwordsuccess") {
			echo "<div class=\"success\"><img class=\"checkmark\" src=\"images/system/checkmark.png\"> $notice24</div><br>";
				$_SESSION['ausername'] = "$ausername";
				$_SESSION['apassword'] = "$adminpassword";
		}

		if ($update == "emailsuccess") {
			echo "<div class=\"success\"><img class=\"checkmark\" src=\"images/system/checkmark.png\"> $notice25</div><br>";
		}

		if ($update == "photosuccess") {
			echo "<div class=\"success\"><img class=\"checkmark\" src=\"images/system/checkmark.png\"> $notice39</div><br>";
		}

		if ($update == "delprofilepic") {
			echo "<div class=\"success\"><img class=\"checkmark\" src=\"images/system/checkmark.png\"> $notice41</div><br>";
		}

		if ($update == "passwordblank") {
			echo "<div class=\"failure\"><img class=\"failureimg\" src=\"images/system/failure.png\"> $notice40</div><br>";
		}

		if ($update == "unsupported") {
			echo "<div class=\"failure\"><img class=\"failureimg\" src=\"images/system/failure.png\"> $notice20</div><br>";
		}

		if ($update == "emailblank") {
			echo "<div class=\"failure\"><img class=\"failureimg\" src=\"images/system/failure.png\"> $notice42</div><br>";
		}

		if ($update == "requirements") {
		echo "<div class=\"success\"><img class=\"checkmark\" src=\"images/system/checkmark.png\"> $notice30</div><br>";
		}

		if ($update == "contactform") {
		echo "<div class=\"success\"><img class=\"checkmark\" src=\"images/system/checkmark.png\"> $notice1</div><br>";
		}

		if ($update == "notifyanon") {
		echo "<div class=\"success\"><img class=\"checkmark\" src=\"images/system/checkmark.png\"> $notice1</div><br>";
		}

		if ($update == "emailtaken") {
			echo "<div class=\"failure\"><img class=\"failureimg\" src=\"images/system/failure.png\"> $notice46</div><br>";
		}

		if (isset($_SESSION['musername'])) {


			$update = $_GET["mod"];
		if ($update == "deleted") {
			echo "<div class=\"success\"><img class=\"checkmark\" src=\"images/system/checkmark.png\"> $notice19</div><br>";
		}

		$ipaddress = $_SERVER["REMOTE_ADDR"];	
		$sql1a = "DELETE FROM loginattempts WHERE ipaddress = '$ipaddress'";
		$result1a = mysqli_query($dbconnect, $sql1a);

		echo "<div class=\"fade\">";

		$sql = "SELECT username,first,last,email,photoname,photo,mimetype FROM members WHERE username = '$musername'";
		$result = mysqli_query($dbconnect, $sql);
		$row = mysqli_fetch_row($result);
			$username = $row[0];
			$firstname = $row[1];
			$lastname = $row[2];
			$email = $row[3];
			$photoname = $row[4];
			$photo = base64_encode($row[5]);
			$mimetype = $row[6];

		if ($photo != "") {			
			echo "<div class=\"profilephotodiv\"><img src=\"data:$mimetype;charset=utf8;base64,$photo\" class=\"profilephoto\"></div>";
		} 

			if ($username == $adminusername) {

			echo "<div class=\"profileinfo\"><span class=\"boxhead\">$administrator</span><br><span class=\"name\">$username</span></div>";
			echo "<br><br><br>";

			} else {

			echo "<div class=\"profileinfo\"><span class=\"boxhead\">$username</span><br><span class=\"name\">$firstname $lastname</span></div>";
			echo "<br><br><br>";

			}


		if ($photo != "") {
		
			echo "<br><br><br>";
		}

		if ($photo == "") {

		echo "$profilephoto:<br>";
		echo "<form action=\"updatemember.php\" method=\"post\" multipart=\"\" enctype=\"multipart/form-data\">";
		echo "<input type=\"hidden\" name=\"username\" value=\"$username\">";
		echo "<input type=\"file\" name=\"photos[]\" class=\"upbox\" placeholder=\"$uploadphotos\" required>";
		echo "<input type=\"hidden\" name=\"profilephoto\" value=\"submit\">";
		echo "<input type=\"submit\" name=\"create\" value=\"$button3\" class=\"createbutton\">"; 
		echo "<br><div class=\"needmta\">JPG, PNG, GIF, BMP</div>";
		echo "</form>";

	} else {

		echo "$deleteprofilephoto:<br>";
		echo "<form action=\"updatemember.php\" method=\"post\">";
		echo "<input type=\"hidden\" name=\"username\" value=\"$username\">";
		echo "<input type=\"text\" name=\"textwatermark\" class=\"textbox\" maxlength=\"30\" placeholder=\"$photoname\" readonly>";
					echo "<input name=\"delete\" type=\"submit\" value=\"$button5\" class=\"createbutton\">";
		echo "</form>";

	}


		echo "<br><br>";

		echo "<form action=\"updatemember.php\" method=\"post\">";
		echo "<div class=\"memitem2\">$changepasswd:<br>";
		echo "<input type=\"hidden\" name=\"pusername\" value=\"$username\">";
		echo "<input type=\"text\" name=\"username\" value=\"$username\" style=\"z-index: -1; position: absolute; \">";
		echo "<input type=\"password\" name=\"updatepassword\" class=\"textbox\" placeholder=\"********\" autocomplete=\"new-password\"> "; echo $again;  
		echo " <input type=\"password\" name=\"updatepassword2\" class=\"textbox\" placeholder=\"********\"></div>";
		echo "<br>";
		echo "<input type=\"submit\" name=\"create\" value=\"$button2\" class=\"createbutton\">"; 
		echo "</form>";

		echo "<br><br>";

		echo "<form action=\"updatemember.php\" method=\"post\">";
		echo "<div class=\"memitem2\">$updateeml:<br>";
		echo "<input type=\"email\" name=\"email\" class=\"textbox\" placeholder=\"$email\"></div>";
		echo "<input type=\"hidden\" name=\"username\" value=\"$username\">";
		echo "<br>";
		echo "<input type=\"submit\" name=\"create\" value=\"$button2\" class=\"createbutton\">"; 
		echo "</form>";

		echo "</div>";

echo "<br><br>";
echo "<div class=\"thephotocomments\">";
echo "<fieldset class=\"cfs\">";
echo "<legend><a id=\"comments\"></a>";
echo $comhis;
echo "</legend>";



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


	$sql6 = "SELECT * FROM comments WHERE username = '$musername' ORDER BY cid $commentorder LIMIT $newcommentpage, $commentpage";
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
		$pin = $list6['pin'];

		$convertdate = date("l F jS, Y", strtotime($commentdate));

		$sql7 = "SELECT photo,mimetype FROM members WHERE username = '$username'";
		$result7 = mysqli_query($dbconnect, $sql7);
		$row7 = mysqli_fetch_row($result7);
		$photo = base64_encode($row7[0]);
		$mimetype = $row7[1];

		$sql8 = "SELECT ain FROM photos WHERE pin='$pin'";
		$result8 = mysqli_query($dbconnect, $sql8);						
		$row8 = mysqli_fetch_row($result8);
			$ain = $row8[0];

		$sql9 = "SELECT album FROM albums WHERE ain='$ain'";
		$result9 = mysqli_query($dbconnect, $sql9);						
		$row9 = mysqli_fetch_row($result9);
			$album = $row9[0];

					echo "<div class=\"thecomment fade\"><br>";
		echo "<form onsubmit=\"return confirm('$deletecomment')\" action=\"deletecomment.php\" method=\"post\">";
		echo "<input name=\"submit\" type=\"submit\" class=\"deletelivecomment\" value=\"$delcomment\"><br>";
		echo "<input type=\"hidden\" name=\"cid\" value=\"$cid\">";
		echo "<input type=\"hidden\" name=\"selfdelete\" value=\"selfdelete\">";
		echo "<input type=\"hidden\" name=\"album\" value=\"$album\">";
		echo "<input type=\"hidden\" name=\"ain\" value=\"$ain\">";
		echo "<input type=\"hidden\" name=\"pin\" value=\"$pin\"></form>";

	if ($photo != "") {


		echo "<div class=\"profilephotocommentdiv fade\"><img src=\"data:$mimetype;charset=utf8;base64,$photo\" class=\"profilephoto\"></div>";
		} else {}
		echo "<div class=\"author fade\">$postedby $username (<a target=\"_blank\" href=\"index.php?album=$album&ain=$ain&pin=$pin\">$thisphoto</a>)<br> <div class=\"commentdate\">$convertdate </div></div>";
	

		echo "<br>$comment</div><br>";
		
		echo "<hr class=\"divider\"><br>";

}
			if ($countrows == 0) {
		echo "<span class=\"nocomments\">$commentsnone</span><br>";
	}


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

   		echo "<a href=\"index.php?menu=account#comments\"><div class=\"boxed1 fade\">$first</div></a>";
    }

		

   if ($page <= 1){ 

    	echo "<div class=\"boxed disabled fade\">$prev</div>";
    
    } else { 

    	echo "<a href=\"index.php?menu=account&page=";
    	echo $page - 1;
    	echo "#comments\"><div class=\"boxed fade\">$prev</div></a>";
    }


	$highestpagenumber = $commenttotal;


    if($page == $highestpagenumber || $highestpagenumber == 0) { 

	 	echo "<div class=\"boxed disabled fade\">$next</div>"; 

   	} else {

  		echo "<a href=\"index.php?menu=account&page=";
  		echo $page + 1;
        echo "#comments\"> <div class=\"boxed fade\">$next</div></a>";

}

   	if ($page == $highestpagenumber || $highestpagenumber == 0) { 

	    echo "<div class=\"boxed disabled fade\">$last</div>";

	} else {
 	
 		echo "<a href=\"index.php?menu=account&page=$highestpagenumber#comments\"><div class=\"boxed\">$last</div></a>";
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


echo "</fieldset></div>";
} 
}


if (($_SESSION['ausername'] != $adminusername || $_SESSION['apassword'] != $adminpassword) && (!isset($_SESSION['musername']) && !isset($_COOKIE['mcookieid'])))  {

	echo "<div class=\"memwarn\">$memberinvite</div>";

?>

<br><nr>
<hr class="divider">
<br><br>
<?php 
	$ipaddress = $_SERVER["REMOTE_ADDR"];		
	$sql1b = "SELECT COUNT(*) FROM loginattempts WHERE ipaddress = '$ipaddress' AND currenttime > (now() - interval 60 minute)";
	$result1b = mysqli_query($dbconnect, $sql1b);
	$count = mysqli_fetch_array($result1b);

	$totalattempts = $count[0];

	if($totalattempts >= 5) {
		echo "<div class=\"memberloginform fade\"><p>";
		echo $tmla;
		echo "</div>";
	} else {

	?>



		<?php 

		if ($forgot == "forgot") {

			if (!isset($email)) {
?>

	<div class="memloginform fade">
		<span class="titles"><?php echo $forgotpassword; ?></span>
		<br>
		<form acion="" method="post">
			
			<div class="memloginbox">
				<input type="email" class="username" name="email" placeholder="<?php echo $eneremail; ?>" required>
			</div>
			<div class="memlogbutdiv">
				<input type="submit" name="login" class="loginbutton" value="<?php echo $sendemail; ?>">
			</div>
		</form>
	</div>
<?php
} else {
	?> 
		<div class="memloginform fade"><p>

			<?php

			$sql6 = "SELECT username FROM members WHERE email = '$email'";
			$result6 = mysqli_query($dbconnect, $sql6);						
			$row6 = mysqli_fetch_row($result6);
			$username = $row6[0];
			
			if ($username != "") {

				
     		  
		

    			do {

						$so = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
						$randomkey = "";
						for ($i = 0; $i < 75; $i++) {
     		   			$randomkey .= $so[rand(0, 61)];
    					}


    						$sql6a = "SELECT COUNT(*) FROM forgotpassword WHERE randomkey = '$randomkey'";
							$result6a = mysqli_query($dbconnect, $sql6a);						
							$checkrk = mysqli_fetch_array($result6a);

    				} while ($checkrk[0] != "0");

						$sql7 = "INSERT INTO forgotpassword (randomkey, email, currenttime) VALUES ('$randomkey', '$email', CURRENT_TIMESTAMP)";
						$result7 = mysqli_query($dbconnect, $sql7);

						

					
					


				

				$domain = $_SERVER['SERVER_NAME'];

				if (isset($_SERVER['HTTPS'])) {
				$fullurl = dirname($_SERVER['PHP_SELF']);
				$dir = str_replace("/admin", "",$fullurl);
				$website = "https://$domain$dir";

				} else {
				$fullurl = dirname($_SERVER['PHP_SELF']);
				$dir = str_replace("/admin", "",$fullurl);
				$website = "http://$domain$dir";
				}

				$resetemail = "$resetmessage\n\n$website/index.php?menu=account&pr=$randomkey";

				$name = "$administrator";
				$emailsubject = $jpr;
				$finalmessage = "$resetemail\n\n$sentfrom $website";

				$sql8 = "SELECT email FROM members WHERE username = '$adminusername'";
				$result8 = mysqli_query($dbconnect, $sql8);						
				$row8 = mysqli_fetch_row($result8);
				$myemail = $row8[0];

				mail("$email", "$emailsubject", "$finalmessage", "From: $administrator <$myemail>");


			} else {

			}

			?>

			<?php echo $checkins; ?>
		</div>
<?php
}




		} else {


		?>






			<?php

				if ($prrk == "") {
				?>


<div class="memberloginform fade">
	<span class="titles"><?php echo $memberlogin;
		
							if (isset($login)) {
								echo "<span class=\"failedlogin\"> - $failed!</span>";
							}
						?>	
	</span>
	<br>
	<form acion="index.php?menu=account" method="post" autocomplete="on">
		
		<div class="memloginbox">
			<input type="text" class="usernamelogin" name="username" id="username" placeholder="<?php echo $usernamelogin; ?>" autocomplete="username">
		</div>
		<div class="memloginbox">
			<input type="password" class="passwordlogin" name="password" id="password" placeholder="<?php echo $passwordlogin; ?>" autocomplete="current-password">
		</div>
		<div class="memloginbox"><?php echo $rememberme; ?> <input type="checkbox" name="remember" value="yes"></div>
		<div class="memlogbutdiv">
			<input type="submit" name="login" class="loginbutton" value="<?php echo $loginbutton; ?>">
		</div>
		<?php
		if (isset($login)) {
			
			echo "<br><div class=\"forgot\">$forgotpassword <a href=\"index.php?menu=account&password=forgot\">$clickhere</a></div>";
		
			$triedusername = $_POST['username'];


		$sqlc = "SELECT COUNT(*) FROM members WHERE username = '$triedusername'";
		$resultc = mysqli_query($dbconnect, $sqlc);
		$ismember = mysqli_fetch_array($resultc);

			if ($ismember[0] == 0) {

				$triedusername = "$triedusername (Member Does Not Exist)";
			}


	$ipaddress = $_SERVER["REMOTE_ADDR"];	
	$sql1a = "INSERT INTO loginattempts (user, ipaddress, currenttime) VALUES ('$triedusername', '$ipaddress', CURRENT_TIMESTAMP)";
	$result1a = mysqli_query($dbconnect, $sql1a);
			}
		?>
	

	</form>
</div>

<?php
	} else {






				$sql13 = "SELECT COUNT(*) FROM forgotpassword WHERE randomkey = '$prrk' AND currenttime < (now() - interval 10 minute)";
				$result13 = mysqli_query($dbconnect, $sql13);
				$timepass = mysqli_fetch_array($result13);

				
			

				if ($timepass[0] == 1) { 

					echo "<div class=\"toggle\"><p><img class=\"double2\" src=\"images/system/warning.png\"> $timesup</p></div>";

					$sql14 = " DELETE FROM forgotpassword WHERE randomkey = '$prrk'";
					$result14 = mysqli_query($dbconnect, $sql14);	

				} else {



				$sql9 = "SELECT email FROM forgotpassword WHERE randomkey = '$prrk'";
				$result9 = mysqli_query($dbconnect, $sql9);						
				$row9 = mysqli_fetch_row($result9);
				$memberemail = $row9[0];

		if ($memberemail == "") {

		} else {

			

			if ($newpassword == "" || $newpassword2 == "" ) {

			?>

				<div class="memberloginform fade">
		
		<form action="" method="post">
		<span class="titles"><?php echo $entnewpass; ?></span>
		<br>

				<input type="text" name="username" value="<?php echo $adminusername; ?>" style="z-index: -1; display: none;">
		<div class="memloginbox">
				<input type="password" class="password" name="newpassword" placeholder="<?php echo $passwordlogin; ?>">
			</div>
			
			<div class="memloginbox">
				<input type="password" class="password" name="newpassword2" placeholder="<?php echo $passwordlogin; ?>" >
			</div>
			<div class="memlogbutdiv">
				<input type="submit" name="login" class="loginbutton" value="<?php echo $button4; ?>">
			</div>
<br><br>
</form>

	</div>

			<?php		

	} elseif ($newpassword === $newpassword2) {

		$hash3 = password_hash($newpassword, PASSWORD_DEFAULT);


			$stmt3 = $dbconnect->prepare("UPDATE members SET password = '$hash3' WHERE username = ?");
			$stmt3->bind_param("ss", $$hash3);
			$stmt3->execute();
		
			echo "<div class=\"memberloginform\"><p>$passhasreset</p></div>";

			$sql10 = " DELETE FROM forgotpassword WHERE randomkey = '$prrk'";
				$result10 = mysqli_query($dbconnect, $sql10);						

	} else {

		?>

			
				<div class="memberloginform fade">
		
		<form action="" method="post">
		<span class="titles"><img class="double2" src="images/system/warning.png"> <?php echo $adminmismatch; ?></span>
		<br>

				<input type="text" name="username" value="<?php echo $adminusername; ?>" style="z-index: -1; display: none;">
		<div class="memloginbox">
				<input type="password" class="password" name="newpassword" placeholder="<?php echo $passwordlogin; ?>">
			</div>
			
			<div class="memloginbox">
				<input type="password" class="password" name="newpassword2" placeholder="<?php echo $passwordlogin; ?>" >
			</div>
			<div class="memlogbutdiv">
				<input type="submit" name="login" class="loginbutton" value="<?php echo $button4; ?>">
			</div>
<br><br>
</form>

	</div>

		<?php

	}

}

?>

<?php
}
}
}
}
}
if (!isset($menu)) {
	header('Location: index.php');
}
?>
<br><br>
