<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends CI_Controller {

    public function __construct(){
        parent::__construct();
        cek_not_login();
       cek_asisten();
        $this->load->model(['Pegawai_model','Bagian_model']);
    }
    public function index(){
    $data['judul']="Data Pegawai";

        $data['pegawai']=$this->Pegawai_model->tampil_data();

        $this->load->view('templates/header',$data);
        $this->load->view('pegawai/index',$data);
        $this->load->view('templates/footer');
    }
    public function tambah()
    {
        $data['judul']="pegawai";

        
        $data['bagian'] = $this->Bagian_model->tampil_data();

        $tampil= $this->Pegawai_model->no_otomatis();
        if(empty($tampil[0]['id_pegawai']))
        {
            $no = "PG" . "001";
        } else{
            $a= "PG";
            $urut = $tampil[0]['id_pegawai'];
            $no_1 = substr($urut, 2, 3 );
            $hasil = ((int) $no_1) + 1;
            $hasil_2 = sprintf('%03s', $hasil);
            $no = $a . $hasil_2;
        }
        $data['no_otomatis'] = $no;

        $this->form_validation->set_rules('nama','Nama Pegawai','required|trim');
        $this->form_validation->set_rules('alamat','alamat','required|trim');
        $this->form_validation->set_rules('no_telp','no_telp','required|trim|numeric');

        if ($this->form_validation->run() == FALSE){
            
        $this->load->view('templates/header',$data);
        $this->load->view('pegawai/tambah',$data);
        $this->load->view('templates/footer');

        }else{
            $this->Pegawai_model->simpan();
            redirect('pegawai');
        }
    }

    public function hapus()
    {
        $id = $this->input->post('id_pegawai');
        $this->Pegawai_model->hapus($id);
        $pesan="Data berhasil dihapus";
        $url = base_url('Pegawai');
        echo "<script>
            alert('$pesan');
            location='$url';
        </script>";
    }

    public function ubah($id)
    {
        $data['judul']="pegawai";
        $pegawai = $this->Pegawai_model->get_id($id);

        $data['ubah_pegawai'] = $this->Pegawai_model->get_id($id);

        $data['bagian'] = $this->Bagian_model->tampil_data();

        $this->form_validation->set_rules('id','Id Pegawai','required|trim');
        $this->form_validation->set_rules('nama','nama','required|trim');
        $this->form_validation->set_rules('alamat','alamat','required|trim');
        $this->form_validation->set_rules('no_telp','no_telp','required|trim|numeric');
        if($this->form_validation->run() == FALSE)
        {
            if($pegawai > 0){
                $data['ubah_pegawai'] = $this->Pegawai_model->get_id($id);
        $this->load->view('templates/header',$data);
        $this->load->view('pegawai/ubah',$data);
        $this->load->view('templates/footer');
    }else {
        $pesan="Data tidak ditemukan";
    $url = base_url('pegawai');
    echo "<script>
        alert('$pesan');
        location='$url';
    </script>";
    }
        }else{
            $this->Pegawai_model->ubah();
            $pesan="Data berhasil diupdate";
        $url = base_url('pegawai');
        echo "<script>
            alert('$pesan');
            location='$url';
        </script>";
        }
    }
    }
