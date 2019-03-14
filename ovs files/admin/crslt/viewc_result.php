<?php 
 ######CHECK IF USER LOGGED IN###### 
//starting the session
session_start();
//checking if a log SESSION VARIABLE has been set
if(  !isset($_SESSION['hlog']) || ($_SESSION['hlog'] != 'admin') ){
    //if the user is not allowed, display a message and a link to go back to login page
	echo "You cannot access this page without Logging In. ";
	echo "<a href='http:../collation.php'>Go back</a>";
	//i.e echo "<a href='http://current server/dcalc/ovs/admin.php'>Click Here to go Login</a>";
    //this aborts the script
	exit();
}
?>
<?Php
if(isset($_GET['log']) && ($_GET['log']=='adminout')){
    //if the user logged out, delete any SESSION variables
	session_destroy();
	//then redirect to login page
	header('location:../../../admin.php');
	//i.e header('location:http://current server/dcalc/ovs/admin.php');
	exit();
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

    <title>TOVS APP Admin Panel- Results</title>
	<link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon" />
    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

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
                    <li>
                        <a href="../main.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
					<li>
                        <a href="../chng_pwd.php"><i class="fa fa-fw fa-dashboard"></i> Change Password</a>
                    </li>
                    <li>
                        <a href="../res.php"><i class="fa fa-fw fa-bar-chart-o"></i> View Election Results</a>
                    </li>
					<li>
                        <a href="../electionresults.php"><i class="fa fa-fw fa-bar-chart-o"></i> View Election Results</a>
                    </li>
                    <li>
                        <a href="../form2.php"><i class="fa fa-fw fa-edit"></i> Add/register Voters</a>
                    </li>
					<li class="active">
                        <a href="../collation.php"><i class="fa fa-fw fa-bar-chart-o"></i> Result Collation </a>
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
                            FINAL RESULTS - DEMO 2015 ELECTION <span class="cltn_rs"> 
							<h3>I NEED TO CORRECT A FATAL ERROR - RESULTS OUGHT TO BE READ FROM FINAL TABLE (TABLE THAT CONTAINS COLLATED RESULTS) NOT 
							PRES, V_PRES AND THE LIKES.</h3>
							</span>
                        </h1>                        
						<ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="main.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-fw fa-bar-chart-o"></i> Result Collation
                            </li>
							<li><span onclick='window.print()'id='print'>CLICK HERE TO PRINT THIS RESULT/PAGE</span>
                            </li>
							<li><a href="c9.php">Go back to Previous PAGE</a>
                            </li>
                        </ol>
                    </div>
                </div>             
                <div class="row" id='results'>'
				<div class="col-lg-12">
					<?Php
include ("../../../conn.php");
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

######show all results#########
####result for president######
echo "<center>";
	echo "<div style='color:14284f;font-size:22px;font-family:calibri;' align='center'> PRESIDENT </div>";
	echo "<table width='75%' border=1 cellspacing='0' cellpadding='5' style='color:14284f;'>";
	echo "<tr style='background:rgb(230,230,255);text-align:center;'><th width='25%'> ASPIRANTS </th><th width='25%'> VOTES </th><th width='25%'> PERCENTAGE </th></tr>";
		global $figvoters,$asp1,$asp2,$asp3,$asp4,$asp5,$asp6,$winner,$n,$x;
		while($row  = mysqli_fetch_array($query)) {
			$figvoters = $row["aspirant1"] + $row["aspirant2"] + $row["undecided"];
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
			$n = $row[3];
			//end deision of winner
			//percentage decision
			if($figvoters!=0){
			$asp1 = ($row[1]/$figvoters) * 100;
			$asp2 = ($row[2]/$figvoters) * 100;			
			$x = ($n/$figvoters) * 100;
			}
			
			//end percentage
			echo "<tr><td width='25%'> OLUSANMI JOSHUA </td><td width='25%'> ".$row[1]." </td><td width='25%'> ".number_format($asp1,2)."% </td></tr>";
			echo "<tr><td width='25%'> ADETULA BODE  </td><td width='25%'> ".$row[2]." </td><td width='25%'> ".number_format($asp2,2)."% </td></tr>";
	    }
	echo "</table>";
	echo "<div style='width:40%;background:#fff;border-radius:5px;border:1px solid #ccc;'>";
	echo "TOTAL NUMBER OF VOTE CASTED: ".$figvoters."<br>";
	echo "NULL/UNDECIDED VOTES: ".$n."<br>";
	echo "PERCENTAGE OF NULL/UNDECIDED VOTES: ".number_format($x,2)."% <br>";
	echo "PRESIDENT-ELECT: ".$winner."</div><br><br>";
####result for vice president####
	echo "<div style='color:14284f;font-size:22px;font-family:calibri;' align='center'> VICE-PRESIDENT </div>";
	echo "<table width='75%' border=1 cellspacing='0' cellpadding='5' style='color:14284f'>";
	echo "<tr style='background:rgb(230,230,255);text-align:center;'><th width='25%'> ASPIRANTS </th><th width='25%'> VOTES </th><th width='25%'> PERCENTAGE </th></tr>";
		global $winner1,$n1,$x1;
	while($row  = mysqli_fetch_array($query1)) {
		$figvoters = $row["aspirant1"] + $row["aspirant2"] + $row["undecided"];
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
       $n1 = $row[3];
		//end deision of winner1
		//percentage decision
		if($figvoters!=0){
		$asp1 = ($row[1]/$figvoters) * 100;
		$asp2 = ($row[2]/$figvoters) * 100;
		$x1 = ($row[3]/$figvoters) * 100;
		}
		//end percentage
	    echo "<tr><td width='25%'> OLUSANYA KEMI </th><td width='25%'> ".$row[1]." </td><td width='25%'> ".number_format($asp1,2)."% </td></tr>";
		echo "<tr><td width='25%'> EMMANUEL SEUN T.</td><td width='25%'> ".$row[2]." </td><td width='25%'> ".number_format($asp2,2)."% </td></tr>";
		
	}
	echo "</table>";echo "<div style='width:40%;background:#fff;border-radius:5px;border:1px solid #ccc;'>";
	echo "TOTAL NUMBER OF VOTE CASTED: ".$figvoters."<br>";
	echo "NULL/UNDECIDED VOTES: ".$n1."<br>";
	echo "PERCENTAGE OF NULL/UNDECIDED VOTES: ".number_format($x1,2)."% <br>";
	echo "VICE PRESIDENT-ELECT: ".$winner1."</div><br><br>";
####result for gen sec####
	echo "<div style='color:14284f;font-size:22px;font-family:calibri;' align='center'> GEN.SEC </div>";
	echo "<table width='75%' border=1 cellspacing='0' cellpadding='5' style='color:14284f'>";
	echo "<tr style='background:rgb(230,230,255);text-align:center;'><th width='25%'> ASPIRANTS </th><th width='25%'> VOTES </th><th width='25%'> PERCENTAGE </th></tr>";
		global $winner2,$n2,$x2;
		while($row  = mysqli_fetch_array($query2)) {
		$figvoters = $row["aspirant1"] + $row["aspirant2"] + $row["undecided"];
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
		$n2 = $row[3];
		//end deision of winner
		//percentage decision
		if($figvoters!=0){
		$asp1 = ($row[1]/$figvoters) * 100;
		$asp2 = ($row[2]/$figvoters) * 100;
		$x2 = ($row[3]/$figvoters) * 100;
		}
		//end percentage
	    echo "<tr><td width='25%'> OLUWARANMIWA KAY </th><td width='25%'> ".$row[1]." </td><td width='25%'> ".number_format($asp1,2)."% </td></tr>";
		echo "<tr><td width='25%'> GWAWANI FAVOUR </td><td width='25%'> ".$row[2]." </td><td width='25%'> ".number_format($asp2,2)."% </td></tr>";
		
	}
	echo "</table>";echo "<div style='width:40%;background:#fff;border-radius:5px;border:1px solid #ccc;'>";
	echo "TOTAL NUMBER OF VOTE CASTED: ".$figvoters."<br>";
	echo "NULL/UNDECIDED VOTES: ".$n2."<br>";
	echo "PERCENTAGE OF NULL/UNDECIDED VOTES: ".number_format($x2,2)."% <br>";
	echo "GEN. SEC-ELECT: ".$winner2."</div><br><br>";
####result for fin sec####
	echo "<div style='color:14284f;font-size:22px;font-family:calibri;' align='center'> FIN.SEC </div>";
	echo "<table width='75%' border=1 cellspacing='0' cellpadding='5' style='color:14284f'>";
	echo "<tr style='background:rgb(230,230,255);text-align:center;'><th width='25%'> ASPIRANTS </th><th width='25%'> VOTES </th><th width='25%'> PERCENTAGE </th></tr>";
		global $winner3,$n3,$x3;
	while($row = mysqli_fetch_array($query3)) {
		$figvoters = $row["aspirant1"] + $row["aspirant2"] + $row["undecided"];
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
		$n3 = $row[3];
		//end decision of winner
		//percentage decision
		if($figvoters!=0){
		$asp1 = ($row[1]/$figvoters) * 100;
		$asp2 = ($row[2]/$figvoters) * 100;
		$x3 = ($row[3]/$figvoters) * 100;
		}
		//end percentage
	    echo "<tr><td width='25%'> KING PRINCE </th><td width='25%'> ".$row[1]." </td><td width='25%'> ".number_format($asp1,2)."% </td></tr>";
		echo "<tr><td width='25%'> DUNSIN TAYO </td><td width='25%'> ".$row[2]." </td><td width='25%'> ".number_format($asp2,2)."% </td></tr>";
	}
	echo "</table>";echo "<div style='width:40%;background:#fff;border-radius:5px;border:1px solid #ccc;'>";
	echo "TOTAL NUMBER OF VOTE CASTED: ".$figvoters."<br>";
	echo "NULL/UNDECIDED VOTES: ".$n3."<br>";
	echo "PERCENTAGE OF NULL/UNDECIDED VOTES: ".number_format($x3,2)."% <br>";
	echo "FIN.SEC-ELECT: ".$winner3."</div><br><br>";
####result for treasurer####
	echo "<div style='color:14284f;font-size:22px;font-family:calibri;' align='center'> TREASURER </div>";
	echo "<table width='75%' border=1 cellspacing='0' cellpadding='5' style='color:14284f'>";
	echo "<tr style='background:rgb(230,230,255);text-align:center;'><th width='25%'> ASPIRANTS </th><th width='25%'> VOTES </th><th width='25%'> PERCENTAGE </th></tr>";
	global $winner4,$n4,$x4;
	while($row = mysqli_fetch_array($query4)) {
		$figvoters = $row["aspirant1"] + $row["aspirant2"] + $row["undecided"];
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
		$n4 = $row[3];
		//end deision of winner
		//percentage decision
		if($figvoters!=0){
		$asp1 = ($row[1]/$figvoters) * 100;
		$asp2 = ($row[2]/$figvoters) * 100;
		$x4 = ($row[3]/$figvoters) * 100;
		}
		//end percentage
	    echo "<tr><td width='25%'> RICHARD H. </th><td width='25%'> ".$row[1]." </td><td width='25%'> ".number_format($asp1,2)."% </td></tr>";
		echo "<tr><td width='25%'> PETER LAHM </td><td width='25%'> ".$row[2]." </td><td width='25%'> ".number_format($asp2,2)."% </td></tr>";
		
	}
	echo "</table>";echo "<div style='width:40%;background:#fff;border-radius:5px;border:1px solid #ccc;'>";
	echo "TOTAL NUMBER OF VOTE CASTED: ".$figvoters."<br>";
	echo "NULL/UNDECIDED VOTES: ".$n4."<br>";
	echo "PERCENTAGE OF NULL/UNDECIDED VOTES: ".number_format($x4,2)."% <br>";
	echo "TREASURER-ELECT: ".$winner4."</div><br><br>";
####result for P.R.O.####
	echo "<div style='color:14284f;font-size:22px;font-family:calibri;' align='center'> P.R.O </div>";
	echo "<table width='75%' border=1 cellspacing='0' cellpadding='5' style='color:14284f'>";
	echo "<tr style='background:rgb(230,230,255);text-align:center;'><th width='25%'> ASPIRANTS </th><th width='25%'> VOTES </th><th width='25%'> PERCENTAGE </th></tr>";
	global $winner5,$n5,$x5;
	while($row = mysqli_fetch_array($query5)) {
		$figvoters = $row["aspirant1"] + $row["aspirant2"] + $row["undecided"];
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
		$n5 = $row[3];
		//end deision of winner
		//percentage decision
		if($figvoters!=0){
		$asp1 = ($row[1]/$figvoters) * 100;
		$asp2 = ($row[2]/$figvoters) * 100;
		$x5 = ($row[3]/$figvoters) * 100;
		}
		//end percentage
	echo "<tr><td width='25%'> BELLO OLUFEMI </th><td width='25%'> ".$row[1]." </td><td width='25%'> ".number_format($asp1,2)."% </td></tr>";
	echo "<tr><td width='25%'> OLUSANMI JOSIAH </td><td width='25%'> ".$row[2]." </td><td width='25%'> ".number_format($asp2,2)."% </td></tr>";
	
	}
	echo "</table>";echo "<div style='width:40%;background:#fff;border-radius:5px;border:1px solid #ccc;'>";
	echo "TOTAL NUMBER OF VOTE CASTED: ".$figvoters."<br>";
	echo "NULL/UNDECIDED VOTES: ".$n5."<br>";
	echo "PERCENTAGE OF NULL/UNDECIDED VOTES: ".number_format($x5,2)."% <br>";
	echo "P.R.O-ELECT: ".$winner5."</div><br><br>";
####result for Sport Minister####
	echo "<div style='color:14284f;font-size:22px;font-family:calibri;' align='center'> SPORT MINISTER </div>";
	echo "<table width='75%' border=1 cellspacing='0' cellpadding='5' style='color:14284f'>";
	echo "<tr style='background:rgb(230,230,255);text-align:center;'><th width='25%'> ASPIRANTS </th><th width='25%'> VOTES </th><th width='25%'> PERCENTAGE </th></tr>";
	global $winner6,$n6,$x6;
	while($row = mysqli_fetch_array($query6)) {
		$figvoters = $row["aspirant1"] + $row["aspirant2"] + $row["undecided"];
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
		$n6 = $row[3];
		//end deision of winner
		//percentage decision
		if($figvoters!=0){
		$asp1 = ($row[1]/$figvoters) * 100;
		$asp2 = ($row[2]/$figvoters) * 100;
		$x6 = ($row[3]/$figvoters) * 100;
		}
		//end percentage
	    echo "<tr><td width='25%'> BOBOKUN NAMY </th><td width='25%'> ".$row[1]." </td><td width='25%'> ".number_format($asp1,2)."% </td></tr>";
	echo "<tr><td width='25%'> ERI IGBAGBO </td><td width='25%'> ".$row[2]." </td><td width='25%'> ".number_format($asp2,2)."% </td></tr>";
	
	}
	echo "</table>";echo "<div style='width:40%;background:#fff;border-radius:5px;border:1px solid #ccc;'>";
	echo "TOTAL NUMBER OF VOTE CASTED: ".$figvoters."<br>";
	echo "NULL/UNDECIDED VOTES: ".$n6."<br>";
	echo "PERCENTAGE OF NULL/UNDECIDED VOTES: ".number_format($x6,2)."% <br>";
	echo "SPORTS MINISTER-ELECT: ".$winner6."</div><br><br>";
####result for Social Director####
	echo "<div style='color:14284f;font-size:22px;font-family:calibri;' align='center'> SOCIAL DIRECTOR </div>";
	echo "<table width='75%' border=1 cellspacing='0' cellpadding='5' style='color:14284f'>";
	echo "<tr style='background:rgb(230,230,255);text-align:center;'><th width='25%'> ASPIRANTS </th><th width='25%'> VOTES </th><th width='25%'> PERCENTAGE </th></tr>";
	global $winner7,$n7,$x7;
	while($row = mysqli_fetch_array($query7)) {
		$figvoters = $row["aspirant1"] + $row["aspirant2"] + $row["undecided"];
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
		$n7 = $row[3];
		//end deision of winner
		//percentage decision
		if($figvoters!=0){
		$asp1 = ($row[1]/$figvoters) * 100;
		$asp2 = ($row[2]/$figvoters) * 100;
		$x7 = ($row[3]/$figvoters) * 100;
		}
		//end percentage
	    echo "<tr><td width='25%'> LOVE G.  </th><td width='25%'> ".$row[1]." </td><td width='25%'> ".number_format($asp1,2)."% </td></tr>";
	echo "<tr><td width='25%'> PAUL K. </td><td width='25%'> ".$row[2]." </td><td width='25%'> ".number_format($asp2,2)."% </td></tr>";
	
	}
	echo "</table>";echo "<div style='width:40%;background:#fff;border-radius:5px;border:1px solid #ccc;'>";
	echo "TOTAL NUMBER OF VOTE CASTED: ".$figvoters."<br>";
	echo "NULL/UNDECIDED VOTES: ".$n7."<br>";
	echo "PERCENTAGE OF NULL/UNDECIDED VOTES: ".number_format($x7,2)."% <br>";
	echo "SOCIAL DIRECTOR-ELECT: ".$winner7."</div><br><br>";
####result
####result for AGS####
	echo "<div style='color:14284f;font-size:22px;font-family:calibri;' align='center'> ASSISTANT GEN. SEC </div>";
	echo "<table width='75%' border=1 cellspacing='0' cellpadding='5' style='color:14284f'>";
	echo "<tr style='background:rgb(230,230,255);text-align:center;'><th width='25%'> ASPIRANTS </th><th width='25%'> VOTES </th><th width='25%'> PERCENTAGE </th></tr>";
	global $winner8,$n8,$x8;
	while($row = mysqli_fetch_array($query8)) {
		$figvoters = $row["aspirant1"] + $row["aspirant2"] + $row["undecided"];
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
		$n8 = $row[3];
		//end deision of winner
		//percentage decision
		if($figvoters!=0){
		$asp1 = ($row[1]/$figvoters) * 100;
		$asp2 = ($row[2]/$figvoters) * 100;
		$x8 = ($row[3]/$figvoters) * 100;
		}
		//end percentage
	    echo "<tr><td width='25%'> BOSS KAY  </th><td width='25%'> ".$row[1]." </td><td width='25%'> ".number_format($asp1,2)."% </td></tr>";
	echo "<tr><td width='25%'> LUIS WEST </td><td width='25%'> ".$row[2]." </td><td width='25%'> ".number_format($asp2,2)."% </td></tr>";
	
	}
	echo "</table>";
	echo "<div style='width:40%;background:#fff;border-radius:5px;border:1px solid #ccc;'>";
	echo "TOTAL NUMBER OF VOTE CASTED: ".$figvoters."<br>";
	echo "NULL/UNDECIDED VOTES: ".$n8."<br>";
	echo "PERCENTAGE OF NULL/UNDECIDED VOTES: ".number_format($x8,2)."% <br>";
	echo "ASSISTENT GEN.SEC-ELECT: ".$winner8."</div><br><br>";
####result 
####result for SRC####
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
	echo "</table>";
####result 
echo "</center>";
####end all results#####
include ("../../../close.php");
					?>					
                </div>
                </div>
				<div class='row' align='center' id="appr_div">
				<br>
				<strong>SIGN/APPROVE RESULT :</strong><br><input type='button' id='approve' value='DEMO 2015 ELECTIONS RESULTS APPROVAL BUTTON'/>
				</div>				
                <div class='signature' align="center"><br><br><hr>			
				<i><?php
				$msg = "This result is duly signed and approved by fcc - Demo electoral committee<br>".date('M-d, Y')."<br>";					
				echo $msg;
				?><img src='../images/ch-sign.jpg' alt='signature' />
				</i>
				</div>
			<br><br>
                <!-- /.row -->
				
			<br><br>
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /page-wrapper -->

    </div>
    <!-- /wrapper -->

    <!-- jQuery -->
    <script src="../js/jquery.js"></script>
	<script>
		$(document).ready(function(){
		$('#approve').click(function(){
				$('#appr_div').hide();
				$('.signature').show();
		});		
		});
	</script>
    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>
	

    <!-- Morris Charts JavaScript -->
    <script src="../js/plugins/morris/raphael.min.js"></script>
    <script src="../js/plugins/morris/morris.min.js"></script>
    <script src="../js/plugins/morris/morris-data.js"></script>

</body>

</html>
