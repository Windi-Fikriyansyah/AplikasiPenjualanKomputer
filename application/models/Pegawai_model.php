<?php
class Pegawai_model extends CI_Model{

    public function tampil_data(){
        return $this->db->get('v_pegawai')->result_array();
    }
    public function no_otomatis()
    {
        $this->db->select('id_pegawai');
        $this->db->order_by('id_pegawai DESC');
        return $this->db->get('pegawai')->result_array();
    }
    public function simpan()
    {
        $data=[
            "id_pegawai" => $this->input->post('id'),
            "nama" => $this->input->post('nama'),
            "alamat" => $this->input->post('alamat'),
            "no_telp" => $this->input->post('no_telp'),
            "id_bagian" => $this->input->post('bagian')
        ];
        $this->db->insert('pegawai',$data);
    }

    public function hapus($id)
    {
        $this->db->where('id_pegawai',$id);
        $this->db->delete('pegawai');
    }
    public function get_id($id)
    {
        return $this->db->get_where('Pegawai',['id_pegawai'=>$id])->row_array();
    }

    public function ubah()
    {
        $data=[
            "id_pegawai" => $this->input->post('id'),
            "nama" => $this->input->post('nama'),
            "alamat" => $this->input->post('alamat'),
            "no_telp" => $this->input->post('no_telp'),
            "id_bagian" => $this->input->post('bagian')
        ];
        $this->db->where('id_pegawai', $this->input->post('id'));
        $this->db->update('pegawai',$data);
    }

    public function get($id = null)

{
    $this->db->select('*');
    $this->db->from('pegawai');
    if($id != null)
    {
        $this->db->where('id_pegawai',$id);
    }
    return $this->db->get();
}
}