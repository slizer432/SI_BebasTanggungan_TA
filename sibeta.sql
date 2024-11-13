CREATE DATABASE SIBETA;
GO

USE SIBETA;
GO

-- Tabel Mahasiswa
CREATE TABLE Mahasiswa
(
    NIM CHAR(10) PRIMARY KEY NOT NULL,
    Nama VARCHAR(100) NOT NULL,
    Program_Studi VARCHAR(50) NOT NULL,
    Email VARCHAR(100) UNIQUE NOT NULL,
    Password VARCHAR(100) NOT NULL
);

-- Tabel Super Admin
CREATE TABLE Super_Admin
(
    ID_Super_Admin INT PRIMARY KEY IDENTITY(1,1) NOT NULL,
    Nama VARCHAR(100) NOT NULL,
    Email VARCHAR(100) UNIQUE NOT NULL,
    Password VARCHAR(100) NOT NULL
);

-- Tabel Admin
CREATE TABLE Admin
(
    ID_Admin INT PRIMARY KEY IDENTITY(1,1) NOT NULL,
    Nama VARCHAR(100) NOT NULL,
    Email VARCHAR(100) UNIQUE NOT NULL,
    Password VARCHAR(100) NOT NULL,
    Role VARCHAR(20) NOT NULL,
    ID_Super_Admin INT NOT NULL,
    FOREIGN KEY (ID_Super_Admin) REFERENCES Super_Admin(ID_Super_Admin)
);

-- Tabel Dokumen
CREATE TABLE Dokumen
(
    ID_Dokumen INT PRIMARY KEY IDENTITY(1,1) NOT NULL,
    NIM CHAR(10) NOT NULL,
    Jenis_Dokumen VARCHAR(100) NOT NULL,
    File_Dokumen VARCHAR(255) NOT NULL,
    Tanggal_Upload DATE NOT NULL,
    FOREIGN KEY (NIM) REFERENCES Mahasiswa(NIM)
);


-- Tabel Verifikasi Admin
CREATE TABLE Verifikasi_Admin
(
    ID_Verifikasi_Admin INT PRIMARY KEY IDENTITY(1,1) NOT NULL,
    ID_Admin INT NOT NULL,
    NIM CHAR(10) NOT NULL,
    Status_Verifikasi VARCHAR(20) NOT NULL,
    Tanggal_Verifikasi DATE NOT NULL,
    FOREIGN KEY (ID_Admin) REFERENCES Admin(ID_Admin),
    FOREIGN KEY (NIM) REFERENCES Mahasiswa(NIM)
);

-- Tabel Log Aktivitas Admin
CREATE TABLE Log_Aktivitas_Admin
(
    ID_Log INT PRIMARY KEY IDENTITY(1,1) NOT NULL,
    ID_Admin INT NOT NULL,
    Aktivitas VARCHAR(100) NOT NULL,
    -- Deskripsi aktivitas
    Detail TEXT NULL,
    -- Detail tambahan (opsional)
    Tanggal_Aktivitas DATETIME NOT NULL DEFAULT GETDATE(),
    -- Waktu aktivitas
    FOREIGN KEY (ID_Admin) REFERENCES Admin(ID_Admin)
);

-- Tabel Pengajuan Bebas Tanggungan
CREATE TABLE Pengajuan_Bebas_Tanggungan
(
    ID_Pengajuan INT PRIMARY KEY IDENTITY(1,1) NOT NULL,
    ID_Admin INT NOT NULL,
    -- Referensi ke Admin
    NIM CHAR(10) NOT NULL,
    Tanggal_Pengajuan DATE NOT NULL,
    Status_Pengajuan VARCHAR(20) NOT NULL,
    FOREIGN KEY (NIM) REFERENCES Mahasiswa(NIM),
    FOREIGN KEY (ID_Admin) REFERENCES Admin(ID_Admin)
);



-- Insert data Super Admin
INSERT INTO Super_Admin
    (Nama, Email, Password)
