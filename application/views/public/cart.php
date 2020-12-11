	<!-- Home -->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/frontend/'); ?>styles/cart_styles.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/frontend/'); ?>styles/cart_responsive.css">

	<!-- Cart -->

	<div class="cart_section">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 offset-lg-1">
					<div class="cart_container">
							<div class="cart_title">Shopping Cart</div>
							<div class="cart_items">
								<ul class="cart_list">
									<?php
									$total = 0;
					              	foreach ($all_cart as $key => $value) {
					              		$total = $total + ($value['price']*$value['quantity']);
						            ?>
									<li class="cart_item clearfix">
										<div class="cart_item_image">
											<object data="<?php echo base_url();?>uploads/produk/<?=$value['file']?>" type="image/png" style="height : 100px;">
						                        <img src="<?php echo base_url();?>assets/images/image_404.jpeg" alt="default" style="height : 100px;">
						                     </object>
										</div>
										<div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
											<div class="cart_item_name cart_info_col">
												<div class="cart_item_title">Name</div>
												<div class="cart_item_text"><?=$value['name']?></div>
											</div>
											
											<div class="cart_item_quantity cart_info_col">
												<div class="cart_item_title">Quantity</div>
												<div class="cart_item_text"><?=$value['quantity']?></div>
											</div>
											<div class="cart_item_price cart_info_col">
												<div class="cart_item_title">Price</div>
												<div class="cart_item_text">Rp. <?=number_format($value['price'],2)?></div>
											</div>
											<div class="cart_item_total cart_info_col">
												<div class="cart_item_title">Total</div>
												<div class="cart_item_text">Rp. <?= number_format($value['price']*$value['quantity'],2)?></div>
											</div>
											<div class="cart_item_total cart_info_col">
												<div class="cart_item_title"></div>
												<div class="cart_item_text">
													<a href="<?= base_url('public/cart/delete_list/').$value['id_cart_list']; ?>" class="confirm2"> <i class="fa fa-trash " title="Hapus"></i></a>
												</div>
											</div>
										</div>
									</li>
									<?php }?>
								</ul>
							</div>
							
							<!-- Order Total -->
							<div class="order_total">
								<div class="order_total_content text-md-right">
									<div class="order_total_title">Order Total:</div>
									<div class="order_total_amount">Rp. <?=number_format($total, 2)?></div>
								</div>
							</div>

							<div class="cart_buttons">
								
								<?php if (!empty($all_cart)) {?>
								<a  class="button cart_button_clear confirm2" href="<?= base_url('public/cart/delete_all/').$id_cart; ?>">Clear Cart</a>
								<a  class="button cart_button_checkout confirm2" href="<?= base_url('public/checkouts/save/').$id_cart; ?>">Checkouts</a>
								<?php } ?>
							</div>
						</div>
				</div>
			</div>
		</div>
	</div>
