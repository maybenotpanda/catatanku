<?php

function getAllAccounts()
{
    global $call;
    $query = mysqli_query($call, "SELECT * FROM accounts");
    return $query;
}