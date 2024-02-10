<?php

function getAllAccounts($user)
{
    global $call;
    $query = mysqli_query($call, "SELECT * FROM accounts WHERE siteUser='$user'");
    return $query;
}