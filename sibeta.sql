CREATE DATABASE sibeta;
GO

USE sibeta;
GO

-- Tabel mahasiswa
CREATE TABLE mahasiswa
(
    nim CHAR(10) PRIMARY KEY NOT NULL,
    nama VARCHAR(100) NOT NULL,
    program_studi VARCHAR(50) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    foto_profil VARCHAR(100) NULL,
    CONSTRAINT ck_mahasiswa_program_studi CHECK (program_studi IN ('D-IV Teknik Informatika', 'D-IV Sistem Informasi Bisnis'))
);

-- Tabel super_admin
CREATE TABLE super_admin
(
    id_super_admin INT PRIMARY KEY IDENTITY(1,1) NOT NULL,
    nama VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(100) NOT NULL
);

-- Tabel admin
CREATE TABLE admin
(
    id_admin INT PRIMARY KEY IDENTITY(1,1) NOT NULL,
    nama VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(100) NOT NULL,
    role VARCHAR(20) NOT NULL,
    id_super_admin INT NOT NULL,
    FOREIGN KEY (id_super_admin) REFERENCES super_admin(id_super_admin),
    CONSTRAINT ck_admin_role CHECK (role IN ('Teknisi', 'Admin Prodi', 'Admin Jurusan'))
);

-- Tabel dokumen
CREATE TABLE dokumen
(
    id_dokumen INT PRIMARY KEY IDENTITY(1,1) NOT NULL,
    nim CHAR(10) NOT NULL,
    jenis_dokumen VARCHAR(100) NOT NULL,
    file_dokumen VARCHAR(255) NOT NULL,
    tanggal_upload DATE NOT NULL,
    FOREIGN KEY (nim) REFERENCES mahasiswa(nim)
);

-- Tabel verifikasi_admin
CREATE TABLE verifikasi_admin
(
    id_verifikasi_admin INT PRIMARY KEY IDENTITY(1,1) NOT NULL,
    id_admin INT NOT NULL,
    nim CHAR(10) NOT NULL,
    tahap_verifikasi VARCHAR(50) NOT NULL,
    status_verifikasi VARCHAR(20) NOT NULL,
    tanggal_verifikasi DATETIME NOT NULL DEFAULT GETDATE(),
    FOREIGN KEY (id_admin) REFERENCES admin(id_admin),
    FOREIGN KEY (nim) REFERENCES mahasiswa(nim),
    CONSTRAINT ck_verifikasi_status CHECK (status_verifikasi IN ('Unverified', 'Pending', 'Verified'))
);

-- Tabel log_aktivitas_admin
CREATE TABLE log_aktivitas_admin
(
    id_log INT PRIMARY KEY IDENTITY(1,1) NOT NULL,
    id_admin INT NOT NULL,
    aktivitas VARCHAR(100) NOT NULL,
    detail TEXT NULL,
    tanggal_aktivitas DATETIME NOT NULL DEFAULT GETDATE(),
    FOREIGN KEY (id_admin) REFERENCES admin(id_admin)
);

-- Tabel pengajuan_bebas_tanggungan
CREATE TABLE pengajuan_bebas_tanggungan
(
    id_pengajuan INT PRIMARY KEY IDENTITY(1,1) NOT NULL,
    id_admin INT NOT NULL,
    nim CHAR(10) NOT NULL,
    tanggal_pengajuan DATE NOT NULL,
    status_pengajuan VARCHAR(20) NOT NULL,
    FOREIGN KEY (nim) REFERENCES mahasiswa(nim),
    FOREIGN KEY (id_admin) REFERENCES admin(id_admin),
    CONSTRAINT ck__status_pengajuan CHECK (status_pengajuan IN ('Rejected', 'Pending', 'Accepted'))
);

