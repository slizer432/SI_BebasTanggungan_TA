<?php

$serverName = "UHERRRR\SQLEXPRESS";
$db = "Sibeta";

try {
    $conn = new PDO("sqlsrv:server=$serverName;Database= $db");
} catch (\Throwable $th) {
    die("Koneksi Gagal: " . $th);
}