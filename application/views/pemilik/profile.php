<?= $this->session->flashdata('message'); ?>
<div class="card">
    <div class="card-header">
        Profile
    </div>
    <div class="card-body">
        <form action="<?= base_url('pemilik/profile'); ?>" method="POST" enctype="multipart/form-data">
	    <input type="hidden" value="<?= $user['id_users']; ?>" name="id_users">
            <div class="form-group">
                <label for="fullname">Full Name</label>
                <input type="text" class="form-control" id="fullname" name="fullname" value="<?= $user['fullname']; ?>" required>
                <?= form_error('fullname', '<small class="text-danger pl-3"> ', '</small>'); ?>
            </div>

            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" name="username" id="username" value="<?= $user['username']; ?>" required>
                <?= form_error('username', '<small class="text-danger pl-3"> ', '</small>'); ?>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" name="email" id="email" value="<?= $user['email']; ?>">
            </div>

            <div class="form-group">
                <label for="address">Alamat</label>
                <input type="text" class="form-control" name="address" id="address" value="<?= $user['address']; ?>" required>
                <?= form_error('address', '<small class="text-danger pl-3"> ', '</small>'); ?>
            </div>

            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" class="form-control" name="phone" id="phone" value="<?= $user['phone']; ?>" required>
                <?= form_error('phone', '<small class="text-danger pl-3"> ', '</small>'); ?>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-sm-3">
                        <img class="img-thumbnail" src="<?= base_url('uploads/users/' . $user['file']) ?>" alt="">
                    </div>
                    <div class="col-sm-9">
                        <label for="file">Image</label>
                        <input type="file" name="file" id="file" class="form-control">
                    </div>
                </div>
            </div>

            <div class="form-group mt-4">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
</div>