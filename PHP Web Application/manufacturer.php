<!DOCTYPE html>
<html lang="en">

<?php
	include 'config.php';
	session_start();
	if (!isset($_SESSION['ID'])){
		header('Location:login.php');
	}
?>

<head>
<title>Manufacturers</title>
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
				<div class="home_title">Manufacturers</div>
			</div>
		</div>
	</div>

	<!-- Products -->

	<div class="product">

		<div class="section_container">
			<div class="container">
				<br><br><br>
				<br>
				<h6>Click on manufacturer name to see comment or make comment. </h6>

				<div class="row">
					<div class="col">
						<div id="content">

							<?php 
								$sql = "SELECT DISTINCT city FROM Manufacturer";
								$result = mysqli_query($db, $sql);
							?>
							<br>
							<label>City Filtering: </label>
							<select class="custom-select custom-select-sm manufacturer_city" id="city">
								<option value="All">All</option>
								<?php
									while ($row = mysqli_fetch_assoc($result)) { 
										echo '<option value="'.$row['city'].'">'.$row['city'].'</option>';
									}
								?>
							<select><br><br>

							<?php
								$sql = "SELECT * FROM averagestar";
								$result = mysqli_query($db, $sql); ?>
							
							<table class="table table-striped" style="width: 100%;">
								<thead>
									<tr>
										<th>Manufacturer Name</th>
										<th>Manufacturer City</th>
										<th>Average Star</th>
									</tr>
								</thead>
								<tbody>
									<?php
										while($row = mysqli_fetch_assoc($result)) { ?>
											<tr>
												<td><a href="comments.php?manufacturerid=<?php echo $row['ID']; ?>" style="color: inherit; ">  <?php echo $row['Manufacturer Name']; ?>   </a>	</td>
												<td><a href="comments.php?manufacturerid=<?php echo $row['ID']; ?>" style="color: inherit; "> <?php echo $row['Manufacturer City'];?> </a></td>
												<td><a href="comments.php?manufacturerid=<?php echo $row['ID']; ?>" style="color: inherit; "> <?php echo $row['Average Star'];?> </a></td>
											</tr>
									<?php }; ?>
								</tbody>

							</table>
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
<script src="plugins/Isotope/isotope.pkgd.min.js"></script>
<script src="plugins/Isotope/fitcolumns.js"></script>
<script src="js/product.js"></script>
<script src="js/manufacturer.js"></script>
</body>
</html>
