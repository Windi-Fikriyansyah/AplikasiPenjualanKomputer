<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bagian extends CI_Controller {

    public function __construct(){
        parent::__construct();
        cek_not_login();
        cek_asisten();
        $this->load->model('Bagian_model');
    }
    public function index(){
    $data['judul']="Bagian";

        $data['bagian']=$this->Bagian_model->tampil_data();

        $this->load->view('templates/header',$data);
        $this->load->view('bagian/index',$data);
        $this->load->view('templates/footer');
    }
    public function tambah()
    {
        $data['judul']="bagian";
        $data['bagian'] = $this->Bagian_model->tampil_data();
        $tampil= $this->Bagian_model->no_otomatis();
        if(empty($tampil[0]['id']))
        {
            $no = "BG" . "001";
        } else{
            $a= "BG";
            $urut = $tampil[0]['id'];
            $no_1 = substr($urut, 2, 3 );
            $hasil = ((int) $no_1) + 1;
            $hasil_2 = sprintf('%03s', $hasil);
            $no = $a . $hasil_2;
        }
        $data['no_otomatis'] = $no;

        $this->form_validation->set_rules('id','id','required|trim');
        $this->form_validation->set_rules('nama_bagian','Nama Bagian','required|trim');

        if ($this->form_validation->run() == FALSE){
            
        $this->load->view('templates/header',$data);
        $this->load->view('bagian/tambah',$data);
        $this->load->view('templates/footer');

        }else{
            $this->Bagian_model->simpan();
            redirect('bagian');
        }
    }

    public function hapus()
    {
        $id = $this->input->post('id');
        $this->Bagian_model->hapus($id);
        $pesan="Data berhasil dihapus";
        $url = base_url('Bagian');
        echo "<script>
            alert('$pesan');
            location='$url';
        </script>";
    }

    public function ubah($id)
    {
        $data['judul']="Bagian";
        $bagian = $this->Bagian_model->get_id($id);

        $data['ubah_bagian'] = $this->Bagian_model->get_id($id);
        $this->form_validation->set_rules('id','id','required|trim');
        $this->form_validation->set_rules('nama_bagian','Nama Bagian','required|trim');
        if($this->form_validation->run() == FALSE)
        {
            if($bagian > 0){
                $data['ubah_bagian'] = $this->Bagian_model->get_id($id);
        $this->load->view('templates/header',$data);
        $this->load->view('bagian/ubah',$data);
        $this->load->view('templates/footer');
        
    }else {
        $pesan="Data tidak ditemukan";
    $url = base_url('bagian');
    echo "<script>
        alert('$pesan');
        location='$url';
    </script>";
    }

}else{
            $this->Bagian_model->ubah();
            $pesan="Data berhasil diupdate";
        $url = base_url('bagian');
        echo "<script>
            alert('$pesan');
            location='$url';
        </script>";
        }
    }
    }
