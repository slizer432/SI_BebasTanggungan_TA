<?php

require '../model/account.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // memasukkan hasil input ke variabel
    $role = $_POST['role'];
    $nim = $_POST['nim'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // menentukan apakah admin atau mahasiswa yang log in
    switch ($role) {
        case 'admin':
            logInAdmin($email, $password);
            break;

        case 'mahasiswa':
            logInMhs($nim, $password);
            break;
    }
}