<?php 
##########  CHECK IF USER LOGGED IN  ##############
//starting the session
session_start();
//checking if a log SESSION VARIABLE has been set
if( !isset($_SESSION['log']) || ($_SESSION['log'] != 'in') ){
    //if the user is not allowed, display a message and a link to go back to login page
	echo "You must first login  to access this page. <a href='index.php'>Go back to login page</a>";
    //this aborts the script
	exit();
}
?>
<?Php include("countvote.php");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Welcome to DEMO <?php echo date('Y')?> e-Voting Poll</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
<link rel="stylesheet" href="js/jquery-ui.css" type="text/css" />
<link href="style.css" rel="stylesheet" type="text/css" />
</head>
<body onload="">
<div class="main">
  <div class="voting_header">
  </div>
  <div class="body_resize">
    <div class="body">
    <h3 id="top">Welcome to DEMO <?php echo date('Y')?> Elections <br />
      <span>e-VOTING POLL: DECIDE YOUR NEXT EXCOS HERE!</span></h3>
	  <br>
	<div align='center' class='panel'><h3>Presidential Aspirant(s)</h3></div>
	<div align='center' class='panel1'><h3>Vice-Presidential Aspirant(s)</h3></div> 
	<div align='center' class='panel2'><h3>Gen.Sec Aspirant(s)</h3></div>
	<div align='center' class='panel3'><h3>Fin.Sec Aspirant(s)</h3></div> 
	<div align='center' class='panel4'><h3>Treasurer Aspirant(s)</h3></div> 
	<div align='center' class='panel5'><h3>P.R.O Aspirant(s)</h3></div> 
	<div align='center' class='panel6'><h3>Sport Director Aspirant(s)</h3></div>
	<div align='center' class='panel7'><h3>Social Minister Aspirant(s)</h3></div> 
	<div align='center' class='panel8'><h3>Assistant Gen.Sec Aspirant(s)</h3></div> 
	<div align='center' class='panel_src'><h3>Student Representative Council Aspirants</h3></div>

<div class="port">
<!-- ui-dialog instructions-->
<div id="instructions">
	<center><h1>PLEASE CAREFULLY READ THE FOLLOWING INSTRUCTIONS BEFORE YOU PROCEED</h1></center>
	<ol>
	<li>Please note that you CANNOT carry out this voting exercise more than once.</li><br>
	<li>To vote, tick the appropriate <label id='rd'>"<input type='radio'> BUTTON"</label> of your choice-candidate and click on the <label id='rd'>"OK BUTTON"</label> (the <label id='rd'>"<< BUTTON"</label> implies previous/back).</li><br>
	<li>If you decide not to vote any candidate for a particular post, please do tick the button in box labelled <label id='rd'>UNDECIDED/SKIP</label></li><br>
	<li>Peradventure you encounter any problem/trouble while using this system, don't hesitate to call the attention of an electoral agent.</li>
	<br><i>Thanks</i>.
	<center><button id='proceed'>PROCEED</button></center>
