<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log Activity</title>
    <link rel="stylesheet" href="<?= CSS; ?>Super_Admin/log.css">
</head>

<body>
    <div class="container">
        <nav>
            <div class="profile">
                <a href="<?= BASEURL; ?>/SuperAdmin/profil"><span class="role">Super Admin</span></a>
                <img src="<?= BASEURL; ?>/image/pp.png" alt="Foto Profil" class="pp">
            </div>
        </nav>

        <div class="menu-container">
            <div class="logo">
                <img src="<?= BASEURL; ?>/image/logo.png" alt="SIBETA">
                <span>SIBETA</span>
            </div>

            <div class="menu">
                <a href="<?= BASEURL; ?>/SuperAdmin/add_mhs">Add User Account</a>
                <a href="<?= BASEURL; ?>/SuperAdmin/home">Data List</a>
                <div class="pilih">
                    <a href="<?= BASEURL; ?>/SuperAdmin/log" class="aktif">Admin Log Activity</a>
                </div>
                <a href="<?= BASEURL; ?>/SuperAdmin/verifikasi_all">Verification Activity</a>
                <a href="<?= BASEURL; ?>/SuperAdmin/module">Module</a>
            </div>
        </div>

        <div class="content">
            <div class="top">
                <h2>Admin Log Activity</h2>

                <div class="top2">
                    <div class="search-container">
                        <form action="#" method="GET">
                            <button type="submit"><img src="<?= BASEURL; ?>/image/search.png" alt=""></button>
                            <input type="text" placeholder="search here...">
                        </form>
                    </div>
                </div>
            </div>

            <div class="data">
                <div class="table-container">
                    <table>
                        <thead>
                            <tr>
                                <th>Role</th>
                                <th>Name</th>
                                <th>Activity</th>
                                <th>Date & Time</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach ($data['log'] as $log): ?>
                                <tr>
                                    <td class="peran"><?= $log['role_admin']; ?></td>
                                    <td class="nama"><?= $log['nama_admin']; ?></td>
                                    <td class="activity"><?= $log['aktivitas']; ?></td>
                                    <td class="date"><?= $log['tanggal_aktivitas']; ?></td>
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