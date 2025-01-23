<?php

include("../../mainconfig.php");

if (isset($_POST['request'])) {
  $name          = $_POST['name'];
  $description   = $_POST['description'];

  $a = "INSERT INTO category (uuid, name, description, created_at) VALUE (UUID(), '$name', NULLIF('$description', ''), '$dtme')";
  $query = mysqli_query($call, $a);

  if ($query) {
    header('Location:' . $_SERVER["HTTP_REFERER"]) . '?status=success';
  } else {
    header('Location:' . $_SERVER["HTTP_REFERER"] . '?status=gagal');
  }
} else {
  die("What The Hell!!");
}
