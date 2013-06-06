<?php
include "profileHeader.php";
?>



<div class="container">
    <div class ="row">
    	<div class="span10 offset1 shadow browsedEvents">
    		<h2>Korea Fantasy Concert</h2>
    		<div class="span2">
    			<button class="fancyButton">Join</button>
				<div><img src="img/placeholderEvent.png"/></div>
			</div>
			<div class="span7">
		    	<h3>Overview</h3>
		    	<label>Date</label><span id="placeholderDate">Monday, April 22, 2013</span>
		    	<label>Time</label><span id="placeholderTime">7:30PM to 9:30PM</span>
		    	<label>Place</label><span id="placeholderPlace">4617 22nd avenue NE Seattle WA</span>
		    	<label>Host</label><span id="placeholderHost">Josh Villars</span>
		    	<label>Number of Attending</label><span id="placeholderAttendants">3</span>
		    	<label>Description</label><span id="placeholderBlurb">Lorem Ipsum Dolor Sit Amit</span>
		    </div>
    	</div>
    </div>
</div>


<script src="viewEvent.js"></script>
<?php
include "profileFooter.php"
?>