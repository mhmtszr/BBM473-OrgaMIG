<?php
	include 'config.php';
	session_start();
	if (!isset($_SESSION['admin'])){
		header('Location:login.php');
	}
  if(isset($_POST["updateManufacturer"])){
    $manufID = $_POST['manufID'];
    $manufName = $_POST['manufName'];
		$city = $_POST['city'];


		$sql = "CALL update_manufacturer('$manufID', '$manufName', '$city')";
		$result = mysqli_query($db, $sql);
		header('Location:manufacturer.php');
}else{
  header('Location:login.php');

}

?>
