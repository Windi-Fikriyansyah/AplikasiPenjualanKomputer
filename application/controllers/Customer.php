<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {

    public function __construct(){
        parent::__construct();
        cek_not_login();
        cek_asisten();
        $this->load->model('Customer_model');
    }
    public function index(){
    $data['judul']="Data Customer";

        $data['customer']=$this->Customer_model->tampil_data();

        $this->load->view('templates/header',$data);
        $this->load->view('customer/index',$data);
        $this->load->view('templates/footer');
    }
    public function tambah()
    {
        $data['judul']="customer";

        $tampil= $this->Customer_model->no_otomatis();
        if(empty($tampil[0]['id_customer']))
        {
            $no = "CS" . "001";
        } else{
            $a= "CS";
            $urut = $tampil[0]['id_customer'];
            $no_1 = substr($urut, 2, 3 );
            $hasil = ((int) $no_1) + 1;
            $hasil_2 = sprintf('%03s', $hasil);
            $no = $a . $hasil_2;
        }
        $data['no_otomatis'] = $no;

        $this->form_validation->set_rules('nama','Nama customer','required|trim');
        $this->form_validation->set_rules('alamat','alamat','required|trim');
        $this->form_validation->set_rules('no_telp','no_telp','required|trim|numeric');
        $this->form_validation->set_rules('email','email','required|trim');

        if ($this->form_validation->run() == FALSE){
            
        $this->load->view('templates/header',$data);
        $this->load->view('customer/tambah',$data);
        $this->load->view('templates/footer');

        }else{
            $this->Customer_model->simpan();
            redirect('customer');
        }
    }

    public function hapus()
    {
        $id = $this->input->post('id');
        $this->Customer_model->hapus($id);
        $pesan="Data berhasil dihapus";
        $url = base_url('Customer');
        echo "<script>
            alert('$pesan');
            location='$url';
        </script>";
    }

    public function ubah($id)
    {
        $data['judul']="Customer";
        $customer = $this->Customer_model->get_id($id);
        $data['ubah_customer'] = $this->Customer_model->get_id($id);
        $this->form_validation->set_rules('id','Id Customer','required|trim');
        $this->form_validation->set_rules('nama','nama','required|trim');
        $this->form_validation->set_rules('alamat','alamat','required|trim');
        $this->form_validation->set_rules('no_telp','no_telp','required|trim|numeric');
        $this->form_validation->set_rules('email','email','required|trim');
        if($this->form_validation->run() == FALSE)
        {
            if($customer > 0){
                $data['ubah_customer'] = $this->Customer_model->get_id($id);
        $this->load->view('templates/header',$data);
        $this->load->view('customer/ubah',$data);
        $this->load->view('templates/footer');
    }else {
        $pesan="Data tidak ditemukan";
    $url = base_url('customer');
    echo "<script>
        alert('$pesan');
        location='$url';
    </script>";
    }
        
    }else{
            $this->Customer_model->ubah();
            $pesan="Data berhasil diupdate";
        $url = base_url('customer');
        echo "<script>
            alert('$pesan');
            location='$url';
        </script>";
        }
    }
    }
