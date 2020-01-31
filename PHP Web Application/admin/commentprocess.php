<?php
	include 'config.php';
	session_start();
	if (!isset($_SESSION['ID'])){
		header('Location:login.php');
	}
  $custID= $_SESSION['ID'];
  if(!isset($_GET['commentInput']) or !isset($_GET['starInput'])){
    header('Location:manufacturer.php?manufacturerid=$_GET["manufID"]');
  }
  $date= date("Y-m-d h:i:s");



  $manufID =$_GET["manufID"];
  $comment = $_GET['commentInput'];
  $star = $_GET['starInput'];
  $sql = "CALL insert_comment('$custID', '$manufID', '$comment' , '$date', '$star')";
  $result = mysqli_query($db, $sql);
	header('Location:comments.php?manufacturerid=' . $manufID);
?>
