<?php

// REQUIRES location AS DATA INPUT

if ($_SERVER['REQUEST_METHOD'] == "GET") {

	//select all rows from the table where the username matches the one entered by the user
	$username = 'immingle_user';
	$password = 'turnup12';
	$hostname = 'localhost'; // This will always need to be localhost on our server.
	$database = 'immingle';
	
	// Create a connection to the database.
	$db = new PDO("mysql:dbname=$database;host=$hostname", $username, $password);
		// Make any SQL syntax errors result in PHP errors.
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$location = $_GET['location'];
	$search = "%" . $location . "%";

	$searchLocation = "SELECT * FROM Events WHERE location LIKE :searchTerm";

	$find = $db->prepare($searchLocation);

	$find->execute(array('searchTerm' => $search));

	$rows = $find->fetchAll(PDO::FETCH_ASSOC);
	$num_rows = count($rows);
	if ($num_rows > 0) {
		echo json_encode($rows);
	} else {
		echo json_encode(array('success' => 0));
	}

}

?>