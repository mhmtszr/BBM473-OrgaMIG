<?php
	include 'config.php';
	session_start();
	if (!isset($_SESSION['admin'])){
		header('Location:login.php');
	}
  if(isset($_POST["updateProduct"])){
    $prodID = $_POST['productID'];
    $productName = $_POST['productName'];
		$price = $_POST['price'];
		$stock = $_POST['stock'];
		$manufID = $_POST['manufID'];

		$sql = "CALL update_product('$prodID', '$productName', '$price' , '$stock' , '$manufID')";
		$result = mysqli_query($db, $sql);
		header('Location:product.php');
}else{
  header('Location:login.php');

}

?>
