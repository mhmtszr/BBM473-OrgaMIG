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
<title>Comments</title>
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
				<div class="home_title">Comments</div>
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
					<br><br><br><br>
					<input class="form-control" id="name_search" type="text" placeholder="Search" aria-label="Search">
					<br>
					<div class="col">

						<?php
							$sql = "SELECT * FROM commentview";
							$result = mysqli_query($db, $sql);
						?>
						<table name="comments" id="comments" class="table table-striped" style="width: 100%;">
							<thead>
								<tr>
									<th>Customer ID</th>
									<th>Customer Name</th>
									<th>Manufacturer ID</th>
									<th>Manufacturer Name</th>
									<th>Manufacturer City</th>
									<th>Comment</th>
									<th>Comment Date</th>
									<th>Comment Star</th>
									<th>Delete</th>

								</tr>
							</thead>
							<tbody>
								<?php
									while($row = mysqli_fetch_assoc($result)) { ?>
										<tr>
											<td>  <?php echo $row['ID']; ?>   	</td>
											<td>  <?php echo $row['CustomerName']; ?>   	</td>
											<td> <?php echo $row['ManufacturerID'];?> </td>
											<td> <?php echo $row['ManufacturerName'];?> </td>
											<td>  <?php echo $row['ManufacturerCity']; ?>   	</td>
											<td>  <?php echo $row['comment']; ?>   	</td>
											<td>  <?php echo $row['commentDate']; ?>   	</td>
											<td> <?php echo $row['commentStar'];?> </td>
											<td>
												<button type="button" class="close" aria-label="Close">
													<span aria-hidden="true"><a style="color: black;" href="deleteComment.php?deletedID=<?php echo $row['ID'] ?>">x</a></span>
												</button>
											</td>


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
						            html2canvas($('#comments')[0], {
						                onrendered: function (canvas) {
						                    var data = canvas.toDataURL();
						                    var docDefinition = {
						                        content: [{
						                            image: data,
						                            width: 500
						                        }]
						                    };
						                    pdfMake.createPdf(docDefinition).download("commentsTable.pdf");
						                }
						            });
						        });
						    </script>					</div>
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
<script src="../js/admin_comment.js"></script>
</body>
</html>
