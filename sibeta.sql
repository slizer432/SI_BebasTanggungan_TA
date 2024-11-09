-- Membuat database
CREATE DATABASE SIBETA;
GO

-- Menggunakan database yang baru saja dibuat
USE SIBETA;
GO

-- Tabel Mahasiswa
CREATE TABLE Mahasiswa (
    NIM CHAR(10) PRIMARY KEY NOT NULL,
    Nama VARCHAR(100) NOT NULL,
    Program_Studi VARCHAR(50) NOT NULL,
    Email VARCHAR(100) UNIQUE NOT NULL,
    Password VARCHAR(100) NOT NULL
);

-- Tabel Super Admin
CREATE TABLE Super_Admin (
    ID_Super_Admin INT PRIMARY KEY IDENTITY(1,1) NOT NULL,
    Nama VARCHAR(100) NOT NULL,
    Email VARCHAR(100) UNIQUE NOT NULL,
    Password VARCHAR(100) NOT NULL
);

-- Tabel Teknisi
CREATE TABLE Admin (
    ID_Admin INT PRIMARY KEY IDENTITY(1,1) NOT NULL,
    Nama VARCHAR(100) NOT NULL,
    Email VARCHAR(100) UNIQUE NOT NULL,
    Password VARCHAR(100) NOT NULL,
	Role VARCHAR(20) NOT NULL,
    ID_Super_Admin INT NOT NULL,
    FOREIGN KEY (ID_Super_Admin) REFERENCES Super_Admin(ID_Super_Admin)
);

-- Tabel Dokumen
CREATE TABLE Dokumen (
    ID_Dokumen INT PRIMARY KEY IDENTITY(1,1) NOT NULL,
    NIM CHAR(10) NOT NULL,
    Jenis_Dokumen VARCHAR(100) NOT NULL,
    File_Dokumen VARCHAR(255) NOT NULL,
    Tanggal_Upload DATE NOT NULL,
    FOREIGN KEY (NIM) REFERENCES Mahasiswa(NIM)
);


-- Tabel Verifikasi Teknisi
CREATE TABLE Verifikasi_Admin (
    ID_Verifikasi_Admin INT PRIMARY KEY IDENTITY(1,1) NOT NULL,
    ID_Admin INT NOT NULL,
	 NIM CHAR(10) NOT NULL,
    Status_Verifikasi VARCHAR(20) NOT NULL,
    Tanggal_Verifikasi DATE NOT NULL,
    FOREIGN KEY (ID_Admin) REFERENCES Admin(ID_Admin),
	FOREIGN KEY (NIM) REFERENCES Mahasiswa(NIM)
);

-- Tabel Log Aktivitas Admin Prodi
CREATE TABLE Log_Aktivitas_Admin (
    ID_Log INT PRIMARY KEY IDENTITY(1,1) NOT NULL,
    ID_Admin INT NOT NULL, -- Referensi ke Admin_Prodi
    Aktivitas VARCHAR(100) NOT NULL, -- Deskripsi aktivitas
    Detail TEXT NULL, -- Detail tambahan (opsional)
    Tanggal_Aktivitas DATETIME NOT NULL DEFAULT GETDATE(), -- Waktu aktivitas
    FOREIGN KEY (ID_Admin) REFERENCES Admin(ID_Admin)
);

-- Tabel Pengajuan Bebas Tanggungan
CREATE TABLE Pengajuan_Bebas_Tanggungan (
    ID_Pengajuan INT PRIMARY KEY IDENTITY(1,1) NOT NULL,
	ID_Admin INT NOT NULL, -- Referensi ke Admin_Prodi
    NIM CHAR(10) NOT NULL,
    Tanggal_Pengajuan DATE NOT NULL,
    Status_Pengajuan VARCHAR(20) NOT NULL,
    FOREIGN KEY (NIM) REFERENCES Mahasiswa(NIM),
	FOREIGN KEY (ID_Admin) REFERENCES Admin(ID_Admin)
);





