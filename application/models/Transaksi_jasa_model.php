<?php
class Transaksi_jasa_model extends CI_Model{

    public function no_otomatis()
    {
        $this->db->select('no_faktur');
        $this->db->order_by('no_faktur DESC');
        return $this->db->get('transaksi_jasa')->result_array();
    }

    public function simpan_keranjang()
    {
        $harga=$this->input->post('harga');
        $subtotal = $harga * $jumlah;
        $data=[
            "id_jasa"=> $this->input->post('id_jasa'),
            "jasa"=> $this->input->post('jasa'),
            "harga"=> $this->input->post('harga'),
            "user_id" => $this->input->post('id_user')
        ];
        $this->db->insert('keranjang_jasa',$data);
    }

    public function tampil_keranjang($id)
    {
        return $this->db->get_where('keranjang_jasa',['user_id'=>$id])->result_array();
    }

    public function hapus_keranjang($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('keranjang_jasa');
    }

    public function tampil_total($id){
        $this->db->select('SUM(harga) as total');
        return $this->db->get_where('keranjang_jasa',['user_id=>$id'])->row()->total;
    }

    public function hapus_id(){
        $id=$this->fungsi->user_login()->id_user;
        $this->db->where('user_id',$id);
        $this->db->delete('keranjang_jasa');
    }
    public function simpan_transaksi_jasa()
    {
        $transaksi_jasa=0;
        $byr = $this->input->post('bayar');
        $total = $this->input->post('total');
        $kembalian = $byr-$total;
        $data=[
            "no_faktur" => $this->input->post('nofaktur'),
            "tanggal" => $this->input->post('tgl'),
            "id_pegawai" => $this->input->post('pegawai'),
            "id_user" => $this->input->post('user_id'),
            "id_customer" => $this->input->post('nama_customer'),
            "status" => $this->input->post('status'),
            "total_harga" => $this->input->post('total'),
            "total_bayar" => $this->input->post('bayar'),
            "kembalian" => $kembalian,
            
        ];
        $this->db->insert('transaksi_jasa',$data);
    }

    public function tampil_data(){
        return $this->db->get('v_transaksi_jasa')->result_array();
    }

    public function hapus_transaksi_jasa($id)
    {
        $this->db->where('no_faktur',$id);
        $this->db->delete('transaksi_jasa');
    }

    public function hapus_detail($id)
    {
        $this->db->where('no_faktur',$id);
        $this->db->delete('detail_jasa');
    }

    public function get_transaksi_jasa($id)
    {
        return $this->db->get_where('v_transaksi_jasa',['no_faktur'=>$id])->row_array();
    }

    public function get_detail($id)
    {
        return $this->db->get_where('v_detail_jasa',['no_faktur'=>$id])->result_array();
    }
}