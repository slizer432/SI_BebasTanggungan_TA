<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?= IMAGE; ?>icon.png">
    <title>Student Attachment</title>
    <link rel="stylesheet" href="<?= CSS; ?>Admin/check.css">
</head>

<body>
    <div class="container">
        <nav>
            <div class="logo">
                <img src="<?= IMAGE; ?>logo.png" alt="SIBETA">
                <span>SIBETA</span>
            </div>

            <div class="attach">
                <span>STUDENT ATTACHMENT</span>
            </div>

            <div class="profile" onclick="window.location.href='<?= BASEURL; ?>/admin/profil'">
                <span class="role"><?= $data['nim']; ?></span>
                <img src="<?= IMAGE; ?>pp.png" alt="Foto Profil" class="pp">
            </div>
        </nav>

        <div class="content">
            <div class="top">
                <span>Student Attachment</span>

                <div class="akun"></div>
                <img src="<?= IMAGE; ?>pp.png" alt="">
                <div>
                    <span class="nama">Keisya Nisrina Aulia</span>
                    <span class="nim">2341720146</span>
                </div>
            </div>
        </div>

        <div class="data">
            <div class="box">
                <div class="isi">
                    <span>Thesis Report</span>

                    <div class="file">
                        <span class="file_name"></span>
                        <a href=""><img src="<?= IMAGE; ?>pdf.png" alt="">file name</a>
                    </div>

                    <div class="tgl">
                        <span class="tgl"></span>
                        <img src="<?= IMAGE; ?>calendar.png" alt="">
                    </div>
                </div>

                <form action="">
                    <div class="comment">
                        <textarea name="comment" id="comment" placeholder="type any comments..."></textarea>
                    </div>
                </form>
            </div>
        </div>

        <div class="btn">
            <button type="submit">Send Rejection</button>
            <button type="submit">Verification</button>
        </div>
    </div>
    </div>
</body>

</html>