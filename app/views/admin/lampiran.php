<!DOCTYPE html>
<html>

<head>
    <meta charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?= IMAGE; ?>icon.png">
    <title>Attachment</title>
    <link rel="stylesheet" href="<?= CSS; ?>Admin/lampiran.css">
</head>

<body>
    <div class="container">
        <nav>
            <div class="logo">
                <img src="<?= IMAGE; ?>logo.png" alt="SIBETA">
                <span>SIBETA</span>
            </div>

            <div class="attach">
                <span>STUDENT ATTACHMENT</span>
            </div>

            <div class="profile">
                <a href="<?= BASEURL; ?>/Admin/profil"><span class="role">Admin</span></a>
                <img src="<?= IMAGE; ?>pp.png" alt="Foto Profil" class="pp">
            </div>
        </nav>

        <div class="content">
            <div class="top">
                <div class="search-container">
                    <form action="#" method="GET">
                        <button type="submit"><img src="<?= IMAGE; ?>search.png" alt=""></button>
                        <input type="text" placeholder="search here...">
                    </form>
                </div>
                <div class="choose">
                    <a href="/../SI_BebasTanggungan_TA/app/view/Admin/verifikasi_all.html" class="aktif">All</a>
                    <a href="/../SI_BebasTanggungan_TA/app/view/Admin/verifikasi.html">Verified</a>
                    <a href="/../SI_BebasTanggungan_TA/app/view/Admin/verifikasi_pending.html">Pending</a>
                    <a href="/../SI_BebasTanggungan_TA/app/view/Admin/verifikasi_unverif.html">Unverified</a>
                </div>
            </div>

            <div class="data">
                <div class="table-container">
                    <table>
                        <thead>
                            <tr>
                                <th>NIM</th>
                                <th>NAME</th>
                                <th>DATE</th>
                                <th>STATUS</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach ($data as $verif): ?>
                                <tr>
                                    <td class="nim"><?= $verif['nim']; ?></td>
                                    <td class="student"><?= $verif['nama']; ?></td>
                                    <td class="date"><?= $verif['tanggal_verifikasi']; ?></td>
                                    <td class="status"><?= $verif['status_verifikasi']; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

                <div class="halaman">
                    <button type="button" class="prev">
                        < Previous</button>
                            <button type="button" class="page-number">01 02 03 04 ... 11</button>
                            <button type="button" class="next">Next ></button>
                </div>

            </div>
        </div>
    </div>
</body>
</html>