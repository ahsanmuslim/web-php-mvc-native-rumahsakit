<div class="box">
        <h1>Pasien</h1>
        <h4>
        <small>Tambah data pasien</small>
        <div class="pull-right">
            <a href="<?= BASEURL; ?>/pasien" class="btn btn-warning btn-block btn-xs"><i class="glyphicon glyphicon-chevron-left"></i> Kembali</a>
        </div>
        </h4>
        <div class="row" style="margin-top: 30px;">
            <div class="col-lg-6 col-lg-offset-3">
                <form action="<?= BASEURL; ?>/pasien/tambahData" method="post">
                    <?php
                    use Ramsey\Uuid\Uuid;
                    $uuid = Uuid::uuid4()->toString();
                    ?>
                    <div class="form-group">
                        <input type="hidden" name="id_pasien" value="<?= $uuid; ?>" class="form-control" id="id_pasien">
                    </div>
                    <div class="form-group">
                        <label for="noidentitas">No identitas</label>
                        <input type="text" name="noidentitas" id="noidentitas" class="form-control" required autofocus>
                    </div>
                    <div class="form-group">
                        <label for="namapasien">Nama pasien</label>
                        <input type="text" name="namapasien" id="namapasien" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="jk">Jenis kelamin</label>
                        <div>
                            <label class="radio-inline">
                                <input type="radio" name="jk" id="jk" value="Laki-laki" required>Laki-laki
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="jk" id="jk" value="Perempuan" required>Perempuan
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea name="alamat" id="alamat" class="form-control" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="notelp">No. Telp</label>
                        <input type="text" name="notelp" id="notelp" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="simpan" value="Simpan" class="btn btn-success pull-right">
                    </div>
                </form>
            </div>
        </div>
    </div>
        