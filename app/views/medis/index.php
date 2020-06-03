<a href="#menu-toggle" class="btn btn-warning" id="menu-toggle">Toggle Menu</a><br>
<div class="box">
        <h1>Rekam Medis</h1>
        <h4>
        <small>Data daftar rekam medis</small>
        <div class="pull-right">
            <a href="<?= BASEURL; ?>/medis" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-refresh"></i></a>
            <?php
            $id_role = $data['user']['role'];
            $title = $data['title'];
            $data['menu'] = $this->models('menu_model')->getMenubyTitle($title);
            $id_menu = $data['menu']['id_menu'];
            
            if ( $this->models('role_model')->countCreate($id_role,$id_menu) > 0 ){ ?>
                <a href="<?= BASEURL; ?>/medis/tambah" class="btn btn-info btn-xs"><i class="glyphicon glyphicon-plus">Tambah-data</i></a>
            <?php } ?>
        </div>
        </h4>
        <div class="row">
            <div class="col-lg-8">
                <?php Flasher::flash(); ?>
            </div>      
        </div> 
        <form method="post" name="form_medis">
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover" id="tblmedis">
                <thead class="thead-light">
                <style>
                    th.judul, td.judul {
                        text-align : center;
                    }
                </style>
                    <tr>
                        <th>
                            <center>
                                <input type="checkbox" id="masterCheck" value="">
                            </center>
                        </th>
                        <th class="judul">No.</th>  
                        <th>Tanggal periksa</th>  
                        <th>Nama Pasien</th>
                        <th>Poliklinik</th>
                        <th>Dokter</th>
                        <th>Keluhan</th>
                        <th>Diagnosa</th>
                        <th>Jenis Obat</th>
                        <th class="judul"><i class="glyphicon glyphicon-cog"></i></th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $nomor = 1;
                foreach ( $data['medis'] as $medis ) : ?>
                    <tr>
                        <td class="judul">
                            <center>
                                <input type="checkbox" name="checked[]" class="check" value="<?=$medis['id_medis'] ?>">
                            </center>
                        </td>
                        <td class="judul"><?= $nomor++; ?></td>
                        <td class="judul"><?=date('d F Y',strtotime($medis['tgl_periksa'])) ?></td>
                        <td><?= $medis['nama_pasien']; ?></td>
                        <td><?= $medis['nama_poli']; ?></td>
                        <td><?= $medis['nama_dokter']; ?></td>
                        <td><?= $medis['keluhan']; ?></td>
                        <td><?= $medis['diagnosa']; ?></td>
                        <td>
                            <?php
                            $id_medis = $medis['id_medis']; 
                            $data['obat'] = $this->models('medis_model')->getDetailObat($id_medis);
                            foreach ( $data['obat'] as $obat ):
                                echo $obat['nama_obat'];?><br>
                            <?php endforeach; ?>
                        </td>
                        <?php if ( $this->models('role_model')->countUpdate($id_role,$id_menu) > 0 ){ ?>
                        <td class="judul">
                            <a href="<?= BASEURL; ?>/medis/update/<?= $medis['id_medis']; ?>" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-edit"></i></a>
                        </td>
                        <?php } else {echo '<td><a class="btn btn-danger btn-xs"><i class="fas fa-ban"></i></td>';}?>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        </form>
        <?php if ( $this->models('role_model')->countDelete($id_role,$id_menu) > 0 ){ ?>
        <div class="box pull-left" style="margin-bottom: 30px;">            
            <button class="btn btn-danger btn-group" onclick="hapusmedis()"><i class="glyphicon glyphicon-trash"></i>  Delete  </button>
        </div>
        <?php } ?>
    </div>

<script>

function hapusmedis() {      

    if ($('.check:checked').length > 0 ){
        Swal.fire({
            title: 'Apakah Anda Yakin ?',
            text: "Data yang Anda hapus tidak dapat di Recovery !",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, saya yakin!'
            }).then((result) => {
            if (result.value) {            
                document.form_medis.action = '<?= BASEURL; ?>/medis/hapus';
                document.form_medis.submit();            
            }
        })
    } else {
        // alert('Pilih dulu Data yang akan Anda HAPUS !!');
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Pilih dulu data yang akan Anda hapus !!'
            })
    }

}


</script>