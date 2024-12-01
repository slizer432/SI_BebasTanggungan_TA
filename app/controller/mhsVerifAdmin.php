<?php

include_once '../model/Mahasiswa.php';

session_start();

$mhs = $_SESSION['mahasiswa'];

$mhs->uploadAdmin();