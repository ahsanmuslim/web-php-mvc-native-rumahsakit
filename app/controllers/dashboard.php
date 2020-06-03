<?php

class dashboard extends Controller  {

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
        $data['title'] = "Dashboard";
        $data['user'] = $this->models('user_model')->getUser();
        $data['menu'] = $this->models('menu_model')->dataMenu();
        $data['dokter'] = $this->models('dokter_model')->getDokter();
        $data['pasien'] = $this->models('pasien_model')->getPasien();
        $data['poli'] = $this->models('poli_model')->getPoli();
        $data['medis'] = $this->models('medis_model')->getMedis();
        $data['grafik_poli'] = $this->models('dashboard_model')->grafikPoli();
        $data['grafik_dokter'] = $this->models('dashboard_model')->grafikDokter();
        $data['grafik_harian'] = $this->models('dashboard_model')->grafikHarian();        
        $data['grafik_obat'] = $this->models('dashboard_model')->grafikObat(); 
        $data['grafik_user'] = $this->models('dashboard_model')->grafikUser(); 
        $this->views('templates/header', $data);
        $this->views('dashboard/index', $data);
        $this->views('templates/footer');
    }


}