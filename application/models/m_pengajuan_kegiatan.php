<?php

defined('BASEPATH') or exit('No Direct Script Access Allowed');

class m_pengajuan_kegiatan extends CI_Model
{
	function data()
    {
        $query = $this->db->select('*')
            ->from('pengajuan_kegiatan')
            ->get();
        return $query->result();
    }
}