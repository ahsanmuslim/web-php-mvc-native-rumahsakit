<div class="box">
        <h1>Pasien</h1>
        <h4>
        <small>Update data pasien</small>
        <div class="pull-right">
            <a href="<?= BASEURL; ?>/pasien" class="btn btn-warning btn-block btn-xs"><i class="glyphicon glyphicon-chevron-left"></i> Kembali</a>
        </div>
        </h4>
        <div class="row" style="margin-top: 30px;">
            <div class="col-lg-6 col-lg-offset-3">
                <form action="<?= BASEURL; ?>/pasien/updateData" method="post">
                    <div class="form-group">
                        <input type="hidden" name="id_pasien" value="<?= $data['pasien']['id_pasien']; ?>" class="form-control" id="id_pasien">
                    </div>
                    <div class="form-group">
                        <label for="noidentitas">No identitas</label>
                        <input type="text" name="noidentitas" id="noidentitas" value="<?= $data['pasien']['nomor_identitas']; ?>" class="form-control" required autofocus>
                    </div>
                    <div class="form-group">
                        <label for="namapasien">Nama pasien</label>
                        <input type="text" name="namapasien" id="namapasien" value="<?= $data['pasien']['nama_pasien']; ?>" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="jk">Jenis kelamin</label>
                        <div>
                            <label class="radio-inline">
                                <input type="radio" name="jk" id="jk" value="Laki-laki" <?php if($data['pasien']['jenis_kelamin'] == 'Laki-laki') { echo 'checked';} ?> required>Laki-laki
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="jk" id="jk" value="Perempuan" <?php if($data['pasien']['jenis_kelamin'] == 'Perempuan') { echo 'checked';} ?> required>Perempuan
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea name="alamat" id="alamat" class="form-control" required><?= $data['pasien']['alamat']; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="notelp">No. Telp</label>
                        <input type="text" name="notelp" id="notelp" value="<?= $data['pasien']['no_telp']; ?>" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="update" value="Update" class="btn btn-success pull-right">
                    </div>
                </form>
            </div>
        </div>
    </div>
        