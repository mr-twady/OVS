<?php 
##########  CHECK IF USER LOGGED IN  ##############
//starting the session
session_start();
//checking if a log SESSION VARIABLE has been set
if( !isset($_SESSION['log']) || ($_SESSION['log'] != 'admin') ){
    //if the user is not allowed, display a message and a link to go back to login page
	echo "You cannot access this page without Logging In. ";
	echo "<a href='http:../../admin.php'>Click Here to Login</a>";
    //this aborts the script
	exit();
}
?>
<?Php
if(isset($_GET['log']) && ($_GET['log']=='adminout')){
    //if the user logged out, delete any SESSION variables
	session_destroy();
	//then redirect to login page
	header('location:../../admin.php');
	exit();
}
?>
<?Php
if(isset($_POST['initialize'])){
include("../../conn.php");
//update all tables with zero
$qry = mysqli_query($conn, "UPDATE voternum SET counter='0',undecided='0'");
$qry .= mysqli_query($conn, "UPDATE pres SET aspirant1='0',aspirant2='0',undecided='0'");
$qry .= mysqli_query($conn, "UPDATE vpres SET aspirant1='0',aspirant2='0',undecided='0'");
$qry .= mysqli_query($conn, "UPDATE gsec SET aspirant1='0',aspirant2='0',undecided='0'");
$qry .= mysqli_query($conn, "UPDATE fsec SET aspirant1='0',aspirant2='0',undecided='0'");
$qry .= mysqli_query($conn, "UPDATE treasurer SET aspirant1='0',aspirant2='0',undecided='0'");
$qry .= mysqli_query($conn, "UPDATE pro SET aspirant1='0',aspirant2='0',undecided='0'");
$qry .= mysqli_query($conn, "UPDATE sportmin SET aspirant1='0',aspirant2='0',undecided='0'");
$qry .= mysqli_query($conn, "UPDATE sdir SET aspirant1='0',aspirant2='0',undecided='0'");
$qry .= mysqli_query($conn, "UPDATE ags SET aspirant1='0',aspirant2='0',undecided='0'");
$qry .= mysqli_query($conn, "UPDATE c_presi SET aspirant1='0',aspirant2='0'");
$qry .= mysqli_query($conn, "UPDATE c_vpres SET aspirant1='0',aspirant2='0'");
$qry .= mysqli_query($conn, "UPDATE c_gsec SET aspirant1='0',aspirant2='0'");
$qry .= mysqli_query($conn, "UPDATE c_fsec SET aspirant1='0',aspirant2='0'");
$qry .= mysqli_query($conn, "UPDATE c_trsr SET aspirant1='0',aspirant2='0'");
$qry .= mysqli_query($conn, "UPDATE c_pro SET aspirant1='0',aspirant2='0'");
$qry .= mysqli_query($conn, "UPDATE c_sport SET aspirant1='0',aspirant2='0'");
$qry .= mysqli_query($conn, "UPDATE c_sdir SET aspirant1='0',aspirant2='0'");
$qry .= mysqli_query($conn, "UPDATE c_ags SET aspirant1='0',aspirant2='0'");
//$qry .= mysqli_query($conn, "UPDATE src_aspirants SET aspirant1='0',aspirant2='0',aspirant3='0',aspirant4='0',aspirant5='0',aspirant6='0',undecided='0'");
	if($qry){
	$msg = "Database Successfully Initialized.";
	}
include("../../close.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
	
    <title>TOVS APP Admin Panel- Welcome</title>
	<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">
    <script src="js/jquery.js"></script>
    <script src="js/scripts.js"></script>

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="main.php">TOVS APP Admin</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> ADMIN USER <b class="caret"></b></a>
                    <ul class="dropdown-menu">
						<li>
                            <a href="?log=adminout"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="active">
                        <a href="main.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
					<li>
                        <a href="chng_pwd.php"><i class="fa fa-fw fa-edit"></i> Change Password</a>
                    </li>
					<li>
                        <a href="res.php"><i class="fa fa-fw fa-edit"></i> Result's Summary</a>
                    </li>
                    <li>
                        <a href="electionresults.php"><i class="fa fa-fw fa-bar-chart-o"></i> View Election Results</a>
                    </li>
					
                  
                    <li>
                        <a href="form2.php"><i class="fa fa-fw fa-edit"></i> Add/register Voters</a>
                    </li>
					<li>
                        <a href="collation.php"><i class="fa fa-fw fa-bar-chart-o"></i> Result Collation </a>
                    </li>               
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            WELCOME TO DEMO 2015 ELECTIONS 
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Dashboard                           
                                <i class="fa fa-info-circle"></i>  <strong>Current Local time : </strong> <div id='date'></div>
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                
				<br>
                <div class="row">
					<div class="notify_all">
					<H1>ELECTION IS ABOUT TO START</H1>
					</div>
					<br>
					<div class="notify_all">
					<form action="#" method="POST" onsubmit="return cnfrm()">
					<input type="submit" value="INITIALIZE DATABASE" name="initialize" />
					</form>
					<!---After successful initialization, display DB--->
					<div class="row" id='results'>
					<?Php if(isset($msg)){
						echo "<div id='init_msg'>".$msg."</div><br>";
						include("../../conn.php");
						$query = mysqli_query($conn,"SELECT* FROM pres");
									$query1 = mysqli_query($conn,"SELECT* FROM vpres");
									$query2 = mysqli_query($conn,"SELECT* FROM gsec");
									$query3 = mysqli_query($conn,"SELECT* FROM fsec");
									$query4 = mysqli_query($conn,"SELECT* FROM treasurer");
									$query5 = mysqli_query($conn,"SELECT* FROM pro");
									$query6 = mysqli_query($conn,"SELECT* FROM sportmin");
									$query7 = mysqli_query($conn,"SELECT* FROM sdir");
									$query8 = mysqli_query($conn,"SELECT* FROM ags");
									$query_src = mysqli_query($conn,"SELECT* FROM src_aspirants");

									#####how many people voted?######
									$qry = mysqli_query($conn,"SELECT* FROM voternum");
									$num = mysqli_num_rows($qry);
									global $figvoters;
									if($num!=0){
									while($row = mysqli_fetch_array($qry)){
										$figvoters = $row["counter"];
										}
									}
									#####end how many people voted?#################
								######show all results#########
								global $asp1,$asp2,$asp3,$asp4,$asp5,$asp6;
								####result for president######
								echo "<center>";
									echo "<div style='color:14284f;font-size:22px;font-family:calibri;' align='center'> PRESIDENT </div>";
									echo "<table width='75%' border=1 cellspacing='0' cellpadding='5' style='color:14284f;'>";
									echo "<tr style='background:rgb(230,230,255);text-align:center;'><th width='25%'> ASPIRANTS </th><th width='25%'> VOTES </th><th width='25%'> PERCENTAGE </th></tr>";
										global $winner;
										while($row  = mysqli_fetch_array($query)) {
										//decide winner		
										if ($row[1] > $row[2]){
										$winner="OLUSANMI JOSHUA";
										}
										else if($row[2] > $row[1]){
										$winner="ADETULA BODE";
										}
										else{
										$winner="NO WINNER YET";
										}
										//end deision of winner
										//percentage decision
										if($figvoters!=0){
										$asp1 = ($row[1]/$figvoters) * 100;
										$asp2 = ($row[2]/$figvoters) * 100;
										}
										//end percentage
										echo "<tr><td width='25%'> OLUSANMI JOSHUA </td><td width='25%'> ".$row[1]." </td><td width='25%'> ".number_format($asp1,2)."% </td></tr>";
										echo "<tr><td width='25%'> ADETULA BODE  </td><td width='25%'> ".$row[2]." </td><td width='25%'> ".number_format($asp2,2)."% </td></tr>";
										}
									echo "</table>";
									echo "PRESIDENT-ELECT: ".$winner."<br><br>";
								####result for vice president####
									echo "<div style='color:14284f;font-size:22px;font-family:calibri;' align='center'> VICE-PRESIDENT </div>";
									echo "<table width='75%' border=1 cellspacing='0' cellpadding='5' style='color:14284f'>";
									echo "<tr style='background:rgb(230,230,255);text-align:center;'><th width='25%'> ASPIRANTS </th><th width='25%'> VOTES </th><th width='25%'> PERCENTAGE </th></tr>";
										global $winner1;
									while($row  = mysqli_fetch_array($query1)) {
									//decide winner1
										if ($row[1] > $row[2]){
										$winner1="OLUSANYA KEMI";
										}
										else if($row[2] > $row[1]){
										$winner1="EMMANUEL SEUN T. ";
										}
										else{
										$winner1="NO WINNER YET";
										}
										//end deision of winner1
										//percentage decision
										if($figvoters!=0){
										$asp1 = ($row[1]/$figvoters) * 100;
										$asp2 = ($row[2]/$figvoters) * 100;
										}
										//end percentage
										echo "<tr><td width='25%'> OLUSANYA KEMI </th><td width='25%'> ".$row[1]." </td><td width='25%'> ".number_format($asp1,2)."% </td></tr>";
										echo "<tr><td width='25%'> EMMANUEL SEUN T.</td><td width='25%'> ".$row[2]." </td><td width='25%'> ".number_format($asp2,2)."% </td></tr>";
									}
									echo "</table>";echo "VICE PREIDENT-ELECT: ".$winner1."<br><br>";
								####result for gen sec####
									echo "<div style='color:14284f;font-size:22px;font-family:calibri;' align='center'> GEN.SEC </div>";
									echo "<table width='75%' border=1 cellspacing='0' cellpadding='5' style='color:14284f'>";
									echo "<tr style='background:rgb(230,230,255);text-align:center;'><th width='25%'> ASPIRANTS </th><th width='25%'> VOTES </th><th width='25%'> PERCENTAGE </th></tr>";
										global $winner2;
										while($row  = mysqli_fetch_array($query2)) {
									//decide winner2
										if ($row[1] > $row[2]){
										$winner2="OLUWARANMIWA KAY";
										}
										else if($row[2] > $row[1]){
										$winner2="GWAWANI FAVOUR ";
										}
										else{
										$winner2="NO WINNER YET";
										}
										//end deision of winner
										//percentage decision
										if($figvoters!=0){
										$asp1 = ($row[1]/$figvoters) * 100;
										$asp2 = ($row[2]/$figvoters) * 100;
										}
										//end percentage
										echo "<tr><td width='25%'> OLUWARANMIWA KAY </th><td width='25%'> ".$row[1]." </td><td width='25%'> ".number_format($asp1,2)."% </td></tr>";
										echo "<tr><td width='25%'> GWAWANI FAVOUR </td><td width='25%'> ".$row[2]." </td><td width='25%'> ".number_format($asp2,2)."% </td></tr>";
									}
									echo "</table>";echo "GEN.SEC-ELECT: ".$winner2."<br><br>";
								####result for fin sec####
									echo "<div style='color:14284f;font-size:22px;font-family:calibri;' align='center'> FIN.SEC </div>";
									echo "<table width='75%' border=1 cellspacing='0' cellpadding='5' style='color:14284f'>";
									echo "<tr style='background:rgb(230,230,255);text-align:center;'><th width='25%'> ASPIRANTS </th><th width='25%'> VOTES </th><th width='25%'> PERCENTAGE </th></tr>";
										global $winner3;
									while($row = mysqli_fetch_array($query3)) {
									//decide winner
										if ($row[1] > $row[2]){
										$winner3="KING PRINCE";
										}
										else if($row[2] > $row[1]){
										$winner3="DUNSIN TAYO ";
										}
										else{
										$winner3="NO WINNER YET";
										}
										//end decision of winner
										//percentage decision
										if($figvoters!=0){
										$asp1 = ($row[1]/$figvoters) * 100;
										$asp2 = ($row[2]/$figvoters) * 100;
										}
										//end percentage
										 echo "<tr><td width='25%'> KING PRINCE </th><td width='25%'> ".$row[1]." </td><td width='25%'> ".number_format($asp1,2)."% </td></tr>";
										echo "<tr><td width='25%'> DUNSIN TAYO </td><td width='25%'> ".$row[2]." </td><td width='25%'> ".number_format($asp2,2)."% </td></tr>";
									}
									echo "</table>";echo "FIN.SEC-ELECT: ".$winner3."<br><br>";
								####result for treasurer####
									echo "<div style='color:14284f;font-size:22px;font-family:calibri;' align='center'> TREASURER </div>";
									echo "<table width='75%' border=1 cellspacing='0' cellpadding='5' style='color:14284f'>";
									echo "<tr style='background:rgb(230,230,255);text-align:center;'><th width='25%'> ASPIRANTS </th><th width='25%'> VOTES </th><th width='25%'> PERCENTAGE </th></tr>";
									global $winner4;
									while($row = mysqli_fetch_array($query4)) {
									//decide winner
										if ($row[1] > $row[2]){
										$winner4="RICHARD H.";
										}
										else if($row[2] > $row[1]){
										$winner4="PETER LAHM ";
										}
										else{
										$winner4="NO WINNER YET";
										}
										//end deision of winner
										//percentage decision
										if($figvoters!=0){
										$asp1 = ($row[1]/$figvoters) * 100;
										$asp2 = ($row[2]/$figvoters) * 100;
										}
										//end percentage
										echo "<tr><td width='25%'> RICHARD H. </th><td width='25%'> ".$row[1]." </td><td width='25%'> ".number_format($asp1,2)."% </td></tr>";
										echo "<tr><td width='25%'> PETER LAHM </td><td width='25%'> ".$row[2]." </td><td width='25%'> ".number_format($asp2,2)."% </td></tr>";
									}
									echo "</table>";echo "TREASURER ELECT: ".$winner4."<br><br>";
								####result for P.R.O.####
									echo "<div style='color:14284f;font-size:22px;font-family:calibri;' align='center'> P.R.O </div>";
									echo "<table width='75%' border=1 cellspacing='0' cellpadding='5' style='color:14284f'>";
									echo "<tr style='background:rgb(230,230,255);text-align:center;'><th width='25%'> ASPIRANTS </th><th width='25%'> VOTES </th><th width='25%'> PERCENTAGE </th></tr>";
									global $winner5;
									while($row = mysqli_fetch_array($query5)) {
										//decide winner
										if ($row[1] > $row[2]){
										$winner5="BELLO OLUFEMI";
										}
										else if($row[2] > $row[1]){
										$winner5="OLUSANMI JOSIAH";
										}
										else{
										$winner5="NO WINNER YET";
										}
										//end deision of winner
										//percentage decision
										if($figvoters!=0){
										$asp1 = ($row[1]/$figvoters) * 100;
										$asp2 = ($row[2]/$figvoters) * 100;
										}
										//end percentage
									echo "<tr><td width='25%'> BELLO OLUFEMI </th><td width='25%'> ".$row[1]." </td><td width='25%'> ".number_format($asp1,2)."% </td></tr>";
									echo "<tr><td width='25%'> OLUSANMI JOSIAH </td><td width='25%'> ".$row[2]." </td><td width='25%'> ".number_format($asp2,2)."% </td></tr>";
									}
									echo "</table>";echo "P.R.O-ELECT: ".$winner5."<br><br>";
								####result for Sport Minister####
									echo "<div style='color:14284f;font-size:22px;font-family:calibri;' align='center'> SPORT MINISTER </div>";
									echo "<table width='75%' border=1 cellspacing='0' cellpadding='5' style='color:14284f'>";
									echo "<tr style='background:rgb(230,230,255);text-align:center;'><th width='25%'> ASPIRANTS </th><th width='25%'> VOTES </th><th width='25%'> PERCENTAGE </th></tr>";
									global $winner6;
									while($row = mysqli_fetch_array($query6)) {
										//decide winner
										if ($row[1] > $row[2]){
										$winner6="BOBOKUN NAMY";
										}
										else if($row[2] > $row[1]){
										$winner6="ERI IGBAGBO";
										}
										else{
										$winner6="NO WINNER YET";
										}
										//end deision of winner
										//percentage decision
										if($figvoters!=0){
										$asp1 = ($row[1]/$figvoters) * 100;
										$asp2 = ($row[2]/$figvoters) * 100;
										}
										//end percentage
										echo "<tr><td width='25%'> BOBOKUN NAMY </th><td width='25%'> ".$row[1]." </td><td width='25%'> ".number_format($asp1,2)."% </td></tr>";
									echo "<tr><td width='25%'> ERI IGBAGBO </td><td width='25%'> ".$row[2]." </td><td width='25%'> ".number_format($asp2,2)."% </td></tr>";
									}
									echo "</table>";echo "SPORT MINISTER-ELECT: ".$winner6."<br><br>";
								####result for Social Director####
									echo "<div style='color:14284f;font-size:22px;font-family:calibri;' align='center'> SOCIAL DIRECTOR </div>";
									echo "<table width='75%' border=1 cellspacing='0' cellpadding='5' style='color:14284f'>";
									echo "<tr style='background:rgb(230,230,255);text-align:center;'><th width='25%'> ASPIRANTS </th><th width='25%'> VOTES </th><th width='25%'> PERCENTAGE </th></tr>";
									global $winner7;
									while($row = mysqli_fetch_array($query7)) {
									//decide winner
										if ($row[1] > $row[2]){
										$winner7="LOVE G.";
										}
										else if($row[2] > $row[1]){
										$winner7="PAUL K.";
										}
										else{
										$winner7="NO WINNER YET";
										}
										//end deision of winner
										//percentage decision
										if($figvoters!=0){
										$asp1 = ($row[1]/$figvoters) * 100;
										$asp2 = ($row[2]/$figvoters) * 100;
										}
										//end percentage
										echo "<tr><td width='25%'> LOVE G.  </th><td width='25%'> ".$row[1]." </td><td width='25%'> ".number_format($asp1,2)."% </td></tr>";
									echo "<tr><td width='25%'> PAUL K. </td><td width='25%'> ".$row[2]." </td><td width='25%'> ".number_format($asp2,2)."% </td></tr>";
									}
									echo "</table>";echo "SOCIAL DIRECTOR-ELECT: ".$winner7."<br><br>";	
								####result
								####result for AGS####
									echo "<div style='color:14284f;font-size:22px;font-family:calibri;' align='center'> ASSISTANT GEN. SEC </div>";
									echo "<table width='75%' border=1 cellspacing='0' cellpadding='5' style='color:14284f'>";
									echo "<tr style='background:rgb(230,230,255);text-align:center;'><th width='25%'> ASPIRANTS </th><th width='25%'> VOTES </th><th width='25%'> PERCENTAGE </th></tr>";
									global $winner8;
									while($row = mysqli_fetch_array($query8)) {
									//decide winner
										if ($row[1] > $row[2]){
										$winner8="BOSS KAY";
										}
										else if($row[2] > $row[1]){
										$winner8="LUIS WEST";
										}
										else{
										$winner8="NO WINNER YET";
										}
										//end deision of winner
										//percentage decision
										if($figvoters!=0){
										$asp1 = ($row[1]/$figvoters) * 100;
										$asp2 = ($row[2]/$figvoters) * 100;
										}
										//end percentage
										echo "<tr><td width='25%'> BOSS KAY  </th><td width='25%'> ".$row[1]." </td><td width='25%'> ".number_format($asp1,2)."% </td></tr>";
									echo "<tr><td width='25%'> LUIS WEST </td><td width='25%'> ".$row[2]." </td><td width='25%'> ".number_format($asp2,2)."% </td></tr>";
									}
									echo "</table>";echo "ASSISTANT GEN. SEC-ELECT: ".$winner8."<br><br>";	
								####result
								####result for SRC####
								/*
									echo "<div style='color:14284f;font-size:22px;font-family:calibri;' align='center'> SRC RESULTS </div>";
									echo "<table width='75%' border=1 cellspacing='0' cellpadding='5' style='color:14284f'>";
									echo "<tr style='background:rgb(230,230,255);text-align:center;'><th width='25%'> ASPIRANTS </th><th width='25%'> VOTES </th><th width='25%'> PERCENTAGE </th></tr>";
									while($row = mysqli_fetch_array($query_src)) {
									//decide winner
										$figvoters = $row[1] + $row[2] + $row[3] +$row[4] + $row[5] +$row[6];
										//end deision of winner
										//percentage decision
										if($figvoters!=0){
										$asp1 = ($row[1]/$figvoters) * 100;
										$asp2 = ($row[2]/$figvoters) * 100;
										$asp3 = ($row[3]/$figvoters) * 100;
										$asp4 = ($row[4]/$figvoters) * 100;
										$asp5 = ($row[5]/$figvoters) * 100;
										$asp6 = ($row[6]/$figvoters) * 100;
										}
										//end percentage
									echo "<tr><td width='25%'> OLUMIDE PAUL </th><td width='25%'> ".$row[1]." </td><td width='25%'> ".number_format($asp1,2)."% </td></tr>";
									echo "<tr><td width='25%'> IGBAGBO DUNSIN </td><td width='25%'> ".$row[2]." </td><td width='25%'> ".number_format($asp2,2)."% </td></tr>";
									echo "<tr><td width='25%'> IGWE MADIWUKE </td><td width='25%'> ".$row[3]." </td><td width='25%'> ".number_format($asp3,2)."% </td></tr>";
									echo "<tr><td width='25%'> IKUYAJOLU DENNIS </td><td width='25%'> ".$row[4]." </td><td width='25%'> ".number_format($asp4,2)."% </td></tr>";
									echo "<tr><td width='25%'> KENNETH JAMES</td><td width='25%'> ".$row[5]." </td><td width='25%'> ".number_format($asp5,2)."% </td></tr>";
									echo "<tr><td width='25%'> KEMI ORJI </td><td width='25%'> ".$row[6]." </td><td width='25%'> ".number_format($asp6,2)."% </td></tr>";
									}
									echo "</table>";*/
								####result 
								echo "</center>";
							include("../../close.php");
						}
					?>
					</div>
					</div>
                </div>
			
				
				
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

	<script>
		function cnfrm(){
			var xxx = confirm("INITIALIZING DATABASE IS AN IRREVERSIBLE ACTION\n( ARE YOU SURE YOU WANT TO INITIALIZE DATABASE? )\nIF YES CLICK 'OK'\nIF OTHERWISE CLICK 'CANCEL'");
			if(xxx == true){
				return true;
			}
			else{
				return false;
			}
		}
	</script>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>

</body>

</html>