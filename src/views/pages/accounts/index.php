<?php
$title = "Accounts";
include "../../includes/header.php";
include "create.php";
include "modal/create-transfer.php";
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
      <?php require '../../includes/alerts.php' ?>
      <div class="card">
        <div class="card-header bg-black color-palette">
          <h3 class="card-title"><?= $title ?> List</h3>
        </div>
        <div class="card-body">
          <a class="btn btn-app bg-white" data-toggle="modal" data-target="#create-account">
            <i class="fas fa-plus"></i><span>Account</span>
          </a>
          <a class="btn btn-app bg-dark" data-toggle="modal" data-target="#create-transfer">
            <i class="fas fa-plus"></i><span>Transfer</span>
          </a>
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Name Accounts</th>
                <th>Balance</th>
                <th>Status</th>
                <th>Date</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $say = getAllAccounts();
              foreach ($say as $mm) :
              ?>
                <tr>
                  <td><?= $mm['name'] ?></td>
                  <td><?= currency($mm['balance']) ?></td>
                  <td>
                    <!-- danger, warning -->
                    <span class="badge bg-<?php if ($mm['status'] === 'Activated') {
                                            echo 'success';
                                          } else if ($mm['status']  === 'Suspended') {
                                            echo 'warning';
                                          } else {
                                            echo 'danger';
                                          } ?>">
                      <?= $mm['status'] ?>
                    </span>
                  </td>
                  <td>
                    <?php
                    if ($mm['updated_at'] === null) {
                      echo dateEN($mm['created_at']);
                    } else {
                      echo dateEN($mm['updated_at']);
                    }
                    ?>
                  </td>
                  <td>
                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#detail-account<?= $mm['uuid'] ?>">
                      <i class="fas fa-eye"></i>
                    </button>
                    <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#update-account<?= $mm['uuid'] ?>">
                      <i class="fas fa-pencil-alt"></i>
                    </button>
                    <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete-account<?= $mm['uuid'] ?>">
                      <i class="fas fa-trash"></i>
                    </button>
                  </td>
                </tr>
              <?php
                include "detail.php";
                include "update.php";
                include "delete.php";
              endforeach;
              ?>
            </tbody>
            <tfoot>
              <tr>
                <th>Name Accounts</th>
                <th>Balance</th>
                <th>Status</th>
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