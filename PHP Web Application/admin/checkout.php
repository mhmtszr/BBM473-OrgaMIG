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


	<!-- Home -->

	<div class="home">
		<div class="parallax_background parallax-window" data-parallax="scroll" data-image-src="images/checkout.jpg" data-speed="0.8"></div>
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
										<div class="row">
											<div class="col-lg-6">
												<!-- Name -->
												<label for="checkout_name">First Name*</label>
												<input type="text" id="checkout_name" class="checkout_input" required="required">
											</div>
											<div class="col-lg-6">
												<!-- Last Name -->
												<label for="checkout_last_name">Last Name*</label>
												<input type="text" id="checkout_last_name" class="checkout_input" required="required">
											</div>
										</div>
										<div>
											<!-- Company -->
											<label for="checkout_company">Company</label>
											<input type="text" id="checkout_company" class="checkout_input">
										</div>
										<div>
											<!-- Country -->
											<label for="checkout_country">Country*</label>
											<select name="checkout_country" id="checkout_country" class="dropdown_item_select checkout_input" require="required">
												<option></option>
												<option>Lithuania</option>
												<option>Sweden</option>
												<option>UK</option>
												<option>Italy</option>
											</select>
										</div>
										<div>
											<!-- Address -->
											<label for="checkout_address">Address*</label>
											<input type="text" id="checkout_address" class="checkout_input" required="required">
											<input type="text" id="checkout_address_2" class="checkout_input checkout_address_2" required="required">
										</div>
										<div>
											<!-- Zipcode -->
											<label for="checkout_zipcode">Zipcode*</label>
											<input type="text" id="checkout_zipcode" class="checkout_input" required="required">
										</div>
										<div>
											<!-- City / Town -->
											<label for="checkout_city">City/Town*</label>
											<select name="checkout_city" id="checkout_city" class="dropdown_item_select checkout_input" require="required">
												<option></option>
												<option>City</option>
												<option>City</option>
												<option>City</option>
												<option>City</option>
											</select>
										</div>
										<div>
											<!-- Province -->
											<label for="checkout_province">Province*</label>
											<select name="checkout_province" id="checkout_province" class="dropdown_item_select checkout_input" require="required">
												<option></option>
												<option>Province</option>
												<option>Province</option>
												<option>Province</option>
												<option>Province</option>
											</select>
										</div>
										<div>
											<!-- Phone no -->
											<label for="checkout_phone">Phone no*</label>
											<input type="phone" id="checkout_phone" class="checkout_input" required="required">
										</div>
										<div>
											<!-- Email -->
											<label for="checkout_email">Email Address*</label>
											<input type="phone" id="checkout_email" class="checkout_input" required="required">
										</div>
										<div class="checkout_extra">
											<ul>
												<li class="billing_info d-flex flex-row align-items-center justify-content-start">
													<label class="checkbox_container">
														<input type="checkbox" id="cb_1" name="billing_checkbox" class="billing_checkbox">
														<span class="checkbox_mark"></span>
														<span class="checkbox_text">Terms and conditions</span>
													</label>
												</li>
												<li class="billing_info d-flex flex-row align-items-center justify-content-start">
													<label class="checkbox_container">
														<input type="checkbox" id="cb_2" name="billing_checkbox" class="billing_checkbox">
														<span class="checkbox_mark"></span>
														<span class="checkbox_text">Create an account</span>
													</label>
												</li>
												<li class="billing_info d-flex flex-row align-items-center justify-content-start">
													<label class="checkbox_container">
														<input type="checkbox" id="cb_3" name="billing_checkbox" class="billing_checkbox">
														<span class="checkbox_mark"></span>
														<span class="checkbox_text">Subscribe to our newsletter</span>
													</label>
												</li>
											</ul>
										</div>
									</form>
								</div>
							</div>

							<!-- Cart Total -->
							<div class="cart_total">
								<div class="cart_total_inner checkout_box">
									<div class="checkout_title">Cart total</div>
									<ul class="cart_extra_total_list">
										<li class="d-flex flex-row align-items-center justify-content-start">
											<div class="cart_extra_total_title">Subtotal</div>
											<div class="cart_extra_total_value ml-auto">$29.90</div>
										</li>
										<li class="d-flex flex-row align-items-center justify-content-start">
											<div class="cart_extra_total_title">Shipping</div>
											<div class="cart_extra_total_value ml-auto">Free</div>
										</li>
										<li class="d-flex flex-row align-items-center justify-content-start">
											<div class="cart_extra_total_title">Total</div>
											<div class="cart_extra_total_value ml-auto">$29.90</div>
										</li>
									</ul>

									<!-- Payment Options -->
									<div class="payment">
										<div class="payment_options">
											<label class="payment_option clearfix">Paypal
												<input type="radio" name="radio">
												<span class="checkmark"></span>
											</label>
											<label class="payment_option clearfix">Cach on delivery
												<input type="radio" name="radio">
												<span class="checkmark"></span>
											</label>
											<label class="payment_option clearfix">Credit card
												<input type="radio" name="radio">
												<span class="checkmark"></span>
											</label>
											<label class="payment_option clearfix">Direct bank transfer
												<input type="radio" checked="checked" name="radio">
												<span class="checkmark"></span>
											</label>
										</div>
									</div>

									<!-- Order Text -->
									<div class="order_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin pharetra temp or so dales. Phasellus sagittis auctor gravida. Integ er bibendum sodales arcu id te mpus. Ut consectetur lacus.</div>

									<div class="checkout_button trans_200"><a href="checkout.html">place order</a></div>
								</div>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Newsletter -->

	<div class="newsletter">
		<div class="parallax_background parallax-window" data-parallax="scroll" data-image-src="images/newsletter.jpg" data-speed="0.8"></div>
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2">
					<div class="newsletter_content text-center">
						<div class="newsletter_title_container">
							<div class="newsletter_title">subscribe to our newsletter</div>
							<div class="newsletter_subtitle">we won't spam, we promise!</div>
						</div>
						<div class="newsletter_form_container">
							<form action="#" id="newsletter_form" class="newsletter_form">
								<input type="email" class="newsletter_input" placeholder="your e-mail here" required="required">
								<button class="newsletter_button">submit</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Footer -->

	<footer class="footer">
		<div class="footer_content">
			<div class="section_container">
				<div class="container">
					<div class="row">

						<!-- About -->
						<div class="col-xxl-3 col-md-6 footer_col">
							<div class="footer_about">
								<!-- Logo -->
								<div class="footer_logo">
									<a href="#"><div>a<span>star</span></div></a>
								</div>
								<div class="footer_about_text">
									<p>Donec vitae purus nunc. Morbi faucibus erat sit amet congue mattis. Nullam fringilla faucibus urna, id dapibus erat iaculis ut. Integer ac sem.</p>
								</div>
								<div class="cards">
									<ul class="d-flex flex-row align-items-center justify-content-start">
										<li><a href="#"><img src="images/card_1.jpg" alt=""></a></li>
										<li><a href="#"><img src="images/card_2.jpg" alt=""></a></li>
										<li><a href="#"><img src="images/card_3.jpg" alt=""></a></li>
										<li><a href="#"><img src="images/card_4.jpg" alt=""></a></li>
										<li><a href="#"><img src="images/card_5.jpg" alt=""></a></li>
									</ul>
								</div>
							</div>
						</div>

						<!-- Questions -->
						<div class="col-xxl-3 col-md-6 footer_col">
							<div class="footer_questions">
								<div class="footer_title">questions</div>
								<div class="footer_list">
									<ul>
										<li><a href="#">About us</a></li>
										<li><a href="#">Track Orders</a></li>
										<li><a href="#">Returns</a></li>
										<li><a href="#">Jobs</a></li>
										<li><a href="#">Shipping</a></li>
										<li><a href="#">Blog</a></li>
										<li><a href="#">Partners</a></li>
										<li><a href="#">Bloggers</a></li>
										<li><a href="#">Support</a></li>
										<li><a href="#">Terms of Use</a></li>
										<li><a href="#">Press</a></li>
									</ul>
								</div>
							</div>
						</div>

						<!-- Blog -->
						<div class="col-xxl-3 col-md-6 footer_col">
							<div class="footer_blog">
								<div class="footer_title">blog</div>
								<div class="footer_blog_container">

									<!-- Blog Item -->
									<div class="footer_blog_item d-flex flex-row align-items-start justify-content-start">
										<div class="footer_blog_image"><a href="blog.html"><img src="images/footer_blog_1.jpg" alt=""></a></div>
										<div class="footer_blog_content">
											<div class="footer_blog_title"><a href="blog.html">what shoes to wear</a></div>
											<div class="footer_blog_date">june 06, 2018</div>
											<div class="footer_blog_link"><a href="blog.html">Read More</a></div>
										</div>
									</div>

									<!-- Blog Item -->
									<div class="footer_blog_item d-flex flex-row align-items-start justify-content-start">
										<div class="footer_blog_image"><a href="blog.html"><img src="images/footer_blog_2.jpg" alt=""></a></div>
										<div class="footer_blog_content">
											<div class="footer_blog_title"><a href="blog.html">trends this year</a></div>
											<div class="footer_blog_date">june 06, 2018</div>
											<div class="footer_blog_link"><a href="blog.html">Read More</a></div>
										</div>
									</div>

								</div>
							</div>
						</div>

						<!-- Contact -->
						<div class="col-xxl-3 col-md-6 footer_col">
							<div class="footer_contact">
								<div class="footer_title">contact</div>
								<div class="footer_contact_list">
									<ul>
										<li class="d-flex flex-row align-items-start justify-content-start"><span>C.</span><div>Your Company Ltd</div></li>
										<li class="d-flex flex-row align-items-start justify-content-start"><span>A.</span><div>1481 Creekside Lane  Avila Beach, CA 93424, P.O. BOX 68</div></li>
										<li class="d-flex flex-row align-items-start justify-content-start"><span>T.</span><div>+53 345 7953 32453</div></li>
										<li class="d-flex flex-row align-items-start justify-content-start"><span>E.</span><div>office@youremail.com</div></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Social -->
		<div class="footer_social">
			<div class="section_container">
				<div class="container">
					<div class="row">
						<div class="col">
							<div class="footer_social_container d-flex flex-row align-items-center justify-content-between">
								<!-- Instagram -->
								<a href="#">
									<div class="footer_social_item d-flex flex-row align-items-center justify-content-start">
										<div class="footer_social_icon"><i class="fa fa-instagram" aria-hidden="true"></i></div>
										<div class="footer_social_title">instagram</div>
									</div>
								</a>
								<!-- Google + -->
								<a href="#">
									<div class="footer_social_item d-flex flex-row align-items-center justify-content-start">
										<div class="footer_social_icon"><i class="fa fa-google-plus" aria-hidden="true"></i></div>
										<div class="footer_social_title">google +</div>
									</div>
								</a>
								<!-- Pinterest -->
								<a href="#">
									<div class="footer_social_item d-flex flex-row align-items-center justify-content-start">
										<div class="footer_social_icon"><i class="fa fa-pinterest" aria-hidden="true"></i></div>
										<div class="footer_social_title">pinterest</div>
									</div>
								</a>
								<!-- Facebook -->
								<a href="#">
									<div class="footer_social_item d-flex flex-row align-items-center justify-content-start">
										<div class="footer_social_icon"><i class="fa fa-facebook" aria-hidden="true"></i></div>
										<div class="footer_social_title">facebook</div>
									</div>
								</a>
								<!-- Twitter -->
								<a href="#">
									<div class="footer_social_item d-flex flex-row align-items-center justify-content-start">
										<div class="footer_social_icon"><i class="fa fa-twitter" aria-hidden="true"></i></div>
										<div class="footer_social_title">twitter</div>
									</div>
								</a>
								<!-- YouTube -->
								<a href="#">
									<div class="footer_social_item d-flex flex-row align-items-center justify-content-start">
										<div class="footer_social_icon"><i class="fa fa-youtube" aria-hidden="true"></i></div>
										<div class="footer_social_title">youtube</div>
									</div>
								</a>
								<!-- Tumblr -->
								<a href="#">
									<div class="footer_social_item d-flex flex-row align-items-center justify-content-start">
										<div class="footer_social_icon"><i class="fa fa-tumblr-square" aria-hidden="true"></i></div>
										<div class="footer_social_title">tumblr</div>
									</div>
								</a>
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
<script src="js/checkout.js"></script>
</body>
</html>