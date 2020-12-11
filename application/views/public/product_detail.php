<!-- Single Product -->
	<!-- Home -->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/frontend/'); ?>styles/product_styles.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/frontend/'); ?>styles/product_responsive.css">

	<!-- Single Product -->
	<br>

	<div class="single_product">
		<div class="container">
			<div class="row">

				<!-- Images -->
			

				<!-- Selected Image -->
				<div class="col-lg-5 order-lg-2 order-1">
					<div class="image_selected"><img src="<?= base_url('uploads/produk/') . $detail['file']; ?>" alt=""></div>
				</div>

				<!-- Description -->
				<div class="col-lg-5 order-3">
					<div class="product_description">
						<div class="product_category"><?=$detail['category_name']?></div>
						<div class="product_name"><?=$detail['name']?></div>
						<!-- <div class="rating_r rating_r_4 product_rating"><i></i><i></i><i></i><i></i><i></i></div> -->
						<div class="product_text"><p><?=$detail['description']?></p></div>
						<div class="order_info d-flex flex-row">
							<form action="<?= base_url('public/cart/add_from_detail/'); ?>" method="post">
								<div class="clearfix" style="z-index: 1000;">
									<input type="hidden" name="id_product" value="<?=$detail['id_product']?>">

									<!-- Product Quantity -->
									<div class="product_quantity clearfix">
										<span>Quantity: </span>
										<input id="quantity_input" type="text" pattern="[0-9]*" value="1" name="quantity">
										
									</div>

									<!-- Product Color -->
									

								</div>

								<div class="product_price">Rp. <?=number_format($detail['price'],2)?></div>
								<div class="button_container">
									<button type="submit" class="button cart_button">Add to Cart</button>
									<div class="product_fav"><i class="fas fa-heart"></i></div>
								</div>
								
							</form>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>

	