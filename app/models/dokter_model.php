<?php

class dokter_model {

    private $table = 'dokter';
    private $db;
    


    public function __construct ()
    {
        $this->db = new Database();
    }

    public function getDokter ()
    {
        $this->db->query ('SELECT * FROM '.$this->table.' ORDER BY nama_dokter ASC');
        return $this->db->resultSet();
    }

    public function cekTable ()
    {
        if(isset($_POST['keyword'])){
            $keyword = $_POST['keyword'];
            $query = "SELECT count(*) FROM ".$this->table." WHERE nama_dokter LIKE :keyword";
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
        $cekdata = "SELECT * FROM ".$this->table." WHERE nama_dokter = '$nama'";
        $this->db->query($cekdata);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function cekDatabyID ($data)
    {
        $cekdata = "SELECT * FROM medis WHERE id_dokter = '$data'";
        $this->db->query($cekdata);
        $this->db->execute();
        return $this->db->rowCount();
    }


    public function tambahData ($data)
    {        
        $query = "INSERT INTO ".$this->table." 
                    VALUES 
                    (:id_dokter, :nama_dokter, :spesialis, :alamat, :no_telp)";
        
        $this->db->query($query);

        $this->db->bind('id_dokter', $data['id_dokter']);
        $this->db->bind('nama_dokter', $data['nama']);
        $this->db->bind('spesialis', $data['spesialis']);
        $this->db->bind('alamat', $data['alamat']);
        $this->db->bind('no_telp', $data['notelp']);
        
        $this->db->execute();

        return $this->db->rowCount();
    }


    public function hapusData ($id_dokter)
    {
        $query = " DELETE FROM ".$this->table." WHERE id_dokter =:id_dokter ";

        $this->db->query($query);

        $this->db->bind('id_dokter',$id_dokter);
        $this->db->execute();

        return $this->db->rowCount();
    }

    
    public function getDataDokter ($id_dokter)
    {
        $this->db->query ('SELECT * FROM '. $this->table . ' WHERE id_dokter =:id_dokter'); 
        $this->db->bind ( 'id_dokter', $id_dokter );
        return $this->db->single();
    }


    public function updateData ($data)
    {
		$query = "UPDATE ".$this->table." SET 
					nama_dokter =:nama_dokter,
					spesialis =:spesialis,
					alamat =:alamat,
					no_telp =:no_telp 
					WHERE id_dokter =:id_dokter";

        $this->db->query($query);

        $this->db->bind('id_dokter', $data['id_dokter']);
        $this->db->bind('nama_dokter', $data['nama']);
        $this->db->bind('spesialis', $data['spesialis']);
        $this->db->bind('alamat', $data['alamat']);
        $this->db->bind('no_telp', $data['notelp']);

        $this->db->execute();

        return $this->db->rowCount();
    }


    public function cariDokter ()
    {
        $keyword = $_POST['keyword'];
        $query = "SELECT * FROM ".$this->table." WHERE nama_dokter LIKE :keyword";

        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");

        $this->db->execute();
        return $this->db->resultSet();
    }


    
}