<?php
include "profileHeader.php";
?>

<div>
    <div class="container">
        <div class ="row">
            <div class="span8  offset1">
                <div class ="tab-content">
                    <div class = "tab-pane" id ="browse"></div>
                    <div class = "tab-pane active" id ="myEvents">
                        <div class ="tabbable">
                            <ul class = "nav nav-tabs" id = "myTab">
                                <li class="active"><a href="#events" data-toggle="tab">Events</a></li>
                                <li><a href="#people" data-toggle="tab">People</a></li>
                            </ul>
                        </div>
                        <div class ="tab-content">
                            <div class = "tab-pane active" id ="events">
                                <div id="allContent">
                                    <div class="box">
                                    <p>Advanced Search</p>
                                    <form>
                                        <label for="keywords">Keywords: </label><input type ="text" name ="keywords"><label for ="location">  Location:</label><input name = "location" type ="text"><br>
                                        <div class="right">
                                            <p><a href="options">More Options..</a></p>
                                            <button class="fancyButton">Search</button>
                                        </div>
                                    </form>
                                </div>

                                    <div id="categories" class= "clearfix" name="categories">
                                        <label for="categories">Categories</label>
                                        <div class="row">
                                            <a href="#">
                                                <div id="span1" class= "category">
                                                    <div class="img">
                                                        <img src="#" alt="">
                                                    </div>
                                                    <div class="caption">Drinking</div>
                                                </div>
                                            </a>
                                            <a href="#">
                                                <div id="span1" class= "category">
                                                    <div class="img">
                                                        <img src="#" alt="">
                                                    </div>
                                                    <div class="caption">Dranking</div>
                                                </div>
                                            </a>
                                            <a href="#">
                                                <div id="span1" class= "category">
                                                    <div class="img">
                                                        <img src="#" alt="">
                                                    </div>
                                                    <div class="caption">Drunking</div>
                                                </div>
                                            </a>

                                        </div>
                                        <div class="row">
                                            <a href="#">
                                                <div id="span1" class= "category">
                                                    <div class="img">
                                                        <img src="#" alt="">
                                                    </div>
                                                    <div class="caption">Two Rows!</div>
                                                </div>
                                            </a>
                                            <a href="#">
                                                <div id="span1" class= "category">
                                                    <div class="img">
                                                        <img src="#" alt="">
                                                    </div>
                                                    <div class="caption">These will all link</div>
                                                </div>
                                            </a>
                                            <a href="#">
                                                <div id="span1" class= "category">
                                                    <div class="img">
                                                        <img src="#" alt="">
                                                    </div>
                                                    <div class="caption">To James drinking</div>
                                                </div>
                                            </a>

                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class = "tab-pane" id ="people">
                            </div>
                        </div>
                    </div>
                    <div class = "tab-pane" id ="create"></div>
                </div>
            </div>
        </div>
    </div>

</div>
<script src="events.js"></script>
<?php
include "profileFooter.php"
?>