<!-- Home -->
<link rel="stylesheet" type="text/css" href="<?= base_url('assets/frontend/'); ?>styles/cart_styles.css">
<link rel="stylesheet" type="text/css" href="<?= base_url('assets/frontend/'); ?>styles/cart_responsive.css">

<!-- Cart -->

<div class="cart_section">
	<div class="container">
		<div class="row">
			<div class="col-lg-10 offset-lg-1">
				<form action="<?= base_url('registration/save_process'); ?>" method="post" enctype="multipart/form-data">
				<div class="cart_container">
					<div class="cart_title">Registrasi User Baru</div>
					<div class="cart_items">
						<ul class="cart_list">
							<li class="cart_item clearfix">
								<table class="table">
									<tr>
										<td>Nama</td>
										<td>
											<div class="product_quantity clearfix">
												<input type="text" class="form-control" value="" name="fullname">
											</div>
										</td>											
									</tr>
									<tr>
										<td>Phone</td>
										<td>
											<div class="product_quantity clearfix">
												<input type="text" class="form-control" value="" name="phone">
											</div>

										</td>											
									</tr>
									<tr>
										<td>Birthday</td>
										<td>
											<div class="product_quantity clearfix">
												<input type="date" class="form-control" value="" name="birthday">
											</div>

										</td>											
									</tr>
									<tr>
										<td>Address</td>
										<td>
											<div class="product_quantity clearfix">
												<input type="text" class="form-control" value="" name="address">
											</div>

										</td>											
									</tr>
									<tr>
										<td>Photo</td>
										<td>
											<div class="form-group" id="file">
									          <input type="file" class="form-control ckeditor" name="file" id="file">
									        </div>
									        
										</td>
									</tr>
									<tr>
										<td>Email</td>
										<td>
											<div class="product_quantity clearfix">
												<input type="email" class="form-control" value="" name="email" >
											</div>

										</td>											
									</tr>
									<tr>
										<td>Username</td>
										<td>
											<div class="product_quantity clearfix">
												<input type="text" class="form-control" value="" name="username" >
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
								
							</li>
						</ul>
					</div>	
					<!-- Order Total -->	
				</div>
				<hr>
				<div class="button_container">
					<button type="submit" id="submit" class="button cart_button_checkout" disabled="disabled">Simpan</button>
				</div>
				</form>
			</div>
		</div>
	</div>
</div>
	




