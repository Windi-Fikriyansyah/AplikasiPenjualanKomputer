<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penjualan extends CI_Controller {

    public function __construct(){
        parent::__construct();
        cek_not_login();
        cek_asisten();
        $this->load->model(['Barang_model','Penjualan_model','Customer_model']);
    }

    
    public function index(){
        $data['judul']="Penjualan";
        $data['cart']   = $this->cart->contents();
        
        $data['barang']=$this->Barang_model->tampil_data();
        $data['customer']=$this->Customer_model->tampil_data();

        $tampil= $this->Penjualan_model->no_otomatis();
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
        $this->load->view('penjualan/index',$data);
        $this->load->view('templates/footer');
    }

    public function tambah_keranjang()
	{
		$idbrg = $this->input->post('id_barang');
		$jumlah = $this->input->post('jumlah');

		if($jumlah >= 1)
		{
			$barang   = $this->Barang_model->caribarang($idbrg);
			//cek apakah stok tersedia
			// $stok  = $barang['stock'];
			// if($stok >= $jumlah)
			// {			
			$data = array(
					        'id' 	=> $barang['id_barang'],
					        'qty'   => $jumlah,
					        'price' => $barang['harga'],
					        'name'  => $barang['nama_barang'],
					        'transaksi' => "penjualan"
						);

			$this->cart->insert($data);
			redirect('penjualan');
			// } else {
			// 	$pesan = "Maaf jumlah stok kurang dari $jumlah";
			// 	$url = base_url('penjualan');
			// 	echo"<script>
            //     alert('$pesan');
            //     location='$url';
            //     </script>";
			// }
		} else {
			$pesan = "Maaf jumlah minimal 1 buah";
			$url = base_url('penjualan');
				echo"<script>
                alert('$pesan');
                location='$url';
                </script>";
		}

	}
	public function delete()
	{
		$this->cart->destroy();
		redirect('penjualan');
	}
	public function hapus_data($rowid)
	{
		$this->cart->remove($rowid);
		redirect('penjualan');
	}
		
	public function simpan()
	{
		if($this->input->post('bayar')=="" or $this->input->post('nama_customer') == "" ){
            $pesan = "Lengkapi data Terlebih Dahulu";
			$url = base_url('penjualan');
				echo"<script>
                alert('$pesan');
                location='$url';
                </script>";
        } else {
        $no_faktur = $this->Penjualan_model->checkout($_POST);
		$this->cart->destroy();
        // redirect('penjualan');
        $pesan ="Transaksi Berhasil Simpan";
            $url = base_url('penjualan/cetak');
            echo "<script>
                alert('$pesan');
                location='$url';
            </script>";
		// redirect("penjualan/cetak/$no_faktur");
        }	
	}

    // public function tambah_keranjang()
    // {
    //     if($this->input->post('id_barang')==''){
    //         $pesan="Data Barang Kososng.! silahkan diisi.";
    //         $url = base_url('penjualan');
    //         echo "<script>

    //             alert('$pesan');
    //             location='$url';
    //         </script>";
    //     }else{
        
    //     $this->Penjualan_model->simpan_keranjang();
    //     redirect('penjualan');
    // }
    // }
//     public function hapus_keranjang($id)
//     {
//         $this->Penjualan_model->hapus_keranjang($id);
//         redirect('penjualan');
//     }

//     public function batal()
//     {
//         $this->Penjualan_model->hapus_id();
//         $pesan="Transaksi Penjualan Berhasil di Batalkan";
//         $url = base_url('penjualan');
//         echo "<script>
//             alert('$pesan');
//             location='$url';
//         </script>";
//     }

//     public function simpan()
//     {
//         if($this->input->post('nama_customer') =='')
//         {
//         $pesan="Data Customer Masih Kosong...!! Silahkan dipilih";
//         $url = base_url('penjualan');
//         echo "<script>
//             alert('$pesan');
//             location='$url';
//         </script>";

//     }else{
//         $result = array();
//         foreach($_POST['no_faktur'] as $key => $val){
//             $result[] = array(
//                 'nofaktur' => $_POST['no_faktur'][$key],
//                 'id_barang' => $_POST['id_barang'][$key],
//                 'harga' => $_POST['harga'][$key],
//                 'jumlah' => $_POST['jumlah'][$key],
//                 'subtotal' => $_POST['subtotal'][$key],
//             );
//         }
//         $this->db->insert_batch('detail_penjualan',$result);
//         $this->Penjualan_model->simpan_penjualan();

//         $pesan ="Transaksi Penjualan Berhasil Simpan";
//         $url = base_url('penjualan/cetak');
//         echo "<script>
//             alert('$pesan');
//             location='$url';
//             </script>";
//         $this->Penjualan_model->hapus_id();
//     }
// }
public function data_penjualan()
{
    $data['judul']="Data Penjualan";
    $data['data_penjualan']=$this->Penjualan_model->tampil_data();
    $this->load->view('templates/header',$data);
    $this->load->view('penjualan/data_penjualan',$data);
    $this->load->view('templates/footer',$data);
}

public function hapus()
{
    $id = $this->input->post('id_barang');
    $this->Penjualan_model->hapus_penjualan($id);
    $this->Penjualan_model->hapus_detail($id);
    $pesan ="Data Berhasil di Hapus";
    $url = base_url('penjualan/data_penjualan');
    echo "<script>
        alert('$pesan');
        location='$url';
    </script>";
}

public function cetak()
{
    $tampil= $this->Penjualan_model->no_otomatis();
    $id=$tampil[0]['no_faktur'];
    $data['cetak'] = $this->Penjualan_model->get_penjualan($id);
    $data['detail'] = $this->Penjualan_model->get_detail($id);
    $this->load->view('penjualan/cetak_penjualan',$data);
}
public function cetak_faktur($id)
{
    $data['cetak'] = $this->Penjualan_model->get_penjualan($id);
    $data['detail'] = $this->Penjualan_model->get_detail($id);
    
    $this->load->view('Penjualan/cetak_penjualan',$data); 
  
}

}