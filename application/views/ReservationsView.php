<!DOCTYPE html>
<html lang="en">
<head>
<title>Rianthong</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Bluesky template project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" type="image/png" href="<?php echo base_url(); ?>../assets/bluesky/images/goldd.png">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>../assets/bluesky/styles/bootstrap4/bootstrap.min.css">
<link href="<?php echo base_url(); ?>../assets/bluesky/plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>../assets/bluesky/plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>../assets/bluesky/plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>../assets/bluesky/plugins/OwlCarousel2-2.2.1/animate.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>../assets/bluesky/styles/main_styles.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>../assets/bluesky/styles/responsive.css">
</head>
<body>

<div class="super_container">

	<!-- Header -->

	<header class="header">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="header_content d-flex flex-row align-items-center justify-content-start">
						<div class="logo">
							<a href="<?php echo site_url("ReservationsController");?>"><img src="<?php echo base_url(); ?>../assets/bluesky/images/goldd.png" alt=""  ></a>
						</div>
						<nav class="main_nav">
							<ul>
								<li class="active"><a href="index.html">Home</a></li>
								<li><a href="about.html">About us</a></li>
								<li><a href="properties.html">Properties</a></li>
								<li><a href="news.html">News</a></li>
								<li><a href="contact.html">Contact</a></li>
							</ul>
						</nav>
						<div class="phone_num ml-auto">
							<div class="phone_num_inner">
								<img src="<?php echo base_url(); ?>../assets/bluesky/images/phone.png" alt=""><span>652-345 3222 1</span>
							</div>
						</div>
						<div class="hamburger ml-auto"><i class="fa fa-bars" aria-hidden="true"></i></div>
					</div>
				</div>
			</div>
		</div>
	</header>


	
	
	<!-- Home -->

	<div class="home">

		
	</div>

	<!-- Home Search -->
	<div class="home_search">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="home_search_container">
						<div class="home_search_content">
							
							<form action="<?php echo site_url('ReservationsController/keyword') ?>" method="post" class="search_form d-flex flex-row align-items-start justfy-content-start">
								<div class="search_form_content d-flex flex-row align-items-start justfy-content-start flex-wrap">
									<div>
									<div>
									</div>
									<h1>ประเภทห้อง</h1>
										<select class="search_form_select">
										<?php $this->db->select('roomcategory.*');
							$this->db->from('roomcategory');
							$query = $this->db->get();
							$results = $query->result_array();?>
						<?php	foreach($results as $result){
								?>
											
											<h1><option value="<?php echo $result['roomname'] . ' '?>"> 
											<?php echo $result['roomname'] . ' '?> <?php echo $result['roomprice'] . '.- / เดือน'?>
								</option>
											<?php
							} ?>
										</select>
									</div>
												
								<button type="submit" class="search_form_button ml-auto" name="submit" value="Search">search</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Recent -->
	<div class="recent">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="section_title">Recent Properties</div>
					<div class="section_subtitle">Search your dream home</div>
				</div>
			</div>
			<div class="row recent_row">
				<div class="col">


						</div>

						<div class="recent_slider_nav_container d-flex flex-row align-items-start justify-content-start">
							<div class="recent_slider_nav recent_slider_prev"><i class="fa fa-chevron-left" aria-hidden="true"></i></div>
							<div class="recent_slider_nav recent_slider_next"><i class="fa fa-chevron-right" aria-hidden="true"></i></div>
						</div>
					</div>
					

	<!-- Footer -->

	<footer class="footer">
		<div class="footer_main">
			<div class="container">
				<div class="row">
					<div class="col-lg-3">
						<div class="footer_logo"><a href="#"><img src="<?php echo base_url(); ?>../assets/bluesky/images/logo_large.png" alt=""></a></div>
					</div>
					<div class="col-lg-9 d-flex flex-column align-items-start justify-content-end">
						<div class="footer_title">Latest Properties</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-3 footer_col">
						<div class="footer_about">
							<div class="footer_about_text">Donec in tempus leo. Aenean ultricies mauris sed quam lacinia lobortis. Cras ut vestibulum enim, in gravida nulla. Curab itur ornare nisl at sagittis cursus.</div>
						</div>
					</div>
					<div class="col-lg-3 footer_col">
						<div class="footer_latest d-flex flex-row align-items-start justify-content-start">
							<div><div class="footer_latest_image"><img src="<?php echo base_url(); ?>../assets/bluesky/images/footer_latest_1.jpg" alt=""></div></div>
							<div class="footer_latest_content">
								<div class="footer_latest_location">Miami</div>
								<div class="footer_latest_name"><a href="#">Sea view property</a></div>
								<div class="footer_latest_price">$ 1. 234 981</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3 footer_col">
						<div class="footer_latest d-flex flex-row align-items-start justify-content-start">
							<div><div class="footer_latest_image"><img src="<?php echo base_url(); ?>../assets/bluesky/images/footer_latest_2.jpg" alt=""></div></div>
							<div class="footer_latest_content">
								<div class="footer_latest_location">Miami</div>
								<div class="footer_latest_name"><a href="#">Town House</a></div>
								<div class="footer_latest_price">$ 1. 234 981</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3 footer_col">
						<div class="footer_latest d-flex flex-row align-items-start justify-content-start">
							<div><div class="footer_latest_image"><img src="<?php echo base_url(); ?>../assets/bluesky/images/footer_latest_3.jpg" alt=""></div></div>
							<div class="footer_latest_content">
								<div class="footer_latest_location">Miami</div>
								<div class="footer_latest_name"><a href="#">Modern House</a></div>
								<div class="footer_latest_price">$ 1. 234 981</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="footer_bar">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="footer_bar_content d-flex flex-row align-items-center justify-content-start">
							<div class="cr"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
</div>
							<div class="footer_nav">
								<ul>
									<li><a href="index.html">Home</a></li>
									<li><a href="#">About us</a></li>
									<li><a href="properties.html">Properties</a></li>
									<li><a href="news.html">News</a></li>
									<li><a href="contact.html">Contact</a></li>
								</ul>
							</div>
							<div class="footer_phone ml-auto"><span>call us: </span>652 345 3222 11</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>
</div>

<script src="<?php echo base_url('./assets/bluesky/js/jquery-3.2.1.min.js')?>"></script>
<script src="<?php echo base_url('./assets/bluesky/styles/bootstrap4/popper.js')?>"></script>
<script src="<?php echo base_url('./assets/bluesky/styles/bootstrap4/bootstrap.min.js')?>"></script>
<script src="<?php echo base_url('./assets/bluesky/plugins/OwlCarousel2-2.2.1/owl.carousel.js')?>"></script>
<script src="<?php echo base_url('./assets/bluesky/plugins/easing/easing.js')?>"></script>
<script src="<?php echo base_url('./assets/bluesky/plugins/parallax-js-master/parallax.min.js')?>"></script>
<script src="<?php echo base_url('./assets/bluesky/js/custom.js');?>"></script>
</body>
</html>