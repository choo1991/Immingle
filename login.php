<?php 

// ini_set('display_errors',1);
// ini_set('display_startup_errors',1);
// error_reporting(-1);

require 'resources/phpass/PasswordHash.php';

include "header.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {

	$email = $_POST['username'];
	$pass = $_POST['password'];
	// $email = protect($_GET['email']);
	// $password = protect($_GET['pass']);

	if (!validInput($email, $pass)) {
?>
		<div>Please enter the correct information</div>
		<form action="login.php" method="post" id="loginForm">
			<label for="username">Email:</label><br>
			<input type="text" name="username"  value="<?php echo htmlspecialchars($email);?>"<br>
			<label for="password">Password: </label> <br>
			<input type="password" name="password"><br>
			<input type="checkbox" name="remembercb" value="remember" id="rememberme">
			<label class="small" for="remember">Remember me</label>
			<input type="submit" name="login" value="Submit">
		</form>
<?php
	} else {
		// Base-2 logarithm of the iteration count used for password stretching
		$hash_cost_log2 = 8;
		// Do we require the hashes to be portable to older systems (less secure)?
		$hash_portable = FALSE;

		$hasher = new PasswordHash($hash_cost_log2, $hash_portable);

		//select all rows from the table where the username matches the one entered by the user
		$username = 'immingle_user';
		$password = 'turnup12';
		$hostname = 'localhost'; // This will always need to be localhost on our server.
		$database = 'immingle';

		// Create a connection to the database.
		$db = new PDO("mysql:dbname=$database;host=$hostname", $username, $password);
			// Make any SQL syntax errors result in PHP errors.
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$hash = '*'; // In case the user is not found

		$getPassword = "SELECT id, email, password FROM Users WHERE email = :u";

		$query = $db->prepare($getPassword); // Prepare the query
		$query->execute(array('u' => $email));

		$rows = $query->fetch(PDO::FETCH_ASSOC);  // Get the entire result set

		if ($query->rowCount() > 0) {

			$hash = $rows['password'];
			$id = $rows['id'];

			if ($hasher->CheckPassword($pass, $hash)) {
				// start cookie here. the id is stored in $rows['id']
				$expireTime = time() + 60*60*24*7;
				setcookie("username", $id, $expireTime);
				header("Location: index.php");
				die();
			} else {
?>
				<div>Please enter the correct password</div>
				<form action="login.php" method="post" id="loginForm">
					<label for="username">Email:</label><br>
					<input type="text" name="username"  value="<?php echo htmlspecialchars($email);?>"<br>
					<label for="password">Password: </label> <br>
					<input type="password" name="password"><br>
					<input type="checkbox" name="remembercb" value="remember" id="rememberme">
					<label class="small" for="remember">Remember me</label>
					<input type="submit" name="login" value="Submit">
				</form>
<?php
			}
			unset($hasher);
		} else {
?>
			<h1>Oops! Your email address was not found!</h1>
			<p>Return to the <a href="index.php">homepage</a> and register!</p>
<?php
		}
	}
} else if ($_SERVER['REQUEST_METHOD'] == "GET") {
	// send another email to the user
	/*
		TBI later	
	*/

} else { //post was unsuccessful
	echo '<p>an error occurred</p>
		<ul>
			<li><a href="index.php">Register a new account</li>
		</ul>';
}

function isValidEmail($email) {
	if (filter_var("$email", FILTER_VALIDATE_EMAIL)) {
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

function validInput($email, $pass) {
	if (!isValidEmail($email)) {
		return false;
	} else if (!isValidPass($pass)) {
		return false;
	} else {
		return true;
	}
}

function protect($string){
	$string = trim(strip_tags(addslashes($string)));
	return $string;
}

function fail($pub, $pvt = '') {
	$msg = $pub;
	if ($pvt !== '') {
		$msg .= ": $pvt";
	}
	exit("An error occurred ($msg).\n");
}
?>


</body>

</html>

<?php
	include 'footer.php';
?>