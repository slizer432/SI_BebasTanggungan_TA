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

    public function getDokumen()
    {
        $nim = $_GET['nim'];
        $this->db->query('SELECT * FROM dokumen WHERE nim = :nim');
        $this->db->bind(':nim', $nim);
        return $this->db->resultSet();
    }

    public function terimaVerif()
    {

    }
}