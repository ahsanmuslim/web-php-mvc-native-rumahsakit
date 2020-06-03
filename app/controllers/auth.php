<?php


class auth extends Controller {


    public function index ()
    {
        if(isset($_SESSION['usr'])){
            header ('Location: '. BASEURL . '/home');  
        } else {
            $this->views('auth/index');
        }
    }

    public function cekLogin()
    {
        if( $this->models('auth_model')->cekLogin($_POST) == 0 ){       
            Flasher::setFlash('Gagal !!', 'Username / password yang Anda masukan salah !!!', 'danger', '', '');
            header ('Location: '. BASEURL . '/auth');  
        } else {
            $_SESSION['usr'] = $_POST['username'];
            header ('Location: '. BASEURL . '/home');
        }
    }

    public function logout ()
    {
        session_destroy();
        header ('Location: '. BASEURL . '/auth');
    }

    public function blocked ()
    {
        $data['title'] = "Access Blocked";
        $data['user'] = $this->models('user_model')->getUser();
        $data['menu'] = $this->models('menu_model')->dataMenu();
        $this->views('templates/header', $data);
        $this->views('auth/blocked');
        $this->views('templates/footer');
    }

    

}