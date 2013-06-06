<?php
// twitter.php
// Skeleton PHP script for Lab 3: Twitter Service
// INFO 344, Spring 2013
// Morgan Doocy
header('Content-Type: application/json');
$username = 'joshv';
$password = 'eTXW6RfjHbdVz';
$hostname = 'localhost'; // This will always need to be localhost on our server.
$database = 'joshv';
$DEBUG = false;


// Create a connection to the database.
$db = new PDO("mysql:dbname=$database;host=$hostname", $username, $password);

// Make any SQL syntax errors result in PHP errors.
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$action = $_REQUEST['action'];
$params = array(':database' => $database);
switch($action){
    case 'fetch':
        $sql = "select * from tweets ORDER BY timestamp DESC";
        submitQuery($sql, "GET", $params);
        break;

    case 'add':
        if(!isset($_REQUEST['tweet'])){
            header("HTTP/1.1 400 Invalid Request");
            die("You supplied an invalid value for the parameter 'tweet'.");
        }
        $tweet = $_REQUEST['tweet'];
        $sql = "INSERT INTO tweets (timestamp, tweet) VALUES (NOW(), '$tweet')";
        submitQuery($sql, "POST", $params);
        $id = $db->lastInsertId();
        $previousQuery = "select * from tweets where id = '$id'";
        submitQuery($previousQuery, "GET", $params);
        break;
}

function submitQuery($sql, $type, $params){
    global $db, $DEBUG;
    try{
        $query = $db->prepare($sql);
        $query->execute($params);
        if($type == "GET"){
            $rows = $query->fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($rows);
        }

    }catch(PDOException $e){
        header("HTTP/1.1 500 Internal Service Error");
        header("Content-type: text/plain");
        if($DEBUG){
            die("There was a SQL error:\n\n" . $e->getMessage());
        }else{
            die("Something went wrong. Sorry broski.");
        }
    }
}


?>