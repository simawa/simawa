<?php

defined('BASEPATH') or exit('No Direct Script Access Allowed');

class m_pengajuan_kegiatan extends CI_Model
{
	function data()
    {
        // $query = $this->db->select('*')
        //     ->from('pengajuan_kegiatan')
        //     ->get();
        // return $query->result();

        $query = $this->db->query("SELECT pk.*, pk.id as id_pengajuan, orw.*, usero.*, usero.nama as nama_pengguna, orw.nama as nama_ormawa, usero.nama as nama_user FROM pengajuan_kegiatan as pk LEFT JOIN ormawa as orw ON pk.id_ormawa = orw.id LEFT JOIN user_ormawa as usero ON pk.id_user = usero.nim ORDER BY pk.nama_kegiatan DESC");
        return $query->result();
    }
}