<?php
	$host = "127.0.0.1";
	$username = "root";
	$password = "";
	$dbname = "tzgyms";

	@$conn = new mysqli($host, $username, $password, $dbname);
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 
	$conn->set_charset("utf8");
?>