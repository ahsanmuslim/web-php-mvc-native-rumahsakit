<div class="box">
        <h1>Pasien</h1>
        <h4>
        <small>Import data pasien</small>
        <div class="pull-right">
            <a href="<?= BASEURL; ?>/file/sample/pasien.xlsx" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-download-alt"></i> Sample File</a>
            <a href="<?= BASEURL; ?>/pasien" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-chevron-left"></i> Kembali</a>
        </div>
        </h4>
        <div class="row" style="margin-top: 30px;">
            <div class="col-lg-6 col-lg-offset-3">
                <form action="<?= BASEURL; ?>/pasien/importData" method="post" enctype="multipart/form-data"> 
                    <div class="form-group">
                        <label for="file">File import</label>
                        <input type="file" name="file_import" id="file_import" class="form-control" required autofocus>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="import" value="Import" class="btn btn-info btn-sm pull-right">
                    </div>
                </form>
            </div>
        </div>
    </div>