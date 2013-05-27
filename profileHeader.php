<?php
echo '<!DOCTYPE html>
<html>
<head>
    <title>Immingle</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="basic.css">
    <link rel="stylesheet" type="text/css" href="tabs/tabs.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/js/bootstrap.min.js"></script>
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
            <a class="brand center" href="#">Immingle</a>
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

<div class="first background">
    <div class="container">
        <div class ="row">
            <div class="span8">
                <div class ="tabbable">
                    <ul class="nav nav-pills">
                        <li class="active"><a href="events.php">Browse</a></li>
                        <li><a href="userProfile.php">My Events</a></li>
                        <li><a href="#">Create an Event</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
';
//<!--Need to include the function for the top nav still-->