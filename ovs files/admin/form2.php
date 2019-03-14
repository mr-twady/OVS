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
code for add/register voters via form
#####################################-->
<?Php
if(isset($_POST["submitform"])){
$unm = $_POST['username'];
$fullname = $_POST['fullname'];
//hash username & store only the xters 5-11
$pass = md5($unm);
$displayedpass = "";
for($i=5; $i<11; $i++){
	$displayedpass .=$pass[$i];
}
//hash the 6 digit pin created above and store in $pin
$pin = md5($displayedpass);
include ("../../conn.php");
$qry = mysqli_query($conn,"SELECT* FROM public_param");
$doesitexist = "";
while($row = mysqli_fetch_array($qry)){
if($row['matric_no']==$unm){
	$doesitexist = "yes";
}
}
if($doesitexist != "yes"){
$query = mysqli_query($conn,"INSERT INTO public_param(matric_no) VALUES ('$unm')");
$query .= mysqli_query($conn,"INSERT INTO registered_voters(name,matric_no) VALUES ('$fullname','$unm')");
$query .= mysqli_query($conn,"INSERT INTO validpin(pin) VALUES ('$displayedpass')");
$query .= mysqli_query($conn,"INSERT INTO login_param(password) VALUES ('$pin')");
if($query){
$mssg = "<div style='color:green'>New login data was created succesfully!<br><b>USERNAME: </b><i>".$unm."</i><b> A VALID PIN: </b><i>".$displayedpass."</i></div>";
}
else{
$mssg = "<div style='color:#f00;'>A problem was encountered..Data was not saved!</div>";
}
}else{
$mssg = "<div style='color:#00f'>".$unm." couldn't be saved because it already exists in the DB!</div>";
}
include ("../../close.php");
}//end isset
?>
<!--#####################################
code for file upload registration
--#######################################-->
<?php
if(isset($_POST['submitviafile'])){
//begin file upload code
	$target_dir = "files/";
	$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	$uploadOk = 1;
	$docFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	// Check if a file is a actual chosen
	if($docFileType =="" || $docFileType==null) {
	   $uploadOk = 0;
	}
	// Check if file already exists
	if (file_exists($target_file)) {
		$uploadOk = 0;
	}
	// Check file size 500kb
	if ($_FILES["fileToUpload"]["size"] > 500000) {
		//"Sorry, your file is too large.";
		$uploadOk = 0;
	}
	// Allow certain file formats
	if($docFileType != "csv") {
		//"Sorry, only CSV files are allowed.";
		$uploadOk = 0;
	}
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
		$response = "<div style='color:#f00;'>Sorry, your file was not uploaded. Check if file is of supported format or has exceeded file size limit or perhaps rename your file.</div>";
	} 
	// if everything is OK, try to upload file & submit details inside file into DB
	else {
		if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
		$response = "<div style='color:green'>The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded successfully.</div>";
		//end of file upload(if +ve)
			
			//read from file and insert into DB
			$filepath = fopen("files/". basename( $_FILES["fileToUpload"]["name"])."","r");			
			while(!feof($filepath)){
			$add = fgetcsv($filepath);
			$unm = $add[0];
			$fullname = $add[1];
				//hash username & store only the xters 5 - 11
				$pass = md5($unm);
				$displayedpass = "";
				for($i=5; $i<11; $i++){
					$displayedpass .=$pass[$i];
				}
				//hash the 6 digit pin and store in $pin
				$pin = md5($displayedpass);
				include ("../../conn.php");
				$qry = mysqli_query($conn,"SELECT* FROM public_param");
			$doesitexist = "";
			while($row = mysqli_fetch_array($qry)){
			if($row['matric_no']==$unm){
				$doesitexist = "yes";
			}
			}
			if($doesitexist != "yes"){
			$query = mysqli_query($conn,"INSERT INTO public_param(matric_no) VALUES ('$unm')");
			$query .= mysqli_query($conn,"INSERT INTO registered_voters(name,matric_no) VALUES ('$fullname','$unm')");
			$query .= mysqli_query($conn,"INSERT INTO validpin(pin) VALUES ('$displayedpass')");
			$query .= mysqli_query($conn,"INSERT INTO login_param(password) VALUES ('$pin')");
			if($query){
			$mssg1 = "<div style='color:green'>And new login data were created successfully! Check DB for details</div>";
			}
			else{
			$mssg1 = "<div style='color:#f00;'>But a problem was encountered while saving data from file into the DB!</div>";
			}
			}else{
			$mssg1 = "<div style='color:#00f'>But data inside file couldn't be saved to the DB because one or more of the file content already exists in the DB!</div>";
			}
			include ("../../close.php");
			}			
			//end reading from file			
	} else {
        $response = "<div style='color:#f00'>Sorry, there was an error uploading your file.</div>";
		//end of file upload(if -ve)
    }
}// end processes if everything is OK (i.e. processes of file upload & submitting details inside file into DB)
}//end isset submitviafile
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
					<li>
                        <a href="chng_pwd.php"><i class="fa fa-fw fa-edit"></i> Change Password</a>
                    </li>
					<li>
                        <a href="res.php"><i class="fa fa-fw fa-edit"></i> Result's Summary</a>
                    </li>
                    <li>
                        <a href="electionresults.php"><i class="fa fa-fw fa-bar-chart-o"></i> View Election Results</a>
                    </li>
					
                  
                    <li class="active">
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
                            Add/Register Voters
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="main.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> Add/Register Voters
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-6" >

                        <form role="form" action='#' method='POST'>
                            <div class="form-group">
							<span><?php if(isset($mssg)){echo $mssg;}?></span>
							<br/>
                                <label>Voter's Username</label>
                                <input required class="form-control" placeholder="Enter a Voter's Matric Number" name='username' />
								<label>Voter's Full-Name</label>
                                <input required class="form-control" maxlength='75' placeholder="Enter a Voter's Full-Name Here" name='fullname' />
                            </div>							
                            <a href='form2.php'><button type="button" class="btn btn-default">New / Reset Form</button></a>
                            <input type="submit" class="btn btn-default" name='submitform' value='REGISTER VOTER' />
                        </form>
						<hr>
						<span><?php if(isset($response)){echo $response;}?></span>
						<span><?php if(isset($mssg1)){echo $mssg1;}?></span>
						
					<label><strong>OR IMPORT FILE </strong></label> (upload an excel file saved strictly as <b>.csv</b>; it should contain only 2 columns/fields)<br>Column 1: matric number of valid voters.<br>Column 2:list of Corresponding FULL NAME of data in Column 1 respectively<br>
                    Below is an illustration: <br> <img src='images/excelsamp.png' id='excel'/>
					<form action="#" method="post" enctype="multipart/form-data">
					Now, choose a file<input type='file'  required name="fileToUpload" id="fileToUpload"/>	<br>			
					<button type="submit" class="btn btn-default" name='submitviafile'>REGISTER VOTER(S)</button>
					</form>
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

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
