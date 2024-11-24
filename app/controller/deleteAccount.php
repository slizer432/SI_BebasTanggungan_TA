<?php

include_once '../model/SuperAdmin.php';

session_start();

$admin = $_SESSION['superAdmin'];

$role = $_GET['role'];
$user = $_GET['username'];

$admin->delete($role, $user);

header('Location: ../view/homeSuperAdmin.php');