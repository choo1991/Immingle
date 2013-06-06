<?php
// Following two lines used to enable php errors
// error_reporting(E_ALL);
// ini_set('display_errors', 'On');
header('Content-type: application/json');
if ($_SERVER['REQUEST_METHOD'] == "GET") {

	if(!isset($_GET['cookieId'])){
		header("HTTP/1.1 400 Invalid Request");
        die("You supplied an invalid value for the parameter 'cookieId' or 'requestType'.");
	} else {
		$id = $_GET['cookieId'];
		//select all rows from the table where the username matches the one entered by the user
		$username = 'immingle_user';
		$password = 'turnup12';
		$hostname = 'localhost'; // This will always need to be localhost on our server.
		$database = 'immingle';
		
		// Create a connection to the database.
		$db = new PDO("mysql:dbname=$database;host=$hostname", $username, $password);
			// Make any SQL syntax errors result in PHP errors.
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$requestProfile = "SELECT * FROM Users WHERE id = :user";
	
		$profile = $db->prepare($requestProfile);

		$profile->execute(array('user' => $id));

		$rows = $profile->fetch(PDO::FETCH_ASSOC);
		// echo $rows['length'];
		$num_rows = count($rows);
		if ($num_rows > 0) {
			echo json_encode($rows);
		} else {
			echo json_encode(array('success' => 0));
		}
	}
}
?>