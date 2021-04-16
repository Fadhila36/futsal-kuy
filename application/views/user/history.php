<!-- About -->
<section id="profile">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading text-uppercase">Riwayat Booking</h2>
          <h3 class="section-subheading text-muted"></h3>
        </div>

<!-- Default Card Example -->
          <div class="col-lg-15">
          <!-- Collapsable Card Example -->
            <div class="card shadow mb-6">
              <!-- Card Header - Accordion -->
              <a class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                <center><h6 class="m-0 font-weight-bold text-primary">Data Riwayat Sewa Lapangan</h6></center>
              </a>
	<div class="table-responsive">
    <table class="table">
		  <thead>
        <tr>
          <th>No</th>
          <th>Nama Member</th>
				  <th>Nama Lapangan</th>
          <th>Tanggal Main</th>
          <th>Jam Pertandingan</th>
          <th>Waktu Bermain</th>
				  <th>Status</th>
        </tr>
			</thead>  
			<tbody> 
    			<?php
					$no = 1;
          foreach($penyewaan as $t){
          ?>
				<tr>
					<td><?php echo $no++; ?></td>
					<td><?php echo $t->nama_member;?></td>
					<td><?php echo $t->nama_lap;?></td>
					<td><?php echo $t->tgl_sewa;?></td>
          <td><?php echo $t->jam_mulai;?></td>
          <td><?php echo $t->durasi;?> Jam</td>
					<td><?php echo $t->status_sewa;?></td>
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