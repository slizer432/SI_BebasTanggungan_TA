<?php

require 'config.php';
function hashPassword($userPassword)
{

    if ($userPassword && !password_get_info($userPassword)['algo']) {
        $userPassword = password_hash($userPassword, PASSWORD_DEFAULT);
    }
    return $userPassword;
}

function verify($user, $password, $userPassword)
{
    if (password_verify($password, $userPassword)) {
        $_SESSION['user_id'] = $user;
        header('Location: ../view/dashboard.php');
        exit();
    } else {
        return $error = "Log in gagal";

    }

}

function cekNim($nim)
{
    global $conn;

    $query = $conn->prepare('SELECT * FROM Mahasiswa WHERE NIM = :nim');
    $query->execute(['nim' => $nim]);
    $status = $query->fetch(PDO::FETCH_ASSOC);

    if (!$status) {
        return true;
    } else {
        return false;
    }
}

function cekNama($nama)
{
    global $conn;

    $query = $conn->prepare('SELECT * FROM Admin WHERE Nama = :nama');
    $query->execute(['nama' => $nama]);
    $status = $query->fetch(PDO::FETCH_ASSOC);

    if (!$status) {
        return true;
    } else {
        return false;
    }
}