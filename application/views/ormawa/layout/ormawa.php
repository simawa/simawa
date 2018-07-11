<?= $this->session->flashdata('success_upload'); ?>
<?= $this->session->flashdata('error_upload'); ?>
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="box box-solid">
			<div class="box-header with-border">
				<button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-tambah">
				<i class="fa fa-archive"></i> Tambah Pengajuan
				</button>
			</div>
			<div class="box-body">
				<div class="table-responsive">
					<table class="table table-bordered" id="data-tables">
						<thead>
							<tr class="bg-blue">
								<th>ID</th>
								<th>Nama Kegiatan</th>
								<th>Nama Ormawa</th>
								<th>Status DPM</th>
								<th>Status Kemahasiswaan</th>
								<th>Option</th>
							</tr>
						</thead>
						<tbody>
							<?php
							foreach ($data as $row) {
								$id = $row->id;
								$nama = $row->nama_kegiatan;
								$tema = $row->tema_kegiatan;
								$tujuan = $row->tujuan;
								$sasaran = $row->sasaran;
								$bentuk_kegiatan = $row->bentuk_kegiatan;
								$tgl1 = $row->tgl1;
								$jam1 = $row->jam1;
								$tgl2 = $row->tgl2;
								$jam2 = $row->jam2;
								$rencana_dana = $row->rencana_dana;
								$id_tempat_kegiatan = $row->id_tempat_kegiatan;
								$id_ormawa = $row->id_ormawa;
								$id_user = $row->id_user;
								$status_dpm = $row->status_dpm;
								$ket_dpm = $row->keterangan_dpm;
								$status_kemahasiswaan = $row->status_kemahasiswaan;
								$ket_kemahasiswaan = $row->keterangan_kemahasiswaan;
							?>
							<tr>
								<td><?= $id;?></td>
								<td><?= $nama;?></td>
								<td><?= $id_ormawa;?></td>
								<td><?= $status_dpm;?></td>
								<td><?= $status_kemahasiswaan;?></td>
								<td>
									<button class="btn btn-success" type="button" data-toggle="modal" data-placement="top" title="Edit" data-target="#modal-edit" onclick="edit_pengajuan('<?= $id;?>','<?= $nama;?>','<?= $tema;?>','<?= $tujuan;?>','<?= $sasaran;?>','<?= $bentuk_kegiatan;?>','<?= $tgl1;?>','<?= $jam1;?>','<?= $tgl2;?>','<?= $jam2;?>','<?= $rencana_dana;?>','<?= $id_tempat_kegiatan;?>','<?= $id_ormawa;?>','<?= $id_user;?>',,'<?= $status_dpm;?>','<?= $ket_dpm;?>','<?= $status_kemahasiswaan;?>','<?= $ket_kemahasiswaan;?>')"><i class="fa fa-pencil"></i></button>
									<?= '
									<button type="button" data-toggle="modal" data-placement="top" title="Detail" data-target="#ModalDetail" id="'.$id.'|'.$nama.''.$tema.'|'.$tujuan.'|'.$sasaran.'|'.$bentuk_kegiatan.'|'.$tgl1.'|'.$jam1.'|'.$tgl2.'|'.$jam2.'|'.$rencana_dana.'|'.$id_tempat_kegiatan.'|'.$id_ormawa.'|'.$id_user.'|'.$status_dpm.'|'.$ket_dpm.'|'.$status_kemahasiswaan.'|'.$ket_kemahasiswaan.'|" class="btn btn-primary detail-pengguna"><i class="fa fa-info"></i></button>
									';?>
									<button class="btn btn-danger" type="button" data-toggle="modal" data-placement="top" title="Hapus" data-target="#modal-hapus" onclick="hapus_pengajuan('<?= $id?>')" ><i class="fa fa-trash"></i></button>
								</td>
							</tr>
							<?php
							}
							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Modal Tambah -->
