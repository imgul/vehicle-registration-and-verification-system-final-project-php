<?php
session_start();

// Alert Messages
require 'inc/_alert.php';
require 'inc/_info.php';
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title><?= $website_short_name; ?> || <?= $website_description; ?></title>
	<meta name="description" content="<?= $website_description; ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" type="image/x-icon" href="assets/img/logo/favicon.ico">
	<!--All Css Here-->

	<!-- Material Design Iconic Font CSS-->
	<link rel="stylesheet" href="assets/vendor/css/material-design-iconic-font.min.css">
	<!-- Font Awesome CSS-->
	<!-- <link rel="stylesheet" href="css/font-awesome.min.css"> -->
	<!-- Animate CSS-->
	<link rel="stylesheet" href="assets/vendor/css/plugins.css">
	<!-- Font-awesome -->
	<script src="https://kit.fontawesome.com/d8cfbe84b9.js" crossorigin="anonymous"></script>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="assets/vendor/css/bootstrap-v5.0.2.min.css">
	<!-- Custom styles from Admin Dashboard-->
	<link href="admin/css/sb-admin-2.min.css" rel="stylesheet">
	<!-- Style CSS -->
	<link rel="stylesheet" href="assets/css/style.css">
	<!-- Responsive CSS -->
	<link rel="stylesheet" href="assets/css/responsive.css">
	<!-- Modernizr Js -->
	<script src="assets/vendor/js/modernizr-2.8.3.min.html"></script>

	<?php $page = 'index'; ?>
</head>

