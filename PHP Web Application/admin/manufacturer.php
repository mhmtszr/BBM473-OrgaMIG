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
<title>Manufacturers</title>
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
				<div class="home_title">Manufacturers</div>
			</div>
		</div>
	</div>

	<!-- Products -->

	<div class="product">

		<br>

		<!-- Product Content -->
		<div class="section_container">
			<div class="container">
				<button  style="position: absolute; right: 0;" type="button" class="btn btn-warning" data-toggle="modal" data-target=".bd-example-modal-lg" >
						Add New Manufacturer
				</button>
				<!-- Modal -->
				<div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-lg" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">Add New Manufacturer</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<form action="addManufacturer.php" method="post">
								<div class="modal-body">
										<div class="form-group">
											<label for="manufName">Manufacturer Name</label>
											<input type="text" class="form-control" id="manufName"  name="manufName" required>
										</div>
										<div class="form-group">
											<label for="city">City</label>
											<input type="text" class="form-control" id="city"  name="city" required>
										</div>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
									<button type="submit" name="addManuf" class="btn btn-primary">Add Manufacturer</button>
								</div>
							</form>

						</div>
					</div>
				</div>

				<br>
				<br><br>

				<div class="row">
					<br><br><br><br>
					<input class="form-control" id="name_search" type="text" placeholder="Search" aria-label="Search">
					<br>
					<div class="col">

						<?php
							$sql = "SELECT * FROM manufacturer";
							$result = mysqli_query($db, $sql);
						?>
						<table id="manufacturers" class="table table-striped" style="width: 100%;">
							<thead>
								<tr>
									<th>ID</th>
									<th>Manufacturer Name</th>
									<th>Manufacturer City</th>
									<th>Is Deleted</th>
									<th>Update</th>
									<th>Delete</th>

								</tr>
							</thead>
							<tbody>
								<?php
									while($row = mysqli_fetch_assoc($result)) { ?>
										<tr>
											<td>  <?php echo $row['ID']; ?>   	</td>
											<td>  <?php echo $row['name']; ?>   	</td>
											<td> <?php echo $row['city'];?> </td>

											<td> <?php echo $row['isDeleted'];?> </td>
											<td><div  data-toggle="modal" data-target="#manuf<?php echo $row['ID'] ?>" class="btn btn-info ml-auto mr-auto trans_200"><a>UPDATE</a></div> </td>

											<td>
												<button type="button" class="close" aria-label="Close">
													<span aria-hidden="true"><a style="color: black;" href="deleteManufacturer.php?deletedID=<?php echo $row['ID'] ?>">x</a></span>
												</button>
											</td>
											<!-- Modal -->
											<div class="modal fade" id="manuf<?php echo $row['ID'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
												<div class="modal-dialog  modal-lg" role="document">


													<form class="" action="updateManufacturer.php" method="POST">
														<div class="modal-content bd-example-modal-lg">
															<div class="modal-header">
																<h5 class="modal-title" id="exampleModalLongTitle"><?php echo $row['name']; ?></h5>
																<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																	<span aria-hidden="true">&times;</span>
																</button>
															</div>
															<div class="modal-body">

																<div class="form-group row">
																	<label for="manufID" class="col-md-4">ID:</label>
																	<div class="col-md-8">
																	<input type="text" class="form-control" id="manufID" name="manufID" value="<?php echo $row['ID']; ?>" readonly>
																	</div>
																</div>
																<div class="form-group row">
																	<label for="manufName" class="col-md-4">Manufacturer Name:</label>
																	<div class="col-md-8">
																	<input type="text" class="form-control" id="manufName" name="manufName" value="<?php echo $row['name']; ?>">
																	</div>
																</div>
																<div class="form-group row">
																	<label for="city" class="col-md-4">City:</label>
																	<div class="col-md-8">
																	<input type="text" class="form-control" id="city" name="city" value="<?php echo $row['city']; ?>">
																	</div>
																</div>

															</div>
															<div class="modal-footer">
																<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
																<button type="submit" name="updateManufacturer" class="btn btn-primary">Save Changes</button>
															</div>
														</div>
													</form>


												</div>
											</div>

										</tr>
								<?php }; ?>
							</tbody>

						</table>
						<input class="btn btn-warning" type="button" id="btnExport" value="Export" />
								<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
								<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.22/pdfmake.min.js"></script>
								<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
								<script type="text/javascript">
										$("body").on("click", "#btnExport", function () {
												html2canvas($('#manufacturers')[0], {
														onrendered: function (canvas) {
																var data = canvas.toDataURL();
																var docDefinition = {
																		content: [{
																				image: data,
																				width: 500
																		}]
																};
																pdfMake.createPdf(docDefinition).download("manufacturerTable.pdf");
														}
												});
										});
								</script>
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
<script src="../js/admin_manufacturer.js"></script>
</body>
</html>
