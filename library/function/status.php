<?php

function getAllStatus($type)
{
    global $call;
    $query = mysqli_query($call, "SELECT * FROM status WHERE type='$type'");
    return $query;
}
