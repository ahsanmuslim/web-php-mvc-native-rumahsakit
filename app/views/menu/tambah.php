<div class="box">
        <h1>Menu</h1>
        <h4>
        <small>Tambah menu</small>
        <div class="pull-right">
            <a href="<?= BASEURL; ?>/menu" class="btn btn-warning btn-block btn-xs"><i class="glyphicon glyphicon-chevron-left"></i> Kembali</a>
        </div>
        </h4>
        <div class="row" style="margin-top: 30px;">
            <div class="col-lg-6 col-lg-offset-3">
                <form action="<?= BASEURL; ?>/menu/tambahData" method="post">
                    <div class="form-group">
                        <label for="title">Menu title</label>
                        <input type="text" name="title" id="title" class="form-control" required autofocus>
                    </div>
                    <div class="form-group">
                        <label for="url">URL</label>
                        <input type="text" name="url" id="url" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <div>
                            <label class="radio-inline">
                                <input type="radio" name="status" id="status" value=1 required>Active
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="status" id="status" value=0 required>Non Active
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="simpan" value="Simpan" class="btn btn-success pull-right">
                    </div>
                </form>
            </div>
        </div>
    </div>
        