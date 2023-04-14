<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi_jasa extends CI_Controller {

    public function __construct(){
        parent::__construct();
        cek_not_login();
        $this->load->model(['Jasa_model','Transaksi_jasa_model','User_model','Customer_model','Pegawai_model']);
    }

    
    public function index(){
        $data['judul']="Transaksi_jasa";

        $id=$this->fungsi->user_login()->id_user;
        $data['keranjang']=$this->Transaksi_jasa_model->tampil_keranjang($id);
        $data['jasa']=$this->Jasa_model->tampil_data();
        $data['pegawai']=$this->Pegawai_model->tampil_data();
        $data['customer']=$this->Customer_model->tampil_data();
        $data['total']=$this->Transaksi_jasa_model->tampil_total($id);

        $tampil= $this->Transaksi_jasa_model->no_otomatis();
        if (empty($tampil[0]['no_faktur']))
        {
            $no= date('Ymd') . "000001";
        }else{
            $a= date('Ymd');
            $urut = $tampil[0]['no_faktur'];
            $no_1 = substr($urut, 8, 6);
            $hasil = ((int) $no_1) + 1;
            $hasil_2 = sprintf('%06s', $hasil);
            $no = $a . $hasil_2;
        }
        $data['no_faktur'] = $no;

        $this->load->view('templates/header',$data);
        $this->load->view('transaksi_jasa/index',$data);
        $this->load->view('templates/footer');
    }

    public function tambah_keranjang()
    {
        if($this->input->post('id_jasa')==''){
            $pesan="Data Jasa Kososng.! silahkan diisi.";
            $url = base_url('transaksi_jasa');
            echo "<script>

                alert('$pesan');
                location='$url';
            </script>";
        }else{
        
        $this->Transaksi_jasa_model->simpan_keranjang();
        redirect('transaksi_jasa');
    }
    }
    public function hapus_keranjang($id)
    {
        $this->Transaksi_jasa_model->hapus_keranjang($id);
        redirect('transaksi_jasa');
    }

    public function batal()
    {
        $this->Transaksi_jasa_model->hapus_id();
        $pesan="Transaksi Jasa Berhasil di Batalkan";
        $url = base_url('transaksi_jasa');
        echo "<script>
            alert('$pesan');
            location='$url';
        </script>";
    }

    public function simpan()
    {
        if($this->input->post('nama_customer') =='')
        {
        $pesan="Data Customer Masih Kosong...!! Silahkan dipilih";
        $url = base_url('transaksi_jasa');
        echo "<script>
            alert('$pesan');
            location='$url';
        </script>";

    }else{
        $result = array();
        foreach($_POST['no_faktur'] as $key => $val){
            $result[] = array(
                'no_faktur' => $_POST['no_faktur'][$key],
                'id_jasa' => $_POST['id_jasa'][$key],
                'harga' => $_POST['harga'][$key],
            );
        }
        $this->db->insert_batch('detail_jasa',$result);
        $this->Transaksi_jasa_model->simpan_transaksi_jasa();

        $pesan ="Transaksi Jasa Berhasil Simpan";
        $url = base_url('transaksi_jasa');
        echo "<script>
            alert('$pesan');
            location='$url';
            </script>";
        $this->Transaksi_jasa_model->hapus_id();
    }
}
public function data_transaksi_jasa()
{
    $data['judul']="Data Transaksi Jasa";
    $data['data_transaksi_jasa']=$this->Transaksi_jasa_model->tampil_data();
    $this->load->view('templates/header',$data);
    $this->load->view('transaksi_jasa/data_transaksi_jasa',$data);
    $this->load->view('templates/footer',$data);
}

public function hapus()
{
    $id = $this->input->post('id_jasa');
    $this->Transaksi_jasa_model->hapus_transaksi_jasa($id);
    $this->Transaksi_jasa_model->hapus_detail($id);
    $pesan ="Data Berhasil di Hapus";
    $url = base_url('transaksi_jasa/data_transaksi_jasa');
    echo "<script>
        alert('$pesan');
        location='$url';
    </script>";
}

public function cetak($id)
{
    $data['cetak'] = $this->Transaksi_jasa_model->get_transaksi_jasa($id);
    $data['detail'] = $this->Transaksi_jasa_model->get_detail($id);
    $this->load->view('transaksi_jasa/cetak_transaksi_jasa',$data);
}
}