<div class="modal fade" id="modal-tambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<form class="form-horizontal" method="post" enctype="multipart/form-data" action="<?= base_url('ormawa/ormawa/add')?>">
					<div class="box-header">
						<div class="box-footer bg-blue"
							<h4 class="pull-left" style="color: #fff;"><i class="fa fa-archive"></i> Tambah Pengajuan</h4>
						</div>
					</div>
					<div class="box-body">
						<input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" style="display: none">
						<!-- <div class="form-group">
							<label for="" class="col-md-2 col-sm-2 col-xs-2 control-label">ID</label>
							<div class="col-md-10 col-sm-10 col-xs-10">
								<input type="text" class="form-control" name="id" required="">
							</div>
						</div> -->
						<div class="form-group">
							<label for="" class="col-md-2 col-sm-2 col-xs-2 control-label">Nama Kegiatan</label>
							<div class="col-md-10 col-sm-10 col-xs-10">
								<input type="text" class="form-control" name="nama_kegiatan" required="">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-md-2 col-sm-2 col-xs-2 control-label">Tema Kegiatan</label>
							<div class="col-md-10 col-sm-10 col-xs-10">
								<input type="text" class="form-control" name="tema_kegiatan" required="">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-md-2 col-sm-2 col-xs-2 control-label">Tujuan</label>
							<div class="col-md-10 col-sm-10 col-xs-10">
								<input type="text" class="form-control" name="tujuan" required="">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-md-2 col-sm-2 col-xs-2 control-label">Sasaran</label>
							<div class="col-md-10 col-sm-10 col-xs-10">
								<input type="text" class="form-control" name="sasaran" required="">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-md-2 col-sm-2 col-xs-2 control-label">Bentuk Kegiatan</label>
							<div class="col-md-10 col-sm-10 col-xs-10">
								<!-- <input type="text" class="form-control" name="tujuan" required=""> -->
								<select name="bentuk_kegiatan" class="form-control" required="">
									<option value=""></option>
									<option value="Lomba" name="">Lomba</option>
									<option value="Seminar" name="">Seminar</option>
									<option value="Workshop" name="">Workshop</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-md-2 col-sm-2 col-xs-2 control-label">Tanggal #1</label>
							<div class="col-md-10 col-sm-10 col-xs-10">
								<input type="date" class="form-control" name="tgl1" required="">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-md-2 col-sm-2 col-xs-2 control-label">Jam #1</label>
							<div class="col-md-10 col-sm-10 col-xs-10">
								<input type="time" class="form-control" name="jam1" required="">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-md-2 col-sm-2 col-xs-2 control-label">Tanggal #2</label>
							<div class="col-md-10 col-sm-10 col-xs-10">
								<input type="date" class="form-control" name="tgl2" required="">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-md-2 col-sm-2 col-xs-2 control-label">Jam #2</label>
							<div class="col-md-10 col-sm-10 col-xs-10">
								<input type="time" class="form-control" name="jam2" required="">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-md-2 col-sm-2 col-xs-2 control-label">Rencana Dana</label>
							<div class="col-md-10 col-sm-10 col-xs-10">
								<input type="text" class="form-control" name="rencana_dana" required="">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-md-2 col-sm-2 col-xs-2 control-label">Tempat Kegiatan</label>
							<div class="col-md-10 col-sm-10 col-xs-10">
								<select name="id_tempat_kegiatan" class="form-control" required="">
									<option value=""></option>
									<?php 
									foreach ($tempat_kegiatan as $key) {
										$id = $key->id_tempat_kegiatan;
										$nama = $key->nama;
									?>
									<option value="<?= $id; ?>"><?= $nama; ?></option>
									<?php
									}
									 ?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-md-2 col-sm-2 col-xs-2 control-label">Ormawa</label>
							<div class="col-md-10 col-sm-10 col-xs-10">
								<input type="text" class="form-control" name="id_ormawa" required="" value="Sesuai Session id_ormawa">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-md-2 col-sm-2 col-xs-2 control-label">Nama Pengguna</label>
							<div class="col-md-10 col-sm-10 col-xs-10">
								<input type="text" class="form-control" name="id_user" required="" value="Sesuai Session Nama/Nim Ormawa">
							</div>
						</div>
					</div>
					<div class="box-footer">
						<div class="btn-group btn-group-sm pull-right">
							<button id="btn_tambah" name="btn_submit" type="submit" class="btn btn-success ajax-loader">
							<i class="fa fa-check"></i> Simpan
							</button>
							<button data-dismiss="modal" type="button" class="btn btn-danger" aria-label="Close">
							<i class="fa fa-times"></i> Batal
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- Modal Edit -->
<div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<form class="form-horizontal" method="post" enctype="multipart/form-data" action="<?= base_url('admin/ormawa/edit')?>">
					<div class="box-header">
						<div class="box-footer bg-blue">
							<h4 class="pull-left" style="color: #fff;"><i class="fa fa-archive"></i> Edit Pengajuan</h4>
						</div>
					</div>
					<div class="box-body">
						<input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" style="display: none">
						<div class="form-group">
							<label for="" class="col-md-2 col-sm-2 col-xs-2 control-label">ID</label>
							<div class="col-md-10 col-sm-10 col-xs-10">
								<input type="text" class="form-control" name="id" id="id" required="" readonly="">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-md-2 col-sm-2 col-xs-2 control-label">Nama Kegiatan</label>
							<div class="col-md-10 col-sm-10 col-xs-10">
								<input type="text" class="form-control" name="nama_kegiatan" id="nama_kegiatan" required="">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-md-2 col-sm-2 col-xs-2 control-label">Tema Kegiatan</label>
							<div class="col-md-10 col-sm-10 col-xs-10">
								<input type="text" class="form-control" name="tema_kegiatan" id="tema_kegiatan" required="">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-md-2 col-sm-2 col-xs-2 control-label">Tujuan</label>
							<div class="col-md-10 col-sm-10 col-xs-10">
								<input type="text" class="form-control" name="tujuan" id="tujuan" required="">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-md-2 col-sm-2 col-xs-2 control-label">Sasaran</label>
							<div class="col-md-10 col-sm-10 col-xs-10">
								<input type="text" class="form-control" name="sasaran" id="sasaran" required="">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-md-2 col-sm-2 col-xs-2 control-label">Bentuk Kegiatan</label>
							<div class="col-md-10 col-sm-10 col-xs-10">
								<!-- <input type="text" class="form-control" name="tujuan" id="" required=""> -->
								<select name="bentuk_kegiatan" class="form-control" id="bentuk_kegiatan" required="">
									<option value=""></option>
									<option value="Lomba" name="">Lomba</option>
									<option value="Seminar" name="">Seminar</option>
									<option value="Workshop" name="">Workshop</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-md-2 col-sm-2 col-xs-2 control-label">Tanggal #1</label>
							<div class="col-md-10 col-sm-10 col-xs-10">
								<input type="date" class="form-control" name="tgl1" id="tgl1" required="">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-md-2 col-sm-2 col-xs-2 control-label">Jam #1</label>
							<div class="col-md-10 col-sm-10 col-xs-10">
								<input type="time" class="form-control" name="jam1" id="jam1" required="">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-md-2 col-sm-2 col-xs-2 control-label">Tanggal #2</label>
							<div class="col-md-10 col-sm-10 col-xs-10">
								<input type="date" class="form-control" name="tgl2" id="tgl2" required="">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-md-2 col-sm-2 col-xs-2 control-label">Jam #2</label>
							<div class="col-md-10 col-sm-10 col-xs-10">
								<input type="time" class="form-control" name="jam2" id="jam2" required="">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-md-2 col-sm-2 col-xs-2 control-label">Rencana Dana</label>
							<div class="col-md-10 col-sm-10 col-xs-10">
								<input type="text" class="form-control" name="rencana_dana" id="rencana_dana" required="">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-md-2 col-sm-2 col-xs-2 control-label">Tempat Kegiatan</label>
							<div class="col-md-10 col-sm-10 col-xs-10">
								<select name="id_tempat_kegiatan" class="form-control" id="id_tempat_kegiatan" required="">
									<option value=""></option>
									<?php 
									foreach ($tempat_kegiatan as $key) {
										$id = $key->id_tempat_kegiatan;
										$nama = $key->nama;
									?>
									<option value="<?= $id; ?>"><?= $nama; ?></option>
									<?php
									}
									 ?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-md-2 col-sm-2 col-xs-2 control-label">Ormawa</label>
							<div class="col-md-10 col-sm-10 col-xs-10">
								<input type="text" class="form-control" name="id_ormawa" id="id_ormawa" required="" value="Sesuai Session id_ormawa" readonly="">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-md-2 col-sm-2 col-xs-2 control-label">Nama Pengguna</label>
							<div class="col-md-10 col-sm-10 col-xs-10">
								<input type="text" class="form-control" name="id_user" id="id_user" required="" value="Sesuai Session Nama/Nim Ormawa" readonly="">
							</div>
						</div>
					<div class="box-footer">
						<div class="btn-group btn-group-sm pull-right">
							<button id="btn_edit" name="btn_submit" type="submit" class="btn btn-success ajax-loader">
							<i class="fa fa-check"></i> Simpan
							</button>
							<button data-dismiss="modal" type="button" class="btn btn-danger" aria-label="Close">
							<i class="fa fa-times"></i> Batal
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- Modal Detail -->
<div class="modal fade" id="ModalDetail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog modal-xl" role="document">
		<div class="modal-content">
			<div class="modal-header bg-blue">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title"><i class="fa fa-archive"></i> Detail Pengajuan</h4>
			</div>
			<div class="modal-body" id="IsiModal">
			</div>
		</div>
	</div>
