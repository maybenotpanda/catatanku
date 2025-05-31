<div class="modal fade" id="detail-account<?= $mm['uuid'] ?>">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Detail Mandiri</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php
        $uuid = $mm['uuid'];
        $data = getDetailAccount($uuid);
        if ($data) {
        ?>
          <label for="recipient-name" class="col-form-label">Status:</label>
          <span class="badge bg-<?php if ($data['status'] === 'Activated') {
                                  echo 'success';
                                } else if ($data['status']  === 'Suspended') {
                                  echo 'warning';
                                } else {
                                  echo 'danger';
                                } ?>"> <?= $data['status'] ?></span>
          <div class="row">
            <div class="col">
              <label for="recipient-name" class="col-form-label">Account:</label>
              <p><?= $data['name'] ?></p>
            </div>
            <div class="col">
              <label for="recipient-name" class="col-form-label">Account Number:</label>
              <p><?= $data['account_number'] ? $data['account_number'] : "Tidak Tersedia" ?></p>
            </div>
          </div>
          <div class="row">
            <div class='col'>
              <label for="recipient-name" class="col-form-label">Balance:</label>
              <p><?= currency($data['account_number']) ?></p>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <label for="recipient-name" class="col-form-label">Created:</label>
              <p><?= dateEN($data['created_at']) ?></p>
            </div>
            <?php
            if ($data['updated_at']) {
            ?>
              <div class="col">
                <label for="recipient-name" class="col-form-label">Updated:</label>
                <p><?= dateEN($data['updated_at']) ?></p>
              </div>
            <?php } ?>
          </div>
        <?php
        } else {
          echo "Not Found";
        }
        ?>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-danger btn-block" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>