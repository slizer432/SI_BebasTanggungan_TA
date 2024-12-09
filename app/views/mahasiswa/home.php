<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?= IMAGE; ?>icon.png">
    <link rel="stylesheet" href="<?= CSS; ?>Mahasiswa/home.css">
    <title>Home</title>
</head>

<body>
    <div class="container">
        <nav>
            <div class="notif">
                <img src="<?= IMAGE; ?>notification.png" alt="">
            </div>

            <div class="profile">
                <a href="<?= BASEURL; ?>/Mahasiswa/profil"><span class="role"><?= $data['nim']; ?></span></a>
                <img src="<?= IMAGE; ?>pp.png" alt="Foto Profil" class="pp">
            </div>
        </nav>

        <div class="menu-container">
            <div class="logo">
                <img src="<?= IMAGE; ?>logo.png" alt="SIBETA">
                <span>SIBETA</span>
            </div>

            <div class="menu">
                <div class="m">
                    <img src="<?= IMAGE; ?>home.png" alt="">
                    <a href="<?= BASEURL; ?>/Mahasiswa/home" class="aktif">Home</a>
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
                    <a href="<?= BASEURL; ?>/Mahasiswa/kontak">Contact</a>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="top">
                <p><?= $data['date'] ?></p>
            </div>

            <div class="middle">
                <p class="a"><span>Welcome, </span><?= $data['nama']; ?>!</p>
                <i class="b">Complete your final requirements and achieve your graduation!</i>
            </div>

            <div class="bottom">
                <div class="chart">
                    <p>How far your submission is going?</p>
                    <div class="box">
                        <div class="diagram">
                            <div class="percentage-text" id="teknisi-percentage"></div>
                            <canvas id="adprod_teknisi"
                                data-status="<?php
                                                if (!empty($data['verifikasi'])) {
                                                    $found = false;
                                                    foreach ($data['verifikasi'] as $verifikasi) {
                                                        if ($verifikasi['tahap_verifikasi'] == 'Teknisi') {
                                                            echo $verifikasi['status_verifikasi'];
                                                            $found = true;
                                                            break;
                                                        }
                                                    }
                                                    if (!$found) {
                                                        echo 'empty';
                                                    }
                                                } else {
                                                    echo 'empty';
                                                }
                                                ?>">
                            </canvas>
                        </div>

                        <div class="cb">
                            <span>Technician</span>
                            <p><?php
                                if (!empty($data['verifikasi'])) {
                                    $found = false;
                                    foreach ($data['verifikasi'] as $verifikasi) {
                                        if ($verifikasi['tahap_verifikasi'] == 'Teknisi') {
                                            echo $verifikasi['keterangan'];
                                            $found = true;
                                            break;
                                        }
                                    }
                                    if (!$found) {
                                        echo 'You have not uploaded the file yet';
                                    }
                                } else {
                                    echo 'You have not uploaded the file yet';
                                }
                                ?></p>
                        </div>
                    </div>

                    <div class="box">
                        <div class="diagram">
                            <div class="percentage-text" id="admin-percentage"></div>
                            <canvas id="adprod_admin"
                                data-status="<?php
                                                if (!empty($data['verifikasi'])) {
                                                    $found = false;
                                                    foreach ($data['verifikasi'] as $verifikasi) {
                                                        if ($verifikasi['tahap_verifikasi'] == 'Admin Prodi') {
                                                            echo $verifikasi['status_verifikasi'];
                                                            $found = true;
                                                            break;
                                                        }
                                                    }
                                                    if (!$found) {
                                                        echo 'empty';
                                                    }
                                                } else {
                                                    echo 'empty';
                                                }
                                                ?>">
                            </canvas>
                        </div>

                        <div class="cb">
                            <span>Admin</span>
                            <p><?php
                                if (!empty($data['verifikasi'])) {
                                    $found = false;
                                    foreach ($data['verifikasi'] as $verifikasi) {
                                        if ($verifikasi['tahap_verifikasi'] == 'Admin Prodi') {
                                            echo $verifikasi['keterangan'];
                                            $found = true;
                                            break;
                                        }
                                    }
                                    if (!$found) {
                                        echo 'You have not uploaded the file yet';
                                    }
                                } else {
                                    echo 'You have not uploaded the file yet';
                                }
                                ?></p>
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
                                            <img src="<?= IMAGE; ?>track.png" alt="">
                                        </div>

                                        <div class="ls">
                                            <div class="tns">
                                                <img src="<?= IMAGE; ?>teknisi.png" alt="">
                                                <span>Technician</span>
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
                                            <img src="<?= IMAGE; ?>track.png" alt="">
                                        </div>

                                        <div class="ls">
                                            <div class="adm">
                                                <img src="<?= IMAGE; ?>admin.png" alt="">
                                                <span>Admin</span>
                                            </div>

                                            <div class="stt">
                                                <p>Verification for Skripsi, Application<br>
                                                    and Publication requirements.</p>
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
                                            <img src="<?= IMAGE; ?>track.png" alt="">
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
    <script src="<?= JS; ?>teknisi.js"></script>
    <script src="<?= JS; ?>adprod.js"></script>
</body>
</body>

</html>