<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Futsalin-Kuy Web</title>

  <!-- Bootstrap core CSS -->
  <link href="<?= base_url('assets/'); ?>member/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
  <script href="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.js"></script>

  <!-- Custom fonts for this template -->
  <link href="<?= base_url('assets/'); ?>member/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
  <!-- Custom styles for this template -->
  <link href="<?= base_url('assets/'); ?>member/css/header.css" rel="stylesheet">
  <link href="<?= base_url('assets/'); ?>member/css/agency.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
  <link href="<?= base_url('assets/'); ?>member/css/footer.css" rel="stylesheet">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

</head>

<body id="page-top">

  <div class="header-4-2" style="font-family: 'Poppins', sans-serif;">
    <nav class="navbar navbar-expand-lg navbar-light">
      <a href="#">
        <img style="margin-right:0.75rem" src="http://api.elements.buildwithangga.com/storage/files/2/assets/Header/Header2/Header-2-5.png" alt="">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="modal" data-bs-target="#targetModal-header-4-2">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="modal-header-4-2 modal fade" id="targetModal-header-4-2" tabindex="-1" role="dialog" aria-labelledby="targetModalLabel-header-4-2" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content modal-content-header-4-2">
            <div class="modal-header" style="padding:	2rem; padding-bottom: 0;">
              <a class="modal-title" id="targetModalLabel-header-4-2">
                <img style="margin-top:0.5rem" src="http://api.elements.buildwithangga.com/storage/files/2/assets/Header/Header2/Header-2-5.png" alt="">
              </a>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
              </button>
            </div>
            <div class="modal-body" style="padding:	2rem; padding-top: 0; padding-bottom: 0;">
              <ul class="navbar-nav responsive-header-4-2 me-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                  <a class="nav-link" href="<?= base_url('member'); ?>">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?= base_url('member/lapangan'); ?>">Lapangan</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?= base_url('member/pemesanan'); ?>">Pemesanan</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?= base_url('member/about'); ?>">Tentang</a>
                </li>
              </ul>
            </div>
            <div class="modal-footer" style="padding:	2rem; padding-top: 0.75rem">
              <ul>
                <li class="nav-item dropdown no-arrow">
                  <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-user-circle"></i>
                    <span class="mr-2 d-none d-lg-inline text-gray-700 "><?= $this->session->userdata('username') ?></span>

                  </a>
                  <!-- Dropdown - User Information -->
                  <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                    <div class="image">
                      <center><img src="<?= base_url() ?>assets/admin/images/user.png" width="50" height="50" alt="User" /></center>
                    </div>
                    <a class="dropdown-item" href="<?= base_url('member/profile'); ?>">
                      <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                      Profil
                    </a>
                    <a class="dropdown-item" href="<?= base_url('member/history'); ?>">
                      <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                      Riwayat
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo base_url() . 'Login/logout' ?>">
                      <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                      Logout
                    </a>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>

      <div class="collapse navbar-collapse" id="navbarTogglerDemo-header-4-2">
        <ul class="navbar-nav me-auto mt-2 mt-lg-0">
          <li class="nav-item active">
            <a class="nav-link" href="<?= base_url('member'); ?>">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('member/lapangan'); ?>">Lapangan</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('member/pemesanan'); ?>">Pemesanan</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('member/about'); ?>">Tentang</a>
          </li>
        </ul>
        <ul>
          <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fa fa-user-circle"></i>
              <span class="mr-2 d-none d-lg-inline text-gray-700 "><?= $this->session->userdata('username') ?></span>

            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
              <div class="image">
                <center><img src="<?= base_url() ?>assets/admin/images/user.png" width="50" height="50" alt="User" /></center>
              </div>
              <a class="dropdown-item" href="<?= base_url('member/profile'); ?>">
                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                Profil
              </a>
              <a class="dropdown-item" href="<?= base_url('member/history'); ?>">
                <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                Riwayat
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="<?php echo base_url() . 'Login/logout' ?>">
                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                Logout
              </a>
            </div>
          </li>
        </ul>
      </div>
    </nav>