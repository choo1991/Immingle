<?php
include "profileHeader.php";
?>

<div>
    <div class="container">
        <div class ="row">
            <div class="span8 offset2">
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
                                    <div class="shadow clearfix">
                                        
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
                                        <button class="fancyButton" id="advancedOptions">Advanced Options</button>
                                        <div class="row">
                                            <a href="browseCategory.php#arts">
                                                <div id="span1" class= "category">
                                                    <div class="img">
                                                        <img src="img/placeholderEvent.png" alt="">
                                                    </div>
                                                    <div class="caption">Arts &amp; Crafts</div>
                                                </div>
                                            </a>
                                            <a href="browseCategory.php#careerDevelopment">
                                                <div id="span1" class= "category">
                                                    <div class="img">
                                                        <img src="img/placeholderEvent.png" alt="">
                                                    </div>
                                                    <div class="caption">Career Development</div>
                                                </div>
                                            </a>
                                            <a href="browseCategory.php#gardening">
                                                <div id="span1" class= "category">
                                                    <div class="img">
                                                        <img src="img/placeholderEvent.png" alt="">
                                                    </div>
                                                    <div class="caption">Gardening</div>
                                                </div>
                                            </a>

                                        </div>
                                        <div class="row">
                                            <a href="browseCategory.php#perform">
                                                <div id="span1" class= "category">
                                                    <div class="img">
                                                        <img src="img/placeholderEvent.png" alt="">
                                                    </div>
                                                    <div class="caption">Performing Arts</div>
                                                </div>
                                            </a>
                                            <a href="browseCategory.php#religion">
                                                <div id="span1" class= "category">
                                                    <div class="img">
                                                        <img src="img/placeholderEvent.png" alt="">
                                                    </div>
                                                    <div class="caption">Religious and Spiritual</div>
                                                </div>
                                            </a>
                                            <a href="browseCategory.php#sports">
                                                <div id="span1" class= "category">
                                                    <div class="img">
                                                        <img src="img/placeholderEvent.png" alt="">
                                                    </div>
                                                    <div class="caption">Sports and Recreation</div>
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