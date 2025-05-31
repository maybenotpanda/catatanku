<?php

include '../../mainconfig.php';

if (isset($_POST['request'])) {
  switch ($_GET['type']) {
    case "createCategory":
      // * create category
      $name         = isset($_POST['name']) ? trim($_POST['name']) : '';
      $description  = isset($_POST['description']) ? trim($_POST['description']) : '';
      if (empty($name)) {
        header('Location:../views/pages/categories?status=400&message=Harap Memasukkan Nama Kategori');
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
        header('Location:../views/pages/categories?status=200&message=successfully');
      } else {
        header('Location:../views/pages/categories?status=500&message=null');
      }
      break;
    case "updateCategory":
      // * update Category
      $uuid         = $_GET['category'];
      $name         = isset($_POST['name']) ? trim($_POST['name']) : '';
      $description  = isset($_POST['description']) ? trim($_POST['description']) : '';

      if (empty($name)) {
        header('Location:../views/pages/categories?status=400&message=Harap Memasukkan Nama Kategori');
        exit;
      }

      if (empty($uuid)) {
        header('Location:../views/pages/categories?status=404&message=Akun Tidak Di temukan');
        exit;
      }

      $updateCategory = mysqli_query(
        $call,
        "UPDATE category
        SET
          name='$name',
          description='$description',
          updated_at='$dtme'
        WHERE uuid='$uuid'"
      );
      if ($updateCategory) {
        header('Location:../views/pages/categories?status=200&message=successfully');
      } else {
        header('Location:../views/pages/categories?status=500&message=null');
      }
      break;
    case "deleteCategory":
      // * delete Category
      $uuid = $_GET['category'];

      if (empty($uuid)) {
        header('Location:../views/pages/categories?status=404&message=Akun Tidak Di temukan');
        exit;
      }
      $deleteCategory = mysqli_query(
        $call,
        "UPDATE category
          SET
            deleted_at='$dtme'
          WHERE uuid='$uuid'"
      );
      if ($deleteCategory) {
        header('Location:../views/pages/categories?status=200&message=successfully');
      } else {
        header('Location:../views/pages/categories?status=500&message=null');
      }
      break;
    default:
      header('Location:../views/pages/categories?status=404&message=not found type');
  }
} else {
  header('Location:../views/pages/categories?status=500&message=bad request');
}
