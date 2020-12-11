	<!-- Home -->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/frontend/'); ?>styles/cart_styles.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/frontend/'); ?>styles/cart_responsive.css">

	<!-- Cart -->

	<div class="cart_section">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 offset-lg-1">
					<div class="cart_container">
							<div class="cart_title">Transaction History</div>
							<div class="cart_items">
								<ul class="cart_list">
									<?php
					              	foreach ($all_history as $key => $value) {
					              	?>	
										<li class="cart_item clearfix">
										<div class="cart_item_image">
											<?php if(empty($value['file'])) {?>

												<img src="<?php echo base_url();?>assets/images/image_404.jpeg" alt="default" style="height : 100px;">
											<?php }else{?>

												<object data="<?php echo base_url();?>uploads/bukti/<?=$value['file']?>" type="image/png" style="height : 100px;">
						                       		<img src="<?php echo base_url();?>assets/images/image_404.jpeg" alt="default" style="height : 100px;">
						                      	</object>
											<?php }?>
											
										</div>
										<div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
											<div class="cart_item_name cart_info_col">
												<div class="cart_item_title">Total</div>
												<div class="cart_item_text"><?=number_format($value['total_price'],2)?></div>
											</div>
											
											<div class="cart_item_quantity cart_info_col">
												<div class="cart_item_title">Status</div>
												<div class="cart_item_text">
													<?php if($value['payment_status'] == '0') {?>
								                      <label class="btn btn-danger btn-sm">Belum di bayar</label>
								                    <?php }elseif($value['payment_status'] == '1'){ ?>
								                      <label class="btn btn-primary btn-sm">Menunggu Konfirmasi</label>
								                    <?php }else{ ?>
								                      <label class="btn btn-success btn-sm">Selesai</label>
								                    <?php } ?>
												</div>
											</div>
											
											<div class="cart_item_total cart_info_col">
												<div class="cart_item_title">Last Update</div>
												<div class="cart_item_text"><?= $value['updated_at']?></div>
											</div>
											<div class="cart_item_total cart_info_col">
												<div class="cart_item_title">&nbsp;</div>
												<div class="cart_item_text">
													<button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target=".bs-example-modal-lg-<?=$value['id_checkout']?>"><i class="fa fa-check"></i> Konfirmasi Pembayaran</button>
												</div>
											</div>
										</div>
										<!-- modals -->
										<div class="modal fade bs-example-modal-lg-<?=$value['id_checkout']?>" tabindex="-1" role="dialog" aria-hidden="true">
											<div class="modal-dialog modal-lg">
											  <div class="modal-content">
											    <div class="modal-header">
											      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
											      </button>
											      <h4 class="modal-title" id="myModalLabel2">Detail Pembayaran</h4>
											    </div>
											    <div class="modal-body">
											    	<h5>Daftar Barang</h5>
											      	<ul class="cart_list">
														<?php
														$total = 0;
											          	foreach ($value['detail_barang'] as $key => $res) {
											          		$total = $total + ($res['price']*$res['quantity']);
											            ?>
														<li class="cart_item clearfix">
															<div class="cart_item_image">
																<object data="<?php echo base_url();?>uploads/produk/<?=$res['file']?>" type="image/png" style="height : 100px;">
											                        <img src="<?php echo base_url();?>assets/images/image_404.jpeg" alt="default" style="height : 100px;">
											                      </object>
															</div>
															<div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
																<div class="cart_item_name cart_info_col">
																	<div class="cart_item_title">Name</div>
																	<div class="cart_item_text"><?=$res['name']?></div>
																</div>
																
																<div class="cart_item_quantity cart_info_col">
																	<div class="cart_item_title">Quantity</div>
																	<div class="cart_item_text"><?=$res['quantity']?></div>
																</div>
																<div class="cart_item_price cart_info_col">
																	<div class="cart_item_title">Price</div>
																	<div class="cart_item_text">Rp. <?=number_format($res['price'],2)?></div>
																</div>
																<div class="cart_item_total cart_info_col">
																	<div class="cart_item_title">Total</div>
																	<div class="cart_item_text">Rp. <?= number_format($res['price']*$res['quantity'],2)?></div>
																</div>
																
															</div>
														</li>
														<?php }?>
													</ul>
													<hr>
													<h5>Upload Bukti Bayar</h5>
													<hr>
													<form action="<?= base_url('public/checkouts/update_process/'); ?>" method="post" enctype="multipart/form-data">
														<input type="hidden" name="id_checkout" value="<?=$value['id_checkout']?>">
														<div class="input-group">
											                <span class="input-group-addon"><i class="fa fa-file-image"></i></span>
											                <input type="file" name="file"  class="form-control"  accept="image/*" required="required">
											            </div>
											            <br>		
											    </div>
											    <div class="modal-footer">
											      <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
											      <button type="submit" class="btn btn-primary"  title="Konformasi Pembayaran">Konfirmasi</button>
											    </div>

											    </form>
											  </div>
											</div>
										</div>
									</li>
									<?php } ?>
								</ul>
							</div>
						</div>
				</div>
			</div>
		</div>
	</div>

