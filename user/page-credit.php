<?php
$title = "Credit";
include "layouts/header.php";
include "modal/add-credit-pinjam.php";
include "modal/add-credit-beri.php";
?>

<div class="content-wrapper">
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
  <section class="content">
    <div class="container-fluid">
      <div class="card">
        <div class="card-header bg-black color-palette">
          <h3 class="card-title">Catatan Keuangan</h3>
        </div>
        <div class="card-body">
          <a class="btn btn-app bg-success" data-toggle="modal" data-target="#modal-pinjam">
            <i class="fas fa-arrow-up" style="color: #1f2d3d;"></i><span style="color: #f7f7f7;">Meminjam</span>
          </a>
          <a class="btn btn-app bg-danger" data-toggle="modal" data-target="#modal-beri">
            <i class="fas fa-arrow-down" style="color: #1f2d3d;"></i><span style="color: #f7f7f7;">Memberi</span>
          </a>
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th style="width: 1px;">No.</th>
                <th>Title</th>
                <th>Total</th>
                <th>Type</th>
                <th>Date</th>
                <th>#</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $i = 1;
              $say = getAllCredit($_SESSION['uuid']);
              foreach ($say as $mm) :
              ?>
                <tr>
                  <td><?= $i ?></td>
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
                  <td><?= dateEN($mm['created_by']); ?></td>
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
                <th>No</th>
                <th>Title</th>
                <th>Total</th>
                <th>Type</th>
                <th>Date</th>
                <th>#</th>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
    </div>
  </section>
</div>
<?php include "layouts/footer.php"; ?>