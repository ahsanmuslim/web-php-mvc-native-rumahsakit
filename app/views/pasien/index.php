<a href="#menu-toggle" class="btn btn-warning" id="menu-toggle">Toggle Menu</a><br>
    <div class="box">
        <h1>Pasien</h1>
        <h4>
        <small>Data daftar pasien</small>
        <div class="pull-right">
            <a href="<?= BASEURL; ?>/pasien" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-refresh"></i></a>
            <?php
            $id_role = $data['user']['role'];
            $title = $data['title'];
            $data['menu'] = $this->models('menu_model')->getMenubyTitle($title);
            $id_menu = $data['menu']['id_menu'];
            
            if ( $this->models('role_model')->countCreate($id_role,$id_menu) > 0 ){ ?>
                <a href="<?= BASEURL; ?>/pasien/tambah" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-plus">Add-data</i></a>
            <?php }
            if ( $this->models('role_model')->countImport($id_role,$id_menu) > 0 ){ ?>
                <a href="<?= BASEURL; ?>/pasien/import" class="btn btn-info btn-xs"><i class="glyphicon glyphicon-plus">Import-pasien</i></a>
            <?php } ?>
        </div>
        </h4>
        <!-- <div style="margin-bottom: 20px;">
            <form class="form-inline" action="<?= BASEURL; ?>/pasien/cari" method="post">
                <div class="form-group">
                    <input type="text" name="keyword" class="form-control" placeholder="Cari"> 
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                </div>
            </form>     
        </div> -->
        <div class="row">
            <div class="col-lg-8">
                <?php Flasher::flash(); ?>
            </div>      
        </div> 
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover" id="tblpasien">
                <thead>
                <style>
                    th.judul , td.judul {text-align: center;}
                </style>
                    <tr>
                        <th class="judul">No.</th> 
                        <th>No. Identitas</th>    
                        <th>Nama pasien</th>
                        <th>Jenis kelamin</th>
                        <th>Alamat</th>
                        <th>No. Telp</th>
                        <th class="judul"><i class="glyphicon glyphicon-cog"></i></th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                if ( $this->models('pasien_model')->cekTable() > 0 ){
                $nomor = 1; foreach ($data['pasien'] as $pasien) : ?>
                <tr>
                    <td class="judul"><?= $nomor++; ?></td>
                    <td><?= $pasien['nomor_identitas']; ?></td>
                    <td><?= $pasien['nama_pasien']; ?></td>                    
                    <td><?= $pasien['jenis_kelamin']; ?></td>
                    <td><?= $pasien['alamat']; ?></td>
                    <td><?= $pasien['no_telp']; ?></td>
                    <td class="text-center">
                    <?php if ( $this->models('role_model')->countUpdate($id_role,$id_menu) > 0 ){ ?>
                        <a href="<?= BASEURL; ?>/pasien/update/<?= $pasien['id_pasien']; ?>" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-edit"></i></a>
                    <?php } if ( $this->models('role_model')->countDelete($id_role,$id_menu) > 0 ){ ?>
                        <a href="<?= BASEURL; ?>/pasien/hapus/<?= $pasien['id_pasien']; ?>" class="btn btn-danger btn-xs tombol-hapus"><i class="glyphicon glyphicon-trash"></i></a>
                    <?php } if ( $this->models('role_model')->countUpdate($id_role,$id_menu) == 0 && $this->models('role_model')->countDelete($id_role,$id_menu) == 0 ) {
                        echo '<a class="btn btn-danger btn-xs"><i class="fas fa-ban"></i>';
                    } ?>
                    </td>
                </tr>
                <?php endforeach; 
                } else { ?>
                    <tr>
                        <td colspan="7">Tidak ditemukan data di Database !!</td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>        
    </div>

