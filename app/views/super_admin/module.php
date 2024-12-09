<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Module</title>
    <link rel="stylesheet" href="<?= CSS; ?>/Super_Admin/module.css">
</head>

<body>
    <div class="container">
        <nav>
            <div class="profile">
                <a href="<?= BASEURL; ?>/Super_Admin/profil"><span class="role">Super Admin</span></a>
                <img src="<?= IMAGE; ?>/pp.png" alt="Foto Profil" class="pp">
            </div>
        </nav>

        <div class="menu-container">
            <div class="logo">
                <img src="<?= IMAGE; ?>/logo.png" alt="SIBETA">
                <span>SIBETA</span>
            </div>

            <div class="menu">
                <a href="<?= BASEURL; ?>/SuperAdmin/add_mhs">Add User Account</a>
                <a href="<?= BASEURL; ?>/SuperAdmin/home">Data List</a>
                <a href="<?= BASEURL; ?>/SuperAdmin/log">Admin Log Activity</a>
                <a href="<?= BASEURL; ?>/SuperAdmin/verifikasi_all">Verification Activity</a>
                <div class="pilih">
                    <a href="<?= BASEURL; ?>/SuperAdmin/module" class="aktif">Module</a>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="top">
                <h2>Module</h2>
            </div>
            <?php foreach ($data['module'] as $modul): ?>
            <div class="isi-container" id="isi">

                    <form action="" class="add">
                        <div class="top-container">
                            <div class="type">
                                <label for="type">Type :</label>
                                <input type="text" id="type" name="type" value="<?= $modul['tipe']; ?>">
                            </div>

                            <div class="title">
                                <label for="title">Title :</label>
                                <input type="text" id="title" name="title" value="<?= $modul['judul']; ?>">
                            </div>
                        </div>

                        <div class="isi">
                            <label for="content">Content :</label>
                            <textarea type="text" id="content" name="content"><?= $modul['isi']; ?></textarea>
                        </div>

                        <div class="btn">
                            <button type="submit"><img src="<?= IMAGE; ?>/edit.png" alt="">Edit</button>
                            <button type="submit"><img src="<?= IMAGE; ?>/delete.png" alt="">Delete</button>
                        </div>

                        <div class="btn">
                            <button type="submit">Save</button>
                            <button type="reset">Cancel</button>
                        </div>
                    </form>
                </div>
                <?php endforeach; ?>
        </div>
</body>

</html>