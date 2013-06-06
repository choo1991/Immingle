<?php

if ($_SERVER['REQUEST_METHOD'] == "POST") {

	if(!isset($_POST['cookieId']) || !isset($_POST['requestType'])){
		header("HTTP/1.1 400 Invalid Request");
        die("You supplied an invalid value for the parameter 'cookieId' or 'requestType'.");
	} else {
		$id = $_POST['cookieId'];
		//select all rows from the table where the username matches the one entered by the user
		$username = 'immingle_user';
		$password = 'turnup12';
		$hostname = 'localhost'; // This will always need to be localhost on our server.
		$database = 'immingle';
		
		// Create a connection to the database.
		$db = new PDO("mysql:dbname=$database;host=$hostname", $username, $password);
			// Make any SQL syntax errors result in PHP errors.
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		// $requestProfile = "SELECT * FROM Users WHERE id = :user";
	
		// $profile = $db->prepare($requestProfile);

		// $profile->execute(array('user' => $id));

		// $rows = $profile->fetchAll(PDO::FETCH_ASSOC);
		// // echo $rows['length'];
		// $num_rows = count($rows);
		// if ($num_rows > 0) {
		// 	echo json_encode($rows);
		// } else {
		// 	echo json_encode(array('success' => 0));
		// }




		$about = $_POST['about']; // about
		$interests = $_POST['interests'];
		$fName = $_POST['firstName'];
		$lName = $_POST['lastName'];
		$email = $_POST['email'];
		$presentLocation = $_POST['presentLocation'];
		$hometown = $_POST['hometown'];
		$primaryLanguage = $_POST['primaryLanguage'];

		$updateAccount = "UPDATE Users SET about = :about, interests = :interests, firstName = :fName, lastName = :lName, email = :email, presentLocation = :presentLocation, hometown = :hometown, primaryLanguage = :primaryLanguage WHERE id = :id";
		$update = $db->prepare($updateAccount);
		// if ($update->execute(array(':eventId' => $eventId, ':userId' => $id, ':status' => $status))) {
		// 	echo json_encode(array('success' => 1));
		// } else {
		// 	echo json_encode(array('success' => 0));
		// }

		$update->execute(array('about' => $about, ':interests' => $interests, ':fName' => $firstName, ':lName' = $lastName, ':email' = $email, ':presentLocation' = $presentLocation, ':hometown' = $hometown, ':primaryLanguage' = $primaryLanguage));
		$queryId = $db->exec();
		if ($queryId >0) {
			echo json_encode(array('success' => 1));
		} else {
			echo json_encode(array('success' => 0));
		}

?>