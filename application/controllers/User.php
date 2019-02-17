<?php
defined('BASEPATH') OR exit('No direct script access allowed');

date_default_timezone_set("Asia/Jakarta");

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
          $this->db->query('SET time_zone="+7:00"');
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
          $whrkelas = ['kelas.kode_kelas' => $this->session->userdata('kelas')];
          $data['jdwlujian'] = $this->m_user->jadwal_ujian($whrkelas)->result();

     	$this->header($data);
          $this->load->view('utama');
          $this->load->view('template/footer');
     }

     //Ujian
     public function ujian($id_ujian){
          //def session siswa
          $data['sess_id'] = $this->session->userdata('id');
          $data['sess_nama'] = $this->session->userdata('nama');

          

          //data ujian
          $whr_ujian = ['id_ujian' => $id_ujian];
          $data['ujian'] = $this->m_user->ujian($whr_ujian)->row_array();
          if (count($data['ujian']) < 1) {
               redirect('');
          }
          else{
               $data['title'] = $data['ujian']['nama_ujian'].' | '.$data['ujian']['mapel'];

               $this->header($data);
               $this->load->view('ujian');
               $this->load->view('template/footer');
          }
     }
     //fungsi proses ujian
     function simpan(){
          echo '1';
     }
     public function ujian_selesai(){
          $data['title'] = 'Ujian Selesai';

          $this->header($data);
          $this->load->view('waktu_habis');
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