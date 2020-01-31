<!DOCTYPE html>
<html lang="en">

<?php
	include 'config.php';
	session_start();
	if (!isset($_SESSION['ID'])){
		header('Location:login.php');
	}
  $userID= $_SESSION['ID'];
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
<link rel="stylesheet" type="text/css" href="styles/manufacturer.css">
</head>
<body>

<div class="super_container">

	<?php include 'sidebar.php' ?>

	<!-- Home -->

	<div class="home">
		<div class="parallax_background parallax-window" data-parallax="scroll" data-image-src="images/organic_header.jpg" data-speed="0.8"></div>
		<div class="home_container">
			<div class="home_content">
				<div class="home_title">Profile</div>

			</div>
		</div>
	</div>

	<!-- Products -->

	<div class="product">

		<?php
			$sql = " SELECT * FROM customer WHERE ID= $userID ";
			$result = mysqli_query($db, $sql);
			$row = mysqli_fetch_row($result);
		?>
		<!-- Product Content -->
		<div class="section_container">
			<div class="container">
				<div class="row">
					<div class="col">


            <br><br>
            <form action="profileprocess.php" method="POST">
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="inputName">Name</label>
                  <input type="text" class="form-control" id="inputName" name="inputName" value="<?php echo $row[1] ?>">
                </div><div class="form-group col-md-6">
                  <label for="inputsurname">Surname</label>
                  <input type="text" class="form-control" id="inputsurname" name="inputsurname" value="<?php echo $row[2] ?>">
                </div>
                <div class="form-group col-md-6">
                  <label for="inputEmail4">Email</label>
                  <input type="email" class="form-control" id="inputEmail4" name="inputEmail4" value="<?php echo $row[3] ?>" readonly>
                </div>
                <div class="form-group col-md-6">
                  <label for="inputphone">Phone Number</label>
                  <input type="text" class="form-control" id="inputphone" name="inputphone" value="<?php echo $row[5] ?>" readonly>
                </div>
              </div>
              <div class="form-group">
                <label for="inputAddress">Address</label>
                <input type="text" class="form-control" id="inputAddress" name="inputAddress" value="<?php echo $row[6] ?>">
              </div>
              <button type="submit" name="saveChanges" class="btn btn-primary">Save Changes</button>
            </form>
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
