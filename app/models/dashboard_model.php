<?php

class dashboard_model {

    private $db;

    public function __construct ()
    {
        $this->db = new Database();
    }

    public function grafikPoli ()
    {
        $query = "SELECT poliklinik.nama_poli, COUNT(id_pasien) as jml_pasien from poliklinik left join medis using(id_poli) group by nama_poli";

        $this->db->query($query);
        return $this->db->resultSet();  
    }

    public function grafikDokter ()
    {
        $query = "SELECT dokter.nama_dokter, count(id_pasien) as jml_pasien FROM dokter LEFT JOIN medis USING(id_dokter) group by nama_dokter
        ";

        $this->db->query($query);
        return $this->db->resultSet();  
    }
    
    public function grafikHarian ()
    {
        $query = "select medis.tgl_periksa, count(id_medis) as total from medis group by tgl_periksa";

        $this->db->query($query);
        return $this->db->resultSet();  
    }

    public function grafikUser ()
    {
        $query = "SELECT user.nama_user, count(id_medis) as transaksi FROM user LEFT JOIN medis USING(id_user) group by nama_user
        ";

        $this->db->query($query);
        return $this->db->resultSet();  
    }
    
    public function grafikObat ()
    {
        $query = "SELECT nama_obat, stok FROM obat ORDER BY nama_obat";

        $this->db->query($query);
        return $this->db->resultSet();  
    }
    

    




    


}