<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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

	//Header
	private function header($data){
		$this->load->view('template/header', $data);
	}

     //Index
     public function index(){
     	$data['title'] = 'Ujian Berbasis Komputer';

     	$this->header($data);
        $this->load->view('utama');
        $this->load->view('template/footer');
     }

     //Profil
     public function profil(){
     	$data['title'] = 'Profil | Ujian Berbasis Komputer';

     	$this->header($data);
     	$this->load->view('profil');
     	$this->load->view('template/footer');
     }

}