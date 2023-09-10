<?php

function getCategoryOrderType($order)
{
    global $call;
    $query = mysqli_query($call, "SELECT * FROM category WHERE type='$order'");
    return $query;
}