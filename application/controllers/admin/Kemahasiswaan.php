<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Kemahasiswaan extends CI_Controller
{
	
	public function index()
	{
		$data = array(
			'page' => 'kemahasiswaan',
			'Title'	=> 'Kemahasiswaan',
			'data' => $this->m_kemahasiswaan->data()
		);

		$this->load->view('admin/template', $data);
	}

	public function add()
	{
		$this->form_validation->set_rules('status','status','required');
		if ($this->form_validation->run()==TRUE) {
			$insert = array(
				'niy' => $this->input->post('niy'),
				'nama' => $this->input->post('nama'),
				'jenis_kelamin' => $this->input->post('jenis_kelamin'),
				'password' => $this->input->post('password'),
				'status' => $this->input->post('status'),
				'telp' => $this->input->post('telp')
			);
			//Simpan kedalam tabel user_ormawa
			$this->db->insert('kemahasiswaan', $insert);
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
			redirect('admin/kemahasiswaan');
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
	    redirect('admin/kemahasiswaan');    
		}
	}

	public function edit()
	{
		$this->form_validation->set_rules('niy','niy','required');
		$niy['niy'] = $this->input->post('niy');
		if ($this->form_validation->run()==TRUE) {
			$update = array(
				'niy' => $this->input->post('niy'),
				'nama' => $this->input->post('nama'),
				'jenis_kelamin' => $this->input->post('jenis_kelamin'),
				'password' => $this->input->post('password'),
				'status' => $this->input->post('status'),
				'telp' => $this->input->post('telp')
			);
			//Simpan kedalam tabel user_ormawa
			$this->db->update('kemahasiswaan', $update, $niy);
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
			redirect('admin/kemahasiswaan');
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
	    redirect('admin/kemahasiswaan');
		}
	}
	public function delete()
	{
		$niy['niy'] = $this->input->post('hapus_niy');
		$this->db->delete("kemahasiswaan", $niy);
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
	    redirect('admin/kemahasiswaan');
	}
}
?>