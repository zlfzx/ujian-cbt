<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class m_user extends CI_Model{
	
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