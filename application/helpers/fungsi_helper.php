<!--untuk membatasi hak akses user 
dalam melakukan pengecekan apakah user sudah login atau blm login -->

<?php
function cek_login()
{
    $ci =& get_instance();
    $user_session = $ci->session->userdata('id_user');
    if($user_session)
    {
        redirect('home');
    }
}

function cek_not_login()
{
    $ci =& get_instance();
    $user_session = $ci->session->userdata('id_user');
    if(!$user_session)
    {
        redirect('auth/login');
    }
}

function cek_owner()
{
    $ci =& get_instance();
    $ci->load->library('fungsi');
    if($ci->fungsi->user_login()->level != 1)
    {
        redirect('home/not_found');
    }
}

function cek_asisten()
{
    $ci =& get_instance();
    $ci->load->library('fungsi');
    if($ci->fungsi->user_login()->level != 2)
    {
        redirect('home/not_found');
    }
}