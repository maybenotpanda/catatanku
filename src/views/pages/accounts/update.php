<div class="modal fade" id="update-account<?= $mm['uuid'] ?>">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Update Mandiri</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="../../../controllers/update-accounts.php?uuid=<?= $mm['uuid'] ?>" method="POST">
        <div class="modal-body">
          <?php
          $uuid = $mm['uuid'];
          $data = getDetailAccount($uuid);
          if ($data) {
          ?>
            <div class="form-group">
              <label>Status</label>
              <select class="form-control select2" style="width: 100%;" name="status">
                <?php
                $say = getAllStatus('activation');
                foreach ($say as $status) :
                  $isSelected = ($status['id'] === $data['site_status']) ? 'selected' : '';
                  echo "<option value=" . $status['id'] . " $isSelected>" . $status['name'] . "</option>";
                endforeach;
                ?>
              </select>
            </div>
            <div class="row">
              <div class="col">
                <label for="recipient-name" class="col-form-label">Account:</label>
                <p><?= $data['name'] ?></p>
              </div>
              <div class="col">
                <label for="recipient-name" class="col-form-label">Balance:</label>
                <p><?= $data['balance'] ?></p>
              </div>
            </div>
            <div class="row">
              <div class="col">
                <label for="recipient-name" class="col-form-label">Created:</label>
                <p><?= $data['created_at'] ?></p>
              </div>
              <?php
              if ($data['updated_at']) {
              ?>
                <div class="col">
                  <label for="recipient-name" class="col-form-label">Updated:</label>
                  <p><?= $data['updated_at'] ?></p>
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
          <button type="submit" name="request" class="btn btn-dark btn-block">Save.. <i class="fa fa-save"></i></button>
        </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>