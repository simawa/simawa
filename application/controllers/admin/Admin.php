<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		//load session login
		$this->genlib->checkAdmin();
	}
	
	public function index()
	{
		$data = array(
			'page' => 'admin',
			'Title'	=> 'Admin'
		);

		$this->load->view('admin/template', $data);
	}

	public function logout()
	{
		if($this->m_admin->logged_in())
        {
            $this->session->unset_userdata('admin_id');
            redirect(site_url('admin/login'));
        }else{
            show_404();
            return FALSE;
        }
    }
}


?>