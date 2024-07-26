<div class="container-fluid">

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addSubMenu">
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
                <th scope="col">TITTE</th>
                <th scope="col">MENU</th>
                <th scope="col">URL</th>
                <th scope="col">ICON</th>
                <th scope="col">ACTIVE</th>

                <th scope="col">ACTION</th>

            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>

            <?php foreach ($submenu as $sm) : ?>
                <tr>
                    <th scope="row">
                        <?= $i; ?>
                    </th>
                    <td><?= $sm['tittle']; ?></td>
                    <td><?= $sm['menu']; ?></td>
                    <td><?= $sm['url']; ?></td>
                    <td><?= $sm['icon']; ?></td>
                    <td><?= $sm['is_active']; ?></td>
                    <td>
                        <a href="<?= base_url('menu/subedit/') . $sm['sub_id']; ?>"><i class="text-success p-2 m-2 bi bi-pencil-square"></i></a>
                        <a href="<?= base_url('menu/hapussubmenu/') . $sm['sub_id']; ?>"><i class="text-danger p-2 m-2 bi bi-trash3-fill"></i></a>
                    </td>
                    <?php $i++ ?>
                <?php endforeach; ?>




                </tr>
        </tbody>
    </table>


    <!-- Modal -->
    <div class="modal fade" id="addSubMenu" tabindex="-1" role="dialog" aria-labelledby="addSubMenu" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addSubMenu">add submenu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('menu/addSubMenu'); ?>" method="post">
                        <div class="form-group">
                            <label for="formGroupExampleInput">Add for menu</label>
                            <select name="menu_id" id="menu_id" class="form-control">
                                <option value="">SELECT</option>
                                <?php foreach ($menu as $m) : ?>
                                    <option value="<?= $m['id'] ?>"><?= $m['menu']; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <?= form_error('menu_id', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Tittle</label>
                            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Add new menu" name="tittle" id="tittle">
                            <?= form_error('tittle', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">url</label>
                            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Add new menu" name="url" id="url">
                            <?= form_error('url', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">ICONS</label>
                            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Add new menu" name="icon" id="icon">
                            <?= form_error('icon', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <input class="form-check-input" type="checkbox" value="1" name="is_active" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault" checked>
                                is_active
                            </label>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>




    </div>

</div>