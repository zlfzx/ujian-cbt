<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

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
	function __construct()
	{
		parent::__construct();
		if(!$this->session->status){
			redirect('login');
		}
		$this->load->model('m_admin');
	}

	//Header
	public function header($data){
		$data['perkelas'] = $this->m_admin->perkelas()->result();

		$this->load->view('template/header', $data);
	}

	//Logout
	public function logout(){
		$this->session->sess_destroy();
		redirect('login');
	}

	//Index
	public function index(){
		//Cek Password Guru
		if($this->session->status == 'guru'){
			$where = array(
				'id_guru' => $this->session->id
			);
			$data['passwdguru'] = $this->m_admin->cek_passwd_guru($where)->row_array();
		}

		$data['title'] = 'Dashboard';

		$this->header($data);
		$this->load->view('utama');
		$this->load->view('template/footer');
	}

	// Guru
	public function guru(){
		if($this->session->status != 'admin'){
			redirect('');
		}
		$data['title'] = 'Guru';
		$data['guru'] = $this->m_admin->list_guru()->result();
		$data['listmapel'] = $this->m_admin->list_mapel()->result();

		$this->header($data);
		$this->load->view('guru');
		$this->load->view('template/footer');
	}
	public function tambah_guru(){
		if($this->session->status != 'admin'){
			redirect('');
		}
		$nama = $this->input->post('nama');
		$mapel = $this->input->post('mapel');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$data = array(
			'nama' => $nama,
			'mapel' => $mapel,
			'username' => $username,
			'password' => $password
		);
		$this->m_admin->insert_guru('guru', $data);
		redirect('guru');
	}
	public function edit_guru($id){
		if($this->session->status != 'admin'){
			redirect('');
		}
		$nama = $this->input->post('nama');
		$mapel = $this->input->post('mapel');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$where = array('id_guru' => $id);
		$data = array(
			'nama' => $nama,
			'mapel' => $mapel,
			'username' => $username,
			'password' => $password
		);
		$this->m_admin->update_guru($where, 'guru', $data);
		redirect('guru');
	}
	public function hapus_guru($id){
		if($this->session->status != 'admin'){
			redirect('');
		}
		$where = array('id_guru' => $id);
		$this->m_admin->delete_guru($where, 'guru');
		redirect('guru');
	}

	//Mapel
	public function mapel(){
		if($this->session->status != 'admin'){
			redirect('');
		}
		$data['title'] = 'Mata Pelajaran';

		$data['mapel'] = $this->m_admin->list_mapel()->result();

		$this->header($data);
		$this->load->view('mapel');
		$this->load->view('template/footer');
	}
	public function tambah_mapel(){
		if($this->session->status != 'admin'){
			redirect('');
		}
		$mapel = $this->input->post('mapel');
		$data = array('mapel' => $mapel);
		$this->m_admin->insert_mapel('mapel', $data);
		redirect('mapel');
	}
	public function edit_mapel($id){
		if($this->session->status != 'admin'){
			redirect('');
		}
		$mapel = $this->input->post('mapel');
		$where = array('id_mapel' => $id);
		$data = array('mapel' => $mapel);
		$this->m_admin->update_mapel($where, 'mapel', $data);
		redirect('mapel');
	}
	public function hapus_mapel($id){
		if($this->session->status != 'admin'){
			redirect('');
		}
		$where = array('id_mapel' => $id);
		$this->m_admin->delete_mapel($where, 'mapel');
		redirect('mapel');
	}

	//Siswa
	public function siswa(){
		if($this->session->status != 'admin'){
			redirect('');
		}
		$data['title'] = 'Siswa';
		$data['siswa'] = $this->m_admin->list_siswa()->result();
		$data['listkelas'] = $this->m_admin->list_kelas()->result();

		$this->header($data);
		$this->load->view('siswa');
		$this->load->view('template/footer');
	}
	public function tambah_siswa(){
		if($this->session->status != 'admin'){
			redirect('');
		}
		$nama = $this->input->post('nama');
		$nis = $this->input->post('nis');
		$kelas = $this->input->post('kelas');
		$password = $this->input->post('nis');
		$nohp = $this->input->post('nohp');
		$data = array(
			'nama' => $nama,
			'nis' => $nis,
			'kelas' => $kelas,
			'password' => $password,
			'nohp' => $nohp
		);
		$this->m_admin->insert_siswa('siswa', $data);
		redirect('siswa');
	}
	public function edit_siswa($id){
		if($this->session->status != 'admin'){
			redirect('');
		}
		$nama = $this->input->post('nama');
		$nis = $this->input->post('nis');
		$kelas = $this->input->post('kelas');
		$nohp = $this->input->post('nohp');
		$password = $this->input->post('password');
		$pertanyaan = $this->input->post('pertanyaan');
		$jawaban = $this->input->post('jawaban');
		$data = array(
			'nama' => $nama,
			'nis' => $nis,
			'kelas' => $kelas,
			'password' => $password,
			'nohp' => $nohp,
			'pertanyaan' => $pertanyaan,
			'jawaban' => $jawaban
		);
		$where = array('id_siswa' => $id);
		$this->m_admin->update_siswa('siswa', $data, $where);
		redirect('siswa');
	}
	public function hapus_siswa($id){
		if($this->session->status != 'admin'){
			redirect('');
		}
		$where = array('id_siswa' => $id);
		$this->m_admin->delete_siswa($where, 'siswa');
		redirect('siswa');
	}

	//Kelas
	public function kelas(){
		if($this->session->status != 'admin'){
			redirect('');
		}
		$data['title'] = 'Kelas / Jurusan';

		$data['kelas'] = $this->m_admin->list_kelas()->result();
		$data['jurusan'] = $this->m_admin->list_jurusan()->result();

		$this->header($data);
		$this->load->view('kelas');
		$this->load->view('template/footer');
	}
	public function tambah_kelas(){
		if($this->session->status != 'admin'){
			redirect('');
		}
		$kelas = $this->input->post('kelas');
		$jurusan = $this->input->post('jurusan');
		$rombel = $this->input->post('rombel');
		$kodekelas = $this->input->post('kodekelas');
		$data = array(
			'kelas' => $kelas,
			'jurusan' => $jurusan,
			'rombel' => $rombel,
			'kode_kelas' => $kodekelas
		);
		$this->m_admin->insert_kelas('kelas', $data);
		redirect('kelas');
	}
	public function edit_kelas($id){
		if($this->session->status != 'admin'){
			redirect('');
		}
		$kelas = $this->input->post('kelas');
		$jurusan = $this->input->post('jurusan');
		$rombel = $this->input->post('rombel');
		$kodekelas = $this->input->post('kodekelas');
		$data = array(
			'kelas' => $kelas,
			'jurusan' => $jurusan,
			'rombel' => $rombel,
			'kode_kelas' => $kodekelas
		);
		$where = array('id_kelas' => $id);
		$this->m_admin->update_kelas($where, 'kelas', $data);
		redirect('kelas');
	}
	public function hapus_kelas($id){
		if($this->session->status != 'admin'){
			redirect('');
		}
		$where = array('id_kelas' => $id);
		$this->m_admin->delete_kelas($where, 'kelas');
		redirect('kelas');
	}
	//Jurusan
	public function tambah_jurusan(){
		if($this->session->status != 'admin'){
			redirect('');
		}
		$jurusan = $this->input->post('jurusan');
		$data = array('jurusan' => $jurusan);
		$this->m_admin->insert_jurusan('jurusan', $data);
		redirect('kelas');
	}
	public function edit_jurusan($id){
		if($this->session->status != 'admin'){
			redirect('');
		}
		$jurusan = $this->input->post('jurusan');
		$data = array('jurusan' => $jurusan);
		$where = array('id_jurusan' => $id);
		$this->m_admin->update_jurusan($where, 'jurusan', $data);
		redirect('kelas');
	}
	public function hapus_jurusan($id){
		if($this->session->status != 'admin'){
			redirect('');
		}
		$where = array('id_jurusan' => $id);
		$this->m_admin->delete_jurusan($where, 'jurusan');
		redirect('kelas');
	}

	//Soal
	public function soal(){
		$data['title'] = 'Soal';
		
		//admin
		if($this->session->status == 'admin'){
			$data['listsoal'] = $this->m_admin->soal_admin()->result();
		}
		//Guru
		if($this->session->status == 'guru'){
			$where = array('guru' => $this->session->id);
			$data['listsoal'] = $this->m_admin->soal_guru($where)->result();
		}

		$this->header($data);
		$this->load->view('soal');
		$this->load->view('template/footer');
	}

	//Tambah Soal
	public function tambahsoal(){
		$data['title'] = 'Tambah Soal';
		$data['listmapel'] = $this->m_admin->list_mapel()->result();
		$data['listkelas'] = $this->m_admin->list_kelas()->result();
		$data['listguru'] = $this->m_admin->list_guru()->result();

		$this->header($data);
		$this->load->view('tambahsoal');
		$this->load->view('template/footer');
	}

	//Nilai
	public function nilai($pk, $pjk){
		$data['title'] = 'Nilai';
		$data['listmapel'] = $this->m_admin->list_mapel()->result();

		$data['kelas'] = $pk;
		$data['idkelas'] = $pjk;
		$where = array(
			'kelas.kelas' => $pk,
			'kelas.id_kelas' => $pjk,
			'nilai.id_kelas' => 'kelas.id_kelas',
			'siswa.kelas' => 'kelas.id_kelas',
			'nilai.id_siswa' => 'siswa.id_siswa',
			'nilai.id_mapel' => 'mapel.id_mapel'
		);
		$data['nilai'] = $this->m_admin->nilai_kelas($pk, $pjk)->result();
		$data['hitungnilai'] = $this->m_admin->nilai_kelas($pk, $pjk)->num_rows();

		$this->header($data);
		$this->load->view('nilai');
		$this->load->view('template/footer');
	}
	public function pilih_siswa_by_kelas(){
		$kelas = $this->input->post('kelas');
		$where = array('kelas' => $id);
		$data = $this->m_admin->siswa_by_kelas($where);
		echo json_encode($data);
	}

	//Ujian
	public function ujian(){
		$data['title'] = 'Ujian';

		$this->load->view('template/header', $data);
		$this->load->view('ujian');
		$this->load->view('template/footer');
	}


	//Setting
	public function setting(){
		$data['title'] = 'Pengaturan';

		$this->header($data);
		$this->load->view('setting');
		$this->load->view('template/footer');
	}
	//Admin
	public function ganti_passwd_admin(){
		$passwordlama = $this->input->post('password');
		$passwordbaru = $this->input->post('passwordbaru');
		$konfirmpassword = $this->input->post('konfirmpassword');
	}
	//Guru
	public function ganti_passwd_guru(){
		$username = $this->input->post('username');
		$passwordlama = $this->input->post('password');
		$passwordbaru = $this->input->post('passwordbaru');
		$konfirmpassword = $this->input->post('konfirmpassword');
		
		$id = array('id_guru' => $this->session->id);
		$cek = $this->m_admin->cek_passwd_guru($id)->row_array();
		if($cek['password'] == $passwordlama && $passwordbaru == $konfirmpassword && $username != $this->session->nama){
			$data = array(
				'username' => $username,
				'password' => $passwordbaru
			);
			$this->m_admin->update_passwd_guru('guru', $data, $id);
			redirect('setting');
		}
		else{
			if($username != $this->session->nama){
				$this->session->set_flashdata('username', 'Username salah !');
			}
			if($passwordlama != $cek['password']){
				$this->session->set_flashdata('passwdlama', 'Password lama salah !');
			}
			if($passwordbaru != $konfirmpassword){
				$this->session->set_flashdata('passwdbaru', 'Password baru tidak cocok !');
			}
			redirect('setting');
		}
	}

	//Error 404
	public function error(){
		$data['title'] = '404 Not Found';

		$this->header($data);
		$this->load->view('template/404');
		$this->load->view('template/footer');
	}
}
