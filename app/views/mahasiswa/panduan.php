<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?= IMAGE; ?>icon.png">
    <link rel="stylesheet" href="<?= CSS; ?>Mahasiswa/panduan.css">
    <title>Guideline</title>
</head>

<body>
    <div class="container">
        <nav>
            <div class="notif">
                <img src="<?= IMAGE; ?>notification.png" alt="">
            </div>

            <div class="profile" onclick="window.location.href='<?= BASEURL; ?>/mahasiswa/profil'">
                <span class="role"><?= $data['mhs']['nim']; ?></span>
                <img src="<?= IMAGE; ?>pp.png" alt="Foto Profil" class="pp">
            </div>
        </nav>

        <div class="menu-container">
            <div class="logo">
                <img src="<?= IMAGE; ?>logo.png" alt="SIBETA">
                <span>SIBETA</span>
            </div>

            <div class="menu">
                <div class="m">
                    <img src="<?= IMAGE; ?>home.png" alt="">
                    <a href="<?= BASEURL; ?>/Mahasiswa/home">Home</a>
                </div>

                <div class="m">
                    <img src="<?= IMAGE; ?>folder.png" alt="">
                    <a href="<?= BASEURL; ?>/Mahasiswa/pengajuan">File Submission</a>
                </div>

                <div class="m">
                    <img src="<?= IMAGE; ?>book.png" alt="">
                    <a href="<?= BASEURL; ?>/Mahasiswa/panduan" class="aktif">Guideline</a>
                </div>

                <div class="m">
                    <img src="<?= IMAGE; ?>call.png" alt="">
                    <a href="<?= BASEURL; ?>/Mahasiswa/kontak">Contact</a>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="box">
                <div class="title">
                    <h2><?= $data['judul']; ?></h2>
                </div>

                <div class="kt">
                    <span><?= $data['isi']; ?></span>
                </div>
            </div>
        </div>
    </div>
</body>

</html>