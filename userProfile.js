$(document).ready(function(){
	$("#navEvents").addClass("active").siblings().removeClass("active");
	var id = $.cookie('username');
	$.ajax("retrieveEvents.php",{
		data: {requestType: 'categories', cookieId: id, category: 'foo'},
		success: displayResults,
		error: ajaxError
	});
});

function displayResults(data){
	console.log(data);
	alert('foo');
}
