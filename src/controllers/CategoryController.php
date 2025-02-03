<?php

include '../../mainconfig.php';

if (isset($_POST['request'])) {
  switch ($_GET['type']) {
    case "createCategory":
      // * create category
      $name         = isset($_POST['name']) ? trim($_POST['name']) : '';
      $description  = isset($_POST['description']) ? trim($_POST['description']) : '';
      if (empty($name)) {
        header('Location:../views/pages/transaction?status=400&message=Harap Memasukkan Nama Kategori');
        exit;
      }

      $createCategory = mysqli_query(
        $call,
        "INSERT INTO category (
          uuid,
          name,
          description,
          created_at
        ) VALUE (
          UUID(),
          '$name',
          NULLIF('$description', ''),
          '$dtme'
        )"
      );
      if ($createCategory) {
        header('Location:../views/pages/transaction?status=200&message=successfully');
      } else {
        header('Location:../views/pages/transaction?status=500&message=null');
      }
      break;
    default:
      header('Location:../views/pages/transaction?status=404&message=not found type');
  }
} else {
  header('Location:../views/pages/transaction?status=500&message=bad request');
}
