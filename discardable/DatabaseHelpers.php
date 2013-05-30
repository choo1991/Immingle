<?php

class DatabaseHelpers {

	function test() {
		echo "Test method from helpers is working";
	}

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

	function isValidName($name) {
		if (preg_match("/^[a-zA-Z']+[ ]+[a-zA-Z'\- ]*$/", $name)) {
			return true;
		} else {
			return false;
		}
	}

	function isValidEmail($email) {
		if (filter_var("$email", FILTER_VALIDATE_EMAIL)) {
			return true;
		} else {
			return false;
		}
	}

	function isValidString($string) {
		if (filter_var("$string", FILTER_SANITIZE_STRING)) {
			return true;
		} else {
			return false;
		}
	}

	function isValidPass($pass) {
		if (strlen($pass) < 5) {
			return false;
		} else if (strlen($pass) > 20) {
			return false;
		} else if (!preg_match('#[0-9]#', $pass)) {
			return false;
		}else if (!preg_match('#[a-z]#i', $pass)) {
			return false;
		} else {
			return true;
		}
	}
	
}

?>