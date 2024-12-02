<?php

include '../model/Admin.php';

session_start();

$admin = $_SESSION['admin'];

$nim = $_POST['nim'];

$admin->terimaVerif($nim);