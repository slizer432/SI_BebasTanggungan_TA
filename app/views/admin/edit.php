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
                <a href="<?= BASEURL; ?>/Admin/lampiran.html">STUDENT ATTACHMENT</a>
            </div>

            <div class="profile" onclick="window.location.href='<?= BASEURL; ?>/admin/profil'">
                <span class="role"><?= $data['nim']; ?></span>
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
                        <div class="isi e">
                            <label for="role">Role :</label>
                            <input type="text" name="role">
                        </div>

                        <div class="isi e">
                            <label for="nama">Name :</label>
                            <input type="text" name="nama">
                        </div>

                        <div class="isi e">
                            <label for="email">Email :</label>
                            <input type="text" name="email">
                        </div>
                    </div>

                    <div class="btn">
                        <button>Save</button>
                        <button><a href="<?= BASEURL; ?>/Admin/profil">Cancel</a></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>