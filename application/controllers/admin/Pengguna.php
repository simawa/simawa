<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna extends CI_Controller
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
			'page' => 'pengguna',
			'Title'	=> 'Pengguna',
			'data' => $this->m_pengguna->data(),
			'ormawa' => $this->m_ormawa->data()
		);

		$this->load->view('admin/template', $data);
	}

	public function add()
	{
		$this->form_validation->set_rules('nim','nim','required');
		if ($this->form_validation->run()==TRUE) {
			$insert = array(
				'nim' => $this->input->post('nim'),
				'nama' => $this->input->post('nama'),
				'jenis_kelamin' => $this->input->post('jenis_kelamin'),
				'jabatan' => $this->input->post('jabatan'),
				'id_ormawa' => $this->input->post('id_ormawa'),
				'password' => $this->input->post('password'),
				'status' => $this->input->post('status'),
				'telp' => $this->input->post('telp')
			);
			//Simpan kedalam tabel user_ormawa
			$this->db->insert('user_ormawa', $insert);
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
			redirect('admin/pengguna');
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
	    redirect('admin/pengguna');    
		}
	}

	public function edit()
	{
		$this->form_validation->set_rules('nim','nim','required');
		$nim['nim'] = $this->input->post('nim');
		if ($this->form_validation->run()==TRUE) {
			$update = array(
				'nim' => $this->input->post('nim'),
				'nama' => $this->input->post('nama'),
				'jenis_kelamin' => $this->input->post('jenis_kelamin'),
				'jabatan' => $this->input->post('jabatan'),
				'id_ormawa' => $this->input->post('id_ormawa'),
				'password' => $this->input->post('password'),
				'status' => $this->input->post('status'),
				'telp' => $this->input->post('telp')
			);
			//Simpan kedalam tabel user_ormawa
			$this->db->update('user_ormawa', $update, $nim);
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
			redirect('admin/pengguna');
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
	    redirect('admin/pengguna');
		}
	}
	public function delete()
	{
		$nim['nim'] = $this->input->post('hapus_nim');
		$this->db->delete("user_ormawa", $nim);
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
	    redirect('admin/pengguna');
	}
}
?>