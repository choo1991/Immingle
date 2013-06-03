<?php

if ($_SERVER['REQUEST_METHOD'] == "POST") {

	$id => $_POST['cookieId'],
	$requestType = $_POST['type'];

	//select all rows from the table where the username matches the one entered by the user
	$username = 'immingle_user';
	$password = 'turnup12';
	$hostname = 'localhost'; // This will always need to be localhost on our server.
	$database = 'immingle';

	// Create a connection to the database.
	$db = new PDO("mysql:dbname=$database;host=$hostname", $username, $password);
		// Make any SQL syntax errors result in PHP errors.
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	if ($requestType == "new" && $_POST['update'] == 0) {
		$title = $_POST['title'];
		$datetime = $_POST['timeDate'];
		$location = $_POST['location'];
		$blurb = $_POST['blurb'];
		$addEvent = "INSERT INTO Events (title, datetime, location, picId, blurb, ownerId) 
			VALUES (:title, :time, :location, '1', :blurb, :ownerId)";

		$data = array(
			'title' => $title,
			'time' => $datetime,
			'location' => $location,
			'blurb' => $blurb
		);

		$add = $db->prepare($addEvent);
		if ($attend->execute($data) {
			echo json_encode(array('success' => 1));
		} else {
			echo json_encode(array('success' => 0));
		}
	} else {
		$title = $_POST['title'];
		$datetime = $_POST['timeDate'];
		$location = $_POST['location'];
		$blurb = $_POST['blurb'];
		$updateEvent = "UPDATE Events SET title = :title, datetime = :time, location = :location, blurb = :blurb 
			WHERE userId = :userId AND eventId = :eventId";

		$newData = array(
			'title' => $title,
			'time' => $datetime,
			'location' => $location,
			'blurb' => $blurb
		);

		$update = $db->prepare($updateEvent);
		if ($update->execute($newData) {
			echo json_encode(array('success' => 1));
		} else {
			echo json_encode(array('success' => 0));
		}

	}

?>