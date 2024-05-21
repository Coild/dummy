<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Admin_sakip_sulut extends CI_Controller
{
    /*
            Useful links:
            - http://codeigniter.com/userguide3/libraries/pagination.html?highlight=paginatio
        */
    function __construct()
    {

        parent::__construct();
        $this->load->model('Madmin');
        if ($this->session->userdata('logged') != TRUE) {
            $url = base_url('autentikasi');
            redirect($url);
        };

        if ($this->session->userdata('access') != 'Administrator') {
            $url = base_url('user');
            redirect($url);
        }


        // if (!isset($_SERVER['PHP_AUTH_USER']) || $_SERVER['PHP_AUTH_USER'] != 'username' || $_SERVER['PHP_AUTH_PW'] != 'password') {
        //     header('WWW-Authenticate: Basic realm="MyProject"');
        //     header('HTTP/1.0 401 Unauthorized');
        //     die('Access Denied');
        // }
    }

    public function index()
    {
        $data['user'] = 'admin_sakip_sulut';

        $data['judul_halaman'] = "Dashboard";
        $data['judul_header_page'] = 'Dashboard';
        $model = 'tbl_status_dokumen';

        if ($this->input->post('pilih_tahun')) {
            $data['select_year'] = $this->input->post('year');
            $this->session->set_userdata('select_year', $data['select_year']);
        } else {
            $data['select_year'] =  $this->session->userdata('select_year');
        }

        if ($this->input->post('submit')) {
            $data['keyword'] =  $this->input->post('keyword');
            $this->session->set_userdata('keyword', $data['keyword']);
        } else {
            $data['keyword'] =  $this->session->userdata('keyword');
        }

        $config['base_url'] = site_url('admin_sakip_sulut/index/');
        $config['uri_segment'] = 3;
        $table_dashboard['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $config['total_rows'] = $this->Madmin->total_data($model, $data['keyword'], $data['select_year']);

        if ($table_dashboard['page'] == 0) {
            if ($this->session->per_page == 0) {
                $this->session->per_page = 5;
            }
            if ((int)$this->input->get('banyaknya-data')) {
                $this->session->per_page = (int)$this->input->get('banyaknya-data');
            }
        }

        $config['per_page'] = $this->session->per_page;
        $config['num_links'] = 2;
        $config['first_link'] = '<<';
        $config['next_link'] = 'Selanjutnya >';
        $config['prev_link'] = '< Sebelumnya';

        $this->pagination->initialize($config);
        $table_dashboard = array(
            'table' => $this->Madmin->get_table($model, $config['per_page'], $table_dashboard['page'], $data['keyword'], $data['select_year'])
        );

        $table_dashboard['pagination'] = $this->pagination->create_links();
        $table_dashboard['year'] = $this->Madmin->get_year();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/head_content.php', $data);
        $this->load->view('admin/dashboard/content.php', $table_dashboard);
        $this->load->view('templates/footer');
    }


    public function perencanaan_kinerja()
    {
        $data['user'] = 'admin_sakip_sulut';
        $data['judul_halaman'] = 'Perencanaan Kinerja';
        $data['judul_header_page'] = 'Perencanaan Kinerja';
        $model = 'tbl_dokumen_user';

        if ($this->input->post('submit')) {
            $data['keyword'] =  $this->input->post('keyword');
            $this->session->set_userdata('keyword', $data['keyword']);
        } else {
            $data['keyword'] =  $this->session->userdata('keyword');
        }

        $config['base_url'] = site_url('admin_sakip_sulut/perencanaan_kinerja'); // ini langsung link ke controller
        $config['uri_segment'] = 3;
        $table_perencanaan['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $config['total_rows'] = ceil($this->Madmin->total_data_perencanaan($model, $data['keyword']));

        if ($table_perencanaan['page'] == 0) {
            if ($this->session->per_page == 0) {
                $this->session->per_page = 5;
            }
            if ((int)$this->input->get('banyaknya-data')) {
                $this->session->per_page = (int)$this->input->get('banyaknya-data');
            }
        }
        $config['per_page'] = $this->session->per_page;
        $config['num_links'] = 2; // ini mo tentukan ada berapa angka yg mo tampil di tombol pagination
        $config['first_link'] = '<<';
        $config['next_link'] = 'Selanjutnya >';
        $config['prev_link'] = '< Sebelumnya';

        // $config['use_page_numbers'] = true; // ini dpe guna, spya dpe segment 3 diambil dari nomor halaman.
        $this->pagination->initialize($config);
        $table_perencanaan = array(
            'data' => $this->Madmin->get_table_perencanaan($model, $config['per_page'], $table_perencanaan['page'], $data['keyword'])
        );

        // torang simpan create linksnya ke variabel
        $table_perencanaan['pagination'] = $this->pagination->create_links();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/head_content', $data);
        $this->load->view('admin/dokumensakip/perencanaan', $table_perencanaan);
        $this->load->view('templates/footer');
    }

    public function pengukuran_kinerja()
    {
        $data['user'] = 'admin_sakip_sulut';
        $data['judul_halaman'] = "Pengukuran Kinerja";
        $data['judul_header_page'] = 'Pengukuran Kinerja';
        $model = 'tbl_dokumen_user';

        if ($this->input->get('pilih_triwulan_input')) {
            $data['select_triwulan'] = $this->input->get('triwulan');
            $this->session->set_userdata('select_triwulan', $data['select_triwulan']);
        } else {
            $data['select_triwulan'] =  $this->session->userdata('select_triwulan');
        }

        if ($this->input->get('pilih_tahun-pengukuran-input')) {
            $data['select_year'] = $this->input->get('year');
            $this->session->set_userdata('select_year', $data['select_year']);
        } else {
            $data['select_year'] =  $this->session->userdata('select_year');
        }

        if ($this->input->get('submit')) {
            $data['keyword'] =  $this->input->get('keyword');
            $this->session->set_userdata('keyword', $data['keyword']);
        } else {
            $data['keyword'] =  $this->session->userdata('keyword');
        }

        $config['base_url'] = site_url('admin_sakip_sulut/pengukuran_kinerja');
        $config['uri_segment'] = 3;
        $table_pengukuran['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $config['total_rows'] = ceil($this->Madmin->total_data_pengukuran($model, $data['select_year'], $data['select_triwulan'], $data['keyword']));

        if ($table_pengukuran['page'] == 0) {
            if ($this->session->per_page == 0) {
                $this->session->per_page = 5;
            }
            if ((int)$this->input->get('banyaknya-data')) {
                $this->session->per_page = (int)$this->input->get('banyaknya-data');
            }
        }
        $config['per_page'] = $this->session->per_page;
        $config['num_links'] = 2;
        $config['first_link'] = '<<';
        $config['next_link'] = 'Selanjutnya >';
        $config['prev_link'] = '< Sebelumnya';

        $this->pagination->initialize($config);
        $table_pengukuran = array(
            'triwulan' => $this->Madmin->get_table_pengukuran($model, $config['per_page'], $table_pengukuran['page'], $data['select_year'], $data['select_triwulan'], $data['keyword']),
        );
        $table_pengukuran['year'] = $this->Madmin->get_year();
        $table_pengukuran['pagination'] = $this->pagination->create_links();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/head_content', $data);
        $this->load->view('admin/dokumensakip/pengukuran', $table_pengukuran);
        $this->load->view('templates/footer');
    }

    // utk menampilkan data triwulan 1
    function triwulan1()
    {
        $data['id'] = $_POST['id'];
        $data['opd'] = $_POST['opd'];
        $data['year'] = $_POST['year'];

        $this->load->view('admin/dokumensakip/triwulan1', $data);
    }

    // utk menampilkan data triwulan 2
    function triwulan2()
    {
        $data['id'] = $_POST['id'];
        $data['opd'] = $_POST['opd'];
        $data['year'] = $_POST['year'];

        $this->load->view('admin/dokumensakip/triwulan2', $data);
    }

    // utk menampilkan data triwulan 3
    function triwulan3()
    {
        $data['id'] = $_POST['id'];
        $data['opd'] = $_POST['opd'];
        $data['year'] = $_POST['year'];

        $this->load->view('admin/dokumensakip/triwulan3', $data);
    }

    // utk menampilkan data triwulan 4
    function triwulan4()
    {
        $data['id'] = $_POST['id'];
        $data['opd'] = $_POST['opd'];
        $data['year'] = $_POST['year'];

        $this->load->view('admin/dokumensakip/triwulan4', $data);
    }


    // fungsi utk menambahkan triwulan 1
    function tambah_t1()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('ji_t1', 'Ji_T1', 'trim|required|max_length[10]|xss_clean');

        if ($this->form_validation->run() == FALSE) {

            $this->pengukuran_kinerja();
        } else {
            $opd    = $this->input->post('opd');
            $year   = $this->input->post('year');
            $ji_t1  = $this->input->post('ji_t1');
            $tt_t1  = $this->input->post('tt_t1');
            $tc1_t1 = $this->input->post('tc1_t1');
            $tc2_t1 = $this->input->post('tc2_t1');
            $tc3_t1 = $this->input->post('tc3_t1');
            $tc4_t1 = $this->input->post('tc4_t1');
            $tc5_t1 = $this->input->post('tc5_t1');
            $t_t1   = $this->input->post('t_t1');
            $mt_t1  = $this->input->post('mt_t1');
            $triwulan = 'triwulan1';

            $data = [
                'opd'       => $opd,
                'year'      => $year,
                'ji_t1'     => $ji_t1,
                'tt_t1'     => $tt_t1,
                'tc1_t1'    => $tc1_t1,
                'tc2_t1'    => $tc2_t1,
                'tc3_t1'    => $tc3_t1,
                'tc4_t1'    => $tc4_t1,
                'tc5_t1'    => $tc5_t1,
                't_t1'      => $t_t1,
                'mt_t1'     => $mt_t1,

            ];

            $result = $this->Madmin->tambah_triwulan($data, $triwulan);

            if ($result > 0) {
                json_encode(array('status' => TRUE));
                redirect('Admin_sakip_sulut/pengukuran_kinerja');
            } else {
                echo (json_encode(array('status' => FALSE)));
            }
        }
    }

    // fungsi utk menambahkan triwulan 2
    function tambah_t2()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('ji_t2', 'Ji_T2', 'trim|required|max_length[10]|xss_clean');

        if ($this->form_validation->run() == FALSE) {

            $this->pengukuran_kinerja();
        } else {
            $opd    = $this->input->post('opd');
            $year   = $this->input->post('year');
            $ji_t2  = $this->input->post('ji_t2');
            $tt_t2  = $this->input->post('tt_t2');
            $tc1_t2 = $this->input->post('tc1_t2');
            $tc2_t2 = $this->input->post('tc2_t2');
            $tc3_t2 = $this->input->post('tc3_t2');
            $tc4_t2 = $this->input->post('tc4_t2');
            $tc5_t2 = $this->input->post('tc5_t2');
            $t_t2   = $this->input->post('t_t2');
            $mt_t2  = $this->input->post('mt_t2');
            $triwulan = 'triwulan2';

            $data = [
                'opd'       => $opd,
                'year'      => $year,
                'ji_t2'     => $ji_t2,
                'tt_t2'     => $tt_t2,
                'tc1_t2'    => $tc1_t2,
                'tc2_t2'    => $tc2_t2,
                'tc3_t2'    => $tc3_t2,
                'tc4_t2'    => $tc4_t2,
                'tc5_t2'    => $tc5_t2,
                't_t2'      => $t_t2,
                'mt_t2'     => $mt_t2,

            ];

            $result = $this->Madmin->tambah_triwulan($data, $triwulan);

            if ($result > 0) {
                json_encode(array('status' => TRUE));
                redirect('Admin_sakip_sulut/pengukuran_kinerja');
            } else {
                echo (json_encode(array('status' => FALSE)));
            }
        }
    }

    // fungsi utk menambahkan triwulan 3
    function tambah_t3()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('ji_t3', 'Ji_T3', 'trim|required|max_length[10]|xss_clean');

        if ($this->form_validation->run() == FALSE) {

            $this->pengukuran_kinerja();
        } else {
            $opd    = $this->input->post('opd');
            $year   = $this->input->post('year');
            $ji_t3  = $this->input->post('ji_t3');
            $tt_t3  = $this->input->post('tt_t3');
            $tc1_t3 = $this->input->post('tc1_t3');
            $tc2_t3 = $this->input->post('tc2_t3');
            $tc3_t3 = $this->input->post('tc3_t3');
            $tc4_t3 = $this->input->post('tc4_t3');
            $tc5_t3 = $this->input->post('tc5_t3');
            $t_t3   = $this->input->post('t_t3');
            $mt_t3  = $this->input->post('mt_t3');
            $triwulan = 'triwulan3';

            $data = [
                'opd'       => $opd,
                'year'      => $year,
                'ji_t3'     => $ji_t3,
                'tt_t3'     => $tt_t3,
                'tc1_t3'    => $tc1_t3,
                'tc2_t3'    => $tc2_t3,
                'tc3_t3'    => $tc3_t3,
                'tc4_t3'    => $tc4_t3,
                'tc5_t3'    => $tc5_t3,
                't_t3'      => $t_t3,
                'mt_t3'     => $mt_t3,

            ];

            $result = $this->Madmin->tambah_triwulan($data, $triwulan);

            if ($result > 0) {
                json_encode(array('status' => TRUE));
                redirect('Admin_sakip_sulut/pengukuran_kinerja');
            } else {
                echo (json_encode(array('status' => FALSE)));
            }
        }
    }

    // fungsi utk menambahkan triwulan 4
    function tambah_t4()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('ji_t4', 'Ji_T4', 'trim|required|max_length[10]|xss_clean');

        if ($this->form_validation->run() == FALSE) {

            $this->pengukuran_kinerja();
        } else {
            $opd    = $this->input->post('opd');
            $year   = $this->input->post('year');
            $ji_t4  = $this->input->post('ji_t4');
            $tt_t4  = $this->input->post('tt_t4');
            $tc1_t4 = $this->input->post('tc1_t4');
            $tc2_t4 = $this->input->post('tc2_t4');
            $tc3_t4 = $this->input->post('tc3_t4');
            $tc4_t4 = $this->input->post('tc4_t4');
            $tc5_t4 = $this->input->post('tc5_t4');
            $t_t4   = $this->input->post('t_t4');
            $mt_t4  = $this->input->post('mt_t4');
            $triwulan = 'triwulan4';

            $data = [
                'opd'       => $opd,
                'year'      => $year,
                'ji_t4'     => $ji_t4,
                'tt_t4'     => $tt_t4,
                'tc1_t4'    => $tc1_t4,
                'tc2_t4'    => $tc2_t4,
                'tc3_t4'    => $tc3_t4,
                'tc4_t4'    => $tc4_t4,
                'tc5_t4'    => $tc5_t4,
                't_t4'      => $t_t4,
                'mt_t4'     => $mt_t4,

            ];

            $result = $this->Madmin->tambah_triwulan($data, $triwulan);

            if ($result > 0) {
                json_encode(array('status' => TRUE));
                redirect('Admin_sakip_sulut/pengukuran_kinerja');
            } else {
                echo (json_encode(array('status' => FALSE)));
            }
        }
    }


    public function pelaporan_kinerja()
    {
        $data['user'] = 'admin_sakip_sulut';

        $data['judul_halaman'] = "Pelaporan Kinerja";
        $data['judul_header_page'] = "Pelaporan Kinerja";
        $model = "tbl_dokumen_user";

        if ($this->input->post('submit')) {
            $data['keyword'] =  $this->input->post('keyword');
            $this->session->set_userdata('keyword', $data['keyword']);
        } else {
            $data['keyword'] =  $this->session->userdata('keyword');
        }

        $config['base_url'] = site_url('admin_sakip_sulut/pelaporan_kinerja'); // ini langsung link ke controller
        $config['uri_segment'] = 3;
        $table_pelaporan['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $config['total_rows'] = $this->Madmin->total_data_pelaporan($model, $data['keyword']);

        if ($table_pelaporan['page'] == 0) {
            if ($this->session->per_page == 0) {
                $this->session->per_page = 5;
                // return $this->session->per_page;
            }
            if ((int)$this->input->get('banyaknya-data')) {
                $this->session->per_page = (int)$this->input->get('banyaknya-data');
            }
        }
        $config['per_page'] = $this->session->per_page;

        $config['num_links'] = 2; // ini mo tentukan ada berapa angka yg mo tampil di tombol pagination
        $config['first_link'] = '<<';
        $config['next_link'] = 'Selanjutnya >';
        $config['prev_link'] = '< Sebelumnya';

        $this->pagination->initialize($config);

        $table_pelaporan = array(
            'table' => $this->Madmin->get_table_pelaporan($model, $config['per_page'], $table_pelaporan['page'], $data['keyword'])
        );

        $table_pelaporan['pagination'] = $this->pagination->create_links();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/head_content', $data);
        $this->load->view('admin/dokumensakip/pelaporan', $table_pelaporan);
        $this->load->view('templates/footer');
    }

    public function evaluasi_kinerja()
    {
        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'gif|jpg|png|pdf|docx';
        $config['max_size']             = 10000;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;
        $data['user'] = 'admin_sakip_sulut';

        $this->load->library('upload');
        $this->upload->initialize($config);

        if (!$this->upload->do_upload('file')) {

            if ($this->input->post('submit')) {
                $data['keyword'] =  $this->input->post('keyword');
                $this->session->set_userdata('keyword', $data['keyword']);
            } else {
                $data['keyword'] =  $this->session->userdata('keyword');
            }

            if ($this->input->get('pilih_tahun-evaluasi-input')) {
                $data['select_year'] = $this->input->get('year');
                $this->session->set_userdata('select_year', $data['select_year']);
            } else {
                $data['select_year'] =  $this->session->userdata('select_year');
            }

            $data['judul_halaman'] = 'Evaluasi Kinerja';
            if (!$data['select_year']) {
                $data['judul_header_page'] = 'Evaluasi Kinerja';
            } else {
                $data['judul_header_page'] = 'Evaluasi Kinerja ' . $data['select_year'];
            }

            $model = 'tbl_evaluasi';

            $config['base_url'] = site_url('admin_sakip_sulut/evaluasi_kinerja'); // ini langsung link ke controller
            $config['uri_segment'] = 3;
            $table_evaluasi['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            $config['total_rows'] = ceil($this->Madmin->total_data_evaluasi($data['select_year'], $model, $data['keyword']));

            if ($table_evaluasi['page'] == 0) {
                if ($this->session->per_page == 0) {
                    $this->session->per_page = 5;
                }
                if ((int)$this->input->get('banyaknya-data')) {
                    $this->session->per_page = (int)$this->input->get('banyaknya-data');
                }
            }
            $config['per_page'] = $this->session->per_page;
            $config['num_links'] = 2;
            $config['first_link'] = '<<';
            $config['next_link'] = 'Selanjutnya >';
            $config['prev_link'] = '< Sebelumnya';

            $this->pagination->initialize($config);
            $table_evaluasi = array(
                'table' => $this->Madmin->get_table_evaluasi($model, $config['per_page'], $table_evaluasi['page'], $data['select_year'], $data['keyword'])
            );

            $table_evaluasi['pagination'] = $this->pagination->create_links();
            $table_evaluasi['year'] = $this->Madmin->get_year();
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/head_content', $data);
            $this->load->view('admin/dokumensakip/evaluasi', $table_evaluasi);
            $this->load->view('templates/footer');
        } else {
            $file   = $this->input->post('file');
            $nilai  = $this->input->post('nilai');
            $opd    = $this->input->post('opd');
            $year    = $this->input->post('select_year');

            $data = array(
                'opd'       => $opd,
                'file_name' => $file,
                'nilai'     => $nilai,
                'year'      => $year,
            );

            $upload_data = $this->upload->data();
            //mengambil file_name... 
            $data['file_name'] = $upload_data['file_name'];
            //untuk kirim ke database..
            $insert = $this->Madmin->tambah_evaluasi($data);

            if ($insert) {
                redirect('Admin_sakip_sulut/evaluasi_kinerja');
            } else {
                echo "Gagal";
            }
        }
    }

    public function profil_pengguna()
    {
        $data['user'] = 'admin_sakip_sulut';

        $data['judul_halaman'] = 'Profil Pengguna';
        $data['judul_header_page'] = 'Profil Pengguna';

        $data['users'] = $this->Muser->show_admin();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/head_content', $data);
        $this->load->view('admin/pengaturan/profil_pengguna');
        $this->load->view('templates/footer');
    }

    function ubah_profile_admin()
    {
        $id = $this->input->post('id');

        $data = array(

            'user_name' => $this->input->post('user_name'),
            'gelar_depan' => $this->input->post('gelar_depan'),
            'nama_admin' => $this->input->post('nama_admin'),
            'golongan' => $this->input->post('golongan'),
            'jabatan' => $this->input->post('jabatan'),
            'no_hp' => $this->input->post('no_hp'),
            'gelar_belakang' => $this->input->post('gelar_belakang'),
            'unit_kerja' => $this->input->post('unit_kerja'),
            'eselon' => $this->input->post('eselon'),
            'NIP' => $this->input->post('NIP'),
            'no_tlp_kantor' => $this->input->post('no_tlp_kantor'),
            'date_created' => date("Y-m-d"),
            'date_update' => date("Y-m-d"),

        );
        $this->Muser->update_profile($id, $data);
        $this->profile();
    }


    public function ubah_email_password()
    {
        $data['user'] = 'admin_sakip_sulut';

        # code...
        $data['judul_halaman'] = "Pengaturan";
        $data['judul_header_page'] =  "Ubah Email & Password";
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/head_content', $data);
        $this->load->view('admin/pengaturan/ubah_email_pass');
        $this->load->view('templates/footer');
    }

    public function informasi()
    {
        //upload config....
        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'gif|jpg|png|pdf|docx';
        $config['max_size']             = 10000;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;

        $this->load->library('upload');
        $this->upload->initialize($config);

        if (!$this->upload->do_upload('file')) {
            $u_tujuan  = $this->input->post('u_tujuan');
            $informasi   = $this->input->post('informasi');

            if (!$informasi) {
                $data['user'] = 'admin_sakip_sulut';

                $data['judul_halaman'] = 'Informasi';
                $data['judul_header_page'] = 'Informasi';
                $data['users'] = $this->Madmin->get_user();
                $data['info'] = $this->Madmin->get_info();

                $this->load->view('templates/header', $data);
                $this->load->view('templates/sidebar');
                $this->load->view('templates/head_content', $data);
                $this->load->view('admin/informasi/index', $data);
                $this->load->view('templates/footer');
            } else {
                $data = array(
                    'u_tujuan' => $u_tujuan,
                    'informasi' => $informasi,
                    'date_sended' => date("Y-m-d"),
                );

                //untuk kirim ke database..
                $insert = $this->Madmin->input_evaluasi($data);

                if ($insert) {
                    $this->session->set_flashdata('msg', '<div role="alert">Kirim Informasi Anda Berhasil</div>');
                    redirect('admin_sakip_sulut/informasi');
                } else {
                    echo "Maaf Coba Lagi Ya...";
                }
            }
        } else {
            $u_tujuan  = $this->input->post('u_tujuan');
            $informasi   = $this->input->post('informasi');
            $file   = $this->input->post('file');

            $data = array(
                'u_tujuan' => $u_tujuan,
                'informasi' => $informasi,
                'file' => $file,
                'date_sended' => date("Y-m-d"),
            );

            $upload_data = $this->upload->data();
            //mengambil file... 
            $data['file'] = $upload_data['file_name'];
            //untuk kirim ke database..
            $insert = $this->Madmin->input_evaluasi($data);

            if ($insert) {

                $this->session->set_flashdata('msg', '<div role="alert">Kirim Informasi Anda Berhasil</div>');
                redirect('admin_sakip_sulut/informasi');
            } else {
                echo "Maaf Coba Lagi Ya...";
            }
        }
    }

    public function faq()
    {
        # code...
        $data['user'] = 'admin_sakip_sulut';
        $data['judul_halaman'] = 'FAQ';
        $data['judul_header_page'] = 'FAQ';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/head_content', $data);
        $this->load->view('templates/faq');
        $this->load->view('templates/footer');
    }


    public function user_opd() //$id adalah variable yang di lempar untuk edit data user..
    {
        //form validation set rules....
        $this->form_validation->set_rules('user_name', 'Name', 'required|trim', [
            'required' => 'Nama pengguna harus diisi'
        ]);
        $this->form_validation->set_rules('user_email', 'Email', 'required|trim|valid_email|is_unique[tbl_user.user_email]', [
            'required' => 'Email harus diisi',
            'valid_email' => 'Email tidak sesuai',
            'is_unique' => 'Email ini sudah digunakan!'
        ]);
        $this->form_validation->set_rules('user_password', 'Password', 'required|trim|min_length[3]', [
            'required' => 'Kata sandi harus diisi',
            'min_length' => 'Password harus lebih dari 3 karakter',

        ]);

        if ($this->form_validation->run() == false) {


            $model = "tbl_user";
            $config['base_url'] = site_url('admin_sakip_sulut/user_opd'); // ini langsung link ke controller

            $config['uri_segment'] = 3;
            $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            $config['total_rows'] = $this->Madmin->total_data_user($model);

            if ($data['page'] == 0) {
                if ($this->session->per_page == 0) {
                    $this->session->per_page = 5;
                    // return $this->session->per_page;
                }
                if ((int)$this->input->get('banyaknya-data')) {
                    $this->session->per_page = (int)$this->input->get('banyaknya-data');
                }
            }
            $config['per_page'] = $this->session->per_page;

            $config['num_links'] = 2; // ini mo tentukan ada berapa angka yg mo tampil di tombol pagination
            $config['first_link'] = '<<';
            $config['next_link'] = 'Selanjutnya >';
            $config['prev_link'] = '< Sebelumnya';

            // $config['use_page_numbers'] = true; // ini dpe guna, spya dpe segment 3 diambil dari nomor halaman.
            $this->pagination->initialize($config);

            $data = array(
                'table' => $this->Madmin->get_table_user($model, $config['per_page'], $data['page'])
            );

            // torang simpan create linksnya ke variabel
            $data['pagination'] = $this->pagination->create_links();
            ///////////////////////////////////
            $data['user'] = 'admin_sakip_sulut';
            $data['judul_halaman'] = 'Pengaturan';
            $data['judul_header_page'] = 'Pengaturan User';

            $get_u = $this->Mregis->get_jenis_u();
            $data['jenis_u'] = $get_u; //get jenis user dari model Mregis

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/head_content', $data);
            $this->load->view('admin/pengaturan/user_opd', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'user_name' => htmlspecialchars($this->input->post('user_name', true)),
                'user_email' => htmlspecialchars($this->input->post('user_email', true)),
                'Jenis_user' => htmlspecialchars($this->input->post('Jenis_user'), true),
                'user_password' =>  md5($this->input->post("user_password")),
                'user_akses' => 2,
                'user_status' => 1,
                'date_created' => date("Y-m-d"),
                'date_update' => date("Y-m-d"),
            ];

            $insert = $this->Madmin->tambah_user($data);

            // $this->_sendEmail();

            $this->session->set_flashdata('massage', '<div role="alert">Akun User berhasil didaftarkan</div>');
            redirect('admin_sakip_sulut/user_opd');
        }
    }

    public function profile()
    {
        # code...
        $data['user'] = 'admin_sakip_sulut';

        $data['judul_halaman'] = 'Profile';
        $data['judul_header_page'] = 'Profile';

        $data['users'] = $this->Muser->show_admin();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/head_content', $data);
        $this->load->view('admin/profile/index', $data);
        $this->load->view('templates/footer');
    }


    function update_status_block()
    {
        $id = $this->input->post('user_id');

        $data = array(
            'User_status' => 0,
            'date_update' => date("Y-m-d"),
        );
        $this->Muser->update_status($id, $data);
        $this->user_opd();
    }
    function update_status_aktif()
    {
        $id = $this->input->post('user_id');

        $data = array(
            'User_status' => 1,
            'date_update' => date("Y-m-d"),
        );
        $this->Muser->update_status($id, $data);
        $this->user_opd();
    }


    //function untuk mengolah edit data yang pada pages pengaturan...
    function update_data()
    {
        $id = $this->input->post('user_id');

        $data = array(
            'User_name' => $this->input->post('user_name'),
            'User_email' => $this->input->post('user_email'),
            'Jenis_user' => $this->input->post('Jenis_user'),
            'date_update' => date("Y-m-d"),
            // 'User_status' => 0,
        );
        $this->Muser->update_data($id, $data);
        $this->user_opd();
    }

    function pass()
    {
        $id = $this->input->post('user_id');

        $data = array(

            'user_password' =>  md5($this->input->post('user_password')),
            'date_update' => date("Y-m-d"),

        );
        $this->Muser->update_pass($id, $data);
        $this->user_opd();
    }




    //controller untuk menampilkan page edit data user//
    function show_user_id()
    {
        $id = $this->uri->segment(3);
        $data['users'] = $this->Muser->show_users(); //untuk menampilkan semua user yang ada
        $data['userID'] = $this->Muser->show_user_id($id); //
        /////////////
        $data['user'] = 'admin_sakip_sulut';
        $data['judul_halaman'] = 'Pengaturan';
        $data['judul_header_page'] = 'Update Data User';

        $get_u = $this->Mregis->get_jenis_u();
        $data['jenis_u'] = $get_u; //get jenis user dari model Mregis

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/head_content', $data);
        $this->load->view('admin/pengaturan/update_data', $data);
        $this->load->view('templates/footer');
    }

    function pass_update()
    {
        $id = $this->uri->segment(3);
        $data['users'] = $this->Muser->show_users(); //untuk menampilkan semua user yang ada
        $data['userID'] = $this->Muser->show_user_id($id); //
        /////////////
        $data['user'] = 'admin_sakip_sulut';
        $data['judul_halaman'] = 'Pengaturan';
        $data['judul_header_page'] = 'Update Password User';

        $get_u = $this->Mregis->get_jenis_u();
        $data['jenis_u'] = $get_u; //get jenis user dari model Mregis

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/head_content', $data);
        $this->load->view('admin/pengaturan/update_pass', $data);
        $this->load->view('templates/footer');
    }
    //end of update data..

    public function notification()
    {
        # code...
        $data['user'] = 'admin';

        $data['judul_halaman'] = 'Notifikasi';
        $data['judul_header_page'] = 'Notifikasi';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/head_content', $data);
        $this->load->view('admin/notification/index');
        $this->load->view('templates/footer');
    }

    // function download($id)
    // {
    //     $data = $this->db->get_where('perencanaan_kinerja_admin', ['id' => $id])->row();
    //     force_download('uploads/' . $data->File_dok, NULL);
    // }
};
