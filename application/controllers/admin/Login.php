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
	
	 if($this->m_admin->logged_in())
        {
            //redirect dahsboard
            redirect('admin/admin/');

        }else {
		//Cek Form Validasi
		$this->form_validation->set_rules('email', 'email', 'trim|required');
		$this->form_validation->set_rules('password', 'password', 'trim|required');
		
		if ($this->form_validation->run() == TRUE) {
			$email = $this->input->post("email");
			$password = $this->input->post('password');
			//checking data via model
			$checking = $this->apps->cek_user('admin', array('email' => $email), array('password' => $password));
			//jika ditemukan, maka create session
			if ($checking == TRUE) {
				foreach ($checking as $user) {
						$session_data = array(
						'admin_id'          => $user->id_admin,
						'admin_nama'        => $user->nama,
						'admin_email'       => $user->email,
						'admin_password'        => $user->password
						);
						$this->CI->session->set_userdata($session_data);
						//return TRUE;
						redirect('admin/admin');
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
				  title: 'Email Atau Password Salah',
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
			$this->load->view('admin/layout/login', $data);
		}
	}
}