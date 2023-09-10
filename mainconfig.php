<?php

date_default_timezone_set('Asia/Jakarta');
ini_set('memory_limit', '1024M');
$date = date('Y-m-d');
$time = date('H:i:s');
$dtme = date('Y-m-d H:i:s');

$ayy = [
    'host' => 'localhost',
    'user' => 'root',   # Database Username
    'pass' => '',       # Database Password
    'name' => 'noted'       # Database Name
];

$call = mysqli_connect($ayy['host'], $ayy['user'], $ayy['pass'], $ayy['name']);

if ($call->connect_error) {
    die("Connection failed: " . $call->connect_error);
    echo "Server Sedang ada gangguan";
}

function rupiah($number)
{
    if ($number === 0) {
        $result = "Rp. 0";
    } else {
        $result = "Rp " . number_format($number, 0, ',', '.');
    }
    return $result;
}

function base_url($x = '')
{
    // global $_SERVER;
    // return 'https://' . $_SERVER['SERVER_NAME'] . '/' . $x;
    return  '../' . $x;
}

function assets($x)
{
    return base_url('library/assets/' . $x);
}

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
    if (strpos($date, ' ') !== false) {
        $dateTime = new DateTime($date);
        return $dateTime->format('F j, Y H:i');
    } else {
        $dateTime = new DateTime($date);
        return $dateTime->format('F j, Y');
    }
}
