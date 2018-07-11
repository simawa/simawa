<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Ormawa extends CI_Controller
{
	
	public function index()
	{
		$data = array(
			'page' => 'ormawa',
			'Title'	=> 'Ormawa',
			'data' => $this->m_pengajuan_kegiatan->data(),
			'tempat_kegiatan' => $this->m_tempat->data()

		);

		$this->load->view('ormawa/template', $data);
	}

	public function add()
	{
		$this->form_validation->set_rules('rencana_dana','rencana_dana','required');

		if ($this->form_validation->run()==TRUE) {
			$insert = array(
				'id' => time(),
				'nama_kegiatan' => $this->input->post('nama_kegiatan'),
				'tema_kegiatan' => $this->input->post('tema_kegiatan'),
				'tujuan' => $this->input->post('tujuan'),
				'sasaran' => $this->input->post('sasaran'),
				'bentuk_kegiatan' => $this->input->post('bentuk_kegiatan'),
				'tgl1' => $this->input->post('tgl1'),
				'jam1' => $this->input->post('jam1'),
				'tgl2' => $this->input->post('tgl2'),
				'jam2' => $this->input->post('jam2'),
				'rencana_dana' => $this->input->post('rencana_dana'),
				'id_tempat_kegiatan' => $this->input->post('id_tempat_kegiatan'),
				'id_ormawa' => $this->input->post('id_ormawa'),
				'id_user' => $this->input->post('id_user')
			);
			//Simpan kedalam tabel user_ormawa
			$this->db->insert('pengajuan_kegiatan', $insert);
			$this->session->set_flashdata('success_upload', "<script>
				swal({
				  position: 'top-end',
				  type: 'success',
				  title: 'Data Berhasil Disimpan',
				  showConfirmButton: false,
				  timer: 2000
				})
			</script>");
			//redirect
			redirect('ormawa/ormawa');
		}else{
			$this->session->set_flashdata('error_upload', "<script>
				swal({
				  position: 'top-end',
				  type: 'error',
				  title: 'Data Gagal Disimpan',
				  showConfirmButton: false,
				  timer: 2000
				})
			</script>");
			//redirect halaman
	    redirect('ormawa/ormawa');    
		}
	}
}


?>