$(document).ready(function(){

	// var cookieId = $.cookie('username');
	// console.log(cookieId);
	// $("#allContent .shadow").hide();
	// var flag = false;
	// $("#advancedOptions").click(function(){
		
	// 	if(!flag){
	// 		$("#allContent .shadow").show();
	// 		$("#advancedOptions").text("Hide Options")
	// 	}else{
	// 		$("#allContent .shadow").hide();
	// 		$("#advancedOptions").text("Advanced Options")
	// 	}
	// 	flag = !flag;

	// })
	
	var location = window.location.href
	location = location.split("#")[1];
	
	$("#cat").text(definitions[location]);
});
var definitions ={
    "arts": "Arts & Crafts",
    "careerDevelopment": "Career Development",
    "gardening": "Gardening",
    "sports": "Sports & Recreation",
    "religion": "Religious and Spiritual",
    "perform": "Performing Arts"
}