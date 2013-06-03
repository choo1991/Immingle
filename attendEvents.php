<?php

if ($_SERVER['REQUEST_METHOD'] == "POST") {

	$id => $_POST['cookieId'],
	$requestType = $_POST['type'];
	$eventId = $_POST['eventId'];

	//select all rows from the table where the username matches the one entered by the user
	$username = 'immingle_user';
	$password = 'turnup12';
	$hostname = 'localhost'; // This will always need to be localhost on our server.
	$database = 'immingle';

	// Create a connection to the database.
	$db = new PDO("mysql:dbname=$database;host=$hostname", $username, $password);
		// Make any SQL syntax errors result in PHP errors.
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	if ($requestType == "attend" && $_POST['update'] == 0) {
		$status = $_POST['status'];
		$attendEvent = "INSERT INTO Attending (eventId, userId, status) VALUES (:eventId, :userId, :status)";
		$attend = $db->prepare($attendEvent);
		if ($attend->execute(array(':eventId' => $eventId, ':userId' => $id, 'status' => $status))) {
			echo json_encode(array('success' => 1));
		} else {
			echo json_encode(array('success' => 0));
		}
	} else if ($requestType == "attend" && $_POST['update'] == 1) {
		$status = $_POST['status'];
		$updateAttending = "UPDATE Attending SET status = :status WHERE userId = :userId AND eventId = :eventId";
		$update = $db->prepare($updateAttending);
		if ($update->execute(array(':eventId' => $eventId, ':userId' => $id, ':status' => $status))) {
			echo json_encode(array('success' => 1));
		} else {
			echo json_encode(array('success' => 0));
		}
	} else {
		$removeEvent = "DELETE FROM Attending WHERE userId = :id AND eventId = :event";
		$remove = $db->prepare($removeEvent);
		if ($remove->execute(array(':id' => $id, ':eventId' => $eventId))) {
			echo json_encode(array('success' => 1));
		} else {
			echo json_encode(array('success' => 0));
		}
	}
}

?>