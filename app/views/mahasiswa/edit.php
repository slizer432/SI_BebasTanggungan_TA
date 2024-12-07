<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="/../SI_BebasTanggungan_TA/image/icon.png">
    <title>Profile</title>
    <link rel="stylesheet" href="<?= BASEURL; ?>/css/profil.css">
</head>

<body>
    <div class="container">
        <nav>
            <div class="logo">
                <img src="/../SI_BebasTanggungan_TA/image/logo.png" alt="SIBETA">
                <span>SIBETA</span>
            </div>

            <div class="home-h">
                <a href="../Mahasiswa/home.html">HOME</a>
            </div>

            <div class="notif">
                <img src="/../SI_BebasTanggungan_TA/image/notification.png" alt="">
            </div>

            <div class="profile aktif">
                <a href="../Mahasiswa/profil.html"><span class="role aktif">Mahasiswa</span></a>
                <img src="/../SI_BebasTanggungan_TA/image/pp.png" alt="Foto Profil" class="pp">
            </div>
        </nav>

        <div class="content">
            <div class="top">
                <span>Profile</span>
            </div>
            <form action="<?= BASEURL; ?>/Mahasiswa/edit">
                <div class="data-content">
                    <div class="photo">
                        <img src="/../SI_BebasTanggungan_TA/image/pp.png" alt="Foto Profil">
                    </div>

                    <div class="cont">
                        <div class="data">

                            <div class="isi e">
                                <label for="nama">Name :</label>
                                <input type="text" name="nama">
                            </div>

                            <div class="isi e">
                                <label for="email">Email :</label>
                                <input type="text" name="email">
                            </div>

                            <div class="isi e">
                                <label for="password">Password :</label>
                                <input type="text" name="password">
                            </div>
                        </div>

                        <div class="btn">
                            <input type="submit">
                            <button><a href="<?= BASEURL; ?>/Mahasiswa/profil">Cancel</a></button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>