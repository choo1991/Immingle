<?php
echo '<!DOCTYPE html>
<html>
<head>
    <title>Immingle</title>
    <link href="http://fonts.googleapis.com/css?family=Shadows+Into+Light" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Titillium+Web:300,200" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="basic.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="basic.css">
    <link rel="stylesheet" type="text/css" href="profile.css">
    <link rel="stylesheet" type="text/css" href="tabs/tabs.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
    <script src="/cookie/jquery.cookie.js"></script>
    <script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/js/bootstrap.min.js"></script>
    <script src="modal.js"></script>
    <script src="basic.js"></script>


</head>

<body><div class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-inner">
        <div class = "container">
            <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="brand center" href="http://54.214.9.56/userProfile.php">IMMINGLE</a>
            <div class="nav-collapse collapse">
                <div class= "center pull-right">
                    <form class="navbar-form pull-left">
                        <input class="span2" type="text" placeholder="Search">
                        <button type="submit" class="btn">Search</button>
                    </form>
                    <ul class= "nav">
                        <li><a href = "account.php">Account</a></li>
                        <li><a href = "logout.php">Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="secondNav background">
    <div class="container">
        <div class ="row">
            <div class="span10 offset1">
                <div class ="tabbable">
                    <ul class="nav nav-pills">
                        <li id="navBrowse" class="active"><a href="events.php">Browse</a></li>
                        <li id="navEvents"> <a href="userProfile.php">My Events</a></li>
                        <li id="navCreate"><a href="#">Create an Event</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="spacer"></div>
';
//<!--Need to include the function for the top nav still-->