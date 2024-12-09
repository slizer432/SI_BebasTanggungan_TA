<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="<?= IMAGE; ?>icon.png">
        <title>Profile</title>
        <link rel="stylesheet" href="<?=  CSS; ?>profil.css">
    </head>

    <body>
        <div class="container">
            <nav>
                <div class="logo">
                    <img src="/../SI_BebasTanggungan_TA/image/logo.png" alt="SIBETA">
                    <span>SIBETA</span>
                </div>

                <div class="home">
                    <a href="/../SI_BebasTanggungan_TA/app/view/Admin/lampiran.html">STUDENT ATTACHMENT</a>
                </div>

                <div class="profile aktif">
                    <a href="../Admin/profil.html"><span class="role aktif">Admin</span></a>
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
                                <label for="role">Role :</label>
                                <p>2341720146</p>
                            </div>

                            <div class="isi p">
                                <label for="nama">Name :</label>
                                <p>Keisya Nisrina Aulia</p>
                            </div>

                            <div class="isi p">
                                <label for="email">Email :</label>
                                <p>keisya.naulia@gmail.com</p>
                            </div>
                        </div>

                        <div class="btn">
                            <button class="b">
                                <img src="/../SI_BebasTanggungan_TA/image/edit.png" alt="">
                                <a href="../Admin/edit_profile.html">Edit Profile</a>
                            </button>
                            <button onclick="window.location.href='<?= BASEURL; ?>/mahasiswa/logout'">Log Out</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>