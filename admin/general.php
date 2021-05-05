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

?>

<div class="options">

		<?php 

		$update = $_GET["update"];
		if ($update == "successfully") {
			echo "<div class=\"success\"><img class=\"checkmark\" src=\"../images/system/checkmark.png\"> $notice1</div><br />";
		}

		$update = $_GET["update"];
		if ($update == "uft") {
			echo "<div class=\"success\"><img class=\"checkmark\" src=\"../images/system/checkmark.png\"> $notice20</div><br />";
		}

		?>			

	<div class="aswrapper fade">
		<div class="iaswrapper">
				<div class="addstuff">
					<form action="upge.php" method="post">
						<span class="boxhead"><?php echo $gtitle; ?></span><br />
						<?php

						$sql = "SELECT title FROM general";
						$result = mysqli_query($dbconnect, $sql);						
						$row = mysqli_fetch_row($result);
						$title = $row[0];
						 
						if ($title == "") {
						echo "<input type=\"text\" name=\"title\" class=\"textbox\" placeholder=\"\">";
						echo "<input name=\"submit\" type=\"submit\" value=\"$button2\" class=\"updatebutton2\">";
						echo "<input name=\"tiupdate\" type=\"hidden\" value=\"add\" class=\"gupdatebutton\">";
							} else {
						echo "<input type=\"text\" name=\"title\" class=\"textbox\" placeholder=\"$title\" readonly>";
						echo "<input name=\"submit\" type=\"submit\" value=\"$button5\" class=\"updatebutton2\">";
						echo "<input name=\"tiupdate\" type=\"hidden\" value=\"clear\" class=\"gupdatebutton\">";
						}
						?>
					</form>
				</div>
				<div class="emptyspace">&nbsp;</div>
				<div class="addstuff">
					<form action="upge.php" method="post">
						<span class="boxhead"><?php echo $numpage; ?></span><br>
						<input type="text" name="numpage" class="textbox" placeholder="<?php 
						$sql1 = "SELECT numpage FROM general";
						$result1 = mysqli_query($dbconnect, $sql1);						
						$row1 = mysqli_fetch_row($result1);
						echo $row1[0];
						?>"><input type="submit" value="<?php echo $button2; ?>" class="updatebutton"> 
					</form>
				</div>
				<br><br><br><br><br>
				<div class="addstuff">
					<form action="upge.php" method="post">
						<span class="boxhead"><?php echo $gsubtitle; ?></span><br>
						<?php
						
						$sql2 = "SELECT subtitle FROM general";
						$result2 = mysqli_query($dbconnect, $sql2);						
						$row2 = mysqli_fetch_row($result2);
						$subtitle = $row2[0];
												
						if ($subtitle == "") {
						echo "<input type=\"text\" name=\"subtitle\" class=\"textbox\" placeholder=\"\">";
						echo "<input name=\"submit\" type=\"submit\" value=\"$button2\" class=\"updatebutton2\">";
						echo "<input name=\"subupdate\" type=\"hidden\" value=\"add\" class=\"gupdatebutton\">";
							} else {
						echo "<input type=\"text\" name=\"subtitle\" class=\"textbox\" placeholder=\"$subtitle\" readonly>";
						echo "<input name=\"submit\" type=\"submit\" value=\"$button5\" class=\"updatebutton2\">";
						echo "<input name=\"subupdate\" type=\"hidden\" value=\"clear\" class=\"gupdatebutton\">";
						}
						?>
					</form>
				</div>
				<div class="emptyspace">&nbsp;</div>
				<div class="addstuff">
					<form action="upge.php" method="post">
						<span class="boxhead"><?php echo $picpage; ?></span><br>
						<input type="text" name="picpage" class="textbox" placeholder="<?php 
						$sql3 = "SELECT picpage FROM general";
						$result3 = mysqli_query($dbconnect, $sql3);						
						$row3 = mysqli_fetch_row($result3);
						echo $row3[0];				 
						?>"><input type="submit" value="<?php echo $button2; ?>" class="updatebutton"> 
					</form>
				</div>
				<br><br><br><br><br>
				<div class="addstuff">
					<form action="upge.php" method="post">
						<span class="boxhead"><?php echo $language; ?></span><br>
						<?php 
					
						$sql4 = "SELECT language FROM general";
						$result4 = mysqli_query($dbconnect, $sql4);
						$row4 = mysqli_fetch_row($result4);
							$currentlanguage = $row4[0];
						?>
						<select name="language" class="language">
						<option value="<?php echo $currentlanguage; ?>"><?php echo $currentlanguage; ?></option>
							<?php
							$lower = strtolower($currentlanguage);
							$nowlang = "$lower.php";
							//Scan directory for language files
							if ($handle = opendir('../languages')) {

								while (false !== ($entry = readdir($handle))) {

									if ($entry != "." && $entry != ".." && $entry != "$nowlang" && $entry != "index.html") {

										$upper = substr(ucfirst($entry), 0, -4);

										echo "<option value=\"$upper\">$upper</option>";
									}
								}

								closedir($handle);
							}

							?>
						</select><input type="submit" value="<?php echo $button2; ?>" class="updatebutton">
					</form>
				</div><div class="emptyspace">&nbsp;</div>
				<div class="addstuff">
					<?php
						
						$sql4a = "SELECT apdorder FROM general";
						$result4a = mysqli_query($dbconnect, $sql4a);
						$row4a = mysqli_fetch_array($result4a);
							$apdorder = $row4a[0];
					?>
				<form action="upge.php" method="post">
					<span class="boxhead"><?php echo $aporder; ?></span><br />
					<select name="apdorder" class="display">
					<option value="<?php echo $apdorder; ?>"><?php if ($apdorder == "photos") { echo $pfirst; } else { echo $afirst; } ?></option>
					<?php

						if ($apdorder == "photos") {

							echo "<option value=\"albums\">$afirst</option>";

						} else {

							echo "<option value=\"photos\">$pfirst</option>";

						}
					?>
					</option>
					</select><input type="submit" value="<?php echo $button2; ?>" class="updatebutton"> 
					</form>
				</div>
