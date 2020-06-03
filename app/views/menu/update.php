<div class="box">
        <h1>Menu</h1>
        <h4>
        <small>Update menu</small>
        <div class="pull-right">
            <a href="<?= BASEURL; ?>/menu" class="btn btn-warning btn-block btn-xs"><i class="glyphicon glyphicon-chevron-left"></i> Kembali</a>
        </div>
        </h4>
        <!-- <?= var_dump($data['mn']); ?> -->
        <div class="row" style="margin-top: 30px;">
            <div class="col-lg-6 col-lg-offset-3">
                <form action="<?= BASEURL; ?>/menu/updateData" method="post">
                    <div class="form-group">
                        <label for="title">Menu title</label>
                        <input type="hidden" name="id_menu" id="id_menu" class="form-control" value="<?= $data['mn']['id_menu']; ?>" required>
                        <input type="text" name="title" id="title" class="form-control" value="<?= $data['mn']['title']; ?>" required autofocus>
                    </div>
                    <div class="form-group">
                        <label for="url">URL</label>
                        <input type="text" name="url" id="url" class="form-control" value="<?= $data['mn']['url']; ?>" readonly required>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <div>
                            <label class="radio-inline">
                                <input type="radio" name="status" id="status" value=1 <?php if($data['mn']['is_active'] == 1 ) { echo 'checked';} ?> required>Active
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="status" id="status" value=0 <?php if($data['mn']['is_active'] == 0 ) { echo 'checked';} ?> required>Non Active
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="update" value="Update" class="btn btn-primary pull-right">
                    </div>
                </form>
            </div>
        </div>
    </div>
        