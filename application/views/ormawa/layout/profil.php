<?= $this->session->flashdata('success_upload'); ?>
<?= $this->session->flashdata('error_upload'); ?>
<div class="box box-solid">
	<div class="box-header bg-blue">
		<label><i class="fa fa-user"></i> Edit Profil Pengguna</label>
	</div>
	<div class="box-body">
		<?php print_r($data); ?>
		<form action="<?= base_url('ormawa/ormawa/profil')?>" method="POST" class="form-horizontal">
			<input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" style="display: none">
			<div class="form-group">
				<label for="" class="col-md-2 col-sm-2 col-xs-2 control-label">Nim</label>
				<div class="col-md-10 col-sm-10 col-xs-10">
					<input type="text" class="form-control" name="nim" readonly="" required="" value="">
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
			<div class="form-group">
				<label for="" class="col-md-2 col-sm-2 col-xs-2 control-label">Jenis Pengguna</label>
				<div class="col-md-10 col-sm-10 col-xs-10">
					<select name="id_role" class="form-control" required="">
						<option value=""></option>
						<option value="0">Dpm</option>
						<option value="1">Kemahasiswaan</option>
					</select>
				</div>
			</div>
		</div>
		<div class="box-footer">
			
		</div>
	</form>
</div>