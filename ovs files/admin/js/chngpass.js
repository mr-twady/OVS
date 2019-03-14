function validatePass(){
	var newpass1=document.getElementById('np1').value;
	var newpass2=document.getElementById('np2').value;
	var length = newpass1.length;
	if(length > 5){
		if(newpass1 == newpass2){
		return true;
		}else{
		return false;
		}
	}else{
	return false;
	}
}
//check for length of at least 6
function validatePass1(){
	var err = "Not Yet Up to 6 Characters";
	var newpass1=document.getElementById('np1').value;
	var length = newpass1.length;
	if(length > 5){
	document.getElementById('shw1').innerHTML = " ";
	}else{
	document.getElementById('shw1').innerHTML = "<div style='color:#f00;'>"+err+"</div>";
	}
}
//check if the two passwords match
function validatePass2(){
	var err = "Password typed doesn't match";
	var newpass1=document.getElementById('np1').value;
	var newpass2=document.getElementById('np2').value;
	if(newpass1 == newpass2){
	document.getElementById('shw2').innerHTML = "";
	}else{
	document.getElementById('shw2').innerHTML = "<div style='color:#f00;'>"+err+"</div>";
	}
}




