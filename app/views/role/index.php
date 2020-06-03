<a href="#menu-toggle" class="btn btn-warning" id="menu-toggle">Toggle Menu</a><br>
<div class="box">
            <h1>Role Access</h1>
            <h4>
            <small>Access management</small>
            </h4>
            <style>
                .ml-2,
                .mx-2 {
                margin-left: 0.5rem !important;
                }
            </style>
            <div class="row">
                <div class="col-lg-6">
                    <a href="" class="btn btn-success btn-sm pull-right tombolTambahRole" data-toggle="modal" data-target="#modalRole">Tambah role</a>
            
                </div>
            </div>
            <div class="row" style="margin-top: 15px;">
                <div class="col-lg-6">
                    <?php Flasher::flash(); ?>
                </div>      
            </div>
            <div class="row" style="margin-top: 10px;">
                <div class="col-lg-6">
                    <ul class="list-group">
                        <?php foreach ( $data['role'] as $role ): ?>
                        <?php if ( $role['id_role'] == 1 ){ ?>
                            <li class="list-group-item">
                                <a href="<?= BASEURL;?>/role/akses/<?= $role['id_role']; ?>"><span class="label label-primary pull-right ml-2">Akses</span></a>
                                <?= $role['role']; ?>
                            </li>
                        <?php } else { ?>
                            <li class="list-group-item">
                                <a href="<?= BASEURL;?>/role/akses/<?= $role['id_role']; ?>"><span class="label label-primary pull-right ml-2">Akses</span></a>
                                <a href="<?= BASEURL;?>/role/hapus/<?= $role['id_role']; ?>" class="tombol-hapus"><span class="label label-danger pull-right ml-2"> Hapus</span></a>
                                <a href="" class="modalEditRole" data-toggle="modal" data-target="#modalRole" data-id_role="<?= $role['id_role']; ?>"><span class="label label-warning pull-right ml-2">Ubah</span></a>
                                <?= $role['role']; ?>
                            </li>
                        <?php }
                        endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>



<!-- Modal -->
<div class="modal fade" id="modalRole" tabindex="-1" role="dialog" aria-labelledby="judulModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="judulModal">Tambah Role</h3>
            </div>
            <div class="modal-body">
                <form action="<?= BASEURL;?>/role/tambah" method="post">
                <div class="form-group">
                    <input type="hidden" name="id_role" value="" class="form-control" id="id_role">
                </div>
                <div class="form-group">
                    <label for="role">Nama role</label>
                    <input type="text" name="role" class="form-control" id="role" required autofocus>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Tambah Data</button>
                </form>
            </div>
        </div>
    </div>
</div>
