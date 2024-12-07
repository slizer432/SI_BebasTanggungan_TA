<?php

include_once '../model/SuperAdmin.php';

session_start();

$admin = $_SESSION['superAdmin'];

$nip = $_POST['nip'];
$nama = $_POST['nama'];
$email = $_POST['email'];
$password = $_POST['password'];

$data = $admin->getData();

$admin->editAdmin($nip, $nama, $email, $password, $data['role']);