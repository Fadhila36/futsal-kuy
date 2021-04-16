<!-- About -->
<section id="profile">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 text-center">
				<h2 class="section-heading text-uppercase">Booking Lapangan</h2>
				<h3 class="section-subheading text-muted"></h3>
			</div>

			<!-- Default Card Example -->
			<div class="col-lg-15">
				<!-- Collapsable Card Example -->
				<div class="card shadow mb-6">
					<!-- Card Header - Accordion -->
					<a class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
						<center>
							<h6 class="m-0 font-weight-bold text-primary">Data Pemesanan Lapangan</h6>
						</center>
					</a>
					<div class="table-responsive">
						<table class="table">
							<thead>
								<tr>
									<th>No</th>
									<th>ID Sewa</th>
									<th>Nama Lapangan</th>
									<th>Nama Member</th>
									<th>Tanggal Main</th>
									<th>Jam Main</th>
									<th>Harga</th>
									<th>Bukti</th>
									<th>Status</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$no = 1;
								foreach ($penyewaan as $t) {
								?>
									<tr>
										<td><?php echo $no++; ?></td>
										<td><?php echo $t->id_sewa; ?></td>
										<td><?php echo $t->nama_lap; ?></td>
										<td><?php echo $t->nama_member; ?></td>
										<td><?php echo $t->tgl_sewa; ?></td>
										<td><?php echo $t->jam_mulai; ?></td>
										<td><?php echo number_format($t->totalbayar); ?></td>
										<td><img src="<?php echo base_url() . '/assets/bukti/' . $t->bukti; ?>" width="80" height="80" alt="Belum Ada Bukti Pembayaran"></td>
										<td><?php
											if ($t->status_bayar == "Menunggu Pembayaran") {
												echo "Belum Bayar, Silahkan bayar sesuai tagihan";
											?>
											<?php } else if ($t->status_bayar == "Menunggu Konfirmasi") {
												echo "Sudah Bayar, Mohon menunggu konfirmasi";
											?>
											<?php } else if ($t->status_bayar == "Terkonfirmasi") {
												echo "Sudah Dikonfirmasi";
											?>
											<?php } ?>
										</td>
										<?php
										if ($t->status_bayar == "Menunggu Pembayaran") {
										?>
											<td>
												<!-- <a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambahbukti"></a> -->
												<a href="javascript:;" data-id="<?php echo $t->id_bayar ?>" data-toggle="modal" data-target="#ubah-data" class="btn btn-info">Upload Bukti Bayar
												</a>
												<br><br>
												<a class="btn btn-sm btn-danger mr-1" href="<?php echo base_url() . 'member/batalpesan/' . $t->id_sewa; ?>"><span class="glyphicon glyphicon-remove"></span>Batalkan Sewa</a>
											</td>
										<?php } elseif ($t->status_bayar == "Menunggu Konfirmasi") {
										?>
											<td>
												<a class="btn btn-sm btn-danger mr-1" href="<?php echo base_url() . 'member/batalpesan/' . $t->id_sewa; ?>"><span class="glyphicon glyphicon-remove"></span>Batalkan Sewa</a>
											</td>
										<?php } else {
										?>
											<td>
												<a class="btn btn-sm btn-success mr-1" href="<?= base_url() ?>member/cetakpdf/<?php echo $t->id_sewa; ?>"><span class="glyphicon glyphicon-remove"></span>Cetak Sewa</a>
											</td>
										<?php } ?>
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
	</div>
	</div>
</section>

<div class="modal fade" id="ubah-data" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form role="form" id="addPembayaran" action="<?php echo base_url() ?>member/bukti" method="post" role="form" enctype="multipart/form-data">
				<div class="modal-header">
					<h5 class="modal-title">Upload Bukti Bayar</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="col-md-12">
						<div class="form-group">
							<input type="hidden" id="id" name="id">
							<label for="fname">Unggah Bukti Bayar</label>
							<input type="file" class="form-control required" id="foto" name="userfile">
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="reset" class="btn btn-secondary" data-dismiss="modal">Batal</button>
					<button type="submit" class="btn btn-primary">Simpan</button>
				</div>

			</form>
		</div>
	</div>
</div>

<div class="container">
	<div class="row">
		<div class="col-lg-12 ">
			<h6>Untuk pembayaran, pastikan Anda melakukan transfer pembayaran hanya pada rekening bank kami berikut ini.</h6>
			<h3 class="section-subheading text-muted"></h3>
		</div>
	</div>
	<div class="row text-center">
		<div class="col-md-4">
			<span>
				<img src="<?= base_url('assets/'); ?>img/bank/bca.png">
			</span>
			<h4 class="service-heading">Futsalin Kuy</h4>
			<h4 class="service-heading">8760707491</h4>
		</div>
		<div class="col-md-4">
			<span>
				<img src="<?= base_url('assets/'); ?>img/bank/bri.png">
			</span>
			<h4 class="service-heading">Futsalin Kuy</h4>
			<h4 class="service-heading">8691109241</h4>
		</div>
		<div class="col-md-4">
			<span>
				<img src="<?= base_url('assets/'); ?>img/bank/mandiri.png">
			</span>
			<h4 class="service-heading">Futsalin Kuy</h4>
			<h4 class="service-heading">1010001237589</h4>
		</div>
	</div>
</div>

<!-- Modal Ubah -->
<!-- <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="edit-data" class="modal fade">
	    <div class="modal-dialog">
	        <div class="modal-content">
	            <div class="modal-header">
	                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
	                <h4 class="modal-title">Ubah Data</h4>
	            </div>
	            <form class="form-horizontal" action="<?php echo base_url('admin/ubah') ?>" method="post" enctype="multipart/form-data" role="form">
		            <div class="modal-body">
		                    <div class="form-group">
		                        <label class="col-lg-2 col-sm-2 control-label">Nama</label>
		                        <div class="col-lg-10">
		                        	<input type="hidden" id="id" name="id">
		                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Tuliskan Nama">
		                        </div>
		                    </div>
		                    <div class="form-group">
		                        <label class="col-lg-2 col-sm-2 control-label">Alamat</label>
		                        <div class="col-lg-10">
		                        	<textarea class="form-control" id="alamat" name="alamat" placeholder="Tuliskan Alamat"></textarea>
		                        </div>
		                    </div>
		                    <div class="form-group">
		                        <label class="col-lg-2 col-sm-2 control-label">Pekerjaan</label>
		                        <div class="col-lg-10">
		                            <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" placeholder="Tuliskan Pekerjaan">
		                        </div>
		                    </div>
		                </div>
		                <div class="modal-footer">
		                    <button class="btn btn-info" type="submit"> Simpan&nbsp;</button>
		                    <button type="button" class="btn btn-warning" data-dismiss="modal"> Batal</button>
		                </div>
	                </form>
	            </div>
	        </div>
	    </div>
	</div> -->
<!-- END Modal Ubah -->
<script>
	$(document).ready(function() {
		// Untuk sunting
		$('#ubah-data').on('show.bs.modal', function(event) {
			var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
			var modal = $(this)

			// Isi nilai pada field
			modal.find('#id').attr("value", div.data('id'));
			// modal.find('#nama').attr("value",div.data('nama'));
			// modal.find('#alamat').html(div.data('alamat'));
			// modal.find('#pekerjaan').attr("value",div.data('pekerjaan'));
		});
	});
</script>