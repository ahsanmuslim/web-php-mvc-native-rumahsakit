<a href="#menu-toggle" class="btn btn-warning" id="menu-toggle">Toggle Menu</a><br>
    <div class="box">
        <h1>Poliklinik</h1>
        <h4>
        <style>
                .ml-2,
                .mx-2 {
                margin-left: 0.5rem !important;
                }
        </style>
        <small>Data poliklinik</small>
        <div class="pull-right">
            <a href="<?= BASEURL; ?>/poli" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-refresh"></i></a>
            <?php
            $id_role = $data['user']['role'];
            $title = $data['title'];
            $data['menu'] = $this->models('menu_model')->getMenubyTitle($title);
            $id_menu = $data['menu']['id_menu'];
            
            if ( $this->models('role_model')->countCreate($id_role,$id_menu) > 0 ){ ?>
                <a href="<?= BASEURL; ?>/poli/generate" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-plus">Add-data</i></a>
            <?php } ?>
        </div>
        </h4>
        <div style="margin-bottom: 20px;">
            <form class="form-inline" action="<?= BASEURL; ?>/poli/cari" method="post" name="pencarian">
                <div class="form-group">
                    <input type="text" name="keyword" class="form-control" placeholder="pencarian"> 
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
        <form method="post" name="form_poli">
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
                <thead class="thead-light">
                <style>
                    th.judul , td.judul {
                        text-align : center;
                    }
                </style>
                    <tr>
                        <th class="judul">No.</th>    
                        <th>Nama Poliklinik</th>
                        <th>Gedung</th>
                        <th>
                            <center>
                                <input type="checkbox" id="masterCheck" value="">
                            </center>
                        </th>
                    </tr>
                </thead>
                <tbody>
                <?php
                if( $this->models('poli_model')->cekTable() > 0 ){
                    $nomor = 1;
                    foreach ( $data['poli'] as $poli ) : ?>
                    <tr>
                        <td class="judul"><?=$nomor++ ?></td>
                        <td><?=$poli['nama_poli'] ?></td>
                        <td><?=$poli['gedung'] ?></td>
                        <td class="text-center">
                            <center>
                                <input type="checkbox" name="checked[]" class="check" value="<?=$poli['id_poli'] ?>">
                            </center>
                        </td>
                    </tr>
                    <?php endforeach; 
                } else { ?>
                    <tr>
                        <td colspan="4">Tidak ditemukan data di Database !!</td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
        </form>

        <div class="box pull-right" style="margin-bottom: 30px;">    
        <?php 
        if ( $this->models('role_model')->countUpdate($id_role,$id_menu) > 0 ){
            echo '<button class="btn btn-warning btn-sm" onclick="editpoli()"><i class="glyphicon glyphicon-edit"></i>  Update  </button>';
        }   
        if ( $this->models('role_model')->countDelete($id_role,$id_menu) > 0 ){
            echo '<button class="btn btn-danger btn-sm ml-2 btn-hapus" onclick="hapuspoli()"><i class="glyphicon glyphicon-trash"></i>  Delete  </button>';
        } ?>
        </div>


<script>


function editpoli(){

    if ($('.check:checked').length > 0 ){
        document.form_poli.action = '<?= BASEURL; ?>/poli/update';
        document.form_poli.submit();
    } else {
        // alert('Pilih dulu Data yang akan Anda UPDATE !!');
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Pilih dulu data yang akan Anda Update !!'
            })
    }

}

function hapuspoli() {      

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
                document.form_poli.action = '<?= BASEURL; ?>/poli/hapus';
                document.form_poli.submit();            
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