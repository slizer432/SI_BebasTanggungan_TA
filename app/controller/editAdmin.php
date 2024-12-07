<?php

include '../model/SuperAdmin.php';

session_start();

$admin = $_SESSION['superAdmin'];

$nama = $_POST['nama'];
$email = $_POST['email'];
$password = $_POST['password'];

$data = $admin->getData();

$admin->edit($nama, $email, $password, $_FILES);