<body>
	<!--[if lt IE 8]>
	<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->

	<div class="wrapper">
		<!--Header Area Start-->
		<?php require 'inc/_front-header.php'; ?>
		<!--Header Area Start-->
		<!--Slider Area Start-->
		<div class="slider-area">
			<div class="hero-slider owl-carousel">
				<!--Single Slider Start-->
				<div class="single-slider single-slider-2" style="background-image: url(assets/img/slider/slider1.jpg)">
					<div class="hero-slider-content slider-content-2">
						<h1>Vehicle Registration <br> At Your Doorstep</h1>
					</div>
				</div>
				<!--Single Slider End-->
				<!--Single Slider Start-->
				<div class="single-slider single-slider-2" style="background-image: url(assets/img/slider/slider2.jpg)">
					<div class="hero-slider-content slider-content-2">
						<h1>Vehicle Registration <br> At Your Doorstep</h1>
					</div>
				</div>
				<!--Single Slider End-->
			</div>
		</div>
		<!--About Area Start-->
		<div class="about-area about-style-2 pt-100 pb-120">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 col-12 order-2 order-lg-1">
						<div class="welcome-image-area">
							<div class="first-welcome-image">
								<img src="assets/img/about/joy-skyline-e-bike-500x500.jpg" alt="">
							</div>
							<div class="secound-iamge-area">
								<img src="assets/img/about/Gear-Mercedes.webp" alt="">
							</div>
						</div>
					</div>
					<div class="col-lg-6 col-12 order-1 order-lg-2">
						<div class="about-container">
							<h3>Welcome to <span>VRS <br> Vehicle Registration</span> And <br>Verification System</h3>
							<p><span>VRS</span> luptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione ptatem sequi esciunt. Neque porro quisquam est uptatem quia luptas sit aspernatur aut odit auted quie</p>
							<a href="#">EXPLORE</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--About Area End-->
		<!--Our Awesome Services Area Start-->
		<div class="our-awesome-services service-style-2 pb-100">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<!--Section Title Start-->
						<div class="section-title text-center">
							<span>We Are “VRS”</span>
							<h3>our awesome services</h3>
						</div>
						<!--Section Title End-->
					</div>
				</div>
				<div class="row align-items-center no-gutters service-bg-color">
					<div class="col-lg-6">
						<!--Service Area Start-->
						<div class="tab-content" id="myTabContent">
							<div class="tab-pane fade show active" id="spa" role="tabpanel">
								<div class="service-img img-full">
									<img src="assets/img/service/Transpo_G70_TA-518126.jpg" alt="">
								</div>
							</div>
							<div class="tab-pane fade" id="restaurent" role="tabpanel">
								<div class="service-img img-full">
									<img src="assets/img/service/Tesla-car.webp" alt="">
								</div>
							</div>
							<div class="tab-pane fade" id="swimming" role="tabpanel">
								<div class="service-img img-full">
									<img src="assets/img/service/super-bike.jpg" alt="">
								</div>
							</div>
							<div class="tab-pane fade" id="conference" role="tabpanel">
								<div class="service-img img-full">
									<img src="assets/img/service/check-vehicle.jpg" alt="">
								</div>
							</div>
						</div>
						<!--Service Area End-->
					</div>
					<div class="col-lg-6 service-bg">
						<!--Service Tab Menu Area Start-->
						<div class="service-menu-area">
							<ul class="nav">
								<li>
									<a class="active" data-bs-toggle="tab" href="#spa">
										<span class="service-icon">
											<img src="assets/img/icon/service-icon1.png" alt="">
										</span>
										<span class="service-title">Registration of Vehicle</span>
										<span class="text"><span>New Vehicle Registration</span> luptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia </span>
									</a>
								</li>
								<li>
									<a class="" data-bs-toggle="tab" href="#restaurent">
										<span class="service-icon">
											<img src="assets/img/icon/service-icon2.png" alt="">
										</span>
										<span class="service-title">Super Cars</span>
										<span class="text"><span>Verification of Super Cars</span> lup provide grro tatem quia voluptas sit aspernatur aut odit aut fugit, sed quia </span>
									</a>
								</li>
								<li>
									<a data-bs-toggle="tab" href="#swimming">
										<span class="service-icon">
											<img src="assets/img/icon/service-icon3.png" alt="">
										</span>
										<span class="service-title">Permissions of Bikes</span>
										<span class="text"><span>Bike Permission</span> pool luptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia </span>
									</a>
								</li>
								<li>
									<a data-bs-toggle="tab" href="#conference">
										<span class="service-icon">
											<img src="assets/img/icon/service-icon4.png" alt="">
										</span>
										<span class="service-title">Verify Registration</span>
										<span class="text"><span>Verification</span> luptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia </span>
									</a>
								</li>
							</ul>
						</div>
						<!--Service Tab Menu Area End-->
					</div>
				</div>
			</div>
		</div>
		<!--Our Awesome Services Area End-->
		<!--Pricing Area Start-->
		<div class="pricing-area pb-65">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<!--Section Title Start-->
						<div class="section-title text-center">
							<span>We Are “VRS”</span>
							<h3>Registration Fees</h3>
						</div>
						<!--Section Title End-->
					</div>
				</div>
				<div class="row">
					<div class="col-lg-3 col-md-6">
						<!--Single Pricing Start-->
						<div class="single-pricing-style-2 mb-30">
							<div class="pricing-head">
								<h5 class="table-price">Rs. 2500<span class="desc-price"></span></h5>
								<h4>Bike</h4>
							</div>
							<div class="pricing-body">
								<ul>
									<li>Vehicle Verification</li>
									<li>Vehicle Registration</li>
									<li>Owner Detalis</li>
									<li>Vehicle Information</li>
								</ul>
								<a class="pricing-button" href="#">Register Bike </a>
							</div>
						</div>
						<!--Single Pricing End-->
					</div>
					<div class="col-lg-3 col-md-6">
						<!--Single Pricing Start-->
						<div class="single-pricing-style-2 mb-30">
							<div class="pricing-head">
								<h5 class="table-price">Rs. 3500<span class="desc-price"></span></h5>
								<h4>LTV</h4>
							</div>
							<div class="pricing-body">
								<ul>
									<li>Vehicle Verification</li>
									<li>Vehicle Registration</li>
									<li>Owner Detalis</li>
									<li>Vehicle Information</li>
								</ul>
								<a class="pricing-button" href="#">Register LTV </a>
							</div>
						</div>
						<!--Single Pricing End-->
					</div>
					<div class="col-lg-3 col-md-6">
						<!--Single Pricing Start-->
						<div class="single-pricing-style-2 price-active mb-30">
							<div class="pricing-head">
								<h5 class="table-price">Rs. 5200<span class="desc-price"></span></h5>
								<h4>HTV</h4>
							</div>
							<div class="pricing-body">
								<ul>
									<li>Vehicle Verification</li>
									<li>Vehicle Registration</li>
									<li>Owner Detalis</li>
									<li>Vehicle Information</li>
								</ul>
								<a class="pricing-button" href="#">Register HTV </a>
							</div>
						</div>
						<!--Single Pricing End-->
					</div>
					<div class="col-lg-3 col-md-6">
						<!--Single Pricing Start-->
						<div class="single-pricing-style-2 mb-30">
							<div class="pricing-head">
								<h5 class="table-price">Rs. -----<span class="desc-price"></span></h5>
								<h4>Super Vehicle</h4>
							</div>
							<div class="pricing-body">
								<ul>
									<li>Vehicle Verification</li>
									<li>Vehicle Registration</li>
									<li>Owner Detalis</li>
									<li>Vehicle Information</li>
								</ul>
								<a class="pricing-button" href="#" disabled>*Not availbe </a>
							</div>
						</div>
						<!--Single Pricing End-->
					</div>
				</div>
			</div>
		</div>
		<!--Pricing Area End-->
		<!--Blog Area Start-->
		<div class="blog-area pb-70">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<!--Section Title Start-->
						<div class="section-title text-center">
							<span>We Are “VRS”</span>
							<h3>our Documentation</h3>
						</div>
						<!--Section Title End-->
					</div>
				</div>
				<div class="row">
					<div class="col-lg-4 col-md-6">
						<!--Single Blog Area Strat-->
						<div class="single-blog-style-2 mb-30">
							<div class="blg-img">
								<a href="#"><img src="assets/img/blog/new-vehicle.jpg" alt=""></a>
								<div class="blog-post-info">
									<span>18 February, 2022</span>
								</div>
							</div>
							<div class="blog-content">
								<div class="blog-text">
									<h5><a href="#">New Vehicle</a></h5>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque, nostrum.</p>
									<a href="#" class="read-more"><i class="zmdi zmdi-long-arrow-right"></i></a>
								</div>
							</div>
						</div>
						<!--Single Blog Area End-->
					</div>
					<div class="col-lg-4 col-md-6">
						<!--Single Blog Area Strat-->
						<div class="single-blog-style-2 mb-30">
							<div class="blg-img">
								<a href="#"><img src="assets/img/blog/custom-clearance.jpeg" alt=""></a>
								<div class="blog-post-info">
									<span>15 April, 2022</span>
								</div>
							</div>
							<div class="blog-content">
								<div class="blog-text">
									<h5><a href="#">Custom Clearance</a></h5>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque, nostrum.</p>
									<a href="#" class="read-more"><i class="zmdi zmdi-long-arrow-right"></i></a>
								</div>
							</div>
						</div>
						<!--Single Blog Area End-->
					</div>
					<div class="col-lg-4 col-md-6">
						<!--Single Blog Area Strat-->
						<div class="single-blog-style-2 mb-30">
							<div class="blg-img">
								<a href="#"><img src="assets/img/blog/law-n-rules.jpg" alt=""></a>
								<div class="blog-post-info">
									<span>12 November, 2022</span>
								</div>
							</div>
							<div class="blog-content">
								<div class="blog-text">
									<h5><a href="#">Law & Rules</a></h5>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque, nostrum.</p>
									<a href="#" class="read-more"><i class="zmdi zmdi-long-arrow-right"></i></a>
								</div>
							</div>
						</div>
						<!--Single Blog Area End-->
					</div>
				</div>
			</div>
		</div>
		<!--Blog Area End-->
		<!--Brand Area Start-->
		<div class="brand-area">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="brand-active owl-carousel">
							<!--Single Brand Start-->
							<div class="single-brand">
								<a href="#"><img src="assets/img/brand/brand1.png" alt=""></a>
							</div>
							<!--Single Brand End-->
							<!--Single Brand Start-->
							<div class="single-brand">
								<a href="#"><img src="assets/img/brand/brand2.png" alt=""></a>
							</div>
							<!--Single Brand End-->
							<!--Single Brand Start-->
							<div class="single-brand">
								<a href="#"><img src="assets/img/brand/brand3.png" alt=""></a>
							</div>
							<!--Single Brand End-->
							<!--Single Brand Start-->
							<div class="single-brand">
								<a href="#"><img src="assets/img/brand/brand4.png" alt=""></a>
							</div>
							<!--Single Brand End-->
							<!--Single Brand Start-->
							<div class="single-brand">
								<a href="#"><img src="assets/img/brand/brand5.png" alt=""></a>
							</div>
							<!--Single Brand End-->
							<!--Single Brand Start-->
							<div class="single-brand">
								<a href="#"><img src="assets/img/brand/brand6.png" alt=""></a>
							</div>
							<!--Single Brand End-->
							<!--Single Brand Start-->
							<div class="single-brand">
								<a href="#"><img src="assets/img/brand/brand1.png" alt=""></a>
							</div>
							<!--Single Brand End-->
							<!--Single Brand Start-->
							<div class="single-brand">
								<a href="#"><img src="assets/img/brand/brand2.png" alt=""></a>
							</div>
							<!--Single Brand End-->
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--Brand Area End-->
		<!--Footer Area Start-->
		<?php require 'inc/_front-footer.php';
		?>
		<!--Footer Area End-->
	</div>





	<!--All Js Here-->

	<!--Jquery 1.12.4-->
	<script src="js/vendor/modernizr-3.6.0.min.js"></script>
	<script src="js/vendor/jquery-3.6.0.min.js"></script>
	<script src="js/vendor/jquery-migrate-3.3.2.min.js"></script>
	<!--Popper-->
	<script src="js/popper.min.js"></script>
	<!--Bootstrap-->
	<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--Plugins-->
	<script src="js/plugins.js"></script>
	<!--Ajax Mail-->
	<script src="js/ajax.mail.js"></script>
	<!-- Sweet Alert -->
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<!-- Core plugin JavaScript-->
	<!-- <script src="vendor/jquery-easing/jquery.easing.min.js"></script> -->
	<!-- Custom scripts from Admin Dashboard-->
	<!-- <script src="admin/js/sb-admin-2.js"></script> -->
	<!--Main Js-->
	<script src="js/main.js"></script>
	<script>

	</script>
</body>

</html>