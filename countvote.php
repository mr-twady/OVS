<?Php
if(isset($_POST['v_done'])){
	//exco
	$pres = $_POST['pres'];
	$vpres = $_POST['vpres'];
	$gsec = $_POST['gsec'];
	$fsec = $_POST['fsec'];
	$trsr = $_POST['trsr'];
	$pro = $_POST['pro'];
	$spt = $_POST['sport'];
	$socdir = $_POST['sdir'];
	$ags = $_POST['ags'];
	//src
	$src1 = $_POST['src1'];
	$src2 = $_POST['src2'];
	$src3 = $_POST['src3'];
	$src4 = $_POST['src4'];
	$src5 = $_POST['src5'];
	$src6 = $_POST['src6'];
	include ("conn.php");
	$query = mysqli_query($conn,"SELECT* FROM pres");
	$query1 = mysqli_query($conn,"SELECT* FROM vpres");
	$query2 = mysqli_query($conn,"SELECT* FROM gsec");
	$query3 = mysqli_query($conn,"SELECT* FROM fsec");
	$query4 = mysqli_query($conn,"SELECT* FROM treasurer");
	$query5 = mysqli_query($conn,"SELECT* FROM pro");
	$query6 = mysqli_query($conn,"SELECT* FROM sportmin");
	$query7 = mysqli_query($conn,"SELECT* FROM sdir");
	$query8 = mysqli_query($conn,"SELECT* FROM ags");
	$query9 = mysqli_query($conn,"SELECT* FROM src_aspirants");

##### COUNT VOTE PRES #####
	while($row = mysqli_fetch_array($query)){
			if($pres=='josh'){
			$newVal4mrA = 1 + $row["aspirant1"];
				if($newVal4mrA){
				mysqli_query($conn, "UPDATE pres SET aspirant1 = '$newVal4mrA'");
				}
			}
			else if($pres=='bode'){
			$newVal4mrB = 1 + $row["aspirant2"];
				if($newVal4mrB){
				mysqli_query($conn, "UPDATE pres SET aspirant2 = '$newVal4mrB'");
				}
			}
			else{
				$newValU = 1 + $row["undecided"];
				if($newValU){
				mysqli_query($conn, "UPDATE pres SET undecided = '$newValU'");
				}
			}
	}//next $row or end while
/******END PRES********/
##### COUNT VOTE VPRES #####
	while($row = mysqli_fetch_array($query1)){
			if($vpres=='kemi'){
			$newVal4mrA = 1 + $row["aspirant1"];
				if($newVal4mrA){
				mysqli_query($conn, "UPDATE vpres SET aspirant1 = '$newVal4mrA'");
				}
			}
			else if($vpres=='tboy'){
			$newVal4mrB = 1 + $row["aspirant2"];
				if($newVal4mrB){
				mysqli_query($conn, "UPDATE vpres SET aspirant2 = '$newVal4mrB'");
				}
			}
			else{
				$newValU = 1 + $row["undecided"];
				if($newValU){
				mysqli_query($conn, "UPDATE vpres SET undecided = '$newValU'");
				}
			}
	}//next $row or end while
/******END VPRES********/
##### COUNT VOTE GSEC #####
	while($row = mysqli_fetch_array($query2)){
			if($gsec=='kay'){
			$newVal4mrA = 1 + $row["aspirant1"];
				if($newVal4mrA){
				mysqli_query($conn, "UPDATE gsec SET aspirant1 = '$newVal4mrA'");
				}
			}
			else if($gsec=='favour'){
			$newVal4mrB = 1 + $row["aspirant2"];
				if($newVal4mrB){
				mysqli_query($conn, "UPDATE gsec SET aspirant2 = '$newVal4mrB'");
				}
			}
			else{
				$newValU = 1 + $row["undecided"];
				if($newValU){
				mysqli_query($conn, "UPDATE gsec SET undecided = '$newValU'");
				}
			}
	}//next $row or end while
/******END GSEC********/
##### COUNT VOTE fsec #####
	while($row = mysqli_fetch_array($query3)){
			if($fsec=='prince'){
			$newVal4mrA = 1 + $row["aspirant1"];
				if($newVal4mrA){
				mysqli_query($conn, "UPDATE fsec SET aspirant1 = '$newVal4mrA'");
				}
			}
			else if($fsec=='dcalc'){
			$newVal4mrB = 1 + $row["aspirant2"];
				if($newVal4mrB){
				mysqli_query($conn, "UPDATE fsec SET aspirant2 = '$newVal4mrB'");
				}
			}
			else{
				$newValU = 1 + $row["undecided"];
				if($newValU){
				mysqli_query($conn, "UPDATE fsec SET undecided = '$newValU'");
				}
			}
	}//next $row or end while
/******END fsec********/
##### COUNT VOTE treasurer #####
	while($row = mysqli_fetch_array($query4)){
			if($trsr=='rrh'){
			$newVal4mrA = 1 + $row["aspirant1"];
				if($newVal4mrA){
				mysqli_query($conn, "UPDATE treasurer SET aspirant1 = '$newVal4mrA'");
				}
			}
			else if($trsr=='pl'){
			$newVal4mrB = 1 + $row["aspirant2"];
				if($newVal4mrB){
				mysqli_query($conn, "UPDATE treasurer SET aspirant2 = '$newVal4mrB'");
				}
			}
			else{
				$newValU = 1 + $row["undecided"];
				if($newValU){
				mysqli_query($conn, "UPDATE treasurer SET undecided = '$newValU'");
				}
			}
	}//next $row or end while
/******END treasurer********/
##### COUNT VOTE pro #####
	while($row = mysqli_fetch_array($query5)){
			if($pro=='femzy'){
			$newVal4mrA = 1 + $row["aspirant1"];
				if($newVal4mrA){
				mysqli_query($conn, "UPDATE pro SET aspirant1 = '$newVal4mrA'");
				}
			}
			else if($pro=='josiah'){
			$newVal4mrB = 1 + $row["aspirant2"];
				if($newVal4mrB){
				mysqli_query($conn, "UPDATE pro SET aspirant2 = '$newVal4mrB'");
				}
			}
			else{
				$newValU = 1 + $row["undecided"];
				if($newValU){
				mysqli_query($conn, "UPDATE pro SET undecided = '$newValU'");
				}
			}
	}//next $row or end while
/******END pro********/
##### COUNT VOTE sport min #####
	while($row = mysqli_fetch_array($query6)){
			if($spt=='bobokun'){
			$newVal4mrA = 1 + $row["aspirant1"];
				if($newVal4mrA){
				mysqli_query($conn, "UPDATE sportmin SET aspirant1 = '$newVal4mrA'");
				}
			}
			else if($spt=='eri'){
			$newVal4mrB = 1 + $row["aspirant2"];
				if($newVal4mrB){
				mysqli_query($conn, "UPDATE sportmin SET aspirant2 = '$newVal4mrB'");
				}
			}
			else{
				$newValU = 1 + $row["undecided"];
				if($newValU){
				mysqli_query($conn, "UPDATE sportmin SET undecided = '$newValU'");
				}
			}
	}//next $row or end while
/******END sport min********/
##### COUNT VOTE soc dir #####
	while($row = mysqli_fetch_array($query7)){
			if($socdir=='lg'){
			$newVal4mrA = 1 + $row["aspirant1"];
				if($newVal4mrA){
				mysqli_query($conn, "UPDATE sdir SET aspirant1 = '$newVal4mrA'");
				}
			}
			else if($socdir=='apostle'){
			$newVal4mrB = 1 + $row["aspirant2"];
				if($newVal4mrB){
				mysqli_query($conn, "UPDATE sdir SET aspirant2 = '$newVal4mrB'");
				}
			}
			else{
				$newValU = 1 + $row["undecided"];
				if($newValU){
				mysqli_query($conn, "UPDATE sdir SET undecided = '$newValU'");
				}
			}
	}//next $row or end while
/******END soc dir********/
##### COUNT VOTE ags #####
	while($row = mysqli_fetch_array($query8)){
			if($ags=='boss'){
			$newVal4mrA = 1 + $row["aspirant1"];
				if($newVal4mrA){
				mysqli_query($conn, "UPDATE ags SET aspirant1 = '$newVal4mrA'");
				}
			}
			else if($ags=='luis'){
			$newVal4mrB = 1 + $row["aspirant2"];
				if($newVal4mrB){
				mysqli_query($conn, "UPDATE ags SET aspirant2 = '$newVal4mrB'");
				}
			}
			else{
				$newValU = 1 + $row["undecided"];
				if($newValU){
				mysqli_query($conn, "UPDATE ags SET undecided = '$newValU'");
				}
			}
	}//next $row or end while
/******END ags********/
##### COUNT VOTE FOR SRC ASPIRANTS #####
/**
	while($row = mysqli_fetch_array($query9)){
			if($src1=='paulo'){
			$newVal4mrA = 1 + $row["aspirant1"];
				if($newVal4mrA){
				mysqli_query($conn, "UPDATE src_aspirants SET aspirant1 = '$newVal4mrA'");
				}
			}
			if($src2=='igbagbo'){
			$newVal4mrB = 1 + $row["aspirant2"];
				if($newVal4mrB){
				mysqli_query($conn, "UPDATE src_aspirants SET aspirant2 = '$newVal4mrB'");
				}
			}
			if($src3=='igw_m'){
			$newVal4mrC = 1 + $row["aspirant3"];
				if($newVal4mrC){
				mysqli_query($conn, "UPDATE src_aspirants SET aspirant3 = '$newVal4mrC'");
				}
			}
			if($src4=='hykay'){
			$newVal4mrD = 1 + $row["aspirant4"];
				if($newVal4mrD){
				mysqli_query($conn, "UPDATE src_aspirants SET aspirant4 = '$newVal4mrD'");
				}
			}
			if($src5=='kjs'){
			$newVal4mrE = 1 + $row["aspirant5"];
				if($newVal4mrE){
				mysqli_query($conn, "UPDATE src_aspirants SET aspirant5 = '$newVal4mrE'");
				}
			}
			if($src6=='kemorji'){
			$newVal4mrF = 1 + $row["aspirant6"];
				if($newVal4mrF){
				mysqli_query($conn, "UPDATE src_aspirants SET aspirant6 = '$newVal4mrF'");
				}
			}
	}//next $row or end while
	*/
/******END SRC ASPIRANTS********/

		####update number of voters####
		/*At first, this section was placed at the index page immediately a user logs in,  but the
		thought that something could go wrong after loggin in... So ideally voter number should be updated only
		after voter submits his/her votes*/
		$qry = mysqli_query($conn,"SELECT * FROM voternum");
			while($row = mysqli_fetch_array($qry)){
					$sum = 1 + $row["counter"];
					mysqli_query($conn,"UPDATE voternum SET counter ='$sum'");
			}
		####end update number of voters###

#########  DESTROY SESSION  ##############
	####################################
	session_destroy();
	//then redirect to comp page
	header("location:comp.php");
#########  END DESTROY SESSION  ##############
include ("close.php");
	
}
?>