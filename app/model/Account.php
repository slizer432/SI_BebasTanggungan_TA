<?php

require 'config.php';

abstract class Account
{

    public function hashPassword($userPassword)
    {
        // Check if the password is not empty and needs to be hashed
        if ($userPassword && password_needs_rehash($userPassword, PASSWORD_DEFAULT)) {
            return password_hash($userPassword, PASSWORD_DEFAULT);
        }
        return $userPassword;
    }

    public function verify($user, $password, $userPassword)
    {
        if (password_verify($password, $userPassword)) {
            echo 'berhasil';
            return true;
        } else {
            return $error = "Log in gagal";

        }

    }

    public function cekNim($nim)
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

    public function cekEmail($email)
    {
        global $conn;

        $query = $conn->prepare('SELECT * FROM Admin WHERE Email = :email');
        $query->execute(['email' => $email]);
        $status = $query->fetch(PDO::FETCH_ASSOC);

        if ($status) {
            return false;
        } else {
            return true;
        }
    }

    public function isLoggedIn()
    {
        if (!isset($_SESSION['mahasiswa']) || !isset($_SESSION['admin']) || !isset($_SESSION['superAdmin'])) {
            header('Location: ../../index.php');
        }
    }

    public function logout()
    {
        session_destroy();
        header('Location: ../../index.php');
    }
}