</div><br>
<br><br>
<!--Display Candidates-->
<div id='candidates'>
<form action='#' method='post' name='aspirantform' onsubmit='return validateForm()'>
	<fieldset id='border_candidates'>
	<!--###########################################################-->
	<!--Display All Presidential Candidates-->
		<div id='presidents' class='panel'>
		<table width='100%' id='sh_candidates'>
			<tr>
				<td width='25%'><img src='./ovs files/candidates/dun.jpg' alt='picsChange#14'/></td>
				<td width='25%'><!--aspirant1-->Name: Olusanmi Joshua <br>
					Alias: Change #14<br>
					Vying for: DEMO president<br>
					Vote: <input type='radio' name='pres' value='josh' />
				</td>
				<td width='25%'><img src='./ovs files/candidates/bode.jpeg' alt='PapaX'/></td>
				<td width='25%'><!--aspirant2-->Name: Adetula Bode <br>
					Alias: PapaX<br>
					Vying for: DEMO president<br>
					Vote: <input type='radio' name='pres' value='bode' />
				</td>
			</tr>			
		</table>
		<!--OK/skip[--><br><br>
			<div align='center'><p id='red' class='skip'>UNDECIDED / SKIP <br><input type='radio' name='pres' id='boxundecided'/></p></div><br><br>
			<div align='center'><input class='close' id='okay' type='button' value='OK' title='Next'/></div>
		<!--]-->
		</div>
	<!--End Display Of All Presidential Candidates--> 
	<!--###########################################################-->
	<!--###########################################################-->
	<!--Display Of All VP Candidates-->
	<div id='vps' class='panel1'>
			
		<table  width='100%' id='sh_candidates'>
			<tr>
				<td width='25%'><img src='./ovs files/candidates/sg.jpg' alt='picsChange#14'/></td>
				<td width='25%'><!--aspirant1-->Name: Olusanya Kemi <br>
					Alias: #TagSuprise <br>
					Vying for: DEMO vice-president<br>
					Vote: <input type='radio' name='vpres' value='kemi' />
				</td>
				<td width='25%'><img src='./ovs files/candidates/sey.jpeg' alt='PapaX'/></td>
				<td width='25%'><!--aspirant2-->
					Name: Emmanuel Seun T. <br>
					Alias: T BOY<br>
					Vying for: DEMO vice-president<br>
					Vote: <input type='radio' name='vpres' value='tboy' />
				</td>
			</tr>
		</table>
		<!--OK/skip[--><br><br>
			<div align='center'><p id='red' class='skip'>UNDECIDED / SKIP <br><input type='radio' name='vpres' id='boxundecided'/></p></div><br><br>
			<div align='center'><input class='p' id='okay' type='button' value='<<' title='Previous'/> <input class='close1' id='okay' type='button' value='OK' title='Next'/></div>
		<!--]-->		
	</div>
	<!--End Display Of All VPS CANDIDATES-->
	<!--###########################################################-->
	<!--###########################################################-->
	<!--Display Of All Gen. Sec Candidates-->
	<div id='gensec' class='panel2'>
		<table  width='100%' id='sh_candidates'>
			<tr>
				<td width='25%'><img src='./ovs files/candidates/dav.jpg' alt='picsChange#14'/></td>
				<td width='25%'><!--aspirant1-->Name: Oluwaranmiwa Kay<br>
					Alias: #Transformation *<br>
					Vying for: DEMO General Secretary<br>
					Vote: <input type='radio' name='gsec' value='kay' />
				</td>
				<td width='25%'><img src='./ovs files/candidates/g.jpeg' alt='PapaX'/></td>
				<td width='25%'><!--aspirant2-->
					Name: Gwawani Favour <br>
					Alias: FLOW ON<br>
					Vying for: DEMO General Secretary<br>
					Vote: <input type='radio' name='gsec' value='favour' />
				</td>
			</tr>
		</table>
			<!--OK/skip[--><br><br>
			<div align='center'><p id='red' class='skip'>UNDECIDED / SKIP <br><input type='radio' name='gsec' id='boxundecided'/></p></div><br><br>
			<div align='center'><input class='p1' id='okay' type='button' value='<<' title='Previous'/> <input class='close2' id='okay' type='button' value='OK' title='Next'/></div>
		<!--]-->		
	</div>
	<!--End Display Gen. Sec--> 
	<!--###########################################################-->
	<!--###########################################################-->
	<!--Display Of All Fin.Sec Candidates-->	
	<div id='finsec' class='panel3'>
		<table  width='100%' id='sh_candidates'>
			<tr>
				<td width='25%'><img src='./ovs files/candidates/img.jpeg' alt='picsChange#14'/></td>
				<td width='25%'><!--aspirant1-->Name: King Prince <br>
					Alias: #Re-Formation <br>
					Vying for: DEMO Financial Secretary<br>
					Vote: <input type='radio' name='fsec' value='prince' />
				</td>
				<td width='25%'><img src='./ovs files/candidates/tayo.jpg' alt='PapaX'/></td>
				<td width='25%'><!--aspirant2-->
					Name: Dunsin Tayo<br>
					Alias: Saying Yes<br>
					Vying for: DEMO Financial Secretary<br>
					Vote: <input type='radio' name='fsec' value='dcalc' />
				</td>
			</tr>
		</table>
		<!--OK/skip[--><br><br>
			<div align='center'><p id='red' class='skip'>UNDECIDED / SKIP <br><input type='radio' name='fsec' id='boxundecided'/></p></div><br><br>
			<div align='center'><input class='p2' id='okay' type='button' value='<<' title='Previous'/> <input class='close3' id='okay' type='button' value='OK' title='Next'/></div>
		<!--]-->
	</div>
	<!--End display Fin. Sec-->
	<!--###########################################################-->
	<!--###########################################################-->
	<!--Display Treasurer-->
	<div id='trsr' class='panel4'>
		<table  width='100%' id='sh_candidates'>
			<tr>
			<td width='25%'><img src='./ovs files/candidates/dv.jpg' alt='picsChange#14'/></td>
				<td width='25%'><!--aspirant1-->Name: Richard H. <br>
					Alias: Rich & Holy<br>
					Vying for: DEMO Treasurer<br>
					Vote: <input type='radio' name='trsr' value='rrh' />
				</td>
				<td width='25%'><img src='./ovs files/candidates/oof.jpeg' alt='PapaX'/></td>
				<td width='25%'><!--aspirant2-->
					Name: Peter Lahm<br>
					Alias: Make Anew<br>
					Vying for: DEMO Treasurer<br>
					Vote: <input type='radio' name='trsr' value='pl' />
				</td>
			</tr>
		</table>
		<!--OK/skip[--><br><br>
			<div align='center'><p id='red' class='skip'>UNDECIDED / SKIP <br><input type='radio' name='trsr' id='boxundecided'/></p></div><br><br>
			<div align='center'><input class='p3' id='okay' type='button' value='<<' title='Previous'/> <input class='close4' id='okay' type='button' value='OK' title='Next'/></div>
		<!--]-->
	</div>
	<!--End Display Treasurer-->
	<!--###########################################################-->
	<!--###########################################################--> 
	<!--Display P.R.O--> 
	<div id='pro' class='panel5'>
		<table  width='100%' id='sh_candidates'>
			<tr>
				<td width='25%'><img src='./ovs files/candidates/p2.jpeg' alt='picsChange#14'/></td>
				<td width='25%'><!--aspirant1-->Name: Bello Olufemi <br>
					Alias: Femzy<br>
					Vying for: DEMO P.R.O<br>
					Vote: <input type='radio' name='pro' value='femzy' />
				</td>
				<td width=2></td>
				<td width='25%'><img src='./ovs files/candidates/p1.jpg' alt='PapaX'/></td>
				<td width='25%'><!--aspirant2-->
					Name: Olusanmi Josiah <br>
					Alias: Joshuur<br>
					Vying for: DEMO P.R.O<br>
					Vote: <input type='radio' name='pro' value='josiah' />
				</td>
			</tr>
		</table>
		<!--OK/skip[--><br><br>
			<div align='center'><p id='red' class='skip'>UNDECIDED / SKIP <br><input type='radio' name='pro' id='boxundecided'/></p></div><br><br>
			<div align='center'><input class='p4' id='okay' type='button' value='<<' title='Previous'/> <input class='close5' id='okay' type='button' value='OK' title='Next'/></div>
		<!--]-->
	</div>
	<!--End Display P.R.O--> 
	<!--###########################################################-->
	<!--###########################################################-->
	<!--Display Of Sport Minister--> 
	<div id='sport' class='panel6'>
		<table  width='100%' id='sh_candidates'>
			<tr>
				<td width='25%'><img src='./ovs files/candidates/i1.jpeg' alt='picsChange#14'/></td>
				<td width='25%'><!--aspirant1-->Name: Bobokun Namy <br>
					Alias: #Achiever <br>
					Vying for: DEMO Sport Director<br>
					Vote: <input type='radio' name='sport' value='bobokun' />
				</td>
				<td width='25%'><img src='./ovs files/candidates/i2.jpg' alt='PapaX'/></td>
				<td width='25%'><!--aspirant2-->
					Name: Eri Igbagbo<br>
					Alias: Agbaboolu<br>
					Vying for: DEMO Sport Director<br>
					Vote: <input type='radio' name='sport' value='eri' />
				</td>
			</tr>
		</table>
		<!--OK/skip[--><br><br>
			<div align='center'><p id='red' class='skip'>UNDECIDED / SKIP <br><input type='radio' name='sport' id='boxundecided'/></p></div><br><br>
			<div align='center'><input class='p5' id='okay' type='button' value='<<' title='Previous'/> <input class='close6' id='okay' type='button' value='OK' title='Next'/></div>
		<!--]-->
	</div>
	<!--End Display Sport Minister--> 
	<!--###########################################################-->
	<!--###########################################################-->
	<!--Display Of All Social Director Candidates--> 
	<div id='sdir' class='panel7'>
		<table  width='100%' id='sh_candidates'>
			<tr>
				<td width='25%'><img src='./ovs files/candidates/m1.jpg' alt='picsChange#14'/></td>
				<td width='25%'><!--aspirant1-->Name: Love G.<br>
					Alias: G.Y<br>
					Vying for: DEMO Social Director<br>
					Vote: <input type='radio' name='sdir' value='lg' />
				</td>
				<td width='25%'><img src='./ovs files/candidates/m2.jpg' alt='PapaX'/></td>
				<td width='25%'><!--aspirant2-->
					Name: Paul K.<br>
					Alias: Krish-P<br>
					Vying for: DEMO Social Director<br>
					Vote: <input type='radio' name='sdir' value='apostle' />
				</td>
			</tr>			
		</table>
		<!--OK/skip[--><br><br>
			<div align='center'><p id='red' class='skip'>UNDECIDED / SKIP <br><input type='radio' name='sdir' id='boxundecided'/></p></div><br><br>
			<div align='center'><input class='p6' id='okay' type='button' value='<<' title='Previous'/> <input class='close7' id='okay' type='button' value='OK' title='Next'/></div>
		<!--]-->
	</div>
	<!--End Social Director Display-->
	<!--###########################################################-->
	<!--###########################################################-->
	<!--Display Of All Assistant Gen. Sec Candidates-->
	<div id='a_gensec' class='panel8'>
		<table  width='100%' id='sh_candidates'>
			<tr>
				<td width='25%'><img src='./ovs files/candidates/f.jpg' alt='picsChange#14'/></td>
				<td width='25%'><!--aspirant1-->Name: Boss Kay<br>
					Alias: Light*<br>
					Vying for: DEMO Assistant General Secretary<br>
					Vote: <input type='radio' name='ags' value='boss' />
				</td>
				<td width='25%'><img src='./ovs files/candidates/ccc.jpg' alt='PapaX'/></td>
				<td width='25%'><!--aspirant2-->
					Name: Luis West <br>
					Alias: MOVE ON<br>
					Vying for: DEMO Assistant General Secretary<br>
					Vote: <input type='radio' name='ags' value='luis' />
				</td>
			</tr>
		</table>
			<!--OK/skip[--><br><br>
			<div align='center'><p id='red' class='skip'>UNDECIDED / SKIP <br><input type='radio' name='ags' id='boxundecided'/></p></div><br><br>
			<div align='center'><input class='p7' id='okay' type='button' value='<<' title='Previous'/> <input class='close8' id='okay' type='button' value='OK' title='Next'/></div>
		<!--]-->		
	</div>
	<!--End Display Assistant Gen. Sec--> 
	<!--###########################################################-->
	<!--Display SRC Aspirants-->
	<div id='asp_src' class='panel_src'>
		<br>
		<div align="center" id="n_red">
		Select your most-preferred 4.<br>
		<input id="h_checked_h" type="checkbox" name='src1' value="h_checked_h1" checked />
		<input id="h_checked_h" type="checkbox" name='src2' value="h_checked_h2" checked />
		<input id="h_checked_h" type="checkbox" name='src3' value="h_checked_h3" checked />
		<input id="h_checked_h" type="checkbox" name='src4' value="h_checked_h4" checked />
		<input id="h_checked_h" type="checkbox" name='src5' value="h_checked_h5" checked />
		<input id="h_checked_h" type="checkbox" name='src6' value="h_checked_h6" checked /><br>
		<input class='p8' id='okay' type='button' value='<<' title='Previous'/> <input class='close9' id='okay' type='button' value='OK' title='Next'/>
		</div><br>
		<table  width='100%' id='sh_candidates'>
			<tr>
				<td width='25%'><img src='./ovs files/src/f.png' alt='picsChange#14'/></td>
				<td width='25%'><!--aspirant1-->Name: Olumide Paul<br>
					Alias: Paulo<br>
					Vying for: SRC Member<br>
					Vote: <input type='checkbox' name='src1' value='paulo' />
				</td>
				<td width='25%'><img src='./ovs files/src/ccc.png' alt='PapaX'/></td>
				<td width='25%'><!--aspirant2-->
					Name: Igbagbo Dunsin <br>
					Alias: Twady<br>
					Vying for: SRC Member<br>
					Vote: <input type='checkbox' name='src2' value='igbagbo' />
				</td>
			</tr>
			<tr>
				<td width='25%'><img src='./ovs files/src/f.png' alt='picsChange#14'/></td>
				<td width='25%'><!--aspirant1-->Name: Igwe Madiwuke<br>
					Alias: IMD<br>
					Vying for: SRC Member<br>
					Vote: <input type='checkbox' name='src3' value='igw_m' />
				</td>
				<td width='25%'><img src='./ovs files/src/ccc.png' alt='PapaX'/></td>
				<td width='25%'><!--aspirant2-->
					Name: Ikuyajolu Dennis <br>
					Alias: Hykay D<br>
					Vying for: SRC Member<br>
					Vote: <input type='checkbox' name='src4' value='hykay' />
				</td>
			</tr>
			<tr>
				<td width='25%'><img src='./ovs files/src/f.png' alt='picsChange#14'/></td>
				<td width='25%'><!--aspirant1-->Name: Kenneth James<br>
					Alias: #Charging<br>
					Vying for: SRC Member<br>
					Vote: <input type='checkbox' name='src5' value='kjs' />
				</td>
				<td width='25%'><img src='./ovs files/src/ccc.png' alt='PapaX'/></td>
				<td width='25%'><!--aspirant2-->
					Name: Kemi Orji<br>
					Alias: Kemorji<br>
					Vying for: SRC Member<br>
					Vote: <input type='checkbox' name='src6' value='kemorji' />
				</td>
			</tr>
		</table>
			<!--OK/skip[--><br><br>
			<div align='center'><input class='p8' id='okay' type='button' value='<<' title='Previous'/> <input class='close9' id='okay' type='button' value='OK' title='Next'/></div>
		<!--]-->		
	</div>
	<!--###########################################################-->
	<!--SUBMIT-->
	<div class='submit_votes'>
		<div align='center' id='final_submit'>
			<h3>You Are Almost Done</h3><br>
			<input type='button' id='rvw' onclick='reviewvotes()' value="CLICK HERE TO REVIEW YOUR VOTE(S) BEFORE FINAL SUBMISSION" />
			<br><br><br><br><input class='p9' id='okay' type='button' value='<<' title='Previous or Go back'/> <input name='v_done' id='submitbutton' type='submit' value="CLICK HERE TO SUBMIT YOUR VOTE(S)" title="I've finished voting, submit my votes"/>
		</div>
	</div>
	<!--End Submit-->
	<!--###########################################################-->
	<!--###########################################################-->
	</fieldset>
