<a href="#menu-toggle" class="btn btn-warning" id="menu-toggle">Toggle Menu</a><br>
<div class="box">
            <h1>Menu</h1>
            <h4>
            <small>Data menu</small>
            <div class="pull-right">
                <a href="<?= BASEURL; ?>/menu" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-refresh"></i></a>
                <a href="<?= BASEURL; ?>/menu/tambah" type="button" class="btn btn-xs btn-primary">Tambah Menu</a>
            </div>
            </h4>
            <div style="margin-bottom: 20px;">
                <form class="form-inline" action="<?= BASEURL; ?>/menu/cari" method="post">
                    <div class="form-group">
                        <input type="text" name="keyword" class="form-control" placeholder="Cari"> 
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                    </div>
                </form>     
            </div>
            <style>
                .ml-2,
                .mx-2 {
                margin-left: 0.5rem !important;
                }
                th.judul , td.judul {text-align: center;}
            </style>

            <div class="row" style="margin-top: 15px;">
                <div class="col-lg-6">
                    <?php Flasher::flash(); ?>
                </div>      
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <table class="table">
                        <tr>
                            <th class="judul">No.</th>
                            <th>Menu Title</th>
                            <th>URL</th>
                            <th class="judul">Status</th>
                            <th class="judul"><i class="glyphicon glyphicon-cog"></i></th>
                        </tr>
                        <?php 
                        if ( $this->models('menu_model')->cekTable() > 0 ){
                        $no=1;
                        foreach ( $data['allmenu'] as $menu ): ?>
                        <tr> 
                            <td class="judul"><?= $no++; ?></td>
                            <td><?= $menu['title']; ?></td>
                            <td><?= BASEURL.'/'.$menu['url']; ?></td>
                            <?php if ( $menu['is_active'] == 1 ){ ?>
                                <td class="judul">Active</td>
                            <?php } else { ?>
                                <td class="judul">Not Active</td>
                            <?php } ?>                            
                            <td class="judul">
                                <a href="<?= BASEURL; ?>/menu/update/<?= $menu['id_menu']; ?>" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-edit"></i></a>
                                <a href="<?= BASEURL; ?>/menu/hapus/<?= $menu['url']; ?>" class="btn btn-danger btn-xs tombol-hapus"><i class="glyphicon glyphicon-trash"></i></a>
                            </td>
                        </tr>
                        <?php endforeach;          
                        } else { ?>
                            <tr>
                                <td colspan="5">Tidak ditemukan data di Database !!</td>
                            </tr>
                        <?php } ?>
                    </table>
                    <div class="row">
                        <div class="col-lg-8">
                        <?php
                        if ( isset($_POST['keyword'])){ ?>
                            Ada <?php echo $this->models('menu_model')->cekTable(); ?> data ditemukan di database !
                        <?php } ?>
                        </div>
                    </div> 
                </div>
            </div>


