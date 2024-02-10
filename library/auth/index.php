<?php
session_start();

include '../../mainconfig.php';

if (isset($_POST['request'])) {
  if ($_POST['username'] == "" || empty($_POST['username'])) {
    $response = "nama pengguna tidak boleh kosong";
    header('location:../../index?response=' .$response);
  }
  if ($_POST['password'] == "" || empty($_POST['password'])) {
    $response = "kata sandi tidak boleh kosong";
    header('location:../../index?response=' .$response);
  } else {
    $username = $_POST['username'];

    $password = $_POST['password'];
    $queryUser    = mysqli_query($call, "SELECT * FROM users WHERE username='$username'");
    $responseUser = mysqli_fetch_assoc($queryUser);
    if ($responseUser) {
      $stored_password_hash = $responseUser['password'];
      if (password_verify($password, $stored_password_hash)) {
        if ($responseUser['status'] === "active") {
          $_SESSION['uuid']   = $responseUser['uuid'];
          $_SESSION['status'] = $responseUser['status'];
          $response = "Berhasil Masuk";
          header('location:../../user/index?response=' .$response);
        } else {
          $response = "Akun Tidak Aktif";
          header('location:../../index?response=' .$response);
        }
      } else {
        $response = "Kata sandi salah.";
        header('location:../../index?response=' .$response);
      }
    } else {
      $response = "Terjadi Kesalahan";
      header('location:../../index?response=' .$response);
    }
  }
} else {
  $response = "Tidak Ada Response";
  header('location:../../index?response=' .$response);
}
