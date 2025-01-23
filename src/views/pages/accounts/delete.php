<div class="modal fade" id="delete-account<?= $mm['uuid'] ?>">
  <div class="modal-dialog">
    <form action="../../../controllers/delete-accounts.php?uuid=<?= $mm['uuid'] ?>" method="POST">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Hapus Mandiri</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Anda yakin ingin menghapus akun ini?</p>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-danger btn-block" data-dismiss="modal">Close</button>
          <button type="submit" name="request" class="btn btn-dark btn-block">Delete <i class="fa fa-trash"></i></button>
        </div>
      </div>
    </form>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>