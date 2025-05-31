<?php

include '../../mainconfig.php';

if (isset($_POST['request'])) {
  switch ($_GET['type']) {
    case "createAccount":
      // * create account
      $name     = isset($_POST['name']) ? trim($_POST['name']) : '';
      $status   = isset($_POST['status']) ? trim($_POST['status']) : '';
      $balance  = isset($_POST['balance']) ? preg_replace("/[^0-9]/", "", $_POST['balance']) : '0';
      if (empty($name)) {
        header('Location:../views/pages/accounts?status=400&message=Harap Memasukkan Nama Akun');
        exit;
      }
      if (empty($status)) {
        header('Location:../views/pages/accounts?status=400&message=Harap Memilih Status');
        exit;
      }
      $createAccount  = mysqli_query(
        $call,
        "INSERT INTO accounts (
          uuid,
          site_status,
          name,
          balance,
          created_at
        ) VALUE (
          UUID(),
          '$status',
          '$name',
          '$balance',
          '$dtme'
        )"
      );
      if ($createAccount) {
        header('Location:../views/pages/accounts?status=200&message=successfully');
      } else {
        header('Location:../views/pages/accounts?status=500&message=null');
      }
      break;
    case "createTransfer":
      // * create transfer
      $account_from = isset($_POST['accountFrom']) ? trim($_POST['accountFrom']) : '';
      $account_to   = isset($_POST['accountTo']) ? trim($_POST['accountTo']) : '';
      $balance      = isset($_POST['balance']) ? preg_replace("/[^0-9]/", "", $_POST['balance'])  : 0;

      if (empty($account_from)) {
        header('Location:../views/pages/accounts?status=400&message=Harap Memilih Akun Asal');
        exit;
      }
      if (empty($account_to)) {
        header('Location:../views/pages/accounts?status=400&message=Harap Memilih Akun Tujuan');
        exit;
      }
      if (empty($balance)) {
        header('Location:../views/pages/accounts?status=400&message=Harap Memasukkan Jumlah Transfer');
        exit;
      }

      $getAccountFrom = mysqli_query($call, "SELECT * FROM accounts WHERE uuid='$account_from'");
      $dataFrom       = mysqli_fetch_array($getAccountFrom);
      $getAccountTo   = mysqli_query($call, "SELECT * FROM accounts WHERE uuid='$account_to'");
      $dataTo         = mysqli_fetch_array($getAccountTo);
      if ($dataFrom && $dataTo) {
        if ($dataFrom['balance'] >= $balance) {
          $resultFrom   = intval($dataFrom['balance'] - $balance);
          $resultTo     = intval($dataTo['balance'] + $balance);

          $updateAccountFrom  = mysqli_query(
            $call,
            "UPDATE accounts
            SET
              balance='$resultFrom',
              updated_at='$dtme'
            WHERE uuid='$account_from'"
          );
          $updateAccountTo    = mysqli_query(
            $call,
            "UPDATE accounts
            SET
              balance='$resultTo',
              updated_at='$dtme'
            WHERE uuid='$account_to'"
          );
          if ($updateAccountFrom && $updateAccountTo) {
            $dataJson = json_encode([
              'account_from' => [
                'uuid' => $account_from,
                'old_balance' => $dataFrom['balance'],
                'new_balance' => $resultFrom,
                'updated_at' => $dtme,
              ],
              'account_to' => [
                'uuid' => $account_from,
                'old_balance' => $dataTo['balance'],
                'new_balance' => $resultTo,
                'updated_at' => $dtme,
              ]
            ]);
            $createLog = mysqli_query($call, "INSERT INTO transaction_logs (site_user, data, type) VALUE (NULL, '$dataJson', 'TRANSACTION')");
            if ($createLog) {
              header('Location:../views/pages/accounts?status=200&message=successfully');
            } else {
              header('Location:../views/pages/accounts?status=500&message=null');
            }
          } else {
            header('Location:../views/pages/accounts?status=500&message=null');
          }
        } else {
          header('Location:../views/pages/accounts?status=400&message=Saldo Tidak Mencukupi');
        }
      } else {
        header('Location:../views/pages/accounts?status=404&message=not found');
      }
      break;
    case "updateAccount":
      // * update account
      $uuid         = $_GET['account'];
      $status       = $_POST['status'];

      if (empty($uuid)) {
        header('Location:../views/pages/accounts?status=404&message=Akun Tidak Di temukan');
        exit;
      }
      $updateAccount = mysqli_query(
        $call,
        "UPDATE accounts
        SET
          site_status='$status',
          updated_at='$dtme'
        WHERE uuid='$uuid'"
      );
      if ($updateAccount) {
        header('Location:../views/pages/accounts?status=200&message=successfully');
      } else {
        header('Location:../views/pages/accounts?status=500&message=null');
      }
      break;
    case "deleteAccount":
      // * delete transfer
      $uuid = $_GET['account'];

      if (empty($uuid)) {
        header('Location:../views/pages/accounts?status=404&message=Akun Tidak Di temukan');
        exit;
      }
      $deleteAccount = mysqli_query(
        $call,
        "UPDATE accounts
        SET
          site_status=1001,
          deleted_at='$dtme'
        WHERE uuid='$uuid'"
      );
      if ($deleteAccount) {
        header('Location:../views/pages/accounts?status=200&message=successfully');
      } else {
        header('Location:../views/pages/accounts?status=500&message=null');
      }
      break;
    default:
      header('Location:../views/pages/accounts?status=404&message=not found type');
  }
} else {
  header('Location:../views/pages/accounts?status=500&message=bad request');
}
