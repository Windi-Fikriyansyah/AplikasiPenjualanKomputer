<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct(){
        parent::__construct();
        cek_owner();
        
        $this->load->model(['User_model','Pegawai_model']);

        
        $this->load->model('User_model');
    }
    public function index(){
        cek_not_login();
        
    $data['judul']="User";

        $data['user']=$this->User_model->tampil_data();

        $this->load->view('templates/header',$data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
    }
    public function tambah()
    {
        cek_not_login();
        
        $data['judul']="User";
        $data['pegawai'] = $this->Pegawai_model->tampil_data();
        
        $tampil= $this->User_model->no_otomatis();
        if(empty($tampil[0]['id_user']))
        {
            $no = "USR" . "001";
        } else{
            $a= "USR";
            $urut = $tampil[0]['id_user'];
            $no_1 = substr($urut, 3, 3 );
            $hasil = ((int) $no_1) + 1;
            $hasil_2 = sprintf('%03s', $hasil);
            $no = $a . $hasil_2;
        }
        $data['no_otomatis'] = $no;

        $this->form_validation->set_rules('username','username',
        'required|trim|callback_usercek');
        $this->form_validation->set_rules('pass1','Password',
        'min_length[5]|matches[pass2]',[
            'min_length' => "Password minimal 5 digit",
            'matches' => "Password tidak sesuai"
        ]);
        $this->form_validation->set_rules('pass2','Konfirmasi Password',
        'required|trim|matches[pass1]',
        ['matches' => "Konfirmasi Password tidak sesuai"]);
        $this->form_validation->set_rules('level','level','required|trim');
        $this->form_validation->set_rules('pegawai','Pegawai','required|trim');

        if ($this->form_validation->run() == FALSE){
            
        $this->load->view('templates/header',$data);
        $this->load->view('user/tambah', $data);
        $this->load->view('templates/footer');
    } else {
        $this->User_model->simpan();
            redirect('user');
    }
}
function usercek()
{
    $post = $this->input->post(null, TRUE);
    $query = $this->db->query("SELECT * FROM user WHERE username = '$post[username]' AND id_user != '$post[id_user]'");
    if($query->num_rows() > 0)
    {
        $this->form_validation->set_message('usercek','{field} sudah ada');
        return FALSE;
    } else {
        return TRUE;
    }
}
    public function hapus()
    {
        cek_not_login();
        
        $id = $this->input->post('id_user');
        $this->User_model->hapus($id);
        $pesan="Data berhasil dihapus";
        $url = base_url('User');
        echo "<script>
            alert('$pesan');
            location='$url';
        </script>";
        }
        public function ubah($id)
        {
            cek_not_login();
        
            $data['judul']="User";
            $user = $this->User_model->get_id($id);

            $data['pegawai'] = $this->Pegawai_model->tampil_data();

            $this->form_validation->set_rules('username','username',
        'required|trim|callback_usercek');
            $this->form_validation->set_rules('pass1','Password',
            'min_length[5]|matches[pass2]',[
                'min_length' => "Password minimal 5 digit",
                'matches' => "Password tidak sesuai"
            ]);
            $this->form_validation->set_rules('pass2','Konfirmasi Password',
            'matches[pass1]',
            ['matches' => "Konfirmasi Password tidak sesuai"]);
            $this->form_validation->set_rules('level','level','required|trim');
            $this->form_validation->set_rules('pegawai','Pegawai','required|trim');

        if ($this->form_validation->run() == FALSE)
        {   
            if($user > 0){
                $data['ubah_user'] = $this->User_model->get_id($id);
                $this->load->view('templates/header',$data);
                $this->load->view('user/ubah',$data);
                $this->load->view('templates/footer');
            }else {
                $pesan="Data tidak ditemukan";
                $url = base_url('user');
                echo "<script>
                    alert('$pesan');
                    location='$url';
                </script>";
                }
    } else {
        $this->User_model->ubah();
        $pesan = "Data Berhasil Di Update";
            $url = base_url('user');
            echo "<script>
            alert('$pesan');
            location='$url';
            </script>";
    }
}
public function profil($id)
        {
            $data['judul']="Data User";
            $user = $this->User_model->get_id($id);

            $data['pegawai'] = $this->Pegawai_model->tampil_data();

            $this->form_validation->set_rules('username','username',
        'required|trim|callback_usercek');
            $this->form_validation->set_rules('pass1','Password',
            'min_length[5]|matches[pass2]',[
                'min_length' => "Password minimal 5 digit",
                'matches' => "Password tidak sesuai"
            ]);
            $this->form_validation->set_rules('pass2','Konfirmasi Password',
            'matches[pass1]',
            ['matches' => "Konfirmasi Password tidak sesuai"]);

        if ($this->form_validation->run() == FALSE)
        {   
            if($user > 0){
                $data['ubah_user'] = $this->User_model->get_id($id);
                $this->load->view('templates/header',$data);
                $this->load->view('user/profil',$data);
                $this->load->view('templates/footer');
            }else {
                $pesan="Data tidak ditemukan";
                $url = base_url('home');
                echo "<script>
                    alert('$pesan');
                    location='$url';
                </script>";
                }
    } else {
        $this->User_model->ubah_profil();
        $pesan = "Data Berhasil Di Update";
            $url = base_url('home');
            echo "<script>
            alert('$pesan');
            location='$url';
            </script>";
    }
}
}