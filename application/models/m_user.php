<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class m_user extends CI_Model{
	function login($data){
		$this->db->select('siswa.id_siswa, siswa.nama, siswa.nis, siswa.kelas, kelas.*');
		$this->db->from('siswa');
		$this->db->join('kelas', 'siswa.kelas=kelas.id_kelas');
		$this->db->where($data);
		return $this->db->get();
	}
	
	function ceknis($whr){
		$this->db->select('nis, pertanyaan');
		return $this->db->get_where('siswa', $whr);
	}
	function cekjawab($whr){
		$this->db->select('nis, jawaban');
		return $this->db->get_where('siswa', $whr);
	}
	function resetpasswd($table, $where, $data){
		$this->db->where($where);
		$this->db->update($table, $data);
	}

	function cekdefpass($id){
		$this->db->select('password, pertanyaan, jawaban');
		return $this->db->get_where('siswa', $id);
	}
	function cekpass($whr){
		$this->db->select('password');
		return $this->db->get_where('siswa', $whr);
	}
	
	function gantipass($data, $whr){
		$this->db->where($whr);
		$this->db->update('siswa', $data);
	}

	//Jadwal Ujian
	function jadwal_ujian($where){
		$this->db->select('ujian.*, kelas.id_kelas, kelas.kode_kelas, mapel.*');
        $this->db->from('ujian');
        $this->db->join('kelas', 'ujian.id_kelas=kelas.id_kelas');
        $this->db->join('mapel', 'ujian.id_mapel=mapel.id_mapel');
        $this->db->where($where);
        return $this->db->get();
	}

	//Ujian
	function ujian($whr){
		$this->db->select('*');
		$this->db->from('ujian');
		$this->db->join('mapel', 'ujian.id_mapel=mapel.id_mapel');
		$this->db->where($whr);
		return $this->db->get();
	}
}