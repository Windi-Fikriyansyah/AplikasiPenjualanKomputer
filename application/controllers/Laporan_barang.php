<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_barang extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
        // cek_not_login();
        $this->load->model(['Laporan_barang_model','Barang_model']);
    }

    public function index()
    {
        $data['judul']="Laporan Barang";
        $data['laporan_barang'] = $this->Laporan_barang_model->laporan_barang();
        $this->load->view('templates/header',$data);
        $this->load->view('laporan_barang/index');
        $this->load->view('templates/footer');
    }

    public function laporan_barang()
    {
        $data['judul']="Laporan barang";

        $data['laporan_barang'] = $this->Laporan_barang_model->laporan_barang();
        
        $this->load->view('templates/header',$data);
        $this->load->view('laporan_barang/laporan_barang',$data);
        $this->load->view('templates/footer');
    }

    public function cetak_laporan_barang()
    {
        $data['judul']="Laporan Barang ";
        $data['laporan_barang'] = $this->Laporan_barang_model->laporan_barang();
        $data['cetak_laporan_barang'] = $this->Laporan_barang_model->laporan_barang();

       
        $this->load->view('laporan_barang/cetak_laporan_barang',$data);
       
    }

    // public function detail($id)
    // {
    //     $data['judul'] = "Detail Barang ";
    //     $data['cetak'] = $this->Lap_Barang_model->get_Barang($id);
    //     $data['detail'] = $this->Lap_Barang_model->get_detail($id);
    //     $this->load->view('templates/header',$data);
    //     $this->load->view('laporan_barang/detail',$data);
    //     $this->load->view('templates/footer');
    // }

}