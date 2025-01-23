<?php
include("../../mainconfig.php");

$uuid         = $_GET['uuid'];
$status       = $_POST['status'];

echo $status;

$query = "UPDATE accounts SET site_status='$status', updated_at='$dtme' WHERE uuid='$uuid'";
$exec = mysqli_query($call, $query);
if ($exec) {
  header('Location:' . $_SERVER["HTTP_REFERER"] . '?message=200');
} else {
  echo "error" . $call->error;
}
