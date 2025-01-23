<?php

date_default_timezone_set('Asia/Jakarta');
ini_set('memory_limit', '1024M');
$date = date('Y-m-d');
$time = date('H:i:s');
$dtme = date('Y-m-d H:i:s');

$database = [
    'host' => 'localhost',              # Database host
    'user' => 'root',                   # Database username
    'pass' => '',                       # Database password
    'name' => 'staging_notes',          # Database name
];

$call = mysqli_connect($database['host'], $database['user'], $database['pass'], $database['name']);

if ($call->connect_error) {
    die("Connection failed: " . $call->connect_error);
    echo "Server Sedang ada gangguan";
}

function base_url($path = '')
{
    return  '../../../../' . $path;
}

function assets($path)
{
    return base_url('public/assets/' . $path);
}
