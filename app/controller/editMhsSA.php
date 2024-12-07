<?php

include_once '../model/SuperAdmin.php';

session_start();

$admin = $_SESSION['superAdmin'];

$nim = $_POST['nim'];
$nama = $_POST['nama'];
$prodi = $_POST['prodi'];
$email = $_POST['email'];
$password = $_POST['password'];

$data = $admin->getData();

$admin->editMhs($nim, $nama, $prodi, $email, $password);