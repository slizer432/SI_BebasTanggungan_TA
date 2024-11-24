<?php

require_once '../model/SuperAdmin.php';

session_start();

$admin = $_SESSION['superAdmin'];

$allAdmin = $admin->getAdmin();