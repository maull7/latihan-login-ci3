<div class="container-fluid">

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        ADD NEW MENU
    </button>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addActiveMenu">
        ACTIVE MENU
    </button>
    <?= $this->session->flashdata('messege'); ?>


    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $tittle; ?></h1>

    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">NO</th>
                <th scope="col">MENU</th>
                <th scope="col">ACTION</th>

            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($menu as $m) : ?>
                <tr>
                    <th scope="row">
                        <?= $i; ?>
                    </th>
                    <td><?= $m['menu']; ?></td>
                    <td>
                        <a href="<?= base_url('menu/edit/') ?><?= $m['id']; ?>"><i class="text-success p-2 m-2 bi bi-pencil-square"></i></a>
                        <a href="<?= base_url('menu/hapus/') ?><?= $m['id']; ?>"><i class="text-danger p-2 m-2 bi bi-trash3-fill"></i></a>
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
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('menu/insert'); ?>" method="post">
                        <div class="form-group">
                            <label for="formGroupExampleInput">MENU NAME</label>
                            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Add new menu" name="menu" id="menu">
                            <?= form_error('menu', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addActiveMenu" tabindex="-1" role="dialog" aria-labelledby="addActiveMenu" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addActiveMenu">active menu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('menu/active'); ?>" method="POST">
                        <div class="form-group">

                            <label for="formGroupExampleInput">ROLE</label>
                            <div class="form-check">
                                <input class="form-check-input" name="role_id" id="role_id1" type="checkbox" value="1" id="flexCheckDefault">

                                <label class="form-check-label" for="flexCheckDefault">
                                    Admin
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="2" id="flexCheckDefault" name="role_id" id="role_id2">

                                <label class="form-check-label" for="flexCheckDefault">
                                    User
                                </label>
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput">MENU</label>
                                <select name="menu_id" id="menu_id">
                                    <option name="menu_id" id="menu_id">SELECT</option>
                                    <?php foreach ($menu as $m) : ?>
                                        <option value="<?= $m['id'] ?>"><?= $m['id']; ?></option>
                                    <?php endforeach; ?>
                                </select>

                            </div>




                        </div>

                </div>
                <div class=" modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                </form>
            </div>
        </div>
    </div>



</div>

</div>