<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_User', 'm_user');
    }

    //index
    public function index(){
        if($this->session->userdata('login')){
            redirect('');
        }
        $this->load->view('_template_login/login');
    }
	
	function actlogin(){
		$nis = $this->input->post('nis');
		$nis = preg_replace("/[^0-9]/", "", $nis);
		$password = $this->input->post('password');
		$data = ['nis' => $nis, 'password' => $password];
		$siswa = $this->m_user->login($data);
		if($siswa->num_rows() > 0) {
			$s = $siswa->row_array();
			$data = [
				'id' => $s['id_siswa'],
				'nama' => $s['nama'],
				'nis' => $s['nis'],
				'kelas' => $s['kode_kelas'],
				'login' => true
			];
			$this->session->set_userdata($data);
			redirect('');
		}
		else{
			$this->session->set_flashdata('flash', 'NIS atau Password salah !');
			redirect('login');
		}

	}

	function logout(){
		$data = [
			'id' => '',
			'nama' => '',
			'nis' => '',
			'kelas' => '',
			'login' => false
		];
		$this->session->set_userdata($data);

		// $this->session->sess_destroy();
		redirect('login');
	}


	//Lupa Password
	//cek NIS
	function ceknis(){
		//preg_replace("/[^0-9]/", "", $var)
		$n = $this->input->post('nis');
		$nis = preg_replace("/[^0-9]/", "", $n);
		$whr = [
			'nis' => $nis
		];
		$cek = $this->m_user->ceknis($whr)->row_array();
		if (empty($cek['nis'])){
			# code...
			echo 0;
		}
		elseif (empty($cek['pertanyaan'])){
			# code...
			//echo "Anda belum mengatur pertanyaan, silahkan hubungi administrator";
			$err = ['error' => 'Anda belum mengatur pertanyaan untuk mereset password, silahkan hubungi Administrator'];
			echo json_encode($err);
		}
		else{
			echo json_encode($cek);
		}
	}
	//cek jawaban
	function cekjawab(){
		$jawaban = $this->input->post('jawaban');
		$nis = $this->input->post('nis');
		$whr = ['nis' => $nis];
		$cek = $this->m_user->cekjawab($whr)->row_array();
		if ($jawaban != $cek['jawaban']) {
			# code...
			echo 0;
		}
		else{
			echo json_encode($cek);
		}
	}
	//Reset password
	function resetpasswd(){
		$nis = $this->input->post('nis');
		$password = $this->input->post('password');
		$where = ['nis' => $nis];
		$data = ['password' => $password];
		if($this->m_user->resetpasswd('siswa', $where, $data)){
			echo 1;
		}
		$this->session->set_flashdata('flash', 'Password berhasil diubah, silahkan login !');
		redirect('login');
	}
}