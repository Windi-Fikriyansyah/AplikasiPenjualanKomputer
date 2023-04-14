<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {

    public function __construct(){
        parent::__construct();
        cek_not_login();
        cek_asisten();
        $this->load->model(['Barang_model']);
    }
    public function index(){
    $data['judul']="Data Barang";

        $data['barang']=$this->Barang_model->tampil_data();
        
        $this->load->view('templates/header',$data);
        $this->load->view('barang/index',$data);
        $this->load->view('templates/footer');
    }
    public function tambah()
    {
        $data['judul']="barang";
        $data['barang'] = $this->Barang_model->tampil_data();
        $tampil= $this->Barang_model->no_otomatis();
        if(empty($tampil[0]['id_barang']))
        {
            $no = "BRGJ" . "001";
        } else{
            $a= "BRGJ";
            $urut = $tampil[0]['id_barang'];
            $no_1 = substr($urut, 4, 3 );
            $hasil = ((int) $no_1) + 1;
            $hasil_2 = sprintf('%03s', $hasil);
            $no = $a . $hasil_2;
        }
        $data['no_otomatis'] = $no;

        $this->form_validation->set_rules('nama_barang','Nama barang','required|trim');
        $this->form_validation->set_rules('harga','harga','required|trim|numeric');
        $this->form_validation->set_rules('keterangan','Keterangan','required|trim');


        if ($this->form_validation->run() == FALSE){
            
        $this->load->view('templates/header',$data);
        $this->load->view('barang/tambah',$data);
        $this->load->view('templates/footer');

        }else{
            $this->Barang_model->simpan();
            redirect('barang');
        }

    }

    public function hapus()
    {
        $id = $this->input->post('id_barang');
        $this->Barang_model->hapus($id);
        $pesan="Data berhasil dihapus";
        $url = base_url('barang');
        echo "<script>
            alert('$pesan');
            location='$url';
        </script>";
    }

    public function ubah($id)
    {
        $data['judul']="barang";
        $barang = $this->Barang_model->get_id($id);

        $data['ubah_barang'] = $this->Barang_model->get_id($id);

        $this->form_validation->set_rules('nama_barang','nama barang','required|trim');
        $this->form_validation->set_rules('harga','Harga','required|trim|numeric');
        $this->form_validation->set_rules('keterangan','Keterangan','required|trim');
        if($this->form_validation->run() == FALSE)
        {
            if($barang > 0){
                $data['ubah_barang'] = $this->Barang_model->get_id($id);
        $this->load->view('templates/header',$data);
        $this->load->view('barang/ubah',$data);
        $this->load->view('templates/footer');
        }else {
            $pesan="Data tidak ditemukan";
        $url = base_url('barang');
        echo "<script>
            alert('$pesan');
            location='$url';
        </script>";
        }
    }else{
            $this->Barang_model->ubah();
            $pesan="Data berhasil diupdate";
        $url = base_url('barang');
        echo "<script>
            alert('$pesan');
            location='$url';
        </script>";
        }
    }
    }
