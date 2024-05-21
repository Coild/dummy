<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Auth
{
    public function cek_auth()
    {
        $this->ci = &get_instance();
        $this->sesi  = $this->ci->session->userdata('user_status');
        //$this->hak = $this->ci->session->userdata('role');
        if ($this->sesi != TRUE) {
            redirect('autentikasi', 'refresh');
            exit();
        }
    }

    function cek_bukan_ad()
    {
        $this->ci = &get_instance();
        $hak_akses = $this->ci->session->userdata('user_akses');
        if ($hak_akses != "Administrator") {
            // echo "<script>alert('Anda bukan Admin! Anda tidak berhak mengakses halaman ini!');</script>";
            // redirect('user');
            $this->session->sess_destroy();
            $url = base_url('user');
            redirect($url);
        }
    }
}
