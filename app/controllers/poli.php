<?php


class poli extends Controller {

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
        $data['title'] = 'Data Poliklinik';
        $data['user'] = $this->models('user_model')->getUser();
        $data['menu'] = $this->models('menu_model')->dataMenu();
        $data['poli'] = $this->models('poli_model')->getPoli();
        $this->views('templates/header',$data);
        $this->views('poli/index',$data);
        $this->views('templates/footer');
    }

    public function cari ()
    {
        $data['title'] = 'Data Poliklinik';
        $data['user'] = $this->models('user_model')->getUser();
        $data['menu'] = $this->models('menu_model')->dataMenu();
        $data['poli'] = $this->models('poli_model')->cariPoli();
        $this->views('templates/header',$data);
        $this->views('poli/index',$data);
        $this->views('templates/footer');
    }

    public function generate ()
    {
        $data['title'] = 'Data Poliklinik';
        $data['user'] = $this->models('user_model')->getUser();
        $data['menu'] = $this->models('menu_model')->dataMenu();
        $this->views('templates/header',$data);
        $this->views('poli/generate');
        $this->views('templates/footer');
    }

    public function tambah ()
    {
        $data['title'] = 'Data Poliklinik';
        $data['user'] = $this->models('user_model')->getUser();
        $data['menu'] = $this->models('menu_model')->dataMenu();
        $this->views('templates/header',$data);
        $this->views('poli/tambah');
        $this->views('templates/footer');
    }

    public function tambahData ()
    {
        if ( $this->models('poli_model')->tambahData($_POST) > 0 ){
            Flasher::setflash('Berhasil', 'ditambahkan', 'success', 'poliklinik', '');
            header ('Location: '. BASEURL . '/poli');
            exit;
        } else {
            Flasher::setFLash('Gagal', 'ditambahkan', 'danger', 'poliklinik', '');
            header ('Location: '. BASEURL .'/poli');
            exit;
        }
    }

    public function update ()
    {
        $data['title'] = "Data Poliklinik";
        $data['menu'] = $this->models('menu_model')->dataMenu();
        $data['user'] = $this->models('user_model')->getUser();
        $data['poli'] = $this->models('poli_model')->getPolibyID($_POST['checked']);
        $this->views('templates/header',$data);
        $this->views('poli/update',$data);
        $this->views('templates/footer');
    }

    public function updateData ()
    {
        if ( $this->models('poli_model')->updateData($_POST) > 0 ){
            Flasher::setFlash('Berhasil', 'diupdate', 'success', 'poliklinik', '');
            header ('Location: '. BASEURL . '/poli');
            exit;
        } else {
            Flasher::setFlash('Gagal', 'diupdate', 'danger','poliklinik', '');
            header ('Location: '. BASEURL . '/poli');
            exit;
        }
    }
        
    public function hapus ()
    {
        if ($this->models('poli_model')->cekDatabyID($_POST) > 0) {
            Flasher::setFlash('Tidak bisa', 'dihapus', 'danger', 'poli', 'Data sudah dipakai pada transaksi Rekam Medis.');
            header ('Location: '. BASEURL . '/poli');
            exit;
        } elseif ($this->models('poli_model')->hapusData($_POST) > 0) {
            Flasher::setFlash('Berhasil', 'dihapus', 'success', 'poliklinik', '');
            header ('Location: '. BASEURL . '/poli');
            exit;
        } else {
            Flasher::setFlash('Gagal', 'dihapus', 'danger','poliklinik', '');
            header ('Location: '. BASEURL . '/poli');
            exit;
        }
    }



}