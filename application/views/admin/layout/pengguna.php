<?= $this->session->flashdata('success_upload'); ?>
<?= $this->session->flashdata('error_upload'); ?>
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="box box-solid">
			<div class="box-header with-border">
				<button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-tambah">
				<i class="fa fa-user"></i> Tambah Pengguna
				</button>
			</div>
			<div class="box-body">
				<div class="table-responsive">
					<table class="table table-bordered" id="data-tables">
						<thead>
							<tr class="bg-blue">
								<th>No</th>
								<th>Nama</th>
								<th>Jabatan</th>
								<th>Option</th>
							</tr>
						</thead>
						<tbody>
							<?php
							foreach ($data as $row) {
								$nim = $row->nim;
								$nama = $row->nama_pengguna;
								$jenis_kelamin = $row->jenis_kelamin;
								$jabatan = $row->jabatan;
								$id_ormawa = $row->nama_ormawa;
								$password = $row->password;
								$status = $row->status;
								$telp = $row->telp;
								$role = $row->id_role;

								//Jenis pengguna
								if ($role == 0) {
									$jenis = "Dpm";
								}else{
									$jenis = "Kemahasiswaan";
								}
								//Status Pengguna
								if ($status == 0) {
									$hasil = "Aktif";
								}else{
									$hasil = "Nonaktif";
								}
							?>
							<tr>
								<td><?= $nim;?></td>
								<td><?= $nama;?></td>
								<td><?= $jabatan;?></td>
								<td>
									<button class="btn btn-success" type="button" data-toggle="modal" data-placement="top" title="Edit" data-target="#modal-edit" onclick="edit_pengguna('<?= $nim;?>','<?= $nama;?>','<?= $jenis_kelamin;?>','<?= $jabatan;?>','<?= $id_ormawa;?>','<?= $password;?>','<?= $status;?>','<?= $telp;?>','<?= $role;?>')"><i class="fa fa-pencil"></i></button>
									<?= '
									<button type="button" data-toggle="modal" data-placement="top" title="Detail" data-target="#ModalDetail" id="'.$nim.'|'.$nama.'|'.$jenis_kelamin.'|'.$jabatan.'|'.$id_ormawa.'|'.$password.'|'.$hasil.'|'.$telp.'|'.$jenis.'|" class="btn btn-primary detail-pengguna"><i class="fa fa-info"></i></button>
									';?>
									<button class="btn btn-danger" type="button" data-toggle="modal" data-placement="top" title="Hapus" data-target="#modal-hapus" onclick="hapus_pengguna('<?= $nim?>')" ><i class="fa fa-trash"></i></button>
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
				<form class="form-horizontal" method="post" enctype="multipart/form-data" action="<?= base_url('admin/pengguna/add')?>">
					<div class="box-header">
						<div class="box-footer bg-blue"
							<h4 class="pull-left" style="color: #fff;"><i class="fa fa-user"></i> Tambah Pengguna</h4>
						</div>
					</div>
					<div class="box-body">
						<input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" style="display: none">
						<div class="form-group">
							<label for="" class="col-md-2 col-sm-2 col-xs-2 control-label">Nim</label>
							<div class="col-md-10 col-sm-10 col-xs-10">
								<input type="text" class="form-control" name="nim" required="">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-md-2 col-sm-2 col-xs-2 control-label">Nama</label>
							<div class="col-md-10 col-sm-10 col-xs-10">
								<input type="text" class="form-control" name="nama" required="">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-md-2 col-sm-2 col-xs-2 control-label">Jenis Kelamin</label>
							<div class="col-md-10 col-sm-10 col-xs-10">
								<select name="jenis_kelamin" class="form-control" required="">
									<option value=""></option>
									<option value="Laki-laki">Laki-laki</option>
									<option value="Perempuan">Perempuan</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-md-2 col-sm-2 col-xs-2 control-label">Jabatan</label>
							<div class="col-md-10 col-sm-10 col-xs-10">
								<input type="text" class="form-control" name="jabatan" required="">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-md-2 col-sm-2 col-xs-2 control-label">Nama Ormawa</label>
							<div class="col-md-10 col-sm-10 col-xs-10">
								<select name="id_ormawa" class="form-control" required="">
									<option value=""></option>
									<?php 
									foreach ($ormawa as $key) {
										$id = $key->id;
										$nama = $key->nama;
										?>
										<option value="<?=$id?>"><?=$nama?></option>
									<?php
									}
									?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-md-2 col-sm-2 col-xs-2 control-label">Password</label>
							<div class="col-md-10 col-sm-10 col-xs-10">
								<input type="password" class="form-control" name="password" required="">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-md-2 col-sm-2 col-xs-2 control-label">Status</label>
							<div class="col-md-10 col-sm-10 col-xs-10">
								<select name="status" class="form-control" required="">
									<option value=""></option>
									<option value="0">Aktif</option>
									<option value="1">Nonaktif</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-md-2 col-sm-2 col-xs-2 control-label">Telp</label>
							<div class="col-md-10 col-sm-10 col-xs-10">
								<input type="text" class="form-control" name="telp" required="">
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
				<form class="form-horizontal" method="post" enctype="multipart/form-data" action="<?= base_url('admin/pengguna/edit')?>">
					<div class="box-header">
						<div class="box-footer bg-blue">
							<h4 class="pull-left" style="color: #fff;"><i class="fa fa-user"></i> Edit Pengguna</h4>
						</div>
					</div>
					<div class="box-body">
						<input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" style="display: none">
						<div class="form-group">
							<label for="" class="col-md-2 col-sm-2 col-xs-2 control-label">Nim</label>
							<div class="col-md-10 col-sm-10 col-xs-10">
								<input type="text" class="form-control" id="edit_nim" name="nim">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-md-2 col-sm-2 col-xs-2 control-label">Nama</label>
							<div class="col-md-10 col-sm-10 col-xs-10">
								<input type="text" class="form-control" id="edit_nama" name="nama">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-md-2 col-sm-2 col-xs-2 control-label">Jenis Kelamin</label>
							<div class="col-md-10 col-sm-10 col-xs-10">
								<select name="jenis_kelamin" id="edit_kelamin" class="form-control">
									<option value="Laki-laki">Laki-laki</option>
									<option value="Perempuan">Perempuan</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-md-2 col-sm-2 col-xs-2 control-label">Jabatan</label>
							<div class="col-md-10 col-sm-10 col-xs-10">
								<input type="text" class="form-control" id="edit_jabatan" name="jabatan">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-md-2 col-sm-2 col-xs-2 control-label">Nama Ormawa</label>
							<div class="col-md-10 col-sm-10 col-xs-10">
								<select name="id_ormawa" id="edit_ormawa" class="form-control">
									<option value=""></option>
									<?php 
									foreach ($ormawa as $key) {
										$id = $key->id;
										$nama = $key->nama;
										?>
										<option value="<?=$id?>" <?php if($id == $id){ echo 'selected="selected"'; } ?>><?=$nama?></option>
									<?php
									}
									?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-md-2 col-sm-2 col-xs-2 control-label">Password</label>
							<div class="col-md-10 col-sm-10 col-xs-10">
								<input type="password" id="edit_password" class="form-control" name="password">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-md-2 col-sm-2 col-xs-2 control-label">Status</label>
							<div class="col-md-10 col-sm-10 col-xs-10">
								<select name="status" id="edit_status" class="form-control">
									<option value="0">Aktif</option>
									<option value="1">Nonaktif</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-md-2 col-sm-2 col-xs-2 control-label">Telp</label>
							<div class="col-md-10 col-sm-10 col-xs-10">
								<input type="text" class="form-control" name="telp" id="edit_telp" required="">
							</div>
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
				<h4 class="modal-title"><i class="fa fa-user"></i> Detail Pengguna</h4>
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
					<input type="hidden" name="hapus_nim" id="hapus_nim">
					Anda Yakin Ingin Menghapus Data Ini ?
				</div>
				<div class="modal-footer bg-blue">
					<div class="btn-group btn-group-sm pull-right">
						<button id="btn_hapus" name="btn_hapus" formaction="<?= base_url('admin/pengguna/delete'); ?>" type="submit" class="btn btn-success ajax-loader">
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
		$("#IsiModal").html('<table class="table table-responsive table-striped"><tbody><tr><th>Nim</th><td> : '+datanya[0]+'</td></tr><tr><th>Nama</th><td> : '+datanya[1]+'</td></tr><tr><th>Jenis Kelamin</th><td> : '+datanya[2]+'</td></tr><th>Jabatan</th><td> : '+datanya[3]+'</td><tr><th>ID Ormawa</th><td> : '+datanya[4]+'</td></tr><tr><th>Password</th><td> : '+datanya[5]+'</td></tr><tr><th>Status</th><td> : '+datanya[6]+'</td></tr><tr><th>Telp</th><td> : '+datanya[7]+'</td></tr><tr><th>Jenis Pengguna</th><td> : '+datanya[8]+'</td></tr></tbody></table>');
		});
	
	});
</script>
<script>
	function edit_pengguna(a,b,c,d,e,f,g,h,i) {
		$('#edit_nim').val(a);
		$('#edit_nama').val(b);
		$('#edit_kelamin').val(c);
		$('#edit_jabatan').val(d);
		$('#edit_ormawa').val(e);
		$('#edit_password').val(f);
		$('#edit_status').val(g);
		$('#edit_telp').val(h);
		$('#edit_role').val(i);
	}
	
</script>
<script>
	function hapus_pengguna(a) {
		$('#hapus_nim').val(a);
	}
</script>