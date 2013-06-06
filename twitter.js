// twitter.js
// Skeleton JavaScript code for Lab 3: Twitter Service
// INFO 344 Spring 2013
// Morgan Doocy

// When the page has finished loading, fetch tweets and attach event handlers.
$(document).ready(function() {
    $('#tweet').click(submitTweet);
    fetchTweets();
});

// Initiate an Ajax request to the server to fetch the Twitter timeline.
function fetchTweets() {
    $.ajax('twitter.php', {
        data: {action: 'fetch'},
        success: displayTweets,
        error: ajaxError

    });
}
function displayTweets(data){
    $.each(data, function(index, value){
        addToDom(value, false);
    });
}

function addCallback(data){
    addToDom(data[0], true);
}
// Initiate an AJAX request to submit a new tweet to the web service.
function submitTweet() {
    var tweetData = $("#content").val();
    if(tweetData){
        flag = true;
        $.ajax('twitter.php',{
           data:{    action:'add',
                    tweet: tweetData
                },
            success: addCallback,
            error:ajaxError
        });
    }
}

function addToDom(tweetData, flag){
    var li = $('<li>').addClass('tweet');
    var p = $('<p>');
    p.html(tweetData.tweet + ' <br>');
    span = $('<span>');
    span.text('created on ' + tweetData.timestamp);
    p.append(span);
    li.append(p);
    if(flag){
        $('#timeline').prepend(li);
    }else{
        $('#timeline').append(li);
    }

}

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