<br><br><br><br><br>
				<div class="addstuff">
						<?php
			
						$sql5 = "SELECT hideinfo FROM general";
						$result5 = mysqli_query($dbconnect, $sql5);
						$row5 = mysqli_fetch_array($result5);
							$hideinfo = $row5[0];
						?>
				<form action="upge.php" method="post">
					<span class="boxhead"><?php echo $hiinfo; ?></span><br />
					<select name="hideinfo" class="comments">
						<?php
							if ($hideinfo == "no") {

								echo "<option value=\"no\">$no</option>";
								echo "<option value=\"yes\">$yes</option>";
										
							} elseif ($hideinfo == "yes") {

								echo "<option value=\"yes\">$yes</option>";
								echo "<option value=\"no\">$no</option>";						
							}
						?>
						</select><input type="submit" value="<?php echo $button2; ?>" class="updatebutton"> 
					</form>
				</div><div class="emptyspace">&nbsp;</div>

				<div class="addstuff">
					<form action="upge.php" method="post">
						<span class="boxhead"><?php echo $brandremove; ?></span><br>
						<select id="branding" name="branding" class="comments">
						<?php
			
						$sql5a = "SELECT branding FROM general";
						$result5a = mysqli_query($dbconnect, $sql5a);
						$row5a = mysqli_fetch_array($result5a);
							$branding = $row5a[0];
						
							if ($branding == "on") {

								echo "<option value=\"on\">$on</option>";
								echo "<option value=\"off\">$off</option>";
										
							} elseif ($branding == "off") {

								echo "<option value=\"off\">$off</option>";
								echo "<option value=\"on\">$on</option>";						
							}
						?>
						</select><input type="submit" value="<?php echo $button2; ?>" class="updatebutton"> 
					</form><div class="needmta"><?php echo $brinfo; ?></div>
				</div>
						<?php
			
						$sql16 = "SELECT contactform FROM general";
						$result16 = mysqli_query($dbconnect, $sql16);
						$row16 = mysqli_fetch_array($result16);
							$contactform = $row16[0];
						?>

				<br><br><br><br><br>
				<div class="addstuff">
					<form action="upge.php" method="post">
						<span class="boxhead"><?php echo $enablecf; ?></span><br>
					<select name="contactform" class="comments">
						<?php
							if ($contactform == "no") {

								echo "<option value=\"no\">$no</option>";
								echo "<option value=\"yes\">$yes</option>";
										
							} elseif ($contactform == "yes") {

								echo "<option value=\"yes\">$yes</option>";
								echo "<option value=\"no\">$no</option>";						
							}
						?>
						</select><input type="submit" name="create" value="<?php echo $button2; ?>" class="updatebutton"> 
					</form><div class="needmta"><?php echo $cfwarn; ?></div>

				</div>
			<div class="emptyspace">&nbsp;</div>
				<div class="addstuff">

					<?php
					$sql15 = "SELECT notifyanon FROM general";
						$result15 = mysqli_query($dbconnect, $sql15);
						$row15 = mysqli_fetch_array($result15);
							$notifyanon = $row15[0];
						?>
				<form action="upge.php" method="post">
					<span class="boxhead"><?php echo $notanon; ?></span><br>
					<select name="notifyanon" class="comments">
						<?php
							if ($notifyanon == "no") {

								echo "<option value=\"no\">$no</option>";
								echo "<option value=\"yes\">$yes</option>";
										
							} elseif ($notifyanon == "yes") {

								echo "<option value=\"yes\">$yes</option>";
								echo "<option value=\"no\">$no</option>";						
							}
						?>
						</select><input type="submit" name="create" value="<?php echo $button2; ?>" class="updatebutton"> 
					</form><div class="needmta"><?php echo $cfwarn; ?></div>
					</div>

				<br><br><br><br><br>
				<div class="addstuff">
						<?php
													
						$sql6 = "SELECT comments FROM general";
						$result6 = mysqli_query($dbconnect, $sql6);
						$row6 = mysqli_fetch_row($result6);
							$comments = $row6[0];
						?>
				<form action="upge.php" method="post">
					<span class="boxhead"><?php echo $enablecomments; ?></span><br />
					<select name="comments" class="comments">
						<?php
							if ($comments == "no") {
	
								echo "<option value=\"no\">$no</option>";
								echo "<option value=\"yesmembers\">$yesm</option>";
								echo "<option value=\"yesanyone\">$yesa</option>";
										
							} elseif ($comments == "yesmembers") {

								echo "<option value=\"yesmembers\">$yesm</option>";
								echo "<option value=\"yesanyone\">$yesa</option>";
								echo "<option value=\"no\">$no</option>";						

							} elseif ($comments == "yesanyone") {

								echo "<option value=\"yesanyone\">$yesa</option>";
								echo "<option value=\"yesmembers\">$yesm</option>";
								echo "<option value=\"no\">$no</option>";
							}
						?>
					</select><input type="submit" value="<?php echo $button2; ?>" class="updatebutton"> 
					</form>
				</div><div class="emptyspace">&nbsp;</div>
				<div class="addstuff">
						<?php
						
						$sql7 = "SELECT watermark FROM general";
						$result7 = mysqli_query($dbconnect, $sql7);
						$row7 = mysqli_fetch_array($result7);
							$watermark = $row7[0];

						?>
				<form action="upge.php" method="post">
					<span class="boxhead"><?php echo $watermarktitle; ?></span><br />
					<select name="watermark" class="comments">
						<?php

							if ($watermark == "no") {

								echo "<option value=\"no\">$no</option>";
								echo "<option value=\"yestext\">$yest</option>";
								echo "<option value=\"yesimage\">$yesi</option>";
										
							} elseif ($watermark == "yestext") {

								echo "<option value=\"yestext\">$yest</option>";
								echo "<option value=\"yesimage\">$yesi</option>";
								echo "<option value=\"no\">$no</option>";						
	
							} elseif ($watermark == "yesimage") {

								echo "<option value=\"yesimage\">$yesi</option>";
								echo "<option value=\"yestext\">$yest</option>";
								echo "<option value=\"no\">$no</option>";
							}
						?>
						</select><input type="submit" value="<?php echo $button2; ?>" class="updatebutton"> 
					</form>
				</div>
				
				<br><br><br><br><br>
				<div class="addstuff">
					<?php
						
						$sql8 = "SELECT commentorder FROM general";
						$result8 = mysqli_query($dbconnect, $sql8);
						$row8 = mysqli_fetch_array($result8);
							$order = $row8[0];
					?>
				<form action="upge.php" method="post">
					<span class="boxhead"><?php echo $display; ?></span><br />
					<select name="order" class="display">
					<option value="<?php echo $order; ?>"><?php if ($order == "DESC") { echo $newest; } else { echo $oldest; } ?></option>
					<?php

						if ($order == "DESC") {

							echo "<option value=\"ASC\">$oldest</option>";

						} else {

							echo "<option value=\"DESC\">$newest</option>";

						}
					?>
					</option>
					</select><input type="submit" value="<?php echo $button2; ?>" class="updatebutton"> 
					</form>
				</div><div class="emptyspace">&nbsp;</div>
				<div class="addstuff">
						<?php
						
						$sql9 = "SELECT wmposition FROM general";
						$result9 = mysqli_query($dbconnect, $sql9);
						$row9 = mysqli_fetch_array($result9);
							$wmposition = $row9[0];
						?>

				<form action="upge.php" method="post">
					<span class="boxhead"><?php echo $watpos; ?></span><br />
					<select name="wmposition" class="comments">
						<?php
					
							if ($wmposition == "middle") {
						
								echo "<option value=\"middle\">$mid</option>";
								echo "<option value=\"topright\">$tr</option>";
								echo "<option value=\"topleft\">$tl</option>";
								echo "<option value=\"bottomleft\">$bl</option>";
								echo "<option value=\"bottomright\">$br</option>";
										
							} elseif ($wmposition == "topleft") {

								echo "<option value=\"topleft\">$tl</option>";
								echo "<option value=\"topright\">$tr</option>";
								echo "<option value=\"bottomleft\">$bl</option>";
								echo "<option value=\"bottomright\">$br</option>";
								echo "<option value=\"middle\">$mid</option>";
											
							} elseif ($wmposition == "bottomleft") {

								echo "<option value=\"bottomleft\">$bl</option>";
								echo "<option value=\"bottomright\">$br</option>";
								echo "<option value=\"topleft\">$tl</option>";
								echo "<option value=\"topright\">$tr</option>";
								echo "<option value=\"middle\">$mid</option>";

							} elseif ($wmposition == "topright") {
											
								echo "<option value=\"topright\">$tr</option>";
								echo "<option value=\"topleft\">$tl</option>";
								echo "<option value=\"bottomleft\">$bl</option>";
								echo "<option value=\"bottomright\">$br</option>";
								echo "<option value=\"middle\">$mid</option>";
							
							} elseif ($wmposition == "bottomright") {
											
								echo "<option value=\"bottomright\">$br</option>";
								echo "<option value=\"bottomleft\">$bl</option>";
								echo "<option value=\"topright\">$tr</option>";
								echo "<option value=\"topleft\">$tl</option>";
								echo "<option value=\"middle\">$mid</option>";
							}
						?>																	
					</select><input type="submit" value="<?php echo $button2; ?>" class="updatebutton"> 
					</form>
				</div><br><br><br><br><br>
				<div class="addstuff">
					<?php
					
					$sql10 = "SELECT recaptcha FROM general";
					$result10 = mysqli_query($dbconnect, $sql10);
						$row10 = mysqli_fetch_array($result10);
							$recaptcha = $row10[0];
					?>
				<form action="upge.php" method="post">
					<span class="boxhead"><?php echo $egr; ?></span><br />
					<select name="recaptcha" class="comments">
					<option value="<?php echo $recaptcha; ?>"><?php if ($recaptcha == "no") { echo "No"; } else { echo "Yes"; } ?></option>
					<?php
						if ($recaptcha == "no") {

							echo "<option value=\"yes\">$yes</option>";

						} else {
	
							echo "<option value=\"no\">$no</option>";
			
						}
						
					?>
					</option>
					</select><input type="submit" value="<?php echo $button2; ?>" class="updatebutton"> 
				</form>
				<span class="recommend"><?php echo $recom; ?></span>
				</div>
					<div class="emptyspace">&nbsp;</div>
				<div class="addstuff">
				<form action="upge.php" method="post">
					<span class="boxhead"><?php echo $watertext; ?></span><br />
					<?php
					
						$sql11 = "SELECT textwatermark FROM general";
						$result11 = mysqli_query($dbconnect, $sql11);						
						$row11 = mysqli_fetch_row($result11);
						$textwatermark = $row11[0];
										
						if ($textwatermark == "") {
						
							echo "<input type=\"text\" name=\"textwatermark\" class=\"textbox\" maxlength=\"30\">";
							echo "<input name=\"submit\" type=\"submit\" value=\"$button2\" class=\"updatebutton2\">";
							echo "<input name=\"wmupdate\" type=\"hidden\" value=\"add\" class=\"gupdatebutton\">";
							
						} else {
						
							echo "<input type=\"text\" name=\"textwatermark\" class=\"textbox\" maxlength=\"30\" placeholder=\"$textwatermark\" readonly>";
							echo "<input name=\"submit\" type=\"submit\" value=\"$button5\" class=\"updatebutton2\">";
							echo "<input name=\"wmupdate\" type=\"hidden\" value=\"clear\" class=\"gupdatebutton\">";
						}
						?>
					</form><div class="supportedtypes"><?php echo $charlimit; ?></div>
				</div>
				<br><br><br><br><br>
				
				
				
			
				<form action="upge.php" method="post">
				<div class="gaddstuff">
					<span class="boxhead"><?php echo $grk; ?></span>
					<br>
				<div class="getkeys"><?php echo $keyex; ?></div>
				<div class="gkeys">
					<span class="boxhead"><?php echo $sikey; ?></span></div>
					<?php
						$sql12 = "SELECT sitekey FROM general";
						$result12 = mysqli_query($dbconnect, $sql12);						
						$row12 = mysqli_fetch_row($result12);
					
						$sitekey = $row12[0];
											
						if ($sitekey == "") {
						
							echo "<div class=\"gkeys2\"><input type=\"text\" name=\"sitekey\" class=\"googlebox\" placeholder=\"\"></div>";
							echo "<input name=\"submit\" type=\"submit\" value=\"$button2\" class=\"gupdatebutton\">";
							echo "<input name=\"siupdate\" type=\"hidden\" value=\"add\" class=\"gupdatebutton\">";
							
						} else {
						
							echo "<div class=\"gkeys2\"><input type=\"text\" name=\"sitekey\" class=\"googlebox\" placeholder=\"$sitekey\" readonly></div>";
							echo "<input name=\"submit\" type=\"submit\" value=\"$button5\" class=\"gupdatebutton\">";
							echo "<input name=\"siupdate\" type=\"hidden\" value=\"clear\" class=\"gupdatebutton\">";
						}
					?>
				</form><br><br><br>
				<form action="upge.php" method="post">
				<div class="gkeys">
					<span class="boxhead"><?php echo $sekey; ?></span>
				</div>
					<?php 
						
						$sql13 = "SELECT secretkey FROM general";
						$result13 = mysqli_query($dbconnect, $sql13);						
						$row13 = mysqli_fetch_row($result13);
			
						$secretkey = $row13[0];
					
						if ($secretkey == "") {
					
							echo "<div class=\"gkeys2\"><input type=\"text\" name=\"secretkey\" class=\"googlebox\" placeholder=\"\"></div>";
							echo "<input name=\"submit\" type=\"submit\" value=\"$button2\" class=\"gupdatebutton\">";
							echo "<input name=\"secupdate\" type=\"hidden\" value=\"add\" class=\"gupdatebutton\">";
							
						} else {
						
							echo "<div class=\"gkeys2\"><input type=\"text\" name=\"secretkey\" class=\"googlebox\" placeholder=\"$secretkey\" readonly></div>";
							echo "<input name=\"submit\" type=\"submit\" value=\"$button5\" class=\"gupdatebutton\">";
							echo "<input name=\"secupdate\" type=\"hidden\" value=\"clear\" class=\"gupdatebutton\">";
						}
					?>
				</form>
				</div>
				
				<div class="waddstuff">
					<?php
						
						$sql14 = "SELECT wmtextcolor FROM general";
						$result14 = mysqli_query($dbconnect, $sql14);
						$row14 = mysqli_fetch_row($result14);
							$wmtextcolor = $row14[0];
						
					?>
				<form action="upge.php" method="post">
					<span class="boxhead"><?php echo $wtc; ?></span><br />
					<select name="wmtextcolor" class="comments">
							
					<?php
						if ($wmtextcolor == "grey") {

							echo "<option value=\"grey\">$grey</option>";
							echo "<option value=\"white\">$white</option>";
							echo "<option value=\"black\">$black</option>";
							echo "<option value=\"blue\">$blue</option>";
							echo "<option value=\"red\">$red</option>";
							echo "<option value=\"green\">$green</option>";
							echo "<option value=\"yellow\">$yellow</option>";
							echo "<option value=\"purple\">$purple</option>";
							echo "<option value=\"orange\">$orange</option>";
										
						} elseif ($wmtextcolor == "white") {

							echo "<option value=\"white\">$white</option>";
							echo "<option value=\"black\">$black</option>";
							echo "<option value=\"grey\">$grey</option>";
							echo "<option value=\"blue\">$blue</option>";
							echo "<option value=\"red\">$red</option>";		
							echo "<option value=\"green\">$green</option>";	
							echo "<option value=\"yellow\">$yellow</option>";
							echo "<option value=\"purple\">$purple</option>";
							echo "<option value=\"orange\">$orange</option>";			
								
						} elseif ($wmtextcolor == "black") {

							echo "<option value=\"black\">$black</option>";
							echo "<option value=\"white\">$white</option>";
							echo "<option value=\"grey\">$grey</option>";
							echo "<option value=\"blue\">$blue</option>";
							echo "<option value=\"red\">$red</option>";
							echo "<option value=\"green\">$green</option>";
							echo "<option value=\"yellow\">$yellow</option>";
							echo "<option value=\"purple\">$purple</option>";
							echo "<option value=\"orange\">$orange</option>";

						} elseif ($wmtextcolor == "blue") {

							echo "<option value=\"blue\">$blue</option>";
							echo "<option value=\"black\">$black</option>";
							echo "<option value=\"white\">$white</option>";
							echo "<option value=\"grey\">$grey</option>";
							echo "<option value=\"red\">$red</option>";
							echo "<option value=\"green\">$green</option>";
							echo "<option value=\"yellow\">$yellow</option>";
							echo "<option value=\"purple\">$purple</option>";
							echo "<option value=\"orange\">$orange</option>";
						
						} elseif ($wmtextcolor == "red") {

							echo "<option value=\"red\">$red</option>";
							echo "<option value=\"black\">$black</option>";
							echo "<option value=\"white\">$white</option>";
							echo "<option value=\"grey\">$grey</option>";
							echo "<option value=\"blue\">$blue</option>";
							echo "<option value=\"green\">$green</option>";
							echo "<option value=\"yellow\">$yellow</option>";
							echo "<option value=\"purple\">$purple</option>";
							echo "<option value=\"orange\">$orange</option>";
						
						} elseif ($wmtextcolor == "green") {

							echo "<option value=\"green\">$green</option>";
							echo "<option value=\"black\">$black</option>";
							echo "<option value=\"white\">$white</option>";
							echo "<option value=\"grey\">$grey</option>";
							echo "<option value=\"blue\">$blue</option>";
							echo "<option value=\"red\">$red</option>";
							echo "<option value=\"yellow\">$yellow</option>";
							echo "<option value=\"purple\">$purple</option>";
							echo "<option value=\"orange\">$orange</option>";
						
						} elseif ($wmtextcolor == "yellow") {

							echo "<option value=\"yellow\">$yellow</option>";
							echo "<option value=\"black\">$black</option>";
							echo "<option value=\"white\">$white</option>";
							echo "<option value=\"grey\">$grey</option>";
							echo "<option value=\"blue\">$blue</option>";
							echo "<option value=\"red\">$red</option>";
							echo "<option value=\"green\">$green</option>";
							echo "<option value=\"purple\">$purple</option>";
							echo "<option value=\"orange\">$orange</option>";
						
						} elseif ($wmtextcolor == "purple") {

							echo "<option value=\"purple\">$purple</option>";
							echo "<option value=\"black\">$black</option>";
							echo "<option value=\"white\">$white</option>";
							echo "<option value=\"grey\">$grey</option>";
							echo "<option value=\"blue\">$blue</option>";
							echo "<option value=\"red\">$red</option>";
							echo "<option value=\"green\">$green</option>";
							echo "<option value=\"yellow\">$yellow</option>";
							echo "<option value=\"orange\">$orange</option>";

						
						} elseif ($wmtextcolor == "orange") {

							echo "<option value=\"orange\">$orange</option>";
							echo "<option value=\"black\">$black</option>";
							echo "<option value=\"white\">$white</option>";
							echo "<option value=\"grey\">$grey</option>";
							echo "<option value=\"blue\">$blue</option>";
							echo "<option value=\"red\">$red</option>";
							echo "<option value=\"green\">$green</option>";
							echo "<option value=\"yellow\">$yellow</option>";
							echo "<option value=\"purple\">$purple</option>";
						
						} 

					?>	
					</select><input type="submit" value="<?php echo $button2; ?>" class="updatebutton"> 
				</form>
				</div>
			<br><br><br><br><br>
				<?php

					$sql14 = "SELECT imagewatermark FROM general";  
					$result14 = mysqli_query($dbconnect, $sql14);						
					$row14 = mysqli_fetch_row($result14);
					$waterimage = $row14[0];
				?>


				<div class="waddstuff">
								
					<?php if ($waterimage == "") { ?>
				
				<form action="upge.php" method="post" multipart="" enctype="multipart/form-data">
  					<span class="boxhead"><?php echo $waterimagetext; ?></span><br>
	  				<input type="file" name="imagewatermark[]" class="wupbox" required>   				
					<input type="submit" value="<?php echo $button3; ?>" class="uploadbutton2" name="upload"> 
				</form> 

					<?php } else { 

					echo "<form action=\"upge.php\" method=\"post\">";
					echo "<span class=\"boxhead\">$waterimagetext</span><br>";
					echo "<input type=\"text\" name=\"textwatermark\" class=\"textbox\" maxlength=\"30\" placeholder=\"$waterimage\" readonly>";
					echo "<input name=\"submit\" type=\"submit\" value=\"$button5\" class=\"updatebutton2\">";
					echo "<input name=\"wmclear\" type=\"hidden\" value=\"$waterimage\" class=\"gupdatebutton\">";
					echo "</form>";

				 } ?>
					<div class="supportedtypes">JPG, PNG, GIF, BMP</div>
				</div>
				<br><br><br><br><br><br>
				<div class="watermarknotes">
					<span class="boxhead"><?php echo $watermarknotes; ?></span>
					<br><br>
					<?php echo $watermarknotes1; ?>
					<br><br>
					<?php echo $watermarknotes2; ?>
					<br><br>
					<?php echo $watermarknotes3; ?>
					<br><br>
					<?php echo $watermarknotes4; ?>
				</div>

	<?php 
	list($width, $height) = getimagesize("../images/watermark/$waterimage"); 
	?>

	<div class="cwi"><?php if ($waterimage == "") {  } else { echo $waterimage; echo " ($width x $height pixels)"; } ?></div>
	<div class="wiaddstuff">
		<div class="holdwatermark">
			<?php

				if ($waterimage == "") { echo $noimage; } else {
			echo "<img class=\"watermarkimage\" src=\"../images/watermark/$waterimage\">";
				}

			?>

		</div>
	</div>


			
		</div>
	</div>
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