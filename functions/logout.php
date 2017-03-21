<?php
	session_start();
	$_SESSION = array();
	session_unset();
	header("Location: ../login.php");
?>