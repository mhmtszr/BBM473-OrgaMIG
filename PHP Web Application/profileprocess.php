<?php
	include 'config.php';
	session_start();
	if (!isset($_SESSION['ID'])){
		header('Location:login.php');
	}
  $custID= $_SESSION['ID'];
  if(!isset($_POST['saveChanges'])){
    header('Location:profile.php');
  }
  $date= date("Y-m-d h:i:s");



  $updateID =$_SESSION['ID'];
  $firstName = $_POST['inputName'];
  $lastName = $_POST['inputsurname'];
  $email = $_POST['inputEmail4'];
  $phone = $_POST['inputphone'];
  $address = $_POST['inputAddress'];

  $sql = "CALL update_customer('$updateID', '$firstName', '$lastName' , '$email', '$phone' , '$address')";
  $result = mysqli_query($db, $sql);
	header('Location:profile.php');
?>
