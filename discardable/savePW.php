<?php
	
	echo "TestPW";

	// include the hashing class
	require ("resources/phpass/PasswordHash.php");

	$user = $_REQUEST['username'];
	$pass = $_REQUEST['email'];

	// protect the posted value then store them to variables
	//$email = protect($_REQUEST['email']);
	$pass = protect($_REQUEST['password']);

	// setup header
	//include "resources/php/header.php";	

	// Base-2 logarithm of the iteration count used for password stretching
	$hash_cost_log2 = 8;
	// Do we require the hashes to be portable to older systems (less secure)?
	$hash_portable = FALSE;

	$hasher = new PasswordHash($hash_cost_log2, $hash_portable);
	$hash = $hasher->HashPassword($pass);
	if (strlen($hash) < 20)
		fail('Failed to hash new password');
	unset($hasher);
	//echo $hash;
	//header('Content-Type: text/plain');

	//select all rows from the table where the username matches the one entered by the user
	$username = 'immingle_user';
	$password = 'turnup12';
	$hostname = 'localhost'; // This will always need to be localhost on our server.
	$database = 'immingle';

	// Create a connection to the database.
	$db = new PDO("mysql:dbname=$database;host=$hostname", $username, $password);
		// Make any SQL syntax errors result in PHP errors.
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
/*
	($stmt = $db->prepare('insert into users (user, pass) values (?, ?)'))
		|| fail('MySQL prepare', $db->error);
	$stmt->bind_param('ss', $user, $hash)
		|| fail('MySQL bind_param', $db->error);
	$stmt->execute()
		|| fail('MySQL execute', $db->error);*/

	$data = array(
		'pic' => '15',
		'hPw' => $hash,
		'email' => $email
	);

	$addPassword = "INSERT INTO Users (picId, password, email, hometown, presentLocation, firstName, lastName, about, registered, primaryLanguage) values (:pic, :hPw, :email, 'Chicago', 'United States', 'Josh', 'Villars', 'Mr. Fantastic', '1', 'English')";

	$query = $db->prepare($addPassword); // Prepare the query
	$query->execute($data);    // Execute the query, applying values to placeholders
	$rows = $query->fetchAll(PDO::FETCH_ASSOC);  // Get the entire result set

	//$STH = $db->("INSERT INTO Users (picId, password, email, hometown, presentLocation, firstName, lastName, about, registered, primaryLanguage) 
	//	value (:pic, :hPw, :email, 'Chicago', 'United States', 'Josh', 'Villars', 'Mr. Fantastic', '1', 'English')");  
	//$STH->execute($data);

/*
	Functions that may be factored out later into one separate file as it's used across two different files
*/

	function fail($pub, $pvt = '') {
		$msg = $pub;
		if ($pvt !== '') {
			$msg .= ": $pvt";
		}
		exit("An error occurred ($msg).\n");
	}

	function protect($string){
		$string = trim(strip_tags(addslashes($string)));
		return $string;
	}

?>