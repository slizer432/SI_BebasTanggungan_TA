<?php

$serverName = "LAPTOP-SO0FF6QU\SQLEXPRESS";
$db = "sibeta";

try {
    $conn = new PDO("sqlsrv:server=$serverName;Database= $db");
} catch (\Throwable $th) {
    die("Koneksi Gagal: " . $th);
}