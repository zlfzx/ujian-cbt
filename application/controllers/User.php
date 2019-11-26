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
		$this->load->model('M_User', 'm_user');
		if (!$this->session->userdata('login')) {
			redirect('login');
		}
	}

	//Header
	private function header($data){
		$this->load->view('_template/header', $data);
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
          $data['judul'] = 'Dashboard';
          $whrkelas = ['kelas.kode_kelas' => $this->session->userdata('kelas')];
          $data['jdwlujian'] = $this->m_user->jadwal_ujian($this->session->id)->result();

     	$this->header($data);
          $this->load->view('utama');
          $this->load->view('_template/footer');
     }

     //Ujian
     public function ujian($id_ujian){
          $c = $this->m_user->cek_detil_tes(['id_ujian' => $id_ujian]);
          if ($c->num_rows() < 1) {
               # code...
               redirect('');
          }
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
                    //$whr_q_soal = ['mapel' => $cek_detil_tes->id_mapel];
                    $kelas = $this->db->query('SELECT kelas FROM siswa WHERE id_siswa='.$this->session->id)->row();
                    $q_soal = $this->m_user->q_soal($cek_detil_tes->id_mapel, $kelas->kelas)->result();
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

                    redirect($id_ujian);
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
                    $data['detil_tes'] = $q_ambil_soal;
                    $data['data'] = $soal_urut_ok;

                    //view
                    $data['title'] = $data['detil_soal']->mapel.' | '.$data['detil_soal']->nama_ujian;
                    $data['judul'] = $data['detil_soal']->mapel;
                    $this->load->view('_template_ujian/header', $data);
                    $this->load->view('_template_ujian/ujian');
                    $this->load->view('_template_ujian/footer');
               }
          }
          else{
               //redirect ujian selesai
               $xx = $this->m_user->cek_selesai_ujian(['id_siswa' => $data['sess_id'], 'id_ujian' => $id_ujian, 'status' => 'N'])->row();
               redirect('selesai/'.$xx->id_tes);
          }
     }

     //fungsi proses ujian
     function ujian_simpan($id_tes){
          $id_siswa = $this->session->id;
          $p = json_decode(file_get_contents('php://input'));
          $update_ = '';
          for ($i=1; $i < $p->jml_soal; $i++) { 
               # code...
               $_tjawab = 'opsi_'.$i;
               $_tidsoal = 'id_soal_'.$i;
               $jawaban_ = empty($p->$_tjawab) ? '' : $p->$_tjawab;
               $update_ .= ''.$p->$_tidsoal.':'.$jawaban_.',';
          }
          $update_ = substr($update_, 0, -1);

          $this->db->query("UPDATE ikut_ujian SET list_jawaban='".$update_."' WHERE id_tes='$id_tes' AND id_siswa='$id_siswa'");
          echo $this->db->last_query();
          exit;
     }
     function ujian_akhir($id_tes){
          $id_siswa = $this->session->id;
          $p = json_decode(file_get_contents('php://input'));
          $jumlah_soal = $p->jml_soal;
          $jumlah_benar = 0;
          $update_ = '';

          for ($i=1; $i < $p->jml_soal; $i++) { 
               # code...
               $_tjawab = 'opsi_'.$i;
               $_tidsoal = 'id_soal_'.$i;
               $jawaban_ = empty($p->$_tjawab) ? '' : $p->$_tjawab;
               $cek_jwb = $this->db->query("SELECT jawaban FROM soal WHERE id_soal='".$p->$_tidsoal."'")->row();
               if ($cek_jwb->jawaban == $jawaban_) {
                    $jumlah_benar++;
               }
               $update_ .= ''.$p->$_tidsoal.':'.$jawaban_.',';
          }
          $update_ = substr($update_, 0, -1);

          $nilai = ($jumlah_benar/($jumlah_soal-1)) * 100;
          $this->db->query("UPDATE ikut_ujian SET jml_benar=".$jumlah_benar.", nilai='".$nilai."', list_jawaban='".$update_."', status='N' WHERE id_tes='$id_tes' AND id_siswa='$id_siswa'");
          $a['status'] = 'ok';
          $this->j($a);
          exit;
     }

     public function ujian_selesai($id_tes){
          if ($data['detil_tes'] = $this->m_user->detil_tes(['id_tes' => $id_tes])->num_rows() < 1) {
               redirect('');
          }
          $data['detil_tes'] = $this->m_user->detil_tes(['id_tes' => $id_tes])->row();
          $whr_detil_soal = ['id_ujian' => $data['detil_tes']->id_ujian];
          $data['detil_soal'] = $this->m_user->detil_soal($whr_detil_soal)->row();
          $data['title'] = 'Ujian Selesai';
          $data['judul'] = $data['detil_soal']->mapel;

          $this->load->view('_template_ujian/header', $data);
          $this->load->view('waktu_habis');
          $this->load->view('_template_ujian/footer');
     }

     //Setting
     public function setting(){
     	$id = ['id_siswa' => $this->session->id];
     	$data['ar'] = $this->m_user->cekdefpass($id)->row_array();
     	$data['title'] = 'Setting | Ujian Berbasis Komputer';
          $data['judul'] = 'Pengaturan';

     	$this->header($data);
     	$this->load->view('setting');
     	$this->load->view('_template/footer');
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
          $jawaban = $this->input->post('jawaban');
          $kjawaban = $this->input->post('konfirJawaban');
          if (empty($pertanyaan))  {
               $this->session->set_flashdata('reper', 'Pertanyaan belum diisi !');
               redirect('setting');
          }
          if (empty($jawaban) || empty($kjawaban))  {
               $this->session->set_flashdata('reper', 'Jawaban belum diisi !');
               redirect('setting');
          }
          if ($kjawaban != $jawaban)  {
               $this->session->set_flashdata('reper', 'Jawaban tidak sama !');
               redirect('setting');
          }
          else{
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


      //Fungsi tambahan
      public function j($data){
          header('Content-Type: application/json');
          echo json_encode($data);
      }

}