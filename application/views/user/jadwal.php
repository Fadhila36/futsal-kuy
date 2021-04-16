<!-- About -->
<section id="profile">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading text-uppercase">Jadwal Pertandingan</h2>
          <h3 class="section-subheading text-muted"></h3>
        </div>

<!-- Default Card Example -->

          <div class="col-lg-15">
          <!-- Collapsable Card Example -->
            <div class="card shadow mb-6">
              <!-- Card Header - Accordion -->
              <a class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                <center><h6 class="m-0 font-weight-bold text-primary">Cek Jadwal</h6></center>
              </a>
              <?php
                foreach($lapangan as $l){
              ?>
                <img class="img-fluid" style="height: 50%; width: 100%;" src="<?php echo base_url();?>assets/upload/<?=$l->gambar;?>">                                  
              <?php } ?>
    <div class="table-responsive">
      <table class="table" style="center">
		   <thead>
              <tr>
				        <th>No</th>
                <th>Nama Lapangan</th>
                <th>Jam Mulai</th>
                <th>Jam Selesai</th>
                <th>Tanggal Main</th>
              </tr>
			  </thead>
			  
			  <tbody>		  
						<?php
							$no = 1;
              foreach($jadwal as $t){
            ?>
	    				<tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $t->nama_lap;?></td>
                <td><?php echo $t->jam_mulai;?></td>
                <td><?php echo $t->jam_selesai;?></td>
                <td><?php echo $t->tgl_main;?></td>
            </tr>
					  <?php } ?>			
			  </tbody>				
      </table>
      <form action="<?php echo base_url().'member/pesan' ?>" method="post" >
        <div class="col-md-12">                                
          <div class="form-group">
            <label for="fname">Input Jam Main</label>
            <input type="hidden" class="form-control required" id="time" name="id_lap" value="<?=$l->id_lap?>">
            <select name="time" id="time" class="form-control required">
                <option value="07">07:00</option>
                <option value="08">08:00</option>
                <option value="09">09:00</option>
                <option value="10">10:00</option>
                <option value="11">11:00</option>
                <option value="12">12:00</option>
                <option value="13">13:00</option>
                <option value="14">14:00</option>
                <option value="15">15:00</option>
                <option value="16">16:00</option>
                <option value="17">17:00</option>
                <option value="18">18:00</option>
                <option value="19">19:00</option>
                <option value="20">20:00</option>
                <option value="21">21:00</option>
                <option value="22">22:00</option>
                <option value="23">23:00</option>
            </select>
          </div>
        </div>
        <div class="col-md-12">                                
          <div class="form-group">
            <label for="fname">Input Jam Selesai</label>
            <select name="time2" id="time2" class="form-control required">
                <option value="07">07:00</option>
                <option value="08">08:00</option>
                <option value="09">09:00</option>
                <option value="10">10:00</option>
                <option value="11">11:00</option>
                <option value="12">12:00</option>
                <option value="13">13:00</option>
                <option value="14">14:00</option>
                <option value="15">15:00</option>
                <option value="16">16:00</option>
                <option value="17">17:00</option>
                <option value="18">18:00</option>
                <option value="19">19:00</option>
                <option value="20">20:00</option>
                <option value="21">21:00</option>
                <option value="22">22:00</option>
                <option value="23">23:00</option>
            </select>
          </div>
        </div>
        <input type="hidden" class="form-control required" id="time" name="tarif" value="<?=$l->tarif?>">
        <!--<div class="col-md-12">                                
          <div class="form-group">
            <label for="fname">Lama Pertandingan/Jam</label>
            <input type="number" class="form-control required" id="lama" name="lama" placeholder="main/jam">
          </div>
        </div>-->
        <div class="col-md-12">                                
          <div class="form-group">
            <label for="fname">Input Tanggal Main</label>
            <input type="date" class="form-control required" id="date" name="date">
          </div>
        </div>
        <div class="form-group">
          <input type="submit" value="Booking" class="btn btn-success btn-sm">
          <input type="button" value="Kembali" class="btn btn-danger btn-sm" onclick="window.history.go(-1)">
        </div>
      </form>
		</div>

                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
	</section>
  <!-- <script>
     $('select').change(function () {
        var select = this.selectedOptions[0].value;
        // alert(select);
    });
  </script> -->