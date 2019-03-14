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
<?Php
if(isset($_POST["save_rec"])){
$pres1 = $_POST["tot1"];
$pres2 = $_POST["tot2"];
include("../../../conn.php");
$qry = mysqli_query($conn, "UPDATE c_ags SET aspirant1='$pres1',aspirant2='$pres2'");
if($qry){
header("location:viewc_result.php");;
}else{
$msg = "<div style='color:#f00;'>An error occured, pls try again</div>";
}
include("../../../close.php");
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
                <a class="navbar-brand" href="../main.php">TOVS APP Admin</a>
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
                            COLLATE RESULTS - Assistant  Gen.Sec
                        </h1>                        
						<ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="../main.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-fw fa-bar-chart-o"></i> Result Collation
                            </li>
                        </ol>
                    </div>
                </div>             
                <div class="row" id='results'>'
				<div class="col-lg-12">
					<div class="table-responsive">					
						<?php if(isset($msg)){echo $msg;}?>
						<form action="#" method="POST">
						<table class="table table-bordered table-hover">
						<thead></tr><th>ASPIRANTS</th><th>POLLLING UNIT1</th><th>POLLLING UNIT2</th><th>POLLLING UNIT3</th><th>POLLLING UNIT4</th><th>POLLLING UNIT5</th><th>TOTAL</th></tr></thead>
						<tbody>
						<tr><td>Boss Kay </td><td><input type="text" onkeyup="tot1.value=sum(parseFloat(ap11.value),parseFloat(ap12.value),parseFloat(ap13.value),parseFloat(ap14.value),parseFloat(ap15.value));" value="0" name="ap11" /></td><td><input type="text" onkeyup="tot1.value=sum(parseFloat(ap11.value),parseFloat(ap12.value),parseFloat(ap13.value),parseFloat(ap14.value),parseFloat(ap15.value));"  value="0" name="ap12" /></td><td><input type="text" onkeyup="tot1.value=sum(parseFloat(ap11.value),parseFloat(ap12.value),parseFloat(ap13.value),parseFloat(ap14.value),parseFloat(ap15.value));" value="0" name="ap13" /></td><td><input type="text" onkeyup="tot1.value=sum(parseFloat(ap11.value),parseFloat(ap12.value),parseFloat(ap13.value),parseFloat(ap14.value),parseFloat(ap15.value));" name="ap14" value="0"/></td><td><input type="text" onkeyup="tot1.value=sum(parseFloat(ap11.value),parseFloat(ap12.value),parseFloat(ap13.value),parseFloat(ap14.value),parseFloat(ap15.value));" name="ap15" value="0"/></td><td><input readonly type="text" name="tot1" value="0"/></td></tr>
						<tr><td>Luis West </td><td><input value="0" onkeyup="tot2.value=sum(parseFloat(ap21.value),parseFloat(ap22.value),parseFloat(ap23.value),parseFloat(ap24.value),parseFloat(ap25.value));" type="text" name="ap21" /></td><td><input type="text" onkeyup="tot2.value=sum(parseFloat(ap21.value),parseFloat(ap22.value),parseFloat(ap23.value),parseFloat(ap24.value),parseFloat(ap25.value));" value="0" name="ap22" /></td><td><input type="text" onkeyup="tot2.value=sum(parseFloat(ap21.value),parseFloat(ap22.value),parseFloat(ap23.value),parseFloat(ap24.value),parseFloat(ap25.value));" value="0" name="ap23" /></td><td><input type="text" onkeyup="tot2.value=sum(parseFloat(ap21.value),parseFloat(ap22.value),parseFloat(ap23.value),parseFloat(ap24.value),parseFloat(ap25.value));" value="0" name="ap24" /></td><td><input type="text" onkeyup="tot2.value=sum(parseFloat(ap21.value),parseFloat(ap22.value),parseFloat(ap23.value),parseFloat(ap24.value),parseFloat(ap25.value));" name="ap25" value="0"/></td><td><input type="text" name="tot2" value="0"/></td></tr>								
						</tbody>
						</table>
							<center>
							<span id='errmsg'></span>
							<br><br>
							<a href='c8.php'> <input type="BUTTON" value="PREVIOUS"/></a> <input type="submit" value="NEXT" name="save_rec" />
							</center>					
						</form>					
					</div>              
                </div>
                </div>
                <!-- /.row -->
				
			<br><br>
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /page-wrapper -->

    </div>
    <!-- /wrapper -->

    <!-- jQuery -->
	<script>
		function sum(n1,n2,n3,n4,n5) {
			return (n1+n2+n3+n4+n5);
		}
	</script>
    <script src="../js/jquery.js"></script>
	<script>
	$(document).ready(function () {
	  //called when key is pressed in textbox
	  $('.table-hover').keypress(function (e) {
		 //if the letter is not digit then display error and don't type anything
		 if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
			//display error message
			$("#errmsg").html("Digits Only").show().fadeOut("slow");
				   return false;
		}
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
