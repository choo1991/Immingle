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
		<h1 class="brand">IMMINGLE</h1>
		<p>
			Millions of immigrants are connecting with others from their native
			 country through local events hosted on Immingle!
		</p>
		<p>
			Here are some events being organized on Immingle now:	
		</p>
		<div>
			<img id= "cover" src='asianz.jpg' alt = 'welcome' />
			<p class="caption">
				<span id="captionTitle">Cultural Food Festival</span><br>Love food? We do too! Join us for a delicious adventure at Seattle's International District's Annual Summer Festival!

			</p>
		</div>
	</div>
	<div class="column">
		<div class = "box">
			<h2>LOGIN</h2>
			<form action="login.php" method="post" id="loginForm">
				<label for="username">Email Address:</label><br>
				<input type="email" name ="username" placeholder="Enter Email Address"><br>
				<label for="password">Password: </label> <br>
				<input type ="password" name="password" placeholder="Enter Password"><br>
				<input type="checkbox" name ="remembercb" value="remember" id="rememberme">
				<label class="small" for="remember">Remember me</label>
				<input type="submit" name="login" value= "Sign In">
			</form>
		</div>
		<div class = "box">
			<h2>JOIN FOR FREE</h2>
			<form action="register.php" method="post" id="registerEmail">
				<label for="username">Email Address:</label> <br>
				<input type="email" name = "email" placeholder="Enter Email Address"><br>
				<input type="checkbox" name ="toscb" value="tos" id="termsofservice">
				<label class="small" for="tos">I agree with Immingle's <a href="#">Terms of Use</a></label>
				<input type="submit" name="register" value= "Sign Up" disabled="disabled" id="registrationSubmission">
			</form>
		</div>
	</div>

<?php
}
include "footer.php";
?>