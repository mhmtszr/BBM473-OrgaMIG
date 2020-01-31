<?php
include 'config.php';
if(isset($_POST["loginButton"])){
	$username =  $_POST["username"];
	$password = $_POST["pass"];
	$shapassword = hash('sha256',$password);
	if ($username== "admin" and $shapassword == "8f0e2f76e22b43e2855189877e7dc1e1e7d98c226c95db247cd1d547928334a9"){
		session_start();
		$_SESSION['admin'] = "admin";
		header('Location:index.php');
	}else{
		$message="Login Error!";
		header("Location:login.php?error=$message");
	}
}
 ?>
