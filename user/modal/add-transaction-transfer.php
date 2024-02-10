<div class="modal fade" id="modal-transfer">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Transfer Balance</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('library/configuration/transactions/add-transfer-balance') ?>" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Date:</label>
                        <div class="input-group date" id="TransferDate" data-target-input="nearest">
                            <input type="text" class="form-control datetimepicker-input" data-target="#TransferDate" name="1">
                            <div class="input-group-append" data-target="#TransferDate" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Accounts From: </label>
                        <select class="form-control select2" style="width: 100%;" name="2">
                            <option selected="selected" disabled>Select Account</option>
                            <?php
                            $say = getAllAccounts($_SESSION['uuid']);
                            foreach ($say as $mm) :
                                echo "<option value=" . $mm['uuid'] . ">" . $mm['name'] . "</option>";
                            endforeach;
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Accounts To: </label>
                        <select class="form-control select2" style="width: 100%;" name="3">
                            <option selected="selected" disabled>Select Account</option>
                            <?php
                            $say = getAllAccounts($_SESSION['uuid']);
                            foreach ($say as $mm) :
                                echo "<option value=" . $mm['uuid'] . ">" . $mm['name'] . "</option>";
                            endforeach;
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="totalTransactions">Total</label>
                        <input type="text" class="form-control" id="nominalRupiah" placeholder="Total Transactions" name="4">
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" rows="2" placeholder="Description" name="5"></textarea>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-danger btn-block" data-dismiss="modal">Close</button>
                    <button type="submit" name="save" class="btn btn-dark btn-block">Save.. <i class="fa fa-save"></i></button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>