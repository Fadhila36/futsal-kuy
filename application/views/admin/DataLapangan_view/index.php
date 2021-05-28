<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Data Lapangan</h3>
                            <div class="right">
                                <a href="<?= base_url() ?>backend/Lapangan/createLapangan" type="button" class="btn btn-default"><i class="fa fa-plus-square"></i> Tambah Lapangan </a>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Lapangan</th>
                                            <th>Kategori</th>
                                            <th>Lokasi</th>
                                            <th>Tarif</th>
                                            <th>Gambar</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Lapangan</th>
                                            <th>Kategori</th>
                                            <th>Lokasi</th>
                                            <th>Tarif</th>
                                            <th>Gambar</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($lapangan as $f) {
                                        ?>
                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td><?= $f->nama_lap ?></td>
                                                <td><?php echo $f->nama_kategori; ?></td>
                                                <td><?php echo $f->lokasi; ?></td>
                                                <td><?php echo number_format($f->tarif); ?></td>
                                                <td><img src="<?php echo base_url() . '/assets/upload/' . $f->gambar; ?>" width="80" height="80" alt="gambar tidak ada"></td>
                                                <td>
                                                    <a class="btn btn-warning" href="<?= base_url() ?>backend/Lapangan/edit/<?php echo $f->id_lap; ?>"><i class="fa fa-edit"></i>Edit</a>
                                                    <a class="btn btn-danger" onClick="javascript: return confirm('Please confirm deletion');" href="<?= base_url() ?>backend/Lapangan/delete/<?php echo $f->id_lap; ?>"><i class="fa fa-trash"></i>Hapus</a>
                                                </td>
                                            </tr>
                                        <?php }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
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


<script src="<?= base_url(); ?>assets/admin/plugins/JSZip-2.5.0/jszip.min.js"></script>
<script src="<?= base_url(); ?>assets/admin/plugins/DataTables-1.10.24/js/jquery.dataTables.js"></script>
<script src="<?= base_url(); ?>assets/admin/plugins/Buttons-1.7.0/js/buttons.html5.js"></script>
<script src="<?= base_url(); ?>assets/admin/plugins/Buttons-1.7.0/js/buttons.print.js"></script>
<script src="<?= base_url(); ?>assets/admin/plugins/Buttons-1.7.0/js/buttons.html5.js"></script>

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