<div class="box">
        <h1>Poliklinik</h1>
        <h4>
        <small>Tambah data poliklinik</small>
        <div class="pull-right">
            <a href="<?= BASEURL; ?>/poli" class="btn btn-warning btn-block btn-xs"><i class="glyphicon glyphicon-chevron-left"></i> Kembali</a>
        </div>
        </h4>
        <div class="row" style="margin-top: 30px;">
            <div class="col-lg-6 col-lg-offset-3">
                <form action="<?= BASEURL; ?>/poli/tambah" method="post">
                    <div class="form-group">
                        <label for="poliklinik">Banyak data poli yang akan di tambah</label>
                        <input type="number" name="count_add" id="count_add" class="form-control" required autofocus>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="generate" value="Generate" class="btn btn-success btn-sm pull-right">
                    </div>
                </form>
            </div>
        </div>
    </div>
