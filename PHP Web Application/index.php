<!DOCTYPE html>
<html lang="en">
<?php
include 'config.php';
session_start();
if(!isset($_SESSION['ID'])){
	header('Location:login.php');
}
?>

<head>
<title>orgaMIG</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="aStar Fashion Template Project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap-4.1.3/bootstrap.css">
<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
<link rel="stylesheet" type="text/css" href="styles/main_styles.css">
<link rel="stylesheet" type="text/css" href="styles/responsive.css">
</head>
<body>

<div class="super_container">

	<?php include 'sidebar.php' ?>

	<!-- Home -->

	<div class="home">

		<!-- Home Slider -->
		<div class="home_slider_container">
			<div class="owl-carousel owl-theme home_slider">

				<!-- Slide -->
				<div class="owl-item">
					<div class="background_image" style="background-image:url(images/organic1.jpg)"></div>
					<div class="home_content_container">
						<div class="home_content">
							<div class="home_discount d-flex flex-row align-items-end justify-content-start">
								<!-- <div class="home_discount_num">20</div> -->
								<!-- <div class="home_discount_text">Discount on the</div> -->
							</div>
							<div class="home_title">Organic Products!</div>
							<div class="button button_1 home_button trans_200"><a href="index.php">Shop NOW!</a></div>
						</div>
					</div>
				</div>

				<!-- Slide -->
				<div class="owl-item">
					<div class="background_image" style="background-image:url(images/organic2.jpg)"></div>
					<div class="home_content_container">
						<div class="home_content">
							<div class="home_discount d-flex flex-row align-items-end justify-content-start">
								<!-- <div class="home_discount_num">20</div> -->
								<!-- <div class="home_discount_text">Discount on the</div> -->
							</div>
							<div class="home_title">Healthy!</div>
							<div class="button button_1 home_button trans_200"><a href="index.php">Shop NOW!</a></div>
						</div>
					</div>
				</div>

				<!-- Slide -->
				<div class="owl-item">
					<div class="background_image" style="background-image:url(images/organic3.jpg)"></div>
					<div class="home_content_container">
						<div class="home_content">
							<div class="home_discount d-flex flex-row align-items-end justify-content-start">
								<!-- <div class="home_discount_num">20</div> -->
								<!-- <div class="home_discount_text">Discount on the</div> -->
							</div>
							<div class="home_title">Fresh!</div>
							<div class="button button_1 home_button trans_200"><a href="index.php">Shop NOW!</a></div>
						</div>
					</div>
				</div>

			</div>

			<!-- Home Slider Navigation -->
			<div class="home_slider_nav home_slider_prev trans_200"><div class=" d-flex flex-column align-items-center justify-content-center"><img src="images/prev.png" alt=""></div></div>
			<div class="home_slider_nav home_slider_next trans_200"><div class=" d-flex flex-column align-items-center justify-content-center"><img src="images/next.png" alt=""></div></div>

		</div>
	</div>

	<!-- Boxes -->

	<div class="boxes">
		<div class="section_container">
			<div class="container">
				<div class="row">

					<!-- Box -->
					<div class="col-lg-4 box_col">
						<div class="box">
							<div class="box_title trans_200"><button class="filtering meat"><img src="images/meat.png" alt="" width="20" height="30">   Food of Animal Origin</button></div>
						</div>
					</div>

					<!-- Box -->
					<div class="col-lg-4 box_col">
						<div class="box">
							<div class="box_title trans_200"><button class="filtering fruits"><img src="images/fruits.png" alt="" width="20" height="30">   Fruits and Vegetables</a></div>
						</div>
					</div>

					<!-- Box -->
					<div class="col-lg-4 box_col">
						<div class="box">
							<div class="box_title trans_200"><button class="filtering milk"><img src="images/milk.png" alt="" width="20" height="30">     Milk and Milk Products</a></div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>

	<!-- Products -->

	<div class="products">
		<div class="section_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="products_container grid" id="all">

							<?php
							$sql="SELECT * FROM product";
							$sorgu=mysqli_query($db,$sql);
							while( $sonuc=mysqli_fetch_assoc($sorgu) ){

									if($sonuc['isDeleted'] ==1 ){
										continue;
									}
							?>

							<div class="product grid-item hot"?>
								<div class="product_inner">
									<div class="product_image">
										<?php
										if ($sonuc['image']) {
											echo '<img src="data:image/jpeg;base64,'.base64_encode( $sonuc['image'] ).'" alt="" height="300" width="300"/>';
										}

										else{
											echo '<img src="images/noimage.png" alt="" height="300" width="300" />';
										} ?>

									</div>
									<div class="product_content text-center">
										<div class="product_title"><a href="product.php"><?php echo $sonuc['name']; ?></a></div>
										<div class="product_price">$ <?php echo $sonuc['price']; ?></div>
										<p>Stock: <?php echo $sonuc['stock']; ?></p>
										<p>Manufacturer Name: <?php echo mysqli_fetch_assoc(mysqli_query($db, "SELECT DISTINCT name FROM Manufacturer WHERE ID = '$sonuc[ManufacturerID]' "))['name'] ?></p>
										<?php if($sonuc['stock']>0){
										?>
										<div  data-toggle="modal" data-target="#product<?php echo $sonuc['ID'] ?>" class="product_button ml-auto mr-auto trans_200"><a>add to cart</a></div>
										<?php

									} else{
										?> 	<div  data-toggle="modal"  class="product_button ml-auto mr-auto trans_200" disabled><a disabled>add to cart</a></div>
										<?php
									} ?>
										<!-- Modal -->
										<div class="modal fade" id="product<?php echo $sonuc['ID'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
										  <div class="modal-dialog modal-dialog-centered" role="document">
												<form class="" action="addToCart.php?userID=<?php echo $_SESSION['ID'] ?>&prodID=<?php echo $sonuc['ID'] ?>" method="POST">
													<div class="modal-content">
											      <div class="modal-header">
											        <h5 class="modal-title" id="exampleModalLongTitle"><?php echo $sonuc['name']; ?></h5>
											        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
											          <span aria-hidden="true">&times;</span>
											        </button>
											      </div>
											      <div class="modal-body">
											        <?php echo "Product Name: " . $sonuc['name'] . "<br>";
															if ($sonuc['image']) {
																echo '<img src="data:image/jpeg;base64,'.base64_encode( $sonuc['image'] ).'" alt="" height="300" width="300"/>';
															}

															else{
																echo '<img src="images/noimage.png" alt="" height="300" width="300" />';
															}
															echo "<br>Price: $" . $sonuc['price'];

															echo "<br>Remaining Stock: ".$sonuc['stock']; ?>
															<br>
															<input type="number" name="quantity" min="1" max="<?php echo $sonuc['stock'] ?>" value="1">
																													
											      </div>
											      <div class="modal-footer">
											        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
											        <button type="submit" name="addToCart" class="btn btn-primary">Add to Cart</button>
											      </div>
											    </div>
												</form>
										  </div>
										</div>
									</div>
								</div>
							</div>
							<?php
							}
							?>
						</div>

						<div class="products_container grid" id="milk_pr">

							<?php
							$sql="SELECT * FROM product, MilkAndMilkProducts WHERE product.ID = MilkAndMilkProducts.ProductID";
							$sorgu=mysqli_query($db,$sql);
							while( $sonuc=mysqli_fetch_assoc($sorgu) ){

									if($sonuc['isDeleted'] ==1 ){
										continue;
									}
							?>

							<div class="product grid-item hot"?>
								<div class="product_inner">
									<div class="product_image">
										<?php
										if ($sonuc['image']) {
											echo '<img src="data:image/jpeg;base64,'.base64_encode( $sonuc['image'] ).'" alt="" height="300" width="300"/>';
										}

										else{
											echo '<img src="images/noimage.png" alt="" height="300" width="300" />';
										} ?>

									</div>
									<div class="product_content text-center">
										<div class="product_title"><a href="product.php"><?php echo $sonuc['name']; ?></a></div>
										<div class="product_price">$ <?php echo $sonuc['price']; ?></div>
										<p>Stock: <?php echo $sonuc['stock']; ?></p>
										<?php if($sonuc['stock']>0){
										?>
										<p>Amount of Milk Sugar: <?php echo $sonuc['amountOfMilkSugar']; ?></p>
										<p>Manufacturer Name: <?php echo mysqli_fetch_assoc(mysqli_query($db, "SELECT DISTINCT name FROM Manufacturer WHERE ID = '$sonuc[ManufacturerID]' "))['name'] ?></p>
										<div  data-toggle="modal" data-target="#productt<?php echo $sonuc['ID'] ?>" class="product_button ml-auto mr-auto trans_200"><a>add to cart</a></div>
										<?php

										} else{
										?> 	<div  data-toggle="modal"  class="product_button ml-auto mr-auto trans_200" disabled><a disabled>add to cart</a></div>
										<?php
										} ?>										<!-- Modal -->
										<div class="modal fade" id="productt<?php echo $sonuc['ID'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
										  <div class="modal-dialog modal-dialog-centered" role="document">
												<form class="" action="addToCart.php?userID=<?php echo $_SESSION['ID'] ?>&prodID=<?php echo $sonuc['ID'] ?>" method="POST">
													<div class="modal-content">
											      <div class="modal-header">
											        <h5 class="modal-title" id="exampleModalLongTitle"><?php echo $sonuc['name']; ?></h5>
											        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
											          <span aria-hidden="true">&times;</span>
											        </button>
											      </div>
											      <div class="modal-body">
											        <?php echo "Product Name: " . $sonuc['name'] . "<br>";
															if ($sonuc['image']) {
																echo '<img src="data:image/jpeg;base64,'.base64_encode( $sonuc['image'] ).'" alt="" height="300" width="300"/>';
															}

															else{
																echo '<img src="images/noimage.png" alt="" height="300" width="300" />';
															}
															echo "<br>Price: $" . $sonuc['price'];

															echo "<br>Remaining Stock: ".$sonuc['stock']; ?>
															<input type="number" name="quantity" min="1" max="<?php echo $sonuc['stock'] ?>" value="1" >

											      </div>
											      <div class="modal-footer">
											        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
											        <button type="submit" name="addToCart" class="btn btn-primary">Add to Cart</button>
											      </div>
											    </div>
												</form>
										  </div>
										</div>
									</div>
								</div>
							</div>
							<?php

							}
							?>
						</div>

						<div class="products_container grid" id="meat_pr">

							<?php
							$sql="SELECT * FROM product, FoodOfAnimalOrigin WHERE product.ID = FoodOfAnimalOrigin.ProductID";
							$sorgu=mysqli_query($db,$sql);
							while( $sonuc=mysqli_fetch_assoc($sorgu) ){

									if($sonuc['isDeleted'] ==1 ){
										continue;
									}
							?>

							<div class="product grid-item hot"?>
								<div class="product_inner">
									<div class="product_image">
										<?php
										if ($sonuc['image']) {
											echo '<img src="data:image/jpeg;base64,'.base64_encode( $sonuc['image'] ).'" alt="" height="300" width="300"/>';
										}

										else{
											echo '<img src="images/noimage.png" alt="" height="300" width="300" />';
										} ?>

									</div>
									<div class="product_content text-center">
										<div class="product_title"><a href="product.php"><?php echo $sonuc['name']; ?></a></div>
										<div class="product_price">$ <?php echo $sonuc['price']; ?></div>
										<p>Stock: <?php echo $sonuc['stock']; ?></p>
										<p>Meat Type: <?php echo $sonuc['meatType']; ?></p>
										<p>Manufacturer Name: <?php echo mysqli_fetch_assoc(mysqli_query($db, "SELECT DISTINCT name FROM Manufacturer WHERE ID = '$sonuc[ManufacturerID]' "))['name'] ?></p>
										<?php if($sonuc['stock']>0){
										?>
										<div  data-toggle="modal" data-target="#producttt<?php echo $sonuc['ID'] ?>" class="product_button ml-auto mr-auto trans_200"><a>add to cart</a></div>
										<?php

										} else{
										?> 	<div  data-toggle="modal"  class="product_button ml-auto mr-auto trans_200" disabled><a disabled>add to cart</a></div>
										<?php
										} ?>										<!-- Modal -->
										<div class="modal fade" id="producttt<?php echo $sonuc['ID'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
										  <div class="modal-dialog modal-dialog-centered" role="document">
												<form class="" action="addToCart.php?userID=<?php echo $_SESSION['ID'] ?>&prodID=<?php echo $sonuc['ID'] ?>" method="POST">
													<div class="modal-content">
											      <div class="modal-header">
											        <h5 class="modal-title" id="exampleModalLongTitle"><?php echo $sonuc['name']; ?></h5>
											        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
											          <span aria-hidden="true">&times;</span>
											        </button>
											      </div>
											      <div class="modal-body">
											        <?php echo "Product Name: " . $sonuc['name'] . "<br>";
															if ($sonuc['image']) {
																echo '<img src="data:image/jpeg;base64,'.base64_encode( $sonuc['image'] ).'" alt="" height="300" width="300"/>';
															}

															else{
																echo '<img src="images/noimage.png" alt="" height="300" width="300" />';
															}
															echo "<br>Price: $" . $sonuc['price'];

															echo "<br>Remaining Stock: ".$sonuc['stock']; ?>
															<input type="number" name="quantity" min="1" max="<?php echo $sonuc['stock'] ?>" value="1" >

											      </div>
											      <div class="modal-footer">
											        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
											        <button type="submit" name="addToCart" class="btn btn-primary">Add to Cart</button>
											      </div>
											    </div>
												</form>
										  </div>
										</div>
									</div>
								</div>
							</div>
							<?php

							}
							?>
						</div>

						<div class="products_container grid" id="fruits_pr">

							<?php
							$sql="SELECT * FROM product, FruitsAndVegetables WHERE product.ID = FruitsAndVegetables.ProductID";
							$sorgu=mysqli_query($db,$sql);
							while( $sonuc=mysqli_fetch_assoc($sorgu) ){

									if($sonuc['isDeleted'] ==1 ){
										continue;
									}
							?>

							<div class="product grid-item hot"?>
								<div class="product_inner">
									<div class="product_image">
										<?php
										if ($sonuc['image']) {
											echo '<img src="data:image/jpeg;base64,'.base64_encode( $sonuc['image'] ).'" alt="" height="300" width="300"/>';
										}

										else{
											echo '<img src="images/noimage.png" alt="" height="300" width="300" />';
										} ?>

									</div>
									<div class="product_content text-center">
										<div class="product_title"><a href="product.php"><?php echo $sonuc['name']; ?></a></div>
										<div class="product_price">$ <?php echo $sonuc['price']; ?></div>
										<p>Stock: <?php echo $sonuc['stock']; ?></p>
										<p>Season: <?php echo $sonuc['season']; ?></p>
										<p>Manufacturer Name: <?php echo mysqli_fetch_assoc(mysqli_query($db, "SELECT DISTINCT name FROM Manufacturer WHERE ID = '$sonuc[ManufacturerID]' "))['name'] ?></p>
										<?php if($sonuc['stock']>0){
										?>
										<div  data-toggle="modal" data-target="#productttt<?php echo $sonuc['ID'] ?>" class="product_button ml-auto mr-auto trans_200"><a>add to cart</a></div>
										<?php

										} else{
										?> 	<div  data-toggle="modal"  class="product_button ml-auto mr-auto trans_200" disabled><a disabled>add to cart</a></div>
										<?php
										} ?>										<!-- Modal -->
										<div class="modal fade" id="productttt<?php echo $sonuc['ID'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
										  <div class="modal-dialog modal-dialog-centered" role="document">
												<form class="" action="addToCart.php?userID=<?php echo $_SESSION['ID'] ?>&prodID=<?php echo $sonuc['ID'] ?>" method="POST">
													<div class="modal-content">
											      <div class="modal-header">
											        <h5 class="modal-title" id="exampleModalLongTitle"><?php echo $sonuc['name']; ?></h5>
											        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
											          <span aria-hidden="true">&times;</span>
											        </button>
											      </div>
											      <div class="modal-body">
											        <?php echo "Product Name: " . $sonuc['name'] . "<br>";
															if ($sonuc['image']) {
																echo '<img src="data:image/jpeg;base64,'.base64_encode( $sonuc['image'] ).'" alt="" height="300" width="300"/>';
															}

															else{
																echo '<img src="images/noimage.png" alt="" height="300" width="300" />';
															}
															echo "<br>Price: $" . $sonuc['price'];

															echo "<br>Remaining Stock: ".$sonuc['stock']; ?>
															<input type="number" name="quantity" min="1" max="<?php echo $sonuc['stock'] ?>" value="1" >

											      </div>
											      <div class="modal-footer">
											        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
											        <button type="submit" name="addToCart" class="btn btn-primary">Add to Cart</button>
											      </div>
											    </div>
												</form>
										  </div>
										</div>
									</div>
								</div>
							</div>
							<?php

							}
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php include 'footer.php' ?>

</div>
<?php
if(isset($_GET['message'])){
	$message = $_GET['message']
?>

<script type="text/javascript">
	alert("<?php echo $message; ?>");
</script>

<?php
}
?>

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
<script src="js/custom.js"></script>
</body>
</html>
