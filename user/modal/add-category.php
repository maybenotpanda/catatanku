<div class="modal fade" id="modal-category">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= assets('../configuration/add-category') ?>" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nameCategory">Name</label>
                        <input type="text" class="form-control" id="nameCategory" placeholder="Category" name="1">
                    </div>
                    <div class="form-group">
                        <label>Type Category</label>
                        <select class="form-control select2" style="width: 100%;" name="2">
                            <option selected="selected" disabled>Select Options</option>
                            <option value="income">Income</option>
                            <option value="expense">Expense</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" rows="2" placeholder="Description" name="3"></textarea>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" name="save" class="btn btn-dark">Save.. <i class="fa fa-save"></i></button>
                </div>
            </form>
        </div>
    </div>
</div>