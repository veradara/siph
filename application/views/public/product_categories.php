<!-- Home -->
<link rel="stylesheet" type="text/css" href="<?= base_url('assets/frontend/'); ?>styles/shop_styles.css">
<link rel="stylesheet" type="text/css" href="<?= base_url('assets/frontend/'); ?>styles/shop_responsive.css">

<div class="home">
	<div class="banner_background" style="background-image:url(<?= base_url('assets/frontend/'); ?>images/weddingcake.jpg)"></div>
	<div class="home_content d-flex flex-column align-items-center justify-content-center">
		<h2 class="home_title" style="color: white">SIPH Products</h2>
	</div>
</div>

<!-- Shop -->

<div class="shop">
	<div class="container">
		<div class="row">
			<div class="col-lg-3">
				<!-- Shop Sidebar -->
				<div class="shop_sidebar">
					<div class="sidebar_section">
						<div class="sidebar_title">Categories</div>
						<ul class="sidebar_categories">
							<li>
								<a href="<?= base_url('public/product/index'); ?>">All Products</a>
							</li>
							<?php
							foreach ($cat_prod as $key => $value) {
							?>
								<li>
									<a href="<?= base_url('public/product/index/') . $value['id_product_categories']; ?>"><?= $value['name_categories'] ?></a>
								</li>
							<?php } ?>
						</ul>
					</div>

				</div>

			</div>

			<div class="col-lg-9">

				<!-- Shop Content -->

				<div class="shop_content">
					<div class="shop_bar clearfix">
						<div class="shop_product_count"><span></span> List found</div>
						<div class="shop_sorting">
							<!-- <span>Sort by:</span>
								<ul>
									<li>
										<span class="sorting_text">highest rated<i class="fas fa-chevron-down"></span></i>
										<ul>
											<li class="shop_sorting_button" data-isotope-option='{ "sortBy": "original-order" }'>highest rated</li>
											<li class="shop_sorting_button" data-isotope-option='{ "sortBy": "name" }'>name</li>
											<li class="shop_sorting_button"data-isotope-option='{ "sortBy": "price" }'>price</li>
										</ul>
									</li>
								</ul> -->
						</div>
					</div>

					<div class="product_grid">
						<div class="product_grid_border"></div>

						<div class="product_panel panel active">
							<div class="featured_slider slider">
								<!-- Slider Item -->
								<?php foreach ($product as $key => $res) { ?>
									<div class="featured_slider_item">
										<div class="border_active"></div>
										<div class="product_item discount d-flex flex-column align-items-center justify-content-center text-center">
											<div class="product_image d-flex flex-column align-items-center justify-content-center">
												<object data="<?php echo base_url(); ?>uploads/produk/<?= $res['file'] ?>" type="image/png" style="width : 100px;">
													<img src="<?php echo base_url(); ?>assets/images/image_404.jpeg" alt="default" style="width : 100px;">
												</object>
											</div>
											<div class="product_content">
												<div class="product_price discount">Rp. <?= number_format($res['price'], 2) ?></div>
												<div class="product_name">
													<div><a href="<?= base_url('public/product/detail/') . $res['id_product']; ?>"><?= $res['name'] ?></a></div>
												</div>
												<div class="product_extras">

													<button class="product_cart_button <?php if ($this->session->userdata('email') == null) {
																							echo ('confirm');
																						} ?>" onclick="window.location.href='<?= base_url('public/cart/add_single/') . $res['id_product']; ?>'">Add to Cart</button>
												</div>
											</div>
											<div class="product_fav"><i class="fas fa-heart"></i></div>
											<ul class="product_marks">
												<!-- <li class="product_mark product_discount">-25%</li> -->
												<li class="product_mark product_new">new</li>
											</ul>
										</div>
									</div>
								<?php } ?>
							</div>
							<div class="featured_slider_dots_cover"></div>
						</div>

					</div>

				</div>

			</div>
		</div>
	</div>
</div>