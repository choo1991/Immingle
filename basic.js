var names = {
	"20":"James",
	"21":"Josh",
	"22":"Cassandra",
	"23":"April",
	"24":"Stewart",
	"25":"God",
	"19":"Jared",
	"18":"Jessica",
	"17":"Jason",
	"16":"Craig",
	"15":"Cameron",
	"14":"Olivia",
	"13":"Natalie",
	"12":"John",
	"11":"Steve",
	"10":"Mark",
	"9":"Eric",
	"8":"Nate",
	"7":"Eli",
	"6":"Hope",
	"5":"Jenny",
	"4":"Erin",
	"3":"Jayna",
	"2":"Julie",
	"1":"Jemima"


}
$(document).ready(function(){
    $('.myTab a ').click(function (e) {
        e.preventDefault();
        alert('foo');
        $(this).tab('show');
    });
    $("#navCreate").click(function(a){


				$.get('modalContent.html', function(data){
					modal.open({content: data});
					
				});

    });
    
});


// Provided Ajax error handler function (displays useful debugging information).
function ajaxError(jqxhr, type, error) {
	var msg = "An Ajax error occurred!\n\n";
	if (type == 'error') {
		if (jqxhr.readyState == 0) {
			// Request was never made - security block?
			msg += "Looks like the browser security-blocked the request.";
		} else {
			// Probably an HTTP error.
			msg += 'Error code: ' + jqxhr.status + "\n" + 
						 'Error text: ' + error + "\n" + 
						 'Full content of response: \n\n' + jqxhr.responseText;
		}
	} else {
		msg += 'Error type: ' + type;
		if (error != "") {
			msg += "\nError text: " + error;
		}
	}
	alert(msg);
}

