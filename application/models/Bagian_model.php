<?php
class Bagian_model extends CI_Model{

    public function tampil_data(){
        return $this->db->get('bagian')->result_array();
    }
    public function no_otomatis()
    {
        $this->db->select('id');
        $this->db->order_by('id DESC');
        return $this->db->get('bagian')->result_array();
    }
    public function simpan()
    {
        $data=[
            "id" => $this->input->post('id'),
            "nama_bagian" => $this->input->post('nama_bagian')
        ];
        $this->db->insert('bagian',$data);
    }

    public function hapus($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('bagian');
    }
    public function get_id($id)
    {
        return $this->db->get_where('bagian',['id'=>$id])->row_array();
    }

    public function ubah()
    {
        $data=[
            "id" => $this->input->post('id'),
            "nama_bagian" => $this->input->post('nama_bagian')
        ];
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('bagian',$data);
    }
}