-- Tabel notifikasi
CREATE TABLE notifikasi
(
    id_notifikasi INT PRIMARY KEY IDENTITY(1,1) NOT NULL,
    id_admin INT NOT NULL,
    nim CHAR(10) NOT NULL,
    tipe_pengirim VARCHAR(20) NOT NULL,
    pesan TEXT NOT NULL,
    komentar TEXT NULL,
    status_notifikasi VARCHAR(20) NOT NULL DEFAULT 'Unread',
    tanggal_notifikasi DATETIME NOT NULL DEFAULT GETDATE(),
    FOREIGN KEY (id_admin) REFERENCES admin(id_admin),
    FOREIGN KEY (nim) REFERENCES mahasiswa(nim),
    CONSTRAINT ck_notifikasi_status CHECK (status_notifikasi IN ('Unread', 'Read')),
    CONSTRAINT ck_tipe_pengirim CHECK (tipe_pengirim IN ('Teknisi', 'Admin Prodi', 'Admin Jurusan'))
);

-- Tabel pemberitahuan
CREATE TABLE pemberitahuan
(
    id_pemberitahuan INT PRIMARY KEY IDENTITY(1,1) NOT NULL,
    id_super_admin INT NOT NULL,
	tipe VARCHAR(100) NOT NULL,
    judul TEXT NOT NULL,
    isi TEXT NOT NULL,
    FOREIGN KEY (id_super_admin) REFERENCES super_admin(id_super_admin)
);


INSERT INTO super_admin
    (nama, email, password)
VALUES
    ('Dr. Ahmad Supriadi', 'aSupriadi@polinema.ac.id', 'supr1@d1');

INSERT INTO admin
    (nama, email, password, role, id_super_admin)
VALUES
    ('Budi Santoso', 'budiSantoso23@polinema.ac.id', 'BudiS1023', 'Teknisi', 1),
    ('Siti Aminah', 'sitiAminah@polinema.ac.id', 'Amin@h79', 'Admin Prodi', 1),
    ('Rudi Hermawan', 'hermawanRudi@polinema.ac.id', 'h3rMawaN', 'Admin Jurusan', 1);

INSERT INTO mahasiswa
    (nim, nama, program_studi, email, password)
VALUES
    ('2340271532', 'Azka Cahya', 'D-IV Teknik Informatika', 'azka.cahyam@gmail.com', 'azkacahya@94'),
    ('2340271533', 'Hasbi Arridwan', 'D-IV Teknik Informatika', 'hasbi.arridwan@gmail.com', 'arrdwnhasbi4@8'),
    ('2340271534', 'Fahmi Putra', 'D-IV Teknik Informatika', 'fahmi.putra@gmail.com', 'putra128@fm'),
    ('2341271505', 'Regita Ayu', 'D-IV Sistem Informasi Bisnis', 'regita.ayu@gmail.com', 'regitaay15@'),
    ('2341271506', 'Marco Ivano', 'D-IV Sistem Informasi Bisnis', 'marco.ivano@gmail.com', 'rmdhnak12m4l'),
    ('2341271507', 'Sultan Rozan', 'D-IV Sistem Informasi Bisnis', 'sultan.rozan@gmail.com', 'sltnrzn0134'),
    ('2340271535', 'Nadia Aulia', 'D-IV Teknik Informatika', 'nadia.aulia@gmail.com', 'ndaaulya24@t'),
    ('2340271536', 'Fikri Rahman', 'D-IV Teknik Informatika', 'fikri.rahman@gmail.com', 'rahmanf1kri56@f'),
    ('2340271537', 'Rizky Ramadhan', 'D-IV Teknik Informatika', 'rizky.ramadhan@gmail.com', 'ramdhnryzki78@'),
    ('2341271508', 'Dewi Lestari', 'D-IV Sistem Informasi Bisnis', 'dewi.lestari@gmail.com', 'lst3ridewi@90'),
    ('2341271509', 'Bayu Pamungkas', 'D-IV Sistem Informasi Bisnis', 'bayu.pamungkas@gmail.com', 'pamngksbayu@99'),
    ('2341271510', 'Rina Kartika', 'D-IV Sistem Informasi Bisnis', 'rina.kartika@gmail.com', 'kart1karina11@'),
    ('2340271538', 'Adi Nugroho', 'D-IV Teknik Informatika', 'adi.nugroho@gmail.com', 'ad1nugroho82@'),
    ('2340271539', 'Maya Sari', 'D-IV Teknik Informatika', 'maya.sari@gmail.com', 'sar1maya87@'),
    ('2341271511', 'Asep Suhendar', 'D-IV Sistem Informasi Bisnis', 'asep.suhendar@gmail.com', 'suhendaras7p@');

