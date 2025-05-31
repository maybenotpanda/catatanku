<?php

function getAllCategory()
{
  global $call;
  $query = mysqli_query($call, "SELECT * FROM category WHERE deleted_at IS null");
  return $query;
}

function getDetailCategory($uuid)
{
  global $call;
  $query = mysqli_query($call, "SELECT * FROM category  WHERE uuid='$uuid'");
  return mysqli_fetch_array($query);
}
