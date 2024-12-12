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

            <div class="profile aktif" onclick="window.location.href='<?= BASEURL; ?>/admin/profil'">
                <span class="role aktif"><?= explode(' ', $data['nama'])[0]; ?></span>
                <img src="<?= IMAGE; ?>foto_admin/<?= $data['foto_profil']; ?>" alt="Foto Profil" class="pp">
            </div>
        </nav>

        <div class="content">
            <div class="top">
                <span>Profile</span>
            </div>


            <form action="<?= BASEURL; ?>/admin/profil" method="post" enctype="multipart/form-data">
                <div class="data-content">

                    <div class="photo">
                        <img id="preview-image"
                            src="<?= IMAGE; ?><?= !empty($data['foto_profil']) ? 'foto_admin/' . $data['foto_profil'] : 'pp.png'; ?>"
                            alt="Foto Profil">
                        <div class="edit-overlay">
                            <input type="file" name="foto" id="foto-input" accept="image/*">
                            <label for="foto-input" class="edit-button">Change Photo</label>
                        </div>
                    </div>

                    <div class="cont">
                        <div class="data">

                            <input type="hidden" name="nim" value="<?= $data['nip']; ?>">

                            <div class="isi e">
                                <label for="role">Role :</label>
                                <input type="text" name="role" value="<?= $data['role']; ?>">
                            </div>

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

                        <div class="btn">
                            <input type="submit" value="Save Changes">
                            <button type="button"
                                onclick="window.location.href='<?= BASEURL; ?>/mahasiswa/profil'">Cancel</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script src="<?= BASEURL; ?>/js/edit.js"></script>
</body>

</html>