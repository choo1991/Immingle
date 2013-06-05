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

			var overallDiv = $("<div>").addClass("result");
			var headline = $("h3").addClass("eventHeadline").text(val.title);
			var portrait = $("<img>").attr("src","img/placeholderEvent.png");
			var startDate = $("<span>").addClass("startDate").text(val.startDate);
			var endDate = $("<span>").addClass("endDate").text(val.endDate);
			var description = $("<p>").text(val.blurb);
			var location = $("p").text(val.location);
			var label = $("<a>").addClass("label").attr("href","joinEvent.php").text("View");
			overallDiv.append(headline, portrait, startDate,endDate,description,location,label);
			$("#allContent").append(overallDiv);

		});	
	}
	
}

