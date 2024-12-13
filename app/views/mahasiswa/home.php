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
                <iframe src="<?= BASEURL; ?>/Mahasiswa/notifikasi" frameborder="0"></iframe>
            </div>
        </div>

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
                            <canvas id="adprod_teknisi" data-status="<?php
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
                            <canvas id="adprod_admin" data-status="<?php
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
                                <li class="<?php
                                if (!empty($data['verifikasi'])) {
                                    echo 'active';
                                }
                                ?>">
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
                                                    <div class="tns-stt <?php
                                                    if (!empty($data['verifikasi'])) {
                                                        foreach ($data['verifikasi'] as $verifikasi) {
                                                            if ($verifikasi['tahap_verifikasi'] == 'Teknisi') {
                                                                if ($verifikasi['status_verifikasi'] == 'Unverified') {
                                                                    echo 'Unverified';
                                                                } else if ($verifikasi['status_verifikasi'] == 'Pending') {
                                                                    echo 'Pending';
                                                                }
                                                            }
                                                        }
                                                    }
                                                    ?>">
                                                        <span><?php
                                                        if (!empty($data['verifikasi'])) {
                                                            foreach ($data['verifikasi'] as $verifikasi) {
                                                                if ($verifikasi['tahap_verifikasi'] == 'Teknisi') {
                                                                    echo $verifikasi['status_verifikasi'];
                                                                    break;
                                                                }
                                                            }
                                                        } else {
                                                            echo 'Not Started';
                                                        }
                                                        ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <li class="<?php
                                if (!empty($data['verifikasi'])) {
                                    $teknisiVerified = false;

                                    foreach ($data['verifikasi'] as $verifikasi) {
                                        if ($verifikasi['tahap_verifikasi'] == 'Teknisi' && $verifikasi['status_verifikasi'] == 'Verified') {
                                            $teknisiVerified = true;
                                            break;
                                        }
                                    }

                                    if ($teknisiVerified) {
                                        echo 'active';
                                    }
                                }
                                ?>">
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
                                                    <div class="adm-stt <?php
                                                    if (!empty($data['verifikasi'])) {
                                                        $teknisiVerified = false;
                                                        foreach ($data['verifikasi'] as $verifikasi) {
                                                            if ($verifikasi['tahap_verifikasi'] == 'Teknisi' && $verifikasi['status_verifikasi'] == 'Verified') {
                                                                $teknisiVerified = true;
                                                            }
                                                        }

                                                        if ($teknisiVerified) {
                                                            foreach ($data['verifikasi'] as $verifikasi) {
                                                                if ($verifikasi['tahap_verifikasi'] == 'Admin Prodi') {
                                                                    if ($verifikasi['status_verifikasi'] == 'Unverified') {
                                                                        echo 'Unverified';
                                                                    } else if ($verifikasi['status_verifikasi'] == 'Pending') {
                                                                        echo 'Pending';
                                                                    }
                                                                }
                                                            }
                                                        }
                                                    }
                                                    ?>">
                                                        <span><?php
                                                        if (!empty($data['verifikasi'])) {
                                                            $teknisiVerified = false;
                                                            foreach ($data['verifikasi'] as $verifikasi) {
                                                                if ($verifikasi['tahap_verifikasi'] == 'Teknisi' && $verifikasi['status_verifikasi'] == 'Verified') {
                                                                    $teknisiVerified = true;
                                                                }
                                                            }

                                                            if ($teknisiVerified) {
                                                                foreach ($data['verifikasi'] as $verifikasi) {
                                                                    if ($verifikasi['tahap_verifikasi'] == 'Admin Prodi') {
                                                                        echo $verifikasi['status_verifikasi'];
                                                                        break;
                                                                    }
                                                                }
                                                            } else {
                                                                echo 'Not Started';
                                                            }
                                                        } else {
                                                            echo 'Not Started';
                                                        }
                                                        ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <li class="<?php
                                $adminVerified = false;
                                if (!empty($data['verifikasi'])) {
                                    $teknisiVerified = false;

                                    foreach ($data['verifikasi'] as $verifikasi) {
                                        if ($verifikasi['tahap_verifikasi'] == 'Teknisi' && $verifikasi['status_verifikasi'] == 'Verified') {
                                            $teknisiVerified = true;
                                        }
                                        if ($verifikasi['tahap_verifikasi'] == 'Admin Prodi' && $verifikasi['status_verifikasi'] == 'Verified') {
                                            $adminVerified = true;
                                        }
                                    }

                                    if ($teknisiVerified && $adminVerified) {
                                        echo 'active';
                                    }
                                }
                                ?>">
                                    <div class="lists">
                                        <div class="progress">
                                            <img src="<?= IMAGE; ?>track.png" alt="">
                                        </div>

                                        <div class="ls">
                                            <div class="complate">
                                                <span>Bebas Tanggungan Document</span>
                                            </div>

                                            <div class="stt">
                                                <p><?php
                                                if ($adminVerified) {
                                                    if (!empty($data['pengajuan']['status_pengajuan'])) {
                                                        if ($data['pengajuan']['status_pengajuan'] == 'Accepted') {
                                                            echo 'Your submission has been Accepted. Click the Print button to print the "Bebas Tanggungan" document.';
                                                        } elseif ($data['pengajuan']['status_pengajuan'] == 'Pending') {
                                                            echo 'Your submission is being processed.';
                                                        }
                                                    } else {
                                                        echo 'Your files successfully verified! Please apply here to print Bebas Tanggungan document.';
                                                    }
                                                }
                                                ?></p>
                                                <div class="app">
                                                    <div class="dc-stt">
                                                        <form action="<?= BASEURL; ?>/Mahasiswa/applyBebas"
                                                            method="POST">
                                                            <button type="submit" name="apply" class="dc-stt <?php
                                                            $adminVerified = false;
                                                            if (!empty($data['verifikasi'])) {
                                                                foreach ($data['verifikasi'] as $verifikasi) {
                                                                    if ($verifikasi['tahap_verifikasi'] == 'Admin Prodi' && $verifikasi['status_verifikasi'] == 'Verified') {
                                                                        $adminVerified = true;
                                                                        break;
                                                                    }
                                                                }
                                                            }

                                                            if ($adminVerified) {
                                                                if (!empty($data['pengajuan']['status_pengajuan'])) {
                                                                    if ($data['pengajuan']['status_pengajuan'] == 'Accepted') {
                                                                        echo 'btn-print';
                                                                    } elseif ($data['pengajuan']['status_pengajuan'] == 'Pending') {
                                                                        echo 'btn-pending';
                                                                    }
                                                                } else {
                                                                    echo 'btn-apply';
                                                                }
                                                            }
                                                            ?>">
                                                                <?php
                                                                if ($adminVerified) {
                                                                    if (!empty($data['pengajuan']['status_pengajuan'])) {
                                                                        if ($data['pengajuan']['status_pengajuan'] == 'Accepted') {
                                                                            echo 'Apply';
                                                                        } elseif ($data['pengajuan']['status_pengajuan'] == 'Pending') {
                                                                            echo 'Pending';
                                                                        }
                                                                    } else {
                                                                        echo 'Print';
                                                                    }
                                                                }
                                                                ?>
                                                            </button>
                                                        </form>
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
    <script src="<?= JS; ?>notification.js"></script>
    <script src="<?= JS; ?>teknisi.js"></script>
    <script src="<?= JS; ?>adprod.js"></script>
</body>

</html>