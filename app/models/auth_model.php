<?php

class auth_model {

    private $table = 'user';
    private $db;


    public function __construct (){
        $this->db = new Database ();        
    }


    public function cekLogin()
    {
        $username = $_POST['username'];
        $password = SHA1($_POST['password']);

        $cekdata = "SELECT * FROM ".$this->table." WHERE username =:username AND password =:password ";
        $this->db->query($cekdata);

        $this->db->bind('username',$username);
        $this->db->bind('password',$password);

        $this->db->execute();
        return $this->db->rowCount();
    }


}