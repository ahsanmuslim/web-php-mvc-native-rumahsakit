<?php

class user extends Controller {

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
        }
    }

    public function index ()
    {
        $data['title'] = "User Management";
        $data['menu'] = $this->models('menu_model')->dataMenu();
        $data['user'] = $this->models('user_model')->getUser();
        $data['datauser'] = $this->models('user_model')->dataUser();
        $this->views('templates/header',$data);
        $this->views('user/index',$data);
        $this->views('templates/footer');
    }


    public function cari ()
    {
        $data['title'] = "User Management";
        $data['menu'] = $this->models('menu_model')->dataMenu();
        $data['datauser'] = $this->models('user_model')->cariUser($_POST);
        $data['user'] = $this->models('user_model')->getUser();
        $this->views('templates/header',$data);
        $this->views('user/index',$data);
        $this->views('templates/footer');
    }

    public function tambah ()
    {
        $data['title'] = "User Management";
        $data['user'] = $this->models('user_model')->getUser();
        $data['menu'] = $this->models('menu_model')->dataMenu();
        $data['datarole'] = $this->models('role_model')->getRole();
        $this->views('templates/header',$data);
        $this->views('user/tambah',$data);
        $this->views('templates/footer');
    }

    public function update ($id_user)
    {
        $data['title'] = "User Management";
        $data['user'] = $this->models('user_model')->getUser();
        $data['menu'] = $this->models('menu_model')->dataMenu();
        $data['datarole'] = $this->models('role_model')->getRole();
        $data['datauser'] = $this->models('user_model')->getUserbyID($id_user);
        $this->views('templates/header',$data);
        $this->views('user/update',$data);
        $this->views('templates/footer');
    }


    public function tambahData ()
    {
        $username = $_POST['username'];

        if ( $this->models('user_model')->cekData($_POST) > 0 ){
            Flasher::setFlash('Gagal', 'ditambahkan', 'danger', 'user', 'username '. $username .' sudah ada di Database !');
            header ('Location: '. BASEURL . '/user');
            exit;
        } elseif ( $this->models('user_model')->tambahData($_POST) > 0 ){
            Flasher::setFlash('Berhasil', 'ditambahkan', 'success', 'user', '');
            header ('Location: '. BASEURL . '/user');
            exit;
        } else {
            Flasher::setFlash('Gagal', 'ditambahkan', 'danger','user', '');
            header ('Location: '. BASEURL . '/user');
            exit;
        }
    }

    public function updateData ()
    {
        if ( $this->models('user_model')->updateData($_POST) > 0 ){
            Flasher::setFlash('Berhasil', 'diupdate', 'success', 'user', '');
            header ('Location: '. BASEURL . '/user');
            exit;
        } else {
            Flasher::setFlash('Gagal', 'diupdate', 'danger','user', '');
            header ('Location: '. BASEURL . '/user');
            exit;
        }
    }

    public function hapus ($id_user)
    {
        if ($this->models('user_model')->cekDatabyID($id_user) > 0) {
            Flasher::setFlash('Tidak bisa', 'dihapus', 'danger', 'user', 'Data sudah dipakai pada transaksi Rekam Medis.');
            header ('Location: '. BASEURL . '/user');
            exit;
        } elseif ($this->models('user_model')->hapusData($id_user) > 0) {
            Flasher::setFlash('Berhasil', 'dihapus', 'success', 'user', '');
            header ('Location: '. BASEURL . '/user');
            exit;
        } else {
            Flasher::setFlash('Gagal', 'dihapus', 'danger','user', '');
            header ('Location: '. BASEURL . '/user');
            exit;
        }
    }



}



