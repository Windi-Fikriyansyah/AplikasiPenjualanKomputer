<?php
class User_model extends CI_Model{

    public function tampil_data(){
        return $this->db->get('v_user')->result_array();
    }
    public function no_otomatis()
    {
        $this->db->select('id_user');
        $this->db->order_by('id_user DESC');
        return $this->db->get('user')->result_array();
    }
    public function simpan()
    {
        $data=[
            "id_user" => $this->input->post('id_user'),
            "username" => $this->input->post('username'),
            "password" => sha1($this->input->post('pass1')),
            "level" => $this->input->post('level'),
            "id_pegawai" => $this->input->post('pegawai')
        ];
        $this->db->insert('user',$data);
    }

    public function hapus($id)
    {
        $this->db->where('id_user',$id);
        $this->db->delete('user');
    }
    public function get_id($id)
    {
        return $this->db->get_where('v_user',['id_user'=>$id])->row_array();
    }

    public function usernamecek($username, $id)
    {
    $this->db->where('username =', $username);
    $this->db->where('id_user !=', $id);
    $cek = $this->db->get('user')->num_rows();
    return $cek;
}
    

    public function ubah()
    {
        $pass = $this->input->post('pass1');

        $data=[
            "username" => $this->input->post('username'),
            "level" => $this->input->post('level'),
            "id_pegawai" => $this->input->post('pegawai')
        ];

        if($pass != null) { //jika input password tidak kosong maka yang disimpan password baru
            $data=["password" => sha1($this->input->post('pass1'))];
        }
        $this->db->where('id_user', $this->input->post('id_user'));
        $this->db->update('user',$data);
    }
    
    public function ubah_profil()
    {
        $pass = $this->input->post('pass1');

        $data=[
            "username" => $this->input->post('username'),
        ];

        if($pass != null) { //jika input password tidak kosong maka yang disimpan password baru
            $data=["password" => sha1($this->input->post('pass1'))];
        }
        $this->db->where('id_user', $this->input->post('id_user'));
        $this->db->update('user',$data);
    }

    public function login($post){
    $this->db->select('*');
    $this->db->from('user');
    $this->db->where('username',$post['user_name']);
    $this->db->where('password',sha1($post['pass']));
    return $this->db->get();
}

        public function get($id = null)
//membuat 1 fungsi untuk menampilkan semua data
//dan menampilkan data per id/satu data
{
    $this->db->select('*');
    $this->db->from('user');
    if($id != null)
    {
        $this->db->where('id_user',$id);
    }
    return $this->db->get();
}
}