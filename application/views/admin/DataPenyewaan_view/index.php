<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Data Member</h3>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode</th>
                                            <th>Lapangan</th>
                                            <th>Member</th>
                                            <th>Tanggal Pesan</th>
                                            <th>Tanggal Sewa</th>
                                            <th>Jam Mulai</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Id Sewa</th>
                                            <th>Id Lapangan</th>
                                            <th>Id Member</th>
                                            <th>Tanggal Pesan</th>
                                            <th>Tanggal Sewa</th>
                                            <th>Jam Mulai</th>
                                            <th>Status</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($penyewaan as $f) { ?>
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td><?= $f->id_sewa ?></td>
                                                <td><?= $f->nama_lap ?></td>
                                                <td><?= $f->nama_member ?></td>
                                                <td><?= $f->tgl_pesan ?></td>
                                                <td><?= $f->tgl_sewa ?></td>
                                                <td><?= $f->jam_mulai ?></td>
                                                <td>
                                                    <?php if ($f->status_sewa == "Selesai") {
                                                        echo "Selesai"; ?>

                                                    <?php } else if ($f->status_sewa == "Batal") {
                                                        echo "Batal"; ?>

                                                    <?php } else if ($f->status_sewa == "Booking") {
                                                        echo "Booking"; ?>

                                                    <?php } ?>
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
        </div>
        <!-- #END# Exportable Table -->
    </div>
</div>
</div>
</div>
</div>
</div>
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