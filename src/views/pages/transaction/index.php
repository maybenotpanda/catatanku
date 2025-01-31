<?php
$title = "Transactions";
include "../../includes/header.php";
include "modal/create-category.php";
include "modal/create-transaction.php";
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
            <li class="breadcrumb-item"><a href="../../../../">Home</a></li>
            <li class="breadcrumb-item active"><?= $title ?></li>
          </ol>
        </div>
      </div>
    </div>
  </section>
  <section class="content">
    <div class="container-fluid">
      <div class="card">
        <div class="card-header bg-black color-palette">
          <h3 class="card-title">Transaction List</h3>
        </div>
        <div class="card-body">
          <a class="btn btn-app bg-success" data-toggle="modal" data-target="#create-transaction">
            <i class="fas fa-plus" style="color: #1f2d3d;"></i><span style="color: #f7f7f7;">Add</span>
          </a>
          <a class="btn btn-app bg-info" data-toggle="modal" data-target="#modal-category">
            <i class=" fas fa-cat" style="color: #1f2d3d;"></i><span style="color: #f7f7f7;">Category</span>
          </a>
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Title</th>
                <th>Total</th>
                <th>Type</th>
                <th>Date</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $say = getAllTransactions();
              foreach ($say as $mm) :
              ?>
                <tr>
                  <td><?= $mm['name']; ?></td>
                  <td><?= currency($mm['total']); ?></td>
                  <td>
                    <?php
                    if ($mm['type'] === 'Income') {
                      echo "<span class='badge bg-success'><i class='fas fa-arrow-up'></i> IN</span>";
                    } else {
                      echo "<span class='badge bg-danger'><i class='fas fa-arrow-down'></i> OUT</span>";
                    }
                    ?>
                  </td>
                  <td><?= dateEN($mm['transaction_at'], 'time'); ?></td>
                  <td>
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-detail<?= $mm['uuid']; ?>">
                      <i class="fas fa-eye"></i>
                    </button>
                    <!-- <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal">
                      <i class="fas fa-trash"></i>
                    </button> -->
                  </td>
                </tr>
              <?php
                include "modal/detail-transaction.php";
              // $i++;
              endforeach;
              ?>
            </tbody>
            <tfoot>
              <tr>
                <th>Title</th>
                <th>Total</th>
                <th>Type</th>
                <th>Date</th>
                <th>Action</th>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
    </div>
  </section>
</div>

<?php include "../../includes/footer.php"; ?>