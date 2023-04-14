<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_penjualan extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
        cek_not_login();
        cek_owner();
        $this->load->model('Lap_Penjualan_model');
    }

    public function index()
    {
        $data['judul']="Laporan Penjualan";
        $this->load->view('templates/header',$data);
        $this->load->view('Laporan_penjualan/index');
        $this->load->view('templates/footer');
    }

    public function lap_penjualan()
    {
        $data['judul']="Laporan Penjualan";
        
        $tgl_mulai = str_replace('/', '-', $this->input->post('tgl_mulai'));
		$tgl_sampai = str_replace('/', '-', $this->input->post('tgl_sampai'));

        $data['tgl_awal'] = $tgl_mulai;
        $data['tgl_akhir'] = $tgl_sampai;
        $data['lap_penjualan'] = $this->Lap_Penjualan_model->Laporan_penjualan($tgl_mulai, $tgl_sampai);
        $data['grand_total'] = $this->Lap_Penjualan_model->total($tgl_mulai, $tgl_sampai);
        
        $this->load->view('templates/header',$data);
        $this->load->view('laporan_penjualan/lap_penjualan',$data);
        $this->load->view('templates/footer');
    }

    public function cetak_lap_penjualan()
    {
        $data['judul']="Laporan Penjualan";

        if (!$this->uri->segment(3) && !$this->uri->segment(4)) {
			$tgl_mulai = str_replace('/', '-', $this->input->post('tgl_mulai'));
			$tgl_sampai = str_replace('/', '-', $this->input->post('tgl_sampai'));
		} else {
			$tgl_mulai = $this->uri->segment(3);
			$tgl_sampai = $this->uri->segment(4);
		}
		$tgl_awal = str_replace('-', '/', $tgl_mulai);
		$tgl_akhir = str_replace('-', '/', $tgl_sampai);

        $data['tgl_awal'] = $tgl_awal;
        $data['tgl_akhir'] = $tgl_akhir;
        $data['lap_penjualan'] = $this->Lap_Penjualan_model->Laporan_penjualan($tgl_mulai, $tgl_sampai);
        $data['grand_total'] = $this->Lap_Penjualan_model->total($tgl_awal, $tgl_akhir);
        
        $this->load->view('laporan_penjualan/cetak_laporan_penjualan',$data);
    }

    // public function detail($id)
    // {
    //     $data['judul'] = "Detail Penjualan";
    //     $data['cetak'] = $this->Lap_Penjualan_model->get_penjualan($id);
    //     $data['detail'] = $this->Lap_Penjualan_model->get_detail($id);
    //     $this->load->view('templates/header',$data);
    //     $this->load->view('laporan_pembelian/detail',$data);
    //     $this->load->view('templates/footer');
    // }

}