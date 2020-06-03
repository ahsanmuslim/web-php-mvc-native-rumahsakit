<?php

class obat extends Controller {
    
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
        $data['title'] = "Data Obat";
        $data['user'] = $this->models('user_model')->getUser();
        $data['menu'] = $this->models('menu_model')->dataMenu();
        $data['obat'] = $this->models('obat_model')->getObat();
        $this->views('templates/header',$data);
        $this->views('obat/index',$data);
        $this->views('templates/footer');
    }


    public function tambah ()
    {
        $nama = $_POST['nama'];

        if( $this->models('obat_model')->cekData($_POST) > 0 ){
            Flasher::setFlash('Gagal', 'ditambahkan', 'danger', 'obat', 'Nama '. $nama .' sudah ada di Database !');
            header ('Location: '. BASEURL . '/obat');
            exit;
        } elseif ( $this->models('obat_model')->tambahData($_POST) > 0) {
            Flasher::setFlash('Berhasil', 'ditambahkan', 'success', 'obat', '');
            header ('Location: '. BASEURL . '/obat');
            exit;
        } else {
            Flasher::setFlash('Gagal', 'ditambahkan', 'danger','obat', '');
            header ('Location: '. BASEURL . '/obat');
            exit;
        }
    }


    public function hapus ($id_obat)
    {
        if ($this->models('obat_model')->cekDatabyID($id_obat) > 0) {
            Flasher::setFlash('Tidak bisa', 'dihapus', 'danger', 'obat', 'Data sudah dipakai pada transaksi Rekam Medis.');
            header ('Location: '. BASEURL . '/obat');
            exit;
        } elseif ( $this->models('obat_model')->hapusData($id_obat) > 0) {
            Flasher::setFlash('Berhasil', 'dihapus', 'success', 'obat', '');
            header ('Location: '. BASEURL . '/obat');
            exit;
        } else {
            Flasher::setFlash('Gagal', 'dihapus', 'danger','obat', '');
            header ('Location: '. BASEURL . '/obat');
            exit;
        }
    }


    public function getEdit ()
	{
        echo json_encode($this->models('obat_model')->getDataObat($_POST['id_obat']));
	}


    public function update ()
    {
        if ( $this->models('obat_model')->updateData($_POST) > 0) {
            Flasher::setFlash('Berhasil', 'diupdate', 'success', 'obat', '');
            header ('Location: '. BASEURL . '/obat');
            exit;
        } else {
            Flasher::setFlash('Gagal', 'diupdate', 'danger','obat', '');
            header ('Location: '. BASEURL . '/obat');
            exit;
        }
    }


    public function cari()
    {
        $data['title'] = "Data Obat";
        $data['user'] = $this->models('user_model')->getUser();
        $data['obat'] = $this->models('obat_model')->cariObat($_POST);
        $data['menu'] = $this->models('menu_model')->dataMenu();
        $this->views('templates/header',$data);
        $this->views('obat/index',$data);
        $this->views('templates/footer');
    }



}