INSERT INTO verifikasi_admin
    (id_admin, nim, tahap_verifikasi, status_verifikasi, tanggal_verifikasi)
VALUES
    (1, '2340271533', 'Teknisi', 'Verified', '2024-10-12'),
    (2, '2340271533', 'Admin Prodi', 'Verified', '2024-10-22'),
    (1, '2340271534', 'Teknisi', 'Verified', '2024-10-13'),
    (2, '2340271534', 'Admin Prodi', 'Pending', '2024-10-23'),
    (1, '2341271505', 'Teknisi', 'Pending', '2024-10-11'),
    (2, '2341271505', 'Admin Prodi', 'Pending', '2024-10-11'),
    (1, '2341271506', 'Teknisi', 'Verified', '2024-10-15'),
    (2, '2341271506', 'Admin Prodi', 'Verified', '2024-10-25'),
    (1, '2341271507', 'Teknisi', 'Pending', '2024-10-16'),
    (2, '2341271507', 'Admin Prodi', 'Pending', '2024-10-16'),
    (1, '2340271535', 'Teknisi', 'Verified', '2024-10-17'),
    (2, '2340271535', 'Admin Prodi', 'Verified', '2024-10-26'),
    (1, '2340271536', 'Teknisi', 'Pending', '2024-10-18'),
    (2, '2340271536', 'Admin Prodi', 'Pending', '2024-10-18'),
    (1, '2340271537', 'Teknisi', 'Verified', '2024-10-19'),
    (2, '2340271537', 'Admin Prodi', 'Pending', '2024-10-19'),
    (1, '2341271508', 'Teknisi', 'Verified', '2024-10-20'),
    (2, '2341271508', 'Admin Prodi', 'Verified', '2024-10-30'),
    (1, '2341271509', 'Teknisi', 'Pending', '2024-10-21'),
    (2, '2341271509', 'Admin Prodi', 'Pending', '2024-10-21'),
    (1, '2341271510', 'Teknisi', 'Verified', '2024-10-22'),
    (2, '2341271510', 'Admin Prodi', 'Verified', '2024-10-31'),
    (1, '2340271538', 'Teknisi', 'Pending', '2024-10-23'),
    (2, '2340271538', 'Admin Prodi', 'Pending', '2024-10-23'),
    (1, '2340271539', 'Teknisi', 'Verified', '2024-10-24'),
    (2, '2340271539', 'Admin Prodi', 'Pending', '2024-10-24'),
    (1, '2341271511', 'Teknisi', 'Pending', '2024-10-25'),
    (2, '2341271511', 'Admin Prodi', 'Pending', '2024-10-25');


INSERT INTO pengajuan_bebas_tanggungan
    (id_admin, nim, tanggal_pengajuan, status_pengajuan)
VALUES
    (3, '2340271535', '2024-10-26', 'Accepted'),
    (3, '2340271536', '2024-10-27', 'Rejected'),
    (3, '2340271537', '2024-10-28', 'Pending'),
    (3, '2341271508', '2024-10-29', 'Accepted'),
    (3, '2341271509', '2024-10-30', 'Pending'),
    (3, '2341271510', '2024-10-31', 'Accepted'),
    (3, '2340271538', '2024-11-01', 'Rejected'),
    (3, '2340271539', '2024-11-02', 'Pending'),
    (3, '2341271511', '2024-11-03', 'Accepted');


