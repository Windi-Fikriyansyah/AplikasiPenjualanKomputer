<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function login(){
        cek_login();
        $this->load->view('login');
    }

    public function proses()
    {
        $post = $this->input->post(null,TRUE);
        if (isset($post['masuk']))
        {
            $this->load->model('User_model');
            $query = $this->User_model->login($post);
            if($query->num_rows() > 0)
            {
                $row = $query->row();
                $params = array(
                    'id_user' => $row->id_user,
                    'level' => $row->level
                );
                $this->session->set_userdata($params);
                $pesan="Anda Berhasil Login";
            $url = base_url('home');
            echo "<script> 
                alert('$pesan');
                location='$url';
            </script>";
            }else{
                $pesan="Username dan Password Salah";
            $url = base_url('auth/login');
            echo "<script> 
                alert('$pesan');
                location='$url';
            </script>";
            }
        }
}
    public function logout()
    {
        $params = array('id_user','level');
        $this->session->unset_userdata($params);
        redirect('auth/login');
    }
    
}