<?php
$title = "Transactions";
include "layouts/header.php";
include "modal/add-transaction-income.php";
include "modal/add-transaction-expense.php";
include "modal/add-transaction-transfer.php";
include "modal/add-category.php";
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?= $title ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="../index">Home</a></li>
                        <li class="breadcrumb-item active"><?= $title ?></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4 col-sm-6 col-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-success"><i class="fa fa-check" style="color: #1f2d3d;"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Pemasukan</span>
                            <span class="info-box-number"></span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-4 col-sm-6 col-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-info"><i class="fa fa-times" style="color: #1f2d3d;"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Pengeluaran</span>
                            <span class="info-box-number"></span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
            </div>
            <div class="card">
                <div class="card-header bg-black color-palette">
                    <h3 class="card-title">Catatan Keuangan</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <a class="btn btn-app bg-success" data-toggle="modal" data-target="#modal-income">
                        <i class="fas fa-arrow-up"></i>Income
                    </a>
                    <a class="btn btn-app bg-danger" data-toggle="modal" data-target="#modal-expense">
                        <i class="fas fa-arrow-down"></i>Expense
                    </a>
                    <a class="btn btn-app bg-warning" data-toggle="modal" data-target="#modal-transfer">
                        <i class="fas fa-retweet"></i>Transfer
                    </a>
                    <a class="btn btn-app bg-info" data-toggle="modal" data-target="#modal-category">
                        <i class=" fas fa-cat"></i>Category
                    </a>
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Total</th>
                                <th>Type</th>
                                <th>Date</th>
                                <th>Description</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            $say = getAllTransactions();
                            foreach ($say as $mm) :
                            ?>
                                <tr>
                                    <td><?= $mm['name']; ?></td>
                                    <td><?= rupiah($mm['total']); ?></td>
                                    <td>
                                        <?php
                                        if ($mm['type'] === 'income') {
                                            echo "<span class='badge bg-success'><i class='fas fa-arrow-up'></i> IN</span>";
                                        } else {
                                            echo "<span class='badge bg-danger'><i class='fas fa-arrow-down'></i> OUT</span>";
                                        }
                                        ?>
                                    </td>
                                    <td><?= dateEN($mm['dateTransactions']); ?></td>
                                    <td><?= $mm['description']; ?></td>
                                    <td>
                                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-detail<?= $mm['uuid']; ?>">
                                            <i class="fas fa-coffee"></i>
                                        </button>
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            <?php
                                include "modal/detail-transaction.php";
                                $i++;
                            endforeach;
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Title</th>
                                <th>Total</th>
                                <th>Type</th>
                                <th>Date</th>
                                <th>Description</th>
                                <th>#</th>

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

<?php include "layouts/footer.php"; ?>