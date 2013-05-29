<?php
include "header.php";

if (isset($_COOKIE['username'])) {
	$expireTime = time() + 60*60*24*7;
	setcookie("username", $_COOKIE['username'], $expireTime);
	header("Location: userProfile.php");
	die();
} else {
?>

	<div class="column">
		<h1 class="brand">Immingle</h1>
		<p>
			<strong>Hipster ipsum</strong> Ennui whatever messenger bag seitan ethical next level. Authentic fingerstache dreamcatcher wolf. Blue bottle post-ironic narwhal +1 disrupt thundercats marfa, echo park sriracha lo-fi photo booth. Mixtape single-origin coffee beard chambray. Literally fanny pack ethnic, mustache terry richardson jean shorts freegan mlkshk.
		</p>
		<div>
			<img id= "cover" src='http://speaktomeevents.files.wordpress.com/2013/03/la-oe-ling-gangnam-style-20121012-001.jpg' alt = 'welcome' />
		</div>
	</div>
	<div class="column">
		<div class = "box">
			<h2>LOGIN</h2>
			<form action="login.php" method="post" id="loginForm">
				<label for="username">Email Address:</label><br>
				<input type="email" name ="username" placeholder="Enter Email Address.."><br>
				<label for="password">Password: </label> <br>
				<input type ="password" name="password" placeholder="Enter Password.."><br>
				<input type="checkbox" name ="remembercb" value="remember" id="rememberme">
				<label class="small" for="remember">Remember me</label>
				<input type="submit" name="login" value= "Sign In">
			</form>
		</div>
		<div class = "box">
			<h2>JOIN FOR FREE</h2>
			<form action="register.php" method="post" id="registerEmail">
				<label for="username">Email Address:</label> <br>
				<input type="email" name = "email" placeholder="Enter Email Address.."><br>
				<input type="checkbox" name ="toscb" value="tos" id="termsofservice">
				<label class="small" for="tos">I agree with Immingle's Terms of Use</label>
				<input type="submit" name="register" value= "Sign Up" disabled="disabled" id="registrationSubmission">
			</form>
		</div>
	</div>

<?php
}
include "footer.php";
?>