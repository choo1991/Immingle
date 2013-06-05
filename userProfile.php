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
						<li><a href="#profile" data-toggle="tab">Past Events</a></li>
					</ul>
				</div>
				<div class ="tab-content">
					<div class = "tab-pane active" id ="home">
						<div>
							<ul class="right">
								<button class="active" id = "all" >All</button>
								<button id = "join" >Join</button>
								<button id = "save" >Save</button>
								<button id = "create" >Create</button>
							</ul>
						</div>
						<div id="allContent" class="clearfix">
							<div id="result1">
								<h1>Korean Kid Drink a Thon</h1>
								<div>
									<img src="" alt=""/>
									<span class="date">5/4/2013</span>
									<span class="time">7PM - 9PM</span>
									<span class="creator">with James Mf'in Chang</span>
									<div class="description">
									<p>Le future prez iz getting schwasty. Get it yuhhhh boiiiiiiiii</p>
									<p>Be there or fuck off.</p>
									<p>We still love you though. </p>
									<a class="label" href="joinEvent.php">View</a>
									</div>
								</div>
							</div>
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

<script src="userProfile.js"></script>
<?php
include "profileFooter.php";
?>