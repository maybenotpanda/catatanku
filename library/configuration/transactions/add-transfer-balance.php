<?php
include("../../../mainconfig.php");

if (isset($_POST['request'])) {
    $user           = $_GET['user'];
    $date           = $_POST['1'];
    $accountIn      = $_POST['2'];
    $accountOut     = $_POST['3'];
    $total          = preg_replace("/[^0-9]/", "", $_POST['4']);
    $description    = $_POST['5'];

    $dateExplode        = explode('-', $date);
    $dateTransactions   = $dateExplode[2] . '-' . $dateExplode[1] . '-' . $dateExplode[0];

    $getAccountIn       = mysqli_query($call, "SELECT * FROM accounts WHERE uuid='$accountIn'");
    $getAccountOut      = mysqli_query($call, "SELECT * FROM accounts WHERE uuid='$accountOut'");

    if ($getAccountIn && $getAccountOut) {
        $dataFrom   = mysqli_fetch_array($getAccountIn);
        $dataTo     = mysqli_fetch_array($getAccountOut);

        $resultOut  = intval($dataFrom['balance'] - $total);
        $resultIn   = intval($dataTo['balance'] + $total);

        mysqli_query($call, "UPDATE accounts SET balance='$resultOut', updated_at='$dtme' WHERE uuid='$accountIn'");
        mysqli_query($call, "UPDATE accounts SET balance='$resultIn', updated_at='$dtme' WHERE uuid='$accountOut'");

        $queryA     = "INSERT INTO transactions (uuid, account, category, name, total, type, description, dateTransactions, created_at) VALUE (UUID(), '$accountIn', '0b8ae689-4f94-11ee-8a46-9c2f9dbc986a', 'Transfer Balance Out', '$total', 'expense', '$description', '$dateTransactions', '$dtme')";
        $resultA    = mysqli_query($call, $queryA);

        $queryB     = "INSERT INTO transactions (uuid, account, category, name, total, type, description, dateTransactions, created_at) VALUE (UUID(), '$accountOut', '195b3752-4f94-11ee-8a46-9c2f9dbc986a', 'Transfer Balance In', '$total', 'income', '$description', '$dateTransactions', '$dtme')";
        $resultB    = mysqli_query($call, $queryB);

        if ($resultA && $resultB) {
            header('Location: ' . $_SERVER["HTTP_REFERER"] . '?status=success');
            exit;
        } else {
            header('Location: ' . $_SERVER["HTTP_REFERER"] . '?status=error');
            exit;
        }
    } else {
        header('Location: ' . $_SERVER["HTTP_REFERER"] . '?status=error');
        exit;
    }
} else {
    die("Forbidden");
}