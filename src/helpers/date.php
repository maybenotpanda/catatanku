<?php

function dateID($tanggal)
{
  $month = array(
    1 => 'Januari',
    'Februari',
    'Maret',
    'April',
    'Mei',
    'Juni',
    'Juli',
    'Agustus',
    'September',
    'Oktober',
    'November',
    'Desember'
  );
  $result = explode('-', $tanggal);

  return $result[2] . ' ' . $month[(int)$result[1]] . ' ' . $result[0];
}

function dateEN($date)
{
  $dateTime = new DateTime($date);
  if ($dateTime->format('H:i:s') === '00:00:00') {
    return $dateTime->format('F j, Y');
  }
  return $dateTime->format('F j, Y - H:i');
}
