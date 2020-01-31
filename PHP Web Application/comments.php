<!DOCTYPE html>
<html lang="en">

<?php
	include 'config.php';
	session_start();
	if (!isset($_SESSION['ID'])){
		header('Location:login.php');
	}
	if(!isset($_GET['manufacturerid']) ){
		header('Location:manufacturer.php');
	}
	$manufID = $_GET['manufacturerid'];

?>

<head>
<title>Products</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="aStar Fashion Template Project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap-4.1.3/bootstrap.css">
<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
<link rel="stylesheet" type="text/css" href="styles/product.css">
<link rel="stylesheet" type="text/css" href="styles/product_responsive.css">
</head>
<body>

<div class="super_container">

	<!-- MENU -->
	<?php include 'sidebar.php' ?>


	<?php
		$sql = "SELECT * FROM averagestar WHERE ID = '$manufID'";
		$result = mysqli_query($db, $sql);
		$line = mysqli_fetch_row($result);
		$manufName = $line[1];
	?>
	<!-- Home -->

	<div class="home">
		<div class="parallax_background parallax-window" data-parallax="scroll" data-image-src="images/organic_header.jpg" data-speed="0.8"></div>
		<div class="home_container">
			<div class="home_content">
				<div class="home_title">Comments of <?php echo $line[1];  ?> </div>
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
					<div class="col-md-4">
						<h4 style="text-align:center">Manufacturer: <?php echo $line[1];  ?></h4>
					</div>
					<div class="col-md-4">
						<h4 style="text-align:center">Average Star: <?php echo $line[3];  ?></h4>
					</div>
					<div class="col-md-4">
						<h4 style="text-align:center">City:<?php echo $line[2];  ?> </h4>
					</div>
				</div>
				<br><br>
				<div class="row">
					<div class="col">

						<?php
							$sql = "SELECT * FROM commentview WHERE ManufacturerID = '$manufID'  ORDER BY commentDate desc";
							$result = mysqli_query($db, $sql);
						?>
						<table class="table table-striped" style="width: 100%;">
							<thead>
								<tr>
									<th>Customer Name</th>
									<th>Comment </th>
									<th>Comment Star</th>
									<th>Comment Date</th>

								</tr>
							</thead>
							<tbody>
								<?php
									while($row = mysqli_fetch_assoc($result)) { ?>
										<tr>
											<td>  <?php echo $row['CustomerName']; ?>   	</td>
											<td> <?php echo $row['comment'];?> </td>
											<td> <?php echo $row['commentStar'];?> </td>
											<td><?php echo $row['commentDate'];?> </td>

										</tr>
								<?php }; ?>
							</tbody>

						</table>

					</div>
				</div>
			</div>
			<br><br>
			<h4>Make comment about <?php echo $manufName ?></h4>
			<br>

			<form action="commentprocess.php" method="get">
				<div class="form-group row">
					<input type="hidden" id="manufID" name="manufID" value="<?php echo $manufID ?>"/>
				</div>
			<div class="form-group row">
				<input type="hidden" readonly id="gizliDeger" value="Yaşamın Sırrı"/>
				<label for="inputPassword" class="col-sm-2 col-form-label">Comment</label>
				<div class="col-sm-10">
     			<textarea name="commentInput" class="form-control" id="exampleFormControlTextarea1" rows="3" required ></textarea>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Star</label>
				<div class="col-sm-10">

					<select name="starInput" class="form-control">
					  <option>5</option>
						<option>4</option>
						<option>3</option>
						<option>2</option>
						<option>1</option>
					</select>
				</div>
			</div>
			<button type="submit" class="btn btn-primary btn-lg btn-block">Make Comment</button>
		</form>
		</div>
	</div>




	<!-- Footer -->

	<footer class="footer">
		<div class="footer_content">
			<div class="section_container">
				<div class="container">
					<div class="row">

						<!-- About -->
						<div class="-3 col-md-9 footer_col">
							<div class="footer_about">
								<!-- Logo -->
								<div class="footer_logo">
									<a href="#"><div><span>orga</span>MIG</div></a>
								</div>
								<div class="footer_about_text">
									<p>Donec vitae purus nunc. Morbi faucibus erat sit amet congue mattis. Nullam fringilla faucibus urna, id dapibus erat iaculis ut. Integer ac sem.</p>
								</div>
							</div>
						</div>



						<!-- Contact -->
						<div class=" col-md-3 footer_col">
							<div class="footer_contact">
								<div class="footer_title">contact</div>
								<div class="footer_contact_list">
									<ul>
										<li class="d-flex flex-row align-items-start justify-content-start"><span>C.</span><div>orgaMIG</div></li>
										<li class="d-flex flex-row align-items-start justify-content-start"><span>A.</span><div>Hacettepe University</div></li>
										<li class="d-flex flex-row align-items-start justify-content-start"><span>T.</span><div>+90 555 55 55</div></li>
										<li class="d-flex flex-row align-items-start justify-content-start"><span>E.</span><div>info@orgamig.com</div></li>
									</ul>
								</div>
							</div>
						</div>


					</div>
				</div>
			</div>
		</div>

		<!-- Credits -->
		<div class="credits">
			<div class="section_container">
				<div class="container">
					<div class="row">
						<div class="col">
							<div class="credits_content d-flex flex-row align-items-center justify-content-end">
								<div class="credits_text"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>

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
