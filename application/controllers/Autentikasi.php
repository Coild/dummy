<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Autentikasi extends CI_Controller
{

    // torang beking dulu variable for simpan model pe lokasi.
    // protected $model = '';

    function __construct()
    {
        parent::__construct();
        $this->load->model('Mlogin', 'Mlogin');
        // $this->auth->cek_bukan_ad();
        // $this->auth->cek_auth();
    }

    function index()
    {

        $data['judul_halaman'] = "Login";
        $this->load->view('templates/header', $data);
        $this->load->view('autentikasi/view-login');
        $this->load->view('templates/footer');
    }



    function autentikasi()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('pass');

        $validasi_email = $this->Mlogin->query_validasi_email($email);
        if ($validasi_email->num_rows() > 0) {
            $validate_ps = $this->Mlogin->query_validasi_password($email, $password);
            if ($validate_ps->num_rows() > 0) {
                $x = $validate_ps->row_array();
                if ($x['user_status'] == '1') {
                    $this->session->set_userdata('logged', TRUE); //session for supaya tidak ada user yang boleh akses masuk lewat path...
                    $this->session->set_userdata('user', $email);
                    $id = $x['user_id'];

                    if ($x['user_akses'] == '1') { //untuk login sebagai admin
                        $name = $x['user_name'];
                        $this->session->set_userdata('access', 'Administrator', TRUE);
                        $this->session->set_userdata('id', $id);
                        $this->session->set_userdata('name', $name);
                        redirect('admin_sakip_sulut');
                    } else if ($x['user_akses'] == '2') { //untuk login sebagai user opd
                        $name = $x['user_name'];
                        $u_email = $x['user_email'];
                        $this->session->set_userdata('access', 'User');
                        $this->session->set_userdata('id', $id);
                        $this->session->set_userdata('name', $name);
                        $this->session->set_userdata('u_email', $u_email);
                        redirect('user');
                    }
                    //  else if ($x['user_akses'] == '3') { //untuk login sebagai user instansi pemuda
                    //     $name = $x['user_name'];
                    //     $this->session->set_userdata('access', 'User');
                    //     $this->session->set_userdata('id', $id);
                    //     $this->session->set_userdata('name', $name);
                    //     redirect('user');
                    // }

                    //pesan yang mo timbul pas kalo salah input
                } else {
                    $url = base_url('autentikasi');
                    echo $this->session->set_flashdata('msg', '
                    <h3>Uupps!</h3>
                    <p>Akun kamu telah di blokir. Silahkan hubungi admin.</p>');
                    redirect($url);
                }
            } else {
                $url = base_url('autentikasi');
                echo $this->session->set_flashdata('msg', '
                    <h3>Uupps!</h3>
                    <p>Password yang kamu masukan salah.</p>');
                redirect($url);
            }
        } else {
            $url = base_url('autentikasi');
            echo $this->session->set_flashdata('msg', '
            <h3>Uupps!</h3>
            <p>Email yang kamu masukan salah.</p>');
            redirect($url);
        }
    }



    //function for loguout
    function logout()
    {
        $this->session->sess_destroy();
        $url = base_url('autentikasi');
        redirect($url);
    }
}
