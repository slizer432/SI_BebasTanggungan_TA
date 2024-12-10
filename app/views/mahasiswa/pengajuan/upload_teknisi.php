<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?= BASEURL; ?>/image/icon.png">
    <title>Submission - Submit to Technician</title>
    <link rel="stylesheet" href="<?= CSS; ?>Mahasiswa/upload.css">
</head>

<body>
    <div class="container">
        <nav>
            <div class="home">
                <a href="<?= BASEURL; ?>/Mahasiswa/home">HOME</a>
            </div>

            <div class="notif">
                <img src="<?= BASEURL; ?>/image/notification.png" alt="Notification">
            </div>

            <div class="profile">
                <a href="<?= BASEURL; ?>/Mahasiswa/profil">
                    <span class="role"><?= $data['nim']; ?></span>
                </a>
                <img src="<?= BASEURL; ?>/image/pp.png" alt="Profile Picture" class="pp">
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
                <div class="pilih">
                    <a href="<?= BASEURL; ?>/Mahasiswa/upload_teknisi" class="aktif">Submit to Technician</a>
                </div>
                <div class="m">
                    <a href="<?= BASEURL; ?>/Mahasiswa/upload_admin">Submit to Admin</a>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="top">
                <h2>Submit to Technician</h2>
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

            <form action="<?= BASEURL; ?>/Mahasiswa/upload_teknisi" method="POST" enctype="multipart/form-data">
                <!-- File 1 -->
                <div class="sub">
                    <div class="sub-cont">
                        <label for="final_project">Final Project Report/Thesis</label>
                        <div class="sub-con">
                            <img src="<?= BASEURL; ?>/image/file.png" alt="File Icon">
                            <span>PDF with max 10MB</span>
                            <input type="file" id="final_project" name="laporanTugasAkhir" accept=".pdf" required>
                        </div>
                    </div>
                </div>

                <!-- File 2 -->
                <div class="sub">
                    <div class="sub-cont">
                        <label for="thesis_program">Thesis Program/Application</label>
                        <div class="sub-con">
                            <img src="<?= BASEURL; ?>/image/file.png" alt="File Icon">
                            <span>ZIP/RAR with max 1MB</span>
                            <input type="file" id="thesis_program" name="tugasAkhir" accept=".zip,.rar" required>
                        </div>
                    </div>
                </div>

                <!-- File 3 -->
                <div class="sub">
                    <div class="sub-cont">
                        <label for="publication_letter">Publication Statement Letter</label>
                        <div class="sub-con">
                            <img src="<?= BASEURL; ?>/image/file.png" alt="File Icon">
                            <span>PDF with max 10MB</span>
                            <input type="file" id="publication_letter" name="publikasi" accept=".pdf" required>
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