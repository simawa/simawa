<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Ormawa extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		//load session login
		$this->genlib->checkOrmawa();
	}

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

	public function edit()
	{
		$this->form_validation->set_rules('id','id','required');
		
		if ($this->form_validation->run()==TRUE) {
			$id['id'] = $this->input->post('id');
			$update = array(
				'id' => $this->input->post('id'),
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
			$this->db->update('pengajuan_kegiatan', $update, $id);
			$this->session->set_flashdata('success_upload', "<script>
				swal({
				  position: 'top-end',
				  type: 'success',
				  title: 'Data Berhasil Diubah',
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
				  title: 'Data Gagal Diubah',
				  showConfirmButton: false,
				  timer: 2000
				})
			</script>");
			//redirect halaman
	    redirect('ormawa/ormawa');    
		}
	}

	public function delete()
	{
		$id['id'] = $this->input->post('hapus_id');
		$this->db->delete("pengajuan_kegiatan", $id);
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
	    redirect('ormawa/ormawa');
	}

	public function profil()
	{
		$nim['nim'] = $this->session->userdata('ormawa_nim');
		$this->form_validation->set_rules('nim','nim','required');
		if ($this->form_validation->run() == TRUE) {
			$update = array(
				'nim' => $this->input->post('nim'),
				'nama' => $this->input->post('nama'),
				'jenis_kelamin' => $this->input->post('jenis_kelamin'),
				'jabatan' => $this->input->post('jabatan'),
				'id_ormawa' => $this->input->post('id_ormawa'),
				'password' => $this->input->post('password'),
				'telp' => $this->input->post('telp')
			);
			
			$simpan = $this->db->update('user_ormawa', $update, $nim);
			
			if ($simpan) {
				//Simpan kedalam tabel user_ormawa
				$this->session->set_flashdata('success_upload', "<script>
				swal({
				  position: 'top-end',
				  type: 'success',
				  title: 'Data Berhasil Diubah',
				  showConfirmButton: false,
				  timer: 2000
				})
			</script>");
			//redirect
			redirect('ormawa/ormawa/profil');
			}else{
				$this->session->set_flashdata('error_upload', "<script>
				swal({
				  position: 'top-end',
				  type: 'success',
				  title: 'Data Gagal Diubah',
				  showConfirmButton: false,
				  timer: 2000
				})
			</script>");
			//redirect
			redirect('ormawa/ormawa');
		}
		}else{
			$nim = $this->session->userdata('ormawa_nim');
			$data = array(
			'page' => 'profil',
			'Title'	=> 'Edit Profil',
			'ormawa' => $this->m_ormawa->data(),
			'data' => $this->m_pengguna->profil($nim)
		);
			$this->load->view('ormawa/template', $data);  
		}
	}

	public function logout()
	{
		if($this->m_pengguna->logged_in())
        {
            $this->session->unset_userdata('ormawa_nim');
            redirect(site_url('ormawa/login'));
        }else{
            show_404();
            return FALSE;
        }
    }
}


?>