</form>
</div>
</div>
<div class="clr"></div>
</div>
<div class="clr"></div>
</div>
</div>


<script type="text/javascript" src="js/jquery-1.11.1.js"></script>
<script type="text/javascript" src="js/jquery-ui.js"></script>
<script type="text/javascript" src="js/isradioempty.js"></script>
<script>
//CODE FOR NAV FROM ONE POST TO ANOTHER
$(document).ready(function(){
	$("#proceed").click(function(){  
	$("#instructions").hide("fast");
	$("#top").hide("fast");
	$(".panel").show("fast");
	});
	//button OK acting for Next 
	$(".close").click(function(){  
	$(".panel").hide("fast");
	$(".panel1").show("fast");
	});
	$(".close1").click(function(){
	$(".panel1").hide("fast");
	$(".panel2").show("fast");
	});    
	$(".close2").click(function(){
	$(".panel2").hide("fast");
	$(".panel3").show("fast");
	});
	$(".close3").click(function(){
	$(".panel3").hide("fast");
	$(".panel4").show("fast");
	});
	$(".close4").click(function(){
	$(".panel4").hide("fast");
	$(".panel5").show("fast");
	});
	$(".close5").click(function(){
	$(".panel5").hide("fast");
	$(".panel6").show("fast");
	});
	$(".close6").click(function(){
	$(".panel6").hide("fast");
	$(".panel7").show("fast");
	});
	$(".close7").click(function(){
	$(".panel7").hide("fast");
	$(".panel8").show("fast");
	});
	$(".close8").click(function(){
	$(".panel8").hide("fast");
	$(".panel_src").show("fast");
	});
	$(".close9").click(function(){
	$(".panel8").hide("fast");
	$(".panel_src").show("fast");
	});
	$(".close9").click(function(){
	$(".panel_src").hide("fast");
	$(".submit_votes").show("fast");
	});
	//end Next button
	//button << acting for Previous 
	$(".p").click(function(){
	$(".panel1").hide("fast");
	$(".panel").show("fast");
	});    
	$(".p1").click(function(){
	$(".panel2").hide("fast");
	$(".panel1").show("fast");
	});
	$(".p2").click(function(){
	$(".panel3").hide("fast");
	$(".panel2").show("fast");
	});
	$(".p3").click(function(){
	$(".panel4").hide("fast");
	$(".panel3").show("fast");
	});
	$(".p4").click(function(){
	$(".panel5").hide("fast");
	$(".panel4").show("fast");
	});
	$(".p5").click(function(){
	$(".panel6").hide("fast");
	$(".panel5").show("fast");
	});
	$(".p6").click(function(){
	$(".panel7").hide("fast");
	$(".panel6").show("fast");
	});
	$(".p7").click(function(){
	$(".panel8").hide("fast");
	$(".panel7").show("fast");
	});
	$(".p8").click(function(){
	$(".panel_src").hide("fast");
	$(".panel8").show("fast");
	});
	$(".p9").click(function(){
	$(".submit_votes").hide("fast");
	$(".panel_src").show("fast");
	});
	
	});
