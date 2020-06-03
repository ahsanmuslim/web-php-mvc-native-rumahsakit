<?php


class obat_model {

    private $table = 'obat';
    private $db;
    


    public function __construct ()
    {
        $this->db = new Database();
    }


	public function getObat ()
	{
		$query = "SELECT * FROM ".$this->table;

		$this->db->query($query);
		return $this->db->resultSet();
	}


	public function cekData ($data)
	{
		$nama = $data['nama'];
        $cekdata = "SELECT * FROM ".$this->table." WHERE nama_obat = '$nama'";
        $this->db->query($cekdata);
        $this->db->execute();
        return $this->db->rowCount();
	}


	public function cekTable ()
	{
		if(isset($_POST['keyword'])){
            $keyword = $_POST['keyword'];
            $query = "SELECT count(*) FROM ".$this->table." WHERE nama_obat LIKE :keyword";
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

    public function cekDatabyID ($id_obat)
    {
        $cekdata = "SELECT * FROM detail_obat WHERE id_obat =:id_obat";
        $this->db->query($cekdata);
        $this->db->bind('id_obat', $id_obat);
        $this->db->execute();
        return $this->db->rowCount();
    }



	public function tambahData ($data)
	{
        $query = "INSERT INTO ".$this->table." 
            VALUES 
            (:id_obat, :nama_obat, :ket_obat, :stok, :unit)";
        
        $this->db->query($query);

        $this->db->bind('id_obat', $data['id_obat']);
        $this->db->bind('nama_obat', $data['nama_obat']);
        $this->db->bind('ket_obat', $data['ket_obat']);
        $this->db->bind('stok', $data['stok']);
        $this->db->bind('unit', $data['unit']);
        
        $this->db->execute();

        return $this->db->rowCount();
	}


	public function hapusData ($id_obat)
	{
		$query = " DELETE FROM ".$this->table." WHERE id_obat =:id_obat ";

        $this->db->query($query);

        $this->db->bind('id_obat',$id_obat);
        $this->db->execute();

        return $this->db->rowCount();
	}


    public function getDataObat ($id_obat)
    {
        $this->db->query ('SELECT * FROM '. $this->table . ' WHERE id_obat =:id_obat'); 
        $this->db->bind ( 'id_obat', $id_obat );
        return $this->db->single();
    }

	public function updateData ($data)
	{
		$query = "UPDATE ".$this->table." SET 
					nama_obat =:nama_obat,
                    ket_obat =:ket_obat,
                    stok =:stok,
                    unit =:unit
					WHERE id_obat =:id_obat";

        $this->db->query($query);

        $this->db->bind('id_obat', $data['id_obat']);
        $this->db->bind('nama_obat', $data['nama_obat']);
        $this->db->bind('ket_obat', $data['ket_obat']);
        $this->db->bind('stok', $data['stok']);
        $this->db->bind('unit', $data['unit']);

        $this->db->execute();

        return $this->db->rowCount();
	}


	public function cariObat ()
	{
		$keyword = $_POST['keyword'];
        $query = "SELECT * FROM ".$this->table." WHERE nama_obat LIKE :keyword";

        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");

        $this->db->execute();
        return $this->db->resultSet();
	}


}