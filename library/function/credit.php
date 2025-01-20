<?php

function getAllCredit($user)
{
    global $call;
    $query = mysqli_query($call, "SELECT * FROM credit WHERE siteUser='$user'");
    return $query;
}