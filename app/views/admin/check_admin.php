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
                <a href="<?= BASEURL; ?>/admin/home">STUDENT ATTACHMENT</a>
            </div>

            <div class="profile" onclick="window.location.href='<?= BASEURL; ?>/admin/profil'">
                <span class="role"><?= explode(' ', $data['nama'])[0]; ?></span>
                <img src="<?= IMAGE; ?><?= !empty($data['foto_profil']) ? 'foto_admin/' . $data['foto_profil'] : 'pp.png'; ?>"
                    alt="Foto Profil" class="pp">
            </div>
        </nav>

        <div class="content">
            <h2>Student Attachment</h2>

            <div class="student-info">
                <img src="<?= IMAGE; ?>pp.png" alt="Student Photo" class="student-photo">
                <div class="student-details">
                    <h3><?= $data['mhs']['nama']; ?></h3>
                    <p><?= $data['mhs']['nim']; ?></p>
                </div>
            </div>

            <form action="<?= BASEURL; ?>/admin/process_documents" method="POST">
                <div class="documents">
                    <div class="document-card">
                        <div class="doc-header">
                            <h4>Tanda Terima Penyerahan Laporan Tugas Akhir/Skripsi</h4>
                        </div>

                        <div class="doc-content">
                            <div class="doc-info">
                                <div class="file-info">
                                    <img src="<?= IMAGE; ?>pdf.png" alt="PDF">
                                    <a href="<?= BASEURL; ?>/uploads/<?= $data['mhs']['nim'] . '_' . $data['mhs']['nama'] . '_Tanda Terima Penyerahan Laporan Tugas Akhir.pdf'; ?>"
                                        target="_blank">
                                        <?= $data['mhs']['nim'] . '_' . $data['mhs']['nama'] . '_Tanda Terima Penyerahan Laporan Tugas Akhir.pdf'; ?>
                                    </a>
                                </div>

                                <div class="date-info">
                                    <img src="<?= IMAGE; ?>calendar.png" alt="Calendar">
                                    <span>
                                        <?php
                                        foreach ($data['dokumen'] as $dokumen) {
                                            if ($dokumen['file_dokumen'] == $data['mhs']['nim'] . '_' . $data['mhs']['nama'] . '_Tanda Terima Penyerahan Laporan Tugas Akhir.pdf') {
                                                echo $dokumen['tanggal_upload'];
                                                break;
                                            }
                                        }
                                        ?>
                                    </span>
                                </div>
                            </div>

                            <div class="comment-box">
                                <textarea name="comment_laporan" placeholder="Type any comments..."></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="document-card">
                        <div class="doc-header">
                            <h4>Tanda Terima Penyerahan Laporan PKL/Magang</h4>
                        </div>

                        <div class="doc-content">
                            <div class="doc-info">
                                <div class="file-info">
                                    <img src="<?= IMAGE; ?>pdf.png" alt="PDF">
                                    <a href="<?= BASEURL; ?>/uploads/<?= $data['mhs']['nim'] . '_' . $data['mhs']['nama'] . '_Tanda Terima Penyerahan Laporan Magang.pdf'; ?>"
                                        target="_blank">
                                        <?= $data['mhs']['nim'] . '_' . $data['mhs']['nama'] . '_Tanda Terima Penyerahan Laporan Magang.pdf'; ?>
                                    </a>
                                </div>

                                <span>
                                    <?php
                                    foreach ($data['dokumen'] as $dokumen) {
                                        if ($dokumen['file_dokumen'] == $data['mhs']['nim'] . '_' . $data['mhs']['nama'] . '_Tanda Terima Penyerahan Laporan Magang.pdf') {
                                            echo $dokumen['tanggal_upload'];
                                            break;
                                        }
                                    }
                                    ?>
                                </span>
                            </div>

                            <div class="comment-box">
                                <textarea name="comment_program" placeholder="Type any comments..."></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="document-card">
                        <div class="doc-header">
                            <h4>Scan Hasil TOEIC</h4>
                        </div>

                        <div class="doc-content">
                            <div class="doc-info">
                                <div class="file-info">
                                    <img src="<?= IMAGE; ?>pdf.png" alt="PDF">
                                    <a href="<?= BASEURL; ?>/uploads/<?= $data['mhs']['nim'] . '_' . $data['mhs']['nama'] . '_Scan Hasil TOEIC.pdf'; ?>"
                                        target="_blank">
                                        <?= $data['mhs']['nim'] . '_' . $data['mhs']['nama'] . '_Scan Hasil TOEIC.pdf'; ?>
                                    </a>
                                </div>

                                <span>
                                    <?php
                                    foreach ($data['dokumen'] as $dokumen) {
                                        if ($dokumen['file_dokumen'] == $data['mhs']['nim'] . '_' . $data['mhs']['nama'] . '_Scan Hasil TOEIC.pdf') {
                                            echo $dokumen['tanggal_upload'];
                                            break;
                                        }
                                    }
                                    ?>
                                </span>
                            </div>

                            <div class="comment-box">
                                <textarea name="comment_surat" placeholder="Type any comments..."></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="document-card">
                        <div class="doc-header">
                            <h4>Surat Bebas Kompen</h4>
                        </div>

                        <div class="doc-content">
                            <div class="doc-info">
                                <div class="file-info">
                                    <img src="<?= IMAGE; ?>pdf.png" alt="PDF">
                                    <a href="<?= BASEURL; ?>/uploads/<?= $data['mhs']['nim'] . '_' . $data['mhs']['nama'] . '_Surat Bebas Kompen.pdf'; ?>"
                                        target="_blank">
                                        <?= $data['mhs']['nim'] . '_' . $data['mhs']['nama'] . '_Surat Bebas Kompen.pdf'; ?>
                                    </a>
                                </div>

                                <span>
                                    <?php
                                    foreach ($data['dokumen'] as $dokumen) {
                                        if ($dokumen['file_dokumen'] == $data['mhs']['nim'] . '_' . $data['mhs']['nama'] . '_Surat Bebas Kompen.pdf') {
                                            echo $dokumen['tanggal_upload'];
                                            break;
                                        }
                                    }
                                    ?>
                                </span>
                            </div>

                            <div class="comment-box">
                                <textarea name="comment_surat" placeholder="Type any comments..."></textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="action-buttons">
                    <input type="hidden" name="student_id" value="<?= $data['mhs']['nim']; ?>">
                    <button type="submit" class="reject-btn">Send Rejection</button>
                    <a href="<?= BASEURL; ?>/admin/verify/<?= $data['mhs']['nim']; ?>"
                        class="verify-btn">Verification</a>
                </div>
            </form>
        </div>
    </div>
</body>

</html>