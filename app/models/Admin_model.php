<?php

class Admin_model
{
    private $db;
    public function __construct()
    {
        $this->db = new Database();
    }

    public function logout()
    {
        session_destroy();
        header('Location: ' . BASEURL . '/login');
    }

    public function isLoggedIn()
    {
        if (!isset($_SESSION['admin'])) {
            header('Location: ' . BASEURL . '/login');
            exit;
        }
    }

    public function getData()
    {
        // Mengambil semua data mahasiswa dan password dari tabel users
        $this->db->query('
            SELECT admin.*, users.password 
            FROM admin
            JOIN users ON admin.nip = users.username
            WHERE admin.nip = :nip
        ');

        // Mengikat parameter :nim dengan nilai yang ada di session
        $this->db->bind(':nip', $_SESSION['admin']);

        // Mengembalikan hasil sebagai objek
        return $this->db->single();
    }

    public function getMhs()
    {
        $data = $this->getData();
        $role = $data['role'];

        switch ($role) {
            case 'Admin Prodi':
                $this->db->query(
                    "SELECT 
                                mahasiswa.nim,
                                mahasiswa.nama,
                                verifikasi_admin.tanggal_verifikasi,
                                verifikasi_admin.status_verifikasi
                            FROM 
                                mahasiswa
                            INNER JOIN 
                                verifikasi_admin 
                            ON 
                                mahasiswa.nim = verifikasi_admin.nim
                            WHERE
	                            verifikasi_admin.tahap_verifikasi = 'Admin Prodi';"
                );
                return $this->db->resultSet();

            case 'Teknisi':
                $this->db->query(
                    "SELECT 
                        mahasiswa.nim,
                        mahasiswa.nama,
                        verifikasi_admin.tanggal_verifikasi,
                        verifikasi_admin.status_verifikasi
                    FROM 
                        mahasiswa
                    INNER JOIN 
                        verifikasi_admin 
                    ON 
                        mahasiswa.nim = verifikasi_admin.nim
                    WHERE
                        verifikasi_admin.tahap_verifikasi = 'Teknisi'
                    ;"
                );
                return $this->db->resultSet();
        }
    }

    public function edit()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nip = $_POST['nip'];
            $nama = $_POST['nama'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            $this->db->query('UPDATE admin SET nama = :nama, email = :email, password = :password WHERE nip = :nip;');
            $this->db->bind(':nip', $nip);
            $this->db->bind(':nama', $nama);
            $this->db->bind(':email', $email);
            $this->db->bind(':password', $password);
            $this->db->execute();

            header('Location: ' . BASEURL . '/Admin/home');
        }
    }

    public function terimaVerif()
    {
        $nim = $_GET['nim'];
        $data = $this->getData();
        $role = $data['role'];
        $this->db->query('UPDATE verifikasi_admin SET status_verifikasi = :status_verifikasi WHERE nim = :nim, tahap_verifikasi = :tahap_verifikasi;');
        $this->db->bind(':status_verifikasi', 'Verified');
        $this->db->bind(':nim', $nim);
        $this->db->bind(':tahap_verifikasi', $role);
        $this->db->execute();
        header('Location: ' . BASEURL . '/Admin/lampiran');
    }

    public function tolakVerif()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nim = $_POST['nim'];
            $data = $this->getData();
            $role = $data['role'];
            switch ($role) {
                case 'Admin Prodi':
                    $this->db->query('UPDATE verifikasi_admin SET status_verifikasi = :status_verifikasi, tahap_verifikasi = :tahap_verifikasi WHERE nim = :nim;');
                    $this->db->bind(':status_verifikasi', 'Unverified');
                    $this->db->bind(':tahap_verifikasi', 'Teknisi');
                    $this->db->bind(':nim', $nim);
                    $this->db->execute();

                    $this->db->query("UPDATE dokumen
                        SET komentar = CASE 
                        WHEN nim = :nim AND jenis_dokumen = 'Tanda Terima Penyerahan Laporan Tugas Akhir/Skripsi' THEN :ttTugasAkhir
                        WHEN nim = :nim AND jenis_dokumen = 'Tanda Terima Penyerahan Laporan PKL/Magang' THEN :ttPKLMagang
                        WHEN nim = :nim AND jenis_dokumen = 'Surat Bebas Kompen' THEN :kompen             
                        WHEN nim = :nim AND jenis_dokumen = 'Scan Hasil TOEIC' THEN :toeic
                            ELSE komentar -- Tetap gunakan nilai lama jika tidak ada kondisi yang sesuai
                        END
                        WHERE nim IN ('2340271532', '2341271506');
                        ");

                    $this->db->bind(':nim', $nim);
                    $this->db->bind(':laporanTA', $_POST['laporanTA']);
                    $this->db->bind(':programTA', $_POST['programTA']);
                    $this->db->bind(':publikasi', $_POST['publikasi']);
                    $this->db->execute();
                    break;
                case 'Teknisi':
                    $this->db->query('UPDATE verifikasi_admin SET status_verifikasi = :status_verifikasi, tahap_verifikasi = :tahap_verifikasi WHERE nim = :nim;');
                    $this->db->bind(':status_verifikasi', 'Rejected');
                    $this->db->bind(':tahap_verifikasi', 'Admin Prodi');
                    $this->db->bind(':nim', $nim);
                    $this->db->execute();

                    $this->db->query("UPDATE dokumen
                        SET komentar = CASE 
                    WHEN nim = :nim AND jenis_dokumen = 'Laporan Tugas Akhir/Skripsi' THEN :laporanTA
                    WHEN nim = :nim AND jenis_dokumen = 'Program/Aplikasi Tugas Akhir/Skripsi' THEN :programTA
                    WHEN nim = :nim AND jenis_dokumen = 'Surat Pernyataan Publikasi Jurnal' THEN :publikasi                            -- Tambahkan kondisi lain sesuai kebutuhan
                            ELSE komentar -- Tetap gunakan nilai lama jika tidak ada kondisi yang sesuai
                        END
                        WHERE nim IN ('2340271532', '2341271506');
                        ");
                    break;
            }
            header('Location: ' . BASEURL . '/Admin/lampiran');
        }
    }

    public function getStatus()
    {
        $this->db->query('SELECT * FROM verifikasi_admin');
        return $this->db->resultSet();
    }

    public function searchMahasiswa($keyword)
    {
        $this->db->query('SELECT * FROM mahasiswa WHERE nim LIKE :keyword OR nama LIKE :keyword');
        $this->db->bind(':keyword', '%' . $keyword . '%');
        return $this->db->resultSet();
    }   

    public function getMahasiswaByNim($nim)
    {
        $this->db->query('SELECT * FROM mahasiswa WHERE nim = :nim');
        $this->db->bind('nim', $nim);
        return $this->db->single();
    }

    public function getDokumenByNim($nim)
    {
        $this->db->query('SELECT * FROM dokumen WHERE nim = :nim');
        $this->db->bind(':nim', $nim);
        return $this->db->resultSet();
    }
}   