<div class="box">
        <h1>User</h1>
        <h4>
        <small>Update data user</small>
        <div class="pull-right">
            <a href="<?= BASEURL; ?>/user" class="btn btn-warning btn-block btn-xs"><i class="glyphicon glyphicon-chevron-left"></i> Kembali</a>
        </div>
        </h4>
        <!-- <?= var_dump($data['datauser']); ?> -->
        <div class="row" style="margin-top: 30px;">
            <div class="col-lg-6 col-lg-offset-3">
                <form action="<?= BASEURL; ?>/user/updateData" method="post">
                    <div class="form-group">
                        <input type="hidden" name="id_user" value="<?= $data['datauser']['id_user']; ?>" class="form-control" id="id_user">
                    </div>
                    <div class="form-group">
                        <label for="namauser">Nama User</label>
                        <input type="text" name="namauser" id="namauser" value="<?= $data['datauser']['nama_user']; ?>"  class="form-control" required autofocus>
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" value="<?= $data['datauser']['username']; ?>"  class="form-control" readonly required>
                    </div>
                    <div class="form-group">
                        <label for="level">Level User</label>
                        <div>
                        <?php foreach ( $data['datarole'] as $role ): ?>
                            <label class="radio-inline">
                                <input type="radio" name="role" id="role" value="<?= $role['id_role']; ?>" <?php if( $data['datauser']['role'] == $role['id_role'] ) { echo 'checked';} ?> required><?= $role['role']; ?>
                            </label>
                        <?php endforeach; ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-control" required>
                            <option value=1 <?php if( $data['datauser']['status'] == 1 ) { echo 'selected';} ?>>Aktif</option>
                            <option value=0 <?php if( $data['datauser']['status'] == 0 ) { echo 'selected';} ?> >Tidak Aktif</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="simpan" value="Update" class="btn btn-warning pull-right">
                    </div>
                </form>
            </div>
        </div>
    </div>
        