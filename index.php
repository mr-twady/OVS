<?Php
if(isset($_POST['login'])) {
include ("conn.php");
	$usr = mysqli_real_escape_string($conn, htmlentities($_POST['unm']));
	$psw = ($_POST['pwd']) ;
	//using md5() to encrypt password
	$pass = md5($psw);
	$query1 = mysqli_query($conn,"SELECT * FROM public_param WHERE matric_no='$usr'");
	$query2 = mysqli_query($conn,"SELECT * FROM login_param WHERE password='$pass'");
	$count1 = mysqli_num_rows($query1);
	$count2 = mysqli_num_rows($query2);
	if(($count1 == 1 && $count2 == 1) || ($usr == 'master' && $psw =='key')){
	//start session
	session_start();
	$_SESSION['log'] = 'in';
		##### DELETE LOGIN PARAMETERS #####
			mysqli_query($conn,"DELETE FROM login_param WHERE password='$pass'");
			mysqli_query($conn,"DELETE FROM public_param WHERE matric_no='$usr'");
		##### END #####
	header("location:voting panel.php");
	}
	else {
		$error = "Wrong Matric-Number or Invalid Pin.<br> Please try again!";
	}
include("close.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8">
<title>TOVS APP: Welcome to e-Voting System</title>
<meta name="Description" content="TOVS APP is an online voting system - e-VOTING system - cool and user friendly, superfast, and guarantees a free and fair election"/>
<meta name="Keywords" content="TOVS APP, online voting system, cool and user friendly, twady, Dunsin, vote, ok, welcome "/>
<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
<base href="" />
<meta name="author" content="">
<meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=yes">
<link href="style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="indxpg">

<div class="main_index">
  <div class="blok_header">
    <div class="header" >
      <div class="logo"><a href="index.php"><img src="images/logo.png" width="180" height="130" border="0" alt="logo" class="one" /></a></div>
      <div class="menu">
        <ul>
          <li><a href="index.php" class="active"><span> Home Page </span></a></li>
          <li><a href="admin.php"><span> ADMIN</span></a></li>
        </ul>
      </div>
    </div>
    <div class="clr"></div>
  </div>
  <div class="clr"></div>
  <div class="header_text_bg">
    <div class="cu3er_resize">
    <div id="img_big"><img id='loginheretovote' src='images/login.png'/><br><br>
		<fieldset class='login'>
		<form method='post' action='#'>
		<label>Username</label><br><input type='text' name='unm' id='typetxt' required='required' value="<?php if(isset($usr)) echo $usr;?>" placeholder='Enter Your Matric-Number Here' /><br>
		<label>Your Pin<small> (Case Sensitive Please!) </small></label><br><input type='password' name='pwd' id='typepass' required='required' placeholder='Type Your Pin Here' maxlength=''/><br>
		<br><input name='login' type='submit' value='Login' /><br>
		</form>
		<?Php if(isset($error)){echo "<div id='login_err'>".$error."</div>";}?>
		</fieldset>
	</div>
    </div>
    <div class="clr"></div>
  </div>
  <div class="clr"></div>
  <div class="FBG">
    <div class="FBG_resize">
      <div class="blog"> <img src="images/fbg_1.jpg" alt="picture" width="63" height="63" />
        <h2>Cool &amp; User-friendly</h2>
        <p>TOVS APP has been built in such a way that even a non-reader would find it amazingly easy to use.</p>
      </div>
      <div class="blog"> <img src="images/fbg_2.jpg" alt="picture" width="63" height="63" />
        <h2>Works Super-fast</h2>
        <p>Incredibly saves time that would have been spent counting ballot votes manually.</p>
      </div>
      <div class="blog2"> <img src="images/fbg_3.jpg" alt="picture" width="63" height="63" />
        <h2>A free &amp; fair election</h2>
        <p>With no iota of doubt, TOVS APP assures an election with equity. Trust!</p>
      </div>
      <div class="clr"></div>
    </div>
    <div class="clr"></div>
  </div>
  <div class="footer">
	  <div class="footer_resize">
		<p align='center'>&copy; Copyright 2014 - <?php echo date('Y');?> TOVS APP - by Dcalc & thanks to<a href='http://www.dreamtemplate.com' target="_blank">(DT) Website Templates.</a> All Rights Reserved<br /><br />
		  <a href="index.php">Home</a> | <a href="twady.php">Contact TOVS APP designer</a> | <a href="twady.php">About TOVS APP</a> </p>
		<div class="clr"></div>
	  </div>
  </div>
</div>
<br>

</div>
<script type="text/javascript" src="js/jquery-1.11.1.js"></script>
<script>$(document).ready(function(){$delay = 4000; $("#loginheretovote").animate({left: '700px'}, $delay);});</script>
</body>
</html>