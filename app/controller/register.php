<?php

include '../model/SuperAdmin.php';
session_start();

$account = $_POST['account'];

switch ($account) {
    case 'admin':
        $admin = $_SESSION['superAdmin'];
        $namaAdmin = $_POST['namaAdmin'];
        $emailAdmin = $_POST['emailAdmin'];
        $passwordAdmin = $_POST['passwordAdmin'];
        $role = $_POST['role'];
        $admin->registerAdmin($namaAdmin, $emailAdmin, $passwordAdmin, $role);
        break;

    case 'mahasiswa':
        $admin = $_SESSION['superAdmin'];
        $nim = $_POST['nim'];
        $namaMhs = $_POST['namaMhs'];
        $prodi = $_POST['prodi'];
        $emailMhs = $_POST['emailMhs'];
        $passwordMhs = $_POST['passwordMhs'];
        $admin->registerMhs($nim, $namaMhs, $prodi, $emailMhs, $passwordMhs);
        break;
}


