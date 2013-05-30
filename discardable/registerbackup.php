<?php

	include 'header.php';
	// needs to include forms to submit to login.php
	// this form should include an email address and a password field
?>

<?php
	if ($_SERVER['REQUEST_METHOD'] == "POST") {
		// $validity = false;
		// if (!$validity) {

			if (isset($_POST['email'])) {
				$address = $_POST['email'];
			} else {
				$address = "";
			}
			if (isset($_POST['fname'])) {
				$fname = $_POST['fname'];
			} else {
				$fname = "";
			}
			if (isset($_POST['lname'])) {
				$lname = $_POST['lname'];
			} else {
				$lname = "";
			}
			if (isset($_POST['location'])) {
				$location = $_POST['location'];
			} else {
				$location = "";
			}

?> 
			<h1>Immingle</h1>
			<div class="column">
				<div class="box">

					<h2>Set-Up Account</h2>
					<form method="post" action="register.php" id="registrationForm">
						<label for="email">Email Address:</label><br>
						<input type="text" name="email" value="<?php echo htmlspecialchars($address);?>"><br>
						<label for="pass">Password:</label><br>
						<input type="password" name="pass"><br>
						<label for="pass">Confirm Password:</label><br>
						<input type="password" name="confirmPass"><br>
						<label for="fname">First Name:</label><br>
						<input type="text" name="fname" value="<?php echo htmlspecialchars($fname);?>"><br>
						<label for="lname">Last Name:</label><br>
						<input type="text" name="lname" value="<?php echo htmlspecialchars($lname);?>"><br>
						<label for="country">Native Country:</label><br>
						<select id="country">/</select><br>
						<label for="city">Current City:</label><br>
						<input type="text" name="location" value="<?php echo htmlspecialchars($location);?>"><br>
						<label for="language">Primary Language?</label><br>
						<select id="language"></select><br>
						<div id="blocked">
							<input type="submit" value="Next">
						</div>
					</form>
				</div>
			</div>
<?php
		// } else {
?>
			<h1>Immingle Registration Complete!</h1>
			<div>
				Thank you! Your confirmation email has been sent to your address!
			</div>
			<p>Return to the <a href="index.php">homepage</a></p>
<?php
		// }
?>

<?php
	function isValidName($name) {
		if (preg_match("/^[a-zA-Z']+[ ]+[a-zA-Z'\- ]*$/", $name)) {
			return true;
		} else {
			return false;
		}
	}

	function isValidEmail($email) {
		if (filter_var("$email", FILTER_VALIDATE_EMAIL)) {
			return true;
		} else {
			return false;
		}
	}

	function isValidString($string) {
		if (filter_var("$string", FILTER_SANITIZE_STRING)) {
			return true;
		} else {
			return false;
		}
	}

	function isValidPass($pass) {
		if ($len < 5) {
			return false;
		}elseif ( $len > 20) {
			return false;
		}else if (!preg_match('#[0-9]#', $string)) {
			return false;
		}else if (!preg_match('#[a-z]#i', $string)) {
			return false;
		} else {
			return true;
		}
	}

	// function validateInput() {
	// 	$valid = true;
	// 	$changes = $arrayName = array(
	// 		"email" => false,
	// 		"fname" => false,
	// 		"lname" => false,
	// 		"location" => false,
	// 		"pass" => false,
	// 		"confirmPass" => false,
	// 	);
	// 	foreach ($changes as $key => $value) {
	// 		if ($key == "email") {
	// 			$changes['email'] = isValidEmail($_POST['email']);
	// 		} else if ($key == "pass") {
	// 			if (isValidPass($_POST['pass']) && $_POST['pass'] == $_POST['confirmPass']) {
	// 				$changes['pass'] = true;
	// 			}
	// 		} else if ($key == "fname") {
	// 			$changes['fname'] = isValidString($_POST['fname']);
	// 		} else if ($key == "lname") {
	// 			$changes['lname'] = isValidString($_POST['lname']);
	// 		} else {
	// 			$changes['location'] = isValidString($_POST['location']);
	// 		}
	// 	}
	// 	foreach ($changes as $key => $value) {
	// 		if ($changes["$key"]) {
?>
				// <script>
				// 	$("<?= $key ?>").addClass("error");
				// </script>
<?php
			// } else {
?>
				// <script>
				// 	$("<?= $key ?>").removeClass("error");
				// </script>
<?php
	// 			$valid = false;
	// 		}
	// 	}
	// 	return $valid;
	// }
?>

<?php
	include 'footer.php';
?>