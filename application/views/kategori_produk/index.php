<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3><i class="fa fa-file-text"></i> Kategori Produk</h3>
    </div>
  </div>
 
  <div class="clearfix"></div>
   <hr>
  <div class="x_panel">
    <div class="x_title">
      <h4>Kategori Produk</h4>
      <div class="clearfix"><a type="button" class="btn btn-primary btn-sm" href="<?php echo base_url().'kategori_produk/add/'?>" title="Edit"><i class="fa fa-plus"></i> Tambah Kategori</a></div>
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
              <th width="85%">Nama Kategori</th>
              <th width="10%" class="text-center">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
              foreach ($kategori_produk as $key => $value) {
            ?>
                <tr>
                  <td><?=$no?></td>
                  <td><?=$value['name_categories']?></td>
                  <td>
                    <a type="button" class="btn btn-primary btn-sm" href="<?php echo base_url().'kategori_produk/edit/'.$value['id_product_categories']; ?>/<?php echo $this->uri->segment(2)?>" title="Edit"><i class="fa fa-pencil"></i></a>
                    <a type="button" class="btn btn-danger confirm btn-sm" href="<?php echo base_url().'kategori_produk/delete/'.$value['id_product_categories']; ?>/<?php echo $this->uri->segment(2)?>" title="Delete"><i class="fa fa-times"></i></a>
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
