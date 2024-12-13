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

    public function terimaVerif($nim)
    {
        $data = $this->getData();
        $nip = $data['nip'];
        $role = $data['role'];
        $this->db->query('UPDATE verifikasi_admin SET nip_admin = :nip, status_verifikasi = :status_verifikasi WHERE nim = :nim AND tahap_verifikasi = :tahap_verifikasi;');
        $this->db->bind(':nip', $nip);
        $this->db->bind(':status_verifikasi', 'Verified');
        $this->db->bind(':nim', $nim);
        $this->db->bind(':tahap_verifikasi', $role);
        $this->db->execute();
        header('Location: ' . BASEURL . '/Admin/home');
    }

    public function tolakVerif()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nim = $_POST['nim'];
            $data = $this->getData();
            $nip = $data['nip'];
            $role = $data['role'];
            switch ($role) {
                case 'Admin Prodi':
                    $this->db->query('UPDATE verifikasi_admin SET status_verifikasi = :status_verifikasi, nip_admin = :nip WHERE tahap_verifikasi = :tahap_verifikasi AND nim = :nim;');
                    $this->db->bind(':status_verifikasi', 'Unverified');
                    $this->db->bind(':tahap_verifikasi', 'Admin Prodi');
                    $this->db->bind(':nip', $nip);
                    $this->db->bind(':nim', $nim);
                    $this->db->execute();

                    $this->db->query("UPDATE dokumen SET komentar = :laporanTA WHERE nim = :nim AND jenis_dokumen = 'ttTugasAkhir';");
                    $this->db->bind(':nim', $nim);
                    $this->db->bind(':laporanTA', $_POST['ttTugasAkhir']);
                    $this->db->execute();

                    $this->db->query("UPDATE dokumen SET komentar = :ttPKLMagang WHERE nim = :nim AND jenis_dokumen = 'ttMagang';");
                    $this->db->bind(':nim', $nim);
                    $this->db->bind(':ttPKLMagang', $_POST['ttMagang']);
                    $this->db->execute();

                    $this->db->query("UPDATE dokumen SET komentar = :kompen WHERE nim = :nim AND jenis_dokumen = 'kompen';");
                    $this->db->bind(':nim', $nim);
                    $this->db->bind(':kompen', $_POST['kompen']);
                    $this->db->execute();

                    $this->db->query("UPDATE dokumen SET komentar = :toeic WHERE nim = :nim AND jenis_dokumen = 'toeic';");
                    $this->db->bind(':nim', $nim);
                    $this->db->bind(':toeic', $_POST['toeic']);
                    $this->db->execute();

                    break;
                case 'Teknisi':
                    $this->db->query('UPDATE verifikasi_admin SET status_verifikasi = :status_verifikasi, nip_admin = :nip WHERE tahap_verifikasi = :tahap_verifikasi AND nim = :nim;');
                    $this->db->bind(':status_verifikasi', 'Unverified');
                    $this->db->bind(':tahap_verifikasi', 'Teknisi');
                    $this->db->bind(':nip', $nip);
                    $this->db->bind(':nim', $nim);
                    $this->db->execute();

                    $this->db->query("UPDATE dokumen SET komentar = :laporanTA WHERE nim = :nim AND jenis_dokumen = 'laporanTugasAkhir';");
                    $this->db->bind(':nim', $nim);
                    $this->db->bind(':laporanTA', $_POST['laporanTA']);
                    $this->db->execute();

                    $this->db->query("UPDATE dokumen SET komentar = :programTA WHERE nim = :nim AND jenis_dokumen = 'tugasAkhir';");
                    $this->db->bind(':nim', $nim);
                    $this->db->bind(':programTA', $_POST['programTA']);
                    $this->db->execute();

                    $this->db->query("UPDATE dokumen SET komentar = :publikasi WHERE nim = :nim AND jenis_dokumen = 'publikasi';");
                    $this->db->bind(':nim', $nim);
                    $this->db->bind(':publikasi', $_POST['publikasi']);
                    $this->db->execute();
                    break;
            }
            header('Location: ' . BASEURL . '/Admin/home');
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

    public function uploadFotoProfil()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'nip' => $_POST['nip'],
                'nama' => $_POST['nama'],
                'email' => $_POST['email'],
                'password' => $_POST['password']
            ];

            // Get current photo from database
            $currentData = $this->getData();
            $data['foto_profil'] = $currentData['foto_profil'];

            // Handle file upload
            if (isset($_FILES['foto_profil']) && $_FILES['foto_profil']['error'] === 0) {
                $fileTmpName = $_FILES['foto_profil']['tmp_name'];
                $fileExt = strtolower(pathinfo($_FILES['foto_profil']['name'], PATHINFO_EXTENSION));
                $fileNameNew = "{$data['nip']}_{$data['nama']}.{$fileExt}";

                $uploadDir = $_SERVER['DOCUMENT_ROOT'] . '/SI_BebasTanggungan_TA/public/image/foto_admin/';
                $fileDestination = $uploadDir . $fileNameNew;

                if (!file_exists($uploadDir)) {
                    mkdir($uploadDir, 0777, true);
                }

                if (move_uploaded_file($fileTmpName, $fileDestination)) {
                    $data['foto_profil'] = $fileNameNew;
                    return $fileNameNew;
                }
            }
            return $data['foto_profil'];
        }
    }

    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $foto = $this->uploadFotoProfil();
            $data = $this->getData();
            $nip = $data['nip'];
            $nama = $_POST['nama'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            // Update tabel admin
            $query1 = "UPDATE admin 
                  SET nama = :nama, 
                      email = :email, 
                      foto_profil = :foto_profil 
                  WHERE nip = :nip";

            $this->db->query($query1);
            $this->db->bind('nip', $nip);
            $this->db->bind('nama', $nama);
            $this->db->bind('email', $email);
            $this->db->bind('foto_profil', $foto);
            $this->db->execute();

            // Update tabel users
            $query2 = "UPDATE users 
                  SET password = :password 
                  WHERE username = :nip";

            $this->db->query($query2);
            $this->db->bind('password', $password);
            $this->db->bind('nip', $nip);
            $this->db->execute();
        }
    }
}