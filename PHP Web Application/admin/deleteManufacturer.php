<?php
	include 'config.php';
	session_start();
	if (!isset($_SESSION['admin'])){
		header('Location:login.php');
	}
  if (!isset($_GET['deletedID'])){
    header('Location:login.php');
  }else{
    $manufID= $_GET['deletedID'];
    $sql = "CALL delete_manufacturer('$manufID')";
    $result = mysqli_query($db, $sql);
    header('Location:manufacturer.php');
  }

?>
