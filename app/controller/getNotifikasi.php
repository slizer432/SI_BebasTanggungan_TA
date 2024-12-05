<?php

require_once '../model/Mahasiswa.php';

session_start();

$mhs = $_SESSION['mahasiswa'];

$notifikasi = $mhs->getNotifikasi();