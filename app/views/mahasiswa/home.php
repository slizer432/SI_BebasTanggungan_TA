<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="/../SI_BebasTanggungan_TA/image/icon.png">
    <link rel="stylesheet" href="/../SI_BebasTanggungan_TA/css/Mahasiswa/home.css">
    <title>Home</title>
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
                    <a href="<?= BASEURL; ?>/Mahasiswa/home" class="aktif">Home</a>
                </div>

                <div class="m">
                    <img src="/../SI_BebasTanggungan_TA/image/folder.png" alt="">
                    <a href="<?= BASEURL; ?>/Mahasiswa/pengajuan">File Submission</a>
                </div>

                <div class="m">
                    <img src="/../SI_BebasTanggungan_TA/image/book.png" alt="">
                    <a href="<?= BASEURL; ?>/Mahasiswa/panduan">Guideline</a>
                </div>
                <div class="m">
                    <img src="/../SI_BebasTanggungan_TA/image/call.png" alt="">
                    <a href="<?= BASEURL; ?>/Mahasiswa/kontak">Contact</a>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="top">
                <p>Senin, 18 November 2024</p>
            </div>

            <div class="middle">
                <p class="a"><span>Welcome, </span><?= $data['nama']; ?>!</p>
                <i class="b">Complete your final requirements and achieve your graduation!</i>
            </div>

            <div class="bottom">
                <div class="chart">
                    <p>How far you submission are going?</p>
                    <div class="box">
                        <div class="diagram">
                            <canvas id="teknisi"></canvas>
                        </div>

                        <div class="cb">
                            <span>Techinician</span>
                            <p>Your 3 files has been<br>
                                verified by techinician</p>
                        </div>
                    </div>

                    <div class="box">
                        <div class="diagram">
                            <canvas id="adprod"></canvas>
                        </div>

                        <div class="cb">
                            <span>Admin</span>
                            <p>Your 4 files has been<br>
                                verified by techinician</p>
                        </div>
                    </div>
                </div>

                <div class="track">
                    <span class="subs">Track your Submission</span>
                    <div class="tr">
                        <div class="list">
                            <ul id="progress" class="text">
                                <li class="active">
                                    <div class="lists">
                                        <div class="progress">
                                            <img src="/../SI_BebasTanggungan_TA/image/track.png" alt="">
                                        </div>

                                        <div class="ls">
                                            <div class="tns">
                                                <img src="/../SI_BebasTanggungan_TA/image/teknisi.png" alt="">
                                                <span>Techinician</span>
                                            </div>

                                            <div class="stt">
                                                <p>Verification for Thesis, Application<br>
                                                    and Publication requirements.</p>
                                                <div class="status">
                                                    <p>Status</p>
                                                    <div class="tns-stt">
                                                        <span>Verification</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <li class="active">
                                    <div class="lists">
                                        <div class="progress">
                                            <img src="/../SI_BebasTanggungan_TA/image/track.png" alt="">
                                        </div>

                                        <div class="ls">
                                            <div class="adm">
                                                <img src="/../SI_BebasTanggungan_TA/image/admin.png" alt="">
                                                <span>Admin</span>
                                            </div>

                                            <div class="stt">
                                                <p>Verification for Skripsi, Application<br>
                                                    and Publikasi requirements.</p>
                                                <div class="status">
                                                    <p>Status</p>
                                                    <div class="adm-stt">
                                                        <span>Pending</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <li class="">
                                    <div class="lists">
                                        <div class="progress">
                                            <img src="/../SI_BebasTanggungan_TA/image/track.png" alt="">
                                        </div>

                                        <div class="ls">
                                            <div class="complate">
                                                <span>Bebas Tanggungan Document</span>
                                            </div>

                                            <div class="stt">
                                                <p>Your files successfully verified!<br>
                                                    Please apply here to print Bebas Tanggungan document.</p>
                                                <div class="app">
                                                    <div class="dc-stt">
                                                        <button>apply</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.6/dist/chart.umd.min.js"></script>
    <script src="/../SI_BebasTanggungan_TA/js/teknisi.js"></script>
    <script src="/../SI_BebasTanggungan_TA/js/adprod.js"></script>
</body>

</html>