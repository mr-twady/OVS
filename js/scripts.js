function equalHts(){
	$('#xbody').equalHeights();
}


/////////////////////////////////////////////////////////////////////////////////////////////

function zeroit(v){
	if (v < 10){
		return "0" + v;
	}else{
		return v;
	}
}

var dys = String("Sunday,Monday,Tuesday,Wednesday,Thursday,Friday,Saturday").split(",");
var mths = String("JAN,FEB,MARCH,APRIL,MAY,JUNE,JULY,AUG,SEPT,OCT,NOV,DEC").split(",");

function toCaps(v){
		return String(v).substr(0,1).toUpperCase() + String(v).substr(1, String(v).length).toUpperCase();
	}

function mthyear(){	
		var gd = new Date();
		
		yd = gd.getDay();
		yt = gd.getDate();
		ym = gd.getMonth();
		fy = gd.getFullYear();
		
		return toCaps(dys[yd]) +" - "+toCaps(mths[ym]) + " " + yt +", "+ fy+".";		
	}

function xtime(){
	
	var cTime = new Date();
	
	var day = cTime.getDay();
	var hrs = cTime.getHours();
	var mins = cTime.getMinutes();
	var secs = cTime.getSeconds();
	
	if(hrs > 11){
		apm = "pm";
		if(hrs > 12){
			hrs = hrs - 12;
		}
	} else {
		apm = "am";
	}
	
	// Tuesday, June 26, 2012 <br/> 11:58:07 PM
	$("#date").html(mthyear() + "<br/> "+"(" + zeroit(hrs) + ":" + zeroit(mins) + ":" + zeroit(secs) + apm+")"); 
	
}

/////////////////////////////////////////////////////////////////////////////////////////////




$(document).ready(function(){	

	/**/ 
	
		$('a[href*="#"]').click(function() {
			 if (location.pathname == this.pathname && location.host == this.host) {
			   var target = $(this.hash);
			  alert($(target).toString()); 
			   target = target.size() && target || $("[name=" + this.hash.slice(1) +']');
			   if (target.size()) {
				   target.ScrollTo(400);
				   return false;
			   }
			};
		});
				  	
	/* */
	
	/*//set the height of document...
	ht = Number($(this).height()) - 2;
	$("#body").height(ht);
	
	//set the height of the mbody
	mt = ht - ($("#banner").height() + $("#header").height());
	//set the height to mt..
	$("#mbody").css("min-height",mt+"px");
	
	//make equal.. 
	equalHts();
	
	//set the position of windows.. and elements...... 
	$(window).resize(function() {
	   ht = Number($(this).height()) - 2;
	   $("#body").height(ht);
	   $('#body').css('background-position','bottom left');
	  
	  //call the equal heights function..
	  equalHts();
	});	
	*/
	
	$("#bars #stp").each(function(){
			$(this).addClass("shadow2");
		});

		int = setInterval(xtime, 400);
		
	//hide the v2 button...
	$("#v2").css("display","none");
});






