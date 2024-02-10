<?php

function getAllPlanning()
{
    global $call;
    $query = mysqli_query(
        $call,
        "SELECT
            planning.name as planning,
            planning.nominal,
            planning.created_at,
            planning.updated_at,
            status.name as status
        FROM planning
        JOIN status
        ON planning.siteStatus = status.id
        "
    );
    return $query;
}
