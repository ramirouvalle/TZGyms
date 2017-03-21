<?php
	require "connection.php";
	$user = $_POST["user"];
	$pass = $_POST["pass"];

	$query = "SELECT * FROM users WHERE user = '$user' AND pass = '$pass'";
	$result = $conn->query($query);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {		
			$userData = $row;
		}
		$result->close();	
		session_start();
		$_SESSION['user'] = $userData;
		echo json_encode($userData);
	}else{
		echo "error";
	}
?>