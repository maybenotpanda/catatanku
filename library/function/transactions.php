<?php

function getAllTransactions()
{
    global $call;
    $query = mysqli_query($call, "SELECT * FROM transactions ORDER BY created_at desc");
    return $query;
}
