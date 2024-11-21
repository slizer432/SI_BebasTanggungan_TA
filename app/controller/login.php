<?php

require '../model/Mahasiswa.php';
require '../model/Admin.php';

switch ($_POST['role']) {
    case 'mahasiswa':
        $mhs = new Mahasiswa($_POST['username']);
        $mhs->logIn();
        break;

    case 'admin':
        $admin = new Admin($_POST['username']);
        $admin->logIn();
        break;
}
