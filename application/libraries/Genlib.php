<?php 
defined('BASEPATH') OR exit('Access Denied');
class Genlib {
    protected $CI;

    public function __construct() {
    $this->CI = &get_instance(); 
    }
    
    public function checkAdmin() {
        if (empty($_SESSION['admin_id'])) {
            //redirect to log in page            
            redirect(site_url('admin/login')); //redirects to login page
        } 
        else {
             return TRUE;
        }
    }

    public function checkOrmawa() {
        if (empty($_SESSION['ormawa_nim'])) {
            //redirect to log in page            
            redirect(site_url('ormawa/login')); //redirects to login page
        } 
        else {
             return TRUE;
        }
    }

}

