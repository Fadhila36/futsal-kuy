<!-- #END# Search Bar -->
<!-- Top Bar -->
<nav class="navbar">
    <div class="container-fluid">
        <div class="navbar-header">
            <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
            <a href="javascript:void(0);" class="bars"></a>
            <a class="navbar-brand" href="<?= base_url(); ?>kepo/Dashboard">Dashboard</a>
        </div>
        <div class="collapse navbar-collapse" id="navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <!-- Notifications -->
                <li>
                    <a href="<?= base_url() ?>backend/admin">
                        <i class="material-icons">notifications</i>
                        <span class="label-count" id="new_count_message"></span>
                    </a>
                </li>
                <!-- #END# Notifications -->
            </ul>
        </div>
    </div>
</nav>
<!-- #Top Bar -->
<section>
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
        <!-- User Info -->
        <div class="user-info">
            <div class="image">
                <img src="<?= base_url() ?>assets/admin/images/user.jpg" width="48" height="48" alt="User" />
            </div>
            <div class="info-container">
                <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?= $this->session->userdata('username') ?></div>
                <div class="email"></div>
                <div class="btn-group user-helper-dropdown">
                    <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                    <ul class="dropdown-menu pull-right">
                        <li><a href="<?= base_url() ?>login/logout"><i class="material-icons">input</i>Sign Out</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- #User Info -->
        <!-- Menu -->
        <div class="menu">
            <ul class="list">
                <li class="header">MENU</li>

                <li>
                    <a href="<?= base_url(); ?>backend/Dashboard">
                        <i class="material-icons">home</i>
                        <span>Home</span>
                    </a>
                </li>
                <!-- <li>
                        <a href="<?= base_url() ?>kepo/Datasiswa">
                            <i class="material-icons">layers</i>
                            <span>Data Siswa</span>
                        </a>
                    </li> -->
                <li>
                    <a href="<?= base_url() ?>backend/kategori">
                        <i class="material-icons">layers</i>
                        <span>Data Kategori</span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url() ?>backend/lapangan">
                        <i class="material-icons">layers</i>
                        <span>Data Lapangan</span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url() ?>backend/admin">
                        <i class="material-icons">layers</i>
                        <span>Data Admin</span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url() ?>backend/member">
                        <i class="material-icons">layers</i>
                        <span>Data Member</span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url() ?>backend/penyewaan">
                        <i class="material-icons">adb</i>
                        <span>Data Penyewaan</span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url() ?>backend/jadwal">
                        <i class="material-icons">adb</i>
                        <span>Data Jadwal</span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url() ?>backend/pembayaran">
                        <i class="material-icons">adb</i>
                        <span>Data Pembayaran</span>
                    </a>
                </li>

            </ul>
        </div>
        <!-- #Menu -->
        <!-- Footer -->
        <div class="legal">
            <div class="copyright">
                &copy; 2016 - 2017 <a href="javascript:void(0);">Kemkes - Material Design</a>.
            </div>
            <!-- <div class="version">
                    <b>Version: </b> 1.0.5
                </div> -->
        </div>
        <!-- #Footer -->
    </aside>
    <!-- #END# Left Sidebar -->
</section>