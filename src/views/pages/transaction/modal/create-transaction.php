<div class="modal fade" id="create-transaction">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Add New Transaction</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="../../../controllers/create-transaction.php" method="POST">
        <div class="modal-body">
          <div class="form-group">
            <label>Type</label>
            <select class="form-control" style="width: 100%;" name="type">
              <option selected="selected" value="">Select Options</option>
              <option value="Income">Income</option>
              <option value="Expense">Expense</option>
            </select>
          </div>
          <div class="form-group">
            <label>Date:</label>
            <div class="input-group date" id="IncomeDate" data-target-input="nearest">
              <input type="text" class="form-control datetimepicker-input" data-target="#IncomeDate" name="date">
              <div class="input-group-append" data-target="#IncomeDate" data-toggle="datetimepicker">
                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="nameTransactions">Title</label>
            <input type="text" class="form-control" id="nameTransactions" placeholder="Title Transactions" name="name">
          </div>
          <div class="form-group">
            <label for="totalTransactions">Total</label>
            <input type="text" class="form-control" id="nominalRupiah" placeholder="Total Transactions" name="total">
          </div>
          <div class="form-group">
            <label>Accounts</label>
            <select class="form-control select2" style="width: 100%;" name="account">
              <option selected="selected" value="802b8ad6-d8ea-11ef-8a81-9c2f9dbc986a">Select Options</option>
              <?php
              $say = getActivatedAccounts();
              foreach ($say as $mm) :
                echo "<option value=" . $mm['uuid'] . ">" . $mm['name'] . "</option>";
              endforeach;
              ?>
            </select>
          </div>
          <div class="form-group">
            <label>Category</label>
            <select class="form-control select2" style="width: 100%;" name="category">
              <option selected="" disabled>Select Options</option>
              <?php
              $say = getAllCategory();
              foreach ($say as $mm) :
                echo "<option value=" . $mm['uuid'] . ">" . $mm['name'] . "</option>";
              endforeach;
              ?>
            </select>
          </div>
          <div class="form-group">
            <label>Description</label>
            <textarea class="form-control" rows="2" placeholder="Description" name="description"></textarea>
          </div>
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