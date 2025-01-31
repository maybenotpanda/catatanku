<?php

include("../../mainconfig.php");

if (isset($_POST['request'])) {
  $account_from = $_POST['accountFrom'];
  $account_to   = $_POST['accountTo'];
  $balance      = $_POST['balance'];

  $getAccountFrom = mysqli_query($call, "SELECT * FROM accounts WHERE uuid='$account_from'");
  $dataFrom       = mysqli_fetch_array($getAccountFrom);
  $getAccountTo   = mysqli_query($call, "SELECT * FROM accounts WHERE uuid='$account_to'");
  $dataTo         = mysqli_fetch_array($getAccountTo);

  if ($dataFrom && $dataTo) {
    if ($dataFrom['balance'] > $balance) {
      $resultFrom   = intval($dataFrom['balance'] - $balance);
      $resultTo     = intval($dataTo['balance'] + $balance);

      $updateAccountFrom  = mysqli_query($call, "UPDATE accounts SET balance='$resultFrom', updated_at='$dtme' WHERE uuid='$account_from'");
      $updateAccountTo    = mysqli_query($call, "UPDATE accounts SET balance='$resultTo', updated_at='$dtme' WHERE uuid='$account_to'");
      if ($updateAccountFrom && $updateAccountTo) {
        header('Location:' . $_SERVER["HTTP_REFERER"] . '?status=200&?message=success');
      } else {
        header('Location:' . $_SERVER["HTTP_REFERER"] . '?status=500&?message=null');
      }
    } else {
      header('Location:' . $_SERVER["HTTP_REFERER"] . '?status=400&?message=Saldo Tidak Mencukupi');
    }
  } else {
    header('Location:' . $_SERVER["HTTP_REFERER"] . '?status=404&?message=Akun Tidak Tersedia');
  }
} else {
  header('Location:' . $_SERVER["HTTP_REFERER"] . '?status=500&?message=bad request');
}
