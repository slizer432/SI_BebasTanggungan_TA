<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="/../SI_BebasTanggungan_TA/image/icon.png">
    <link rel="stylesheet" href="/../SI_BebasTanggungan_TA/css/Mahasiswa/notifikasi.css">
</head>

<body>
    <div class="container">
        <div class="top">
            <h2>NOTIFICATION</h2>
        </div>
        <?php foreach ($data['notif'] as $notif): ?>
            <div class="content-container">
                <div class="today">
                    <div class="content">
                        <img src="/../SI_BebasTanggungan_TA/image/pp.png" alt="">
                        <div class="isi">
                            <span><?= $notif['pesan']; ?></span>
                            <span>3 hours ago</span>
                        </div>
                    </div>
                </div>

                <div class="yesterday">
                    <div class="content">
                        <img src="/../SI_BebasTanggungan_TA/image/pp.png" alt="">
                        <div class="isi">
                            <span>Teknisi has been verified your 3 files</span>
                            <span>01.26 PM</span>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</body>

</html>