<a href="#menu-toggle" class="btn btn-warning" id="menu-toggle">Toggle Menu</a><br>
    <div class="box">
        <h1>User</h1>
        <h4>
        <small>Data daftar user</small>
        <div class="pull-right">
            <a href="<?= BASEURL; ?>/user" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-refresh"></i></a>
            <a href="<?= BASEURL; ?>/user/tambah" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-plus"></i> Add-Data</a>
        </div>
        </h4>
        <div class="row">
            <div class="col-lg-8">
                <?= Flasher::flash(); ?>
            </div>
        </div>        
        <div style="margin-bottom: 20px;">
            <form class="form-inline" action="<?= BASEURL; ?>/user/cari" method="post">
                <div class="form-group">
                    <input type="text" name="keyword" class="form-control" placeholder="Cari"> 
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                </div>
            </form>     
        </div>
        <div class="row">
                <div class="col-lg-8">
                    <?php Flasher::flash(); ?>
                </div>      
        </div> 
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover" id="user">
                <thead class="thead-light">
                <style>
                    th.judul , td.judul {text-align: center;}
                </style>
                    <tr>
                        <th class="judul">No.</th>    
                        <th>Nama User</th>
                        <th>Username</th>
                        <th>Level</th>
                        <th class="judul">Status</th>
                        <th class="judul"><i class="glyphicon glyphicon-cog"></i></th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                if ( $this->models('user_model')->cekTable() > 0 ){
                $nomor = 1; foreach ($data['datauser'] as $user) : ?>
                <tr>
                    <td class="judul"><?= $nomor++; ?></td>
                    <td><?= $user['nama_user']; ?></td>
                    <td><?= $user['username']; ?></td>
                    <td><?= $user['role']; ?></td>
                    <td class="judul">
                    <?php if ( $user['status'] == 1 ){
                        echo 'Aktif';
                    } else {
                        echo 'Tidak Aktif';
                    }
                    ?></td>
                    <?php
                    if ( $user['id_role'] == 1 && $user['username'] == 'admin' ): ?>
                        <td class="judul"><a class="btn btn-primary btn-xs"><i class="fas fa-shield-alt"></i></a></td>
                    <?php else :?>
                    <td class="text-center">
                        <a href="<?= BASEURL; ?>/user/update/<?= $user['id_user']; ?>" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-edit"></i></a>
                        <a href="<?= BASEURL; ?>/user/hapus/<?= $user['id_user']; ?>" class="btn btn-danger btn-xs tombol-hapus"><i class="glyphicon glyphicon-trash"></i></a>
                    </td>
                    <?php endif; ?>
                </tr>
                <?php endforeach;
                } else { ?>
                    <tr>
                        <td colspan="6">Tidak ditemukan data di Database !!</td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>