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
            <td><?= $mhs['nim'] ?></td>
            <td><?= $mhs['nama'] ?></td>
            <td><?= $mhs['program_studi'] ?></td>
            <td><?= $mhs['email'] ?></td>
            <td><?= $mhs['password'] ?></td>
            <td>
                <a href="editMhs.php?data=<?= $mhs['nim'] ?>&role=mahasiswa">Edit</a>
                <a href="../controller/deleteAccount.php?username=<?= $mhs['nim'] ?>&role=mahasiswa">Delete</a>
            </td>
        </tr>
    <?php } ?>

</table>

<h1>Data Admin</h1>
<table>
    <tr>
        <th>NIP</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Password</th>
        <th>Role</th>
        <th>ID Super Admin</th>
        <th>Aksi</th>
    </tr>
    <?php foreach ($allAdmin as $admin) { ?>
        <tr>
            <td><?= $admin['nip'] ?></td>
            <td><?= $admin['nama'] ?></td>
            <td><?= $admin['email'] ?></td>
            <td><?= $admin['password'] ?></td>
            <td><?= $admin['role'] ?></td>
            <td><?= $admin['nip_super_admin'] ?></td>
            <td>
                <a href="editAdmin.php?nama=<?= $admin['nama'] ?>&email=<?= $admin['email'] ?>">Edit</a>
                <a href="../controller/deleteAccount.php?username=<?= $admin['nip'] ?>&role=admin">Delete</a>
            </td>
        </tr>
    <?php } ?>
</table>

<body>
    <h1>Log in Super Admin berhasil</h1>

    <a href="register.php">Register</a>
</body>

</html>