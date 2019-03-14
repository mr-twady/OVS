<?php 
 ######CHECK IF USER LOGGED IN###### 
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
<!--#################################
code for Admin Password update
#####################################-->
<?Php
if(isset($_POST['admin_cr'])){
	$oldusername = $_POST['o_username'];
	$oldpass = $_POST['pass'];
	$oldp = md5($oldpass);
    $newusername = $_POST['n_username'];
	$newpass = $_POST['n_pwd1'];
	$hash_np=md5($newpass);
	include("../../conn.php");
	$qry = mysqli_query($conn,"SELECT * FROM admin WHERE username='$oldusername' AND password='$oldp'");
	$nm = mysqli_num_rows($qry);
	if($nm == 1){
		$query1 = mysqli_query($conn,"UPDATE admin SET username='$newusername',password='$hash_np' WHERE id='2'");
		if($query1){
		$mssg = "<div style='color:green;font-size:2.0em;'><br>Account Updated Successfully</div>";
		}
		else{
		$mssg = "<div style='color:#f00;'>A problem was encountered..Data was not saved!</div>";
		}
	}else{
		$mssg = "<div style='color:#00f'>Old Username/password typed is not recognized.</div>";
	}
	include ("../../close.php");
}
?>
<! DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>TOVS APP Admin Panel- Add/Register VOters</title>
	<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

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
                        <li class="divider"></li>
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
					<li class="active">
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
                            UPDATE ADMIN ACCOUNT
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="main.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> Change Password
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-6" >
						<span id="ii_nf">New Password should be at least 6 characters and maximum of 15 characters</span>
                        <form role="form" action='#' method='POST' onsubmit="return validatePass();">
                            <div class="form-group">
							<span><?php if(isset($mssg)){echo $mssg;}?></span>
							<br/>
                                <label>Type Old Username</label>
                                <input required type="text" class="form-control" placeholder="Enter Old Username" name='o_username' />                             
								<label>Type Old Password</label>
                                <input required type="password" class="form-control" placeholder="Enter Old Password" name='pass' />
								<label>Create New Username</label>
                                <input required type="text" class="form-control" placeholder="Enter Old Username" name='n_username' />                             
								<label>New Password</label>
                                <input required type="password" class="form-control" maxlength='15' onkeypress="validatePass1()" onkeyup="validatePass1()" placeholder="New Password" name='n_pwd1' id="np1"/>
								<label>Confirm Password</label>
                                <input required type="password" class="form-control" maxlength='15' onkeypress="validatePass2()" onkeyup="validatePass2()" placeholder="Confirm Password" name='n_pwd2' id="np2"/>
                            </div>							
                            <input type="submit" class="btn btn-default" name='admin_cr' value='SAVE ACCOUNT' />
                        </form>
					</div>
					<div class="col-lg-6">
						<div id='shw1'></div><br><br>
						<div id='shw2'></div>
					</div>	
										
                </div>
                <!-- /.row -->
				<br><br><br>
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /page-wrapper -->

    </div>
    <!-- /wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <script src="js/chngpass.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
