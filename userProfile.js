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
		$("#home div ul.filters button").each(function(index, button){
			console.log(button);
			button.disabled = false;
		});
		$("#home div ul.filters button").click(function(){
			console.log($(this));
			console.log($(".active"));
			if(!this==$(".active")){
				alert('foo');
				$(".active").removeClass("active");
				this.class = "active";
			}else{
				
				console.log(this);
			}
		
		});
		$.each(data, function(index, val){
			console.log(val);
			var overallDiv = $("<div>").addClass("result");
			var divRow = $("<div>").addClass("row");
			var divContainer = $("<div>").addClass("span9");
			var divRowTwo = $("<div>").addClass("row");

			var headline = $("<h3>").addClass("eventHeadline").text(val.title);
			var imgHolder = $("<div>").addClass("span4");
			var informationHolder = $("<div>").addClass("span3");
			var buttonHolder = $("<div>").addClass("span2");

			
			var blurb = $("<p>").addClass("blurb").text(val.blurb);
			var portrait = $("<img>").attr("src","img/placeholderEvent.png");
			var time = $("<p>").addClass("time").text(val.startTime + " - " + val.endTime);
			var creator = $("<p>").addClass("author").text(names[val.ownerId]);
			var description = $("<p>").text(val.blurb);
			var location = $("<p>").text(val.location);
			var view = $("<a>").addClass("fancyButton").attr("href","viewEvent.php#"+val.id+"&mine").text("View");
			var save = $("<button>").addClass("fancyButton").text("Save");
			var join = $("<button>").addClass("fancyButton").text("Join");

			overallDiv.append(
				divRow.append(
					divContainer.append(headline)
				),divRowTwo.append(
					imgHolder.append(portrait),
					informationHolder.append(time, creator, location, blurb),
					buttonHolder.append(join,save, view)
				)
			);
			$("#allContent").append(overallDiv);

		});	
	}
	
}


