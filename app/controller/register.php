<?php

include '../model/account.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $account = $_POST['account'] ?? null;
    $namaAdmin = $_POST['namaAdmin'] ?? null;
    $emailAdmin = $_POST['emailAdmin'] ?? null;
    $passwordAdmin = $_POST['passwordAdmin'] ?? null;
    $role = $_POST['role'] ?? null;
    $nim = $_POST['nim'] ?? null;
    $namaMhs = $_POST['namaMhs'] ?? null;
    $prodi = $_POST['prodi'] ?? null;
    $emailMhs = $_POST['emailMhs'];
    $passwordMhs = $_POST['passwordMhs'];

    switch ($account) {
        case 'admin':
            registerAdmin($namaAdmin, $emailAdmin, $passwordAdmin, $role);
            break;

        case 'mahasiswa':
            registerMhs($nim, $namaMhs, $prodi, $emailMhs, $passwordMhs);
            break;
    }
}

