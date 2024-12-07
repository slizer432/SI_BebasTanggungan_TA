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

                <div class="m">
                    <div class="pilih">
                        <a href="<?= BASEURL; ?>/Mahasiswa/upload_teknisi" class="aktif">Submit to Tecnician</a>
                    </div>
                </div>

                <div class="m">
                    <a href="<?= BASEURL; ?>/Mahasiswa/upload_admin">Submit to Admin</a>
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
                    <p>For students who have successfully passed their Final Project (Thesis), here are the
                        procedures for obtaining the Clearance Letter as a requirement for collecting your Diploma,
                        Transcript, and SKPI.</p>
                    <p><br><b>1. Thesis Report : </b>The report must include the Cover, Table of Contents, List of
                        Figures, List of Tables, Preface, Abstract (in both
                        Indonesian and English), Approval (with full signature), Chapter 1 to Conclusion, References,
                        and Appendices (if applicable).
                        Upload in PDF format, signed, with the file name format: [Name]_[NIM]_Thesis Report.pdf.</p>
                    <p><b>2. Thesis Program/Application : </b>Upload in ZIP or RAR format containing the program or
                        application developed in the Final Project
                        Thesis, with the file name format: [Name]_[NIM]_Thesis Application.pdf.
                        <br><b>3. Publication : </b>Publication Statement Letter , upload in PDF format, with the file
                        name format: [Name]_[NIM]_Publication.pdf.
                    </p>

                    <div class="alert">
                        <img src="/../SI_BebasTanggungan_TA/image/alert.png" alt="">
                        <span>Please ensure that the uploaded files comply with the requirements above!</span>
                    </div>
                </div>
            </div>

            <div class="sub">
                <div class="sub-cont">
                    <span>Final Project Report/Thesis</span>
                    <div class="sub-con">
                        <img src="/../SI_BebasTanggungan_TA/image/file.png" alt="">
                        <span>PDF with max 10MB</span>
                        <button>Browse File</button>
                    </div>
                </div>
            </div>

            <div class="sub">
                <div class="sub-cont">
                    <span>Thesis Program/Application</span>
                    <div class="sub-con">
                        <img src="/../SI_BebasTanggungan_TA/image/file.png" alt="">
                        <span>ZIP/RAR with max 1MB</span>
                        <button>Browse File</button>
                    </div>
                </div>
            </div>

            <div class="sub">
                <div class="sub-cont">
                    <span>Publication Statement Letter</span>
                    <div class="sub-con">
                        <img src="/../SI_BebasTanggungan_TA/image/file.png" alt="">
                        <span>PDF with max 10MB</span>
                        <button>Browse File</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>