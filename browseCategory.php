<?php
include "profileHeader.php";


?>
<div class="container">
    <div class ="row">
    	<div class="span10 offset1 shadow browsedEvents">
    		<h2>Events in <span id="cat"></span></h2>
    		<a href="events.php" class="fancyButton">Back to Categories</a>
			<div class="row">
		    	<div class="span8 offset1">
		    		<h3>Korea Fantasy Concert</h3>	
		    		<div class="row">
		    			<div class="span3">
		    				<img src="img/placeholderEvent.png">
		    			</div>
		    			<div class="span3">
			    			<p>Time</p>
			    			<p>Location</p>
			    			<p>Creator</p>
			    			<p>Blurb</p>
			    		</div>
			    		<div class="span2">
			    			<button class="fancyButton">Join</button>
			    			<button class="fancyButton">Save</button>
			    			<button class="fancyButton">View</button>
			    		</div>
		    		</div>
		    	</div>
		    </div>
    	</div>
    </div>
    
</div>
<script src ="browseCategory.js"></script>
<?php
include "profileFooter.php";
?>