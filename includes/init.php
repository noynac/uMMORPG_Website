<?php
include($_SERVER['DOCUMENT_ROOT'] . '/includes/config.php');
include($_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php');

// set secure cookie if SSL is true
if($config['has_ssl'] == true) {
	ini_set('session.cookie_secure', 1);
}
header('Server: '.$config['project_name'].'');
header('X-Content-Type-Options: nosniff');

// database connection
$dbType = strtolower($config['database_type']);
if ($dbType == "sqlite" || $dbType == "mysql") {
	try {
		if ($dbType == "sqlite") {
			$db = new PDO('sqlite:'.$config['database_SQLite_location'].''.$config['database_SQLite_name'].'');
		}else{
			$db = new PDO("mysql:host=" . $config['database_MySQL_host'] . ";charset=utf8mb4;dbname=" . $config['database_MySQL_name'], $config['database_MySQL_user'], $config['database_MySQL_password']);
		}
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch (Exception $exception) {
		if($config['display_conn_errors'] == true) {
			echo $exception;
		}else{
			echo "An error has occurred.";
		}
		die();
    }
} else {
	echo "Database type error, please check config.";
	die();
}

// set the session name to the project name
if (session_status() == PHP_SESSION_NONE) {
    session_name($config['project_name']);
    session_start();
}

// define session to be used to see if the user is logged in
$session = isset($_SESSION[$config['project_name']]);

// if the user is logged in, lets make a user variable to fetch account data
if ($session) {
	$fetchUser = $db->prepare('SELECT * FROM accounts WHERE name = :name');
	$fetchUser->bindParam(':name', $_SESSION[$config['project_name']]);
	$fetchUser->execute();
	$user = $fetchUser->fetch(PDO::FETCH_OBJ);
}
?>