<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="../controller/mhsVerifAdmin.php" method="POST" enctype="multipart/form-data">
        <input type="file" name="ttTugasAkhir">
        <label for="thesis">thesis report</label><br>
        <input type="file" name="ttMagang">
        <label for="internship">internship report</label><br>
        <input type="file" name="kompen">
        <label for="kompen">kompen</label><br>
        <input type="file" name="toeic">
        <label for="toeic">toeic</label><br>
        <input type="submit" value="submit">
    </form>
</body>

</html>