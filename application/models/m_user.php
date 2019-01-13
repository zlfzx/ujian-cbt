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

}