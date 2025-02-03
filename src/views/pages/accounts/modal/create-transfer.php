<div class="modal fade" id="create-transfer">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Add New Transfer</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('src/controllers/AccountsController?type=createTransfer') ?>" method="POST">
        <div class="modal-body">
          <div class="form-group">
            <label>Account From</label>
            <select class="form-control select2" style="width: 100%;" name="accountFrom">
              <option selected="selected" value="">Select Options</option>
              <?php
              $say = getActivatedAccounts();
              foreach ($say as $mm) :
                echo "<option value=" . $mm['uuid'] . ">" . $mm['name'] . "</option>";
              endforeach;
              ?>
            </select>
          </div>
          <div class="form-group">
            <label>Account To</label>
            <select class="form-control select2" style="width: 100%;" name="accountTo">
              <option selected="selected" value="">Select Options</option>
              <?php
              $say = getActivatedAccounts();
              foreach ($say as $mm) :
                echo "<option value=" . $mm['uuid'] . ">" . $mm['name'] . "</option>";
              endforeach;
              ?>
            </select>
          </div>
          <div class="form-group">
            <label for="totalTransactions">Balance</label>
            <input type="text" class="form-control" id="nominalRupiah" placeholder="Total Transactions" name="balance">
          </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-danger btn-block" data-dismiss="modal">Close</button>
          <button type="submit" name="request" class="btn btn-dark btn-block">Save.. <i class="fa fa-save"></i></button>
        </div>
      </form>
    </div>
  </div>
</div>