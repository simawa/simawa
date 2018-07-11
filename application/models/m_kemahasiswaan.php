<?php

defined('BASEPATH') or exit('No Direct Script Access Allowed');

class m_kemahasiswaan extends CI_Model
{
	function data()
    {
        $query = $this->db->select('*')
            ->from('kemahasiswaan')
            ->get();
        return $query->result();
    }
}