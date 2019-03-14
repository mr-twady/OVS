<?php 
/** ######CHECK IF USER LOGGED IN###### 
//starting the session
session_start();
//checking if a log SESSION VARIABLE has been set
if( !isset($_SESSION['log']) || ($_SESSION['log'] != 'admin') ){
    //if the user is not allowed, display a message and a link to go back to login page
	echo "You cannot access this page without Logging In. ";
	echo "<a href='http:../../admin.php'>Click Here to Login</a>";
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
	header('location:../../admin.php');
	//i.e header('location:http://current server/dcalc/ovs/admin.php');
	exit();
}
?>
<?Php
if(isset($_POST['proceed'])) {
include ("../../conn.php");
	$psw = ($_POST['superkey']) ;
	//using md5() to encrypt password
	$pass = md5($psw);
	$query = mysqli_query($conn,"SELECT * FROM admin_s WHERE superkey='$pass'");
	$count = mysqli_num_rows($query);
	if($count == 1){
	session_start();
	$_SESSION['hlog'] = 'admin';
	header("location:crslt/c1.php");
	}else {
		$error = "An incorrect password was typed; Please, try again!";
	}
mysqli_close($conn);
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
	<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">

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
                   <li>
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
					<li class="active">
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
                            ELECTION RESULTS COLLATION PORTAL
                        </h1>                        
						<ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="main.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-fw fa-bar-chart-o"></i> Result Collation
                            </li>
                        </ol>
                    </div>
                </div>             
                <div class="row" id='results'>
				<div class="col-lg-12">
					<div class="table-responsive">				
						<center class="cltn_rs">
						<?php if(isset($error)){echo "<div id='error'>".$error."</div>";}?>
						<h3>Higher level of authentication is required to proceed</h3>
						<br>
						<form action="#" method="POST">
							<input required type="password" name="superkey" placeholder="Enter Super Admin Password Here and Click Proceed"/>										
							<input type="submit" value="PROCEED" name="proceed" />												
						</form>	
						</center>				
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
    <script src="js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
	

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>

</body>

</html>
*/
echo "This page has been deliberately //commented out//";
?>