VALUES
    ('Dr. Ahmad Supriadi', 'aSupriadi@polinema.ac.id', 'supr1@d1');

-- Isian tabel Admin

INSERT INTO Admin
    (Nama, Email, Password, Role, ID_Super_Admin)
VALUES
    ('Budi Santoso', 'budiSantoso23@polinema.ac.id', 'BudiS1023', 'Teknisi', 1),
    ('Siti Aminah', 'sitiAminah@polinema.ac.id', 'Amin@h79', 'Admin Prodi', 1),
    ('Rudi Hermawan', 'hermawanRudi@polinema.ac.id', 'h3rMawaN', 'Admin Jurusan', 1);

INSERT INTO Mahasiswa
    (NIM, Nama, Program_Studi, Email, Password)
VALUES
    ('2340271532', 'Azka Cahya', 'D-IV Teknik Informatika', 'azka.cahyam@gmail.com', 'azkacahya@94'),
    ('2340271533', 'Hasbi Arridwan', 'D-IV Teknik Informatika', 'hasbi.arridwan@gmail.com', 'arrdwnhasbi4@8'),
    ('2340271534', 'Fahmi Putra', 'D-IV Teknik Informatika', 'fahmi.putra@gmail.com', 'putra128@fm'),
    ('2341271505', 'Regita Ayu', 'D-IV Sistem Informasi Bisnis', 'regita.ayu@gmail.com', 'regitaay15@'),
    ('2341271506', 'Marco Ivano', 'D-IV Sistem Informasi Bisnis', 'akmal.ramadhan@gmail.com', 'rmdhnak12m4l'),
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


INSERT INTO Verifikasi_Admin
    (ID_Admin, NIM, Status_Verifikasi, Tanggal_Verifikasi)
VALUES
    (1, '2340271532', 'Verified', '20241011'),
    (1, '2340271533', 'Verified', '20241020'),
    (1, '2341271505', 'Pending', '20241011'),
    (1, '2341271506', 'Verified', '20241019'),
    (1, '2341271507', 'Verified', '20241019'),
    (2, '2340271532', 'Verified', '20241021'),
    (2, '2340271533', 'Pending', '20241027'),
    (2, '2341271506', 'Unverified', '20241020'),
    (2, '2341271507', 'Unverified', '20241020'),
    (1, '2340271534', 'Verified', '20241015'),
    (1, '2340271535', 'Pending', '20241017'),
    (1, '2340271536', 'Verified', '20241018'),
    (1, '2341271508', 'Verified', '20241012'),
    (1, '2341271509', 'Unverified', '20241022'),
    (1, '2341271510', 'Verified', '20241025'),
    (2, '2340271534', 'Pending', '20241028'),
    (2, '2340271535', 'Verified', '20241030'),
    (2, '2340271536', 'Unverified', '20241029'),
    (2, '2341271508', 'Pending', '20241030'),
    (2, '2341271509', 'Verified', '20241031'),
    (2, '2341271510', 'Unverified', '20241027');


INSERT INTO Pengajuan_Bebas_Tanggungan
    (ID_Admin, NIM, Tanggal_Pengajuan, Status_Pengajuan)
VALUES
    (3, '2340271532', '20241023', 'Diterima'),
    (3, '2340271533', '20241024', 'Ditolak'),
    (3, '2340271534', '20241025', 'Pending'),
    (3, '2340271535', '20241026', 'Diterima'),
    (3, '2340271536', '20241027', 'Pending'),
    (3, '2341271508', '20241028', 'Diterima'),
    (3, '2341271509', '20241029', 'Ditolak'),
    (3, '2341271510', '20241030', 'Pending'),
    (3, '2340271537', '20241031', 'Diterima'),
    (3, '2340271538', '20241101', 'Pending'),
    (3, '2340271539', '20241102', 'Diterima'),
    (3, '2341271511', '20241103', 'Pending');

