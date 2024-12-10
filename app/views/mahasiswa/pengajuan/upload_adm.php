<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?= BASEURL; ?>/image/icon.png">
    <link rel="stylesheet" href="<?= CSS; ?>Mahasiswa/upload.css">
    <title>Submission - Submit to Admin</title>
</head>

<body>
    <div class="container">
        <nav>
            <div class="home">
                <a href="<?= BASEURL; ?>/Mahasiswa/home">HOME</a>
            </div>

            <div class="notif">
                <img src="<?= BASEURL; ?>/image/notification.png" alt="Notification Icon">
            </div>

            <div class="profile" onclick="window.location.href='<?= BASEURL; ?>/mahasiswa/profil'">
                <span class="role"><?= $data['nim']; ?></span>
                <img src="<?= IMAGE; ?>pp.png" alt="Foto Profil" class="pp">
            </div>
        </nav>

        <div class="menu-container">
            <div class="logo">
                <img src="<?= BASEURL; ?>/image/logo.png" alt="SIBETA">
                <span>SIBETA</span>
            </div>

            <div class="menu">
                <div class="mi">
                    <a href="<?= BASEURL; ?>/Mahasiswa/pengajuan">File Submission</a>
                </div>
                <div class="m">
                    <a href="<?= BASEURL; ?>/Mahasiswa/upload_teknisi">Submit to Technician</a>
                </div>
                <div class="pilih">
                    <a href="<?= BASEURL; ?>/Mahasiswa/upload_admin" class="aktif">Submit to Admin</a>
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
                        <img src="<?= BASEURL; ?>/image/alert.png" alt="Alert Icon">
                        <span>Please ensure that the uploaded files comply with the requirements above!</span>
                    </div>
                </div>
            </div>

            <form action="<?= BASEURL; ?>/Mahasiswa/upload_admin" method="POST" enctype="multipart/form-data">
                <!-- File 1 -->
                <div class="sub">
                    <div class="sub-cont">
                        <label for="file1">Thesis/Final Report Book Distribution Proof</label>
                        <div class="sub-con">
                            <img src="<?= IMAGE; ?>file.png" alt="File Icon">
                            <span>PDF with max 1MB</span>
                            <input type="file" id="file1" name="ttTugasAkhir" accept=".pdf" required>
                        </div>
                    </div>
                </div>

                <!-- File 2 -->
                <div class="sub">
                    <div class="sub-cont">
                        <label for="file2">Internship Report Distribution Proof</label>
                        <div class="sub-con">
                            <img src="<?= IMAGE; ?>file.png" alt="File Icon">
                            <span>PDF with max 1MB</span>
                            <input type="file" id="file2" name="ttMagang" accept=".pdf" required>
                        </div>
                    </div>
                </div>

                <!-- File 3 -->
                <div class="sub">
                    <div class="sub-cont">
                        <label for="file3">Bebas Kompen Proof</label>
                        <div class="sub-con">
                            <img src="<?= IMAGE; ?>file.png" alt="File Icon">
                            <span>PDF with max 1MB</span>
                            <input type="file" id="file3" name="kompen" accept=".pdf" required>
                        </div>
                    </div>
                </div>

                <!-- File 4 -->
                <div class="sub">
                    <div class="sub-cont">
                        <label for="file4">TOEIC Certificate Scan</label>
                        <div class="sub-con">
                            <img src="<?= IMAGE; ?>file.png" alt="File Icon">
                            <span>PDF with max 1MB</span>
                            <input type="file" id="file4" name="toeic" accept=".pdf" required>
                        </div>
                    </div>
                </div>

                <!-- Submit Button -->

                <div class="upload-container">
                    <button class="upload-button" type="submit">Upload</button>
                </div>

            </form>
        </div>
    </div>
</body>

</html>