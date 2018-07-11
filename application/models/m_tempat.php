<?php

defined('BASEPATH') or exit('No Direct Script Access Allowed');

class m_tempat extends CI_Model
{
	function data()
    {
        $query = $this->db->select('*')
            ->from('tempat_kegiatan')
            ->get();
        return $query->result();
    }
}