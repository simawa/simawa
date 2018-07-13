	<?php 
	defined('BASEPATH') or Exit('No Direct Script Access Allowed');
	/**
	 * 
	 */
	class m_admin extends CI_Model
	{	
		//fungsi restrict halaman
    	function logged_in()
    	{
        return $this->session->userdata('admin_id');
    	}
	}
	?>
	