<!DOCTYPE html>
<html lang="en">
<?php
include 'config.php';
session_start();
if(!isset($_SESSION['admin'])){
	header('Location:login.php');
}
?>
<head>
<title>Products</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="aStar Fashion Template Project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="../styles/bootstrap-4.1.3/bootstrap.css">
<link href="../plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="../plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="../plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="../plugins/OwlCarousel2-2.2.1/animate.css">
<link rel="stylesheet" type="text/css" href="../styles/main_styles.css">
<link rel="stylesheet" type="text/css" href="../styles/responsive.css">
</head>
<body>

<div class="super_container">

	<?php include 'sidebar.php' ?>

	<!-- Home -->

	<div class="home" style="height: 332px;">
		<div class="parallax_background parallax-window" data-parallax="scroll" data-image-src="../images/organic_header.jpg" data-speed="0.8"></div>
		<div class="home_container" style="position: absolute;left: 0;bottom: 98px;width: 100%;">
			<div class="home_content" style="padding-left: 60px;">
				<div class="home_title" style="font-size: 72px;font-weight: 600;color: white;line-height: 0.75;">Products</div>
			</div>
		</div>
	</div>

	<!-- Products -->

	<div class="products">
		<div class="section_container">
			<div class="container">
				<!-- Button trigger modal -->
				<button  style="position: absolute; right: 0;" type="button" class="btn btn-warning" data-toggle="modal" data-target=".bd-example-modal-lg" >
						Add New Product
				</button>

				<?php
					$manufIDs = [];
					$sql="SELECT ID, isDeleted FROM manufacturer";
						$sorgu=mysqli_query($db,$sql);
						while( $row=mysqli_fetch_assoc($sorgu) ){
							if($row['isDeleted'] ==1 ){
								continue;
							}else{
								array_push($manufIDs, $row['ID']);
							}
					} 
				?>
				<!-- Modal -->
				<div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				  	<div class="modal-dialog modal-lg" role="document">
				    	<div class="modal-content">
				      		<div class="modal-header">
				        		<h5 class="modal-title" id="exampleModalLabel">Add New Product</h5>
				        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				         			 <span aria-hidden="true">&times;</span>
				       			</button>
				   			</div>

							<form action="addProduct.php" method="POST" enctype="multipart/form-data">
				      			<div class="modal-body">
									<div class="form-group">
										<label for="productName">Product Name</label>
										<input type="text" class="form-control" id="productName"  name="productName">
									</div>

									<div class="form-group">
										<label for="type">Product Type</label>
										<select class="form-control type-selector"  id="type" name="type">
											<option name="FoodOfAnimalOrigin" value="FoodOfAnimalOrigin" id="FoodOfAnimalOrigin">Food of Animal Origin</option>
											<option name="FruitsAndVegetables" value="FruitsAndVegetables" id="FruitsAndVegetables">Fruits And Vegetables</option>
											<option name="MilkAndMilkProducts" value="MilkAndMilkProducts" id="MilkAndMilkProducts">Milk And Milk Products</option>
										</select>
									</div>

									<div class="form-group">
										<div class="meatType" id="meatType">
											<label for="meatType">Meat Type</label>
											<select class="form-control" id="meatType" name="meatType">
												<option name="Calf">Calf</option>
												<option name="Chicken">Chicken</option>
												<option name="Cow">Cow</option>
												<option name="Fish">Fish</option>
												<option name="Pork">Pork</option>
												<option name="Turkey">Turkey</option>
												<option name="Vegetarian">Vegetarian</option>
												<option name="Other">Other</option>
											</select>
										</div>

										<div class="season" id="season">
											<label for="season">Season</label>
											<select class="form-control" id="season" name="season">
												<option name="All">All</option>
												<option name="Autumn">Autumn</option>
												<option name="Spring">Spring</option>
												<option name="Summer">Summer</option>
												<option name="Winter">Winter</option>
											</select>
										</div>

										<div class="amountOfMilkSugar" id="amountOfMilkSugar">
											<label for="amountOfMilkSugar">Amount Of Milk Sugar</label>
											<input type="number" class="form-control" id="amount" name="amount" min="0" value="0" step="0.01">
										</div>
									</div>

									<div class="form-group">
										<label for="price">Price</label>
										<input type="number" class="form-control" id="price"  name="price" min=0.1 step="0.01">
									</div>

									<div class="form-group">
										<label for="stock">Stock</label>
										<input type="number" class="form-control" id="stock"  name="stock" min="1">
									</div>

									<div class="form-group">
										<label for="manufacturerID">Manufacturer ID</label>
										<select class="form-control" id="manufacturerID"  name="manufacturerID">
											<?php
												for ($i=0; $i <count($manufIDs) ; $i++) {
													echo "<option>" .$manufIDs[$i]. " </option>";
											}
											 ?>
								    	</select>
									</div>

									<div class="form-group">
										<label for="Image">Image</label>
										<input type="file" name="image" id="image" accept="image/*">
									</div>
				     			</div>

								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
									<button type="submit" name="addProduct" class="btn btn-primary">Add Product</button>
								</div>
							</form>
				    	</div>
				  </div>
				</div>
				<br><br><br>
				<br><br><br>


				<div class="row">
					<div class="col">
						<div class="products_container grid">

							<!-- Product -->
							<?php
							$sql="SELECT * FROM product";
							$sorgu=mysqli_query($db,$sql);
							while( $sonuc=mysqli_fetch_assoc($sorgu) ){
								if($sonuc['isDeleted'] ==1 ){
									continue;
								}
							?>

							<div class="product grid-item hot">
								<div class="product_inner">
									<div class="product_image">
										<?php
										if ($sonuc['image']) {
											echo '<img src="data:image/jpeg;base64,'.base64_encode( $sonuc['image'] ).'" alt="" height="300" width="300"/>';
										}

										else{
											echo '<img src="../images/noimage.png" alt="" height="300" width="300" />';
										} ?>

									</div>
									<div class="product_content text-center">
										<div class="product_title"><a href="product.php"><?php echo $sonuc['name']; ?></a></div>
										<div class="product_price">$ <?php echo $sonuc['price']; ?></div>
										<p>Stock: <?php echo $sonuc['stock']; ?></p>
										<p>Manufacturer Name: <?php echo mysqli_fetch_assoc(mysqli_query($db, "SELECT DISTINCT name FROM Manufacturer WHERE ID = '$sonuc[ManufacturerID]' "))['name'] ?></p>
										<div  data-toggle="modal" data-target="#product<?php echo $sonuc['ID'] ?>" class="product_button ml-auto mr-auto trans_200"><a>Update</a></div>
										<!-- Modal -->
										<div class="modal fade" id="product<?php echo $sonuc['ID'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
										  <div class="modal-dialog  modal-lg" role="document">


												<form class="" action="updateProduct.php" method="POST">
													<div class="modal-content bd-example-modal-lg">
											      <div class="modal-header">
											        <h5 class="modal-title" id="exampleModalLongTitle"><?php echo $sonuc['name']; ?></h5>
											        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
											          <span aria-hidden="true">&times;</span>
											        </button>
											      </div>
											      <div class="modal-body">

															<div class="form-group row">
														    <label for="productID" class="col-md-4">ID:</label>
																<div class="col-md-8">
														    <input type="text" class="form-control" id="productID" name="productID" value="<?php echo $sonuc['ID']; ?>" readonly>
																</div>
														  </div>
															<div class="form-group row">
														    <label for="productName" class="col-md-4">Product Name:</label>
																<div class="col-md-8">
														    <input type="text" class="form-control" id="productName" name="productName" value="<?php echo $sonuc['name']; ?>">
																</div>
														  </div>

											        <?php
															if ($sonuc['image']) {
																echo '<img src="data:../image/jpeg;base64,'.base64_encode( $sonuc['image'] ).'" alt="" height="300" width="300"/>';
															}

															else{
																echo '<img src="../images/noimage.png" alt="" height="300" width="300" />';
															}
															?>
															<div class="form-group row">
																<label for="price" class="col-md-4">Price:</label>
																<div class="col-md-8">
																<input type="number" class="form-control" id="price" name="price" min="1" value="<?php echo $sonuc['price']; ?>">
																</div>
															</div>

															<div class="form-group row">
														    <label for="stock" class="col-md-4">Remaining Stock</label>
																<div class="col-md-8">
														    <input type="number" class="form-control" id="stock" name="stock" min=0 value="<?php echo $sonuc['stock']; ?>">
																</div>
														  </div>

															<div class="form-group row">
														    <label for="manufID" class="col-md-4">Manufacturer ID</label>
																<div class="col-md-8">
														    <input type="text" class="form-control" id="manufID" name="manufID" value="<?php echo $sonuc['ManufacturerID']; ?>">
																</div>
														  </div>
											      </div>
											      <div class="modal-footer">
															<a href="deleteProduct.php?productID=<?php echo $sonuc['ID']; ?>">  <button type="button" class="btn btn-danger float-left">Delete Product</button> </a>
											        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
											        <button type="submit" name="updateProduct" class="btn btn-primary">Save Changes</button>
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
<script src="../js/custom.js"></script>
<script src="../js/admin_product.js"></script>
</body>
</html>
