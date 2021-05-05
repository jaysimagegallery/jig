<?php

//Set variables and strip away tags
$name = htmlspecialchars(strip_tags($_POST['name']));
$useremail = htmlspecialchars(strip_tags($_POST['useremail']));
$subject = htmlspecialchars(strip_tags($_POST['subject']));
$finalsubject = "JIG - $subject";
$message = htmlspecialchars(strip_tags(nl2br($_POST['message'])));

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


$finalmessage = "$message\n\n$name\n\n$contactformmessage $website";
$submitemail = $_POST['submit'];


if ($name != "") {
$_SESSION['name'] = $name;
$_SESSION['email'] = $useremail;
$_SESSION['subject'] = $subject;
$_SESSION['message'] = $message;
}

$sql1 = "SELECT email FROM members WHERE username = 'Administrator'";
$result1 = mysqli_query($dbconnect, $sql1);
			$row1 = mysqli_fetch_row($result1);
			$emailaddress = $row1[0];


$sql2 = "SELECT sitekey,secretkey,contactform,recaptcha FROM general";
$result2 = mysqli_query($dbconnect, $sql2);						
$row2 = mysqli_fetch_row($result2);
			$sitekey = $row2[0];
			$secretkey = $row2[1];
			$contactform = $row2[2];
      $recaptcha = $row2[3];

if ($recaptcha == "no") {
         
         $response = "success";

         } else {

          if ($secretkey  == "") {

            //Below is a warning about missing secretkey

          } else {

// grab recaptcha library
require_once "recaptchalib.php";

// empty response
$response = null;
 
// check secret key
$reCaptcha = new ReCaptcha($secretkey);

// if submitted check response
if ($_POST["g-recaptcha-response"]) {
    $response = $reCaptcha->verifyResponse(
        $_SERVER["REMOTE_ADDR"],
        $_POST["g-recaptcha-response"],
		$hidden = success
    );
} 
}
}
if ($contactform == "yes") {

?>

<div class="pri">
<div class="ipri">
<?php
if (isset($submitemail) && $recaptcha == "no" && (!$useremail == "" && (!strstr($useremail,"@") || !strstr($useremail,".")))) {
  echo "<div class=\"emailresults\"><div class=\"smalign\">$invalidemail</div></div>";
} elseif (isset($submitemail) && ($recaptcha == "no")) {
     //Mail the form
  mail("$emailaddress", "$finalsubject", "$finalmessage", "From: $name<$useremail>");
  
  echo "<div class=\"emailresults\"><div class=\"smalign\">$emailsent</div></div>";

  unset($_SESSION['name']);
  unset($_SESSION['email']);
  unset($_SESSION['subject']);
  unset($_SESSION['message']);

} elseif (!$useremail == "" && (!strstr($useremail,"@") || !strstr($useremail,"."))) {
	
	echo "<div class=\"emailresults\"><div class=\"smalign\">$invalidemail</div></div>";

	} elseif ($response == null && isset($submitemail)) {
	echo "<div class=\"emailresults\"><div class=\"smalign\">$forgotcaptcha</div></div>";

 
 } elseif ($response != null && $response->success) {
   //Mail the form
	mail("$emailaddress", "$finalsubject", "$finalmessage", "From: $name<$useremail>");
	
	echo "<div class=\"emailresults\"><div class=\"smalign\">$emailsent</div></div>";

  unset($_SESSION['name']);
  unset($_SESSION['email']);
  unset($_SESSION['subject']);
  unset($_SESSION['message']);
 }
   else {
		 ?>
      <div class="contactemail fade">
        <form action="index.php?menu=contact" method="post">
          <input class="tbox" name="name" value="<?php echo $_SESSION['name']; ?>" type="text" placeholder=" <?php echo $yourname; ?>*" required>
          <br />
          <input class="tbox" name="useremail" value="<?php echo $_SESSION['email']; ?>" type="text" placeholder=" <?php echo $youremail; ?>*" required>
          <br />
          <input class="tbox"  name="subject" value="<?php echo $_SESSION['subject']; ?>" type="text" placeholder=" <?php echo $emailsubject; ?>*" required>
          <br />
          <textarea class="mbox"  name="message" cols="50" rows="5" placeholder=" <?php echo $yourmessage; ?>*" required><?php echo $_SESSION['message']; ?></textarea>
          <br />
          <?php
          	if ($recaptcha == "no") {
          ?>		
 			<div class="subcapcontact2">
           <input class="submitcontactbig" type="submit" name="submit" value="<?php echo $sendemail; ?>" />
          </div>
          <?php
          	} else {
          
if ($sitekey == ""){
?>
    <div class="subcap">
      <div class="missing"><?php echo $missingsk; ?></div>
  </div>
<?php
  } elseif ($secretkey == "") {
  ?>
  <div class="subcap">
      <div class="missing"><?php echo $missingsek; ?></div>
  </div>
<?php
} else {
?>

          <div class="subcapcontact">
            <div class="g-recaptcha" data-sitekey="<?php echo $sitekey; ?>"></div>
          </div>
<?php
  }
?>

          <div class="subcapcontact2">
             <input class="submitcontact" type="submit" name="submit" value="<?php echo $sendemail; ?>" />
          </div>

          <?php
          	}
          ?>

        </form>
      </div>
      <?php
    }
  ?>
    </div>
</div>
<?php
} else {
	echo $permdenied;
	echo "<br>";
}

?>

<br>


