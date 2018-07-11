<?php

defined('BASEPATH') or exit('No Direct Script Access Allowed');

class m_ormawa extends CI_Model
{
	function data()
    {
        $query = $this->db->select('*')
            ->from('ormawa')
            ->get();
        return $query->result();
    }
}