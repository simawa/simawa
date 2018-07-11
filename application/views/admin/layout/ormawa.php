<?= $this->session->flashdata('success_upload'); ?>
<?= $this->session->flashdata('error_upload'); ?>
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="box box-solid">
			<div class="box-header with-border">
				<button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-tambah">
				<i class="fa fa-users"></i> Tambah Ormawa
				</button>
			</div>
			<div class="box-body">
				<div class="table-responsive">
					<table class="table table-bordered" id="data-tables">
						<thead>
							<tr class="bg-blue">
								<th>ID</th>
								<th>Nama</th>
								<th>Option</th>
							</tr>
						</thead>
						<tbody>
							<?php
							foreach ($data as $row) {
								$id = $row->id;
								$nama = $row->nama;
							?>
							<tr>
								<td><?= $id;?></td>
								<td><?= $nama;?></td>
								<td>
									<button class="btn btn-success" type="button" data-toggle="modal" data-placement="top" title="Edit" data-target="#modal-edit" onclick="edit_ormawa('<?= $id;?>','<?= $nama;?>')"><i class="fa fa-pencil"></i></button>
									<?= '
									<button type="button" data-toggle="modal" data-placement="top" title="Detail" data-target="#ModalDetail" id="'.$id.'|'.$nama.'" class="btn btn-primary detail-ormawa"><i class="fa fa-info"></i></button>
									';?>
									<button class="btn btn-danger" type="button" data-toggle="modal" data-placement="top" title="Hapus" data-target="#modal-hapus" onclick="hapus_ormawa('<?= $id?>')" ><i class="fa fa-trash"></i></button>
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
				<form class="form-horizontal" method="post" enctype="multipart/form-data" action="<?= base_url('admin/ormawa/add')?>">
					<div class="box-header">
						<div class="box-footer bg-blue"
							<h4 class="pull-left" style="color: #fff;"><i class="fa fa-users"></i> Tambah Ormawa</h4>
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
							<label for="" class="col-md-2 col-sm-2 col-xs-2 control-label">Nama</label>
							<div class="col-md-10 col-sm-10 col-xs-10">
								<input type="text" class="form-control" name="nama" required="">
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
							<h4 class="pull-left" style="color: #fff;"><i class="fa fa-users"></i> Edit Ormawa</h4>
						</div>
					</div>
					<div class="box-body">
						<input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" style="display: none">
						<div class="form-group">
							<label for="" class="col-md-2 col-sm-2 col-xs-2 control-label">ID</label>
							<div class="col-md-10 col-sm-10 col-xs-10">
								<input type="text" class="form-control" id="edit_id" name="edit_id" required="" readonly="">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-md-2 col-sm-2 col-xs-2 control-label">Nama</label>
							<div class="col-md-10 col-sm-10 col-xs-10">
								<input type="text" class="form-control" id="edit_nama" name="edit_nama" required="">
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
				<h4 class="modal-title"><i class="fa fa-user"></i> Detail Ormawa</h4>
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
		$(".detail-ormawa").on("click", function(){
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
	function edit_ormawa(a,b) {
		$('#edit_id').val(a);
		$('#edit_nama').val(b);
	}
	
</script>
<script>
	function hapus_ormawa(a) {
		$('#hapus_id').val(a);
	}
</script>