INSERT INTO dokumen
    (nim, jenis_dokumen, file_dokumen, tanggal_upload)
VALUES
    ('2340271532', 'Laporan Tugas Akhir/Skripsi', '2340271532_Azka Cahya_Laporan Tugas Akhir/Skripsi.pdf', '2024-10-01'),
    ('2340271532', 'Program/Aplikasi Tugas Akhir/Skripsi', '2340271532_Azka Cahya_Program/Aplikasi Tugas Akhir/Skripsi.zip', '2024-10-02'),
    ('2340271532', 'Surat Pernyataan Publikasi Jurnal', '2340271532_Azka Cahya_Surat Pernyataan Publikasi.pdf', '2024-10-03'),
    ('2340271532', 'Tanda Terima Penyerahan Laporan Tugas Akhir/Skripsi', '2340271532_Azka Cahya_Tanda Terima Penyerahan Laporan Tugas Akhir/Skripsi/Skripsi.pdf', '2024-10-04'),
    ('2340271532', 'Tanda Terima Penyerahan Laporan PKL/Magang', '2340271532_Azka Cahya_Tanda Terima Penyerahan Laporan PKL/Magang.pdf', '2024-10-04'),
    ('2340271532', 'Scan Hasil TOEIC', '2340271532_Azka Cahya_Scan Hasil TOEIC.pdf', '2024-10-05'),
    ('2340271532', 'Surat Bebas Kompen', '2340271532_Azka Cahya_Surat Bebas Kompen.pdf', '2024-10-06'),

    ('2340271533', 'Laporan Tugas Akhir/Skripsi', '2340271533_Hasbi Arridwan_Laporan Tugas Akhir/Skripsi.pdf', '2024-10-01'),
    ('2340271533', 'Program/Aplikasi Tugas Akhir/Skripsi', '2340271533_Hasbi Arridwan_Program/Aplikasi Tugas Akhir/Skripsi.zip', '2024-10-02'),
    ('2340271533', 'Surat Pernyataan Publikasi Jurnal', '2340271533_Hasbi Arridwan_Surat Pernyataan Publikasi.pdf', '2024-10-03'),
    ('2340271533', 'Tanda Terima Penyerahan Laporan Tugas Akhir/Skripsi', '2340271533_Hasbi Arridwan_Tanda Terima Penyerahan Laporan Tugas Akhir/Skripsi/Skripsi.pdf', '2024-10-04'),
    ('2340271533', 'Tanda Terima Penyerahan Laporan PKL/Magang', '2340271533_Hasbi Arridwan_Tanda Terima Penyerahan Laporan PKL/Magang.pdf', '2024-10-04'),
    ('2340271533', 'Scan Hasil TOEIC', '2340271533_Hasbi Arridwan_Scan Hasil TOEIC.pdf', '2024-10-05'),
    ('2340271533', 'Surat Bebas Kompen', '2340271533_Hasbi Arridwan_Surat Bebas Kompen.pdf', '2024-10-06'),

    ('2340271534', 'Laporan Tugas Akhir/Skripsi', '2340271534_Fahmi Putra_Laporan Tugas Akhir/Skripsi.pdf', '2024-10-01'),
    ('2340271534', 'Program/Aplikasi Tugas Akhir/Skripsi', '2340271534_Fahmi Putra_Program/Aplikasi Tugas Akhir/Skripsi.zip', '2024-10-02'),
    ('2340271534', 'Surat Pernyataan Publikasi Jurnal', '2340271534_Fahmi Putra_Surat Pernyataan Publikasi.pdf', '2024-10-03'),
    ('2340271534', 'Tanda Terima Penyerahan Laporan Tugas Akhir/Skripsi', '2340271534_Fahmi Putra_Tanda Terima Penyerahan Laporan Tugas Akhir/Skripsi/Skripsi.pdf', '2024-10-04'),
    ('2340271534', 'Tanda Terima Penyerahan Laporan PKL/Magang', '2340271534_Fahmi Putra_Tanda Terima Penyerahan Laporan PKL/Magang.pdf', '2024-10-04'),
    ('2340271534', 'Scan Hasil TOEIC', '2340271534_Fahmi Putra_Scan Hasil TOEIC.pdf', '2024-10-05'),
    ('2340271534', 'Surat Bebas Kompen', '2340271534_Fahmi Putra_Surat Bebas Kompen.pdf', '2024-10-06'),

    ('2341271505', 'Laporan Tugas Akhir/Skripsi', '2341271505_Regita Ayu_Laporan Tugas Akhir/Skripsi.pdf', '2024-10-01'),
    ('2341271505', 'Program/Aplikasi Tugas Akhir/Skripsi', '2341271505_Regita Ayu_Program/Aplikasi Tugas Akhir/Skripsi.zip', '2024-10-02'),
    ('2341271505', 'Surat Pernyataan Publikasi Jurnal', '2341271505_Regita Ayu_Surat Pernyataan Publikasi.pdf', '2024-10-03'),
    ('2341271505', 'Tanda Terima Penyerahan Laporan Tugas Akhir/Skripsi', '2341271505_Regita Ayu_Tanda Terima Penyerahan Laporan Tugas Akhir/Skripsi/Skripsi.pdf', '2024-10-04'),
    ('2341271505', 'Tanda Terima Penyerahan Laporan PKL/Magang', '2341271505_Regita Ayu_Tanda Terima Penyerahan Laporan PKL/Magang.pdf', '2024-10-04'),
    ('2341271505', 'Scan Hasil TOEIC', '2341271505_Regita Ayu_Scan Hasil TOEIC.pdf', '2024-10-05'),
    ('2341271505', 'Surat Bebas Kompen', '2341271505_Regita Ayu_Surat Bebas Kompen.pdf', '2024-10-06'),

    ('2341271506', 'Laporan Tugas Akhir/Skripsi', '2341271506_Marco Ivano_Laporan Tugas Akhir/Skripsi.pdf', '2024-10-01'),
    ('2341271506', 'Program/Aplikasi Tugas Akhir/Skripsi', '2341271506_Marco Ivano_Program/Aplikasi Tugas Akhir/Skripsi.zip', '2024-10-02'),
    ('2341271506', 'Surat Pernyataan Publikasi Jurnal', '2341271506_Marco Ivano_Surat Pernyataan Publikasi.pdf', '2024-10-03'),
    ('2341271506', 'Tanda Terima Penyerahan Laporan Tugas Akhir/Skripsi', '2341271506_Marco Ivano_Tanda Terima Penyerahan Laporan Tugas Akhir/Skripsi/Skripsi.pdf', '2024-10-04'),
    ('2341271506', 'Tanda Terima Penyerahan Laporan PKL/Magang', '2341271506_Marco Ivano_Tanda Terima Penyerahan Laporan PKL/Magang.pdf', '2024-10-04'),
    ('2341271506', 'Scan Hasil TOEIC', '2341271506_Marco Ivano_Scan Hasil TOEIC.pdf', '2024-10-05'),
    ('2341271506', 'Surat Bebas Kompen', '2341271506_Marco Ivano_Surat Bebas Kompen.pdf', '2024-10-06'),

    ('2341271507', 'Laporan Tugas Akhir/Skripsi', '2341271507_Sultan Rozan_Laporan Tugas Akhir/Skripsi.pdf', '2024-10-01'),
    ('2341271507', 'Program/Aplikasi Tugas Akhir/Skripsi', '2341271507_Sultan Rozan_Program/Aplikasi Tugas Akhir/Skripsi.zip', '2024-10-02'),
    ('2341271507', 'Surat Pernyataan Publikasi Jurnal', '2341271507_Sultan Rozan_Surat Pernyataan Publikasi.pdf', '2024-10-03'),
    ('2341271507', 'Tanda Terima Penyerahan Laporan Tugas Akhir/Skripsi', '2341271507_Sultan Rozan_Tanda Terima Penyerahan Laporan Tugas Akhir/Skripsi/Skripsi.pdf', '2024-10-04'),
    ('2341271507', 'Tanda Terima Penyerahan Laporan PKL/Magang', '2341271507_Sultan Rozan_Tanda Terima Penyerahan Laporan PKL/Magang.pdf', '2024-10-04'),
    ('2341271507', 'Scan Hasil TOEIC', '2341271507_Sultan Rozan_Scan Hasil TOEIC.pdf', '2024-10-05'),
    ('2341271507', 'Surat Bebas Kompen', '2341271507_Sultan Rozan_Surat Bebas Kompen.pdf', '2024-10-06');


