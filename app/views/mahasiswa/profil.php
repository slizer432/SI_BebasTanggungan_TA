<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="/../SI_BebasTanggungan_TA/image/icon.png">
    <link rel="stylesheet" href="/../SI_BebasTanggungan_TA/css/profil.css">
    <title>Profile</title>
</head>

<body>
    <div class="container">
        <nav>
            <div class="logo">
                <img src="/../SI_BebasTanggungan_TA/image/logo.png" alt="SIBETA">
                <span>SIBETA</span>
            </div>

            <div class="home-h">
                <a href="<?= BASEURL; ?>/Mahasiswa/home">HOME</a>
            </div>

            <div class="notif">
                <img src="/../SI_BebasTanggungan_TA/image/notification.png" alt="">
            </div>

            <div class="profile aktif">
                <a href="../Super_Admin/profil.html"><span class="role aktif"><?= $data['nim']; ?></span></a>
                <img src="/../SI_BebasTanggungan_TA/image/pp.png" alt="Foto Profil" class="pp">
            </div>
        </nav>

        <div class="content">
            <div class="top">
                <span>Profile</span>
            </div>

            <div class="data-content">
                <div class="photo">
                    <img src="/../SI_BebasTanggungan_TA/image/pp.png" alt="Foto Profil">
                </div>

                <div class="cont">
                    <div class="data">
                        <div class="isi p">
                            <label for="role">NIM :</label>
                            <p><?= $data['nim']; ?></p>
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
                            <img src="/../SI_BebasTanggungan_TA/image/edit.png" alt="">
                            <a href="<?= BASEURL; ?>/Mahasiswa/edit">Edit Profile</a>
                        </button>
                        <button onclick="window.location.href='<?= BASEURL; ?>/mahasiswa/logout'">Log Out</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>