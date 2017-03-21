<?php
	require "connection.php";
	$query = "SELECT * FROM gyms";
	$result = $conn->query($query);
	$gimnasios = array();
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {		
			$gimnasios[] = $row;
		}
		$result->close();		
		echo json_encode($gimnasios);
	}
?>