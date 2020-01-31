<?php
	include 'config.php';
	session_start();
	if (!isset($_SESSION['admin'])){
		header('Location:login.php');
	}

  	if(isset($_POST["addProduct"])){
		$name = $_POST["productName"];
		$price = $_POST["price"];
		$stock = $_POST["stock"];
		$manufID = $_POST["manufacturerID"];
		
		if ($_FILES['image']['size'] == 0 && $_FILES['image']['error'] == 4)
		{
			$image = '';
		}
		else{
			$image = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));  
		}

		if($_POST["type"] == "FoodOfAnimalOrigin"){

			$meatType = $_POST["meatType"];
			
			$sql = "CALL insert_food_of_animal_origin('$name', '$price', '$stock', '', '$manufID', '$meatType', '$image')";
			$result = mysqli_query($db, $sql);

			header('Location:product.php');
		}

		else if($_POST["type"] == "FruitsAndVegetables"){
			$season = $_POST["season"];

			$sql = "CALL insert_fruits_and_vegetables('$name', '$price', '$stock', '', '$manufID', '$season', '$image')";
			mysqli_query($db, $sql);

			header('Location:product.php');
		}

		else{
			$amount = (float)$_POST["amount"];

			$sql = "CALL insert_milk_and_milk_product('$name', '$price', '$stock', '', '$manufID', '$amount', '$image')";
			mysqli_query($db, $sql);

			header('Location:product.php');
		}
	}

else{
	$message = "wrong answer";
	echo "<script type='text/javascript'>alert('$message');</script>";

}

?>