-- Aktivitas Login dan Logout
INSERT INTO log_aktivitas_admin
    (id_admin, aktivitas, detail, tanggal_aktivitas)
VALUES
    -- Aktivitas Login
    (1, 'Login', 'Admin Budi Santoso melakukan login ke sistem.', '2024-10-11'),
    (1, 'Login', 'Admin Budi Santoso melakukan login ke sistem.', '2024-10-19'),
    (1, 'Login', 'Admin Budi Santoso melakukan login ke sistem.', '2024-10-20'),
    (2, 'Login', 'Admin Siti Aminah melakukan login ke sistem.', '2024-10-20'),
    (2, 'Login', 'Admin Siti Aminah melakukan login ke sistem.', '2024-10-21'),
    (2, 'Login', 'Admin Siti Aminah melakukan login ke sistem.', '2024-10-27'),
    (3, 'Login', 'Admin Rudi Hermawan melakukan login ke sistem.', '2024-10-27'),

    -- Aktivitas Logout
    (1, 'Logout', 'Admin Budi Santoso melakukan logout dari sistem.', '2024-10-11'),
    (1, 'Logout', 'Admin Budi Santoso melakukan logout dari sistem.', '2024-10-19'),
    (1, 'Logout', 'Admin Budi Santoso melakukan logout dari sistem.', '2024-10-20'),
    (2, 'Logout', 'Admin Siti Aminah melakukan logout dari sistem.', '2024-10-20'),
    (2, 'Logout', 'Admin Siti Aminah melakukan logout dari sistem.', '2024-10-21'),
    (2, 'Logout', 'Admin Siti Aminah melakukan logout dari sistem.', '2024-10-27'),
    (3, 'Logout', 'Admin Rudi Hermawan melakukan logout dari sistem.', '2024-10-27');

