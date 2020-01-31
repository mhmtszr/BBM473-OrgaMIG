<!DOCTYPE html>
<html lang="en">

<?php
	include 'config.php';
	session_start();
	if (!isset($_SESSION['ID'])){
		header('Location:login.php');
    }
    $customerID = $_SESSION['ID'];
?>

<head>
<title>Customers</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="aStar Fashion Template Project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap-4.1.3/bootstrap.css">
<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
<link rel="stylesheet" type="text/css" href="styles/manufacturer.css">
</head>
<body>

<div class="super_container">

	<!-- MENU -->
	<?php include 'sidebar.php' ?>
	<!-- Home -->

	<div class="home">
		<div class="parallax_background parallax-window" data-parallax="scroll" data-image-src="images/organic_header.jpg" data-speed="0.8"></div>
		<div class="home_container">
			<div class="home_content">
				<div class="home_title">My Orders</div>
			</div>
		</div>
	</div>

	<!-- Products -->

	<div class="product">

		<!-- Product Content -->
		<div class="section_container">
			<div class="container">
        <br><br>

        <div class="row">
          <div class="col">

              <?php
                  $sql = "SELECT * FROM Orders WHERE CustomerID = '$customerID' ORDER BY orderDate desc";
                  $result = mysqli_query($db, $sql);
              ?>

              <table class="table table-striped" style="width: 100%;">
                  <thead>
                      <tr>
                          <th>Order Date</th>
                          <th>Address</th>
                          <th>Payment Type</th>
                          <th>Total Cost</th>
                          <th>Details</th>
                      </tr>
                  </thead>
                  <tbody>
						<?php
							while($row = mysqli_fetch_assoc($result)) { ?>
								<tr>
									<td> <?php echo $row['orderDate']; ?> </td>
									<td> <?php echo $row['address']; ?> </td>
									<td> <?php echo $row['paymentType']; ?> </td>
									<td> <?php echo $row['totalCost']; ?> </td>
									<td><div  data-toggle="modal" data-target="#code<?php echo $row['ID'] ?>" class="btn btn-info ml-auto mr-auto trans_200"><a>Details</a></div></td>
								</tr>
								
								<div class="modal fade" id="code<?php echo $row['ID'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
									<div class="modal-dialog  modal-lg" role="document">
										<div class="modal-content bd-example-modal-lg">
											<div class="modal-header">
													<h5 class="modal-title" id="exampleModalLongTitle"> Details of Order ID <?php echo $row['ID']; ?></h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
															<span aria-hidden="true">&times;</span>
													</button>
											</div>
											
											<div class="modal-body">
												<div class="row">
													<div class="col-md-1">
													</div>
													<div class="col-md-4">
														<b>Product Name</b>
													</div>
													<div class="col-md-4">
														<b>Manufacturer Name</b>
													</div>
													<div class="col-md-1">
														<b>Amount</b>
													</div>
													<div class="col-md-2">
														<b>Price</b>
													</div>
												</div><br><br>

												<?php
														$sql = "SELECT Product.name as productname, Manufacturer.name as manufname, amountOfProduct, price, image FROM ShoppingCart, Product, Manufacturer WHERE ShoppingCart.CustomerID = '$customerID' AND ShoppingCart.ProductID = Product.ID AND Manufacturer.ID = Product.ManufacturerID;";
														$query = mysqli_query($db, $sql);
														while($row = mysqli_fetch_assoc($query)) {
												?>

												<div class="row">
													<div class="col-md-1">
														<?php
															if ($row['image']) {
																	echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['image'] ).'" alt="" height="40" width="40"/>';
															}

															else{
																	echo '<img src="images/noimage.png" alt="" height="40" width="40" />';
															}
														?>
														</div>
														<div class="col-md-4">
															<?php echo $row['productname']; ?>
														</div>
														<div class="col-md-4">
															<?php echo $row['manufname']; ?>
														</div>
														<div class="col-md-1">
															<?php echo $row['amountOfProduct']; ?>
														</div>
														<div class="col-md-2">
															<?php echo '₺' . $row['amountOfProduct'] * $row['price']; ?>
														</div>
													</div>
													<br><br>
													<?php }; ?>
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
													</div>
													</div>
												</div>
										</div>
				<?php }; ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>

	<?php include 'footer.php' ?>

</div>

<script src="js/jquery-3.2.1.min.js"></script>
<script src="styles/bootstrap-4.1.3/popper.js"></script>
<script src="styles/bootstrap-4.1.3/bootstrap.min.js"></script>
<script src="plugins/greensock/TweenMax.min.js"></script>
<script src="plugins/greensock/TimelineMax.min.js"></script>
<script src="plugins/scrollmagic/ScrollMagic.min.js"></script>
<script src="plugins/greensock/animation.gsap.min.js"></script>
<script src="plugins/greensock/ScrollToPlugin.min.js"></script>
<script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="plugins/easing/easing.js"></script>
<script src="plugins/parallax-js-master/parallax.min.js"></script>
<script src="plugins/Isotope/isotope.pkgd.min.js"></script>
<script src="plugins/Isotope/fitcolumns.js"></script>
<script src="js/product.js"></script>
</body>
</html>
