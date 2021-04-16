<section class="bg-light">
  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-lg-7">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Profile</h1>
                  </div>
		<?php
			if(isset($_GET['pesan'])){
				if($_GET['pesan'] == "berhasil"){
					echo "<div class='alert alert-success'>Password berhasil di ganti.</div>";
					redirect(base_url().'user');
				}
			}
		?>
		<?php 
			foreach($member as $m){
		?>
		<form action="<?php echo base_url().'member/profile_act'; ?>" method="post">
			<div class="form-group">
				<label>Nama Member</label>
				<input type="hidden" name="id" value="<?php echo $m->id_member; ?>">
				<input class="form-control" type="text" name="nama" placeholder="Input Nama Anda" value="<?php echo $m->nama_member; ?>">
				<?php echo form_error('nama_member'); ?>
			</div>

			<div class="form-group">
				<label>No HandPhone</label>
				<input class="form-control" type="text" name="no_hp" placeholder="Input No. Handphone" value="<?php echo $m->no_hp; ?>">
				<?php echo form_error('no_hp'); ?>
			</div>

			<div class="form-group">
				<label>E-Mail</label>
				<input class="form-control" type="text" name="email" placeholder="Input E-mail" value="<?php echo $m->email; ?>">
				<?php echo form_error('no_hp'); ?>
			</div>

			<div class="form-group">
				<label>Username</label>
				<input class="form-control" type="text" name="username" placeholder="Input Username" value="<?php echo $m->username; ?>">
				<?php echo form_error('username'); ?>
			</div>

			<div class="form-group">
				<label>Password Baru</label>
				<input class="form-control" type="password" name="pass_baru" placeholder="Input Password Baru">
				<?php echo form_error('pass_baru'); ?>
			</div>

			<div class="form-group">
				<input class="btn btn-success btn-sm" type="submit" value="Simpan">
				<input type="button" value="Kembali" class="btn btn-danger btn-sm" onclick="window.history.go(-1)">
			</div>
		</form>
		<?php 
			}
		?>
	</div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>
</section>