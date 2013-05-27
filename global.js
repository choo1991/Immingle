$(document).ready(function() {
	// var location = location.href.split("/")[4];
	$("#termsofservice").click(function() {
		if($(this).attr('checked') == false){
			$('#registrationSubmission').attr("disabled","disabled");   
		} else {
			$('#registrationSubmission').removeAttr('disabled');
		}
	});

	// validate signup form on keyup and submit
	// $("#registerForm").validate({
	// 	rules: {
	// 		email: {
	// 			required: true,
	// 			email: true
	// 		},
	// 		pass: {
	// 			required: true,
	// 			minlength: 6
	// 		},
	// 		confirmPass: {
	// 			required: true,
	// 			minlength: 6
	// 		},
	// 		fname: "required",
	// 		lname: "required",
	// 		location: "required"
	// 	},
	// 	messages: {
	// 		email: {
	// 			required: "We need your email address to contact you",
	// 			email: "Your email address must be in the format of name@domain.com"
	// 		},
	// 		pass: {
	// 			required: "Please enter a password",
	// 			minlength: "Your password must be at least 6 characters"
	// 		},
	// 		confirmPass: {
	// 			required: "Please enter a password",
	// 			minlength: "Your password must be at least 6 characters"
	// 		},
	// 		fname: "Please specify your name",
	// 		lname: "Please specify your name",
	// 		location: "Please specify your current location"
	// 	}
	// });
	
});