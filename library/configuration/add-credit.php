<?php

include("../../mainconfig.php");

if (isset($_POST['request'])) {
    $type           = $_GET['type'];
    $user           = $_GET['user'];
    $date           = $_POST['date'];
    $name           = $_POST['name'];
    $total          = preg_replace("/[^0-9]/", "", $_POST['transaction']);
    $account        = $_POST['account'];
    $description    = $_POST['description'];

    $dateExplode        = explode('-', $date);
    $dateTransaction   = $dateExplode[2] . '-' . $dateExplode[1] . '-' . $dateExplode[0];

    $getAccount     = mysqli_query($call, "SELECT * FROM accounts WHERE uuid='$account'");
    $data           = mysqli_fetch_array($getAccount);

    if ($type === "income") {
        $result = intval($data['balance'] + $total);
        mysqli_query($call, "UPDATE accounts SET balance='$result', updated_at='$dtme' WHERE uuid='$account'");
    } else {
        $result = intval($data['balance'] - $total);
        mysqli_query($call, "UPDATE accounts SET balance='$result', updated_at='$dtme' WHERE uuid='$account'");
    }

    $a = "INSERT INTO credit (uuid, siteUser, siteAccount, name, total, type, description, status, created_by, created_at) VALUE (UUID(), '$user', '$account', '$name', '$total', '$type', NULLIF('$description', ''), 'Not Started', '$dateTransaction', '$dtme')";
    $query = mysqli_query($call, $a);

    if ($query) {
        header('Location:' . $_SERVER["HTTP_REFERER"]) . '?status=success';
    } else {
        header('Location:' . $_SERVER["HTTP_REFERER"] . '?status=gagal');
    }
} else {
    die("Fuck me?");
}
