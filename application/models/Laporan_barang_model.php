<?php
class Laporan_barang_model extends CI_Model{

    public function laporan_barang()
    {
        return $this->db->get('barang')->result_array();
    }

    public function tampil_barang(){
        return $this->db->get('barang')->num_rows();
    }

}