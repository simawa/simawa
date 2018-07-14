<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Dpm extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		//load session login
		$this->genlib->checkDpm();
	}

	public function index()
	{
		$data = array(
			'page' => 'dpm',
			'Title'	=> 'Dpm',
			'data' => $this->m_pengajuan_kegiatan->data()
		);

		$this->load->view('dpm/template', $data);
	}

	public function logout()
	{
		if($this->m_dpm->logged_in())
        {
            $this->session->unset_userdata('dpm_nim');
            redirect(site_url('dpm/login'));
        }else{
            show_404();
            return FALSE;
        }
    }

}


?>