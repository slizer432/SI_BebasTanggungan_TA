<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Log In</h1>
    <form action="../controller/login.php" method="POST">
        <input type="radio" name="role" value="admin">
        <label for="role">Admin</label>
        <input type="radio" name="role" value="mahasiswa">
        <label for="role">Mahasiswa</label><br><br>
        <input type="text" name="nim" placeholder="NIM">
        <input type="text" name="email" placeholder="E-mail">
        <input type="password" name="password" placeholder="Password" required>
        <input type="submit" value="Login">
    </form>
</body>

</html>