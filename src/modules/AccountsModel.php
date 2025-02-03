<?php

function getAllAccounts()
{
  global $call;
  $query = mysqli_query(
    $call,
    "SELECT
      accounts.uuid,
      accounts.name,
      accounts.balance,
      accounts.created_at,
      accounts.updated_at,
      accounts.deleted_at,
      status.name as status
    FROM accounts
    JOIN status
    ON accounts.site_status = status.id
    WHERE
    NOT accounts.site_status=1001
    AND accounts.deleted_at IS null
    ORDER BY updated_at ASC, created_at DESC
    "
  );
  return $query;
}

function getDetailAccount($uuid)
{
  global $call;
  $query = mysqli_query(
    $call,
    "SELECT
      accounts.uuid,
      accounts.site_status,
      accounts.name,
      accounts.balance,
      accounts.created_at,
      accounts.updated_at,
      accounts.deleted_at,
      status.name as status
    FROM accounts
    JOIN status
    ON accounts.site_status = status.id
    WHERE accounts.uuid='$uuid'
    "
  );
  return mysqli_fetch_array($query);
}

function getActivatedAccounts()
{
  global $call;
  $query = mysqli_query(
    $call,
    "SELECT
    *
    FROM accounts
    WHERE accounts.site_status=1007
    ORDER BY name ASC"
  );
  return $query;
}
