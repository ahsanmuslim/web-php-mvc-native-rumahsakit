<div class="box">
        <h1>User</h1>
        <h4>
        <small>Tambah data user</small>
        <div class="pull-right">
            <a href="<?= BASEURL; ?>/user" class="btn btn-warning btn-block btn-xs"><i class="glyphicon glyphicon-chevron-left"></i> Kembali</a>
        </div>
        </h4>
        <div class="row" style="margin-top: 30px;">
            <div class="col-lg-6 col-lg-offset-3">
                <form action="<?= BASEURL; ?>/user/tambahData" method="post">
                    <?php
                    use Ramsey\Uuid\Uuid;
                    $uuid = Uuid::uuid4()->toString();
                    ?>
                    <div class="form-group">
                        <input type="hidden" name="id_user" value="<?= $uuid; ?>" class="form-control" id="id_user">
                    </div>
                    <div class="form-group">
                        <label for="namauser">Nama User</label>
                        <input type="text" name="namauser" id="namauser" class="form-control" required autofocus>
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="level">Level User</label>
                        <div>
                        <?php foreach ( $data['datarole'] as $role ): ?>
                            <label class="radio-inline">
                                <input type="radio" name="role" id="role" value="<?= $role['id_role']; ?>" required><?= $role['role']; ?>
                            </label>
                        <?php endforeach; ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-control" required>
                            <option value=1>Aktif</option>
                            <option value=0>Tidak Aktif</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="simpan" value="Simpan" class="btn btn-success pull-right">
                    </div>
                </form>
            </div>
        </div>
    </div>
        