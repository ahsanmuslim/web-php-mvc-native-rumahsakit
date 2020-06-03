<?php

//memangggil library UUID untuk generate ID 
// use Ramsey harus di use di luar kelas 
use Ramsey\Uuid\Uuid;


class poli_model {

    private $table = 'poliklinik';
    private $db;


    public function __construct (){
        $this->db = new Database ();        
    }

    public function getPoli ()
    {
        $query = "SELECT * FROM ".$this->table." ORDER BY nama_poli ASC";
        $this->db->query($query);
        return $this->db->resultSet();
    }


    public function getPolibyID ()
    {
        foreach ($_POST['checked'] as $id_poli):
            $id_poliArray[] = $id_poli;
        endforeach;
        $id_poli = implode ("','", $id_poliArray);

        $query = "SELECT * FROM ".$this->table." WHERE id_poli IN ('$id_poli')";
        $this->db->query ($query);
        $this->db->bind ( 'id_poli', $id_poli );        
        return $this->db->resultSet(); 
    }


    public function cekTable ()
    {
        if(isset($_POST['keyword'])){
            $keyword = $_POST['keyword'];
            $query = "SELECT count(*) FROM ".$this->table." WHERE nama_poli LIKE :keyword";
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

    public function cekData ($data)
    {
        $nama = $data['nama'];
        $cekdata = "SELECT * FROM ".$this->table." WHERE nama_poli = '$nama'";
        $this->db->query($cekdata);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function cekDatabyID ($data)
    {
        foreach ($_POST['checked'] as $id_poli):
            $id_poliArray[] = $id_poli;
        endforeach;
        $id_poli = implode ("','", $id_poliArray);

        $query = "SELECT * FROM medis WHERE id_poli IN ('$id_poli')";
        $this->db->query ($query);
        $this->db->bind ( 'id_poli', $id_poli ); 
        $this->db->execute();
        return $this->db->rowCount();
    }




    public function cariPoli ()
    {
        $keyword = $_POST['keyword'];
        $query = "SELECT * FROM ".$this->table." WHERE nama_poli LIKE :keyword";

        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");

        $this->db->execute();
        return $this->db->resultSet();
    }


    public function tambahData ($data)
    {
        $query = "INSERT INTO ".$this->table." 
        VALUES 
        (:id_poli, :nama_poli, :gedung)";

        $totaldata = $_POST['totaldata'];

        for ($i=1 ; $i <= $totaldata ; $i++){

            $this->db->query($query);

            $uuid1 = Uuid::uuid1()->toString();

            $this->db->bind('id_poli', $uuid1);
            $this->db->bind('nama_poli', $data['namapoli-'.$i]);
            $this->db->bind('gedung', $data['gedung-'.$i]);

            $this->db->execute();

        }  

        return $this->db->rowCount(); 
    }


    public function updateData ($data)
    {
        $query = "UPDATE ".$this->table." SET 
					nama_poli =:nama_poli,
                    gedung =:gedung
					WHERE id_poli =:id_poli";

        $totaldata = $_POST['totaldata'];
        
        for ($i=0 ; $i < $totaldata ; $i++){
            $this->db->query($query);
            
            $this->db->bind('id_poli', $data['id_poli'][$i]);
            $this->db->bind('nama_poli', $data['nama_poli'][$i]);
            $this->db->bind('gedung', $data['gedung'][$i]);

            $this->db->execute();
        }

        return $this->db->rowCount();
    }

    public function hapusData ()
    {
        $check = $_POST['checked']; 

        foreach ( $check as $id_poli ) {

            $query = "DELETE FROM ".$this->table." WHERE id_poli =:id_poli";
            $this->db->query($query);
            $this->db->bind('id_poli',$id_poli);
            $this->db->execute();

        }
        
        return $this->db->rowCount();
    }



}