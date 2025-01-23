<div class="modal fade" id="modal-category">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add New Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="../../../controllers/create-category.php" method="POST">
        <div class="modal-body">
          <div class="form-group">
            <label for="nameCategory">Name</label>
            <input type="text" class="form-control" id="name" placeholder="Category" name="name">
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
  </div>
</div>