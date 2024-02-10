<?php
$title = "Accounts";
include "layouts/header.php";
include "modal/add-transaction-income.php";
include "modal/add-category.php";
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
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header bg-black color-palette">
                    <h3 class="card-title">Akun Baru</h3>

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
                    <form action=" <?= base_url('library/configuration/add-account?user=' .  $_SESSION['uuid']) ?>" method="POST">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Name Account:</label>
                            <input type="text" name="name" class="form-control" placeholder="Insert your title">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Nominal: </label>
                            <input type="text" id="nominalRupiah" class="form-control" placeholder="Nominal" name="balance">
                        </div>
                        <button type="submit" name="request" class="btn btn-dark btn-flat">Save.. <i class="fa fa-save"></i></button>
                    </form>
                </div>
            </div>
            <div class="card">
                <div class="card-header bg-black color-palette">
                    <h3 class="card-title">Catatan Akun</h3>
                </div>
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Name Accounts</th>
                                <th>Nominal</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $say = getAllAccounts($_SESSION['uuid']);
                            foreach ($say as $mm) :
                            ?>
                                <tr>
                                    <td><?= $mm['name']; ?></td>
                                    <td><?= rupiah($mm['balance']); ?></td>
                                    <td>
                                        <?php
                                        if ($mm['updated_at'] === null) {
                                            echo dateEN($mm['created_at']);
                                        } else {
                                            echo dateEN($mm['updated_at']);
                                        }

                                        ?>
                                    </td>
                                </tr>
                            <?php
                            endforeach;
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Name Accounts</th>
                                <th>Nominal</th>
                                <th>Date</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>
<?php include "layouts/footer.php"; ?>