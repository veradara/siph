<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3><i class="fa fa-file-text"></i>Edit Artikel</h3>
    </div>
  </div>
 <script type="text/javascript" src="<?php echo base_url();?>assets/ckeditor/ckeditor.js" charset="utf-8"></script>

  <div class="clearfix"></div>
   <hr>
  <div class="x_panel">
    <div class="x_title">
      <h4>Artikel</h4>
      <div class="clearfix"><a type="button" class="btn btn-primary btn-sm" href="<?php echo base_url().'artikel/'?>" title="kembali"><i class="fa fa-arrow-left"></i> Kembali</a></div>
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
      <form role="form" action="<?php echo base_url() ?>artikel/edit_process" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id_article" value="<?=$detail['id_article']?>">
        <div class="form-group">
          <label for="judul">Judul</label>
          <input type="text" class="form-control" name="title" id="judul" value="<?=$detail['title']?>">
        </div>
        <div class="form-group">
          <label for="id_makul">Artikel</label>
          <textarea name="content" class="form-control ckeditor"><?=$detail['content']?></textarea>
        </div>
        <div class="form-group" id="file">
          <label for="file">File</label>
          <input type="file" class="form-control ckeditor" name="file" id="file">
        </div>
        <div class="form-group">
          <object data="<?php echo base_url();?>uploads/artikel/<?=$detail['file']?>" type="image/png" style="width : 250px;">
            <img src="<?php echo base_url();?>assets/images/image_404.jpeg" alt="default" style="width : 250px;">
          </object>
        </div>
        <button type="submit" class="btn btn-default"><i class="fa fa-paper-plane"></i> Simpan</button>
      </form>
    </div>
    
  </div>
</div>


