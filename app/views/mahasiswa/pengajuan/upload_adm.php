<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?= IMAGE; ?>icon.png">
    <title>Submission</title>
    <link rel="stylesheet" href="<?= CSS; ?>Mahasiswa/upload.css">
</head>

<body>
    <div class="container">
        <nav>
            <div class="home">
                <a href="<?= BASEURL; ?>/Mahasiswa/home">HOME</a>
            </div>

            <div class="notif">
                <img src="<?= IMAGE; ?>notification.png" alt="">
            </div>

            <div class="profile">
                <a href="<?= BASEURL; ?>/Mahasiswa/profil">
                    <span class="role"><?= $data['nim']; ?></span>
                </a>
                <img src="<?= IMAGE; ?>pp.png" alt="Foto Profil" class="pp">
            </div>
        </nav>

        <div class="menu-container">
            <div class="logo">
                <img src="<?= IMAGE; ?>logo.png" alt="SIBETA">
                <span>SIBETA</span>
            </div>

            <div class="menu">
                <div class="mi">
                    <a href="<?= BASEURL; ?>/Mahasiswa/pengajuan">File Submission</a>
                </div>

                <div class="mi">
                    <a href="<?= BASEURL; ?>/Mahasiswa/upload_teknisi">Submit to Technician</a>
                </div>

                <div class="m">
                    <div class="pilih">
                        <a href="<?= BASEURL; ?>/Mahasiswa/upload_admin" class="aktif">Submit to Admin</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="top">
                <h2>Submit to Admin</h2>
            </div>

            <div class="terms">
                <h2><?= $data['terms']['judul']; ?></h2>
                <div class="tc">
                    <p><?= $data['terms']['isi']; ?></p>

                    <div class="alert">
                        <img src="<?= IMAGE; ?>alert.png" alt="">
                        <span>Please ensure that the uploaded files comply with the requirements above!</span>
                    </div>
                </div>
            </div>

            <form action="">
                <div class="sub">
                    <div class="sub-cont">
                        <span>Thesis/Final Report Book Distribution Proof</span>
                        <div class="sub-con">
                            <img src="<?= IMAGE; ?>file.png" alt="">
                            <span>PDF with max 1MB</span>
                            <input type="file">
                        </div>
                    </div>
                </div>

                <div class="sub">
                    <div class="sub-cont">
                        <span>Internship Report Distribution Proof</span>
                        <div class="sub-con">
                            <img src="<?= IMAGE; ?>file.png" alt="">
                            <span>PDF with max 1MB</span>
                            <input type="file">
                        </div>
                    </div>
                </div>

                <div class="sub">
                    <div class="sub-cont">
                        <span>Bebas Kompen Proof</span>
                        <div class="sub-con">
                            <img src="<?= IMAGE; ?>file.png" alt="">
                            <span>PDF with max 1MB</span>
                            <input type="file">
                        </div>
                    </div>
                </div>

                <div class="sub">
                    <div class="sub-cont">
                        <span>TOEIC Certificate Scan</span>
                        <div class="sub-con">
                            <img src="<?= IMAGE; ?>file.png" alt="">
                            <span>PDF with max 1MB</span>
                            <input type="file">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>