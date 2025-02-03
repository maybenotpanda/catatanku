<?php require "../../layouts/main.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>MyMango.ID | <?= $title ?></title>
  <link rel="icon" type="image/x-icon" href="<?= assets('img/icon.png') ?>">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= assets('plugins/fontawesome-free/css/all.min.css') ?>">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?= assets('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') ?>">
  <link rel="stylesheet" href="<?= assets('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') ?>">
  <link rel="stylesheet" href="<?= assets('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') ?>">
  <link rel="stylesheet" href="<?= assets('plugins/select2/css/select2.min.css') ?>">
  <link rel="stylesheet" href="<?= assets('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= assets('dist/css/adminlte.min.css') ?>">

</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>
    </nav>
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <a href="index" class="brand-link">
        <img src="<?= assets('img/icon.png') ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">MyMango</span>
      </a>

      <div class="sidebar">
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
              <a href="../accounts" class="nav-link">
                <i class="nav-icon	fas fa-wallet"></i>
                <p>
                  Accounts
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../transaction" class="nav-link">
                <i class="nav-icon fas fa-money-bill-wave"></i>
                <p>
                  Transactions
                </p>
              </a>
            </li>
          </ul>
        </nav>
      </div>
    </aside>