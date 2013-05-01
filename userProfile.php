<?php
include "profileHeader.php";
?>

<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">
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
            </div><!--/.nav-collapse -->
        </div>
    </div>
</div>

<div class="secondary navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">
            <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <div class="nav-collapse collapse">
                <ul class= "nav">
                    <li><a href = "browse.php">Browse</a></li>
                    <li><a href = "mEvents.php">My Events</a></li>
                    <li><a href= "cEvent">Create an Event</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class ="notification">

</div>

<div id="tab-container" class="tab-container">
    <ul class='etabs'>
        <li class='tab'><a href="#tabs1-html">HTML Markup</a></li>
        <li class='tab'><a href="#tabs1-js">Required JS</a></li>
        <li class='tab'><a href="#tabs1-css">Example CSS</a></li>
    </ul>
    <div id="tabs1-html">
        <h2>HTML Markup for these tabs</h2>
        <!-- content -->
    </div>
    <div id="tabs1-js">
        <h2>JS for these tabs</h2>
        <!-- content -->
    </div>
    <div id="tabs1-css">
        <h2>CSS Styles for these tabs</h2>
        <!-- content -->
    </div>
</div>

<?php
include "profileFooter.php"
?>