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
		$created = $_GET["created"];
		if ($created == "success") {
			echo "<div class=\"success\"><img class=\"checkmark\" src=\"../images/system/checkmark.png\"> $notice8</div><br />";
		}

		$created = $_GET["created"];
		if ($created == "mismatch") {
			echo "<div class=\"failure\"><img class=\"failureimg\" src=\"../images/system/failure.png\"> $notice9</div><br />";
		}

		$deleted = $_GET["deleted"];
		if ($deleted == "success") {
			echo "<div class=\"success\"><img class=\"checkmark\" src=\"../images/system/checkmark.png\"> $notice10</div><br />";
		}

		$taken = $_GET["update"];
		if ($taken == "usernametaken") {
			echo "<div class=\"failure\"><img class=\"failureimg\" src=\"../images/system/failure.png\"> $notice13</div><br />";
		}

		$taken = $_GET["update"];
		if ($taken == "emailtaken") {
			echo "<div class=\"failure\"><img class=\"failureimg\" src=\"../images/system/failure.png\"> $notice13a</div><br />";
		}
?>

<div class="aswrapper fade">
	<div class="iaswrapper">
		<div class="leftmember">
		<span class="boxhead"><?php echo $creatememacc; ?></span>
		<br><br>
	<form action="createdelmember.php" method="post">
		<div class="memitem2">
			<input type="text" name="username" class="textbox" placeholder="<?php echo $memuser; ?>" required>
		</div>
<br><br>
		<div class="memitem2">
			<input type="password" name="password" class="textbox" placeholder="<?php echo $mempass; ?>" required> <?php echo $again; ?> 
			<input type="password" name="password2" class="textbox" placeholder="<?php echo $mempass; ?>" required></div>
<br><br>
		<div class="memitem2">
			<input type="text" name="first" class="textbox" placeholder="<?php echo $memfirst; ?>" required></div>
<br><br>
		<div class="memitem2">
			<input type="text" name="last" class="textbox" placeholder="<?php echo $memlast; ?>" required></div>
<br><br>
		<div class="memitem2">
			<input type="email" name="email" class="textbox" placeholder="<?php echo $mememail; ?>" required>
			<input type="submit" name="create" value="<?php echo $button1; ?>" class="createbutton"> 
		</div>
	</form>
<br><br><br>
	</div>
	<div class="rightmember">
	<span class="boxhead"><?php echo $emailmembers; ?></span><br>
	<span class="supportedtypes"><?php echo $cfwarn; ?></span>
	<br>

		<!-- Success -->
       	<div id="growit" class="successful">
       		<div class="sentspin">
       			<img alt="Success" src="../images/system/success.png">
       		</div>
              	<?php echo $havesent; ?><br><br><?php echo $greatday; ?><br><br>
       	</div>
                        
		<form id="form" class="contact__form" method="post" action="send.php">
                                
			<input name="emailsubject" type="text" class="textbox" placeholder="<?php echo $subject; ?>" required>
            <input name="submit" type="submit" class="sendemailbutton" value="<?php echo $sendemail; ?>" onsubmit="invisible()">
            <br>
            <textarea name="emailmessage" class="emailtext" placeholder="<?php echo $message; ?>" required></textarea>
                      
        </form>

 	</div>
</div>
</div>
	<hr class="divider">
<br>
	<div class="aswrapper fade">
		<div class="iaswrapper">
			<spam class="boxhead"><?php echo $curmembers; ?></spam>
<br><br>

<?php

	$page = $_GET['page'];

	if ($page == "" || $page == 1) {

		$newuserpage = 0;
		$userpage = 25;

	} else {

		$newuserpage = ($page - 1) * 25;
		$userpage = 25;
	}		



	$sql = "SELECT username, first, last, email FROM members WHERE username != 'Administrator' ORDER BY username ASC LIMIT $newuserpage, $userpage";
	$result = mysqli_query($dbconnect, $sql);
	while ($list = mysqli_fetch_array($result)) {
		$username = $list[0];
		$firstname = $list[1];
		$lastname = $list[2];
		$email = $list[3];

			echo "<div class=\"listmembers\"><form action=\"createdelmember.php\" class=\"form\" method=\"post\"";
				?> 
		onsubmit="return confirm('<?php echo $deletemember; ?>');" 
				<?php
			echo "><input type=\"hidden\" name=\"username\" value=\"$username\">";
			echo "<input type=\"submit\" value=\" \" class=\"deletebutton\" name=\"delete\" title=\"$mdelete\"></form> $username "; if ($firstname != "" || $lastname != "") { echo "($firstname $lastname)"; } echo "<br> <a href=\"mailto:$email\">$email</a></div>";	

	}

#Begin pagination

if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}


#pages


	$sql8 = "SELECT COUNT(*) FROM members WHERE username != 'Administrator'";
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

   		echo "<a href=\"index.php?menu=members\"><div class=\"boxed1 fade\">$first</div></a>";
    }

		

   if ($page <= 1){ 

    	echo "<div class=\"boxed disabled fade\">$prev</div>";
    
    } else { 

    	echo "<a href=\"index.php?menu=members&page=";
    	echo $page - 1;
    	echo "\"><div class=\"boxed fade\">$prev</div></a>";
    }


	$highestpagenumber = $commenttotal;


    if($page == $highestpagenumber || $highestpagenumber == 0) { 

	 	echo "<div class=\"boxed disabled fade\">$next</div>"; 

   	} else {

  		echo "<a href=\"index.php?menu=members&page=";
  		echo $page + 1;
        echo "\"> <div class=\"boxed fade\">$next</div></a>";

}

   	if ($page == $highestpagenumber || $highestpagenumber == 0) { 

	    echo "<div class=\"boxed disabled fade\">$last</div>";

	} else {
 	
 		echo "<a href=\"index.php?menu=members&page=$highestpagenumber\"><div class=\"boxed\">$last</div></a>";
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
<br>


<?php
# End pagination


?>
		</div>
	</div>
</div>
<script src="jquery351.js"></script>
<script>
//Email form animation and submission

	var form = $('.contact__form'), form_data;

function done_func(response) {
var shrink = document.getElementById("form");
   shrink.classList.add("submitted");

setTimeout(function wait() {
var growthesuccess = document.getElementById("growit");
   growthesuccess.classList.add("grow");
  }, 2000);

setTimeout(function wait2() {
var shrink = document.getElementById("form");
   shrink.classList.add("hide");
  }, 2000);

message.text(response);
        setTimeout(function () {
            message.fadeOut();
        }, 2500);
        form.find('input:not([type="submit"]), textarea').val('');
    }

form.submit(function (e) {
        e.preventDefault();
        form_data = $(this).serialize();
        $.ajax({
            type: 'POST',
            url: form.attr('action'),
            data: form_data
        })
        .done(done_func)
        .fail(fail_func);
    });
</script>
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
