<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3><i class="fa fa-file-text"></i> Users</h3>
    </div>
  </div>

  <div class="clearfix"></div>
  <hr>
  <div class="x_panel">
    <div class="x_title">
      <h4>Users</h4>
      <div class="clearfix"><a type="button" class="btn btn-primary btn-sm" href="<?php echo base_url() . 'users/add/' ?>" title="Edit"><i class="fa fa-plus"></i> Tambah Users</a></div>
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
      <div class="table-responsive">
        <table class="table" id="datatable">
          <thead>
            <tr>
              <th width="5%">No</th>
              <th width="15%">Profile</th>
              <th width="10%">Username</th>
              <th width="35%">Detail</th>
              <th width="10%">Tipe</th>
              <th width="10%">Status</th>
              <th width="10%" class="text-center">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
            foreach ($users as $key => $value) {
            ?>
              <tr>
                <td><?= $no ?></td>
                <td>
                  <?php if ($value['file'] != NULL) { ?>
                    <object data="<?php echo base_url(); ?>uploads/users/<?= $value['file'] ?>" type="image/png" style="width : 100px;">
                      <img src="<?php echo base_url(); ?>assets/images/image_404.jpeg" alt="default" style="width : 100px;">
                    </object>
                  <?php } else { ?>
                    <img src="<?php echo base_url(); ?>assets/images/image_404.jpeg" alt="default" style="width : 100px;">
                  <?php } ?>
                </td>
                <td><?= $value['username'] ?></td>
                <td>
                  <b>Nama</b> : <?= $value['fullname'] ?> <br>
                  <b>Email</b> : <?= $value['email'] ?> <br>
                  <b>No Telp</b> : <?= $value['phone'] ?> <br>
                  <b>Alamat</b> : <?= $value['address'] ?> <br>
                  <b>Tgl. Lahir</b> : <?= $value['birthday'] ?> <br>
                </td>
                <td>
                  <?php if ($value['user_type'] == '0') { ?>
                    <label class="label label-danger">Admin</label>
                  <?php } elseif ($value['user_type'] == '1') { ?>
                    <label class="label label-primary">Users</label>
                  <?php } elseif ($value['user_type'] == '2') { ?>
                    <label class="label label-warning">Pemilik</label>
                  <?php } ?>
                </td>
                <td>
                  <?php if ($value['active'] == '1') { ?>
                    <label class="label label-primary">Active</label>
                  <?php } else { ?>
                    <label class="label label-warning">Not ACtive</label>
                  <?php } ?>
                </td>
                <td>
                  <a type="button" class="btn btn-primary btn-sm" href="<?php echo base_url() . 'users/edit/' . $value['id_users']; ?>/<?php echo $this->uri->segment(2) ?>" title="Edit"><i class="fa fa-pencil"></i></a>
                  <a type="button" class="btn btn-danger confirm btn-sm" href="<?php echo base_url() . 'users/delete/' . $value['id_users']; ?>/<?php echo $this->uri->segment(2) ?>" title="Delete"><i class="fa fa-times"></i></a>
                </td>
              </tr>
            <?php
              $no++;
            }
            ?>
          </tbody>
        </table>
      </div>
      <?php echo ($links); ?>
    </div>

  </div>
</div>