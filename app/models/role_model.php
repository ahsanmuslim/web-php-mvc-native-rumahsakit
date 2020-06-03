<?php

class role_model {

    private $table = 'user_role';
    private $db;  


    public function __construct ()
    {
        $this->db = new Database();
    }

    public function getRole ()
    {
        $this->db->query ('SELECT * FROM '.$this->table.' ORDER BY role ASC');
        return $this->db->resultSet();
    }

    public function cekData ($data)
	{
		$role = $data['role'];
        $cekdata = "SELECT * FROM ".$this->table." WHERE role = '$role'";
        $this->db->query($cekdata);
        $this->db->execute();
        return $this->db->rowCount();
    }
    
    public function cekDatabyID ($id_role)
    {
        $cekdata = "SELECT * FROM user WHERE role = '$id_role'";
        $this->db->query($cekdata);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function getDataRole ($id_role)
    {
        $this->db->query ('SELECT * FROM '. $this->table . ' WHERE id_role =:id_role'); 
        $this->db->bind ( 'id_role', $id_role );
        return $this->db->single();
    }

    public function countAccess ($id_role, $id_menu)
    {
        $query = "SELECT * FROM user_acces WHERE id_role =:id_role AND id_menu =:id_menu";
        $this->db->query($query);
        $this->db->bind('id_role',$id_role);
        $this->db->bind('id_menu',$id_menu);
        $this->db->execute();
        
        return $this->db->rowCount();
    }

    public function countImport ($id_role, $id_menu)
    {
        $query = "SELECT * FROM user_acces WHERE id_role =:id_role AND id_menu =:id_menu AND import_data = 1";
        $this->db->query($query);
        $this->db->bind('id_role',$id_role);
        $this->db->bind('id_menu',$id_menu);
        $this->db->execute();
        
        return $this->db->rowCount();
    }

    public function countDelete ($id_role, $id_menu)
    {
        $query = "SELECT * FROM user_acces WHERE id_role =:id_role AND id_menu =:id_menu AND delete_data = 1";
        $this->db->query($query);
        $this->db->bind('id_role',$id_role);
        $this->db->bind('id_menu',$id_menu);
        $this->db->execute();
        
        return $this->db->rowCount();
    }

    public function countCreate ($id_role, $id_menu)
    {
        $query = "SELECT * FROM user_acces WHERE id_role =:id_role AND id_menu =:id_menu  AND create_data = 1";
        $this->db->query($query);
        $this->db->bind('id_role',$id_role);
        $this->db->bind('id_menu',$id_menu);
        $this->db->execute();
        
        return $this->db->rowCount();
    }

    public function countUpdate ($id_role, $id_menu)
    {
        $query = "SELECT * FROM user_acces WHERE id_role =:id_role AND id_menu =:id_menu  AND update_data = 1";
        $this->db->query($query);
        $this->db->bind('id_role',$id_role);
        $this->db->bind('id_menu',$id_menu);
        $this->db->execute();
        
        return $this->db->rowCount();
    }


    public function updateAkses ($id_role, $id_menu, $count, $createlist, $updatelist, $deletelist, $importlist)
    {
        $hapus = "DELETE FROM user_acces WHERE id_role =:id_role";
        $this->db->query($hapus);
        $this->db->bind('id_role',$id_role);
        $this->db->execute();

        for ( $i = 0 ; $i < $count ; $i++ ){
            $query = "INSERT INTO user_acces VALUES ( NULL, :id_role, :id_menu, NULL, NULL, NULL, NULL )";
            $this->db->query($query);
            $this->db->bind('id_role',$id_role);
            $this->db->bind('id_menu',$id_menu[$i]);
            $this->db->execute();
        }

        if( !empty($createlist)){
            foreach ( $createlist as $cl ):
                $query = "UPDATE user_acces SET 
                        create_data = 1
                        WHERE id_role =:id_role AND id_menu =:id_menu";
                $this->db->query($query);
                $this->db->bind('id_role', $id_role);
                $this->db->bind('id_menu', $cl);
                $this->db->execute();
            endforeach;
        }

        if( !empty($updatelist)){
            foreach ( $updatelist as $ul ):
                $query = "UPDATE user_acces SET 
                        update_data = 1
                        WHERE id_role =:id_role AND id_menu =:id_menu";
                $this->db->query($query);
                $this->db->bind('id_role', $id_role);
                $this->db->bind('id_menu', $ul);
                $this->db->execute();
            endforeach;
        }

        if( !empty($deletelist)){
            foreach ( $deletelist as $dl ):
                $query = "UPDATE user_acces SET 
                        delete_data = 1
                        WHERE id_role =:id_role AND id_menu =:id_menu";
                $this->db->query($query);
                $this->db->bind('id_role', $id_role);
                $this->db->bind('id_menu', $dl);
                $this->db->execute();
            endforeach;
        }

        if( !empty($importlist)){
            foreach ( $importlist as $il ):
                $query = "UPDATE user_acces SET 
                        import_data = 1
                        WHERE id_role =:id_role AND id_menu =:id_menu";
                $this->db->query($query);
                $this->db->bind('id_role', $id_role);
                $this->db->bind('id_menu', $il);
                $this->db->execute();
            endforeach;
        }
        
        return $this->db->rowCount();
    }
    
	public function tambahData ($data)
	{
        $query = "INSERT INTO ".$this->table." VALUES ( NULL, :role )";
        
        $this->db->query($query);
        $this->db->bind('role', $data['role']);        
        $this->db->execute();

        return $this->db->rowCount();
    }
    
    public function hapusData ($id_role)
	{
		$query = " DELETE FROM ".$this->table." WHERE id_role =:id_role ";

        $this->db->query($query);

        $this->db->bind('id_role',$id_role);
        $this->db->execute();

        return $this->db->rowCount();
    }
    
	public function updateData ($data)
	{
		$query = "UPDATE ".$this->table." SET 
					role =:role
					WHERE id_role =:id_role";

        $this->db->query($query);
        $this->db->bind('id_role', $data['id_role']);
        $this->db->bind('role', $data['role']);
        $this->db->execute();

        return $this->db->rowCount();
	}









}