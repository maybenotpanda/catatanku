<?php
if (isset($_POST['request'])) {
  $type         = $_GET['type'];
  $user         = $_GET['user'];
  $name         = $_POST['name'];
  $priority     = $_POST['priority'];
  $target       = preg_replace("/[^0-9]/", "", $_POST['target']);
  $description  = $_POST['description'];
} else {
  die("Fuck me?");
}
