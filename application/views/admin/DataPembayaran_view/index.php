<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Pembayaran</h2>
                
            </div>

            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Transaksi Data
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <!--<ul class="dropdown-menu pull-right">
                                        <li><a href="<?= base_url()?>backend/kategori/createUser">Create</a></li>
                                    </ul>-->
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
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
                                        $no=1;
                                        foreach($pembayaran as $f){?>
                                            <tr>
                                                <td><?=$no++;?></td>
                                                <td><?=$f->id_bayar?></td>
                                                <td><img src="<?php echo base_url().'/assets/bukti/'.$f->bukti; ?>" width="80" height="80" alt="Belum Upload"></td>
                                                <td><?=$f->id_sewa?></td>
                                                <td><?php echo number_format ($f->totalbayar);?></td>
                                                <td><?=$f->tgl_bayar?></td>
                                                <td>
                                                    <?php if($f->status_bayar == "Terkonfirmasi"){
                                                        echo "Terkonfirmasi";?>

                                                    <?php } else if($f->status_bayar == "Menunggu Konfirmasi"){?>
                                                        <a class="btn btn-warning" href="<?= base_url()?>backend/pembayaran/editbayar/<?php echo $f->id_bayar;?>"><i class="fa fa-edit"></i>Menunggu Konfirmasi</a>
			                 		                                        
                                                    <?php } else if($f->status_bayar == "Menunggu Pembayaran"){
                                                        echo "Menunggu Pembayaran";?>
                                                
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
            <!-- #END# Exportable Table -->
    </div>
</section>


<script src="<?= base_url();?>assets/admin/plugins/jquery-datatable/jquery.dataTables.js"></script>
<script src="<?= base_url();?>assets/admin/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
<script src="<?= base_url();?>assets/admin/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
<script src="<?= base_url();?>assets/admin/plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
<script src="<?= base_url();?>assets/admin/plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
<script src="<?= base_url();?>assets/admin/plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
<script src="<?= base_url();?>assets/admin/plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
<script src="<?= base_url();?>assets/admin/plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
<script src="<?= base_url();?>assets/admin/plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>


<script src="<?= base_url();?>assets/admin/js/admin.js"></script>
<script src="<?= base_url();?>assets/admin/js/pages/tables/jquery-datatable.js"></script>