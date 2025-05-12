<?php

function getAllCategory()
{
  global $call;
  $query = mysqli_query($call, "SELECT * FROM category WHERE deleted_at IS null");
  return $query;
}
