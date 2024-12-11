<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?= IMAGE; ?>icon.png">
    <title>Profile</title>
    <link rel="stylesheet" href="<?= CSS; ?>profil.css">
</head>

<body>
    <div class="container">
        <nav>
            <div class="logo">
                <img src="<?= IMAGE; ?>logo.png" alt="SIBETA">
                <span>SIBETA</span>
            </div>

            <div class="home">
                <a href="<?= BASEURL; ?>/Admin/lampiran">STUDENT ATTACHMENT</a>
            </div>

            <div class="profile aktif" onclick="window.location.href='<?= BASEURL; ?>/admin/profil'">
                <span class="role aktif"><?= $data['nim']; ?></span>
                <img src="<?= IMAGE; ?>pp.png" alt="Foto Profil" class="pp">
            </div>
        </nav>

        <div class="content">
            <div class="top">
                <span>Profile</span>
            </div>

            <div class="data-content">
                <div class="photo">
                    <img src="<?= IMAGE; ?>pp.png" alt="Foto Profil">
                </div>

                <div class="cont">
                    <div class="data">
                        <div class="isi p">
                            <label for="role">Role :</label>
                            <p><?= $data['role']; ?></p>
                        </div>

                        <div class="isi p">
                            <label for="nama">Name :</label>
                            <p><?= $data['nama']; ?></p>
                        </div>

                        <div class="isi p">
                            <label for="email">Email :</label>
                            <p><?= $data['email']; ?></p>
                        </div>
                    </div>

                    <div class="btn">
                        <button class="b">
                            <img src="<?= IMAGE; ?>edit.png" alt="">
                            <a href="<?= BASEURL; ?>/Admin/edit">Edit Profile</a>
                        </button>
                        <button onclick="window.location.href='<?= BASEURL; ?>/mahasiswa/logout'">Log Out</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>