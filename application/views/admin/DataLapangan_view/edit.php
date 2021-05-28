<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Edit Lapangan</h3>
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

                            <div class="row">
                                <div class="col-md-12">
                                    <?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body">
                            <form role="form" action="<?php echo base_url() ?>backend/Lapangan/editLapangan" method="post" id="editLapangan" role="form" enctype="multipart/form-data">

                                <div class="form-group">
                                    <label for="fname">Ubah Nama Lapangan</label>
                                    <input type="hidden" value="<?php echo $datas->id_lap; ?>" name="idl" id="idl" />
                                    <input type="text" class="form-control required" id="nama" name="nama" placeholder="Nama Lapangan" value="<?= $datas->nama_lap ?>">
                                </div>
                                <div class="form-group">
                                    <label for="fname">Ubah Kategori</label>
                                    <select name="id_kategori" id="id_kategori" class="form-control show-tick required">
                                        <?php foreach ($kategori as $f) { ?>
                                            <option value="<?= $f->id_kategori ?>" <?php if ($f->id_kategori == $datas->id_kategori) {
                                                                                        echo "selected";
                                                                                    } ?>><?= $f->nama_kategori ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="fname">Ubah Lokasi</label>
                                    <input type="text" class="form-control required" id="lokasi" name="lokasi" placeholder="Lokasi Lapangan" value="<?= $datas->lokasi ?>">
                                </div>
                                <div class="form-group">
                                    <label for="fname">Ubah Tarif Sewa</label>
                                    <input type="text" class="form-control required" id="tarif" name="tarif" placeholder="Tarif Sewa" value="<?= $datas->tarif ?>">
                                </div>
                                <div class="form-group">
                                    <label for="fname">Unggah Ulang Gambar</label>
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
</section>

<!-- 
<script src="<?= base_url(); ?>assets/admin/plugins/jquery-datatable/jquery.dataTables.js"></script>
<script src="<?= base_url(); ?>assets/admin/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
<script src="<?= base_url(); ?>assets/admin/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
<script src="<?= base_url(); ?>assets/admin/plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
<script src="<?= base_url(); ?>assets/admin/plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
<script src="<?= base_url(); ?>assets/admin/plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
<script src="<?= base_url(); ?>assets/admin/plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
<script src="<?= base_url(); ?>assets/admin/plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
<script src="<?= base_url(); ?>assets/admin/plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>


<script src="<?= base_url(); ?>assets/admin/js/admin.js"></script>
<script src="<?= base_url(); ?>assets/admin/js/pages/tables/jquery-datatable.js"></script> -->