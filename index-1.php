<?php require 'inc/_info.php'; ?>
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
	<title>UoS Bus | Bus Ticket Reservation System</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Place favicon.ico in the root directory -->
	<link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
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
				<div class="single-slider" style="background-image: url(assets/img/slider/slider1.jpg)">
					<div class="hero-slider-content">
						<h1>welcome to UoS Bus</h1>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
							labore et dolore magna aliqua. Ut enim </p>
					</div>
				</div>
				<!--Single Slider End-->
				<!--Single Slider Start-->
				<div class="single-slider" style="background-image: url(assets/img/slider/slider2.jpg)">
					<div class="hero-slider-content">
						<h1>UoS Bus Ticket System</h1>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
							labore et dolore magna aliqua. Ut enim </p>
					</div>
				</div>
				<!--Single Slider End-->
			</div>
		</div>
		<!--Slider Area End-->
		<!--About Area Start-->
		<div class="about-area pt-100 pb-95">
			<div class="container">
				<div class="row">
					<div class="col-lg-6">
						<div class="about-container">
							<h3>Welcome to <span>UoS Bus, <br> the haven</span> of your weekend</h3>
							<p><span>UoS Bus</span> luptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia
								consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro
								quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed
								quia non numquam eius</p>
							<p><span>UoS Bus</span> luptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia
								consequuntur magni dolores eos qui ratione voluptatem</p>
							<a href="#">EXPLORE</a>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="welcome-image-area">
							<div class="first-welcome-image">
								<img src="assets/img/about/about2.png" alt="">
							</div>
							<div class="secound-iamge-area">
								<img src="assets/img/about/about1.png" alt="">
								<div class="welcome-title">
									<h3>WELCOME TO “UoS Bus”</h3>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--About Area End-->
		<!--Our Favorite Bus Area Start-->
		<div class="our-favorite-Bus-area pb-95">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<!--Section Title Start-->
						<div class="section-title text-center">
							<span>We Are “UoS Bus”</span>
							<h3>our favorite buses</h3>
						</div>
						<!--Section Title End-->
					</div>
				</div>
			</div>
			<!--Bus Colection Area Start-->
			<div class="collection__wrapper collection__activation owl__dot--cus owl-carousel owl-theme">

				<div class="list__categories">
					<div class="thumb__catrgories">
						<a href="#">
							<img src="assets/img/bus/bus4.jpg" alt="UoS Bus">
						</a>
					</div>
					<div class="desc__categories">
						<div class="categories__content">
							<h6><a href="newbooking.php"> Royal Bus</a></h6>
							<p>Discover five of our favourite dresses from our new collection that are destined to be
								worn and loved immediately</p>
							<div class="p-amount">
								<span>Rs. 2500</span>
								<span>Lahore - Islamabad</span>
							</div>
							<div class="cat__btn">
								<a class="shopbtn" href="newbooking.php">Book Ticket</a>
							</div>
						</div>
					</div>
				</div>

				<div class="list__categories">
					<div class="thumb__catrgories">
						<a href="#">
							<img src="assets/img/bus/bus2.jpg" alt="UoS Bus">
						</a>
					</div>
					<div class="desc__categories">
						<div class="categories__content">
							<h6><a href="newbooking.php"> Deluxe Bus</a></h6>
							<p>Discover five of our favourite dresses from our new collection that are destined to be
								worn and loved immediately.</p>
							<div class="p-amount">
								<span>RS. 5000</span>
								<span class="count">Karachi - Lahore</span>
							</div>
							<div class="cat__btn">
								<a class="shopbtn" href="#">Book now</a>
							</div>
						</div>
					</div>
				</div>

				<div class="list__categories">
					<div class="thumb__catrgories">
						<a href="#">
							<img src="assets/img/bus/bus3.jpg" alt="UoS Bus">
						</a>
					</div>
					<div class="desc__categories">
						<div class="categories__content">
							<h6><a href="newbooking.php"> Premium Bus</a></h6>
							<p>Our stunning shoe collection is crafted from the finest leathers and super-soft suede's.
								You’ll find a style for you in these new arrivals to the L.K.Bennett shoe collection.
							</p>
							<div class="p-amount">
								<span>Rs. 2500</span>
								<span class="count">Multan - Sahiwal</span>
							</div>
							<div class="cat__btn">
								<a class="shopbtn" href="#">Book now</a>
							</div>
						</div>
					</div>
				</div>

				<div class="list__categories">
					<div class="thumb__catrgories">
						<a href="#">
							<img src="assets/img/bus/bus4.jpg" alt="UoS Bus">
						</a>
					</div>
					<div class="desc__categories">
						<div class="categories__content">
							<h6><a href="newbooking.php">Double Bus</a></h6>
							<p>Our stunning shoe collection is crafted from the finest leathers and super-soft suede's.
								You’ll find a style for you in these new arrivals to the L.K.Bennett shoe collection.
							</p>
							<div class="p-amount">
								<span>Rs. 5500</span>
								<span class="count">Sahiwal - Quetta</span>
							</div>
							<div class="cat__btn">
								<a class="shopbtn" href="#">Book now</a>
							</div>
						</div>
					</div>
				</div>

				<div class="list__categories">
					<div class="thumb__catrgories">
						<a href="#">
							<img src="assets/img/bus/bus6.jpg" alt="UoS Bus">
						</a>
					</div>
					<div class="desc__categories">
						<div class="categories__content">
							<h6><a href="newbooking.php">Super Bus</a></h6>
							<p>Our stunning shoe collection is crafted from the finest leathers and super-soft suede's.
								You’ll find a style for you in these new arrivals to the L.K.Bennett shoe collection.
							</p>
							<div class="p-amount">
								<span>Rs. 12500</span>
								<span class="count">Karachi - Islamabad</span>
							</div>
							<div class="cat__btn">
								<a class="shopbtn" href="#">Book now</a>
							</div>
						</div>
					</div>
				</div>

			</div>
			<!--Bus Colection Area End-->
		</div>
		<!--Fun Factor Area Start-->
		<div class="fun-factor-area fun-bg mb-95">
			<div class="container">
				<div class="row">
					<div class="col-md-3 col-sm-6">
						<div class="single-funfactor mb-30 text-center">
							<div class="icon">
								<i class="fas fa-smile"></i>
							</div>
							<div class="fun-facttor-number">
								<h2><span class="counter">869</span>+</h2>
							</div>
							<h4 class="counter-title">Happy Clients</h4>
						</div>
					</div>
					<div class="col-md-3 col-sm-6">
						<div class="single-funfactor mb-30 text-center">
							<div class="icon">
								<i class="fas fa-heart"></i>
							</div>
							<div class="fun-facttor-number">
								<h2><span class="counter">769</span></h2>
							</div>
							<h4 class="counter-title">new friendships</h4>
						</div>
					</div>
					<div class="col-md-3 col-sm-6">
						<div class="single-funfactor mb-30 text-center">
							<div class="icon">
								<i class="fas fa-star"></i>
							</div>
							<div class="fun-facttor-number">
								<h2><span class="counter">179</span></h2>
							</div>
							<h4 class="counter-title">five start ratings</h4>
						</div>
					</div>
					<div class="col-md-3 col-sm-6">
						<div class="single-funfactor mb-30 text-center">
							<div class="icon">
								<i class="fas fa-bus-alt"></i>
							</div>
							<div class="fun-facttor-number">
								<h2><span class="counter">745</span></h2>
							</div>
							<h4 class="counter-title">served premium</h4>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--Fun Factor Area End-->
		<!--Team Area Start-->
		<div class="team-area pb-65">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<!--Section Title Start-->
						<div class="section-title text-center">
							<span>We Are “UoS Bus”</span>
							<h3>our special staff</h3>
						</div>
						<!--Section Title End-->
					</div>
				</div>
				<div class="row">

					<div class="col-lg-3 col-md-6 col-sm-6 col-12">
						<!--Single Team Area Start-->
						<div class="single-team-area mb-30">
							<div class="team-img">
								<img src="assets/img/team/team6.jpeg" alt="">
							</div>
							<div class="team-info">
								<h4><a href="#">Asadullah Wazeer</a></h4>
								<span>Chief Director</span>
								<ul class="social-network">
									<li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
									<li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
									<li><a class="google-plus" href="#"><i class="fa fa-google-plus"></i></a></li>
									<li><a class="vimeo" href="#"><i class="fa fa-vimeo"></i></a></li>
								</ul>
							</div>
						</div>
						<!--Single Team Area End-->
					</div>
					<div class="col-lg-3 col-md-6 col-sm-6 col-12">
						<!--Single Team Area Start-->
						<div class="single-team-area mb-30">
							<div class="team-img">
								<img src="assets/img/team/team3.jpg" alt="">
							</div>
							<div class="team-info">
								<h4><a href="#">Shirley Gibson</a></h4>
								<span>Manager</span>
								<ul class="social-network">
									<li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
									<li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
									<li><a class="google-plus" href="#"><i class="fa fa-google-plus"></i></a></li>
									<li><a class="vimeo" href="#"><i class="fa fa-vimeo"></i></a></li>
								</ul>
							</div>
						</div>
						<!--Single Team Area End-->
					</div>
					<div class="col-lg-3 col-md-6 col-sm-6 col-12">
						<!--Single Team Area Start-->
						<div class="single-team-area mb-30">
							<div class="team-img">
								<img src="assets/img/team/team2.jpg" alt="">
							</div>
							<div class="team-info">
								<h4><a href="#">Ronald Long</a></h4>
								<span>Chif Reciption Officer</span>
								<ul class="social-network">
									<li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
									<li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
									<li><a class="google-plus" href="#"><i class="fa fa-google-plus"></i></a></li>
									<li><a class="vimeo" href="#"><i class="fa fa-vimeo"></i></a></li>
								</ul>
							</div>
						</div>
						<!--Single Team Area End-->
					</div>
					<div class="col-lg-3 col-md-6 col-sm-6 col-12">
						<!--Single Team Area Start-->
						<div class="single-team-area mb-30">
							<div class="team-img">
								<img src="assets/img/team/team4.jpg" alt="">
							</div>
							<div class="team-info">
								<h4><a href="#">Jessica Watson</a></h4>
								<span>Senior Hostess</span>
								<ul class="social-network">
									<li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
									<li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
									<li><a class="google-plus" href="#"><i class="fa fa-google-plus"></i></a></li>
									<li><a class="vimeo" href="#"><i class="fa fa-vimeo"></i></a></li>
								</ul>
							</div>
						</div>
						<!--Single Team Area End-->
					</div>
				</div>
			</div>
		</div>
		<!--Team Area End-->
		<!--Our Gallery Area Start-->
		<div class="our-gallery-area pb-95">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<!--Section Title Start-->
						<div class="section-title text-center">
							<span>We Are “UoS Bus”</span>
							<h3>our gallery</h3>
						</div>
						<!--Section Title End-->
					</div>
				</div>
				<div class="row">
					<div class="col-12">
						<div class="hp__portfolio__area gallery__masonry__activation ptb--110 text-center">
							<div class="gallery__menu">
								<button data-filter="*" class="is-checked">ALL</button>
								<button data-filter=".cat--1" class="">BRANDING</button>
								<button data-filter=".cat--2" class="">DESIGN</button>
								<button data-filter=".cat--3" class="">MARKETING</button>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="container">
				<div class="row masonry__wrap g-0">
					<!-- Start Single Portfolio -->
					<div class="col-lg-3 col-md-6 col-sm-6 col-12 gallery__item cat--1">
						<div class="portfoloi">
							<div class="portfoloi-content">
								<div class="portfoloi__inner">
									<h2><a href="#">UoS Bus Trip </a></h2>
									<p>Trip from University</p>
								</div>
							</div>
							<img src="assets/img/portfolio/1.jpg" alt="UoS Trip">
						</div>
					</div>
					<!-- End Single Portfolio -->
					<!-- Start Single Portfolio -->
					<div class="col-lg-3 col-md-6 col-sm-6 col-12 gallery__item cat--2">
						<div class="portfoloi">
							<div class="portfoloi-content">
								<div class="portfoloi__inner">
									<h2><a href="#">UoS Bus Trip </a></h2>
									<p>Trip from University</p>
								</div>
							</div>
							<img src="assets/img/portfolio/2.jpg" alt="UoS Trip">
						</div>
					</div>
					<!-- End Single Portfolio -->
					<!-- Start Single Portfolio -->
					<div class="col-lg-3 col-md-6 col-sm-6 col-12 gallery__item cat--3">
						<div class="portfoloi">
							<div class="portfoloi-content">
								<div class="portfoloi__inner">
									<h2><a href="#">UoS Bus Trip </a></h2>
									<p>Trip from University</p>
								</div>
							</div>
							<img src="assets/img/portfolio/3.jpg" alt="UoS Trip">
						</div>
					</div>
					<!-- End Single Portfolio -->
					<!-- Start Single Portfolio -->
					<div class="col-lg-3 col-md-6 col-sm-6 col-12 gallery__item cat--3 cat--2">
						<div class="portfoloi">
							<div class="portfoloi-content">
								<div class="portfoloi__inner">
									<h2><a href="#">UoS Bus Trip </a></h2>
									<p>Trip from University</p>
								</div>
							</div>
							<img src="assets/img/portfolio/4.jpg" alt="UoS Trip">
						</div>
					</div>
					<!-- End Single Portfolio -->
					<!-- Start Single Portfolio -->
					<div class="col-lg-6 col-md-6 col-sm-6 col-12 gallery__item cat--3">
						<div class="portfoloi">
							<div class="portfoloi-content">
								<div class="portfoloi__inner">
									<h2><a href="#">UoS Bus Trip </a></h2>
									<p>Trip from University</p>
								</div>
							</div>
							<img src="assets/img/portfolio/5.jpg" alt="UoS Trip">
						</div>
					</div>
					<!-- End Single Portfolio -->
					<!-- Start Single Portfolio -->
					<div class="col-lg-6 col-md-6 col-sm-6 col-12 gallery__item cat--3">
						<div class="portfoloi">
							<div class="portfoloi-content">
								<div class="portfoloi__inner">
									<h2><a href="#">UoS Bus Trip </a></h2>
									<p>Trip from University</p>
								</div>
							</div>
							<img src="assets/img/portfolio/6.jpg" alt="UoS Trip">
						</div>
					</div>
					<!-- End Single Portfolio -->
				</div>
			</div>
		</div>
		<!--Our Gallery Area End-->
		<!--Pricing Area Start-->
		<div class="pricing-area pb-65">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<!--Section Title Start-->
						<div class="section-title text-center">
							<span>We Are “UoS Bus”</span>
							<h3>Our Pricing</h3>
						</div>
						<!--Section Title End-->
					</div>
				</div>
				<div class="row">
					<div class="col-lg-3 col-md-6">
						<!--Single Pricing Start-->
						<div class="single-pricing mb-30">
							<div class="pricing-head">
								<h4>Economic</h4>
							</div>
							<div class="pricing-body">
								<ul>
									<li>Flight Ticket(2)</li>
									<li>Music Concert (30% Off)</li>
									<li>Restaurant (Snacks)</li>
									<li>Face Make(No)</li>
								</ul>
								<h5 class="table-price">$150<span class="desc-price">/Tour</span></h5>
								<a class="pricing-button" href="#">Book Now </a>
							</div>
						</div>
						<!--Single Pricing End-->
					</div>
					<div class="col-lg-3 col-md-6">
						<!--Single Pricing Start-->
						<div class="single-pricing mb-30">
							<div class="pricing-head">
								<h4>The Best</h4>
							</div>
							<div class="pricing-body">
								<ul>
									<li>Flight Ticket(3)</li>
									<li>Music Concert (45% Off)</li>
									<li>Restaurant (Lunch)</li>
									<li>Face Make</li>
								</ul>
								<h5 class="table-price">$190<span class="desc-price">/Tour</span></h5>
								<a class="pricing-button" href="#">Book Now </a>
							</div>
						</div>
						<!--Single Pricing End-->
					</div>
					<div class="col-lg-3 col-md-6">
						<!--Single Pricing Start-->
						<div class="single-pricing mb-30">
							<div class="pricing-head">
								<h4>Pro</h4>
							</div>
							<div class="pricing-body">
								<ul>
									<li>Flight Ticket</li>
									<li>Music Concert (45% Off)</li>
									<li>Restaurant (Lunch)</li>
									<li>Face Make</li>
								</ul>
								<h5 class="table-price">$220<span class="desc-price">/Tour</span></h5>
								<a class="pricing-button" href="#">Book Now </a>
							</div>
						</div>
						<!--Single Pricing End-->
					</div>
					<div class="col-lg-3 col-md-6">
						<!--Single Pricing Start-->
						<div class="single-pricing mb-30">
							<div class="pricing-head">
								<h4>Ultra</h4>
							</div>
							<div class="pricing-body">
								<ul>
									<li>Flight Ticket</li>
									<li>Music Concert (50% Off)</li>
									<li>Restaurant (Yes)</li>
									<li>Face Make</li>
								</ul>
								<h5 class="table-price">$250<span class="desc-price">/Tour</span></h5>
								<a class="pricing-button" href="#">Book Now </a>
							</div>
						</div>
						<!--Single Pricing End-->
					</div>
				</div>
			</div>
		</div>
		<!--Pricing Area End-->
		<!--Blog Area Start-->
		<div class="blog-area pb-100">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<!--Section Title Start-->
						<div class="section-title text-center">
							<span>We Are “UoS Bus”</span>
							<h3>Latest News</h3>
						</div>
						<!--Section Title End-->
					</div>
				</div>
				<div class="row">
					<div class="col-lg-6 col-md-6">
						<!--Single Blog Area Strat-->
						<div class="single-blog">
							<div class="blg-img">
								<a href="#"><img src="assets/img/blog/small/blog1.jpg" alt=""></a>
							</div>
							<div class="blog-content">
								<div class="blog-text">
									<h5><a href="#">Relax Zone</a></h5>
									<div class="blog-post-info">
										<span><a href="#">By admin</a></span>
										<span>July 15, 2022</span>
									</div>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque, nostrum.</p>
									<a href="#" class="read-more"><i class="zmdi zmdi-long-arrow-right"></i></a>
								</div>
							</div>
						</div>
						<!--Single Blog Area End-->
					</div>
					<div class="col-lg-6 col-md-6">
						<!--Single Blog Area Strat-->
						<div class="single-blog">
							<div class="blg-img">
								<a href="#"><img src="assets/img/blog/small/blog2.jpg" alt=""></a>
							</div>
							<div class="blog-content">
								<div class="blog-text">
									<h5><a href="#">Daily Walk</a></h5>
									<div class="blog-post-info">
										<span><a href="#">By admin</a></span>
										<span>July 15, 2022</span>
									</div>
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
		<?php require 'inc/_front-footer.php'; ?>
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
	<script src="js/bootstrap.min.js"></script>
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