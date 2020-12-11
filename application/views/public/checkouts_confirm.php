	<!-- Home -->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/frontend/'); ?>styles/cart_styles.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/frontend/'); ?>styles/cart_responsive.css">

	<!-- Cart -->

	<div class="cart_section">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 offset-lg-1">
					<div class="cart_container">
						<div class="cart_title">Checkouts</div>
						<div class="cart_items">
							<ul class="cart_list">
								<li class="cart_item clearfix">
									<h5>Silah kan transfer ke salah satu rekening berikut ini :</h5>

									<table class="table">
										<tr>
											<td>Mandiri</td>
											<td>
												<img src="https://1.bp.blogspot.com/-QP4vt4BcT6E/WgO4eSbEKoI/AAAAAAAAEoY/QpI27S8JkN402sNJvw6QnOxX0s6Q_ub2QCLcBGAs/w1200-h630-p-k-no-nu/mandiri.jpg" width="100px">
											</td>
											<td>
												A/N : Dara<br>
												No Rek . 3847677577722
											</td>
										</tr>
										<tr>
											<td>BCA</td>
											<td>
												<img src="https://2.bp.blogspot.com/-lOAvxqPQ23s/WgO53cUvDOI/AAAAAAAAEoo/hiWQzddn0Vcu6FTQFU3iPnfe0jBqqvZowCLcBGAs/s320/bca.jpg" width="100px">
											</td>
											<td>
												A/N : Dara<br>
												No Rek . 708307576576
											</td>
										</tr>
										<tr>
											<td>BRI</td>
											<td>
												<img src="https://cdn3.iconfinder.com/data/icons/banks-in-indonesia-logo-badge/100/BRI-512.png" width="100px">
											</td>
											<td>
												A/N : Dara<br>
												No Rek . 8768787877899
											</td>
										</tr>
									</table>

									<h7 style="color: red"> Anda dapat mengupload bukti bayar pada history transaksi !</h7>
								</li>
							</ul>
						</div>

						<!-- Order Total -->
						<div class="order_total">
							<div class="order_total_content text-md-right">
								<div class="order_total_title">Dengan sejumlah:</div>
								<div class="order_total_amount">Rp. <?= number_format($total, 2) ?></div>
							</div>
						</div>

						<div class="cart_buttons">
							<a class="button cart_button_checkout confirm2" href="<?= base_url('public/checkouts/save_process/') . $id_cart; ?>">Simpan</a>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>