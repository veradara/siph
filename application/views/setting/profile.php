<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3><i class="fa fa-user"></i> Profile</h3>
        </div>
    </div>
 <script type="text/javascript" src="<?php echo base_url();?>assets/ckeditor/ckeditor.js" charset="utf-8"></script>

<div class="clearfix"></div>

    <?= $this->session->flashdata('message'); ?>

    <hr>
    <div class="x_panel">
        <div class="x_title">
        <h4>Profile</h4>
        </div>
        <div class="x_content">
            <form role="form" action="<?php echo base_url() ?>setting/profile" method="post" enctype="multipart/form-data">
		<input type="hidden" value="<?= $user['id_users']; ?>" name="id_users">
                <div class="form-group">
                    <label for="fullname">Full Name</label>
                    <input type="text" class="form-control" name="fullname" id="fullname" value="<?= $user['fullname']; ?>">
                    <?= form_error('fullname', '<small class="text-danger pl-3"> ', '</small>'); ?>
                </div>    
                <div class="form-group">
                    <label for="username">Usrname</label>
                    <input type="text" class="form-control" name="username" id="username" value="<?= $user['username']; ?>">
                    <?= form_error('username', '<small class="text-danger pl-3"> ', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" name="email" id="email" value="<?= $user['email']; ?>">
                    <?= form_error('email', '<small class="text-danger pl-3"> ', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="address">Alamat</label>
                    <input type="text" class="form-control" name="address" id="address" value="<?= $user['address']; ?>">
                    <?= form_error('address', '<small class="text-danger pl-3"> ', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" class="form-control" name="phone" id="phone" value="<?= $user['phone']; ?>">
                    <?= form_error('phone', '<small class="text-danger pl-3"> ', '</small>'); ?>
                </div>
                
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-3">
                            <img class="img-thumbnail" src="<?= base_url('uploads/users/' . $user['file']); ?>" alt="">
                        </div>
                        <div class="col-sm-9">
                            <label for="file">file</label>
                            <input type="file" class="form-control" name="file" id="file" value="<?= $user['file']; ?>">
                        </div>
                    </div>
                    <?= form_error('phone', '<small class="text-danger pl-3"> ', '</small>'); ?>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-default"><i class="fa fa-paper-plane"></i> Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>




