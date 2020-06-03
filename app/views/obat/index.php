<a href="#menu-toggle" class="btn btn-warning" id="menu-toggle">Toggle Menu</a><br>
    <div class="box">
        <h1>Obat</h1>
        <h4>
        <small>Data daftar obat</small>
        <div class="pull-right">
            <a href="<?= BASEURL; ?>/obat" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-refresh"></i></a>
            <?php
            $id_role = $data['user']['role'];
            $title = $data['title'];
            $data['menu'] = $this->models('menu_model')->getMenubyTitle($title);
            $id_menu = $data['menu']['id_menu'];
            
            if ( $this->models('role_model')->countCreate($id_role,$id_menu) > 0 ){ ?>
            <a href="" class="btn btn-success btn-xs tombolTambahObat" data-toggle="modal" data-target="#modalObat"><i class="glyphicon glyphicon-plus">Tambah-data</i></a>
            <?php } ?>
        </div>
        </h4>
        <div style="margin-bottom: 20px;">
            <form class="form-inline" action="<?= BASEURL; ?>/obat/cari" method="post">
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
            <table class="table table-bordered table-striped table-hover">
                <thead class="thead-light">
                <style>
                    th.judul , td.judul {text-align: center;}
                </style>
                    <tr align="center">
                        <th class="judul">No.</th>    
                        <th>Nama Obat</th>
                        <th>Keterangan Obat</th>
                        <th class="judul">Stok Obat</th>
                        <th class="judul">Unit</th>
                        <th class="judul"><i class="glyphicon glyphicon-cog"></i></th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                if ( $this->models('obat_model')->cekTable() > 0 ){
                $nomor = 1 ; foreach ($data['obat'] as $obat ) : ?> 
                    <tr>
                        <td class="judul"><?= $nomor++; ?></td>
                        <td><?= $obat['nama_obat']; ?></td>
                        <td><?= $obat['ket_obat']; ?></td>   
                        <td class="judul"><?= $obat['stok']; ?></td> 
                        <td class="judul"><?= $obat['unit']; ?></td>                   
                        <td class="text-center">
                        <?php if ( $this->models('role_model')->countUpdate($id_role,$id_menu) > 0 ){ ?>
                            <a href="" class="btn btn-warning btn-xs modalEditObat" data-toggle="modal" data-target="#modalObat" data-id_obat="<?= $obat['id_obat']; ?>"><i class="glyphicon glyphicon-edit"></i></a>
                        <?php } if ( $this->models('role_model')->countDelete($id_role,$id_menu) > 0 ){ ?>
                            <a href="<?= BASEURL; ?>/obat/hapus/<?= $obat['id_obat']; ?>" class="btn btn-danger btn-xs tombol-hapus"><i class="glyphicon glyphicon-trash"></i></a>
                        <?php } if ( $this->models('role_model')->countUpdate($id_role,$id_menu) == 0 && $this->models('role_model')->countDelete($id_role,$id_menu) == 0 ) {
                            echo '<a class="btn btn-danger btn-xs"><i class="fas fa-ban"></i>';
                        } ?>
                        </td>
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



<?php

use Ramsey\Uuid\Uuid;
$uuid = Uuid::uuid4()->toString();

?>


<!-- Modal -->
<div class="modal fade" id="modalObat" tabindex="-1" role="dialog" aria-labelledby="judulModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="judulModal">Tambah Data Obat</h3>
                <input type="hidden" name="id_dummy" value="<?= $uuid; ?>" class="form-control" id="id_dummy">
            </div>
            <div class="modal-body">
                <form action="<?= BASEURL;?>/obat/tambah" method="post">
                <div class="form-group">
                    <input type="hidden" name="id_obat" value="<?= $uuid; ?>" class="form-control" id="id_obat">
                </div>
                <div class="form-group">
                    <label for="nama_obat">Nama Obat</label>
                    <input type="text" name="nama_obat" class="form-control" id="nama_obat" required autofocus>
                </div>
                <div class="form-group">
                    <label for="ket_obat">Keterangan Obat</label>
                    <textarea name="ket_obat" id="ket_obat" class="form-control" required></textarea>
                </div>
                <div class="form-group">
                    <label for="stok">Stok</label>
                    <input type="number" name="stok" class="form-control" id="stok" required>
                </div>
                <div class="form-group">
                    <label for="unit">Units</label>
                    <select name="unit" id="unit" class="form-control" required>
                        <option value="">--Pilih--</option>
                        <option value="tablet">tablet</option>
                        <option value="kapsul">kapsul</option>
                        <option value="botol">botol</option>
                        <option value="box">box</option>
                        <option value="kantong">kantong</option>
                        <option value="lembar">lembar</option>
                    </select>
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