INSERT INTO notifikasi
    (id_admin, nim, tipe_pengirim, pesan, komentar, status_notifikasi, tanggal_notifikasi)
VALUES
    (1, '2340271532', 'Teknisi', 'Teknisi telah memverifikasi 3 berkas Anda', NULL, 'Unread', GETDATE()),
    (1, '2340271533', 'Teknisi', 'Teknisi memberikan komentar pada Laporan Tugas Akhir Anda', 'Isi berkas tidak lengkap. Silakan lengkapi sesuai ketentuan', 'Unread', GETDATE()),
    (1, '2340271534', 'Teknisi', 'Teknisi telah memverifikasi 3 berkas Anda', NULL, 'Unread', GETDATE()),
    (1, '2341271505', 'Teknisi', 'Teknisi memberikan komentar pada Laporan Tugas Akhir Anda', 'Isi berkas tidak lengkap. Silakan lengkapi sesuai ketentuan', 'Unread', GETDATE()),
    (2, '2340271532', 'Admin Prodi', 'Admin Prodi telah memverifikasi 4 berkas Anda', NULL, 'Unread', GETDATE()),
    (2, '2340271533', 'Admin Prodi', 'Admin Prodi memberikan komentar pada Laporan Tugas Akhir Anda', 'Isi berkas tidak lengkap. Silakan lengkapi sesuai ketentuan', 'Unread', GETDATE()),
    (3, '2340271534', 'Admin Jurusan', 'Admin Jurusan telah menyetujui pengajuan Anda', NULL, 'Unread', GETDATE()),
    (3, '2341271505', 'Admin Jurusan', 'Admin Jurusan memberikan komentar pada Laporan Tugas Akhir Anda', 'Isi berkas tidak lengkap. Silakan lengkapi sesuai ketentuan', 'Unread', GETDATE());


