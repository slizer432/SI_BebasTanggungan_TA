<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?= IMAGE; ?>icon.png">
    <link rel="stylesheet" href="<?= CSS; ?>Mahasiswa/kontak.css">
    <title>Contact Us</title>
</head>

<body>
    <div class="container">
        <nav>
            <div class="notif">
                <img src="<?= IMAGE; ?>notification.png" alt="">
            </div>
            
            <div class="profile" onclick="window.location.href='<?= BASEURL; ?>/mahasiswa/profil'">
                <span class="role"><?= explode(' ', $data['nama'])[0]; ?></span>
                <img src="<?= IMAGE; ?><?= !empty($data['foto_profil']) ? 'foto_mahasiswa/'.$data['foto_profil'] : 'pp.png'; ?>" alt="Foto Profil" class="pp">
            </div>
        </nav>

        <div id="notifPopup" class="popup">
            <div class="popup-content">
                <span class="close">&times;</span>
                <iframe src="<?= BASEURL; ?>/mhasiswa/notifikasi.php" frameborder="0"></iframe>
            </div>
        </div>

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
                    <a href="<?= BASEURL; ?>/Mahasiswa/panduan">Guideline</a>
                </div>
                <div class="m">
                    <img src="<?= IMAGE; ?>call.png" alt="">
                    <a href="<?= BASEURL; ?>/Mahasiswa/kontak" class="aktif">Contact</a>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="top">
                <h2>Contact Us</h2>

                <div class="sp">
                    <span><i>Please contact the following number</i></span>
                    <span><i>for any questions regarding the files to be uploaded</i></span>
                </div>

            </div>

            <div class="call">
                <div class="box">
                    <img src="<?= IMAGE; ?>phone.png" alt="">
                    <span class="a">Technician - Anggi</span>
                    <div class="b">
                        <span>0895630505222</span>
                        <i>(Chat Only)</i>
                    </div>

                </div>

                <div class="box">
                    <img src="<?= IMAGE; ?>phone.png" alt="">
                    <span class="a">Admin - Yanti</span>
                    <div class="b">
                        <span>08300666233</span>
                        <i>(Chat Only)</i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="<?= JS; ?>notification.js"></script>
</body>

</html>