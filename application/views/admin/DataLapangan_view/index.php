<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Lapangan</h2>
                
            </div>

            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Master Data
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="<?= base_url()?>backend/Lapangan/createLapangan">Create</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
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
                                            $no=1;
                                            foreach($lapangan as $f){
                                        ?>
                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td><?=$f->nama_lap?></td>
                                                <td><?php echo $f->nama_kategori;?></td>
                                                <td><?php echo $f->lokasi;?></td>
                                                <td><?php echo number_format ($f->tarif);?></td>
                                                <td><img src="<?php echo base_url().'/assets/upload/'.$f->gambar; ?>" width="80" height="80" alt="gambar tidak ada"></td>
                                                <td>
                                                        <a class="btn btn-warning" href="<?= base_url()?>backend/Lapangan/edit/<?php echo $f->id_lap;?>"><i class="fa fa-edit"></i>Edit</a>
                                                        <a class="btn btn-danger" onClick="javascript: return confirm('Please confirm deletion');" href="<?= base_url()?>backend/Lapangan/delete/<?php echo $f->id_lap;?>"><i class="fa fa-trash"></i>Hapus</a>
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