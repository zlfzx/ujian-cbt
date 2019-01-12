<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_user');
    }

    //index
    public function index(){
        if($this->session->status){
            redirect('');
        }
        $this->load->view('template/login');
    }
	public function actlogin(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$hak = $this->input->post('akses');
		$where = array('username' => $username, 'password' => $password);
		if($hak == 'admin'){
			$cek = $this->m_admin->login_admin($where);
			if($cek->num_rows() > 0){
				$d = $cek->row_array();
				$data = array(
					'id' => $d['id_admin'],
					'nama' => $d['nama'],
					'username' => $d['username'],
					'status' => 'admin'
				);
				$this->session->set_userdata($data);
				redirect('');
			}
			else{
				$this->session->set_flashdata('gagal', 'Username / Password salah');
				redirect('login');
			}
		}
		if ($hak == 'guru') {
			# code...
			$cek = $this->m_admin->login_guru($where);
			if ($cek->num_rows() > 0) {
				# code...
				$d = $cek->row_array();
				$data = array(
					'id' => $d['id_guru'],
					'nama' => $d['nama'],
					'username' => $d['username'],
					'mapel' => $d['mapel'],
					'status' => 'guru'
				);
				$this->session->set_userdata($data);
				redirect('');
            }
            else{
				$this->session->set_flashdata('gagal', 'Username / Password salah');
                redirect('login');
            }
		}
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