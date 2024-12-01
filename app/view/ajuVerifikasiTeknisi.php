<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="../controller/mhsVerifTeknisi.php" method="POST" enctype="multipart/form-data">
        <input type="file" name="laporanTugasAkhir">
        <label for="thesis">thesis report</label><br>
        <input type="file" name="tugasAkhir">
        <label for="internship">thesis application</label><br>
        <input type="file" name="publikasi">
        <label for="kompen">publication</label><br>
        <input type="submit" value="submit">
    </form>
</body>

</html>