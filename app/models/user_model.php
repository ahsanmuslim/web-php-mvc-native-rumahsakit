<?php

class user_model {

    private $table = 'user';
    private $db;  


    public function __construct ()
    {
        $this->db = new Database();
    }


    public function getUser ()
    {
        if(isset($_SESSION['usr'])){
            $user = $_SESSION['usr'];
            $query = "SELECT * FROM ".$this->table." WHERE username = '$user'";
            $this->db->query($query);

            return $this->db->single();        
        }
    }

    public function getUserbyID ($id_user)
    {
        $this->db->query ('SELECT * FROM '. $this->table . ' WHERE id_user =:id_user'); 
        $this->db->bind ( 'id_user', $id_user );
        return $this->db->single();
    }

    public function dataUser ()
    {
        $query = "SELECT id_user, nama_user, username, password, status, id_role, user_role.role FROM ".$this->table."
        JOIN user_role ON ".$this->table.".role = user_role.id_role 
        ORDER BY nama_user";
        $this->db->query($query);
        return $this->db->resultSet();
    }

    public function cariUser ()
    {
        $keyword = $_POST['keyword'];
        $query = "SELECT id_user, nama_user, username, password, status, id_role, user_role.role FROM user
        JOIN user_role ON user.role = user_role.id_role WHERE nama_user LIKE :keyword ORDER BY nama_user";

        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");

        $this->db->execute();
        return $this->db->resultSet();
    }



    public function cekTable ()
    {
        if( isset($_POST['keyword']) ){
            $keyword = $_POST['keyword'];
            $query = "SELECT count(*) FROM ".$this->table." WHERE nama_user LIKE :keyword";
            $this->db->query($query);
            $this->db->bind('keyword', "%$keyword%");
            $this->db->execute();
            return $this->db->numRow();
        } else {
            $query = "SELECT count(*) FROM ".$this->table;
            $this->db->query($query);
            return $this->db->numRow();  
        }

    }

    public function cekData ()
    {
        $username = $_POST['username'];
        $query = "SELECT count(*) FROM ".$this->table." WHERE username = '$username'";
        $this->db->query($query);
        return $this->db->numRow();
    }

    public function cekDatabyID ($id_user)
    {
        $cekdata = "SELECT * FROM medis WHERE id_user =:id_user";
        $this->db->query($cekdata);
        $this->db->bind('id_user',$id_user);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function tambahData ($data)
    {
        $query = "INSERT INTO ".$this->table." 
        VALUES  
        (:id_user, :username, :namauser, :role, :password, :status)";

        $this->db->query($query);

        $this->db->bind('id_user', $data['id_user']);
        $this->db->bind('username', $data['username']);
        $this->db->bind('namauser', $data['namauser']);
        $this->db->bind('role', $data['role']);
        $this->db->bind('password', SHA1($data['password']));
        $this->db->bind('status', $data['status']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function updateData ($data)
    {
		$query = "UPDATE ".$this->table." SET 
                    nama_user =:namauser,
                    username =:username,
                    role =:role,
					status =:status 
					WHERE id_user =:id_user";

        $this->db->query($query);

        $this->db->bind('id_user', $data['id_user']);
        $this->db->bind('username', $data['username']);
        $this->db->bind('namauser', $data['namauser']);
        $this->db->bind('role', $data['role']);
        $this->db->bind('status', $data['status']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function updatePassword ($data)
    {
		$query = "UPDATE ".$this->table." SET 
					password =:password
					WHERE id_user =:id_user";

        $this->db->query($query);

        $this->db->bind('id_user', $data['id_user']);
        $this->db->bind('password', SHA1($data['password']));

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusData ($id_user)
    {
        $query = "DELETE FROM ".$this->table." WHERE id_user =:id_user";

        $this->db->query($query);

        $this->db->bind('id_user',$id_user);
        $this->db->execute();

        return $this->db->rowCount();
    }


    

}