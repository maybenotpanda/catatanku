<?php
include("../../mainconfig.php");

if (isset($_POST['request'])) {
  $name       = $_POST['name'];
  $status     = $_POST['status'];
  $balance    = preg_replace("/[^0-9]/", "", $_POST['balance']);
  $query      = "INSERT INTO accounts (uuid, site_status, name, balance, created_at) VALUE (UUID(), '$status', '$name', '$balance', '$dtme')";
  $response = mysqli_query($call, $query);
  if ($response) {
    header('Location:' . $_SERVER["HTTP_REFERER"]) . '?status=200';
  } else {
    header('Location:' . $_SERVER["HTTP_REFERER"] . '?status=400');
  }
} else {
  die("What The Hell!!");
}
