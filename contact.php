<?php require 'inc/_info.php'; ?>
<!doctype html>
<html class="no-js" lang="en">

<!-- Mirrored from htmldemo.net/picklu/picklu/contact.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 11 Jun 2022 15:22:08 GMT -->

<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Contact || Picklu</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Place favicon.ico in the root directory -->
	<link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
	<!--All Css Here-->

	<!-- Material Design Iconic Font CSS-->
	<link rel="stylesheet" href="css/material-design-iconic-font.min.css">
	<!-- Font Awesome CSS-->
	<link rel="stylesheet" href="css/font-awesome.min.css">

	<!-- Font Awesome CSS-->
	<link rel="stylesheet" href="css/plugins.css">
	<!-- Bootstrap CSS-->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Style CSS -->
	<link rel="stylesheet" href="style.css">
	<!-- Responsive CSS -->
	<link rel="stylesheet" href="css/responsive.css">
	<!-- Modernizr Js -->
	<script src="js/vendor/modernizr-2.8.3.min.html"></script>

	<?php $page = 'contact'; ?>
</head>

<body>
	<!--[if lt IE 8]>
	<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->

	<div class="wrapper">
		<!--Header Area Start-->
		<?php require 'inc/_front-header.php'; ?>
		<!--Header Area Start-->
		<!--Breadcrumb Banner Area Start-->
		<div class="breadcrumb-banner-area">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="breadcrumb-text">
							<h1 class="text-center">Contact</h1>
							<div class="breadcrumb-bar">
								<ul class="breadcrumb text-center">
									<li><a href="index.html">Home</a></li>
									<li>Contact</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--Breadcrumb Banner Area End-->
		<!--Contact Us Area Start-->
		<div class="contact-us-area pt-100 pb-100">
			<div class="container">
				<div class="row">
					<!--Contact Information Start-->
					<div class="col-md-5 contact-address">
						<div class="contact-information">
							<ul>
								<li>
									<h5>Address</h5>
									<p><?php echo $address; ?></p>
								</li>
								<li>
									<h5>Phone</h5>
									<p><a href="tel:+8801265897568"><?php echo $phone_number; ?></a><br>
										<a href="tel:+8801265897568"><?php echo $phone_number; ?></a>
									</p>
								</li>
								<li>
									<h5>Web</h5>
									<p><a href="#"><?php echo $email; ?></a>
										<a href="#"><?php echo $website; ?></a>
									</p>
								</li>
							</ul>
						</div>
					</div>
					<!--Contact Information End-->
					<!--Contact Form Start-->
					<div class="col-md-7">
						<div class="contact-form">
							<div class="contact-form-title">
								<h3>Get in Touch </h3>
								<p>Terms & Conditions deleniti atque corrupti sdolores et quas molestias cepturi sint eca itate non similique sunt in culpa modi tempora incidunt obtain pain </p>
							</div>
							<form id="contact-form" action="https://htmldemo.net/picklu/picklu/mail.php" method="post">
								<div class="row">
									<div class="col-md-6">
										<div class="single-input">
											<input name="name" placeholder="Name" type="text">
										</div>
									</div>
									<div class="col-md-6">
										<div class="single-input">
											<input name="email" placeholder="E-mail" type="email">
										</div>
									</div>
									<div class="col-md-6">
										<div class="single-input">
											<input name="phone" placeholder="Phone" type="text">
										</div>
									</div>
									<div class="col-md-6">
										<div class="single-input">
											<input name="subject" placeholder="Subject" type="text">
										</div>
									</div>
									<div class="col-md-12">
										<div class="single-input">
											<textarea name="message" cols="10" rows="4" placeholder="Message"></textarea>
										</div>
									</div>
									<div class="col-md-12">
										<div class="single-input">
											<button class="sent-btn" type="submit">Submit</button>
										</div>
									</div>
								</div>
							</form>
							<p class="form-messege"></p>
						</div>
					</div>
					<!--Contact Form End-->
				</div>
			</div>
		</div>
		<!--Contact Us Area End-->
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
	<!--Main Js-->
	<script src="js/main.js"></script>
</body>

<!-- Mirrored from htmldemo.net/picklu/picklu/contact.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 11 Jun 2022 15:22:08 GMT -->

</html>