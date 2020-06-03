<a href="#menu-toggle" class="btn btn-warning" id="menu-toggle">Toggle Menu</a><br>
<div class="box">
        <h1>User</h1>
        <h4>
        <small>Update password user</small>
        <div class="pull-right">
            <a href="<?= BASEURL; ?>/dashboard" class="btn btn-warning btn-block btn-xs"><i class="glyphicon glyphicon-chevron-left"></i> Kembali</a>
        </div>
        </h4>
        <div class="row" style="margin-top: 30px;">
            <div class="col-lg-6 col-lg-offset-3">
                <form action="<?= BASEURL; ?>/password/updatePassword" method="post">
                    <div class="form-group">
                        <input type="hidden" name="id_user" value="<?= $data['datauser']['id_user']; ?>" class="form-control" id="id_user">
                    </div>
                    <div class="form-group">
                        <label for="namauser">Nama User</label>
                        <input type="text" name="namauser" id="namauser" value="<?= $data['datauser']['nama_user']; ?>"  class="form-control" readonly required>
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" value="<?= $data['datauser']['username']; ?>"  class="form-control" readonly required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password baru</label>
                        <input type="password" name="password" id="password" value="" class="form-control" placeholder="Gunakan kombinasi huruf, angka & simbol !" required>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="simpan" value="Update" class="btn btn-primary pull-right">
                    </div>
                </form>
            </div>
        </div>
    </div>
        