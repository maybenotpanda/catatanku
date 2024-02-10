<?php

include '../mainconfig.php';

// ------------------------------------------------ BATAS SUCI ------------------------------------------------ //
session_start();
if ($_SESSION) {
  if ($_SESSION['uuid']) {
  }
} else {
  header('location:../index.php?response=Belum Login');
}

include_once '../library/function/status.php';
include_once '../library/function/accounts.php';
include_once '../library/function/category.php';
include_once '../library/function/planning.php';
include_once '../library/function/transactions.php';
include_once '../library/function/credit.php';
