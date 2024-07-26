<div class="container-fluid">




    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $tittle; ?></h1>

    <?= $this->session->flashdata('messege'); ?>

    <h4><?= $role['role']; ?></h4>

    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">NO</th>
                <th scope="col">MENU</th>
                <th scope="col">ACCESS</th>

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
                        <div class="form-group">
                            <input class="form-check-input" type="checkbox" <?= check_access($role['id'], $m['id']); ?> id="flexCheckDefault" data-role="<?= $role['id']; ?>" data-menu="<?= $m['id']; ?>">

                        </div>
                    </td>

                    <?php $i++ ?>
                <?php endforeach; ?>


                </tr>
        </tbody>
    </table>


    <!-- Modal -->





</div>

</div>