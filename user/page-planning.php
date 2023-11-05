<?php
$title = "Planning";
include "layouts/header.php";
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
            <div class="card">
                <div class="card-header bg-black color-palette">
                    <h3 class="card-title">New Planning</h3>

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
                    <form action="../library/configuration/add-planning" method="POST">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Name Planning:</label>
                            <input type="text" name="1" class="form-control" placeholder="Insert your planning">
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <select class="form-control select2" style="width: 100%;" name="2">
                                <?php
                                $say = getAllStatus('process');
                                foreach ($say as $mm) :
                                    echo "<option value=" . $mm['id'] . ">" . $mm['name'] . "</option>";
                                endforeach;
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Priority</label>
                            <select class="form-control" style="width: 100%;" name="3">
                                <option selected="" disabled>Select Options</option>
                                <?php
                                $say = getAllStatus('priority');
                                foreach ($say as $mm) :
                                    echo "<option value=" . $mm['id'] . ">" . $mm['name'] . "</option>";
                                endforeach;
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Nominal: </label>
                            <input type="text" id="nominalRupiah" class="form-control" placeholder="Nominal" name="4">
                        </div>
                        <button type="submit" name="save" class="btn btn-dark btn-flat">Save.. <i class="fa fa-save"></i></button>
                    </form>
                </div>
            </div>
            <div class="card">
                <div class="card-header bg-black color-palette">
                    <h3 class="card-title">My Planning</h3>
                </div>
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Planning</th>
                                <th>Status</th>
                                <th>Nominal</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            $say = getAllPlanning();
                            foreach ($say as $mm) :
                            ?>
                                <tr>
                                    <td><?= $mm['planning']; ?></td>
                                    <td><?= $mm['status']; ?></td>
                                    <td><?= rupiah($mm['nominal']); ?></td>
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
                                <th>Planning</th>
                                <th>Status</th>
                                <th>Nominal</th>
                                <th>Date</th>
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