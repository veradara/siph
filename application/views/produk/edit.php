<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3><i class="fa fa-file-text"></i> Edit Produk</h3>
    </div>
  </div>
 <script type="text/javascript" src="<?php echo base_url();?>assets/ckeditor/ckeditor.js" charset="utf-8"></script>

  <div class="clearfix"></div>
   <hr>
  <div class="x_panel">
    <div class="x_title">
      <h4>Produk</h4>
      <div class="clearfix"><a type="button" class="btn btn-primary btn-sm" href="<?php echo base_url().'produk/'?>" title="kembali"><i class="fa fa-arrow-left"></i> Kembali</a></div>
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
      <form role="form" action="<?php echo base_url() ?>produk/edit_process" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id_product" value="<?=$detail['id_product']?>">
        <div class="form-group">
          <label for="name">Nama</label>
          <input type="text" class="form-control" name="name" id="name" value="<?=$detail['name']?>">
        </div>
        <div class="form-group">
          <label>Kategori</label>
          <select class="form-control" name="id_product_categories">
            <?php
              foreach ($categories as $key => $value) {
            ?>
              <option value="<?=$value['id_product_categories']?>"><?=$value['name_categories']?></option>
            <?php }?>
            
          </select>
        </div>
        <div class="form-group">
          <label for="quantity">Quantity</label>
          <input type="number" class="form-control" name="quantity" id="quantity" value="<?=$detail['quantity']?>">
        </div>
        <div class="form-group">
          <label for="price">Harga</label>
          <input type="number" class="form-control" name="price" id="price" value="<?=$detail['price']?>">
        </div>
        <div class="form-group">
          <label for="id_makul">Deskripsi</label>
          <textarea name="description" class="form-control ckeditor"><?=$detail['description']?></textarea>
        </div>
        <div class="form-group" id="file">
          <label for="file">Photo</label>
          <input type="file" class="form-control ckeditor" name="file" id="file">
        </div>
        <div class="form-group">
          <object data="<?php echo base_url();?>uploads/produk/<?=$detail['file']?>" type="image/png" style="width : 250px;">
            <img src="<?php echo base_url();?>assets/images/image_404.jpeg" alt="default" style="width : 250px;">
          </object>
        </div>
        <button type="submit" class="btn btn-default"><i class="fa fa-paper-plane"></i> Simpan</button>
      </form>
    </div>
    
  </div>
</div>



