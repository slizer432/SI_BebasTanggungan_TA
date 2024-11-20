<?php

require 'config.php';

function getMahasiswa()
{
    global $conn;

    $query = $conn->prepare('SELECT * FROM Mahasiswa');
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);

    return $result;
}

function getAdmin()
{
    global $conn;

    $query = $conn->prepare('SELECT * FROM Admin');
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);

    return $result;
}

