<?php if (isset($_GET['status'])) { ?>
  <?php if ($_GET['status'] == "200") { ?>
    <div class="alert alert-success alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <h5><i class="icon fas fa-check"></i> Alert!</h5>
      <?= htmlspecialchars($_GET['message'] ?? 'Berhasil Cuy! 👌'); ?>
    </div>
  <?php } else { ?>
    <div class="alert alert-danger alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <h5><i class="icon fas fa-ban"></i> Alert!</h5>
      <?= htmlspecialchars($_GET['message'] ?? 'Terjadi kesalahan'); ?>
    </div>
  <?php } ?>
<?php } ?>