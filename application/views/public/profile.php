
<!-- Home -->
<link rel="stylesheet" type="text/css" href="<?= base_url('assets/frontend/'); ?>styles/cart_styles.css">
<link rel="stylesheet" type="text/css" href="<?= base_url('assets/frontend/'); ?>styles/cart_responsive.css">

<!-- Cart -->

<div class="cart_section">
	<div class="container">
		<div class="row">
			<div class="col-lg-10 offset-lg-1">
				<form action="<?= base_url('public/profile/update_process/'); ?>" method="post" enctype="multipart/form-data">
				<input type="hidden" value="<?=$detail['id_users']?>" name="id_users">
				<div class="cart_container">
					<div class="cart_title">Profile Anda</div>
					<div class="cart_items">
						<ul class="cart_list">
							<li class="cart_item clearfix">
								<table class="table">
									<tr>
										<td>Nama</td>
										<td>
											<div class="product_quantity clearfix">
												<input type="text" class="form-control" value="<?=$detail['fullname']?>" name="fullname">
											</div>
										</td>											
									</tr>
									<tr>
										<td>Phone</td>
										<td>
											<div class="product_quantity clearfix">
												<input type="text"class="form-control" value="<?=$detail['phone']?>" name="phone">
											</div>

										</td>											
									</tr>
									<tr>
										<td>Birthday</td>
										<td>
											<div class="product_quantity clearfix">
												<input type="date"class="form-control" value="<?=$detail['birthday']?>" name="birthday">
											</div>

										</td>											
									</tr>
									<tr>
										<td>Address</td>
										<td>
											<div class="product_quantity clearfix">
												<input type="text"class="form-control" value="<?=$detail['address']?>" name="address">
											</div>

										</td>											
									</tr>
									<tr>
										<td>Photo</td>
										<td>
											<div class="form-group" id="file">
									          <input type="file" class="form-control ckeditor" name="file" id="file">
									        </div>
									        <div class="form-group">
									          <object data="<?php echo base_url();?>uploads/users/<?=$detail['file']?>" type="image/png" style="width : 250px;">
									            <img src="<?php echo base_url();?>assets/images/image_404.jpeg" alt="default" style="width : 250px;">
									          </object>
									        </div>
										</td>
									</tr>
									<tr>
										<td>Email</td>
										<td>
											<div class="product_quantity clearfix">
												<input type="text" class="form-control" value="<?=$detail['email']?>" name="email">
											</div>

										</td>											
									</tr>
									<tr>
										<td>Username</td>
										<td>
											<div class="product_quantity clearfix">
												<input type="text" class="form-control" value="<?=$detail['username']?>" name="username" readonly>
											</div>

										</td>											
									</tr>
									<tr>
										<td>Password</td>
										<td>
											<div class="product_quantity clearfix">
												<input type="password" class="form-control" name="password" id="password">
											</div>
										</td>											
									</tr>
									<tr>
										<td>Repeat Password</td>
										<td>
											<div class="product_quantity clearfix">
												<input type="password" class="form-control" name="confirm_password" id="confirm_password">
												 <span id='message'></span>
											</div>
										</td>											
									</tr>
								</table>
								<h7 style="color: red"> Kosongi field password jika tidak ingin mengganti password !</h7>
							</li>
						</ul>
					</div>	
					<!-- Order Total -->	
				</div>
				<hr>
				<div class="button_container">
					<button type="submit" class="button cart_button_checkout">Simpan</button>
					<div class="product_fav"><i class="fas fa-heart"></i></div>
				</div>
				</form>
			</div>
		</div>
	</div>
</div>
	




