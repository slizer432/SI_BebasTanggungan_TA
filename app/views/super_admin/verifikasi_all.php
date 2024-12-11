<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?= IMAGE; ?>icon.png">
    <link rel="stylesheet" href="<?= CSS; ?>Super_Admin/verifikasi.css">
    <title>Log Activity</title>
</head>

<body>
    <div class="container">
        <nav>
        <div class="profile" onclick="window.location.href='<?= BASEURL; ?>/SuperAdmin/profil'">
                <span class="role"><?= $data['nim']; ?></span>
                <img src="<?= IMAGE; ?>pp.png" alt="Foto Profil" class="pp">
            </div>
        </nav>

        <div class="menu-container">
            <div class="logo">
                <img src="<?= IMAGE; ?>/logo.png" alt="SIBETA">
                <span>SIBETA</span>
            </div>

            <div class="menu">
                <a href="<?= BASEURL; ?>/SuperAdmin/add_mhs">Add User Account</a>
                <a href="<?= BASEURL; ?>/SuperAdmin/home">Data List</a>
                <a href="<?= BASEURL; ?>/SuperAdmin/log">Admin Log Activity</a>
                <div class="pilih">
                    <a href="<?= BASEURL; ?>/SuperAdmin/verifikasi_all" class="aktif">Verification Activity</a>
                </div>
                <a href="<?= BASEURL; ?>/SuperAdmin/module">Module</a>
            </div>
        </div>

        <div class="content">
            <div class="top">
                <h2>Admin Log Activity</h2>

                <div class="top2">
                    <div class="search-container">
                        <form action="#" method="GET">
                            <button type="submit"><img src="<?= IMAGE; ?>/search.png" alt=""></button>
                            <input type="text" placeholder="search here...">
                        </form>
                    </div>

                    <div class="choose">
                        <a href="#" class="aktif">All</a>
                        <a href="#">Verified</a>
                        <a href="#">Pending</a>
                        <a href="#">Unverified</a>
                        <a href="#">Approved</a>
                    </div>
                </div>
            </div>

            <div class="data">
                <div class="table-container">
                    <table>
                        <thead>
                            <tr>
                                <th>Admin</th>
                                <th>Student</th>
                                <th>Status</th>
                                <th>Date & Time</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach ($data['verif'] as $verif): ?>
                                <tr>
                                    <td class="admin"><?= $verif['nama_admin']; ?></td>
                                    <td class="student"><?= $verif['nama_mahasiswa']; ?></td>
                                    <td class="status"><?= $verif['status_verifikasi']; ?></td>
                                    <td class="date"><?= $verif['tanggal_verifikasi']; ?></td>
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