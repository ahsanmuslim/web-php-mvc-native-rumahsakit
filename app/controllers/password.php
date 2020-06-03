<?php

class password extends Controller {

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
        $data['title'] = "Ubah Password";
        $data['user'] = $this->models('user_model')->getUser();
        $data['menu'] = $this->models('menu_model')->dataMenu();
        $data['datauser'] = $this->models('user_model')->getUser();
        $this->views('templates/header',$data);
        $this->views('user/password',$data);
        $this->views('templates/footer');
    }
    
    public function updatePassword ()
    {
        if ( $this->models('user_model')->updatePassword($_POST) > 0 ){
            echo "<script>alert('Data password berhasil diupdate !');</script>";
            echo "<script>window.location.href='../BASEURL/home';</script>";
            exit;
        } else {
            echo "<script>alert('Data password gagal diupdate !');</script>";
            echo "<script>window.location.href='../BASEURL/home';</script>";
            exit;
        }
    }
    
}

