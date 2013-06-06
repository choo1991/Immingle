$(document).ready(function(){
	
	var location = window.location.href;
	location = location.split("#")[1];
	location = location.split("&");
	if(location.length>1){
		$("#navEvents").addClass("active").siblings().removeClass("active");
	}
	var obj = {
				"blurb": "It's Josh's birthday! Let's help him celebrate by making him black out! Hopefully he's not at Google I/O during this time!",
				"endTime": "2013-06-11 00:00:00",
				"id": "2",
				"location": "Everywhere there's alcohol",
				"ownerId": "19",
				"startTime": "2013-06-06 16:00:03",
				"title": "Josh's Birthday Party",
				"numAttendants":"4"
			};
	populateData(obj);

});
function populateData(data){
	$("#placeholderDate").text(data.startTime.split(" ")[0]);
	$("#placeholderTime").text(data.startTime.split(" ")[1] + " - " + data.endTime.split(" ")[1]);
	$("#placeholderPlace").text(data.location);
	$("#placeholderHost").text(data.ownderId);
	$("#placeholderAttendants").text(data.numAttendants);
	$("#placeholderBlurb").text(data.blurb)


}