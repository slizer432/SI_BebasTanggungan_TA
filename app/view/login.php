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
        <input type="radio" name="role" value="admin" id="radioAdmin">
        <label for="role">Admin</label>
        <input type="radio" name="role" value="mahasiswa" id="radioMhs">
        <label for="role">Mahasiswa</label><br><br>
        <input type="text" name="username" required" id="username">
        <input type="password" name="password" placeholder="Password" required>
        <input type="submit" value="Login">
    </form>

    <script src="../../js/login.js"></script>
</body>

</html>