</script>
<script>
//CODE TO CHECK IF MAXIMUM NUMBER OF SRC MEMBERS HAS BEEN SELECTED
$(document).ready(function() {
	$("input[type='checkbox']").change(function(){
		var maxAllowed = 10;
		var cnt = $("input[type='checkbox']:checked").length;
		if((cnt > maxAllowed)){
		$(this).prop("checked","");
		alert('Select 4 Aspirants Only!');
		}
	});	
});
</script>
<script>
//#############################
//CODE TO REVIEW ALL VOTES
//#############################
function reviewvotes(){
var pres=document.forms["aspirantform"]["pres"].value;
var vpres=document.forms["aspirantform"]["vpres"].value;
var gsec=document.forms["aspirantform"]["gsec"].value;
var fsec=document.forms["aspirantform"]["fsec"].value;
var trsr=document.forms["aspirantform"]["trsr"].value;
var pro=document.forms["aspirantform"]["pro"].value;
var sport=document.forms["aspirantform"]["sport"].value;
var sdir=document.forms["aspirantform"]["sdir"].value;
var ags=document.forms["aspirantform"]["ags"].value;
var asp = new Array();    var src_asp = new Array(); 
var blank="------------------------------------------------------------\n";
//#########################
//EXECUTIVES
//########################
//president#####################
if(pres=="josh"){
asp[0]= "1. PRESIDENTIAL ASPIRANT: Olusanmi Joshua\n";
}
else if(pres=="bode"){
asp[0]= "1. PRESIDENTIAL ASPIRANT: Adetula Bode\n";
}
else{
asp[0]= "1. PRESIDENTIAL ASPIRANT: Undecided or Skip \n";
}
//vice president################
if(vpres=="kemi"){
asp[1]= "2. VICE-PRESIDENT ASPIRANT: Olusanya Kemi\n";
}
else if(vpres=="tboy"){
asp[1]= "2. VICE-PRESIDENT ASPIRANT: Emmanuel Seun T.\n";
}
else{
asp[1]= "2. VICE-PRESIDENT ASPIRANT:Undecided or Skip \n";
}
//gen sec.####################
if(gsec=="kay"){
asp[2]= "3. GEN-SEC ASPIRANT: Oluwaranmiwa Kay\n";
}
else if(gsec=="favour"){
asp[2]= "3. GEN-SEC ASPIRANT: Gwawani Favour\n";
}
else{
asp[2]= "3. GEN-SEC ASPIRANT: Undecided or Skip \n";
}
//fin sec.####################
if(fsec=="prince"){
asp[3]= "4. FIN-SEC ASPIRANT: King Prince\n";
}
else if(fsec=="dcalc"){
asp[3]= "4. FIN-SEC ASPIRANT: Dunsin Tayo\n";
}
else{
asp[3]= "4. FIN-SEC ASPIRANT: Undecided or Skip \n";
}
//treasurer####################
if(trsr=="rrh"){
asp[4]= "5. TREASURER ASPIRANT: Richard H.\n";
}
else if(trsr=="pl"){
asp[4]= "5. TREASURER ASPIRANT: Peter Lahm\n";
}
else{
asp[4]= "5. TREASURER ASPIRANT: Undecided or Skip \n";
}
//P.R.O####################
if(pro=="femzy"){
asp[5]= "6. P.R.O ASPIRANT: Bello Olufemi\n";
}
else if(pro=="josiah"){
asp[5]= "6. P.R.O ASPIRANT: Olusanmi Josiah\n";
}
else{
asp[5]= "6. P.R.O ASPIRANT: Undecided or Skip \n";
}
//SPORT####################
if(sport=="bobokun"){
asp[6]= "7. SPORT ASPIRANT: Bobokun Namy\n";
}
else if(sport=="eri"){
asp[6]= "7. SPORT ASPIRANT: Eri Igbagbo\n";
}
else{
asp[6]= "7. SPORT ASPIRANT: Undecided or Skip \n";
}
//SOCIAL DIRECTOR####################
if(sdir=="lg"){
asp[7]= "8. SOCIAL DIRECTOR ASPIRANT: Love G.\n";
}
else if(sdir=="apostle"){
asp[7]= "8. SOCIAL DIRECTOR ASPIRANT: Paul K.\n";
}
else{
asp[7]= "8. SOCIAL DIRECTOR ASPIRANT: Undecided or Skip \n";
}
//ASSISTANT GEN. SEC DIRECTOR
if(ags=="boss"){
asp[8]= "9. ASSISTANT GEN. SEC: Boss Kay.\n";
}
else if(ags=="luis"){
asp[8]= "9. ASSISTANT GEN. SEC: Luis West.\n";
}
else{
asp[8]= "9. ASSISTANT GEN. SEC: Undecided or Skip \n";
}
//##############################
//##############################
//check for selected SRC members
//##############################
//##############################
src_asp[1] = src_asp[2] = src_asp[3] = src_asp[4] = src_asp[5] = src_asp[6] = "";
if(document.forms["aspirantform"]["src1"][1].checked){
src_asp[1]="- Olumide Paul \n";
}
if(document.forms["aspirantform"]["src2"][1].checked){
src_asp[2]=" - Igbagbo Dunsin\n";
}
if(document.forms["aspirantform"]["src3"][1].checked){
src_asp[3]=" - Igwe Madiwuke\n";
}
if(document.forms["aspirantform"]["src4"][1].checked){
src_asp[4]=" - Ikuyajolu Dennis\n";
}
if(document.forms["aspirantform"]["src5"][1].checked){
src_asp[5]=" - Kenneth James \n";
}
if(document.forms["aspirantform"]["src6"][1].checked){
src_asp[6]=" - Kemi Orji\n";
}
//##########################################
//##########################################
//Response of form user field
alert("HAVE A LOOK AT THE PEOPLE YOU VOTED\n"+blank+"\n"+"EXECUTIVES:\n"+asp[0]+""+asp[1]+""+asp[2]+""+asp[3]+""+asp[4]+""+asp[5]+""+asp[6]+""+asp[7]+""+asp[8]+"\nSRC MEMBERS:\n"+src_asp[1]+""+src_asp[2]+""+src_asp[3]+""+src_asp[4]+""+src_asp[5]+""+src_asp[6]);
//##########################################
//##########################################
}
</script>

</body>
</html>