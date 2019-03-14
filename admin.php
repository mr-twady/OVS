<?Php
if(isset($_POST['login'])) {
include ("conn.php");
	$usr = mysqli_real_escape_string($conn, htmlentities($_POST['unm']));
	$psw = ($_POST['pwd']) ;
	//using md5() to encrypt and password
	$pass = md5($psw);
	$query = mysqli_query($conn,"SELECT * FROM admin WHERE username='$usr' and password='$pass'");
	$count = mysqli_num_rows($query);
	if($count == 1){
	session_start();
	$_SESSION['log'] = 'admin';
	header("location:ovs files/admin/main.php");
	}
	else {
		$error = "<div id='edge'>Wrong Login Parameters.<br> Please try again!</div>";
	}
mysqli_close($conn);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Admin Login | TOVS APP</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
<link href="style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="admin_index">
  <div class="blok_header">
    <div class="header">
      <div class="logo"><a href="index.php"><img src="images/logo.png" width="180" height="130" border="0" alt="logo" class="one" /></a></div>
      <div class="menu">
        <ul>
          <li><a href="index.php"> Home Page </a></li>
          <li><a href="admin.php" class="active"> ADMIN </a></li>
        </ul>
      </div>
    </div>
        <div class="clr"></div>
  </div>
    <div class="clr"></div>
  <div class="header_text_bg"><div class="header_text_bg_resize">
    <div class="menu2"></div>
    <div class="clr"></div>
  </div></div>
  <div class="clr"></div>
  <div class="admin_body_resize">
    <center>
	<h3>ADMIN LOGIN PANEL</h3>
<fieldset class='admin_login'>
		<form method='post'>
		<input type='text' name='unm' id='typetxt' required='required' value="<?php if(isset($usr)) echo $usr;?>" placeholder='Admin Username?' maxlength='15'/><br>
		<br><input type='password' name='pwd' id='typepass' required='required' placeholder='Type Password Here' maxlength='15' /><br>
		<br><input name='login' type='submit' value='Login' /><br>
		</form>
		<?Php if(isset($error)){echo "<div id='error'>".$error."</div>";}?>
</fieldset>
</center>
  </div>
<div class="footer_a">
  <div class="footer_resize">
    <p align='center'>&copy; Copyright <?php echo date('Y');?> TOVS APP - by Dcalc & thanks to<a href='http://www.dreamtemplate.com' target="_blank">(DT) Website Templates.</a> All Rights Reserved<br /><br />
      <a href="index.php">Home</a> | <a href="twady.php">Contact TOVS App designer</a> | <a href="twady.php">About TOVS App</a> </p>
    <div class="clr"></div>
  </div>
</div>
</div>
</body>
</html>
