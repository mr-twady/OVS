function validateForm(){
var x=document.forms["aspirantform"]["pres"].value;
var x1=document.forms["aspirantform"]["vpres"].value;
var x2=document.forms["aspirantform"]["gsec"].value;
var x3=document.forms["aspirantform"]["fsec"].value;
var x4=document.forms["aspirantform"]["trsr"].value;
var x5=document.forms["aspirantform"]["pro"].value;
var x6=document.forms["aspirantform"]["sport"].value;
var x7=document.forms["aspirantform"]["sdir"].value;
var x8=document.forms["aspirantform"]["ags"].value;
//Check if any radio button was unselected
if(x8==null || x8==""){
alert("OOPs... You didn't vote a ASSISTANT GEN. SEC ASPIRANT! Kindly go back and vote one; if you are voting no AGS aspirant, tick it's UNDECIDED/SKIP button.");
return false;
}else{	
if (x==null || x==""){
alert("OOPs... You didn't vote a PRESIDENTIAL ASPIRANT! Kindly go back and vote one; if you are voting no presidential aspirant, tick it's UNDECIDED/SKIP button.");
return false;
}//if pres is OK, check next
else{
if(x1==null || x1==""){
alert("OOPs... You didn't vote a VICE PRESIDENTIAL ASPIRANT! Kindly go back and vote one; if you are voting no vice presidential aspirant, tick it's UNDECIDED/SKIP button.");
return false;
}//if vpres is OK, check next
else{
if(x2==null || x2==""){
alert("OOPs... You didn't vote a GEN. SEC ASPIRANT! Kindly go back and vote one; if you are voting no gen. sec aspirant, tick it's UNDECIDED/SKIP button.");
return false;
}else{
if(x3==null || x3==""){
alert("OOPs... You didn't vote a FIN. SEC ASPIRANT! Kindly go back and vote one; if you are voting no fin.sec aspirant, tick it's UNDECIDED/SKIP button.");
return false;
}else{
if(x4==null || x4==""){
alert("OOPs... You didn't vote a TREASURER ASPIRANT! Kindly go back and vote one; if you are voting no treasurer aspirant, tick it's UNDECIDED/SKIP button.");
return false;
}else{
if(x5==null || x5==""){
alert("OOPs... You didn't vote a P.R.O ASPIRANT! Kindly go back and vote one; if you are voting no P.R.O aspirant, tick it's UNDECIDED/SKIP button.");
return false;
}
else{
if(x6==null || x6==""){
alert("OOPs... You didn't vote a SPORT DIRECTOR ASPIRANT! Kindly go back and vote one; if you are voting no sport director aspirant, tick it's UNDECIDED/SKIP button.");
return false;}
else{
if(x7==null || x7==""){
alert("OOPs... You didn't vote a SOCIAL DIRECTOR ASPIRANT! Kindly go back and vote one; if you are voting no social director aspirant, tick it's UNDECIDED/SKIP button.");
return false;
}else{
	//SUBMIT VOTES
}//end else for sdir
}//end else for sport
}//end else for pro
}//end else for trsr
}//end else for fsec
}//end else for gsec 
}//end else for vpres
}//end else for pres
	}//end else for AGS
}//end function