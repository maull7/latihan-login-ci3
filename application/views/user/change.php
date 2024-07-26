<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $tittle; ?></h1>

    <div class="row">
        <div class="col-lg-10">
            <?= $this->session->flashdata('messege'); ?>
        </div>
    </div>

    <form action="<?= base_url('user/change') ?>" method="POST">
        <div class="form-group row">
            <label for="email" class="col-form-label col-sm-1">Current Password</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" id="curentPassword" name="currentPassword" placeholder="input your password">
                <?= form_error('currentPassword', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
        </div>
        <div class="form-group row">
            <label for="email" class="col-form-label col-sm-1">New Password</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" id="newPassword" name="newPassword1" placeholder="input your new password">
                <?= form_error('newPassword1', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
        </div>
        <div class="form-group row">
            <label for="email" class="col-form-label col-sm-1">new Password</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" id="newPassword" name="newPassword2" placeholder="repeat your new password">
                <?= form_error('newPassword2', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
        </div>
        <div class="form-group">
            <button class="btn btn-primary" type="submit">SAVE</button>
        </div>


    </form>



</div>

</div>
<!-- /.container-fluid -->