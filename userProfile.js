$(document).ready(function(){
	$("#navEvents").addClass("active").siblings().removeClass("active");
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
}
