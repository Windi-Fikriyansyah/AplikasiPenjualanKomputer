<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('Lap_penjualan_model');
        cek_not_login();
    }

    public function index(){

        $data['judul']="Home";
        $data['perhari']=$this->Lap_penjualan_model->total_perhari();
        $data['perbulan']=$this->Lap_penjualan_model->total_perbulan();
        $this->load->view('templates/header',$data);
        $this->load->view('home/index', $data);
        $this->load->view('templates/footer');
    }

    public function not_found()
    {
        $data['judul']="404 Error Page";
        $this->load->view('templates/header', $data);
        $this->load->view('404');
        $this->load->view('templates/footer', $data);
    }
}
