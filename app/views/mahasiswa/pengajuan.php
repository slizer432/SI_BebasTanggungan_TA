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
                <img src="<?= IMAGE; ?>notification.png" alt="">
            </div>

            <div class="profile">
                <a href="<?= BASEURL; ?>/Mahasiswa/profil"><span class="role"><?= $data['nim']; ?></span></a>
                <img src="<?= IMAGE; ?>pp.png" alt="Foto Profil" class="pp">
            </div>
        </nav>

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
</body>

</html>