<?php
	include 'config.php';
	session_start();
	if(!isset($_SESSION['ID'])){
		header('Location:login.php');
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Checkout</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="aStar Fashion Template Project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap-4.1.3/bootstrap.css">
<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
<link rel="stylesheet" type="text/css" href="styles/checkout.css">
<link rel="stylesheet" type="text/css" href="styles/checkout_responsive.css">
</head>
<body>

<div class="super_container">

	<?php include 'sidebar.php' ?>

	<?php 
		$customerID = $_SESSION['ID'];

		$sql = "SELECT SUM(Product.price * ShoppingCart.amountOfProduct) as 'Total' FROM Product, ShoppingCart WHERE ShoppingCart.OrderID = 0 AND ShoppingCart.CustomerID = '$customerID' AND ShoppingCart.ProductID = Product.ID;";
		$query = mysqli_query($db, $sql);
		$result = mysqli_fetch_assoc($query);
	?>
	<!-- Home -->

	<div class="home">
		<div class="parallax_background parallax-window" data-parallax="scroll" data-image-src="images/organic_header.jpg" data-speed="0.8"></div>
		<div class="home_container">
			<div class="home_content">
				<div class="home_title">Checkout</div>
				<div class="breadcrumbs">
					<ul class="d-flex flex-row align-items-center justify-content-start">
						<li><a href="index.html">Home</a></li>
						<li><a href="cart.php">Your Cart</a></li>
						<li>Checkout</li>
					</ul>
				</div>
			</div>
		</div>
	</div>

	<!-- Checkout -->

	<div class="checkout">
		<div class="section_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="checkout_container d-flex flex-xxl-row flex-column align-items-start justify-content-start">

							<!-- Billing -->
							<div class="billing checkout_box">
								<div class="checkout_title">Billing Address</div>
								<div class="checkout_form_container">
									<form action="#" id="checkout_form" class="checkout_form">
										<div>
											<!-- Address -->
											<label for="checkout_address">Address*</label>
											<input type="text" id="checkout_address" class="checkout_input" required="required">
										</div>
									</form>
								</div>
							</div>
							<br><br><br>
							<div class="billing checkout_box">
								<div class="checkout_title">Coupon Code</div>
								<div class="checkout_form_container">
								<div class="coupon_form_container">
									<input type="text" class="coupon_input" id="coupon_input" required="required" name="code">
									<button id="coupon_button" class="coupon_button">apply code</button>
									
								</div>
								</div>
							</div>

							<br><br><br>
							<div class="billing checkout_box">
								<div class="checkout_title">Payment Method</div>
								<div class="shipping">
								<ul>
									<li class="shipping_option d-flex flex-row align-items-center justify-content-start">
										<label class="radio_container">
											<input type="radio" id="radio_1" name="shipping_radio" class="shipping_radio" value="Credit Cart">
											<span class="radio_mark"></span>
											<span class="radio_text">Credit Cart</span>
										</label>
									</li>
									<li class="shipping_option d-flex flex-row align-items-center justify-content-start">
										<label class="radio_container">
											<input type="radio" id="radio_2" name="shipping_radio" class="shipping_radio" value="Cash" checked>
											<span class="radio_mark"></span>
											<span class="radio_text">Cash</span>
										</label>
									</li>
									<li class="shipping_option d-flex flex-row align-items-center justify-content-start">
										<label class="radio_container">
											<input type="radio" id="radio_3" name="shipping_radio" class="shipping_radio" value="Sodexo">
											<span class="radio_mark"></span>
											<span class="radio_text">Sodexo</span>
										</label>
									</li>
								</ul>
							</div>
							</div>
							<!-- Cart Total -->
							<div class="cart_total">
								<div class="cart_total_inner checkout_box">
									<div class="checkout_title">Cart total</div>
									<ul class="cart_extra_total_list">
										<li class="d-flex flex-row align-items-center justify-content-start">
											<div class="cart_extra_total_title">Subtotal</div>
											<script type="text/javascript">var total = <?php echo $result['Total'] ?>; </script>
											<div class="cart_extra_total_value ml-auto"><?php echo '₺' . $result['Total']; ?></div>
										</li>
										<li class="d-flex flex-row align-items-center justify-content-start">
											<div class="cart_extra_total_title">Code</div>
											<div id="div_code_status" class="cart_extra_total_value ml-auto">Not Used</div>
										</li>
										<li class="d-flex flex-row align-items-center justify-content-start">
											<div class="cart_extra_total_title">Total</div>
											<div id="div_total" class="cart_extra_total_value ml-auto"><?php echo '₺' . $result['Total']; ?></div>
										</li>
									</ul>

									<div class="checkout_button trans_200" id="checkout_button"><button id="order_button" class="order_button">Give order</button></div>
								</div>
							</div>

						</div>
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
<script src="js/checkout.js"></script>
</body>
</html>