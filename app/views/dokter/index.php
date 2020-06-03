<a href="#menu-toggle" class="btn btn-warning" id="menu-toggle">Toggle Menu</a><br>
    <div class="box">
        <h1>Dokter</h1>
        <h4>
        <small>Data daftar dokter</small>
        <div class="pull-right">
            <a href="<?= BASEURL; ?>/dokter" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-refresh"></i></a>
            <?php
            $id_role = $data['user']['role'];
            $title = $data['title'];
            $data['menu'] = $this->models('menu_model')->getMenubyTitle($title);
            $id_menu = $data['menu']['id_menu'];
            
            if ( $this->models('role_model')->countCreate($id_role,$id_menu) > 0 ){ ?>
            <button type="button" class="btn btn-xs btn-primary tombolTambahDokter" data-toggle="modal" data-target="#modalDokter">Tambah Data Dokter</button>
            <?php } ?>
        </div>
        </h4>
        <div style="margin-bottom: 20px;">
            <form class="form-inline" action="<?= BASEURL; ?>/dokter/cari" method="post">
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
            <table class="table table-bordered table-striped table-hover" id="dokter">
                <thead class="thead-light">
                <style>
                    th.judul , td.judul {text-align: center;}
                </style>
                    <tr>
                        <th class="judul">No.</th>    
                        <th>Nama Dokter</th>
                        <th>Spesialis</th>
                        <th>Alamat</th>
                        <th>No. Telp</th>
                        <th class="judul"><i class="glyphicon glyphicon-cog"></i></th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                if ( $this->models('dokter_model')->cekTable() > 0 ){
                $nomor = 1; foreach ($data['dokter'] as $dokter) : ?>
                <tr>
                    <td class="judul"><?= $nomor++; ?></td>
                    <td><?= $dokter['nama_dokter']; ?></td>
                    <td><?= $dokter['spesialis']; ?></td>
                    <td><?= $dokter['alamat']; ?></td>
                    <td><?= $dokter['no_telp']; ?></td>
                    <td class="text-center">
                    <?php if ( $this->models('role_model')->countUpdate($id_role,$id_menu) > 0 ){ ?>
                        <a href="" class="btn btn-warning btn-xs modalEditDokter" data-toggle="modal" data-target="#modalDokter" data-id_dokter="<?= $dokter['id_dokter']; ?>"><i class="glyphicon glyphicon-edit"></i></a>
                    <?php } if ( $this->models('role_model')->countDelete($id_role,$id_menu) > 0 ){ ?>
                        <a href="<?= BASEURL; ?>/dokter/hapus/<?= $dokter['id_dokter']; ?>" class="btn btn-danger btn-xs tombol-hapus"><i class="glyphicon glyphicon-trash"></i></a>
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

<?php

use Ramsey\Uuid\Uuid;
$uuid = Uuid::uuid4()->toString();
$id = "Aku bisa";

?>


<!-- Modal -->
<div class="modal fade" id="modalDokter" tabindex="-1" role="dialog" aria-labelledby="judulModal" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h3 class="modal-title" id="judulModal">Tambah Data Dokter</h3>
                <input type="hidden" name="id_dummy" value="<?= $uuid; ?>" class="form-control" id="id_dummy">
			</div>
			<div class="modal-body">
				<form action="<?= BASEURL;?>/dokter/tambah" method="post">
                <div class="form-group">
					<input type="hidden" name="id_dokter" value="<?= $uuid; ?>" class="form-control" id="id_dokter">
				</div>
				<div class="form-group">
					<label for="nama">Nama Dokter</label>
					<input type="text" name="nama" class="form-control" id="nama" required autofocus>
				</div>
				<div class="form-group">
					<label for="spesialis">Spesialis</label>
					<input type="text" name="spesialis" class="form-control" id="spesialis" required>
				</div>
				<div class="form-group">
					<label for="alamat">Alamat</label>
					<input type="text" name="alamat" class="form-control" id="alamat" required>
				</div>
                <div class="form-group">
					<label for="notelp">No. Telp</label>
					<input type="text" name="notelp" class="form-control" id="notelp" required>
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
