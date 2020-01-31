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
<title>Discount Codes</title>
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
				<div class="home_title">Discount Codes</div>
			</div>
		</div>
	</div>

	<!-- Products -->

	<div class="product">



		<!-- Product Content -->
		<div class="section_container">
			<div class="container">
        <br><br>
        <button  style="position: absolute; right: 0;" type="button" class="btn btn-warning" data-toggle="modal" data-target=".bd-example-modal-lg" >
						Add New Discount Code
				</button>
				<!-- Modal -->
				<div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-lg" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">Add New Discount Code</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
              <form class="" action="addDiscountCode.php" method="POST">
								<div class="modal-body">


                  <div class="form-group row">
                    <label for="code" class="col-md-4">Code:</label>
                    <div class="col-md-8">
                    <input type="text" class="form-control" id="code" name="code" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="usage" class="col-md-4">Number of Usage:</label>
                    <div class="col-md-8">
                    <input type="number" class="form-control" id="usage" name="usage" min="1" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="expireTime" class="col-md-4">Expire Date:</label>
                    <div class="col-md-8">
                    <input type="date" class="form-control" id="expireTime" name="expireTime"   required>
                    </div>
                  </div>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
									<button type="submit" name="addDiscountCode" class="btn btn-primary">Add Discount Code</button>
								</div>
							</form>

						</div>
					</div>
				</div>
        <br><br>

        <br><br><br>
				<div class="row">
					<div class="col">

						<?php
							$sql = "SELECT * FROM discountcodes order by expireTime desc";
							$result = mysqli_query($db, $sql);
						?>
						<table class="table table-striped" style="width: 100%;">
							<thead>
								<tr>
									<th>Code</th>
									<th>Number of Usage</th>
									<th>Expire Date</th>
                  <th>Update</th>



								</tr>
							</thead>
							<tbody>
								<?php
									while($row = mysqli_fetch_assoc($result)) { ?>
										<tr>
											<td> <?php echo $row['Code']; ?>   	</td>
											<td> <?php echo $row['numberOfUsage']; ?>   	</td>
											<td> <?php echo $row['expireTime']; ?> 	</td>
                      <td><div  data-toggle="modal" data-target="#code<?php echo $row['Code'] ?>" class="btn btn-info ml-auto mr-auto trans_200"><a>UPDATE</a></div> </td>


                      <div class="modal fade" id="code<?php echo $row['Code'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog  modal-lg" role="document">


                          <form class="" action="updateDiscountCode.php" method="POST">
                            <div class="modal-content bd-example-modal-lg">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle"> Update Discount Code <?php echo $row['Code'];  ?></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">

                                <div class="form-group row">
                                  <label for="code" class="col-md-4">Code:</label>
                                  <div class="col-md-8">
                                  <input type="text" class="form-control" id="code" name="code" value="<?php echo $row['Code']; ?>" >
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <label for="usage" class="col-md-4">Number of Usage:</label>
                                  <div class="col-md-8">
                                  <input type="number" class="form-control" id="usage" name="usage" value="<?php echo $row['numberOfUsage']; ?>" min="1">
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <label for="expireTime" class="col-md-4">Expire Date:</label>
                                  <div class="col-md-8">
                                  <input type="date" class="form-control" id="expireTime" name="expireTime" value="<?php echo $row['expireTime']; ?>"  >
                                  </div>
                                </div>

                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" name="updateDiscountCode" class="btn btn-primary">Save Changes</button>
                              </div>
                            </div>
                          </form>


                        </div>
                      </div>
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
