<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Kemahasiswaan extends CI_Controller
{
	
	public function index()
	{
		$data = array(
			'page' => 'kemahasiswaan',
			'Title'	=> 'Kemahasiswaan'
		);

		$this->load->view('backend/template', $data);
	}
}


?>