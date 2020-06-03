<div class="box">
        <h1>Rekam Medis</h1>
        <h4>
        <small>Tambah rekam medis</small>
        <div class="pull-right">
            <a href="<?= BASEURL; ?>/medis" class="btn btn-warning btn-block btn-xs"><i class="glyphicon glyphicon-chevron-left"></i> Kembali</a>
        </div>
        </h4>
        <div class="row" style="margin-top: 30px;">
            <div class="col-lg-6 col-lg-offset-3">
                <form action="<?= BASEURL; ?>/medis/tambahData" method="post">
                    <div class="form-group">
                        <label for="tanggal">Tanggal periksa</label>
                        <input type="date" name="tanggal" id="tanggal" value="<?=date('Y-m-d')?>" class="form-control" required>
                        <input type="hidden" name="user" id="user" value="<?= $data['user']['id_user']?>" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="pasien">Nama pasien</label>
                        <select name="pasien" id="pasien" class="form-control" required>
                            <option value="">--Pilih--</option>
                            <?php foreach ( $data['pasien'] as $pasien ):
                                echo '<option value="'.$pasien['id_pasien'].'">'.$pasien['nama_pasien'].'</option>';
                            endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="poli">Poliklinik</label>
                        <select name="poli" id="poli" class="form-control" required>
                            <option value="">--Pilih--</option>
                            <?php foreach ( $data['poli'] as $poli ):
                                echo '<option value="'.$poli['id_poli'].'">'.$poli['nama_poli'].'</option>';
                            endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="dokter">Dokter</label>
                        <select name="dokter" id="dokter" class="form-control" required>
                            <option value="">--Pilih--</option>
                            <?php foreach ( $data['dokter'] as $dokter ):
                                echo '<option value="'.$dokter['id_dokter'].'">'.$dokter['nama_dokter'].'</option>';
                            endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="keluhan">Keluhan</label>
                        <textarea name="keluhan" id="keluhan" class="form-control" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="diagnosa">Diagnosa</label>
                        <textarea name="diagnosa" id="diagnosa" class="form-control" required></textarea>
                    </div>

                    <div class="form-group">
                        <label for="obat">Obat</label>
                        <select multiple name="obat[]" id="obat" class="form-control" size="7" required>
                            <?php foreach ( $data['obat'] as $obat ):
                                echo '<option value="'.$obat['id_obat'].'">'.$obat['nama_obat'].'</option>';
                            endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group pull-right">
                        <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>

<script>
    CKEDITOR.replace( 'diagnosa' );
    CKEDITOR.replace( 'keluhan' );
</script>