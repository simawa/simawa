<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller {
	
	var $CI = NULL;

	public function __construct()
	{
		parent::__construct();
        // get CI's object
        $this->CI =& get_instance();        
	}

	public function index()
	{
	
	 if($this->m_dpm->logged_in())
        {
            //redirect dahsboard
            redirect('dpm/dpm');

        }else {
		//Cek Form Validasi
		$this->form_validation->set_rules('nim', 'nim', 'trim|required');
		$this->form_validation->set_rules('password', 'password', 'trim|required');
		
		if ($this->form_validation->run() == TRUE) {
			$nim = $this->input->post("nim");
			$password = $this->input->post('password');
			//checking data via model
			$checking = $this->apps->cek_user('dpm', array('nim' => $nim), array('password' => $password));
			//jika ditemukan, maka create session
			if ($checking == TRUE) {
				foreach ($checking as $user) {
						$session_data = array(
						'dpm_nim'          => $user->nim,
						'dpm_nama'        => $user->nama,
						'dpm_jabatan'       => $user->jabatan
						);
						$this->CI->session->set_userdata($session_data);
						//return TRUE;
						redirect('dpm/dpm');
						}
			}else {
				$data = array(
				'page' 		=> 'login',
				'Title'	=> 'Login'
				);
				$this->session->set_flashdata('error_upload', "<script>
				swal({
				  position: 'top-end',
				  type: 'warning',
				  title: 'Nim Atau Password Salah',
				  showConfirmButton: false,
				  timer: 2000
				})
			</script>");
			}
			} else {
				$data = array(
				'page' 		=> 'login',
				'Title'	=> 'Login',
				);
				$this->session->set_flashdata('error_upload', "<script>
				swal({
				  position: 'top-end',
				  type: 'warning',
				  title: 'Anda Harus Login Dulu',
				  showConfirmButton: false,
				  timer: 2000
				})
			</script>");
			}
			$this->load->view('dpm/layout/login', $data);
		}
	}
}