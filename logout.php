<?php

if (isset($_COOKIE['username'])) {
	setcookie("username", $_COOKIE['username'], -1);
	header("Location: index.php");
	die();
} else {
?>
	<h1>Oops! There was an error!</h1>
	<p>Return to the <a href="index.php">homepage</a></p>
<?php
}

?>