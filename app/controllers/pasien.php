<?php

class pasien extends Controller {

    public function __construct ()
    {
        $url = $this->parseURL();
        // var_dump($url[1]);

        if(!isset($_SESSION['usr'])){
            header ('Location: '. BASEURL . '/auth');  
            Flasher::setFlash('first with your username !!', 'Direct access page not allowed !!!', 'danger', '', '');
        } else {
            $data['user'] = $this->models('user_model')->getUser();
            $id_role = $data['user']['role'];

            $url_menu = $url[0];
            $data['menu'] = $this->models('menu_model')->getIDmenu($url_menu);
            $id_menu = $data['menu']['id_menu'];
            // var_dump($id_menu);
            // var_dump($id_role);
            if ( $this->models('role_model')->countAccess($id_role, $id_menu) == 0 ){
                header ('Location: '. BASEURL . '/auth/blocked');
                exit;
            }


            //mengecek apakah method sedang di panggil atau tidak 
            if ( !empty($url[1]) ){
                //jika ya maka deklarasikan variable aksesCrud
                $aksesCrud = $url[1];

                if ( $aksesCrud == 'tambah' && $this->models('role_model')->countCreate($id_role,$id_menu) == 0 ){
                    header ('Location: '. BASEURL . '/auth/blocked');
                    exit;
                } elseif ( $aksesCrud == 'generate' && $this->models('role_model')->countCreate($id_role,$id_menu) == 0 ){
                    header ('Location: '. BASEURL . '/auth/blocked');
                    exit;
                } elseif ( $aksesCrud == 'update' && $this->models('role_model')->countUpdate($id_role,$id_menu) == 0 ){
                    header ('Location: '. BASEURL . '/auth/blocked');
                    exit;
                } elseif ( $aksesCrud == 'hapus' && $this->models('role_model')->countDelete($id_role,$id_menu) == 0 ){
                    header ('Location: '. BASEURL . '/auth/blocked');
                    exit;
                } elseif ( $aksesCrud == 'import' && $this->models('role_model')->countImport($id_role,$id_menu) == 0 ){
                    header ('Location: '. BASEURL . '/auth/blocked');
                    exit;
                }
            }
        }
    }

    public function index ()
    {
        $data['title'] = "Data Pasien";
        $data['user'] = $this->models('user_model')->getUser();
        $data['menu'] = $this->models('menu_model')->dataMenu();
        $data['pasien'] = $this->models('pasien_model')->getPasien();
        $this->views('templates/header-table',$data);
        $this->views('pasien/index',$data);
        $this->views('templates/footer-table');
    }

    public function tambah ()
    {
        $data['title'] = "Data Pasien";
        $data['menu'] = $this->models('menu_model')->dataMenu();
        $data['user'] = $this->models('user_model')->getUser();
        $this->views('templates/header',$data);
        $this->views('pasien/tambah');
        $this->views('templates/footer');
    }

    public function tambahData ()
    {
        $noidentitas = $_POST['noidentitas'];

        if ( $this->models('pasien_model')->cekData($_POST) > 0 ){
            Flasher::setFlash('Gagal', 'ditambahkan', 'danger', 'pasien', 'no identitas '. $noidentitas .' sudah ada di Database !');
            header ('Location: '. BASEURL . '/pasien');
            exit;
        } elseif ( $this->models('pasien_model')->tambahData($_POST) > 0 ){
            Flasher::setFlash('Berhasil', 'ditambahkan', 'success', 'pasien', '');
            header ('Location: '. BASEURL . '/pasien');
            exit;
        } else {
            Flasher::setFlash('Gagal', 'ditambahkan', 'danger','pasien', '');
            header ('Location: '. BASEURL . '/pasien');
            exit;
        }
    }

    public function update ($id_pasien)
    {
        $data['title'] = "Data Pasien";
        $data['user'] = $this->models('user_model')->getUser();
        $data['menu'] = $this->models('menu_model')->dataMenu();
        $data['pasien'] = $this->models('pasien_model')->getPasienbyId($id_pasien);
        $this->views('templates/header',$data);
        $this->views('pasien/update',$data);
        $this->views('templates/footer');
    }

    public function updateData ()
    {
        $noidentitas = $_POST['noidentitas'];

        if ( $this->models('pasien_model')->updateData($_POST) > 0 ){
            Flasher::setFlash('Berhasil', 'diupdate', 'success', 'pasien', '');
            header ('Location: '. BASEURL . '/pasien');
            exit;
        } else {
            Flasher::setFlash('Gagal', 'diupdate', 'danger','pasien', '');
            header ('Location: '. BASEURL . '/pasien');
            exit;
        }
    }

    public function hapus ($id_pasien)
    {
        if ($this->models('pasien_model')->cekDatabyID($id_pasien) > 0) {
            Flasher::setFlash('Tidak bisa', 'dihapus', 'danger', 'pasien', 'Data sudah dipakai pada transaksi Rekam Medis.');
            header ('Location: '. BASEURL . '/pasien');
            exit;
        } elseif ($this->models('pasien_model')->hapusData($id_pasien) > 0) {
            Flasher::setFlash('Berhasil', 'dihapus', 'success', 'pasien', '');
            header ('Location: '. BASEURL . '/pasien');
            exit;
        } else {
            Flasher::setFlash('Gagal', 'dihapus', 'danger','pasien', '');
            header ('Location: '. BASEURL . '/pasien');
            exit;
        }
    }

    public function cari ()
    {
        $data['title'] = "Data Pasien";
        $data['menu'] = $this->models('menu_model')->dataMenu();
        $data['user'] = $this->models('user_model')->getUser();
        $data['pasien'] = $this->models('pasien_model')->cariPasien($_POST);
        $this->views('templates/header-table',$data);
        $this->views('pasien/index',$data);
        $this->views('templates/footer-table');
    }

    public function import ()
    {
        $data['title'] = "Data Pasien";
        $data['user'] = $this->models('user_model')->getUser();
        $data['menu'] = $this->models('menu_model')->dataMenu();
        $this->views('templates/header',$data);
        $this->views('pasien/import');
        $this->views('templates/footer');
    }

    public function importData ()
    {
        if ( $this->models('pasien_model')->importData() > 0 ){
            Flasher::setFlash('Berhasil', 'diimport', 'success', 'pasien', '');
            header ('Location: '. BASEURL . '/pasien');
            exit;
        } else {
            Flasher::setFlash('Gagal', 'diimport', 'danger','pasien', '');
            header ('Location: '. BASEURL . '/pasien');
            exit;
        }
    }


}