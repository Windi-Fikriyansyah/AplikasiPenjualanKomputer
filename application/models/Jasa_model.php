<?php
class Jasa_model extends CI_Model{

    public function tampil_data(){
        return $this->db->get('jasa')->result_array();
    }
    public function no_otomatis()
    {
        $this->db->select('id_jasa');
        $this->db->order_by('id_jasa DESC');
        return $this->db->get('jasa')->result_array();
    }
    public function simpan()
    {
        $data=[
            "id_jasa" => $this->input->post('id_jasa'),
            "nama_jasa" => $this->input->post('nama_jasa')
        ];
        $this->db->insert('jasa',$data);
    }

    public function hapus($id)
    {
        $this->db->where('id_jasa',$id);
        $this->db->delete('jasa');
    }
    public function get_id($id)
    {
        return $this->db->get_where('jasa',['id_jasa'=>$id])->row_array();
    }

    public function ubah()
    {
        $data=[
            "id_jasa" => $this->input->post('id_jasa'),
            "nama_jasa" => $this->input->post('nama_jasa')
        ];
        $this->db->where('id_jasa', $this->input->post('id_jasa'));
        $this->db->update('jasa',$data);
    }
}