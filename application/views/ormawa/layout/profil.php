<?= $this->session->flashdata('success_upload'); ?>
<?= $this->session->flashdata('error_upload'); ?>
<div class="box box-solid">
	<div class="box-header bg-blue">
		<label><i class="fa fa-user"></i> Edit Profil Pengguna</label>
	</div>
	<form action="<?= base_url('ormawa/ormawa/profil')?>" method="POST" class="form-horizontal">
		<div class="box-body">
			<input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" style="display: none">
			<div class="form-group">
				<label for="" class="col-md-2 col-sm-2 col-xs-2 control-label">Nim</label>
				<div class="col-md-10 col-sm-10 col-xs-10">
					<input type="text" class="form-control" name="nim" readonly="" required="" value="<?= $this->session->userdata('ormawa_nim');?>">
				</div>
			</div>
			<div class="form-group">
				<label for="" class="col-md-2 col-sm-2 col-xs-2 control-label">Nama</label>
				<div class="col-md-10 col-sm-10 col-xs-10">
					<input type="text" class="form-control" name="nama" required="" value="<?= $data->nama_pengguna;?>">
				</div>
			</div>
			<div class="form-group">
				<label for="" class="col-md-2 col-sm-2 col-xs-2 control-label">Jenis Kelamin</label>
				<div class="col-md-10 col-sm-10 col-xs-10">
					<select class="form-control" name="jenis_kelamin" required value="<?= $data->jenis_kelamin; ?>" selected>
						<option value="<?= $data->jenis_kelamin; ?>" selected><?= $data->jenis_kelamin; ?></option>
						<option value="Laki-laki">Laki-laki</option>
						<option value="Perempuan">Perempuan</option>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label for="" class="col-md-2 col-sm-2 col-xs-2 control-label">Jabatan</label>
				<div class="col-md-10 col-sm-10 col-xs-10">
					<input type="text" class="form-control" name="jabatan" required="" value="<?= $data->jabatan;?>">
				</div>
			</div>
			<div class="form-group">
				<label for="" class="col-md-2 col-sm-2 col-xs-2 control-label">Nama Ormawa</label>
				<div class="col-md-10 col-sm-10 col-xs-10">
					<select name="id_ormawa" class="form-control" required="" value="<?= $data->id_ormawa; ?>">
						<option value="<?= $data->id_ormawa; ?>"selected><?= $data->nama_ormawa; ?></option>
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
					<input type="password" class="form-control" name="password" required="" value="<?= $data->password;?>">
				</div>
			</div>
			<div class="form-group">
				<label for="" class="col-md-2 col-sm-2 col-xs-2 control-label">Telp</label>
				<div class="col-md-10 col-sm-10 col-xs-10">
					<input type="text" class="form-control" name="telp" required="" value="<?= $data->telp;?>">
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