</div>
<!-- Modal Hapus -->
<div class="modal modal-default fade" id="modal-hapus">
	<div class="modal-dialog">
		<div class="modal-content">
			<form method="post">
				<div class="modal-body">
					<input type="hidden" name="hapus_id" id="hapus_id">
					Anda Yakin Ingin Menghapus Data Ini ?
				</div>
				<div class="modal-footer bg-blue">
					<div class="btn-group btn-group-sm pull-right">
						<button id="btn_hapus" name="btn_hapus" formaction="<?= base_url('admin/ormawa/delete'); ?>" type="submit" class="btn btn-success ajax-loader">
						<i class="fa fa-check"></i> Simpan
						</button>
						<button data-dismiss="modal" type="button" class="btn btn-danger" aria-label="Close">
						<i class="fa fa-times"></i> Batal
						</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

<script>
$(document).ready(function() {
		// ketika tombol detail ditekan
		$(".detail-pengguna").on("click", function(){
		// ambil nilai id dari link print
		var DataAgenda= this.id;
		var datanya = DataAgenda.split("|");
		// bagian ini yang akan ditampilkan pada modal bootstrap
        // pengetikan HTML tidak boleh dienter, karena oleh javascript akan dibaca \r\n sehingga
        // modal bootstrap tidak akan jalan
		$("#IsiModal").html('<table class="table table-responsive table-striped"><tbody><tr><th>ID</th><td> : '+datanya[0]+'</td></tr><tr><th>Nama</th><td> : '+datanya[1]+'</td></tr></tbody></table>');
		});
	
	});
</script>
<script>
	function edit_pengajuan(a,b,c,d,e,f,g,h,i,j,k,l,m,n) {
		$('#id').val(a);
		$('#nama_kegiatan').val(b);
		$('#tema_kegiatan').val(c);
		$('#tujuan').val(d);
		$('#sasaran').val(e);
		$('#bentuk_kegiatan').val(f);
		$('#tgl1').val(g);
		$('#jam1').val(h);
		$('#tgl2').val(i);
		$('#jam2').val(j);
		$('#rencana_dana').val(k);
		$('#id_tempat_kegiatan').val(l);
		$('#id_ormawa').val(m);
		$('#id_user').val(n);
	}
	
</script>
<script>
	function hapus_pengauan(a) {
		$('#hapus_id').val(a);
	}
</script>