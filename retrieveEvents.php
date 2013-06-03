<?php

if ($_SERVER['REQUEST_METHOD'] == "GET") {

	$id => $_GET['cookieId'],
	$requestType = $_GET['type'];

	//select all rows from the table where the username matches the one entered by the user
	$username = 'immingle_user';
	$password = 'turnup12';
	$hostname = 'localhost'; // This will always need to be localhost on our server.
	$database = 'immingle';

	// Create a connection to the database.
	$db = new PDO("mysql:dbname=$database;host=$hostname", $username, $password);
		// Make any SQL syntax errors result in PHP errors.
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	if ($requestType == "myEvents") {
		$requestCurrentEvents = "SELECT e.id, e.title, e.datetime, e.location, e.blurb, e.ownerId FROM Attending a LEFT JOIN Events e ON e.id = a.eventId 
			LEFT JOIN Users u ON u.id = e.ownerId WHERE a.userId = :user AND a.status = '1' OR a.status = '0'";

		$update = $db->prepare($requestCurrentEvents);
		if ($update->execute(array('user' => $id)) {
			echo json_encode($update);
		} else {
			echo json_encode(array('success' => 0));
		}
	} else if ($requestType == "categories") {
		$requestCategories = "SELECT e.id, e.title, e.datetime, e.location, e.blurb, e.ownerId, c.title FROM Attending a LEFT JOIN Events e ON e.id = a.eventId 
			LEFT JOIN Users u ON u.id = e.ownerId RIGHT JOIN Category c ON c.eventId = e.id WHERE c.title = :category";
	}



}

?>