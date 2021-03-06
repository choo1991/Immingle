<?php

/*
	Must send a post request for it to do anything.
	Will return json object with success of either 1 or 0
	for success and failure respectively.

	Takes the 
		cookie id,
		requestType: new (to add a new event) anything else to update,
		
	NEW EVENT AND UPDATES REQUIRE
		title,
		datetime,
		location,
		blurb

	IF USER WANTS TO UPDATE, JUST GIVE THEM WHAT THEY ALREADY HAVE IN THE DATABASE
	FILLED OUT, SO THEY CAN CHANGE PARTS OF IT THEY WANT AND LEAVE THE REST ALONE
*/
// Following two lines used to enable php errors
error_reporting(E_ALL);
ini_set('display_errors', 'On');
if ($_SERVER['REQUEST_METHOD'] == "POST") {

	$id = $_POST['cookieId'];
	// $requestType = $_POST['type'];

	//select all rows from the table where the username matches the one entered by the user
	$username = 'immingle_user';
	$password = 'turnup12';
	$hostname = 'localhost'; // This will always need to be localhost on our server.
	$database = 'immingle';
	
	// Create a connection to the database.
	try{
		$db = new PDO("mysql:dbname=$database;host=$hostname", $username, $password);
		// Make any SQL syntax errors result in PHP errors.
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}catch(PDOException $e){
		echo "Connection Failed: " . $e->getMessage();
	}

	// if ($requestType == "new" && $_POST['update'] == 0) {
		$title = $_POST['title'];
		$startTime = $_POST['startTime'];
		$endTime = $_POST['endTime'];
		$location = $_POST['location'];
		$blurb = $_POST['blurb'];
		$addEvent = "INSERT INTO Events (title, startTime, endTime, location, picId, blurb, ownerId) 
			VALUES (:title, :startTime, :endTime, :location, '1', :blurb, :id)";

		$data = array(
			'title' => $title,
			'startTime' => $startTime,
			'endTime' => $endTime,
			'location' => $location,
			'blurb' => $blurb
		);
		try{
			$add = $db->prepare($addEvent);

			$add->execute($data);
			echo json_encode(array('success' => 1));
		}catch(PDOException $e){
			
			echo $e->getMessage();
		}
		
		// // $queryId = $db->exec();
		// if ($queryId >0) {
		// 	echo json_encode(array('success' => 1));
		// } else {
		// 	echo json_encode(array('success' => 0));
		// }

		// if ($attend->execute($data) {
		// 	echo json_encode(array('success' => 1));
		// } else {
		// 	echo json_encode(array('success' => 0));
		// }
	// } else {
	// 	$title = $_POST['title'];
	// 	$datetime = $_POST['timeDate'];
	// 	$location = $_POST['location'];
	// 	$blurb = $_POST['blurb'];
	// 	$updateEvent = "UPDATE Events SET title = :title, startTime = :startTime, endTime = :endTime, location = :location, blurb = :blurb 
	// 		WHERE userId = :userId AND eventId = :eventId";

	// 	$newData = array(
	// 		'title' => $title,
	// 		'startTime' => $startTime,
	// 		'endTime' => $endTime,
	// 		'location' => $location,
	// 		'blurb' => $blurb
	// 	);

	// 	$update = $db->prepare($updateEvent);
	// 	// if ($update->execute($newData) {
	// 	// 	echo json_encode(array('success' => 1));
	// 	// } else {
	// 	// 	echo json_encode(array('success' => 0));
	// 	// }
	// 	$update->execute($newData)
	// 	$queryId = $db->exec();
	// 	if ($queryId >0) {
	// 		echo json_encode(array('success' => 1));
	// 	} else {
	// 		echo json_encode(array('success' => 0));
	// 	}

	// }

?>