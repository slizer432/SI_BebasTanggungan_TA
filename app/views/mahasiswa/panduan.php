<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="/../SI_BebasTanggungan_TA/image/icon.png">
    <link rel="stylesheet" href="/../SI_BebasTanggungan_TA/css/Mahasiswa/panduan.css">
    <title>Guideline</title>
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
                    <a href="<?= BASEURL; ?>/Mahasiswa/panduan" class="aktif">Guideline</a>
                </div>

                <div class="m">
                    <img src="/../SI_BebasTanggungan_TA/image/call.png" alt="">
                    <a href="<?= BASEURL; ?>/Mahasiswa/kontak">Contact</a>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="box">
                <div class="title">
                    <span>Guideline For Bebas Tanggungan System</span>
                </div>

                <div class="kt">
                    <span>For students who have successfully passed their Final Project (Thesis), here are the<br>
                        procedures for obtaining the Clearance Letter as a requirement for collecting your Diploma,<br>
                        Transcript, and SKPI.</span>
                    <p><br><br><b>1. Thesis Report : </b>The report must include the Cover, Table of Contents, List of
                        Figures, List of Tables, Preface, Abstract (in both
                        Indonesian and English), Approval (with full signature), Chapter 1 to Conclusion, References,
                        and Appendices (if applicable).
                        Upload in PDF format, signed, with the file name format: [Name]_[NIM]_Thesis Report.pdf.</p>
                    <p><b>2. Thesis Program/Application : </b>Upload in ZIP or RAR format containing the program or
                        application developed in the Final Project
                        Thesis, with the file name format: [Name]_[NIM]_Thesis Application.pdf.</p>
                    <p><b>3. Publication : </b>Publication Statement Letter , upload in PDF format, with the file name
                        format: [Name]_[NIM]_Publication.pdf.</p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>