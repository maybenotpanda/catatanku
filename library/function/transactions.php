<?php

function getAllTransactions($user)
{
    global $call;
    $query = mysqli_query($call, "SELECT * FROM transactions WHERE siteUser='$user' ORDER BY created_at desc");
    return $query;
}

function getDetailTransactions($uuid)
{
    global $call;
    $query = mysqli_query($call, "SELECT
                                            transactions.name,
                                            transactions.dateTransaction AS date,
                                            transactions.total,
                                            transactions.type,
                                            transactions.description,
                                            transactions.created_at,
                                            category.name AS category,
                                            accounts.name AS account
                                            FROM transactions
                                            JOIN accounts
                                            ON transactions.account = accounts.uuid
                                            JOIN category
                                            ON transactions.category = category.uuid
                                            WHERE transactions.uuid='$uuid'");
    return mysqli_fetch_array($query);
}
