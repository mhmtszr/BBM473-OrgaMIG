<?php
	include 'config.php';
	session_start();
	if (!isset($_SESSION['ID'])){
		header('Location:login.php');
	}
  if(isset($_POST["addToCart"])){
    $date= date("Y-m-d h:i:s");
    $userID =$_GET["userID"];
    $prodID = $_GET['prodID'];
    $quantity = $_POST['quantity'];

		$sql = "SELECT stock FROM product WHERE ID= $prodID";
    $result = mysqli_query($db, $sql);
		$row = mysqli_fetch_assoc($result);
    if($quantity > $row['stock'] ){
			$message= "Out of Stock";
			header("Location:index.php?message=$message");
			exit();
		}else{

			$db->begin_transaction();
			$db->autocommit(FALSE);
			$result1 = $db->query("CALL insert_shopping_cart('$userID', '$prodID', '$quantity' , '$date')");
			$result2 = $db->query("UPDATE product SET stock=stock-$quantity WHERE ID= $prodID");


			if ($result1 && $result2){
					$db->commit();
					$msg = "Added to cart.";
					echo $msg;
			}
			else{
					$db->rollback();
					$msg = "Unexpected error!";
					echo $msg;
			}
	    header('Location:index.php');
		}

  }
    else if(isset($_GET["deleteToCart"])){
      $date= date("Y-m-d h:i:s");
      $userID =$_SESSION['ID'];
      $prodID = $_GET['deleteToCart'];
      $quantity = $_GET['amount'];
      $sql = "CALL delete_shopping_cart('$userID', '$prodID')";

      $result = mysqli_query($db, $sql);
      $sql = "UPDATE product SET stock=stock+$quantity WHERE ID= $prodID ";
      $result = mysqli_query($db, $sql);
      header('Location:cart.php');

  }
?>
