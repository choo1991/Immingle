<?php

/*

	Retrieves a list of events as a json object, or just sucess: 0 if failure

	Takes the 
		cookie id,
		requestType: myEvents (for events I've saved or attending) categories (for retrieving by categories),
		
	IF GETTING CATEGORIES, MUST SEND category
		MORE COMMENTS FOR THE CATEGORIES SECTION BELOW

	returns json object on success, sucess: 0 on failure

*/
header('Content-type: application/json');
if ($_SERVER['REQUEST_METHOD'] == "GET") {

	if(!isset($_GET['cookieId']) || !isset($_GET['requestType'])){
		header("HTTP/1.1 400 Invalid Request");
        die("You supplied an invalid value for the parameter 'cookieId' or 'requestType'.");
	}else{
		$id = $_GET['cookieId'];
		$requestType = $_GET['requestType'];

		//select all rows from the table where the username matches the one entered by the user
		$username = 'immingle_user';
		$password = 'turnup12';
		$hostname = 'localhost'; // This will always need to be localhost on our server.
		$database = 'immingle';
		
		// Create a connection to the database.
		$db = new PDO("mysql:dbname=$database;host=$hostname", $username, $password);
			// Make any SQL syntax errors result in PHP errors.
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		if ($requestType == "myEvents") { // if requesting my events	
			$requestCurrentEvents = "SELECT e.id, e.title, e.datetime, e.location, e.blurb, e.ownerId FROM Attending a LEFT JOIN Events e ON e.id = a.eventId 
		 		LEFT JOIN Users u ON u.id = e.ownerId WHERE a.userId = :user AND a.status = '1' OR a.status = '0'";

		// 		// return where status is 1 or 0; 1 is attending, 0 is saved
		
			$update = $db->prepare($requestCurrentEvents);
			echo json_encode(array('cookie'=>id, 'type' =>$requestType ));
		// 	
			if ($update->execute(array('user' => $id)) {
				$rows = $request->fetchAll(PDO::FETCH_ASSOC);
				echo json_encode($rows);
			} else {
				echo json_encode(array('success' => 0));
			}
		} else if ($requestType == "categories") { // looking for categories

		// 	 CHECK THE VALUE OF THE userId INDEX OF THE ARRAY. IF IT'S EQUAL TO THE VALUE OF THE ID FOUND IN THE COOKIE, THEN IT'S SOMETHING
		// 		THEY'VE EITHER SAVED OR IS ATTENDING (CHECK THE STATUS 1 = ATTENDING, 0 = SAVING) 

		// 		OTHERWISE, THEY DID NOT SAVE IT OR SAY THEY'RE ATTENDING
	
			if(!isset($_GET['category'])){
				header("HTTP/1.1 400 Invalid Request");
	        	die("You supplied an invalid value for the parameter 'category'.");	
			}
			else{
				$category = $_GET['category'];

				// $requestCategories = "SELECT e.id, e.title, e.datetime, e.location, e.blurb, e.ownerId, c.title FROM Attending a LEFT JOIN Events e ON e.id = a.eventId 
				// 	LEFT JOIN Users u ON u.id = e.ownerId RIGHT JOIN Category c ON c.eventId = e.id WHERE c.title = :category";
				
				$requestCategories = "SELECT e.id, e.title, e.datetime, e.location, e.blurb, e.ownerId, a.userId, a.status, c.title 
					FROM Category c LEFT JOIN Events e ON e.id = c.eventId LEFT JOIN Users u ON u.id = e.ownerId LEFT JOIN Attending a 
					ON a.eventId = e.id WHERE c.title = :category AND a.userId = :id UNION 
					(SELECT e.id, e.title, e.datetime, e.location, e.blurb, e.ownerId, a.userId, a.status, c.title FROM Category c 
					LEFT JOIN Events e ON e.id = c.eventId LEFT JOIN Users u ON u.id = e.ownerId LEFT JOIN Attending a ON a.eventId = e.id 
					WHERE c.title ='Nature' GROUP BY e.id and a.userId)";
			
				$request = $db->prepare($requestCategories);
				echo json_encode(array('cookie'=>id, 'type' => "categories" ));
			// 	if ($request->execute(array('category' => $category, 'id' => $id)) {
			// 		$rows = $request->fetch(PDO::FETCH_ASSOC);
			// 		echo json_encode($rows);
			// 	} else {
			// 		echo json_encode(array('success' => 0));
			// 	}
			}
		}
	}


}

?>