INSERT INTO Dokumen (NIM, Jenis_Dokumen, File_Dokumen, Tanggal_Upload)
VALUES
    ('2340271532', 'Laporan Tugas Akhir yang sudah bertanda tangan', 'laporan_akhir_azka.pdf', '2024-10-01'),
    ('2340271532', 'Program/Aplikasi Tugas Akhir/Skripsi', 'program_azka.zip', '2024-10-02'),
    ('2340271532', 'Surat Pernyataan Publikasi Jurnal', 'surat_publikasi_azka.pdf', '2024-10-03'),
    ('2340271532', 'Tanda Terima Penyerahan Laporan Tugas Akhir', 'tanda_terima_akhir_azka.pdf', '2024-10-04'),
    ('2340271532', 'Scan hasil TOEIC', 'toeic_azka.pdf', '2024-10-05'),
    ('2340271532', 'Surat Bebas Kompen', 'bebas_kompen_azka.pdf', '2024-10-06'),

    ('2340271533', 'Laporan Tugas Akhir yang sudah bertanda tangan', 'laporan_akhir_hasbi.pdf', '2024-10-01'),
    ('2340271533', 'Program/Aplikasi Tugas Akhir/Skripsi', 'program_hasbi.zip', '2024-10-02'),
    ('2340271533', 'Surat Pernyataan Publikasi Jurnal', 'surat_publikasi_hasbi.pdf', '2024-10-03'),
    ('2340271533', 'Tanda Terima Penyerahan Laporan Tugas Akhir', 'tanda_terima_akhir_hasbi.pdf', '2024-10-04'),
    ('2340271533', 'Scan hasil TOEIC', 'toeic_hasbi.pdf', '2024-10-05'),
    ('2340271533', 'Surat Bebas Kompen', 'bebas_kompen_hasbi.pdf', '2024-10-06'),

    ('2340271534', 'Laporan Tugas Akhir yang sudah bertanda tangan', 'laporan_akhir_fahmi.pdf', '2024-10-01'),
    ('2340271534', 'Program/Aplikasi Tugas Akhir/Skripsi', 'program_fahmi.zip', '2024-10-02'),
    ('2340271534', 'Surat Pernyataan Publikasi Jurnal', 'surat_publikasi_fahmi.pdf', '2024-10-03'),
    ('2340271534', 'Tanda Terima Penyerahan Laporan Tugas Akhir', 'tanda_terima_akhir_fahmi.pdf', '2024-10-04'),
    ('2340271534', 'Scan hasil TOEIC', 'toeic_fahmi.pdf', '2024-10-05'),
    ('2340271534', 'Surat Bebas Kompen', 'bebas_kompen_fahmi.pdf', '2024-10-06'),

    ('2341271505', 'Laporan Tugas Akhir yang sudah bertanda tangan', 'laporan_akhir_regita.pdf', '2024-10-01'),
    ('2341271505', 'Program/Aplikasi Tugas Akhir/Skripsi', 'program_regita.zip', '2024-10-02'),
    ('2341271505', 'Surat Pernyataan Publikasi Jurnal', 'surat_publikasi_regita.pdf', '2024-10-03'),
    ('2341271505', 'Tanda Terima Penyerahan Laporan Tugas Akhir', 'tanda_terima_akhir_regita.pdf', '2024-10-04'),
    ('2341271505', 'Scan hasil TOEIC', 'toeic_regita.pdf', '2024-10-05'),
    ('2341271505', 'Surat Bebas Kompen', 'bebas_kompen_regita.pdf', '2024-10-06'),

    ('2341271506', 'Laporan Tugas Akhir yang sudah bertanda tangan', 'laporan_akhir_marco.pdf', '2024-10-01'),
    ('2341271506', 'Program/Aplikasi Tugas Akhir/Skripsi', 'program_marco.zip', '2024-10-02'),
    ('2341271506', 'Surat Pernyataan Publikasi Jurnal', 'surat_publikasi_marco.pdf', '2024-10-03'),
    ('2341271506', 'Tanda Terima Penyerahan Laporan Tugas Akhir', 'tanda_terima_akhir_marco.pdf', '2024-10-04'),
    ('2341271506', 'Scan hasil TOEIC', 'toeic_marco.pdf', '2024-10-05'),
    ('2341271506', 'Surat Bebas Kompen', 'bebas_kompen_marco.pdf', '2024-10-06'),

    ('2341271507', 'Laporan Tugas Akhir yang sudah bertanda tangan', 'laporan_akhir_sultan.pdf', '2024-10-01'),
    ('2341271507', 'Program/Aplikasi Tugas Akhir/Skripsi', 'program_sultan.zip', '2024-10-02'),
    ('2341271507', 'Surat Pernyataan Publikasi Jurnal', 'surat_publikasi_sultan.pdf', '2024-10-03'),
    ('2341271507', 'Tanda Terima Penyerahan Laporan Tugas Akhir', 'tanda_terima_akhir_sultan.pdf', '2024-10-04'),
    ('2341271507', 'Scan hasil TOEIC', 'toeic_sultan.pdf', '2024-10-05'),
    ('2341271507', 'Surat Bebas Kompen', 'bebas_kompen_sultan.pdf', '2024-10-06');

    INSERT INTO Log_Aktivitas_Admin (ID_Admin, Aktivitas, Detail, Tanggal_Aktivitas)
