<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3><i class="fa fa-gear"></i> Setting</h3>
    </div>
  </div>
 <script type="text/javascript" src="<?php echo base_url();?>assets/ckeditor/ckeditor.js" charset="utf-8"></script>

  <div class="clearfix"></div>
   <hr>
  <div class="x_panel">
    <div class="x_title">
      <h4>Setting</h4>
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
      <form role="form" action="<?php echo base_url() ?>setting/save_process" method="post" enctype="multipart/form-data">
        <div class="form-group">
          <label for="site_name">Nama Situs</label>
          <input type="text" class="form-control" name="site_name" id="site_name" value="<?=$detail['site_name']?>">
        </div>
        <div class="form-group">
          <label for="description">Deskripsi</label>
          <input type="text" class="form-control" name="description" id="description" value="<?=$detail['description']?>">
        </div>
        <div class="form-group">
          <label for="id_makul">Tentang Kami</label>
          <textarea name="about_us" class="form-control ckeditor"><?=$detail['about_us']?></textarea>
        </div>
        <button type="submit" class="btn btn-default"><i class="fa fa-paper-plane"></i> Simpan</button>
      </form>
    </div>
  </div>
</div>




