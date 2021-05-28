<div id="sidebar-nav" class="sidebar">
    <div class="sidebar-scroll">
        <nav>
            <ul class="nav">
                <li><a href="<?= base_url(); ?>backend/Dashboard" class="active"><i class="lnr lnr-home"></i> <span>Home</span></a></li>
                <?php if ($this->session->userdata('status') === '1') : ?>
                    <li><a href="<?= base_url(); ?>backend/kategori" class=""><i class="lnr lnr-inbox"></i> <span>Data Kategori</span></a></li>
                    <li><a href="<?= base_url(); ?>backend/lapangan" class=""><i class="lnr lnr-inbox"></i> <span>Data Lapangan</span></a></li>
                    <li><a href="<?= base_url() ?>backend/admin" class=""><i class="lnr lnr-user"></i> <span>Data Petugas</span></a></li>
                    <li><a href="<?= base_url() ?>backend/member" class=""><i class="lnr lnr-user"></i> <span>Data Member</span></a></li>
                <?php endif; ?>

                <li><a href="<?= base_url() ?>backend/penyewaan" class=""><i class="lnr lnr-tag"></i> <span>Data Penyewaan</span></a></li>
                <li><a href="<?= base_url() ?>backend/jadwal" class=""><i class="lnr lnr-clock"></i> <span>Data Jadwal</span></a></li>
                <li><a href="<?= base_url() ?>backend/pembayaran" class=""><i class="lnr lnr-cart"></i> <span>Data Pembayaran</span></a></li>
            </ul>
        </nav>
    </div>
</div>