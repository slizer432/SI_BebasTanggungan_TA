<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="/../SI_BebasTanggungan_TA/image/icon.png">
    <link rel="stylesheet" href="/../SI_BebasTanggungan_TA/css/Mahasiswa/kontak.css">
    <title>Contact Us</title>
</head>

<body>
    <div class="container">
        <nav>
            <div class="notif">
                <img src="/../SI_BebasTanggungan_TA/image/notification.png" alt="">
            </div>

            <div class="profile">
                <a href="<?= BASEURL; ?>/Mahasiswa/profil"><span class="role"><?= $data['nim']; ?></span></a>
                <img src="/../SI_BebasTanggungan_TA/image/pp.png" alt="Foto Profil" class="pp">
            </div>
        </nav>

        <div class="menu-container">
            <div class="logo">
                <img src="/../SI_BebasTanggungan_TA/image/logo.png" alt="SIBETA">
                <span>SIBETA</span>
            </div>

            <div class="menu">
                <div class="m">
                    <img src="/../SI_BebasTanggungan_TA/image/home.png" alt="">
                    <a href="<?= BASEURL; ?>/Mahasiswa/home">Home</a>
                </div>

                <div class="m">
                    <img src="/../SI_BebasTanggungan_TA/image/folder.png" alt="">
                    <a href="<?= BASEURL; ?>/Mahasiswa/pengajuan">File Submission</a>
                </div>

                <div class="m">
                    <img src="/../SI_BebasTanggungan_TA/image/book.png" alt="">
                    <a href="<?= BASEURL; ?>/Mahasiswa/panduan">Guideline</a>
                </div>
                <div class="m">
                    <img src="/../SI_BebasTanggungan_TA/image/call.png" alt="">
                    <a href="<?= BASEURL; ?>/Mahasiswa/kontak" class="aktif">Contact</a>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="top">
                <h2>Contact Us</h2>

                <div class="sp">
                    <span><i>Please contaact the following number</i></span>
                    <span><i>for any questions regarding the files to be uploaded</i></span>
                </div>

            </div>

            <div class="call">
                <div class="box">
                    <img src="/../SI_BebasTanggungan_TA/image/phone.png" alt="">
                    <span class="a">Techinician - Anggi</span>
                    <div class="b">
                        <span>0895630505222</span>
                        <i>(Chat Only)</i>
                    </div>

                </div>

                <div class="box">
                    <img src="/../SI_BebasTanggungan_TA/image/phone.png" alt="">
                    <span class="a">Admin - Yanti</span>
                    <div class="b">
                        <span>08300666233</span>
                        <i>(Chat Only)</i>
                    </div>

                </div>
            </div>
        </div>
    </div>
</body>

</html>