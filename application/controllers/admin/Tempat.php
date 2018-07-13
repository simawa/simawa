<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Tempat extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		//load session login
		$this->genlib->checkAdmin();
	}
	
	public function index()
	{
		$data = array(
			'page' => 'tempat',
			'Title'	=> 'Tempat',
			'data'	=> $this->m_tempat->data()
		);

		$this->load->view('admin/template', $data);
	}

	public function add()
	{
		$this->form_validation->set_rules('nama','nama','required');

		if ($this->form_validation->run()==TRUE) {
			$insert = array(
				'id' => time(),
				'nama' => $this->input->post('nama')
			);
			//Simpan kedalam tabel user_ormawa
			$this->db->insert('tempat_kegiatan', $insert);
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
			redirect('admin/tempat');
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
	    redirect('admin/tempat');    
		}
	}

	public function edit()
	{
		$this->form_validation->set_rules('edit_nama','edit_nama','required');
		$id['id'] = $this->input->post('edit_id');
		if ($this->form_validation->run()==TRUE) {
			$update = array(
				'id' => $this->input->post('edit_id'),
				'nama' => $this->input->post('edit_nama')
			);
			//Simpan kedalam tabel user_ormawa
			$this->db->update('tempat_kegiatan', $update, $id);
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
			redirect('admin/tempat');
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
	    redirect('admin/tempat');
		}
	}
	public function delete()
	{
		$id['id'] = $this->input->post('hapus_id');
		$this->db->delete("tempat_kegiatan", $id);
	    //deklarasi session flashdata
	    $this->session->set_flashdata('success_upload', "<script>
				swal({
				  position: 'top-end',
				  type: 'success',
				  title: 'Data Berhasil Dihapus',
				  showConfirmButton: false,
				  timer: 2000
				})
			</script>");
	    //redirect halaman
	    redirect('admin/tempat');
	}
}
