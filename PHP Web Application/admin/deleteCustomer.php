<?php
	include 'config.php';
	session_start();
	if (!isset($_SESSION['admin'])){
		header('Location:login.php');
	}
  if (!isset($_GET['deletedID'])){
    header('Location:login.php');
  }else{
    $custID= $_GET['deletedID'];
    $sql = "CALL delete_customer('$custID')";
    $result = mysqli_query($db, $sql);
    header('Location:customers.php');
  }

?>
