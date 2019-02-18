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

          $whr_cek_sdh_selesai = ['id_siswa' => $data['sess_id'], 'id_ujian' => $id_ujian, 'status' => 'N'];
          $cek_sdh_selesai = $this->m_user->cek_selesai_ujian($whr_cek_sdh_selesai)->num_rows();

          if ($cek_sdh_selesai < 1) {
               # jika belum selesai ujian | ambil detil soal
               $whr_cek_detil_tes = ['id_ujian' => $id_ujian];
               $cek_detil_tes = $this->m_user->cek_detil_tes($whr_cek_detil_tes)->row();

               $whr_cek_sdh_ujian = ['id_ujian' => $id_ujian, 'id_siswa' => $data['sess_id']];
               $cek_sdh_ujian = $this->m_user->cek_sdh_ujian($whr_cek_sdh_ujian);

               if ($cek_sdh_ujian->num_rows() < 1) {
                    # code...
                    $soal_urut_ok = array();
                    $whr_q_soal = ['mapel' => $cek_detil_tes->id_mapel];
                    $q_soal = $this->m_user->q_soal($whr_q_soal)->result();
                    $i = 0;
                    foreach ($q_soal as $q) {
                         # code...
                         $soal_per = new stdClass();
                         $soal_per->id = $q->id_soal;
                         $soal_per->soal = $q->soal;
                         $soal_per->media = $q->media;
                         $soal_per->opsi_a = $q->opsi_a;
                         $soal_per->opsi_b = $q->opsi_b;
                         $soal_per->opsi_c = $q->opsi_c;
                         $soal_per->opsi_d = $q->opsi_d;
                         $soal_per->opsi_e = $q->opsi_e;
                         $soal_per->jawaban = $q->jawaban;

                         $soal_urut_ok[$i] = $soal_per;
                         $i++;
                    }
                    $soal_urut_ok = $soal_urut_ok;

                    $list_id_soal = '';
                    $list_jw_soal = '';
                    if (!empty($q_soal)) {
                         # code...
                         foreach ($q_soal as $w) {
                              $list_id_soal .= $w->id_soal.',';
                              $list_jw_soal .= $w->id_soal.':,';
                         }
                    }
                    $list_id_soal = substr($list_id_soal, 0, -1);
                    $list_jw_soal = substr($list_jw_soal, 0, -1);
                    $waktu_mulai = date('Y-m-d H:i:s');
                    $waktu_selesai = date('Y-m-d H:i:s', strtotime('+'.$cek_detil_tes->waktu.' minutes'));

                    $data_tmbh_ujian = [
                         'id_ujian' => $id_ujian,
                         'id_siswa' => $data['sess_id'],
                         'list_soal' => $list_id_soal,
                         'list_jawaban' => $list_jw_soal,
                         'jml_benar' => 0,
                         'nilai' => 0,
                         'tgl_mulai' => $waktu_mulai,
                         'tgl_selesai' => $waktu_selesai,
                         'status' => 'Y'
                    ];
                    $this->m_user->tambah_ujian($data_tmbh_ujian);

                    $whr_detil_soal = ['id_ujian' => $id_ujian];
                    $data['detil_soal'] = $this->m_user->detil_soal($whr_detil_soal)->row();
                    $whr_detil_tes = ['id_ujian' => $id_ujian, 'id_siswa' => $data['sess_id']];
                    $data['detil_tes'] = $this->m_user->detil_tes($whr_detil_tes)->row();
                    $data['data'] = $soal_urut_ok;
               }
               else{
                    $q_ambil_soal = $this->db->query('SELECT * FROM ikut_ujian WHERE id_ujian = '.$id_ujian.' AND id_siswa = '.$data['sess_id'].'')->row();
                    $urut_soal = explode(",", $q_ambil_soal->list_jawaban);

                    $soal_urut_ok = array();

                    for ($i=0; $i < sizeof($urut_soal); $i++) { 
                         # code...
                         $pc_urut_soal = explode(":", $urut_soal[$i]);
                         $pc_urut_soal1 = empty($pc_urut_soal[1]) ? "''" : "'".$pc_urut_soal[1]."'";

                         $ambil_soal = $this->db->query('SELECT *, '.$pc_urut_soal1.' AS jawaban FROM soal WHERE id_soal = '.$pc_urut_soal[0].'')->row();
                         $soal_urut_ok[] = $ambil_soal;
                    }

                    $whr_detil_soal = ['id_ujian' => $id_ujian];
                    $data['detil_soal'] = $this->m_user->detil_soal($whr_detil_soal)->row();
                    $data['detiltes'] = $q_ambil_soal;
                    $data['data'] = $soal_urut_ok;
               }
          }
          else{
               //redirecte ujian selesai
               redirect('user/ujian_selesai');
          }

          $whwhw = ['id_ujian' => $id_ujian];
          $data['detilujian'] = $this->m_user->cek_detil_tes($whwhw)->row();
          $data['title'] = $data['detilujian']->nama_ujian;
          $this->header($data);
          $this->load->view('ujian');
          $this->load->view('template/footer');

          // //data ujian
          // $whr_ujian = ['id_ujian' => $id_ujian];
          // $data['ujian'] = $this->m_user->ujian($whr_ujian)->row_array();
          // if (count($data['ujian']) < 1) {
          //      redirect('');
          // }
          // else{
          //      $data['title'] = $data['ujian']['nama_ujian'].' | '.$data['ujian']['mapel'];

          //      $this->header($data);
          //      $this->load->view('ujian');
          //      $this->load->view('template/footer');
          // }
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