<?php
	// id should be passed in with all kinds of other random additions
	$activation = $_REQUEST['registrationId'];

	//select all rows from the table where the username matches the one entered by the user
	$username = 'immingle_user';
	$password = 'turnup12';
	$hostname = 'localhost'; // This will always need to be localhost on our server.
	$database = 'immingle';

	// Create a connection to the database.
	$db = new PDO("mysql:dbname=$database;host=$hostname", $username, $password);
		// Make any SQL syntax errors result in PHP errors.
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	try {

		$data = array(
			'id' => $activation
		);

		$register = "SELECT registered FROM Users WHERE email = :id";

		$query = $db->prepare($register); // Prepare the query
		$query->execute($data);    // Execute the query, applying values to placeholders
		$rows = $query->fetch(PDO::FETCH_ASSOC);  // Get the entire result set

		if ($query->rowCount() > 0) {

			if ($rows['registered'] == 0) {

				$activate = "UPDATE Users SET registered = 1 WHERE email = :id";

				$add = $db->prepare($activate); // Prepare the query
				$add->execute(array(':id' => $activation));    // Execute the query, applying values to placeholders
				$rows = $add->fetchAll(PDO::FETCH_ASSOC);  // Get the entire result set
?>
				<div>Your account was successfully activated! Please return to the <a href="index.php">homepage</a> to log-in!</div>
<?php
			} else {
?>
				<div>Your account is already activate. Please return to the <a href="index.php">homepage</a> to log-in!</div>
<?php
			}
		} else {
?>
			<div>Your information was not found. Please return to the <a href="index.php">homepage</a> to register</div>
<?php
		}

	} catch(PDOException $exception){ 
		return $exception; 
    } 
?>