INSERT INTO pemberitahuan
    (id_super_admin, tipe, judul, isi)
VALUES
    (1, 'Panduan Mahasiswa', 'Panduan Sistem Bebas Tanggungan' , 'Untuk mahasiswa yang telah berhasil lulus Tugas Akhir (Skripsi), berikut adalah prosedur untuk memperoleh Surat Bebas Tanggungan sebagai syarat pengambilan Ijazah, Transkrip, dan SKPI.<br /> <br />  Berkas yang Harus Diupload untuk Verifikasi Teknisi:<br />  1. Laporan Tugas Akhir/Skripsi.<br />  2. Program/Skripsi Aplikasi.<br />  3. Surat Pernyataan untuk Publikasi Jurnal/Makalah/Konferensi/Seminar/HAKI, dll.<br />  <br />  Berkas yang Harus Diupload untuk Verifikasi Admin:<br />  1. Bukti Pengumpulan Laporan Tugas Akhir/Skripsi ke Ruang Baca.<br />  2. Bukti Pengumpulan Laporan PKL/Praktek Kerja Lapangan ke Ruang Baca (jika PKL/Praktek Kerja Lapangan dilakukan lebih dari sekali).<br />  3. Dokumen Bebas Kompen.<br />  4. Scan TOEIC dengan skor minimal 450 untuk Diploma 4 atau sertifikat dari UPA Language Center.'),
    (1, 'Ajukan Verifikasi Teknisi', 'Syarat dan Ketentuan', 'Students are requested to read the following terms and conditions carefully. Ensure that all documents meet the specified format, size, and file type requirements.<br /> <br />  1. Thesis Report : The report must include the Cover, Table of Contents, List of Figures, List of Tables, Preface, Abstract (in both Indonesian and English), Approval (with full signature), Chapter 1 to Conclusion, References, and Appendices (if applicable). Upload in PDF format, signed, with the file name format: “[Name]_[NIM]_Thesis Report.pdf”.<br />  2. Thesis Program/Application : Upload in ZIP or RAR format containing the program or application developed in the Final Project/Thesis, with the file name format: “[Name]_[NIM]_Thesis Application.pdf”.<br />  3. Publication : Publication Statement Letter , upload in PDF format, with the file name format: “[Name]_[NIM]_Publication.pdf”.'),
    (1, 'Ajukan Verifikasi Admin Prodi', 'Syarat dan Ketentuan', 'Mahasiswa diminta untuk membaca syarat dan ketentuan berikut dengan seksama. Pastikan semua dokumen memenuhi persyaratan format, ukuran, dan jenis file yang ditentukan.<br /> <br />  1. Bukti Pengumpulan Laporan Tugas Akhir/Skripsi: Upload dalam format PDF, dengan format nama file: “[Nama]_[NIM]_Bukti Pengumpulan Tugas Akhir.pdf”.<br />  2. Bukti Pengumpulan Laporan PKL/Praktek Kerja Lapangan: Upload dalam format PDF, dengan format nama file: “[Nama]_[NIM]_Bukti Pengumpulan Laporan PKL.pdf”.<br />  3. Bukti Bebas Kompen: Upload dalam format PDF, dengan format nama file: “[Nama]_[NIM]_Bukti Bebas Kompen.pdf”.<br />  4. Scan Sertifikat TOEIC: Upload dalam format PDF, dengan format nama file: “[Nama]_[NIM]_Scan Sertifikat TOEIC.pdf”.');
