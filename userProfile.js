$(document).ready(function(){
	$("#navEvents").addClass("active").siblings().removeClass("active");
	$("#notification").hide();
	var id = $.cookie('username');
	$.ajax("retrieveEvents.php",{
		data: {
			requestType: 'myEvents', 
			cookieId: id
		},
		success: displayResults,
		error: ajaxError
	});
});

function displayResults(data){
	console.log(data);
	if(data.length>0){
		$("#defaultContent").hide();
		$("#home div ul.right button").each(function(index, button){
			console.log(button);
			button.disabled = false;
		});
		$.each(data, function(index, val){
			console.log(val);
			var overallDiv = $("<div>");
			var portrait = $("<img>").attr("src","img/placeholderEvent.png");
		});	
	}
	
}

