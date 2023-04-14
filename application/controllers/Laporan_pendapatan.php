<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_pendapatan extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
        cek_not_login();
        $this->load->model('Lap_Pendapatan_model');
    }

    public function index()
    {
        $data['judul']="Laporan Pendapatan";
        $this->load->view('templates/header',$data);
        $this->load->view('laporan_pendapatan/index');
        $this->load->view('templates/footer');
    }

    public function lap_pendapatan()
    {
        $data['judul']="Laporan pendapatan";
        
        $tgl_mulai = str_replace('/', '-', $this->input->post('tgl_mulai'));
		$tgl_sampai = str_replace('/', '-', $this->input->post('tgl_sampai'));

        $data['tgl_awal'] = $tgl_mulai;
        $data['tgl_akhir'] = $tgl_sampai;
        $data['lap_pendapatan'] = $this->Lap_Pendapatan_model->Laporan_pendapatan($tgl_mulai, $tgl_sampai);
        $data['grand_total'] = $this->Lap_Pendapatan_model->total($tgl_mulai, $tgl_sampai);
        
        $this->load->view('templates/header',$data);
        $this->load->view('laporan_pendapatan/lap_pendapatan',$data);
        $this->load->view('templates/footer');
    }

    public function cetak_laporan_pendapatan()
    {
        $data['judul']="Laporan Pendapatan";

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
        $data['lap_pendapatan'] = $this->Lap_Pendapatan_model->Laporan_pendapatan($tgl_mulai, $tgl_sampai);
        $data['grand_total'] = $this->Lap_Pendapatan_model->total($tgl_awal, $tgl_akhir);
        
        $this->load->view('laporan_pendapatan/cetak_laporan_pendapatan',$data);
    }

    // public function detail($id)
    // {
    //     $data['judul'] = "Detail Pendapatan";
    //     $data['cetak'] = $this->Lap_Pendapatan_model->get_Pendapatan($id);
    //     $data['detail'] = $this->Lap_Pendapatan_model->get_detail($id);
    //     $this->load->view('templates/header',$data);
    //     $this->load->view('laporan_pendapatan/detail',$data);
    //     $this->load->view('templates/footer');
    // }

}