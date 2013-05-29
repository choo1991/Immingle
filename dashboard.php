<?php
include "profileHeader.php";
?>
<div class="container padded">
    <div class="row">

        <div class="span10 offset1" id="notification">
            <p>

            </p>
        </div>
    </div>
</div>

<div class="container">
    <div class ="row">
        <div class="span10 offset1">
        <div class ="tab-content">
            <div class = "tab-pane" id ="browse"></div>
            <div class = "tab-pane active" id ="myEvents">
                <div class ="tabbable">
                    <ul class = "nav nav-tabs" id = "myTab">
                        <li class="active"><a href="#home" data-toggle="tab">Upcoming Events</a></li>
                        <li><a href="#profile" data-toggle="tab">Past Events</a></li>
                    </ul>
                </div>
                <div class ="tab-content">
                    <div class = "tab-pane active" id ="home">
                        <div class="right">
                            <ul class="nav nav-pills">
                                <button class="active" id = "all" >All</button>
                                <button id = "join" >Join</button>
                                <button id = "save" >Save</button>
                                <button id = "create" >Create</button>
                            </ul>
                        </div>

                        <h1>Korea Fantasy Concert</h1>
                        <div>
                            <img src="" alt=""/>
                            <span id="date"></span>
                            <span id="time"></span>
                            <span id="creator">with</span>
                            <p id="description"></p>
                            <button>View</button>
                        </div>
                    </div>
                    <div class = "tab-pane" id ="profile">
                    </div>
                </div>
            </div>
            <div class = "tab-pane" id ="create"></div>
        </div>
        </div>
    </div>
</div>


<?php
include "profileFooter.php"
?>