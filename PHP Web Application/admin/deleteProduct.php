

<?php
	include 'config.php';
	session_start();
	if (!isset($_SESSION['admin'])){
		header('Location:login.php');
	}
  if(isset($_GET["productID"])){
    $prodID = $_GET['productID'];
    $sql = "CALL delete_product('$prodID')";

    $result = mysqli_query($db, $sql);
    header('Location:product.php');
  }
  //header('Location:login.php');

?>
