<?php

//memangggil library UUID untuk generate ID 
// use Ramsey harus di use di luar kelas 
use Ramsey\Uuid\Uuid;

class pasien_model {

    private $db;
    private $table = 'pasien';



    public function __construct ()
    {
        $this->db = new Database ();
    }

    public function getPasien ()
    {
        $query = "SELECT * FROM ".$this->table." ORDER BY nama_pasien ASC";
        $this->db->query($query);
        return $this->db->resultSet();
    }

    public function getPasienbyId ($id_pasien)
    {
        $this->db->query ('SELECT * FROM '. $this->table . ' WHERE id_pasien =:id_pasien'); 
        $this->db->bind ( 'id_pasien', $id_pasien );
        return $this->db->single();
    }

    public function cekTable ()
    {
        if( isset($_POST['keyword']) ){
            $keyword = $_POST['keyword'];
            $query = "SELECT count(*) FROM ".$this->table." WHERE nama_pasien LIKE :keyword";
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
        $noidentitas = $data['noidentitas'];
        $cekdata = "SELECT * FROM ".$this->table." WHERE nomor_identitas = '$noidentitas'";
        $this->db->query($cekdata);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function cekDatabyID ($id_pasien)
    {
        $cekdata = "SELECT * FROM medis WHERE id_pasien = '$id_pasien'";
        $this->db->query($cekdata);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function tambahData ($data)
    {
        $query = "INSERT INTO ".$this->table." 
        VALUES 
        (:id_pasien, :namapasien, :noidentitas,  :jeniskelamin, :alamat, :no_telp)";

        $this->db->query($query);

        $this->db->bind('id_pasien', $data['id_pasien']);
        $this->db->bind('noidentitas', $data['noidentitas']);
        $this->db->bind('namapasien', $data['namapasien']);
        $this->db->bind('jeniskelamin', $data['jk']);
        $this->db->bind('alamat', $data['alamat']);
        $this->db->bind('no_telp', $data['notelp']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function updateData ($data)
    {
		$query = "UPDATE ".$this->table." SET 
					nama_pasien =:nama_pasien,
                    nomor_identitas =:nomor_identitas,
                    jenis_kelamin =:jenis_kelamin,
					alamat =:alamat,
					no_telp =:no_telp 
					WHERE id_pasien =:id_pasien";

        $this->db->query($query);

        $this->db->bind('id_pasien', $data['id_pasien']);
        $this->db->bind('nama_pasien', $data['namapasien']);
        $this->db->bind('nomor_identitas', $data['noidentitas']);
        $this->db->bind('jenis_kelamin', $data['jk']);
        $this->db->bind('alamat', $data['alamat']);
        $this->db->bind('no_telp', $data['notelp']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusData ($id_pasien)
    {
        $query = "DELETE FROM ".$this->table." WHERE id_pasien =:id_pasien";

        $this->db->query($query);

        $this->db->bind('id_pasien',$id_pasien);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function cariPasien ()
    {
        $keyword = $_POST['keyword'];
        $query = "SELECT * FROM ".$this->table." WHERE nama_pasien LIKE :keyword";

        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");

        $this->db->execute();
        return $this->db->resultSet();
    }

    public function importData ()
    {

        $file           = basename($_FILES['file_import']['name']);
        $ekstensi       = explode(".",$file);
        $file_name      = "file-".round(microtime(true)).".".end($ekstensi);
        $sumber_file    = $_FILES['file_import']['tmp_name'];

        //masuk ke folder file tempfile dari file index.php
        $target_dir     = "file/";
        $target_file    = $target_dir.$file_name;
        $upload         = move_uploaded_file($sumber_file, $target_file);

        $objek          = PHPExcel_IOFactory::load($target_file);
        $all_data       = $objek->getActiveSheet()->toArray(null,true,true,true);

        $query_data = "INSERT INTO pasien (id_pasien, nama_pasien, nomor_identitas, jenis_kelamin, alamat, no_telp) VALUES ";

        for ($i=3 ; $i <= count($all_data) ; $i++){
            $uuid1          = Uuid::uuid1()->toString();
            $noidentitas    = $all_data [$i]['A'];
            $nama_pasien    = $all_data [$i]['B'];
            $jeniskelamin  = $all_data [$i]['C'];
            $alamat         = $all_data [$i]['D'];
            $no_telp        = $all_data [$i]['E'];

            $query_data .= "('$uuid1', '$nama_pasien', '$noidentitas', '$jeniskelamin', '$alamat', '$no_telp'),";
        }

        $query_data = substr ($query_data, 0, -1);

        $this->db->query($query_data);
        $this->db->execute();
        unlink($target_file);

        return $this->db->rowCount();


    }

}   