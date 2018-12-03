<?php
defined('BASEPATH') or exit('no direct script');

/**
 * 
 */
class Upload extends CI_Controller{
	
	public function index(){
		$this->load->view('upload');
	}

	public function act_upload(){
		$config['upload_path'] = './../media';
		$config['allowed_types'] = 'jpg|png|mp3';
		$config['file_name'] = $this->session->username."_".$this->session->id;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('media')) {
			# code...
			$data['error'] = $this->upload->display_errors();
			$this->load->view('upload', $data);
		}
		else{
			$data['data'] = $this->upload->data();
			$this->load->view('upload', $data);
		}
	}
}