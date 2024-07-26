<div class="container">
    <div class="row">
        <div class="col-lg-9">
            <form action="<?= base_url('menu/subeditdata') ?>" method="POST">

                <div class="form-group">
                    <input type="hidden" value="<?= $edit['sub_id']; ?>" name="sub_id">
                    <label for="formGroupExampleInput">Add for menu</label>
                    <select name="menu_id" id="menu_id" class="form-control">
                        <option value="<?= $edit['menu_id']; ?>">SELECT</option>
                        <?php foreach ($menu as $m) : ?>
                            <option value="<?= $m['id'] ?>"><?= $m['menu']; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <?= form_error('menu_id', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput">Tittle</label>
                    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Add new menu" name="tittle" id="tittle" value=" <?= $edit['tittle']; ?>">
                    <?= form_error('tittle', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput">url</label>
                    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Add new menu" name="url" id="url" value=" <?= $edit['url']; ?>">
                    <?= form_error('url', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput">ICONS</label>
                    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Add new menu" name="icon" id="icon" value=" <?= $edit['icon']; ?>" ?>
                    <?= form_error('icon', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-check">
                    <input class="form-check-input me-4" type="checkbox" value="1" name="is_active" id="flexCheckDefault">
                    <label for="formGroupExampleInput">is_active</label>


                </div>
                <button type="submit" class="btn btn-success">EDIT</button>
            </form>
        </div>
    </div>

</div>