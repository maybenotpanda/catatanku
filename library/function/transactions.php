<?php

function getAllTransactions()
{
    global $call;
    $query = mysqli_query($call, "SELECT * FROM transactions");
    return $query;
}
