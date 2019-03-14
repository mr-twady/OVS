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
                    <li>
                        <a href="main.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
					<li>
                        <a href="chng_pwd.php"><i class="fa fa-fw fa-edit"></i> Change Password</a>
                    </li>
					<li class="active">
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
                            SUMMARY OF RESULTS
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i> Dashboard
                            </li>
							<li class="active">
                                <i class="fa fa-edit"></i> Summary of Results
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
				<br>
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="elections">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-user fa-5x" style="color:#600;"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php
										include("../../conn.php");
										$qry = mysqli_query($conn,"SELECT* FROM registered_voters");
										$num = mysqli_num_rows($qry);
										echo $num;
										include("../../close.php");
										?></div>
                                        <div>TOTAL NUMBER OF ELIGIBLE/REGISTERED VOTERS</div>
                                    </div>
                                </div>
                            </div>
                            <a>
                                <div class="panel-footer">
                                    <span class="pull-left"></span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="elections">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-user fa-5x" style="color:#060;"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php
										include("../../conn.php");
										$qry = mysqli_query($conn,"SELECT* FROM voternum");
										$num = mysqli_num_rows($qry);
										if($num!=0){
											while($row = mysqli_fetch_array($qry)){
											echo $row["counter"];
											}
										}
										include("../../close.php");
										?></div>
                                        <div>TOTAL NUMBER OF STUDENTS THAT VOTED</div>
                                    </div>
                                </div>
                            </div>
                            <a>
                                <div class="panel-footer">
                                    <span class="pull-left"></span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="elections">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-arrow-circle-right fa-5x" style="color:#005;text-shadow:2px 3px 5px #060;"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php
										include("../../conn.php");
										$qry1 = mysqli_query($conn,"SELECT* FROM registered_voters");										
										$qry2 = mysqli_query($conn,"SELECT* FROM voternum");
										$rnum = mysqli_num_rows($qry1);//registered voters
										$num = mysqli_num_rows($qry); 										
										$vnum;//people that voted
										if($num!=0){
											while($row = mysqli_fetch_array($qry2)){
											$vnum = $row["counter"];						
											}
										}
										$percntg = ($vnum/$rnum)*100;
										$res = number_format($percntg,1);
										echo $res."%";
										include("../../close.php");
										?></div>
                                        <div>PERCENTAGE OF STUDENTS THAT VOTED</div>
                                    </div>
                                </div>
                            </div>
                            <a>
                                <div class="panel-footer">
                                    <span class="pull-left"></span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
				</div>
				<div class="row"><br>
                    <div class="col-lg-4 col-md-6">
                        <div class="elections">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
									 <i><img src="images/nouser.png"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php
										include("../../conn.php");
										$qry1 = mysqli_query($conn,"SELECT* FROM registered_voters");										
										$qry2 = mysqli_query($conn,"SELECT* FROM voternum");
										$rnum = mysqli_num_rows($qry1);//registered voters
										$num = mysqli_num_rows($qry2); 										
											$vnum; //people that voted
											if($num!=0){
												while($row = mysqli_fetch_array($qry2)){
												$vnum = $row["counter"];						
												}
											}
										$didnotvote = $rnum-$vnum;
										echo $didnotvote;
										include("../../close.php");
										?></div>
                                        <div>TOTAL NUMBER OF STUDENTS THAT DID NOT VOTE</div>										
                                    </div>
                                </div>
                            </div>
                            <a>
                                <div class="panel-footer">
                                    <span class="pull-left"></span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
					<div class="col-lg-4 col-md-6">
                        <div class="elections">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
									 <i class="fa fa-arrow-circle-down fa-5x" style="color:#005;text-shadow:2px 3px 5px #600;"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php
										include("../../conn.php");
										$qry1 = mysqli_query($conn,"SELECT* FROM registered_voters");										
										$qry2 = mysqli_query($conn,"SELECT* FROM voternum");
										$rnum = mysqli_num_rows($qry1);//registered voters
										$num = mysqli_num_rows($qry2); 										
										$vnum; //people that voted
										if($num!=0){
											while($row = mysqli_fetch_array($qry2)){
											$vnum = $row["counter"];						
											}
										}
										$didnotvote = $rnum-$vnum;
										$prcnt = ($didnotvote/$rnum)*100;
										$res = number_format($prcnt,1);
										echo $res."%";
										include("../../close.php");
										?></div>
                                        <div>PERCENTAGE OF STUDENTS THAT DID NOT VOTE</div>
                                    </div>
                                </div>
                            </div>
                            <a>
                                <div class="panel-footer">
                                    <span class="pull-left"></span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div><div class="col-lg-4 col-md-6">
                        <div class="elections">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
									 <i class="fa fa-bar-chart-o fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"> </div>
                                        <div> </div>
                                    </div>
                                </div>
                            </div>
                            <a>
                                <div class="panel-footer">
                                    <span class="pull-left"></span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div> 
				<br>
				<div class="row" id="graph_stats">
                <iframe  src='graph1.php' scrolling='no'></iframe>																		  
                </div>

				
                </div>
                <!-- /.row -->
				<br>
				
				
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

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
