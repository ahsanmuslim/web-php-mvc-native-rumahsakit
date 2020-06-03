<?php

class role extends Controller {

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
        $data['title'] = "Role Management";
        $data['role'] = $this->models('role_model')->getRole();
        $data['menu'] = $this->models('menu_model')->dataMenu();
        $data['user'] = $this->models('user_model')->getUser();
        $this->views('templates/header',$data);
        $this->views('role/index',$data);
        $this->views('templates/footer');
    }


    public function akses ($id_role)
    {
        $data['title'] = "Role Management";
        $data['role'] = $this->models('role_model')->getDataRole($id_role);
        $data['menu'] = $this->models('menu_model')->dataMenu();
        $data['activeMenu'] = $this->models('menu_model')->activeMenu();
        $data['user'] = $this->models('user_model')->getUser();
        $this->views('templates/header',$data);
        $this->views('role/akses',$data);
        $this->views('templates/footer');
    }

    public function updateAkses ()
    {
        $id_role = $_POST['id_role'];
        $id_menu = $_POST['ceklist'];
        $count = count($_POST['ceklist']);
        //deklarasi variable cekbox create update delete
        $createlist = "";
        $updatelist = "";
        $deletelist = "";
        $importlist = "";
        if(!empty($_POST['createlist'])) { $createlist = $_POST['createlist']; }
        if(!empty($_POST['updatelist'])) { $updatelist = $_POST['updatelist']; }
        if(!empty($_POST['deletelist'])) { $deletelist = $_POST['deletelist']; }  
        if(!empty($_POST['importlist'])) { $importlist = $_POST['importlist']; } 

        
        if ( $this->models('role_model')->updateAkses($id_role, $id_menu, $count, $createlist, $updatelist, $deletelist, $importlist) > 0 ){
            Flasher::setFlash('Berhasil', 'diupdate', 'success', 'role akses', '');
            header ('Location: '. BASEURL . '/role');
            exit;
        } else {
            Flasher::setFlash('Gagal', 'diupdate', 'danger','role  akses', '');
            header ('Location: '. BASEURL . '/role');
            exit;
        } 


    }

    public function tambah ()
    {
        $role = $_POST['role'];

        if( $this->models('role_model')->cekData($_POST) > 0 ){
            Flasher::setFlash('Gagal', 'ditambahkan', 'danger', 'role', 'Role '. $role .' sudah ada di Database !');
            header ('Location: '. BASEURL . '/role');
            exit;
        } elseif ( $this->models('role_model')->tambahData($_POST) > 0) {
            Flasher::setFlash('Berhasil', 'ditambahkan', 'success', 'role', '');
            header ('Location: '. BASEURL . '/role');
            exit;
        } else {
            Flasher::setFlash('Gagal', 'ditambahkan', 'danger','role', '');
            header ('Location: '. BASEURL . '/role');
            exit;
        }
    }


    public function hapus ($id_role)
    {
        if ($this->models('role_model')->cekDatabyID($id_role) > 0) {
            Flasher::setFlash('Tidak bisa', 'dihapus', 'danger', 'role', 'Data sudah dipakai pada User.');
            header ('Location: '. BASEURL . '/role');
            exit;
        } elseif ( $this->models('role_model')->hapusData($id_role) > 0) {
            Flasher::setFlash('Berhasil', 'dihapus', 'success', 'role', '');
            header ('Location: '. BASEURL . '/role');
            exit;
        } else {
            Flasher::setFlash('Gagal', 'dihapus', 'danger','role', '');
            header ('Location: '. BASEURL . '/role');
            exit;
        }
    }

    
    public function getEdit ()
	{
        echo json_encode($this->models('role_model')->getDataRole($_POST['id_role']));
	}


    public function update ()
    {
        if ( $this->models('role_model')->updateData($_POST) > 0) {
            Flasher::setFlash('Berhasil', 'diupdate', 'success', 'role', '');
            header ('Location: '. BASEURL . '/role');
            exit;
        } else {
            Flasher::setFlash('Gagal', 'diupdate', 'danger','role', '');
            header ('Location: '. BASEURL . '/role');
            exit;
        }
    }






}