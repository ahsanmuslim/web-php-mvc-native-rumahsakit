<div class="box">
        <h1>Poliklinik</h1>
        <h4>
        <small>Tambah data poliklinik</small>
        <div class="pull-right">
            <a href="<?= BASEURL; ?>/poli" class="btn btn-info btn-xs">Data Poliklinik</a>
            <a href="<?= BASEURL; ?>/poli/generate" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i> Tambah data lagi</a>
        </div>
        </h4>
        <div class="row" style="margin-top: 30px;">
            <div class="col-lg-6 col-lg-offset-3">
                <form action="<?= BASEURL; ?>/poli/tambahData" method="post">
                    <div class="form-group">
                        <input type="hidden" name="totaldata" value="<?=@$_POST['count_add']?>">
                        <table class="table">
                            <tr>
                                <th>#</th>
                                <th>Nama poliklinik</th>
                                <th>Gedung</th>
                            </tr>
                            <?php
                            for ($i=1 ; $i<=@$_POST['count_add']; $i++){ ?>
                                <tr>
                                    <td><?=$i?></td>
                                    <td>
                                        <input type="text" name="namapoli-<?=$i?>" class="form-control" required>
                                    </td>
                                    <td>
                                    <input type="text" name="gedung-<?=$i?>" class="form-control" required>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </table>
                        <div class="form-group pull-right">
                            <input type="submit" name="addpoli" value="Simpan Data" class="btn btn-success btn-sm" required>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>