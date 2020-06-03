<?php

//memangggil library UUID untuk generate ID 
// use Ramsey harus di use di luar kelas 
use Ramsey\Uuid\Uuid;


class medis_model {

    private $table = 'medis';
    private $db;


    public function __construct ()
    {
        $this->db = new Database ();
    }

    public function getMedis ()
    {
        $query = "SELECT * FROM ".$this->table.
        " JOIN poliklinik ON poliklinik.id_poli = medis.id_poli
        JOIN dokter ON dokter.id_dokter = medis.id_dokter
        JOIN pasien ON pasien.id_pasien = medis.id_pasien
        ORDER BY tgl_periksa ASC";

        $this->db->query($query);
        return $this->db->resultSet();        
    }

    public function getMedisbyID ($id_medis)
    {
        $query = "SELECT * FROM ". $this->table ." WHERE id_medis =:id_medis";
        
        $this->db->query ($query); 
        $this->db->bind ( 'id_medis', $id_medis );
        return $this->db->single();
    }

    public function getDetailObat ($id_medis)
    {        
        $query = "SELECT * FROM detail_obat
        JOIN obat ON obat.id_obat = detail_obat.id_obat 
        WHERE id_medis =:id_medis
        ORDER BY nama_obat ASC";

        $this->db->query($query);
        $this->db->bind('id_medis',$id_medis);
        return $this->db->resultSet();
    }

    public function tambahData ($data)
    {
        $id_medis = Uuid::uuid1()->toString();

        $query = "INSERT INTO ".$this->table." (id_medis, id_pasien, id_dokter, id_poli, keluhan, diagnosa, tgl_periksa, id_user)  
        VALUES
        (:id_medis, :id_pasien, :id_dokter,  :id_poli, :keluhan, :diagnosa, :tgl_periksa, :id_user)";

        $this->db->query($query);

        $this->db->bind('id_medis', $id_medis);
        $this->db->bind('id_pasien', $data['pasien']);
        $this->db->bind('id_dokter', $data['dokter']);
        $this->db->bind('id_poli', $data['poli']);
        $this->db->bind('keluhan', $data['keluhan']);
        $this->db->bind('diagnosa', $data['diagnosa']);
        $this->db->bind('tgl_periksa', $data['tanggal']);
        $this->db->bind('id_user', $data['user']);
        $this->db->execute();

        $detail_obat = $_POST['obat'];

        foreach ( $detail_obat as $obat ):
            $query_obat = "INSERT INTO detail_obat (id_medis, id_obat) VALUES (:id_medis, :id_obat) ";
            $this->db->query($query_obat);
            $this->db->bind('id_medis',$id_medis);
            $this->db->bind('id_obat',$obat);
            $this->db->execute();
        endforeach;
        

        return $this->db->rowCount();
    }

    public function updateData ($data)
    {
        $query = "UPDATE ".$this->table." SET 
                    id_pasien =:id_pasien,
                    id_dokter =:id_dokter,
                    id_poli =:id_poli,
					keluhan =:keluhan,
                    diagnosa =:diagnosa,
                    tgl_periksa =:tgl_periksa,
                    id_user =:id_user
					WHERE id_medis =:id_medis";

        $this->db->query($query);

        $this->db->bind('id_medis', $data['id_medis']);
        $this->db->bind('id_pasien', $data['pasien']);
        $this->db->bind('id_dokter', $data['dokter']);
        $this->db->bind('id_poli', $data['poli']);
        $this->db->bind('keluhan', $data['keluhan']);
        $this->db->bind('diagnosa', $data['diagnosa']);
        $this->db->bind('tgl_periksa', $data['tanggal']);
        $this->db->bind('id_user', $data['user']); 
        $this->db->execute();

        $query_hapus = "DELETE FROM detail_obat WHERE id_medis =:id_medis";
        $this->db->query($query_hapus);
        $this->db->bind('id_medis',$data['id_medis']);
        $this->db->execute();

        $detail_obat = $_POST['obat'];

        foreach ( $detail_obat as $obat ):
            $query_obat = "INSERT INTO detail_obat (id_medis, id_obat) VALUES (:id_medis, :id_obat) ";
            $this->db->query($query_obat);
            $this->db->bind('id_medis',$data['id_medis']);
            $this->db->bind('id_obat',$obat);
            $this->db->execute();
        endforeach;
        

        return $this->db->rowCount();
    }

    public function hapusData ()
    {
        $check = $_POST['checked']; 

        foreach ( $check as $id_medis ) {

            $query_hapus = "DELETE FROM detail_obat WHERE id_medis =:id_medis";
            $this->db->query($query_hapus);
            $this->db->bind('id_medis',$id_medis);
            $this->db->execute();

            $query = "DELETE FROM ".$this->table." WHERE id_medis =:id_medis";
            $this->db->query($query);
            $this->db->bind('id_medis',$id_medis);
            $this->db->execute();

        }
        
        return $this->db->rowCount();
    }




}