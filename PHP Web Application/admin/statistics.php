<!DOCTYPE html>
<html lang="en">

<?php
	include 'config.php';
	session_start();
	if (!isset($_SESSION['admin'])){
		header('Location:login.php');
	}
?>

<head>
<title>Statistics</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="aStar Fashion Template Project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="../styles/bootstrap-4.1.3/bootstrap.css">
<link href="../plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="../plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="../plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="../plugins/OwlCarousel2-2.2.1/animate.css">
<link rel="stylesheet" type="text/css" href="../styles/product.css">
<link rel="stylesheet" type="text/css" href="../styles/product_responsive.css">
</head>
<body>

<div class="super_container">

	<!-- MENU -->
	<?php include 'sidebar.php' ?>
	<!-- Home -->

	<div class="home">
		<div class="parallax_background parallax-window" data-parallax="scroll" data-image-src="../images/organic_header.jpg" data-speed="0.8"></div>
		<div class="home_container">
			<div class="home_content">
				<div class="home_title">Statistics</div>
			</div>
		</div>
	</div>

	<!-- Products -->

	<div class="product">


    <br><br><br>
		<!-- Product Content -->
		<div class="section_container">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
					   <ul class="list-group">
               <li class="list-group-item d-flex justify-content-between align-items-center">
                 Number of Tables
                 <span class="badge badge-primary badge-pill">10</span>
               </li>
							 <?php
							 $sql = "SELECT SUM(totalCost) AS income FROM orders";
							 $result = mysqli_query($db, $sql);
							 $row = mysqli_fetch_assoc($result);
							 ?>
							 <li class="list-group-item d-flex justify-content-between align-items-center">
								 Total income of orgaMIG
								 <span class="badge badge-primary badge-pill"><?php  echo $row['income'];					?></span>
							 </li>
							 <?php
							 $sql = "SELECT COUNT(*)  AS totalOrders FROM orders ";
							 $result = mysqli_query($db, $sql);
							 $row = mysqli_fetch_assoc($result);
							 ?>
							 <li class="list-group-item d-flex justify-content-between align-items-center">
								 Total given order on orgaMIG
								 <span class="badge badge-primary badge-pill"><?php  echo $row['totalOrders'];					?></span>
							 </li>

              <?php
              $sql = "SELECT count(*) AS customerNum FROM customer ";
              $result = mysqli_query($db, $sql);
          		$row = mysqli_fetch_assoc($result);
              ?>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                Number of Customers
                <span class="badge badge-primary badge-pill"><?php  echo $row['customerNum'];					?></span>
              </li>
              <?php
              $sql = "SELECT count(*) AS manufNum FROM manufacturer ";
              $result = mysqli_query($db, $sql);
          		$row = mysqli_fetch_assoc($result);
              ?>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                Number of Manufacturers
                <span class="badge badge-primary badge-pill"><?php  echo $row['manufNum'];					?></span>
              </li>
              <?php
              $sql = "SELECT count(*) AS productNum FROM product ";
              $result = mysqli_query($db, $sql);
          		$row = mysqli_fetch_assoc($result);
              ?>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                Number of Products
                <span class="badge badge-primary badge-pill"><?php  echo $row['productNum'];					?></span>
              </li>
              <?php
              $sql = "SELECT count(*) AS orderNum FROM orders ";
              $result = mysqli_query($db, $sql);
          		$row = mysqli_fetch_assoc($result);
              ?>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                Number of Orders
                <span class="badge badge-primary badge-pill"><?php  echo $row['orderNum'];					?></span>
              </li>
              <?php
              $sql = "SELECT count(*) AS shopNum FROM shoppingcart ";
              $result = mysqli_query($db, $sql);
          		$row = mysqli_fetch_assoc($result);
              ?>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                Number of Shopping Cart Item
                <span class="badge badge-primary badge-pill"><?php  echo $row['shopNum'];					?></span>
              </li>
            </ul>


					</div>
          <div class="col-md-6">
					   <ul class="list-group">
							 <?php
							 $date= date("Y-m-d") ;

							 $sql = "  SELECT COUNT(*) AS todayOrders FROM orders where orderDate like '%$date%' ";
							 $result = mysqli_query($db, $sql);
							 $row = mysqli_fetch_assoc($result);
							 ?>
							 <li class="list-group-item d-flex justify-content-between align-items-center">
								 Today given order on orgaMIG
								 <span class="badge badge-primary badge-pill"><?php  echo $row['todayOrders'];					?></span>
							 </li>
              <?php

              $sql = "SELECT count(*) AS milkNum FROM milkandmilkproducts ";
              $result = mysqli_query($db, $sql);
          		$row = mysqli_fetch_assoc($result);
              ?>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                Number of Milk and Milk Products
                <span class="badge badge-primary badge-pill"><?php  echo $row['milkNum'];					?></span>
              </li>
              <?php
              $sql = "SELECT count(*) AS fruitNum FROM fruitsandvegetables ";
              $result = mysqli_query($db, $sql);
          		$row = mysqli_fetch_assoc($result);
              ?>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                Number of Fruits and Vegetables
                <span class="badge badge-primary badge-pill"><?php  echo $row['fruitNum'];					?></span>
              </li>
              <?php
              $sql = "SELECT count(*) AS foodNum FROM foodofanimalorigin ";
              $result = mysqli_query($db, $sql);
          		$row = mysqli_fetch_assoc($result);
              ?>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                Number of Food of Animal Origin
                <span class="badge badge-primary badge-pill"><?php  echo $row['foodNum'];					?></span>
              </li>
              <?php
              $sql = "SELECT count(*) AS commentNum FROM comment ";
              $result = mysqli_query($db, $sql);
          		$row = mysqli_fetch_assoc($result);
              ?>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                Number of Comments
                <span class="badge badge-primary badge-pill"><?php  echo $row['commentNum'];					?></span>
              </li>
              <?php
              $sql = "SELECT count(*) AS codeNum FROM discountcodes ";
              $result = mysqli_query($db, $sql);
          		$row = mysqli_fetch_assoc($result);
              ?>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                Number of Discount Codes
                <span class="badge badge-primary badge-pill"><?php  echo $row['codeNum'];					?></span>
              </li>
              <?php
              $sql = "SELECT count(*) AS usesNum FROM customerusesdiscount ";
              $result = mysqli_query($db, $sql);
          		$row = mysqli_fetch_assoc($result);
              ?>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                Number of Discount Codes Uses
                <span class="badge badge-primary badge-pill"><?php  echo $row['usesNum'];					?></span>
              </li>
            </ul>


					</div>
				</div>
			</div>
		</div>
	</div>

	<?php include '../footer.php' ?>

</div>

<script src="../js/jquery-3.2.1.min.js"></script>
<script src="../styles/bootstrap-4.1.3/popper.js"></script>
<script src="../styles/bootstrap-4.1.3/bootstrap.min.js"></script>
<script src="../plugins/greensock/TweenMax.min.js"></script>
<script src="../plugins/greensock/TimelineMax.min.js"></script>
<script src="../plugins/scrollmagic/ScrollMagic.min.js"></script>
<script src="../plugins/greensock/animation.gsap.min.js"></script>
<script src="../plugins/greensock/ScrollToPlugin.min.js"></script>
<script src="../plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="../plugins/easing/easing.js"></script>
<script src="../plugins/parallax-js-master/parallax.min.js"></script>
<script src="../plugins/Isotope/isotope.pkgd.min.js"></script>
<script src="../plugins/Isotope/fitcolumns.js"></script>
<script src="../js/product.js"></script>

</body>
</html>
