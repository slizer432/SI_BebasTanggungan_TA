<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?= IMAGE; ?>icon.png">
    <link rel="stylesheet" href="<?= CSS; ?>Super_Admin/add.css">
    <title>Add Admin Account</title>
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
                <img src="<?= IMAGE; ?>/logo.png" alt="SIBETA">
                <span>SIBETA</span>
            </div>

            <div class="menu">
                <div class="pilih">
                    <a href="<?= BASEURL; ?>/SuperAdmin/add_mhs" class="aktif">Add User Account</a>
                </div>
                <a href="<?= BASEURL; ?>/SuperAdmin/home">Data List</a>
                <a href="<?= BASEURL; ?>/SuperAdmin/log">Admin Log Activity</a>
                <a href="<?= BASEURL; ?>/SuperAdmin/verifikasi_all">Verification Activity</a>
                <a href="<?= BASEURL; ?>/SuperAdmin/module">Module</a>
            </div>
        </div>

        <div class="content">
            <div class="top">
                <h2>Add User Account</h2>

                <div class="choose">
                    <a href="<?= BASEURL; ?>/SuperAdmin/add_mhs">Mahasiswa</a>
                    <a href="<?= BASEURL; ?>/SuperAdmin/add_adm" class="aktif">Admin</a>
                </div>
            </div>

            <div class="form-container">
                <div class="pp-container">
                    <h4>Profile Photo</h4>
                    <div class="photo-profile">
                        <img src="<?= IMAGE; ?>/gallery-add.png" alt="">
                        <span class="drop">Drop image here!</span>
                        <span class="support">Supports JPG,JPEG,PNG</span>
                    </div>
                </div>

                <div class="form">
                    <form action="<?= BASEURL; ?>/SuperAdmin/add_adm" method="POST" class="add">
                        <div class="input">
                            <label for="role">Role</label>
                            <select name="role" id="role">
                                <option style="display: none;" default>Select role</option>
                                <option value="Admin Jurusan">Admin Jurusan</option>
                                <option value="Admin Prodi">Admin Prodi</option>
                                <option value="Teknisi">Teknisi </option>
                            </select>
                        </div>

                        <div class="input">
                            <label for="nip">NIP</label>
                            <div class="input-container">
                                <input type="text" id="nama" name="nip">
                            </div>
                        </div>

                        <div class="input">
                            <label for="nama">Name</label>
                            <div class="input-container">
                                <input type="text" id="nama" name="nama">
                            </div>
                        </div>

                        <div class="input">
                            <label for="email">Email</label>
                            <div class="input-container">
                                <input type="text" id="email" name="email">
                            </div>
                        </div>

                        <div class="input">
                            <label for="password">Password</label>
                            <div class="input-container">
                                <input type="text" id="password" name="password">
                            </div>
                        </div>

                        <div>
                            <button type="submit" class="add-button"><img src="<?= IMAGE; ?>/add.png"
                                    alt="">Add</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</body>

</html>