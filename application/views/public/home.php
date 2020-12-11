<!-- Banner -->

<div class="banner">
	<div class="banner_background" style="background-image:url(<?= base_url('assets/frontend/'); ?>images/weddingcake.jpg)"></div>
	<div class="container fill_height">
		<div class="row fill_height">
			<!-- <div class="banner_product_image"><img height="400px" src="<?= base_url('uploads/produk/') . $last_prod['file']; ?>" alt=""></div> -->
			<div class="col-lg-5 offset-lg-4 fill_height">
				<div class="banner_content">
					<h1 class="banner_text" style="color :white;"><?= $last_prod['name'] ?></h1>
					<div class="banner_price" style="color: white;">Rp <?= number_format($last_prod['price'], 2) ?></div>
					<div class="banner_product_name" style="color: white">Daftar Sekarang</div>
					<div class="button banner_button"><a href="<?= base_url('public/cart/add_single/') . $last_prod['id_product']; ?>">Add to cart</a></div>
				</div>
			</div>
		</div>
	</div>
</div>


<!-- Deals of the week -->
<!-- 
<div class="deals_featured">
	<div class="container">
		<div class="row">
			<div class="col d-flex flex-lg-row flex-column align-items-center justify-content-start">

				
				<div class="featured">
					<div class="tabbed_container">
						<div class="tabs">
							<ul class="clearfix">
								<?php
								foreach ($cat_prod as $key => $value) {
								?>
									<li <?php if ($key == 0) {
											echo 'class="active"';
										} ?>><?= $value['name_categories'] ?></li>

								<?php } ?>
							</ul>
							<div class="tabs_line"><span></span></div>
						</div>

						<?php foreach ($cat_prod as $key => $value) { ?>
							<div class="product_panel panel <?php if ($key == 0) {
																echo 'active';
															} ?>">
								<div class="featured_slider slider">
									<?php foreach ($value['product'] as $key => $res) { ?>
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
													<li class="product_mark product_new">new</li>
												</ul>
											</div>
										</div>
									<?php } ?>
								</div>
								<div class="featured_slider_dots_cover"></div>
							</div>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div> -->

<div class="container" style="margin-top: 100px;">
	<div class="row">
		<div class="col-sm-12">
			<h2>Produk</h2>
			<hr>
		</div>
	</div>
</div>

<div class="banner_2 mt-5">
	<div class="banner_2_background" style="background-image:url(<?= base_url('assets/images/products/banner_2_background.jpg')?>)"></div>
	<div class="banner_2_container">
		<div class="banner_2_dots"></div>
		<!-- Banner 2 Slider -->

		<div class="owl-carousel owl-theme banner_2_slider">

			<?php foreach ($cat_prod as $key => $value) : ?>
				<?php foreach ($value['product'] as $key => $res) : ?>
					<!-- Banner 2 Slider Item -->
					<div class="owl-item">
						<div class="banner_2_item">
							<div class="container fill_height">
								<div class="row fill_height">
									<div class="col-lg-8 col-md-6 fill_height">
										<div class="banner_2_image_container">
											<div class="banner_2_image"><img src="<?= base_url('uploads/produk/' . $res['file']); ?>" alt=""></div>
										</div>
									</div>
									<div class="col-lg-4 col-md-6 fill_height">
										<div class="banner_2_content">
											<div class="banner_2_title">
												<a href="<?= base_url('public/product/detail/') . $res['id_product']; ?>"><?= $res['name'] ?></a>
											</div>
											<div class="banner_2_text"><?= substr($res['description'], 0, 80); ?>.</div>
											<div class="rating_r rating_r_4 banner_2_rating">Rp. <?= number_format($res['price'], 2) ?></div>
											<!-- <div class="button banner_2_button"><a href="#">Explore</a></div> -->
											<button class="button banner_2_button btn btn-primary <?php if ($this->session->userdata('email') == null) {
																								echo ('confirm');
																							} ?>" onclick="window.location.href='<?= base_url('public/cart/add_single/') . $res['id_product']; ?>'">Add to Cart</button>
										</div>
									</div>
								</div>
							</div>			
						</div>
					</div>

				<?php endforeach; ?>
			<?php endforeach; ?>

		</div>
	</div>
</div>