<?php
class Customer_model extends CI_Model{

    public function tampil_data(){
        return $this->db->get('customer')->result_array();
    }
    public function no_otomatis()
    {
        $this->db->select('id_customer');
        $this->db->order_by('id_customer DESC');
        return $this->db->get('customer')->result_array();
    }
    public function simpan()
    {
        $data=[
            "id_customer" => $this->input->post('id'),
            "nama_customer" => $this->input->post('nama'),
            "no_telp" => $this->input->post('no_telp'),
            "alamat" => $this->input->post('alamat'),
            "email" => $this->input->post('email')
        ];
        $this->db->insert('customer',$data);
    }

    public function hapus($id)
    {
        $this->db->where('id_customer',$id);
        $this->db->delete('customer');
    }
    public function get_id($id)
    {
        return $this->db->get_where('Customer',['id_customer'=>$id])->row_array();
    }

    public function ubah()
    {
        $data=[
            "id_customer" => $this->input->post('id'),
            "nama_customer" => $this->input->post('nama'),
            "no_telp" => $this->input->post('no_telp'),
            "alamat" => $this->input->post('alamat'),
            "email" => $this->input->post('email')
        ];
        $this->db->where('id_customer', $this->input->post('id'));
        $this->db->update('customer',$data);
    }

    public function get($id = null)

{
    $this->db->select('*');
    $this->db->from('customer');
    if($id != null)
    {
        $this->db->where('id_customer',$id);
    }
    return $this->db->get();
}
}