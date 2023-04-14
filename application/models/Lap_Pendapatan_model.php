<?php
class Lap_Pendapatan_model extends CI_Model{

    public function total_perhari(){
        $tgl=date('Ymd');
        $this->db->select('SUM(total_harga) as total');
        return $this->db->get_where('transaksi_jasa',['tanggal'=>$tgl])->row()->total;
    }

    public function total_perbulan(){
        $tgl=date('m');
        $this->db->select('SUM(total_harga) as total');
        $this->db->where('MONTH(tanggal)',$tgl);
        return $this->db->get('transaksi_jasa')->row()->total;
    }

    public function total($tgl_awal, $tgl_akhir){
        $this->db->select('SUM(total_harga) as total');
        $this->db->where('tanggal >=', $tgl_awal);
        $this->db->where('tanggal <=', $tgl_akhir);
        return $this->db->get('transaksi_jasa')->row()->total;
    }

    public function laporan_pendapatan($tgl_mulai, $tgl_sampai)
    {
        $this->db->where('tanggal >=', $tgl_mulai);
        $this->db->where('tanggal <=', $tgl_sampai);
        return $this->db->get('v_transaksi_jasa')->result_array();
    }

    public function laporan_detail_jasa($id)
    {
        $this->db->where('no_faktur', $id);
        return $this->db->get('v_detail_jasa')->result_array();
    }

    public function tampil_jasa(){
        return $this->db->get('v_jasa')->num_rows();
    }

    public function tampil_customer(){
        return $this->db->get('customer')->num_rows();
    }
}