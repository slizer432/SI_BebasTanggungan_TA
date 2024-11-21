<?php

require '../model/Mahasiswa.php';
require '../model/Admin.php';
require '../model/SuperAdmin.php';

session_start();

switch ($_POST['role']) {
    case 'mahasiswa':
        $mhs = new Mahasiswa($_POST['username']);

        if ($mhs->logIn()) {
            $_SESSION['mahasiswa'] = $mhs;
            header('Location: ../view/dashboard.php');
            exit();
        }
        break;

    case 'admin':
        $admin = new Admin($_POST['username']);
        if ($admin->logIn()) {
            echo 'berhasil';
            $_SESSION['admin'] = $admin;
            header('Location: ../view/homeAdmin.php');
            exit();
        }
        break;

    case 'superAdmin':
        $admin = new SuperAdmin($_POST['username']);
        if ($admin->logIn()) {
            $_SESSION['superAdmin'] = $admin;
            header('Location: ../view/homeSuperAdmin.php');
            exit();
        }
        break;
}
