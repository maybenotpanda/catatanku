<div class="modal fade" id="modal-detail<?= $mm['uuid']; ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Detail <?= $mm['name'] ?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php
                $uuid = $mm['uuid'];
                $data = getDetailTransactions($uuid);
                if ($data) {
                ?>
                    <div class="row">
                        <div class="col">
                            <label for="recipient-name" class="col-form-label">Name:</label>
                            <p><?= $data['name'] ?></p>
                        </div>
                        <div class="col">
                            <label for="recipient-name" class="col-form-label">Accounts:</label>
                            <p><?= $data['account'] ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="recipient-name" class="col-form-label">Category:</label>
                            <p><?= $data['category'] ?></p>
                        </div>
                        <div class="col">
                            <label for="recipient-name" class="col-form-label">Type:</label>
                            <p><?= $data['type'] ?></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Total:</label>
                        <p><?= rupiah($data['total']) ?></p>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Description:</label>
                        <p><?= $data['description'] ?></p>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="recipient-name" class="col-form-label">Transaction Date:</label>
                            <p><?= dateEN($data['date']) ?></p>
                        </div>
                        <div class="col">
                            <label for="recipient-name" class="col-form-label">Created Date:</label>
                            <p><?= dateEN($data['created_at']) ?></p>
                        </div>
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
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>