<!DOCTYPE html>
<html lang="en">

<head>
	<title><?php foreach ($setting as $data) : ?>
			<?= $data->site_name; ?> | <?= $data->description; ?>
		<?php endforeach ?></title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="OneTech shop project">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="<?php echo base_url(); ?>assets/images/logo-default.png" type="image/ico" />
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/frontend/'); ?>styles/bootstrap4/bootstrap.min.css">
	<link href="<?= base_url('assets/frontend/'); ?>plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/frontend/'); ?>plugins/OwlCarousel2-2.2.1/owl.carousel.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/frontend/'); ?>plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/frontend/'); ?>plugins/OwlCarousel2-2.2.1/animate.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/frontend/'); ?>plugins/slick-1.8.0/slick.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/frontend/'); ?>styles/main_styles.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/frontend/'); ?>styles/responsive.css">


	<!-- blogs -->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/frontend/'); ?>styles/blog_styles.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/frontend/'); ?>styles/blog_responsive.css">

	<!-- single blogs -->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/frontend/'); ?>styles/blog_single_styles.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/frontend/'); ?>styles/blog_single_responsive.css">
	<link href="<?php echo base_url(); ?>assets/build/css/jconfirm.min.css" rel="stylesheet">

</head>

<body>

	<div class="super_container">
		<header class="header">
			<div class="top_bar">
				<div class="container">
					<div class="row">
						<div class="col d-flex flex-row">
							<div class="top_bar_contact_item">
								<div class="top_bar_icon"><img src="<?= base_url('assets/frontend/'); ?>images/phone.png" alt=""></div><?php foreach ($setting as $data) : ?>
									<?= $data->no_telpon; ?>
								<?php endforeach ?>
							</div>
							<div class="top_bar_contact_item">
								<div class="top_bar_icon"><img src="<?= base_url('assets/frontend/'); ?>images/mail.png" alt=""></div><?php foreach ($setting as $data) : ?>

									<a><?= $data->email_setting; ?></a>
								<?php endforeach ?>
							</div>
							<div class="top_bar_content ml-auto">
								<div class="top_bar_user">

									<?php if ($this->session->userdata('email') != null) { ?>

										<ul class="standard_dropdown top_bar_dropdown">
											<li>
												<a href="#">
													<img src="<?= base_url('uploads/users/') . $this->session->userdata('file'); ?>" class="rounded-circle img-thumbnail" width="80" alt="">
													<i class="fas fa-chevron-down"></i>
												</a>

												<ul>
													<li><a href="<?= base_url('public/profile/'); ?>">Profile</a></li>
													<li><a href="<?= base_url('public/checkouts/'); ?>">Transcation History</a></li>
													<li><a href="<?= base_url('login/logout_process'); ?>">Logout</a></li>
												</ul>
											</li>
										</ul>

									<?php } else { ?>

										<div class="user_icon"><img src="<?= base_url('assets/frontend/'); ?>images/user.svg" alt=""></div>
										<div><a href="<?= base_url('registration'); ?>">Register</a></div>
										<div><a href="<?= base_url('login'); ?>">Sign in</a></div>

									<?php } ?>

								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- Header Main -->

			<div class="header_main">
				<div class="container">
					<div class="row">
						<div class="col-lg-2 col-sm-3 col-3 order-1">
							<div class="logo_container">
								<div class="logo"><a href="<?= base_url(); ?>"><?php foreach ($setting as $data) : ?>
											<img height="70" src="<?php echo base_url(); ?>assets/images/logoo.jpg"> <?= $data->site_name; ?>
										<?php endforeach ?></a></div>
							</div>
						</div>

						<!-- Search -->
						<div class="col-lg-6 col-12 order-lg-2 order-3 text-lg-left text-right">
							<div class="header_search">
								<div class="header_search_content">
									<div class="header_search_form_container">
										<form action="<?= base_url('public/product/search/'); ?>" class="header_search_form clearfix" method="post">
											<input type="search" required="required" class="header_search_input" placeholder="Search for products..." name="search">
											<div class="custom_dropdown" style="display: none">
												<div class="custom_dropdown_list">
													<span class="custom_dropdown_placeholder clc"></span>
													<!-- <i class="fas fa-chevron-down"></i> -->
													<ul class="custom_list clc">
														<!-- <li><a class="clc" href="#">All Categories</a></li>
													<li><a class="clc" href="#">Computers</a></li>
													<li><a class="clc" href="#">Laptops</a></li>
													<li><a class="clc" href="#">Cameras</a></li>
													<li><a class="clc" href="#">Hardware</a></li>
													<li><a class="clc" href="#">Smartphones</a></li> -->
													</ul>
												</div>
											</div>
											<button type="submit" class="header_search_button trans_300" value="Submit"><img src="<?= base_url('assets/frontend/'); ?>images/search.png" alt=""></button>
										</form>
									</div>
								</div>
							</div>
						</div>

						<!-- Wishlist -->
						<div class="col-lg-4 col-9 order-lg-3 order-2 text-lg-left text-right">
							<div class="wishlist_cart d-flex flex-row align-items-center justify-content-end">
								<!-- <div class="wishlist d-flex flex-row align-items-center justify-content-end">
								<div class="wishlist_icon"><img src="images/heart.png" alt=""></div>
								<div class="wishlist_content">
									<div class="wishlist_text"><a href="#">Wishlist</a></div>
									<div class="wishlist_count">115</div>
								</div>
							</div> -->
								<?php if ($this->session->userdata('email') != null) { ?>
									<!-- Cart -->
									<div class="cart">
										<div class="cart_container d-flex flex-row align-items-center justify-content-end">
											<div class="cart_icon">
												<img src="<?= base_url('assets/frontend/'); ?>images/cart.png" alt="">
												<div class="cart_count"><span><?= $count_cart ?></span></div>
											</div>
											<div class="cart_content">
												<div class="cart_text"><a href="<?= base_url('public/cart'); ?>">Cart</a></div>
											</div>
										</div>
									</div>
								<?php } ?>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-3"></div>
				<div class="col-md-6">
					<?php
					$this->load->helper('form');
					$error = $this->session->flashdata('error');
					if ($error) {
					?>
						<div class="alert alert-danger alert-dismissable">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
							<?php echo $error; ?>
						</div>
					<?php }
					$success = $this->session->flashdata('success');
					if ($success) {
					?>
						<div class="alert alert-success alert-dismissable">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
							<?php echo $success; ?>
						</div>
					<?php } ?>
				</div>
			</div>

			<!-- Main Navigation -->

			<nav class="main_nav">
				<div class="container">
					<div class="row">
						<div class="col">

							<div class="main_nav_content d-flex flex-row">
								<div class="cat_menu_container">
									<div class="cat_menu_title d-flex flex-row align-items-center justify-content-start">
										<div class="cat_burger"><span></span><span></span><span></span></div>
										<div class="cat_menu_text">Categories</div>
									</div>

									<ul class="cat_menu">
										<?php
										foreach ($cat_prod as $key => $value) {
										?>
											<li <?php if ($key == 0) {
													echo 'class="active"';
												} ?>>
												<a href="<?= base_url('public/product/index/') . $value['id_product_categories']; ?>"><?= $value['name_categories'] ?><i class="fas fa-chevron-right ml-auto"></i></a>
											</li>
										<?php } ?>

									</ul>
								</div>

								<!-- Main Nav Menu -->

								<div class="main_nav_menu ml-auto">
									<ul class="standard_dropdown main_nav_dropdown">
										<li><a href="<?= base_url(); ?>">Home<i class="fas fa-chevron-down"></i></a></li>
										<!-- <li><a href="<?= base_url('public/blogs'); ?>">Blog<i class="fas fa-chevron-down"></i></a></li> -->
										<li><a href="<?= base_url('public/product/index/'); ?>">All Product<i class="fas fa-chevron-down"></i></a></li>
										<li><a href="<?= base_url('public/about_us'); ?>">About US<i class="fas fa-chevron-down"></i></a></li>

									</ul>
								</div>

								<!-- Menu Trigger -->

								<div class="menu_trigger_container ml-auto">
									<div class="menu_trigger d-flex flex-row align-items-center justify-content-end">
										<div class="menu_burger">
											<div class="menu_trigger_text">menu</div>
											<div class="cat_burger menu_burger_inner"><span></span><span></span><span></span></div>
										</div>
									</div>
								</div>

							</div>
						</div>
					</div>
				</div>
			</nav>

			<!-- Menu -->

		</header>