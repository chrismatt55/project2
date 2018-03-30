<?php

//this function sends the $connection to confirm_db_connect for error checking
//and returns back an open connection or error message
function db_connect() {
$connection = new mysqli(DB_SERVER, DB_USER,DB_PASS,DB_NAME);
confirm_db_connect($connection);
return $connection;
}

//this function is called in the db_connect function to error check
function confirm_db_connect($connection){
	if($connection->connect_errno){
		$msg = "Database connection failed: ";
		$msg .= $connection->connect_error;
		$msg .= " (" . $connnection->connect_errno . ")";
		exit ($msg);
	}
}

// this function is called in the footer of every page to close the connection
function db_disconnect($connection) {
	if(isset($connection)){
		$connection->close();
	}
}

?>
