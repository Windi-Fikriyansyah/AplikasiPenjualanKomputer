<?php
//untuk menampilkan data user berdasarkan id session\
Class Fungsi{
    protected $ci;

    function __construct()
    {
        $this->ci =& get_instance();
    }

    function user_login()
    {
        $this->ci->load->model('User_model');
        $id = $this->ci->session->userdata('id_user');
        $user_data = $this->ci->User_model->get($id)->row();
        return $user_data;

    }

    public function count_user() 
    {
        $this->ci->load->model('User_model');
        return $this->ci->User_model->get()->num_rows();
    }
    public function count_customer() 
    {
        $this->ci->load->model('Customer_model');
        return $this->ci->Customer_model->get()->num_rows();
    }
    public function count_pegawai() 
    {
        $this->ci->load->model('Pegawai_model');
        return $this->ci->Pegawai_model->get()->num_rows();
    }
    public function count_barang() 
    {
        $this->ci->load->model('Barang_model');
        return $this->ci->Barang_model->get()->num_rows();
    }
}