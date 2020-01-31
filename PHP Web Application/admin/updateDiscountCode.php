<?php
	include 'config.php';
	session_start();
	if (!isset($_SESSION['admin'])){
		header('Location:login.php');
	}
  if(isset($_POST["updateDiscountCode"])){
    $code = $_POST['code'];
    $usage = $_POST['usage'];
		$expireTime = $_POST['expireTime'];


		$sql = "CALL update_discount_codes('$code', '$usage', '$expireTime')";
		$result = mysqli_query($db, $sql);
		header('Location:discountCodes.php');
}else{
  header('Location:login.php');

}

?>
