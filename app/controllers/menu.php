<?php

class menu extends Controller {

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
        $data['title'] = "Menu Management";
        $data['menu'] = $this->models('menu_model')->dataMenu();
        $data['user'] = $this->models('user_model')->getUser();
        $data['allmenu'] = $this->models('menu_model')->allMenu();
        $this->views('templates/header',$data);
        $this->views('menu/index',$data);
        $this->views('templates/footer');
    }

    public function cari ()
    {
        $data['title'] = "Menu Management";
        $data['menu'] = $this->models('menu_model')->dataMenu();
        $data['user'] = $this->models('user_model')->getUser();
        $data['allmenu'] = $this->models('menu_model')->cariMenu($_POST);
        $this->views('templates/header',$data);
        $this->views('menu/index',$data);
        $this->views('templates/footer');
    }


    public function tambah ()
    {
        $data['title'] = "Menu Management";
        $data['menu'] = $this->models('menu_model')->dataMenu();
        $data['user'] = $this->models('user_model')->getUser();
        $this->views('templates/header',$data);
        $this->views('menu/tambah',$data);
        $this->views('templates/footer');
    }


    public function update ($id_menu)
    {
        $data['title'] = "Menu Management";
        $data['menu'] = $this->models('menu_model')->dataMenu();
        $data['user'] = $this->models('user_model')->getUser();
        $data['mn'] = $this->models('menu_model')->getMenubyID($id_menu);
        $this->views('templates/header',$data);
        $this->views('menu/update',$data);
        $this->views('templates/footer');
    }


    public function tambahData ()
    {
        $title = $_POST['title'];

        if ( $this->models('menu_model')->cekData($_POST) > 0 ){
            Flasher::setFlash('Gagal', 'ditambahkan', 'danger', 'menu', 'title '. $title .' sudah ada di Database !');
            header ('Location: '. BASEURL . '/menu');
            exit;
        } elseif ( $this->models('menu_model')->tambahData($_POST) > 0 ){
            Flasher::setFlash('Berhasil', 'ditambahkan', 'success', 'menu', '');
            header ('Location: '. BASEURL . '/menu');
            exit;
        } else {
            Flasher::setFlash('Gagal', 'ditambahkan', 'danger','menu', '');
            header ('Location: '. BASEURL . '/menu');
            exit;
        }
    }

    public function updateData ()
    {
        if ( $this->models('menu_model')->updateData($_POST) > 0 ){
            Flasher::setFlash('Berhasil', 'diupdate', 'success', 'menu', '');
            header ('Location: '. BASEURL . '/menu');
            exit;
        } else {
            Flasher::setFlash('Gagal', 'diupdate', 'danger','menu', '');
            header ('Location: '. BASEURL . '/menu');
            exit;
        }
    }


    public function hapus ($url)
    {
        if ( file_exists( '../app/controllers/'. $url . '.php') ) {
            Flasher::setFlash('Tidak bisa', 'dihapus', 'danger', 'menu', 'Sudah ada Controller untuk menu ini !!');
            header ('Location: '. BASEURL . '/menu');
            exit;
        } elseif ($this->models('menu_model')->hapusData($url) > 0) {
            Flasher::setFlash('Berhasil', 'dihapus', 'success', 'menu', '');
            header ('Location: '. BASEURL . '/menu');
            exit;
        } else {
            Flasher::setFlash('Gagal', 'dihapus', 'danger','menu', '');
            header ('Location: '. BASEURL . '/menu');
            exit;
        }
    }






}