<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Data Petugas</h3>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Id Bayar</th>
                                            <th>Bukti</th>
                                            <th>Id Sewa</th>
                                            <th>Total Bayar</th>
                                            <th>Tanggal Bayar</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Id Bayar</th>
                                            <th>Bukti</th>
                                            <th>Id Sewa</th>
                                            <th>Total Bayar</th>
                                            <th>Tanggal Bayar</th>
                                            <th>Status</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($pembayaran as $f) { ?>
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td><?= $f->id_bayar ?></td>
                                                <td><img src="<?php echo base_url() . '/assets/bukti/' . $f->bukti; ?>" width="80" height="80" alt="Belum Upload"></td>
                                                <td><?= $f->id_sewa ?></td>
                                                <td><?php echo number_format($f->totalbayar); ?></td>
                                                <td><?= $f->tgl_bayar ?></td>
                                                <td>
                                                    <?php if ($f->status_bayar == "Terkonfirmasi") {
                                                        echo "Terkonfirmasi"; ?>

                                                    <?php } else if ($f->status_bayar == "Menunggu Konfirmasi") { ?>
                                                        <a class="btn btn-warning" href="<?= base_url() ?>backend/pembayaran/editbayar/<?php echo $f->id_bayar; ?>"><i class="fa fa-edit"></i>Menunggu Konfirmasi</a>

                                                    <?php } else if ($f->status_bayar == "Menunggu Pembayaran") {
                                                        echo "Menunggu Pembayaran"; ?>

                                                    <?php } ?>
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