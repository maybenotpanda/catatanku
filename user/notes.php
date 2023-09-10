<?php include "../mainconfig.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MyMango.ID | Catatan</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= assets('plugins/fontawesome-free/css/all.min.css') ?>">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?= assets('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') ?>">
    <link rel="stylesheet" href="<?= assets('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') ?>">
    <link rel="stylesheet" href="<?= assets('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= assets('dist/css/adminlte.min.css') ?>">
</head>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="../index" class="nav-link">Home</a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="../index" class="brand-link">
                <img src="<?= assets('img/icon.png') ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">MyMango.ID</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="<?= assets('img/default.jpg') ?>" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">Developer MyMango.ID</a>
                    </div>
                </div>

    
                <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                        <li class="nav-item">
                            <a href="notes" class="nav-link active">
                                <i class="nav-icon fas fa-copy"></i>
                                <p>
                                    Notes
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="finance" class="nav-link">
                                <i class="nav-icon fas fa-chart-pie"></i>
                                <p>
                                    Keuangan
                                    <span class="right badge badge-danger">New</span>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-code"></i>
                                <p>
                                    ToDo
                                    <span class="right badge badge-info">Coming Soon</span>
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Catatan</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="../index">Home</a></li>
                                <li class="breadcrumb-item active">Notes</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- Default box -->
                    <div class="card">
                        <div class="card-header bg-black color-palette">
                            <h3 class="card-title">Catatan Baru</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>

                        <div class="card-body">
                            <form>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Title</label>
                                    <input type="text" name="1" class="form-control" placeholder="Title your note">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Nominal</label>
                                    <input type="text" name="2" id="income" class="form-control" placeholder="Nominal">
                                </div>
                                <div class="form-group">
                                    <label>Financial Type</label>
                                    <select class="form-control" name="3">
                                        <option selected>Select the type of finance</option>
                                        <option value="in">Income - (Pemasukan)</option>
                                        <option value="out">Expenditure - (Pengeluaran)</option>
                                    </select>
                                </div>
                                <button type="submit" name="save" class="btn btn-dark btn-flat">Save.. <i class="fa fa-save"></i></button>
                            </form>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header bg-black color-palette">
                            <h3 class="card-title">Catatan</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Judul</th>
                                        <th>Tanggal</th>
                                        <th>#</th>
                                        <th>Deskripsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Tidak</td>
                                        <td>Win 95+</td>
                                        <td>1</td>
                                        <td>3</td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Judul</th>
                                        <th>Tanggal</th>
                                        <th>#</th>
                                        <th>Deskripsi</th>

                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card-body -->
                </div>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b>Version</b> 1.2.0
            </div>
            <strong>Created By &copy; 2021-2023 <a href="demiadektu.com">MyMango.ID</a>.</strong>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="<?= assets('plugins/jquery/jquery.min.js') ?>"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= assets('plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    <!-- DataTables  & Plugins -->
    <script src="<?= assets('plugins/datatables/jquery.dataTables.min.js') ?>"></script>
    <script src="<?= assets('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') ?>"></script>
    <script src="<?= assets('plugins/datatables-responsive/js/dataTables.responsive.min.js') ?>"></script>
    <script src="<?= assets('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') ?>"></script>
    <script src="<?= assets('plugins/datatables-buttons/js/dataTables.buttons.min.js') ?>"></script>
    <script src="<?= assets('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') ?>"></script>
    <script src="<?= assets('plugins/datatables-buttons/js/buttons.html5.min.js') ?>"></script>
    <script src="<?= assets('plugins/datatables-buttons/js/buttons.print.min.js') ?>"></script>
    <script src="<?= assets('plugins/datatables-buttons/js/buttons.colVis.min.js') ?>"></script>
    <!-- AdminLTE App -->
    <script src="<?= assets('dist/js/adminlte.min.js') ?>"></script>
    <!-- AdminLTE for demo purposes -->
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
        var nominal_income = document.getElementById("income");
        nominal_income.addEventListener("keyup", function(e) {
            nominal_income.value = formatRupiah(this.value, "Rp. ");
        });

        function formatRupiah(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, "").toString(),
                split = number_string.split(","),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                separator = sisa ? "." : "";
                rupiah += separator + ribuan.join(".");
            }

            rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
            return prefix == undefined ? rupiah : rupiah ? "Rp. " + rupiah : "";
        }
    </script>
</body>

</html>