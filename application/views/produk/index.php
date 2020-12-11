<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3><i class="fa fa-file-text"></i> Produk</h3>
    </div>
  </div>
 
  <div class="clearfix"></div>
   <hr>
  <div class="x_panel">
    <div class="x_title">
      <h4>Produk</h4>
      <div class="clearfix"><a type="button" class="btn btn-primary btn-sm" href="<?php echo base_url().'produk/add/'?>" title="Edit"><i class="fa fa-plus"></i> Tambah Produk</a></div>
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
      <div class="table-responsive">
        <table class="table" id="datatable">
          <thead>
            <tr>
              <th width="5%">No</th>
              <th width="20%">Nama</th>
              <th width="10%">Quantyty</th>
              <th width="10%">Harga</th>
              <th width="10%">Kategori</th>
              <th width="25%">Foto</th>
              <th width="10%" class="text-center">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
              foreach ($produk as $key => $value) {
            ?>
                <tr>
                  <td><?=$no?></td>
                  <td><?=$value['name']?></td>
                  <td><?=$value['quantity']?></td>
                  <td><?=$value['price']?></td>
                  <td><?=$value['category_name']?></td>
                  <td>
                    <?php if($value['file'] != NULL) { ?>
                      <object data="<?php echo base_url();?>uploads/produk/<?=$value['file']?>" type="image/png" style="width : 100px;">
                        <img src="<?php echo base_url();?>assets/images/image_404.jpeg" alt="default" style="width : 100px;">
                      </object>
                    <?php }else{ ?>
                        <img src="<?php echo base_url();?>assets/images/image_404.jpeg" alt="default" style="width : 100px;">
                    <?php } ?>
                  </td>
                  <td>
                    <a type="button" class="btn btn-primary btn-sm" href="<?php echo base_url().'produk/edit/'.$value['id_product']; ?>/<?php echo $this->uri->segment(2)?>" title="Edit"><i class="fa fa-pencil"></i></a>
                    <a type="button" class="btn btn-danger confirm btn-sm" href="<?php echo base_url().'produk/delete/'.$value['id_product']; ?>/<?php echo $this->uri->segment(2)?>" title="Delete"><i class="fa fa-times"></i></a>
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
