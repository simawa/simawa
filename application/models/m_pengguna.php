<?php

defined('BASEPATH') or exit('No Direct Script Access Allowed');

class m_pengguna extends CI_Model
{
	function data()
	{
		$query = $this->db->query('SELECT user_o.*, user_o.nama as nama_pengguna, orma.*, orma.nama as nama_ormawa FROM user_ormawa as user_o LEFT JOIN ormawa as orma ON user_o.id_ormawa = orma.id');
		return $query->result();
	}
}