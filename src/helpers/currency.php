<?php
function currency($number)
{
  if (is_null($number) || $number === 0) {
    $result = "IDR. 0";
  } else {
    $result = "IDR. " . number_format($number, 0, ',', '.');
  }
  return $result;
}
