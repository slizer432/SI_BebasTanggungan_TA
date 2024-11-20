<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>

<body>
    <h1>Register</h1>
    <form action="../controller/register.php" method="POST">

        <!-- pemilihan jenis akun -->
        <input type="radio" name="account" value="admin" id="radioAdmin">
        <label for="radioAdmin">Admin</label><br>
        <input type="radio" name="account" value="mahasiswa" id="radioMhs">
        <label for="radioMhs">Mahasiswa</label><br>

        <!-- register untuk admin -->
        <div id="adminForm" style="display: none;">
            <p>Admin</p>
            <input type="text" name="namaAdmin" placeholder="Nama">
            <input type="text" name="emailAdmin" placeholder="E-mail">
            <input type="password" name="passwordAdmin" placeholder="Password"><br>
            <input type="radio" name="role" value="teknisi">
            <label for="role">Teknisi</label><br>
            <input type="radio" name="role" value="admin prodi">
            <label for="role">Admin prodi</label><br>
            <input type="radio" name="role" value="admin jurusan">
            <label for="role">Admin jurusan</label><br>
            <input type="submit" value="Register">
        </div>

        <!-- register untuk mahasiswa -->
        <div id="mhsForm" style="display: none;">
            <p>Mahasiswa</p>
            <input type="text" name="nim" placeholder="NIM">
            <input type="text" name="namaMhs" placeholder="Nama">
            <input type="text" name="prodi" placeholder="Program Studi">
            <input type="text" name="emailMhs" placeholder="E-mail">
            <input type="password" name="passwordMhs" placeholder="Password">
            <input type="submit" value="Register">
        </div>
    </form>

    <script src="../../js/script.js"></script>
</body>

</html>