<?php
class Lap_Penjualan_model extends CI_Model{

    public function total_perhari(){
        $tgl=date('Ymd');
        $this->db->select('SUM(total_harga) as total');
        return $this->db->get_where('penjualan',['tanggal'=>$tgl])->row()->total;
    }

    public function total_perbulan(){
        $tgl=date('m');
        $this->db->select('SUM(total_harga) as total');
        $this->db->where('MONTH(tanggal)',$tgl);
        return $this->db->get('penjualan')->row()->total;
    }

    public function total($tgl_awal, $tgl_akhir){
        $this->db->select('SUM(total_harga) as total');
        $this->db->where('tanggal >=', $tgl_awal);
        $this->db->where('tanggal <=', $tgl_akhir);
        return $this->db->get('penjualan')->row()->total;
    }

    public function laporan_penjualan($tgl_mulai, $tgl_sampai)
    {
        $this->db->where('tanggal >=', $tgl_mulai);
        $this->db->where('tanggal <=', $tgl_sampai);
        return $this->db->get('v_penjualan')->result_array();
    }

    public function laporan_detail_penjualan($id)
    {
        $this->db->where('no_faktur', $id);
        return $this->db->get('v_detail_penjualan')->result_array();
    }

    public function tampil_barang(){
        return $this->db->get('v_barang')->num_rows();
    }

    public function tampil_customer(){
        return $this->db->get('customer')->num_rows();
    }
}