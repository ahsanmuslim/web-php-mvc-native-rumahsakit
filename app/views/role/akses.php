<div class="box">
            <h1>Role Access</h1>
            <style>
                .ml-2,
                .mx-2 {
                margin-left: 0.5rem !important;
                }
            </style>
            <div class="row" style="margin-top: 15px;">
                <div class="col-lg-6">
                    <?php Flasher::flash(); ?>
                </div>      
            </div>
            <style>
                    th.judul , td.judul {text-align: center;}
            </style>
            <div class="row">
                <div class="col-lg-6">
                    <h3><small>Role access : <?= $data['role']['role']; ?></small></h3>
                </div>
            </div>

            <form name="form_akses" method="post">
            <input type="hidden" name="id_role" value="<?= $data['role']['id_role']; ?>" class="form-control" required>
            <div class="row">
                <div class="col-lg-12">
                    <table class="table">
                        <tr>
                            <th class="judul">#</th>
                            <th class="judul">Menu Title</th>
                            <th class="judul">Akses</th>
                            <th class="judul">Create</th>
                            <th class="judul">Update</th>
                            <th class="judul">Import</th>
                            <th class="judul">Delete</th>
                        </tr>
                        <?php $no=1; foreach ( $data['activeMenu'] as $menu ): ?>
                        <tr> 
                            <td class="judul"><?= $no++; ?></td>
                            <td class="judul"><?= $menu['title']; ?></td>
                            <?php 
                            $id_role = $data['role']['id_role'];
                            $id_menu = $menu['id_menu'];
                            $ceklist = "";
                            if ( $this->models('role_model')->countAccess($id_role,$id_menu) > 0 ){
                                $ceklist = "checked";
                            }
                            ?>
                            <td class="judul">
                                <input type="checkbox" name="ceklist[]" value="<?=$menu['id_menu'] ?>" class="check" <?= $ceklist; ?> >
                            </td>

                            <!-- Script kondisi untuk Create kolom -->
                            <?php if ( $menu['id_menu'] > 1 &&  $menu['id_menu'] < 7 ) { ?>
                                <td class="judul">
                                <input type="checkbox" name="createlist[]" value="<?=$menu['id_menu'] ?>" class="createlist" <?php if ( $this->models('role_model')->countCreate($id_role,$id_menu) > 0 ){ echo 'checked'; } ?> >
                            </td>
                            <?php } else { ?>
                            <td class="judul"></td>
                            <?php } ?>

                            <!-- Script kondisi untuk Update kolom -->
                            <?php if ( $menu['id_menu'] > 1 &&  $menu['id_menu'] < 7 ) { ?>
                            <td class="judul">
                                <input type="checkbox" name="updatelist[]" value="<?=$menu['id_menu'] ?>"  class="updatelist" <?php if ( $this->models('role_model')->countUpdate($id_role,$id_menu) > 0 ){ echo 'checked'; } ?> >
                            </td>
                            <?php } else { ?>
                            <td class="judul"></td>
                            <?php } ?>

                            <!-- Script kondisi untuk Import kolom -->
                            <?php if ( $menu['id_menu'] > 1 &&  $menu['id_menu'] < 7 ) { ?>
                            <td class="judul">
                                <input type="checkbox" name="importlist[]" value="<?=$menu['id_menu'] ?>" class="importlist" <?php if ( $this->models('role_model')->countImport($id_role,$id_menu) > 0 ){ echo 'checked'; } ?> >
                            </td>
                            <?php } else { ?>
                            <td class="judul"></td>
                            <?php } ?>

                            <!-- Script kondisi untuk Delete kolom -->
                            <?php if ( $menu['id_menu'] > 1 &&  $menu['id_menu'] < 7 ) { ?>
                            <td class="judul">
                                <input type="checkbox" name="deletelist[]" value="<?=$menu['id_menu'] ?>" class="deletelist" <?php if ( $this->models('role_model')->countDelete($id_role,$id_menu) > 0 ){ echo 'checked'; } ?> >
                            </td>
                            <?php } else { ?>
                            <td class="judul"></td>
                            <?php } ?>


                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
            </div>
            </form>
    <div class="row">
        <div class="col-lg-12">
            <div class="form-group pull-right">
                <input type="submit" name="editaccess" value="Update Access" onclick="editAkses()" class="btn btn-danger btn-sm ml-2" required>
            </div>
            <div class="form-group pull-right">
                <a href="<?= BASEURL; ?>/role" class="btn btn-warning btn-sm">Kembali</a>
            </div>
        </div>
    </div>



<!-- scrip javascript untuk menjalankan validasi check box role akses  -->
<script>

function editAkses(){

    if ( $('.check:checked').length > 0 ){
        document.form_akses.action = '<?= BASEURL; ?>/role/updateAkses';
        document.form_akses.submit();
    } else {
        // alert('Pilih dulu Data yang akan Anda UPDATE !!');
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Pilih MINIMAL 1 Role Access !!'
            })
    }

}

</script>
