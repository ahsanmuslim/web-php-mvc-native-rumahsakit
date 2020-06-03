<?php

class medis extends Controller {

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
        $data['title'] = "Data Medis";
        $data['user'] = $this->models('user_model')->getUser();
        $data['menu'] = $this->models('menu_model')->dataMenu();
        $data['medis'] = $this->models('medis_model')->getMedis();
        $this->views('templates/header-table',$data);
        $this->views('medis/index',$data);
        $this->views('templates/footer-table');
    }

    public function tambah ()
    {
        $data['title'] = "Data Medis";
        $data['user'] = $this->models('user_model')->getUser();
        $data['menu'] = $this->models('menu_model')->dataMenu();
        $data['pasien'] = $this->models('pasien_model')->getPasien();
        $data['dokter'] = $this->models('dokter_model')->getDokter();
        $data['poli'] = $this->models('poli_model')->getPoli();
        $data['obat'] = $this->models('obat_model')->getObat();
        $this->views('templates/header',$data);
        $this->views('medis/tambah',$data);
        $this->views('templates/footer');
    }

    public function tambahData ()
    {
        if ( $this->models('medis_model')->tambahData($_POST) > 0 ){
            Flasher::setFlash('Berhasil', 'ditambahkan', 'success', 'rekam medis', '');
            header ('Location: '. BASEURL . '/medis');
            exit;
        } else {
            Flasher::setFlash('Gagal', 'ditambahkan', 'danger','rekam medis', '');
            header ('Location: '. BASEURL . '/medis');
            exit;
        }
    }


    public function update ($id_medis)
    {
        $data['title'] = "Data Medis";
        $data['user'] = $this->models('user_model')->getUser();
        $data['menu'] = $this->models('menu_model')->dataMenu();
        $data['medis'] = $this->models('medis_model')->getMedisbyID($id_medis);
        $data['detail_obat'] = $this->models('medis_model')->getDetailObat($id_medis);
        $data['pasien'] = $this->models('pasien_model')->getPasien();
        $data['dokter'] = $this->models('dokter_model')->getDokter();
        $data['poli'] = $this->models('poli_model')->getPoli();
        $data['obat'] = $this->models('obat_model')->getObat();
        $this->views('templates/header',$data);
        $this->views('medis/update',$data);
        $this->views('templates/footer');
    }

    public function updateData ()
    {
        if ( $this->models('medis_model')->updateData($_POST) > 0 ){
            Flasher::setFlash('Berhasil', 'diupdate', 'success', 'rekam medis', '');
            header ('Location: '. BASEURL . '/medis');
            exit;
        } else {
            Flasher::setFlash('Gagal', 'diupdate', 'danger','rekam medis', '');
            header ('Location: '. BASEURL . '/medis');
            exit;
        }
    }

    public function hapus ()
    {
        if ($this->models('medis_model')->hapusData($_POST) > 0) {
            Flasher::setFlash('Berhasil', 'dihapus', 'success', 'rekam medis', '');
            header ('Location: '. BASEURL . '/medis');
            exit;
        } else {
            Flasher::setFlash('Gagal', 'dihapus', 'danger','rekam medis', '');
            header ('Location: '. BASEURL . '/medis');
            exit;
        }
    }



}