<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?= IMAGE; ?>icon.png">
    <link rel="stylesheet" href="<?= CSS; ?>/profil.css">
    <title>Profile</title>
</head>

<body>
    <div class="container">
        <nav>
            <div class="logo">
                <img src="<?= IMAGE; ?>/logo.png" alt="SIBETA">
                <span>SIBETA</span>
            </div>

            <div class="home-h">
                <a href="<?= BASEURL; ?>/SuperAdmin/home">HOME</a>
            </div>

            <div class="notif">
                <img src="<?= IMAGE; ?>/notification.png" alt="">
            </div>

            <div class="profile aktif">
                <a href="<?= BASEURL; ?>/SuperAdmin/profil"><span class="role aktif">Super Admin</span></a>
                <img src="<?= IMAGE; ?>/pp.png" alt="Foto Profil" class="pp">
            </div>
        </nav>

        <div class="content">
            <div class="top">
                <span>Profile</span>
            </div>
            <form action="<?= BASEURL; ?>/SuperAdmin/edit" method="POST">
                <div class="data-content">
                    <div class="photo">
                        <img src="<?= IMAGE; ?>/pp.png" alt="Foto Profil">
                    </div>

                    <div class="cont">
                        <div class="data">
                            <div class="isi e">
                                <label for="nama">Name :</label>
                                <input type="text" name="nama" value="<?= $data['nama']; ?>">
                            </div>

                            <div class="isi e">
                                <label for="email">Email :</label>
                                <input type="text" name="email" value="<?= $data['email']; ?>">
                            </div>

                            <div class="isi e">
                                <label for="password">Password :</label>
                                <input type="text" name="password" value="<?= $data['password']; ?>">
                            </div>
                        </div>

                        <input type="hidden" name="nip" value="<?= $data['nip']; ?>">

                        <div class="btn">
                            <button type="submit">Save</button>
                            <button><a href="<?= BASEURL; ?>/SuperAdmin/profil">Cancel</a></button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>