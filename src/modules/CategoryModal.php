<?php

function getAllCategory()
{
  global $call;
  $query = mysqli_query($call, "SELECT * FROM category");
  return $query;
}
