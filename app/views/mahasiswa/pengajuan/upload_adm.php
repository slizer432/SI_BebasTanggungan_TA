<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="/../SI_BebasTanggungan_TA/image/icon.png">
    <title>Submission</title>
    <link rel="stylesheet" href="/../SI_BebasTanggungan_TA/css/Mahasiswa/upload.css">
</head>

<body>
    <div class="container">
        <nav>
            <div class="home">
                <a href="<?= BASEURL; ?>/Mahasiswa/home">HOME</a>
            </div>

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
                <div class="mi">
                    <a href="<?= BASEURL; ?>/Mahasiswa/pengajuan">File Submission</a>
                </div>

                <div class="mi">
                    <a href="<?= BASEURL; ?>/Mahasiswa/upload_teknisi">Submit to Tecnician</a>
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
                <h2>Terms & Condition</h2>
            </div>

            <div class="terms">
                <span>Terms & Condotion</span>
                <div class="tc">
                    <p></p>
                    <div class="alert">
                        <img src="/../SI_BebasTanggungan_TA/image/alert.png" alt="">
                        <span>Please ensure that the uploaded files comply with the requirements above!</span>
                    </div>
                </div>
            </div>
            <form action="">

                <div class="sub">
                    <div class="sub-cont">
                        <span>Thesis/Final Report Book Distribution Proof</span>
                        <div class="sub-con">
                            <img src="/../SI_BebasTanggungan_TA/image/file.png" alt="">
                            <span>PDF with max 1MB</span>
                            <input type="file">
                        </div>
                    </div>
                </div>

                <div class="sub">
                    <div class="sub-cont">
                        <span>Intership Report Distribution Proof</span>
                        <div class="sub-con">
                            <img src="/../SI_BebasTanggungan_TA/image/file.png" alt="">
                            <span>PDF with max 1MB</span>
                            <button>Browse File</button>
                        </div>
                    </div>
                </div>

                <div class="sub">
                    <div class="sub-cont">
                        <span>Bebas Kompen Proof</span>
                        <div class="sub-con">
                            <img src="/../SI_BebasTanggungan_TA/image/file.png" alt="">
                            <span>PDF with max 1MB</span>
                            <button>Browse File</button>
                        </div>
                    </div>

                    <div class="sub-cont">
                        <span>TOEIC Sertificate Scan</span>
                        <div class="sub-con">
                            <img src="/../SI_BebasTanggungan_TA/image/file.png" alt="">
                            <span>PDF with max 1MB</span>
                            <button>Browse File</button>
                        </div>
                    </div>
            </form>
        </div>
    </div>
    </div>
</body>

</html>