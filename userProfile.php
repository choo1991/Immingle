<?php
include "profileHeader.php";


?>
<div class="container padded">
	<div class="row">

		<div class="span10 offset1" id="notification">
			<p>Guess what, you just got notified that there will be like .. system maintenance. Cuz this is only a demo.</p>
			<p>Cuz we are creative..</p>
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
						<li><a href="#past" data-toggle="tab">Past Events</a></li>
					</ul>
				</div>
				<div class ="tab-content">
					<div class = "tab-pane active" id ="home">
						<div>
							<ul class="filters">
								<button disabled ="disabled" id = "created" class="fancyButton" >Created</button>
								<button disabled ="disabled" id = "saved" class="fancyButton">Saved</button>
								<button disabled ="disabled" id = "joined"  class="fancyButton">Joined</button>
								<button disabled ="disabled" class="fancyButton active" id = "all" >All</button>
							</ul>
						</div>

						<div id="allContent" class="clearfix browsedEvents">
					   		<div id="defaultContent">

								<h2>No Events at this time. <a href="events.php">Explore events around you!</a></h2>

									
							</div>
						</div>
					</div>
					<div class = "tab-pane" id ="past">
						<div>
							<ul class="filters">
								<button disabled ="disabled" id = "created" class="fancyButton" >Created</button>
								<button disabled ="disabled" id = "saved" class="fancyButton">Saved</button>
								<button disabled ="disabled" id = "joined"  class="fancyButton">Joined</button>
								<button disabled ="disabled" class="fancyButton active" id = "all" >All</button>
							</ul>
						</div>
						<h2>You haven't been to any events at this time. </h2>
					</div>
				</div>
			</div>
			
		</div>
		</div>
	</div>
</div>

<script src="userProfile.js"></script>
<?php
include "profileFooter.php";
?>