<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3><i class="fa fa-file-text"></i>Tambah users</h3>
    </div>
  </div>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/ckeditor/ckeditor.js" charset="utf-8"></script>

  <div class="clearfix"></div>
  <hr>
  <div class="x_panel">
    <div class="x_title">
      <h4>Users</h4>
      <div class="clearfix"><a type="button" class="btn btn-primary btn-sm" href="<?php echo base_url() . 'users/' ?>" title="kembali"><i class="fa fa-arrow-left"></i> Kembali</a></div>
    </div>
    <div class="x_content">
      <?php
      $this->load->helper('form');
      $error = $this->session->flashdata('error');
      if ($error) {
      ?>
        <div class="alert alert-danger alert-dismissable">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <?php echo $error; ?>
        </div>
      <?php }
      $success = $this->session->flashdata('success');
      if ($success) {
      ?>
        <div class="alert alert-success alert-dismissable">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <?php echo $success; ?>
        </div>
      <?php } ?>
      <form role="form" action="<?php echo base_url() ?>users/add_process" method="post" enctype="multipart/form-data">
        <div class="form-group">
          <label for="username">Username</label>
          <input type="text" class="form-control" name="username" id="username">
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" class="form-control" name="email" id="email">
        </div>
        <div class="form-group">
          <label for="type">Tipe</label>
          <select name="user_type" id="type" class="form-control">
            <option value="0">Admin</option>
            <option value="1">Users</option>
          </select>
        </div>
        <div class="form-group">
          <label for="active">Status</label>
          <select name="active" id="active" class="form-control">
            <option value="1">Active</option>
            <option value="0">Not Active</option>
          </select>
        </div>
        <div class="form-group">
          <label for="fullname">Nama</label>
          <input type="text" class="form-control" name="fullname" id="fullname">
        </div>
        <div class="form-group">
          <label for="address">Alamat</label>
          <input type="text" class="form-control" name="address" id="address">
        </div>
        <div class="form-group">
          <label for="phone">No Telp</label>
          <input type="text" class="form-control" name="phone" id="phone">
        </div>
        <div class="form-group">
          <label for="birthday">Tgl. Lahir</label>
          <input type="date" class="form-control" name="birthday" id="birthday">
        </div>
        <div class="form-group" id="file">
          <label for="file">Photo</label>
          <input type="file" class="form-control ckeditor" name="file" id="file">
        </div>
        <hr>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" class="form-control" name="password" id="password">
        </div>
        <div class="form-group">
          <label for="confirm_password">Repeat Password</label>
          <input type="password" class="form-control" name="confirm_password" id="confirm_password">
          <span id='message'></span>
        </div>
        <button type="submit" class="btn btn-default" id="submit"><i class="fa fa-paper-plane"></i> Simpan</button>
      </form>
    </div>

  </div>
</div>
<script type="text/javascript">
  $('#password, #confirm_password').on('keyup', function() {
    if ($('#password').val() == $('#confirm_password').val()) {
      $('#message').html('Matching').css('color', 'green');
      document.getElementById("submit").disabled = false;
    } else {
      $('#message').html('Not Matching').css('color', 'red');
      document.getElementById("submit").disabled = true;
    }
  });
</script>