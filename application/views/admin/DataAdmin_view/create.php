<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Tambah Data Petugas</h3>
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
                            <form role="form" id="addUser" action="<?php echo base_url() ?>backend/admin/addNew" method="post" role="form">
                                <div class="form-group">
                                    <label for="fname">Input Nama Petugas</label>
                                    <input type="text" class="form-control required" id="nama_admin" name="nama_admin" placeholder="Nama Petugas">
                                </div>
                                <div class="form-group">
                                    <label for="fname">Input Username</label>
                                    <input type="text" class="form-control required" id="username" name="username" placeholder="Username">
                                </div>
                                <div class="form-group">
                                    <label for="fname">Input Password</label>
                                    <input type="password" class="form-control required" id="password" name="password" placeholder="Password">
                                </div>
                                <div class="box-footer">
                                    <input type="submit" class="btn btn-primary" value="Submit" />
                                    <input type="reset" class="btn btn-default" value="Reset" />
                                </div>
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
<script src="<?= base_url(); ?>assets/admin/js/pages/tables/jquery-datatable.js"></script>