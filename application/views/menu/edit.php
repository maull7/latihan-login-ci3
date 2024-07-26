<div class="container">
    <div class="row">
        <div class="col-lg-9">
            <form action="<?= base_url('menu/editData') ?>" method="POST">
                <input type="hidden" value="<?= $edit['id']; ?>" name="id">
                <input type="text" value="<?= $edit['menu']; ?>" name="menu">
                <button type="submit" class="btn btn-success">EDIT</button>
            </form>
        </div>
    </div>

</div>