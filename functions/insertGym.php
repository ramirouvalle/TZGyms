<?php 
	require 'connection.php';

	$name = $_POST["name"];
	$cx = $_POST["cx"];
	$cy = $_POST["cy"];

	$query = "INSERT INTO gyms (name, coord_x, coord_y) VALUES ('$name', '$cx','$cy')";
	$result = $conn->query($query);
	if($result === TRUE){
		$gym = Array();
		$gym["name"] = $name;
		$gym["coord_x"] = $cx;
		$gym["coord_y"] = $cy;
		echo json_encode($gym);
	}else{
		echo "Error al guardar el gimnasio.";
	}
 ?>