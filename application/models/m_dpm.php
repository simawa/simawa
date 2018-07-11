<?php

defined('BASEPATH') or exit('No Direct Script Access Allowed');

class m_dpm extends CI_Model
{
	function data()
    {
        $query = $this->db->select('*')
            ->from('dpm')
            ->get();
        return $query->result();
    }
}