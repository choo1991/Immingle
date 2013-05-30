<?php
	
	//echo "ReturnPW";

	// include the hashing class
	require ("resources/phpass/PasswordHash.php");

	$user = $_REQUEST['email'];
	$pass = $_REQUEST['password'];

	// protect the posted value then store them to variables
	//$email = protect($_REQUEST['email']);
	$pass = protect($_REQUEST['password']);
	$user = protect($_REQUEST['email']);

	// setup header
	//include "resources/php/header.php";	

	// Base-2 logarithm of the iteration count used for password stretching
	$hash_cost_log2 = 8;
	// Do we require the hashes to be portable to older systems (less secure)?
	$hash_portable = FALSE;

	$hasher = new PasswordHash($hash_cost_log2, $hash_portable);
	/*$hash = $hasher->HashPassword($pass);
	if (strlen($hash) < 20)
		fail('Failed to hash new password');
	unset($hasher);*/
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

	$hash = '*'; // In case the user is not found
	/*($stmt = $db->prepare('select pass from users where user=?'))
		|| fail('MySQL prepare', $db->error);
	$stmt->bind_param('s', $user)
		|| fail('MySQL bind_param', $db->error);
	$stmt->execute()
		|| fail('MySQL execute', $db->error);
	$stmt->bind_result($hash)
		|| fail('MySQL bind_result', $db->error);
	if (!$stmt->fetch() && $db->errno)
		fail('MySQL fetch', $db->error);*/

	$data = array(
		'u' => $user
	);

	$getPassword = "SELECT id, email, password FROM Users WHERE email = :u";

	$query = $db->prepare($getPassword); // Prepare the query
	$query->execute($data);
	$rows = $query->fetch(PDO::FETCH_ASSOC);  // Get the entire result set
	//print_r($rows);

	$hash = $rows['password'];

	if ($hasher->CheckPassword($pass, $hash)) {
		$what = 'Authentication succeeded';
	} else {
		$what = 'Authentication failed';
	}
	unset($hasher);

	echo "$what\n";



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