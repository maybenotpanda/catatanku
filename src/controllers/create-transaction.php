<?php

include("../../mainconfig.php");

if (isset($_POST['request'])) {
  $type           = $_POST['type'];
  $date           = $_POST['date'];
  $name           = $_POST['name'];
  $total          = preg_replace("/[^0-9]/", "", $_POST['total']);
  $account        = $_POST['account'];
  $category       = $_POST['category'];
  $description    = $_POST['description'];

  $dateExplode      = explode('-', $date);
  $dateTransaction  = $dateExplode[2] . '-' . $dateExplode[1] . '-' . $dateExplode[0];

  $getAccount     = mysqli_query($call, "SELECT * FROM accounts WHERE uuid='$account'");
  $data           = mysqli_fetch_array($getAccount);
  if ($data) {
    if ($type === "Income") {
      $result = intval($data['balance'] + $total);
      mysqli_query($call, "UPDATE accounts SET balance='$result', updated_at='$dtme' WHERE uuid='$account'");

      $createTransaction  = "INSERT INTO transactions (uuid, site_account, site_category, name, total, type, description, transaction_at, created_at) VALUE (UUID(), '$account', '$category', '$name', '$total', '$type', NULLIF('$description', ''), '$dateTransaction', '$dtme')";
      $query              = mysqli_query($call, $createTransaction);
      if ($query) {
        header('Location:../views/pages/transaction?status=200&message=success 👌');
      } else {
        header('Location:../views/pages/transaction?status=500&message=null 🥴');
      }
    } else {
      if ($data['balance'] > $total) {
        $result = intval($data['balance'] - $total);
        mysqli_query($call, "UPDATE accounts SET balance='$result', updated_at='$dtme' WHERE uuid='$account'");

        $createTransaction  = "INSERT INTO transactions (uuid, site_account, site_category, name, total, type, description, transaction_at, created_at) VALUE (UUID(), '$account', '$category', '$name', '$total', '$type', NULLIF('$description', ''), '$dateTransaction', '$dtme')";
        $query              = mysqli_query($call, $createTransaction);
        if ($query) {
          header('Location:../views/pages/transaction?status=200&message=success 👌');
        } else {
          header('Location:../views/pages/transaction?status=500&message=null 🥴');
        }
      } else {
        header('Location:../views/pages/transaction?status=400&message=Saldo Tidak Mencukupi 😱');
      }
    }
  } else {
    header('Location:../views/pages/transaction?status=404&message=Akun Tidak Tersedia 😟');
  }
} else {
  header('Location:../views/pages/transaction?status=500&message=bad request 🥴');
}
