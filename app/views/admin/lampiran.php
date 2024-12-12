<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
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
                <a href="<?= BASEURL; ?>/admin/home">STUDENT ATTACHMENT</a>
            </div>

            <div class="profile" onclick="window.location.href='<?= BASEURL; ?>/admin/profil'">
                <span class="role"><?= explode(' ', $data['nama'])[0]; ?></span>
                <img src="<?= IMAGE; ?><?= !empty($data['foto_profil']) ? 'foto_admin/'.$data['foto_profil'] : 'pp.png'; ?>" alt="Foto Profil" class="pp">
            </div>
        </nav>

        <div class="content">
            <div class="top">
                <div class="search-container">
                    <form action="<?= BASEURL; ?>/admin/lampiran" method="post">
                        <button type="submit"><img src="<?= IMAGE; ?>search.png" alt="Search"></button>
                        <input type="text" name="keyword" placeholder="Search by NIM or Name..." value="<?= isset($_POST['keyword']) ? htmlspecialchars($_POST['keyword']) : ''; ?>">
                    </form>
                </div>
                <div class="choose">
                    <a href="<?= BASEURL; ?>/admin/lampiran" class="aktif">All</a>
                    <a href="<?= BASEURL; ?>/admin/lampiran/verified">Verified</a>
                    <a href="<?= BASEURL; ?>/admin/lampiran/pending">Pending</a>
                    <a href="<?= BASEURL; ?>/admin/lampiran/unverified">Unverified</a>
                </div>
            </div>

            <div class="data">
                <div class="table-container">
                    <table>
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>NIM</th>
                                <th>NAME</th>
                                <th>DATE</th>
                                <th>STATUS</th>
                            </tr>
                        </thead>
                        <div class="profile" onclick="window.location.href='<?= BASEURL; ?>/admin/profil'">
                            <span class="role"><?= $data['nim']; ?></span>
                            <img src="<?= IMAGE; ?>pp.png" alt="Foto Profil" class="pp">
                        </div>
                        </nav>

                        <tbody>
                            <?php $index = 1; ?>
                            <?php foreach ($data['mhs'] as $verif): ?>
                                <tr onclick="window.location.href='<?= BASEURL; ?>/admin/check_teknisi?<?= htmlspecialchars($verif['nim']); ?>'" style="cursor: pointer;">
                                    <td class="no"><?= $index++; ?></td>
                                    <td class="nim"><?= htmlspecialchars($verif['nim']); ?></td>
                                    <td class="student"><?= htmlspecialchars($verif['nama']); ?></td>
                                    <td class="date"><?= htmlspecialchars($verif['tanggal_verifikasi']); ?></td>
                                    <td class="status"><?= htmlspecialchars($verif['status_verifikasi']); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>