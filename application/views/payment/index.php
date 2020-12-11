
<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3><i class="fa fa-shopping-bag"></i> Konfirmasi Pembayaran</h3>
    </div>
  </div>
 
  <div class="clearfix"></div>
   <hr>
  <div class="x_panel">
    <div class="x_title">
      <h4>Konfirmasi Pembayaran</h4>
      <div class="clearfix">
    </div>
    <div class="x_content">
      <?php
      $this->load->helper('form');
      $error = $this->session->flashdata('error');
      if($error)
      {
          ?>
          <div class="alert alert-danger alert-dismissable">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              <?php echo $error; ?>                    
          </div>
      <?php }
      $success = $this->session->flashdata('success');
      if($success)
      {
          ?>
          <div class="alert alert-success alert-dismissable">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              <?php echo $success; ?>                    
          </div>
      <?php } ?>
      <br>
      <div class="table-responsive">
        <table class="table" id="datatable">
          <thead>
            <tr>
              <th width="5%">No</th>
              <th width="20%">Bukti Bayar</th>
              <th width="10%">Total</th>
              <th width="20%">Users</th>
              <th width="10%">Status</th>
              <th width="10%">Last Update</th>
              <th width="10%" class="text-center">Aksi</th>
            </tr>
          </thead>
          <tbody>
              <?php
                foreach ($payment as $key => $value) {
              ?>
                <tr>
                  <td><?=$no?></td>
                    <td>
                      <?php if(empty($value['file'])) {?>

                        <img src="<?php echo base_url();?>assets/images/image_404.jpeg" alt="default" style="height : 100px;">
                      <?php }else{?>

                        <object data="<?php echo base_url();?>uploads/bukti/<?=$value['file']?>" type="image/png" style="height : 100px;">
                                      <img src="<?php echo base_url();?>assets/images/image_404.jpeg" alt="default" style="height : 100px;">
                                    </object>
                      <?php }?>
                    </td>
                    <td>Rp.<?=number_format($value['total_price'],2)?></td>
                    <td>
                      <b>Nama</b> : <?=$value['fullname']?> <br>
                      <b>Email</b> : <?=$value['email']?> <br>
                      <b>No Telp</b> : <?=$value['phone']?> <br>
                      <b>Alamat</b> : <?=$value['address']?> <br>
                      <b>Tgl. Lahir</b> : <?=$value['birthday']?> <br>
                    </td>
                    <td>
                      <?php if($value['payment_status'] == '0') {?>
                        <label class="label label-danger ">Belum di bayar</label>
                      <?php }elseif($value['payment_status'] == '1'){ ?>
                        <label class="label label-primary">Menunggu Konfirmasi</label>
                      <?php }else{ ?>
                        <label class="label label-success">Selesai</label>
                      <?php } ?>
                    </td>
                    <td><?=$value['last_updated']?></td>
                    <td>
                      <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target=".bs-example-modal-lg-<?=$value['id_checkout']?>"><i class="fa fa-check"></i> Detail Barang</button>
                      <div class="modal fade bs-example-modal-lg-<?=$value['id_checkout']?>" tabindex="-1" role="dialog" aria-hidden="true">
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                            </button>
                            <h4 class="modal-title" id="myModalLabel2">Detail Pembayaran</h4>
                          </div>
                          <div class="modal-body">
                            <table class="table table-responsive table-stripped">
                                <?php 
                                  $total = 0;
                                  foreach ($value['detail_barang'] as $key => $res) {
                                  $total = $total + ($res['price']*$res['quantity']);
                                ?>
                                  <tr>
                                      <td>
                                        <object data="<?php echo base_url();?>uploads/produk/<?=$res['file']?>" type="image/png" style="height : 100px;">
                                          <img src="<?php echo base_url();?>assets/images/image_404.jpeg" alt="default" style="height : 100px;">
                                        </object>
                                      </td>
                                      <td>
                                        <b><?=$res['name']?></b>
                                      </td>
                                      <td>
                                        <b>Qty :</b> <?=$res['quantity']?>
                                      </td>
                                      <td><b>Rp</b>. <?=number_format($res['price'],2)?></td>
                                      <td><b>Total : Rp.</b> <?= number_format($res['price']*$res['quantity'],2)?></td>
                                  </tr>
                                <?php }?>
                            </table>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                            <?php if($value['payment_status'] == '1') {?>
                              <a type="submit" class="btn btn-primary"  title="Konformasi Pembayaran" href="<?php echo base_url().'payment/confirm_process/'.$value['id_checkout']; ?>/<?php echo $this->uri->segment(2)?>">Konfirmasi</a>
                            <?php }?>
                          </div>
                        </div>
                      </div>
                    </div>
                    </td>
                 
                    
                </tr>
              <?php
              $no++;
              }
            ?>
          </tbody>
        </table>
      </div>
      <?php echo($links);?>
    </div>
    
  </div>
</div>
