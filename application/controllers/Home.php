<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */

	function __construct()
	{
		parent::__construct();
		// if ($this->session->userdata('logged') != TRUE) {
		// 	$url = base_url('autentikasi');
		// 	redirect($url);
		// };
        $this->load->model('Madmin');
	}

	public function index()
	{
		$data['judul_halaman'] = "Selamat Datang";
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
		$table_perencanaan['pagination'] = $this->pagination->create_links();

		$this->load->view('templates/header.php', $data);
		$this->load->view('home/index.php', $table_perencanaan);
		$this->load->view('templates/footer.php'); 
	}
}
