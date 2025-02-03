<div class="modal fade" id="create-account">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">New Account</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('src/controllers/AccountsController?type=createAccount') ?>" method="POST">
        <div class="modal-body">
          <div class="form-group">
            <label for="exampleInputEmail1">Name Account:</label>
            <input type="text" name="name" class="form-control" placeholder="Insert your title">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Nominal: </label>
            <input type="text" id="nominalRupiah" class="form-control" placeholder="Nominal" name="balance">
          </div>
          <div class="form-group">
            <label>Status</label>
            <select class="form-control select2" style="width: 100%;" name="status">
              <option selected="selected" value="">Select Options</option>
              <?php
              $say = getAllStatus('activation');
              foreach ($say as $mm) :
                echo "<option value=" . $mm['id'] . ">" . $mm['name'] . "</option>";
              endforeach;
              ?>
            </select>
          </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-danger btn-block" data-dismiss="modal">Close</button>
          <button type="submit" name="request" class="btn btn-dark btn-block">Save <i class="fa fa-save"></i></button>
        </div>
      </form>
    </div>
  </div>
</div>