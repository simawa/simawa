<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Dpm extends CI_Controller
{
	
	public function index()
	{
		$data = array(
			'page' => 'dpm',
			'Title'	=> 'Dpm',
			'data' => $this->m_dpm->data()
		);

		$this->load->view('admin/template', $data);
	}

	public function add()
	{
		$this->form_validation->set_rules('status','status','required');
		if ($this->form_validation->run()==TRUE) {
			$insert = array(
				'nim' => $this->input->post('nim'),
				'nama' => $this->input->post('nama'),
				'jenis_kelamin' => $this->input->post('jenis_kelamin'),
				'jabatan' => $this->input->post('jabatan'),
				'password' => $this->input->post('password'),
				'status' => $this->input->post('status'),
				'telp' => $this->input->post('telp')
			);
			//Simpan kedalam tabel user_ormawa
			$this->db->insert('dpm', $insert);
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
			redirect('admin/dpm');
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
		$this->form_validation->set_rules('edit_status','edit_status','required');
		$nim['nim'] = $this->input->post('edit_nim');
		if ($this->form_validation->run()==TRUE) {
			$update = array(
				'nim' => $this->input->post('edit_nim'),
				'nama' => $this->input->post('edit_nama'),
				'jenis_kelamin' => $this->input->post('edit_kelamin'),
				'jabatan' => $this->input->post('edit_jabatan'),
				'password' => $this->input->post('edit_password'),
				'status' => $this->input->post('edit_status'),
				'telp' => $this->input->post('edit_telp')
			);
			//Simpan kedalam tabel user_ormawa
			$this->db->update('dpm', $update, $nim);
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
			redirect('admin/dpm');
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
	    redirect('admin/dpm');
		}
	}
	public function delete()
	{
		$nim['nim'] = $this->input->post('hapus_nim');
		$this->db->delete("dpm", $nim);
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
	    redirect('admin/dpm');
	}
}
?>