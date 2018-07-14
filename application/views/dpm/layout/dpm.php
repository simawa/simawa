<?= $this->session->flashdata('success_upload'); ?>
<?= $this->session->flashdata('error_upload'); ?>
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="box box-solid">
			<div class="box-header with-border">
			</div>
			<div class="box-body">
				<div class="table-responsive">
					<table class="table table-bordered" id="data-tables">
						<thead>
							<tr class="bg-blue">
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
								$id = $row->id_pengajuan;
								$nama_kegiatan = $row->nama_kegiatan;
								$tema_kegiatan = $row->tema_kegiatan;
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
								$keterangan_dpm = $row->keterangan_dpm;
								$status_kemahasiswaan = $row->status_kemahasiswaan;
								$keterangan_kemahasiswaan = $row->keterangan_kemahasiswaan;
								$nama_ormawa = $row->nama_ormawa;
								$nama_pengguna = $row->nama_pengguna;
							?>
							<tr>
								<td><?= $nama_kegiatan;?></td>
								<td><?= $nama_ormawa;?></td>
								<td><?php 
								//Status DPM
								if ($status_dpm == 0) {
									echo "<a class='btn btn-danger' style='cursor: default'><i class='fa fa-spinner fa-spin'></i> Pending</a>";
								}else{
									echo "<a class='btn btn-success' style='cursor: default'><i class='fa fa-check-square'></i> Disetujui</a>";
								}
								?></td>
								<td><?php
								if ($status_kemahasiswaan == 0) {
									echo "<a class='btn btn-danger' style='cursor: default'><i class='fa fa-spinner fa-spin'></i> Pending</a>";
								}else{
									echo "<a class='btn btn-success' style='cursor: default'><i class='fa fa-check-square'></i> Disetujui</a>";
								}
								?></td>
								<td>
									<button class="btn btn-success" type="button" data-toggle="modal" data-placement="top" title="Edit" data-target="#modal-update" onclick="update_pengajuan('<?= $id ?>')"><i class="fa fa-pencil"></i></button>
									<?= '
									<button class="btn btn-info detail-pengajuan" type="button" data-toggle="modal" data-placement="top" title="Detail" id="'.$id.'|'.$nama_kegiatan.'|'.$tema_kegiatan.'|'.$tujuan.'|'.$sasaran.'|'.$bentuk_kegiatan.'|'.$tgl1.'|'.$jam1.'|'.$tgl2.'|'.$jam2.'|'.$rencana_dana.'|'.$id_tempat_kegiatan.'|'.$nama_ormawa.'|'.$nama_pengguna.'|'.$status_dpm.'|'.$keterangan_dpm.'|'.$status_kemahasiswaan.'|'.$keterangan_kemahasiswaan.'" data-target="#modal-detail"><i class="fa fa-info"></i></button>
									';?>
								</td>
							</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Modal Update -->
<div class="modal fade" id="modal-update" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog modal-xl" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<form class="form-horizontal" method="post" enctype="multipart/form-data" action="<?= base_url('dpm/dpm/update')?>">
					<div class="box-header">
						<div class="box-footer bg-blue">
							<h4 class="pull-left" style="color: #fff;"><i class="fa fa-archive"></i> Update Pengajuan Kegiatan</h4>
						</div>
					</div>
					<div class="box-body">
					</div>
					<div class="box-footer">
						<div class="btn-group btn-group-sm pull-right">
							<button id="btn_hapus" name="btn_submit" type="submit" class="btn btn-success ajax-loader">
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
<div class="modal fade" id="modal-detail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog modal-xl" role="document">
		<div class="modal-content">
			<div class="moda-header">
				<div class="box-header">
					<div class="box-footer bg-blue">
						<h4 class="pull-left" style="color: #fff;"><i class="fa fa-archive"></i> Detail Pengajuan</h4>
					</div>
				</div>
			</div>
			<div class="modal-body">
				<div id="IsiModal">
					
				</div>
			</div>
		</div>
	</div>
</div>
<script>
$(document).ready(function() {
			// ketika tombol detail ditekan
		$(".detail-pengajuan").on("click", function(){
		// ambil nilai id dari link print
		var DataPengajuan= this.id;
		var datanya = DataPengajuan.split("|");
		// bagian ini yang akan ditampilkan pada modal bootstrap
        // pengetikan HTML tidak boleh dienter, karena oleh javascript akan dibaca \r\n sehingga
        // modal bootstrap tidak akan jalan
		$("#IsiModal").html('<table class="table table-responsive table-striped"><tbody><tr><th>ID Pengajuan</th><td> : '+datanya[0]+'</td></tr><tr><th>Nama Kegiatan</th><td> : '+datanya[1]+'</td></tr><tr><th>Tema Kegiatan</th><td> : '+datanya[2]+'</td></tr><tr><th>Tujuan</th><td> : '+datanya[3]+'</td></tr><tr><th>Sasaran</th><td> : '+datanya[4]+'</td></tr><tr><th>Bentuk Kegiatan</th><td> : '+datanya[5]+'</td></tr><tr><th>Tanggal #1</th><td> : '+datanya[6]+'</td></tr><tr><th>Jam #1</th><td> : '+datanya[7]+' Wib </td></tr><tr><th>Tanggal #2</th><td> : '+datanya[8]+'</td></tr><tr><th>Jam #2</th><td> : '+datanya[9]+' Wib </td></tr><tr><th>Rencana Dana </th><td> : '+datanya[10]+'</td></tr><tr><th>Tempat Kegiatan</th><td> : '+datanya[11]+'</td></tr><tr><th>Nama Ormawa</th><td> : '+datanya[12]+'</td></tr><tr><th>Nama Pengguna</th><td> : '+datanya[13]+'</td></tr><tr><th>Status DPM</th><td> : '+datanya[14]+'</td></tr><tr><th>Keterangan DPM</th><td> : '+datanya[15]+'</td></tr><tr><th>Status Kemahasiswaan</th><td> : '+datanya[16]+'</td></tr><tr><th>Keterangan Kemahasiswaan</th><td> : '+datanya[17]+'</td></tr></tbody></table>');
		});
	
	});
</script>