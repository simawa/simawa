<?php

defined('BASEPATH') or exit('No Direct Script Access Allowed');

class apps extends CI_Model
{
    //fungsi check login all
    function cek_user($table, $field1, $field2)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($field1);
        $this->db->where($field2);
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            return $query->result();
        }
    }
//fungsi membuat tanggal
    function tgl_indo_no_hari($date = null)
    {
        //buat array nama hari dalam bahasa Indonesia dengan urutan 1-7
        $array_hari = array(1 => 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu');
        //buat array nama bulan dalam bahasa Indonesia dengan urutan 1-12
        $array_bulan = array(1 => 'Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Juni', 'Juli', 'Agust',
            'Sept', 'Okt', 'Nov', 'Des');
        if ($date == null) {
            //jika $date kosong, makan tanggal yang diformat adalah tanggal hari ini
            $hari = $array_hari[date('N')];
            $tanggal = date('j');
            $bulan = $array_bulan[date('n')];
            $tahun = date('Y');
        } else {
            //jika $date diisi, makan tanggal yang diformat adalah tanggal tersebut
            $date = strtotime($date);
            $hari = $array_hari[date('N', $date)];
            $tanggal = date('j', $date);
            $bulan = $array_bulan[date('n', $date)];
            $tahun = date('Y', $date);
        }
        $formatTanggal = $tanggal . " " . $bulan . " " . $tahun;
        return $formatTanggal;
    }

    //Fungsi membuat jam
    function jam_format($time = null)
    {
        $jamformat = date("H:i", strtotime($time));
        $formatJam = $jamformat;
        return $formatJam;
    }

    //Fungsi Tanggal Indo
    function tgl_indo($date=null)
    {
        $tglindo = date("y-m-d", strtotime($date));
        $formatTanggal = $tglindo;
        return $formatTanggal;
    }
    
}