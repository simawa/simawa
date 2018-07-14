<?php

defined('BASEPATH') or exit('No Direct Script Access Allowed');

class m_pengguna extends CI_Model
{
	function data()
	{
		$query = $this->db->query('SELECT user_o.*, user_o.nama as nama_pengguna, orma.*, orma.nama as nama_ormawa FROM user_ormawa as user_o LEFT JOIN ormawa as orma ON user_o.id_ormawa = orma.id');
		return $query->result();
	}

	function profil($nim)
	{
		$query = $this->db->query("SELECT user_o.*, user_o.nama as nama_pengguna, orma.*, orma.nama as nama_ormawa FROM user_ormawa as user_o LEFT JOIN ormawa as orma ON user_o.id_ormawa = orma.id WHERE user_o.nim = $nim");
		if($query->num_rows() > 0)
        {
            return $query->row();
        }else
        {
            return NULL;
        }
	}

	//fungsi restrict halaman
	function logged_in()
	{
    return $this->session->userdata('ormawa_nim');
	}
}