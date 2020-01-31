<?php
	include 'config.php';
	session_start();
	if (!isset($_SESSION['admin'])){
		header('Location:login.php');
	}
  if(isset($_POST["addManuf"])){
    $manufName = $_POST['manufName'];
		$city = $_POST['city'];


		$sql = "CALL insert_manufacturer('$manufName', '$city')";
		$result = mysqli_query($db, $sql);
		header('Location:manufacturer.php');
}else{
  header('Location:login.php');

}

?>
