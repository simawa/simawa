<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Dpm extends CI_Controller
{
	
	public function index()
	{
		$data = array(
			'page' => 'dpm',
			'Title'	=> 'Dpm'
		);

		$this->load->view('dpm/template', $data);
	}
}


?>