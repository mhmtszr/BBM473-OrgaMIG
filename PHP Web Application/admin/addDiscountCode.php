<?php
	include 'config.php';
	session_start();
	if (!isset($_SESSION['admin'])){
		header('Location:login.php');
	}
  if(isset($_POST["addDiscountCode"])){
    $code = $_POST['code'];
    $usage = $_POST['usage'];
		$expireTime = $_POST['expireTime'];


		$sql = "CALL insert_discount_code('$code', '$usage', '$expireTime')";
		$result = mysqli_query($db, $sql);
		header('Location:discountCodes.php');
}else{
  header('Location:login.php');

}

?>
