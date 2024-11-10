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
    ('2341271507', 'Sultan Rozan', 'D-IV Sistem Informasi Bisnis', 'sultan.rozan@gmail.com', 'sltnrzn0134');

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
    (2, '2341271507', 'Unverified', '20241020');

INSERT INTO Pengajuan_Bebas_Tanggungan
    (ID_Admin, NIM, Tanggal_Pengajuan, Status_Pengajuan)
VALUES
    (3, '2340271532', '20241023', 'Diterima');



