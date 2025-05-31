<?php
$title = "Category";
include "../../includes/header.php";
include "modal/create-category.php";
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
          <a class="btn btn-app bg-white" data-toggle="modal" data-target="#create-category">
            <i class="fas fa-plus"></i><span>Category</span>
          </a>
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Name</th>
                <th>Date</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $say = getAllCategory();
              foreach ($say as $mm) :
              ?>
                <tr>
                  <td><?= $mm['name'] ?></td>
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
                    <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#update-category<?= $mm['uuid'] ?>">
                      <i class="fas fa-pencil-alt"></i>
                    </button>
                    <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete-category<?= $mm['uuid'] ?>">
                      <i class="fas fa-trash"></i>
                    </button>
                  </td>
                </tr>
              <?php
                include "modal/update-category.php";
                include "modal/delete-category.php";
              endforeach;
              ?>
            </tbody>
            <tfoot>
              <tr>
                <th>Name</th>
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