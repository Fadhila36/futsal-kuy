<!-- Portfolio Grid -->
<section class="bg-light">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <h2 class="section-heading text-uppercase">Daftar Lapangan Futsalin-Kuy</h2>
        <h3 class="section-subheading text-muted"></h3>
      </div>
    </div>
    <div class="row">
      <!-- looping products -->
      <?php foreach ($lapangan as $l) { ?>
        <div class="col-md-6 col-sm-6 portfolio-item"><br>
          <div class="portfolio-hover-content" style="height: 100%;">
            <img class="img-fluid" style="height: 50%; width: 100%;" src="<?php echo base_url(); ?>assets/upload/<?= $l->gambar; ?>">
            <div class="portfolio-caption"><br>
              <p><b>Nama Lapangan : </b><?= substr($l->nama_lap, 0, 100) ?></p>
              <p><b>Kategori Lapangan : </b><?= substr($l->nama_kategori, 0, 100) ?></p>
              <p><b>Lokasi Lapangan : </b><?= substr($l->lokasi, 0, 100) ?></p>
              <p><b>Harga Sewa/Jam : </b><?= number_format($l->tarif) ?></p>
              <p><?= anchor('member/jadwal/' . $l->id_lap, 'Cek Jadwal', [
                    'class' => 'btn btn-info glyphicon glyphicon-zoom-in',
                    'role' => 'button'
                  ]) ?>
              </p>
            </div>
          </div></br></br></br>
        </div>
      <?php } ?>

      <!-- end looping -->
    </div>
  </div>
</section>