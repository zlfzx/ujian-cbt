<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

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
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct(){
		parent::__construct();
		$this->load->model('m_user');
		if (!$this->session->userdata('login')) {
			redirect('login');
		}
	}

	//Header
	private function header($data){
		$this->load->view('template/header', $data);
	}

	//404
	function notfound(){
		redirect('');
	}

     //Index
     public function index(){
     	$id = ['id_siswa' => $this->session->id];
     	$data['ar'] = $this->m_user->cekdefpass($id)->row_array();
     	$data['title'] = 'Ujian Berbasis Komputer';

     	$this->header($data);
        $this->load->view('utama');
        $this->load->view('template/footer');
     }

     //Setting
     public function setting(){
     	$id = ['id_siswa' => $this->session->id];
     	$data['ar'] = $this->m_user->cekdefpass($id)->row_array();
     	$data['title'] = 'Setting | Ujian Berbasis Komputer';

     	$this->header($data);
     	$this->load->view('setting');
     	$this->load->view('template/footer');
     }
     function gantipass(){
     	$password = $this->input->post('passLama');
     	$passwordBaru = $this->input->post('konfirPass');

     	$whr = ['id_siswa' => $this->session->id];
     	$cek = $this->m_user->cekpass($whr)->row_array();
     	if ($password != $cek['password']) {
     		# code...
     		$this->session->set_flashdata('repass', 'Password lama tidak cocok !');
     		redirect('setting');
     	}
     	else{
     		$data = ['password' => $passwordBaru];
     		$this->m_user->gantipass($data, $whr);
               $this->session->set_flashdata('repass', 'Password berhasil diubah');
               redirect('setting');
     	}
     }
      function gantiprtnyan(){
          $pertanyaan = $this->input->post('pertanyaan');
          $jawaban = $this->input->post('konfirJawaban');
          $whr = ['id_siswa' => $this->session->id];
          $data = [
               'pertanyaan' => $pertanyaan,
               'jawaban' => $jawaban
          ];
          $this->m_user->gantipass($data, $whr);
          $this->session->set_flashdata('reper', 'Pertanyaan dan jawaban berhasil diubah');
          redirect('setting');
      }

}