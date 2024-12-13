<?php

class Mahasiswa_model
{

    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getData()
    {
        // Mengambil semua data mahasiswa dan password dari tabel users
        $this->db->query('
            SELECT mahasiswa.*, users.password 
            FROM mahasiswa
            JOIN users ON mahasiswa.nim = users.username
            WHERE mahasiswa.nim = :nim
        ');

        // Mengikat parameter :nim dengan nilai yang ada di session
        $this->db->bind(':nim', $_SESSION['mahasiswa']);

        // Mengembalikan hasil sebagai objek
        return $this->db->single();
    }


    public function getDokumen()
    {
        $this->db->query('SELECT * FROM dokumen WHERE nim = :nim');
        $this->db->bind(':nim', $_SESSION['mahasiswa']);
        return $this->db->resultSet();
    }

    public function logout()
    {
        session_destroy();
        header('Location: ' . BASEURL . '/login');
        exit;
    }

    public function isLoggedIn()
    {
        if (!isset($_SESSION['mahasiswa'])) {
            header('Location: ' . BASEURL . '/login');
            exit;
        }
    }

    public function getDate()
    {
        date_default_timezone_set('Asia/Jakarta');
        $day = date('l'); // Day of the week (e.g., Sunday, Monday)
        $date = date('d'); // Day of the month (e.g., 01, 02, ... 31)
        $month = date('F'); // Full month name (e.g., January, February)
        $year = date('Y'); // Year in 4 digits (e.g., 2024)

        return "$day, $month $date, $year";
    }

    public function getGuidline($tipe)
    {
        $this->db->query('SELECT * FROM pemberitahuan WHERE tipe = :tipe');
        $this->db->bind(':tipe', $tipe);
        return $this->db->single();
    }

    public function getVerifikasi()
    {
        $this->db->query('SELECT * FROM verifikasi_admin WHERE nim = :nim');
        $this->db->bind(':nim', $_SESSION['mahasiswa']);
        return $this->db->resultSet();
    }

    private function handleFileUpload($file, $fileNameNew, $role)
    {
        $data = $this->getData();
        $nim = $data['nim'];
        $fileTmpName = $file['tmp_name'];
        $fileSize = $file['size'];
        $fileError = $file['error'];

        if ($fileError === 0) {
            if ($fileSize < 1000000) {
                $fileDestination = __DIR__ . '/../../public/uploads/' . $fileNameNew;

                if (move_uploaded_file($fileTmpName, $fileDestination)) {
                    $this->db->query("SELECT COUNT(*) FROM dokumen WHERE nim = :nim AND jenis_dokumen = :jenis_dokumen");
                    $this->db->bind(':nim', $nim);
                    $this->db->bind(':jenis_dokumen', $file['key']);
                    $fileExistsInDB = $this->db->column();

                    if ($fileExistsInDB == 0) {
                        $this->db->query("INSERT INTO dokumen (nim, jenis_dokumen, file_dokumen) VALUES (:nim, :jenis_dokumen, :nama_dokumen)");
                        $this->db->bind(':nim', $nim);
                        $this->db->bind(':jenis_dokumen', $file['key']);
                        $this->db->bind(':nama_dokumen', $fileNameNew);
                        $this->db->execute();

                    }

                    // Check if verification data already exists
                    $this->db->query("SELECT COUNT(*) FROM verifikasi_admin WHERE nim = :nim AND tahap_verifikasi = :tahap_verifikasi");
                    $this->db->bind(':nim', $nim);
                    $this->db->bind(':tahap_verifikasi', $role);
                    $verifExistsInDB = $this->db->column();

                    if ($verifExistsInDB == 0) {
                        $this->db->query("INSERT INTO verifikasi_admin (nim, tahap_verifikasi, status_verifikasi) VALUES (:nim, :tahap_verifikasi, :status_verifikasi)");
                        $this->db->bind(':nim', $nim);
                        $this->db->bind(':tahap_verifikasi', $role);
                        $this->db->bind(':status_verifikasi', 'Pending');
                        $this->db->execute();
                    }

                    $this->db->query("UPDATE verifikasi_admin SET status_verifikasi = :status_verifikasi WHERE nim = :nim AND tahap_verifikasi = :tahap_verifikasi;");
                    $this->db->bind(':status_verifikasi', 'Pending');
                    $this->db->bind(':nim', $nim);
                    $this->db->bind(':tahap_verifikasi', $role);
                    $this->db->execute();

                    return "File uploaded successfully!";
                } else {
                    return "There was an error moving your file!";
                }
            } else {
                return "Your file is too big!";
            }
        } else {
            return "There was an error uploading your file!";
        }
    }




    function uploadAdmin()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = $this->getData();
            $nim = $data['nim'];
            $nama = $data['nama'];
            $uploadResults = [];

            foreach ($_FILES as $key => $file) {
                $fileExt = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
                $file['key'] = $key;

                $fileNameNew = match ($key) {
                    'ttTugasAkhir' => "{$nim}_{$nama}_Tanda Terima Penyerahan Laporan Tugas Akhir.{$fileExt}",
                    'ttMagang' => "{$nim}_{$nama}_Tanda Terima Penyerahan Laporan Magang.{$fileExt}",
                    'kompen' => "{$nim}_{$nama}_Surat Bebas Kompen.{$fileExt}",
                    'toeic' => "{$nim}_{$nama}_Scan Hasil TOEIC.{$fileExt}",
                    default => null,
                };

                if ($fileNameNew) {
                    $uploadResults[$key] = $this->handleFileUpload($file, $fileNameNew, 'Admin Prodi');
                } else {
                    $uploadResults[$key] = "Invalid file type!";
                }
            }

            foreach ($uploadResults as $key => $result) {
                echo "File {$key}: {$result}<br>";
            }
            header('Location: ' . BASEURL . '/mahasiswa/pengajuan');
        }
    }


    public function uploadTeknisi()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = $this->getData();
            $nim = $data['nim'];
            $nama = $data['nama'];
            $uploadResults = [];

            foreach ($_FILES as $key => $file) {
                $fileExt = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
                $file['key'] = $key;

                $fileNameNew = match ($key) {
                    'laporanTugasAkhir' => "{$nim}_{$nama}_Laporan Tugas Akhir.{$fileExt}",
                    'tugasAkhir' => "{$nim}_{$nama}_Aplikasi Tugas Akhir.{$fileExt}",
                    'publikasi' => "{$nim}_{$nama}_Surat Pernyataan Publikasi.{$fileExt}",
                    default => null,
                };

                if ($fileNameNew) {
                    $uploadResults[$key] = $this->handleFileUpload($file, $fileNameNew, 'Teknisi');
                } else {
                    $uploadResults[$key] = "Invalid file type!";
                }
            }

            foreach ($uploadResults as $key => $result) {
                echo "File {$key}: {$result}<br>";
            }
            header('Location: ' . BASEURL . '/mahasiswa/pengajuan');
        }
    }


    public function getPengajuan()
    {
        $this->db->query('SELECT status_pengajuan FROM pengajuan_bebas_tanggungan WHERE nim = :nim');
        $this->db->bind(':nim', $_SESSION['mahasiswa']);
        return $this->db->single();
    }

    public function uploadFotoProfil()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'nim' => $_POST['nim'],
                'nama' => $_POST['nama'],
                'email' => $_POST['email'],
                'password' => $_POST['password'],
                'foto_profil' => null
            ];

            // Get current photo from database
            $currentData = $this->getData();
            $data['foto_profil'] = $currentData['foto_profil'];

            // Handle file upload
            if (isset($_FILES['foto']) && $_FILES['foto']['error'] === 0) {
                $fileTmpName = $_FILES['foto']['tmp_name'];
                $fileExt = strtolower(pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION));
                $fileNameNew = "{$data['nim']}_{$data['nama']}.{$fileExt}";

                $uploadDir = $_SERVER['DOCUMENT_ROOT'] . '/SI_BebasTanggungan_TA/public/image/foto_mahasiswa/';
                $fileDestination = $uploadDir . $fileNameNew;

                if (!file_exists($uploadDir)) {
                    mkdir($uploadDir, 0777, true);
                }

                if (move_uploaded_file($fileTmpName, $fileDestination)) {
                    $data['foto_profil'] = $fileNameNew;
                    return $fileNameNew;
                }
            }
        }
    }

    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $foto = $this->uploadFotoProfil();
            $data = $this->getData();
            $nim = $data['nim'];
            $nama = $_POST['nama'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            // Update tabel mahasiswa
            $query1 = "UPDATE mahasiswa 
                  SET nama = :nama, 
                      email = :email, 
                      foto_profil = :foto_profil 
                  WHERE nim = :nim";

            $this->db->query($query1);
            $this->db->bind('nim', $nim);
            $this->db->bind('nama', $nama);
            $this->db->bind('email', $email);
            $this->db->bind('foto_profil', $foto);
            $this->db->execute();

            // Update tabel users
            $query2 = "UPDATE users 
                  SET password = :password 
                  WHERE username = :nim";

            $this->db->query($query2);
            $this->db->bind('password', $password);
            $this->db->bind('nim', $nim);
            $this->db->execute();

        }
    }

    public function applyBebas()
    {
        $data = $this->getData();
        $nim = $data['nim'];
        $this->db->query('INSERT INTO pengajuan_bebas_tanggungan (nim, status_pengajuan, tanggal_pengajuan) VALUES (:nim, :status, GETDATE());');
        $this->db->bind(':nim', $nim);
        $this->db->bind(':status', 'Pending');
        $this->db->execute();
        header('Location: ' . BASEURL . '/mahasiswa/home');
    }
}