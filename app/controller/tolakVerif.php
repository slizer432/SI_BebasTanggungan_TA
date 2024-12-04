<?php

require_once '../model/Admin.php';

session_start();

$admin = $_SESSION['admin'];

$nim = $_POST['nim'];
$komen = [
    'ta' => $_POST['ta'],
    'magang' => $_POST['magang'],
    'kompen' => $_POST['kompen'],
    'toeic' => $_POST['toeic'],
    'laporanTugasAkhir' => $_POST['laporanTugasAkhir'],
    'tugasAkhir' => $_POST['tugasAkhir'],
    'publikasi' => $_POST['publikasi'],
    'laporanMagang' => $_POST['laporanMagang']
];

$admin->tolakVerif($nim, $komen);
