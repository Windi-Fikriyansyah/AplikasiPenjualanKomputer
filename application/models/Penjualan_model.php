<?php
class Penjualan_model extends CI_Model{

    public function no_otomatis()
    {
        $this->db->select('no_faktur');
        $this->db->order_by('no_faktur DESC');
        return $this->db->get('penjualan')->result_array();
    }

    function checkout($post)
	{
        $byr = $this->input->post('bayar');
        $total = $this->input->post('total');
        $kembalian = $byr-$total;
		$data = array(
						'no_faktur' => $post['nofaktur'],
						'id_user' => $post['user_id'],
						'tanggal' => $post['tgl'],
						'id_customer' => $post['nama_customer'],
						'total_harga' => $post['total'],
						'kembalian' => $kembalian,
                        'total_bayar' => $post['bayar']
					 );
		$this->db->insert('penjualan',$data);
		$cart = $this->cart->contents();
		foreach($cart as $ct) {
			$idbrg   = $ct['id'];
			$jumlah = $ct['qty'];
            $hrg   = $ct['price'];
			$subtotal = $ct['qty']*$ct['price'];
			$detail = array(
								'nofaktur' => $post['nofaktur'],
								'id_barang' => $idbrg,
								'jumlah' => $jumlah,
                                'harga' => $hrg,
                                'subtotal' => $subtotal
						   );
			$this->db->insert('detail_penjualan',$detail);
		}
	}

    public function simpan_penjualan()
    {
        $penjualan=0;
        $byr = $this->input->post('bayar');
        $total = $this->input->post('total');
        $kembalian = $byr-$total;
        $data=[
            "no_faktur" => $this->input->post('nofaktur'),
            "tanggal" => $this->input->post('tgl'),
            "id_user" => $this->input->post('user_id'),
            "id_customer" => $this->input->post('nama_customer'),
            "total_harga" => $this->input->post('total'),
            "kembalian" => $kembalian,
            "total_bayar" => $this->input->post('bayar'),
            
        ];
        $this->db->insert('penjualan',$data);
    }

    public function tampil_data(){
        return $this->db->get('v_penjualan')->result_array();
    }

    public function hapus_penjualan($id)
    {
        $this->db->where('no_faktur',$id);
        $this->db->delete('penjualan');
    }

    public function hapus_detail($id)
    {
        $this->db->where('nofaktur',$id);
        $this->db->delete('detail_penjualan');
    }

    public function get_penjualan($id)
    {
        return $this->db->get_where('v_penjualan',['no_faktur'=>$id])->row_array();
    }

    public function get_detail($id)
    {
        return $this->db->get_where('v_detail_penjualan',['nofaktur'=>$id])->result_array();
    }
}