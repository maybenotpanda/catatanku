<?php

function getCategoryOrderType($order)
{
    global $call;
    $query = mysqli_query($call, "SELECT * FROM category WHERE name NOT IN ('Transfer In', 'Transfer Out') AND type='$order'");
    return $query;
}
