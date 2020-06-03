<?php

class menu_model {

    private $table = 'menu';
    private $db;  


    public function __construct ()
    {
        $this->db = new Database();
    }

    public function dataMenu ()
    {
        if(isset($_SESSION['usr'])){
            $user = $_SESSION['usr'];

            $query = "SELECT username, user_role.role, menu.id_menu, title, url FROM menu 
            join user_acces on menu.id_menu=user_acces.id_menu 
            join user_role on user_acces.id_role=user_role.id_role 
            join user on user.role=user_role.id_role 
            WHERE is_active = 1 AND username = '$user'";

            $this->db->query($query);
            return $this->db->resultSet();
        }

    }

    public function allMenu ()
    {
        $query = "SELECT * FROM ".$this->table;
        $this->db->query($query);
        return $this->db->resultSet();
    }

    public function activeMenu ()
    {
        $query = "SELECT * FROM ".$this->table." WHERE is_active = 1";
        $this->db->query($query);
        return $this->db->resultSet();
    }

    public function getMenubyID ($id_menu)
    {
        $query = "SELECT * FROM ".$this->table." WHERE id_menu =:id_menu";
        $this->db->query($query);
        $this->db->bind('id_menu', $id_menu);
        $this->db->execute();
        return $this->db->single();
    }

    public function getMenubyTitle ($title)
    {
        $query = "SELECT * FROM ".$this->table." WHERE title =:title";
        $this->db->query($query);
        $this->db->bind('title', $title);
        $this->db->execute();
        return $this->db->single();
    }
    
    public function getIDmenu ($url_menu)
    {
        $query = "SELECT * FROM ".$this->table." WHERE url =:url";
        $this->db->query($query);
        $this->db->bind('url', $url_menu);
        $this->db->execute();
        return $this->db->single();
    }


    public function cekData ($data)
    {
        $title = $data['title'];
        $cekdata = "SELECT * FROM ".$this->table." WHERE title = '$title'";
        $this->db->query($cekdata);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function cekTable ()
    {
        if( isset($_POST['keyword']) ){
            $keyword = $_POST['keyword'];
            $query = "SELECT count(*) FROM ".$this->table." WHERE title LIKE :keyword";
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

    public function tambahData ($data)
    {
        $query = "INSERT INTO ".$this->table." 
        VALUES 
        (NULL, :title, :url, :is_active)";

        $this->db->query($query);

        $this->db->bind('title', $data['title']);
        $this->db->bind('url', $data['url']);
        $this->db->bind('is_active', $data['status']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function updateData ($data)
    {
		$query = "UPDATE ".$this->table." SET 
					title =:title,
                    url =:url,
                    is_active =:is_active
					WHERE id_menu =:id_menu";

        $this->db->query($query);

        $this->db->bind('id_menu', $data['id_menu']);
        $this->db->bind('title', $data['title']);
        $this->db->bind('url', $data['url']);
        $this->db->bind('is_active', $data['status']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusData ($url)
    {
        $query = "DELETE FROM ".$this->table." WHERE url =:url";

        $this->db->query($query);

        $this->db->bind('url',$url);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function cariMenu ()
    {
        $keyword = $_POST['keyword'];
        $query = "SELECT * FROM ".$this->table." WHERE title LIKE :keyword";

        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");

        $this->db->execute();
        return $this->db->resultSet();
    }



}
