<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?= IMAGE; ?>icon.png">
    <link rel="stylesheet" href="<?= CSS; ?>Super_Admin/data.css">
    <title>Admin Data List</title>
</head>

<body>
    <div class="container">
        <nav>
        <<div class="profile" onclick="window.location.href='<?= BASEURL; ?>/SuperAdmin/profil'">
                <span class="role"><?= $data['nim']; ?></span>
                <img src="<?= IMAGE; ?>pp.png" alt="Foto Profil" class="pp">
            </div>
        </nav>

        <div class="menu-container">
            <div class="logo">
                <img src="<?= IMAGE; ?>logo.png" alt="SIBETA">
                <span>SIBETA</span>
            </div>

            <div class="menu">
                <a href="<?= BASEURL; ?>/SuperAdmin/add_mhs">Add User Account</a>
                <div class="pilih">
                    <a href="<?= BASEURL; ?>/SuperAdmin/home" class="aktif">Data List</a>
                </div>
                <a href="<?= BASEURL; ?>/SuperAdmin/log">Admin Log Activity</a>
                <a href="<?= BASEURL; ?>/SuperAdmin/verifikasi_all">Verification Activity</a>
                <a href="<?= BASEURL; ?>/SuperAdmin/module">Module</a>
            </div>
        </div>

        <div class="content">
            <div class="top">
                <h2>Data List</h2>

                <div class="top2">
                    <div class="search-container">
                        <form action="#" method="GET">
                            <button type="submit"><img src="<?= IMAGE; ?>search.png" alt=""></button>
                            <input type="text" placeholder="search here...">
                        </form>
                    </div>

                    <div class="choose">
                        <a href="<?= BASEURL; ?>/SuperAdmin/data_mhs">Mahasiswa</a>
                        <a href="<?= BASEURL; ?>/SuperAdmin/data_adm" class="aktif">Admin</a>
                    </div>
                </div>
            </div>

            <div class="data">
                <div class="table-container">
                    <table>
                        <thead>
                            <tr>
                                <th>NIP</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Password</th>
                                <th>Role</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach ($data['mhs'] as $mhs): ?>
                                <tr>
                                    <td class="nip"><?= $mhs['nip']; ?></td>
                                    <td class="nama"><?= $mhs['nama']; ?></td>
                                    <td class="email"><u><?= $mhs['email']; ?></u></td>
                                    <td class="password"><?= $mhs['password']; ?></td>
                                    <td class="role"><?= $mhs['role']; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

                <div class="halaman">
                    <button type="button" class="prev">
                        < Previous</button>
                            <div>
                                <button type="button" class="page-number">01 02 03 04 ... 11</button>
                            </div>
                            <button type="button" class="next">Next ></button>
                </div>
            </div>
        </div>
    </div>
</body>

</html>