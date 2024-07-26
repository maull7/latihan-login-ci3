<div class="container-fluid">

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        ADD NEW MENU
    </button>
    <!-- Button trigger modal -->
    <?= $this->session->flashdata('messege'); ?>


    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $tittle; ?></h1>

    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">NO</th>
                <th scope="col">ROLE</th>
                <th scope="col">ACTION</th>

            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($role as $r) : ?>
                <tr>
                    <th scope="row">
                        <?= $i; ?>
                    </th>
                    <td><?= $r['role']; ?></td>
                    <td>
                        <a href="<?= base_url('admin/roleaccess/') . $r['id']; ?>"><i class="text-warning bi bi-subtract p-2 m-2"></i></i></a>
                        <a href="<?= base_url('menu/hapus/') ?><?= $r['id']; ?>"><i class="text-danger p-2 m-2 bi bi-trash3-fill"></i></a>
                        <a href="<?= base_url('menu/edit/') ?><?= $r['id']; ?>"><i class="text-success p-2 m-2 bi bi-pencil-square"></i></a>

                    </td>
                    <?php $i++ ?>
                <?php endforeach; ?>


                </tr>
        </tbody>
    </table>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Role</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('admin/insert_role'); ?>" method="post">
                        <div class="form-group">
                            <label for="formGroupExampleInput">INSERT ROLE</label>
                            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Add new role" name="role" id="role">
                            <?= form_error('role', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save role</button>
                </div>
                </form>
            </div>
        </div>
    </div>





</div>

</div>