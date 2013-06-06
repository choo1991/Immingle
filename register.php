<?php
	// ini_set('display_errors',1);
	// ini_set('display_startup_errors',1);
	// error_reporting(-1);

	require 'resources/phpass/PasswordHash.php';
	require 'resources/phpmailer/class.phpmailer.php';


	include 'header.php';
	// needs to include forms to submit to login.php
	// this form should include an email address and a password field

	if ($_SERVER['REQUEST_METHOD'] == "POST") {
		
		if (!validateInput()) {

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
			<h1 class="brand">Immingle</h1>
			<div class="column">
				<div class="box shadow">

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
						<select name="country" id="country">/</select><br>
						<label for="city">Current City:</label><br>
						<input type="text" name="location" value="<?php echo htmlspecialchars($location);?>"><br>
						<label for="language">Primary Language?</label><br>
						<select name="language" id="language"></select><br>
						<div id="blocked">
							<input type="submit" value="Next">
						</div>
					</form>
				</div>
			</div>
<?php
		} else {
			// Everything's entered correctly! Add data to the DB!!! I'm so tired right now!!!!

			try {

				$user = $_POST['email'];
				$pass = $_POST['pass'];
				$pass = protect($pass);

				// Base-2 logarithm of the iteration count used for password stretching
				$hash_cost_log2 = 8;
				// Do we require the hashes to be portable to older systems (less secure)?
				$hash_portable = FALSE;

				$hasher = new PasswordHash($hash_cost_log2, $hash_portable);
				$hash = $hasher->HashPassword($pass);
				if (strlen($hash) < 20)
					fail('Failed to hash new password');
				unset($hasher);

				//select all rows from the table where the username matches the one entered by the user
				$username = 'immingle_user';
				$password = 'turnup12';
				$hostname = 'localhost'; // This will always need to be localhost on our server.
				$database = 'immingle';

				// Create a connection to the database.
				$db = new PDO("mysql:dbname=$database;host=$hostname", $username, $password);
					// Make any SQL syntax errors result in PHP errors.
				$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

				// Check if user is already registered

				$check = "SELECT * FROM Users WHERE email = :e";
				$checkQuery = $db->prepare($check);
				$checkQuery->execute(array(':e' => $user));

				if($checkQuery->rowCount() > 0) {
?>
				<div>You are already registered! Please check your email to complete registration!</div>
				<p>Return to the <a href='index.php'>homepage</a></p>
<?php
				} else {

					$data = array(
						'pic' => '15',
						'hPw' => $hash,
						'email' => $user,
						'ht' => $_POST['country'],
						'city' => $_POST['location'],
						'fname' => $_POST['fname'],
						'lname' => $_POST['lname'],
						'lang' => $_POST['language'],
					);

					$addPassword = "INSERT INTO Users (picId, password, email, hometown, presentLocation, firstName, lastName, about, registered, primaryLanguage) 
						values (:pic, :hPw, :email, :ht, :city, :fname, :lname, '', '0', :lang)";

					$query = $db->prepare($addPassword); // Prepare the query
					$query->execute($data);    // Execute the query, applying values to placeholders
					// $rows = $query->fetchAll(PDO::FETCH_ASSOC);  // Get the entire result set
					// email should be sent at this point
					$location = protect($user);
					$name = $_POST['fname'];
					$mail = new PHPMailer(true);

					try {

						define('GUSER', 'imminglewebsite@gmail.com'); // Gmail username
						define('GPWD', 'immingle1213'); // Gmail password

						$message = "Hi {$name},

							Please click the link below to complete your registration process!

							<a href='http://54.214.9.56/Activate.php?registrationId={$location}'>Confirm registration</a>

							Best,
							The Immingle Team";

						$mail->IsSMTP(); // enable SMTP
						$mail->SMTPDebug = 0;  // debugging: 1 = errors and messages, 2 = messages only
						$mail->SMTPAuth = true;  // authentication enabled
						$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
						$mail->Host = 'smtp.gmail.com';
						$mail->Port = 465;
						$mail->Username = GUSER;
						$mail->Password = GPWD;
						$mail->CharSet = 'UTF-8';
						$mail->From = GUSER;
						$mail->FromName = 'Immingle';
						$mail->AddAddress($location);

						$mail->WordWrap = 50;                                 // Set word wrap to 50 characters
						$mail->IsHTML(true);                                  // Set email format to HTML

						$mail->Subject = 'Immingle Account Registration';
						$mail->Body    = $message;
						//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

						if(!$mail->Send()) {
						   echo 'Message could not be sent.';
						   echo 'Mailer Error: ' . $mail->ErrorInfo;
						   exit;
						}
	?>
						<h1>Immingle Registration Complete!</h1>
						<div>
							Thank you! Your confirmation email has been sent to your address!
						</div>
						<p>Return to the <a href="index.php">homepage</a></p>
	<?php
					} catch (phpmailerException $e) {
						echo $e->errorMessage(); //Pretty error messages from PHPMailer
					} catch (Exception $e) {
						echo $e->getMessage(); //Boring error messages from anything else!
					}
				}
			} catch (PDOException $e) {
				echo 'Connection failed: ' . $e->getMessage();
			}
		}
	} else {
?>
		<h1>Oops! There's an error!</h1>
		<p>Return to the <a href="index.php">homepage</a></p>
<?php
	}

	function fail($pub, $pvt = '') {
		$msg = $pub;
		if ($pvt !== '') {
			$msg .= ": $pvt";
		}
		exit("An error occurred ($msg).\n");
	}

	function protect($string){
		$string = trim(strip_tags(addslashes($string)));
		return $string;
	}

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
		if (strlen($pass) < 5) {
			return false;
		} else if (strlen($pass) > 20) {
			return false;
		} else if (!preg_match('#[0-9]#', $pass)) {
			return false;
		}else if (!preg_match('#[a-z]#i', $pass)) {
			return false;
		} else {
			return true;
		}
	}

	function validateInput() {
		$fix = "";
		$valid = true;
		$changes = array(
			"email" => false,
			"fname" => false,
			"lname" => false,
			"location" => false,
			"pass" => false,
			"confirmPass" => false,
		);
		foreach ($changes as $key => $value) {
			if ($key == "email") {
				$changes["email"] = isValidEmail($_POST["email"]);
			} else if ($key == "pass") {
				if (isValidPass($_POST['pass']) && $_POST['pass'] == $_POST['confirmPass']) {
					$changes['pass'] = true;
					$changes['confirmPass'] = true;
				}
			} else if ($key == "fname") {
				$changes["fname"] = isValidString($_POST["fname"]);
			} else if ($key == "lname") {
				$changes["lname"] = isValidString($_POST["lname"]);
			} else {
				$changes["location"] = isValidString($_POST["location"]);
			}
		}
		foreach ($changes as $key => $value) {
			if (!$changes["$key"]) {
				$fix = $fix . $key . " ";
				$valid = false;
			}
		}
		echo $fix;
		$fix = "";
		return $valid;
	}
?>

<?php
	include 'footer.php';
?>