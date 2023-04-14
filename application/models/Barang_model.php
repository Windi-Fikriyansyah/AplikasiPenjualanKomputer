<?php
class Barang_model extends CI_Model{

    function caribarang($idbrg)
	{
		$this->db->where('id_barang', $idbrg);
		return $this->db->get('barang')->row_array();
		//konversi ke  dimensi 1
	}

    public function tampil_data(){
        return $this->db->get('barang')->result_array();
    }
    
    public function no_otomatis()
    {
        $this->db->select('id_barang');
        $this->db->order_by('id_barang DESC');
        return $this->db->get('barang')->result_array();
    }

    public function simpan()
    {
        $data=[
            "id_barang" => $this->input->post('id_barang'),
            "nama_barang" => $this->input->post('nama_barang'),
            "harga" => $this->input->post('harga'),
            "keterangan" => $this->input->post('keterangan')
        ];
        $this->db->insert('barang',$data);
    }

    public function hapus($id)
    {
        $this->db->where('id_barang',$id);
        $this->db->delete('barang');
    }
    public function get_id($id)
    {
        return $this->db->get_where('barang',['id_barang'=>$id])->row_array();
    }

    public function ubah()
    {
        $data=[
            "nama_barang" => $this->input->post('nama_barang'),
            "harga" => $this->input->post('harga'),
            "keterangan" => $this->input->post('keterangan')
        ];
        $this->db->where('id_barang', $this->input->post('id_barang'));
        $this->db->update('barang',$data);
    }

    public function get($id = null)

{
    $this->db->select('*');
    $this->db->from('barang');
    if($id != null)
    {
        $this->db->where('id_barang',$id);
    }
    return $this->db->get();
}
}