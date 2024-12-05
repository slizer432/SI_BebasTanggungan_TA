<?php

include_once '../model/Mahasiswa.php';

session_start();

$mhs = $_SESSION['mahasiswa'];

$nama = $_POST['nama'];
$email = $_POST['email'];
$password = $_POST['password'];

$mhs->edit($nama, $email, $password, $_FILES);