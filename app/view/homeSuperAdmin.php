<?php

include '../controller/getAdmin.php';
include '../controller/getMhs.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<h1>Data Mahasiswa</h1>
<table>
    <tr>

        <th>NIM</th>
        <th>Nama</th>
        <th>Program Studi</th>
        <th>Email</th>
        <th>Password</th>
        <th>Aksi</th>
    </tr>
    <?php foreach ($allMahasiswa as $mhs) { ?>
        <tr>
            <td><?= $mhs['NIM'] ?></td>
            <td><?= $mhs['Nama'] ?></td>
            <td><?= $mhs['Program_Studi'] ?></td>
            <td><?= $mhs['Email'] ?></td>
            <td><?= $mhs['Password'] ?></td>
            <td>
                <a href="edit.php?nim=<?= $mhs['NIM'] ?>&role=mahasiswa">Edit</a>
                <a href="../controller/deleteAccount.php?username=<?= $mhs['NIM'] ?>&role=mahasiswa">Delete</a>
            </td>
        </tr>
    <?php } ?>

</table>

<h1>Data Admin</h1>
<table>
    <tr>
        <th>Nama</th>
        <th>Email</th>
        <th>Password</th>
        <th>Role</th>
        <th>ID Super Admin</th>
        <th>Aksi</th>
    </tr>
    <?php foreach ($allAdmin as $admin) { ?>
        <tr>
            <td><?= $admin['Nama'] ?></td>
            <td><?= $admin['Email'] ?></td>
            <td><?= $admin['Password'] ?></td>
            <td><?= $admin['Role'] ?></td>
            <td><?= $admin['ID_Super_Admin'] ?></td>
            <td>
                <a href="edit.php?username=<?= $admin['Email'] ?>&role=admin">Edit</a>
                <a href="../controller/deleteAccount.php?username=<?= $admin['Email'] ?>&role=admin">Delete</a>
            </td>
        </tr>
    <?php } ?>
</table>

<body>
    <h1>Log in Super Admin berhasil</h1>

    <a href="register.php">Register</a>
</body>

</html>