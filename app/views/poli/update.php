<div class="box">
            <h1>Poliklinik</h1>
            <h4>
            <small>Edit data poliklinik</small>
            <div class="pull-right">
                <a href="<?= BASEURL; ?>/poli" class="btn btn-warning btn-block btn-xs"><i class="glyphicon glyphicon-chevron-left"></i> Kembali</a>
            </div>
            </h4>
            <div class="row" style="margin-top: 30px;">
                <div class="col-lg-6 col-lg-offset-3">
                    <form action="<?= BASEURL; ?>/poli/updateData" method="post">
                        <div class="form-group">
                        <input type="hidden" name="totaldata" value="<?=count($_POST['checked']);?>">
                            <table class="table">
                            <tr>
                                <th>#</th>
                                <th>Nama poliklinik</th>
                                <th>Gedung</th>
                            </tr>
                            <?php
                            $nomor = 1;
                            foreach ($data['poli'] as $poli) : ?>
                                <tr> 
                                    <td><?= $nomor++ ?></td>
                                    <td>
                                        <input type="hidden" name="id_poli[]" value="<?= $poli['id_poli'] ?>" class="form-control" required>
                                        <input type="text" name="nama_poli[]" value="<?= $poli['nama_poli'] ?>" class="form-control" required>
                                    </td>
                                    <td>
                                    <input type="text" name="gedung[]" value="<?= $poli['gedung'] ?>" class="form-control" required>
                                    </td>
                                </tr>
                            <?php
                            endforeach; 
                            ?>
                            </table>
                            <div class="form-group pull-right">
                                <input type="submit" name="editpoli" value="Update all" class="btn btn-info btn-sm" required>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>