VALUES
    -- Aktivitas Login
    (1, 'Login', 'Admin Budi Santoso melakukan login ke sistem.', '20241011'),
    (1, 'Login', 'Admin Budi Santoso melakukan login ke sistem.', '20241019'),
    (1, 'Login', 'Admin Budi Santoso melakukan login ke sistem.', '20241020'),
    (2, 'Login', 'Admin Siti Aminah melakukan login ke sistem.', '20241020'),
    (2, 'Login', 'Admin Siti Aminah melakukan login ke sistem.', '20241021'),
    (2, 'Login', 'Admin Siti Aminah melakukan login ke sistem.', '20241027'),
    (3, 'Login', 'Admin Rudi Hermawan melakukan login ke sistem.', '20241027'),

    -- Aktivitas Logout
    (1, 'Logout', 'Admin Budi Santoso melakukan logout dari sistem.', '20241011'),
    (1, 'Logout', 'Admin Budi Santoso melakukan logout dari sistem.', '20241019'),
    (1, 'Logout', 'Admin Budi Santoso melakukan logout dari sistem.', '20241020'),
    (2, 'Logout', 'Admin Siti Aminah melakukan logout dari sistem.', '20241020'),
    (2, 'Logout', 'Admin Siti Aminah melakukan logout dari sistem.', '20241021'),
    (2, 'Logout', 'Admin Siti Aminah melakukan logout dari sistem.', '20241027'),
    (3, 'Logout', 'Admin Rudi Hermawan melakukan logout dari sistem.', '20241027'),

    -- Aktivitas Verifikasi Dokumen
    (1, 'Verifikasi Dokumen', 'Admin Budi Santoso memverifikasi dokumen milik mahasiswa Azka Cahya.', '20241011'),
    (1, 'Verifikasi Dokumen', 'Admin Budi Santoso memverifikasi sebagian dokumen milik mahasiswa Regita Ayu.', '20241011'),
	(1, 'Verifikasi Dokumen', 'Admin Budi Santoso memverifikasi sebagian dokumen milik mahasiswa Marco Ivano.', '20241019'),
	(1, 'Verifikasi Dokumen', 'Admin Budi Santoso memverifikasi sebagian dokumen milik mahasiswa Sultan Rozan.', '20241019'),
	(1, 'Verifikasi Dokumen', 'Admin Budi Santoso memverifikasi dokumen milik mahasiswa Hasbi Arridwan.', '20241020'),
    (2, 'Verifikasi Dokumen', 'Admin Siti Aminah memverifikasi dokumen milik mahasiswa Azka Cahya.', '20241021'),
    (2, 'Verifikasi Dokumen', 'Admin Siti Aminah memverifikasi sebagian dokumen milik mahasiswa Hasbi Arridwan.', '20241027');




