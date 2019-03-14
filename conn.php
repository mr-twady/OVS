<?php 
$conn = mysqli_connect('127.0.0.1','root','ping1994') or die('Could not connect to Server'); 
$seldb = mysqli_select_db($conn,"tovsapp") or die ("Could not select database");  
?> 