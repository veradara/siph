<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3><i class="fa fa-file-text"></i> Artikel</h3>
    </div>
  </div>
 
  <div class="clearfix"></div>
   <hr>
  <div class="x_panel">
    <div class="x_title">
      <h4>Artikel</h4>
      <div class="clearfix"><a type="button" class="btn btn-primary btn-sm" href="<?php echo base_url().'artikel/add/'?>" title="Edit"><i class="fa fa-plus"></i> Tambah Artikel</a></div>
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
              <th width="20%">Judul</th>
              <th width="30%">Featured Image</th>
              <th width="15%">created at</th>
              <th width="10%" class="text-center">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
              foreach ($artikel as $key => $value) {
            ?>
                <tr>
                  <td><?=$no?></td>
                  <td><?=$value['title']?></td>
                  <td>
                    <?php if($value['file'] != NULL) { ?>
                      <object data="<?php echo base_url();?>uploads/artikel/<?=$value['file']?>" type="image/png" style="width : 100px;">
                        <img src="<?php echo base_url();?>assets/images/image_404.jpeg" alt="default" style="width : 100px;">
                      </object>
                    <?php }else{ ?>
                        <img src="<?php echo base_url();?>assets/images/image_404.jpeg" alt="default" style="width : 100px;">
                    <?php } ?>
                  </td>
                  <td><?=$value['created_at']?></td>
                  <td>
                    <a type="button" class="btn btn-primary btn-sm" href="<?php echo base_url().'artikel/edit/'.$value['id_article']; ?>/<?php echo $this->uri->segment(2)?>" title="Edit"><i class="fa fa-pencil"></i></a>
                    <a type="button" class="btn btn-danger confirm btn-sm" href="<?php echo base_url().'artikel/delete/'.$value['id_article']; ?>/<?php echo $this->uri->segment(2)?>" title="Delete"><i class="fa fa-times"></i></a>
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
