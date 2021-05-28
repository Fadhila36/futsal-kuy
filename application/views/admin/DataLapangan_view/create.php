<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Tambah Data Lapangan</h3>
                        </div>
                        <div class="col-md-4">
                            <?php
                            $this->load->helper('form');
                            $error = $this->session->flashdata('error');
                            if ($error) {
                            ?>
                                <div class="alert alert-danger alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <?php echo $this->session->flashdata('error'); ?>
                                </div>
                            <?php } ?>
                            <?php
                            $success = $this->session->flashdata('success');
                            if ($success) {
                            ?>
                                <div class="alert alert-success alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <?php echo $this->session->flashdata('success'); ?>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="panel-body">
                            <form role="form" id="addLapangan" action="<?php echo base_url() ?>backend/Lapangan/addNew" method="post" role="form" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="fname">Nama Lapangan</label>
                                    <input type="text" class="form-control required" id="nama" name="nama" placeholder="Nama Lapangan">
                                </div>
                                <div class="form-group">
                                    <label for="fname">Pilih Kategori</label>
                                    <select name="id_kategori" id="id_kategori" class="form-control show-tick required">
                                        <?php foreach ($kategori as $f) { ?>
                                            <option value="<?= $f->id_kategori ?>"><?= $f->nama_kategori ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="fname">Lokasi Lapangan</label>
                                    <input type="text" class="form-control required" id="lokasi" name="lokasi" placeholder="Lokasi Lapangan">
                                </div>
                                <div class="form-group">
                                    <label for="fname">Tarif Sewa</label>
                                    <input type="number" class="form-control required" id="tarif" name="tarif" placeholder="Tarif">
                                </div>
                                <div class="form-group">
                                    <label for="fname">Unggah Gambar</label>
                                    <input type="file" class="form-control required" id="foto" name="userfile">
                                </div>
                                <div class="box-footer">
                                    <input type="submit" class="btn btn-primary" value="Submit" />
                                    <input type="reset" class="btn btn-default" value="Reset" />
                                </div>
                        </div>

                    </div><!-- /.box-body -->

                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- #END# Exportable Table -->
</div>
</div>
</div>
</div>
</div>
</div>