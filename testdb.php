<h1>
	This is a test page
</h1>

<?php

	$username = 'immingle_user';
	$password = 'turnup12';
	$hostname = 'localhost'; // This will always need to be localhost on our server.
	$database = 'immingle';

	// Create a connection to the database.
	$db = new PDO("mysql:dbname=$database;host=$hostname", $username, $password);
		// Make any SQL syntax errors result in PHP errors.
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$query = "SELECT * FROM Users";
	$query = $db->prepare($query); // Prepare the query
	$query->execute();
	$results = $query->fetchAll(PDO::FETCH_ASSOC);  // Get the entire result set

	print_r($results);
?>



	<!-- $rows = $db->query("SELECT * FROM Users;");
?>		
			<table>
				<tr><th>Id</th><th>password</th><th>email</th><th>hometown</th><th>presentLocation</th><th>firstName</th><th>lastName</th><th>about</th><th>interests</th><th>registered</th></tr>
<?php
	foreach ($rows as $row) {
		//echo $row[0];
?>
				<tr><td><?= $row[0] ?></td></td><td><?= $row[1] ?></td><td><?= $row[2] ?></td><td><?= $row[3] ?></td><td><?= $row[4] ?></td><td><?= $row[5] ?></td><td><?= $row[6] ?></td><td><?= $row[7] ?></td><td><?= $row[8] ?></td><td><?= $row[9] ?></td></tr>
<?php
	}
?>
			</table>*/-->
		</div>
	</body>
</html>