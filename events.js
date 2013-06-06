$(document).ready(function(){

	var cookieId = $.cookie('username');
	console.log(cookieId);
	$("#allContent .shadow").hide();
	var flag = false;
	$("#advancedOptions").click(function(){
		
		if(!flag){
			$("#allContent .shadow").show();
			$("#advancedOptions").text("Hide Options")
		}else{
			$("#allContent .shadow").hide();
			$("#advancedOptions").text("Advanced Options")
		}
		flag = !flag;

	})

});