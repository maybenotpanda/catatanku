<?php


include("../mainconfig.php");

if (isset($_POST['save'])) {

    $title          = $_POST['1'];
    $description    = $_POST['2'];
    $created_at     = date("Y-m-d H:i:s");

    $sql = "INSERT INTO notes (title, description, created_at) VALUE ('$title', '$description', '$created_at')";
    $query = mysqli_query($call, $sql);

    if ($query) {
        header('Location:' . $_SERVER["HTTP_REFERER"]);
    } else {
        header('Location: ../index?status=gagal');
    }
} else {
    die("Akses dilarang...");
}
