<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jasa extends CI_Controller {

    public function __construct(){
        parent::__construct();
        cek_not_login();
        
        $this->load->model('Jasa_model');
    }
    public function index(){
    $data['judul']="Jasa";

        $data['jasa']=$this->Jasa_model->tampil_data();

        $this->load->view('templates/header',$data);
        $this->load->view('jasa/index',$data);
        $this->load->view('templates/footer');
    }
    public function tambah()
    {
        $data['judul']="jasa";

        $tampil= $this->Jasa_model->no_otomatis();
        if(empty($tampil[0]['id_jasa']))
        {
            $no = "JS" . "001";
        } else{
            $a= "JS";
            $urut = $tampil[0]['id_jasa'];
            $no_1 = substr($urut, 2, 3 );
            $hasil = ((int) $no_1) + 1;
            $hasil_2 = sprintf('%03s', $hasil);
            $no = $a . $hasil_2;
        }
        $data['no_otomatis'] = $no;

        $this->form_validation->set_rules('id_jasa','ID Jasa','required|trim');
        $this->form_validation->set_rules('nama_jasa','Nama Jasa','required|trim');

        if ($this->form_validation->run() == FALSE){
            
        $this->load->view('templates/header',$data);
        $this->load->view('jasa/tambah',$data);
        $this->load->view('templates/footer');

        }else{
            $this->Jasa_model->simpan();
            redirect('jasa');
        }
    }

    public function hapus()
    {
        $id = $this->input->post('id_jasa');
        $this->Jasa_model->hapus($id);
        $pesan="Data berhasil dihapus";
        $url = base_url('Jasa');
        echo "<script>
            alert('$pesan');
            location='$url';
        </script>";
    }

    public function ubah($id)
    {
        $data['judul']="Jasa";
        $jasa = $this->Jasa_model->get_id($id);
        $data['ubah_jasa'] = $this->Jasa_model->get_id($id);
        $this->form_validation->set_rules('id_jasa','ID  Jasa','required|trim');
        $this->form_validation->set_rules('nama_jasa','Nama Jasa','required|trim');
        if($this->form_validation->run() == FALSE)
        {
            if($jasa > 0){
                $data['ubah_jasa'] = $this->Jasa_model->get_id($id);
        $this->load->view('templates/header',$data);
        $this->load->view('jasa/ubah',$data);
        $this->load->view('templates/footer');
}else {
    $pesan="Data tidak ditemukan";
$url = base_url('jasa');
echo "<script>
    alert('$pesan');
    location='$url';
</script>";
}
        }else{
            $this->Jasa_model->ubah();
            $pesan="Data berhasil diupdate";
        $url = base_url('jasa');
        echo "<script>
            alert('$pesan');
            location='$url';
        </script>";
        }
    }
    }
