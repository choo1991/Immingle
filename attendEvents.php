<?php

/*
	Must send a post request for it to do anything.
	Will return json object with success of either 1 or 0
	for success and failure respectively.

	Takes the 
		cookie id,
		requestType: attend (to save or attend) and anything else to remove,
		eventId: id of the event,
		status: 1 is going, 0 is just saving,
		update: 1 is updating status, 0 is newly saving
*/

if ($_SERVER['REQUEST_METHOD'] == "POST") {

	$id => $_POST['cookieId']; // cookie id
	$requestType = $_POST['type']; // request type
	$eventId = $_POST['eventId']; // id of the event

	//select all rows from the table where the username matches the one entered by the user
	$username = 'immingle_user';
	$password = 'turnup12';
	$hostname = 'localhost'; // This will always need to be localhost on our server.
	$database = 'immingle';

	// Create a connection to the database.
	$db = new PDO("mysql:dbname=$database;host=$hostname", $username, $password);
		// Make any SQL syntax errors result in PHP errors.
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	if ($requestType == "attend" && $_POST['update'] == 0) { // request is attend, and it's not updating
		$status = $_POST['status']; // status
		$attendEvent = "INSERT INTO Attending (eventId, userId, status) VALUES (:eventId, :userId, :status)";
		$attend = $db->prepare($attendEvent);

		$attend->execute(array(':eventId' => $eventId, ':userId' => $id, 'status' => $status));
		$queryId = $db->lastInsertId();
		if ($queryId != null) {
			echo json_encode(array('success' => 1));
		} else {
			echo json_encode(array('success' => 0));
		}

		// if ($attend->execute(array(':eventId' => $eventId, ':userId' => $id, 'status' => $status))) {
		// 	echo json_encode(array('success' => 1));
		// } else {
		// 	echo json_encode(array('success' => 0));
		// }
	} else if ($requestType == "attend" && $_POST['update'] == 1) { // request is attend and it's updating
		$status = $_POST['status']; // status
		$updateAttending = "UPDATE Attending SET status = :status WHERE userId = :userId AND eventId = :eventId";
		$update = $db->prepare($updateAttending);
		// if ($update->execute(array(':eventId' => $eventId, ':userId' => $id, ':status' => $status))) {
		// 	echo json_encode(array('success' => 1));
		// } else {
		// 	echo json_encode(array('success' => 0));
		// }

		$update->execute(array(':eventId' => $eventId, ':userId' => $id, ':status' => $status));
		$queryId = $db->exec();
		if ($queryId >0) {
			echo json_encode(array('success' => 1));
		} else {
			echo json_encode(array('success' => 0));
		}

	} else { // anything else to remove
		$removeEvent = "DELETE FROM Attending WHERE userId = :id AND eventId = :event";
		$remove = $db->prepare($removeEvent);
		$remove->execute(array(':id' => $id, ':eventId' => $eventId))
		$queryId = $db->exec();
		if ($queryId > 0) {
			echo json_encode(array('success' => 1));
		} else {
			echo json_encode(array('success' => 0));
		}


		// if ($remove->execute(array(':id' => $id, ':eventId' => $eventId))) {
		// 	echo json_encode(array('success' => 1));
		// } else {
		// 	echo json_encode(array('success' => 0));
		// }
	}
}

?>