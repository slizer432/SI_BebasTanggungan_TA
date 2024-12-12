<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?= IMAGE; ?>icon.png">
    <link rel="stylesheet" href="<?= CSS; ?>Mahasiswa/pengajuan.css">
    <title>File Submission</title>
</head>

<body>
    <div class="container">
        <nav>
            <div class="logo">
                <img src="<?= IMAGE; ?>logo.png" alt="SIBETA">
                <span>SIBETA</span>
            </div>

            <div class="home">
                <a href="<?= BASEURL; ?>/Mahasiswa/home">HOME</a>
            </div>

            <div class="notif">
            <img src="<?= IMAGE; ?>notification.png" alt="" id="notifIcon">
            </div>

            <div class="profile" onclick="window.location.href='<?= BASEURL; ?>/mahasiswa/profil'">
                <span class="role"><?= explode(' ', $data['nama'])[0]; ?></span>
                <img src="<?= IMAGE; ?><?= !empty($data['foto_profil']) ? 'foto_mahasiswa/' . $data['foto_profil'] : 'pp.png'; ?>"
                    alt="Foto Profil" class="pp">
            </div>
        </nav>

        <div id="notifPopup" class="popup">
            <div class="popup-content">
                <span class="close">&times;</span>
                <iframe src="<?= BASEURL; ?>/mahasiswa/notifikasi" frameborder="0"></iframe>
            </div>
        </div>

        <div class="content">
            <div class="top">
                <h2>File Submission</h2>
            </div>

            <div class="alert">
                <div class="icon">
                    <img src="<?= IMAGE; ?>alert.png" alt="">
                </div>

                <div class="text">
                    <p>You are required to complete the necessary documents for upload and obtain verification from
                        Technician<br>
                        before submitting the documents to the Admin! <a href="<?= BASEURL; ?>/Mahasiswa/panduan">More
                            information</a></p>
                </div>
            </div>

            <div class="data">
                <div class="sub tech">
                    <img src="<?= IMAGE; ?>teknisi.png" alt="">
                    <span>Technician</span>
                    <button><a href="<?= BASEURL; ?>/Mahasiswa/upload_teknisi">Submit Verification</a></button>
                </div>

                <div class="sub adm">
                    <img src="<?= IMAGE; ?>admin.png" alt="">
                    <span>Admin</span>
                    <button><a href="<?= BASEURL; ?>/Mahasiswa/upload_admin">Submit Verification</a></button>
                </div>
            </div>
        </div>
    </div>
    
    <script src="<?= JS; ?>notification.js"></script>
</body>

</html>