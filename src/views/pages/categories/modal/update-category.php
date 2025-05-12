<div class="modal fade" id="update-category<?= $mm['uuid'] ?>">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Update Category </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('src/controllers/CategoryController?type=updateCategory&category=') ?><?= $mm['uuid'] ?>" method="POST">
        <div class="modal-body">
          <?php
          $uuid = $mm['uuid'];
          $data = getDetailCategory($uuid);
          if ($data) {
          ?>
            <div class="form-group">
              <label for="nameCategory">Name</label>
              <input type="text" class="form-control" id="name" placeholder="Category" name="name" value="<?= $data['name'] ?>">
            </div>
            <div class="form-group">
              <label>Description</label>
              <textarea class="form-control" rows="2" placeholder="Description" name="description"><?= $data['description'] ?></textarea>
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
  </div>
</div>