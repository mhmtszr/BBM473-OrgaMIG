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
<title>Admin Dashboard</title>
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
				<div class="home_title">Admin Dashboard</div>
			</div>
		</div>
	</div>

	<!-- Products -->

	<div class="product">



		<!-- Product Content -->
		<div class="section_container">
			<div class="container">

				<br><br><br>
				<div class="row">
					<div class="col">
						<ul class="list-group">
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
						 $date= date("Y-m-d") ;

						 $sql = "  SELECT COUNT(*) AS todayOrders FROM orders where orderDate like '%$date%' ";
						 $result = mysqli_query($db, $sql);
						 $row = mysqli_fetch_assoc($result);
						 ?>
						 <li class="list-group-item d-flex justify-content-between align-items-center">
							 Today given order on orgaMIG
							 <span class="badge badge-primary badge-pill"><?php  echo $row['todayOrders'];					?></span>
						 </li>


					 </ul>
					</div>
				</div>

<br><br><br>

				<div class="row">
					<div class="col">
						<h3>Last 10 Item Adding to Shopping Carts</h3>
						<?php
						$sql = "SELECT amountOfProduct,addedDate,name,price,firstName,lastName,mailAddress FROM shoppingcart,product,customer WHERE CustomerID = customer.ID AND ProductID = product.ID AND OrderID = 0  Order by addedDate desc limit 10";
						  $result = mysqli_query($db, $sql);
						?>
						<table name="comments" id="comments" class="table table-striped" style="width: 100%;">
						  <thead>
						    <tr>
						      <th>Amount of Product</th>
						      <th>Added Date</th>
						      <th>Name of Product</th>
						      <th>Price</th>
						      <th>First Name</th>
						      <th>Last Name</th>
						      <th>Mail Address</th>

						    </tr>
						  </thead>
						  <tbody>
						    <?php
						      while($row = mysqli_fetch_assoc($result)) { ?>
						        <tr>
						          <td>  <?php echo $row['amountOfProduct']; ?>   	</td>
						          <td>  <?php echo $row['addedDate']; ?>   	</td>
						          <td> <?php echo $row['name'];?> </td>
						          <td> <?php echo $row['price'];?> </td>
						          <td>  <?php echo $row['firstName']; ?>   	</td>
						          <td>  <?php echo $row['lastName']; ?>   	</td>
						          <td> <?php echo $row['mailAddress'];?> </td>



						        </tr>
						    <?php }; ?>
						  </tbody>

						</table>
								</div>
				</div>
				<br><br>
				<hr>
				<br><br>
				<div class="row">
					<div class="col">
						<h3>Last 10 Discount Code Usage by Customers</h3>
						<?php
						$sql = "SELECT firstName,lastName,DiscountCode,usageDate FROM customerusesdiscount, customer WHERE CustomerID = ID  Order by usageDate desc limit 10";
							$result = mysqli_query($db, $sql);
						?>
						<table name="comments" id="comments" class="table table-striped" style="width: 100%;">
							<thead>
								<tr>
									<th>First Name</th>
									<th>Last Name</th>
									<th>Discount Code</th>
									<th>Usage Date</th>

								</tr>
							</thead>
							<tbody>
								<?php
									while($row = mysqli_fetch_assoc($result)) { ?>
										<tr>
											<td>  <?php echo $row['firstName']; ?>   	</td>
											<td>  <?php echo $row['lastName']; ?>   	</td>
											<td> <?php echo $row['DiscountCode'];?> </td>
											<td> <?php echo $row['usageDate'];?> </td>

										</tr>
								<?php }; ?>
							</tbody>

						</table>
					</div>
				</div>


				<br><br>
				<hr>
				<br><br>
				<div class="row">
					<div class="col">
						<h3>Last 10 Order</h3>
						<?php
						$sql = "SELECT  firstName,lastName,orders.address AS ordAddr, paymentType, totalCost, orderDate FROM orders, customer WHERE CustomerID = customer.ID  Order by orderDate desc limit 10";
							$result = mysqli_query($db, $sql);
						?>
						<table name="comments" id="comments" class="table table-striped" style="width: 100%;">
							<thead>
								<tr>
									<th>First Name</th>
									<th>Last Name</th>
									<th>Address</th>
									<th>Payment Type</th>
									<th>Total Cost</th>
									<th>Order Date</th>
								</tr>
							</thead>
							<tbody>
								<?php
									while($row = mysqli_fetch_assoc($result)) { ?>
										<tr>
											<td>  <?php echo $row['firstName']; ?>   	</td>
											<td>  <?php echo $row['lastName']; ?>   	</td>
											<td> <?php echo $row['ordAddr'];?> </td>
											<td> <?php echo $row['paymentType'];?> </td>
											<td> <?php echo $row['totalCost'];?> </td>
											<td> <?php echo $row['orderDate'];?> </td>

										</tr>
								<?php }; ?>
							</tbody>

						</table>
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
