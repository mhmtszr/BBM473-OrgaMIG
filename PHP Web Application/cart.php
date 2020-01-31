
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
<title>Cart</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="aStar Fashion Template Project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap-4.1.3/bootstrap.css">
<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
<link rel="stylesheet" type="text/css" href="styles/cart.css">
<link rel="stylesheet" type="text/css" href="styles/cart_responsive.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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
				<div class="home_title">Cart</div>
				<div class="breadcrumbs">
					<ul class="d-flex flex-row align-items-center justify-content-start">
						<li><a href="index.php">Home</a></li>
						<li>Your Cart</li>
					</ul>
				</div>
			</div>
		</div>
	</div>

	<!-- Cart -->

	<div class="cart_section">
		<div class="section_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="cart_container">

							<!-- Cart Bar -->
							<div class="cart_bar">
								<ul class="cart_bar_list item_list d-flex flex-row align-items-center justify-content-start">
									<li>Product</li>
									<li>Remaining Stock</li>
									<li>Price</li>
									<li>Quantity</li>
									<li>Total</li>
								</ul>
							</div>

							<!-- Cart Items -->
							<div class="cart_items">
								<ul class="cart_items_list">
									<?php
									$mail = $_SESSION['mailAddress'];
									$customerID = $_SESSION['ID'];

									$sql="SELECT DISTINCT product.ID as id, product.name, amountOfProduct, image, product.stock AS 'Remaining Stock', product.price AS 'Unit Price' FROM shoppingcart,product,manufacturer WHERE CustomerID = '$customerID' AND product.isDeleted = 0 AND manufacturer.isDeleted = 0 AND OrderID=0 AND shoppingcart.productID = product.ID  ";
									$sorgu=mysqli_query($db,$sql);
									while( $sonuc=mysqli_fetch_assoc($sorgu) ){
									?>
									<!-- Cart Item -->
									<li class="cart_item item_list d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-start">

										<div class="product d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-start">
											<div><div class="product_image"><?php
											if ($sonuc['image']) {
												echo '<img src="data:image/jpeg;base64,'.base64_encode( $sonuc['image'] ).'" alt="" height="150" width="150"/>';
											}

											else{
												echo '<img src="images/noimage.png" alt="" height="300" width="300" />';
											} ?>
											</div></div>
											<div class="product_name"><a href="product.html"><?php echo $sonuc['name'] ?></a></div>
										</div>
									<!--  	<div class="product_color text-lg-center product_text"><span>Manufacturer: </span><?php echo $sonuc['Manufacturer'] ?></div> -->
									 	<div class="product_size text-lg-center product_text"><span>Remaining Stock: </span> <?php echo $sonuc['Remaining Stock'] ?> </div>
										<div class="product_price text-lg-center product_text"><span>Price: </span><?php echo $sonuc['Unit Price'] ?></div>
										<div class="product_quantity_container">
											<div class="product_quantity ml-lg-auto mr-lg-auto text-center">
												<span class="product_text product_num" id="product_num"><?php echo $sonuc['amountOfProduct'] ?></span>
												<div class="qty_sub qty_button trans_200 text-center"><span>-</span></div>
												<div class="qty_add qty_button trans_200 text-center"><span>+</span></div>
												<span class="product_text product_id" id="product_id" style="display:none;"><?php echo $sonuc['id'] ?></span>
												<span class="product_text product_stock" id="stock" style="display:none;"><?php echo $sonuc['Remaining Stock'] ?></span>
											</div>
										</div>
										<div class="product_total text-lg-center product_text"><span>Total: </span><div class="product_total_cost">₺<?php echo $sonuc['Unit Price']*$sonuc['amountOfProduct'] ?></div> </div>
										<button type="button" class="close" aria-label="Close">
										  <span aria-hidden="true"><a href="addToCart.php?deleteToCart=<?php echo $sonuc['id'] ?>&amount=<?php echo $sonuc['amountOfProduct'] ?>">X</a></span>
										</button>
									</li>

								<?php } ?>
								</ul>
							</div>

							<!-- Cart Buttons -->
							<div class="cart_buttons d-flex flex-row align-items-start justify-content-start">
								<div class="cart_buttons_inner ml-auto d-flex flex-row align-items-start justify-content-start flex-wrap">
									<div class="button button_continue trans_200"><a href="index.php">continue shopping</a></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="section_container cart_extra_container">
			<div class="container">
				<div class="row">

					<!-- Cart Total -->
					<div class="col-xxl-6">
						<div class="cart_extra cart_extra_2">
							<div class="cart_extra_content cart_extra_total">
								<div class="cart_extra_title">Cart Total</div>
								<ul class="cart_extra_total_list">
									<li class="d-flex flex-row align-items-center justify-content-start">
										<div class="cart_extra_total_title">Total</div>
										<div class="cart_extra_total_value ml-auto">
										<?php
											$sql = "SELECT SUM(Product.price * ShoppingCart.amountOfProduct) as 'Total' FROM Product, ShoppingCart WHERE ShoppingCart.OrderID = 0 AND ShoppingCart.CustomerID = '$customerID' AND ShoppingCart.ProductID = Product.ID;";
											$query = mysqli_query($db, $sql);
											$result = mysqli_fetch_assoc($query);
											echo '₺' . $result['Total'];
										?>
										</div>
									</li>
								</ul>
								<div class="checkout_button trans_200"><a href="checkout.php">proceed to checkout</a></div>
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
<script src="js/cart.js"></script>
</body>
</html>
