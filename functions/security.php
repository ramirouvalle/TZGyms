<?php
    session_start();
    if(!isset($_SESSION['user'])){
    	//Si no ha iniciado sesión
        header("Location: login.php");
        exit();
    }
?>
