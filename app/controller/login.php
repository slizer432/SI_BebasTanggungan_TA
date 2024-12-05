<?php

require_once '../model/Mahasiswa.php';
require_once '../model/Admin.php';
require_once '../model/SuperAdmin.php';

session_start();
var_dump($_POST);

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
            $admin->log('login');
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
