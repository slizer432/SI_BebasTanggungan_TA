<?php

class SuperAdmin_model
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function isLoggedIn()
    {
        if (!isset($_SESSION['superAdmin'])) {
            header('Location: ' . BASEURL . '/login');
            exit;
        }
    }

    public function logout()
    {
        session_destroy();
        header('Location: ' . BASEURL . '/login');
        exit;
    }

    public function getData()
    {
        // Mengambil nama, email, dan password dari tabel super_admin dan users
        $this->db->query('
            SELECT super_admin.nip, super_admin.nama, super_admin.email, users.password
            FROM super_admin
            JOIN users ON super_admin.nip = users.username
            WHERE super_admin.nip = :nip;
        ');

        // Binding parameter :nip dengan nilai yang ada di session
        $this->db->bind(':nip', $_SESSION['superAdmin']);

        // Mengembalikan hasil sebagai objek
        return $this->db->single();
    }


    public function getAllMahasiswa()
    {
        $this->db->query('
            SELECT 
                mahasiswa.nim, 
                mahasiswa.nama, 
                mahasiswa.program_studi, 
                mahasiswa.email, 
                mahasiswa.foto_profil, 
                users.password 
            FROM 
                mahasiswa 
            INNER JOIN 
                users 
            ON 
                mahasiswa.nim = users.username;
        ');
        return $this->db->resultSet();
    }


    public function getLog()
    {
        $this->db->query('
        SELECT
        admin.role AS role_admin,
        admin.nama AS nama_admin,
        log_aktivitas_admin.aktivitas,
        log_aktivitas_admin.tanggal_aktivitas
        FROM
        log_aktivitas_admin
        INNER JOIN admin ON log_aktivitas_admin.nip_admin = admin.nip;
        ');
        return $this->db->resultSet();
    }

    public function addMhs()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $nim = $_POST['nim'];
            $nama = $_POST['nama'];
            $major = $_POST['major'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            $this->db->query('INSERT INTO users (username, password, role) VALUES (:username, :password, :role);');
            $this->db->bind(':username', $nim);
            $this->db->bind(':password', $password);
            $this->db->bind(':role', 'Mahasiswa');

            $this->db->execute();

            $this->db->query('INSERT INTO mahasiswa (nim, nama, program_studi, email) VALUES (:nim, :nama, :major, :email);');
            $this->db->bind(':nim', $nim);
            $this->db->bind(':nama', $nama);
            $this->db->bind(':major', $major);
            $this->db->bind(':email', $email);

            $this->db->execute();

            header('Location: ' . BASEURL . '/SuperAdmin/home');
        }
    }

    public function addAdmin()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $sa = $this->getData();

            $role = $_POST['role'];
            $nip = $_POST['nip'];
            $nama = $_POST['nama'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $nipSa = $sa['nip'];

            $this->db->query('INSERT INTO users (username, password, role) VALUES (:username, :password, :role);');
            $this->db->bind(':username', $nip);
            $this->db->bind(':password', $password);
            $this->db->bind(':role', $role);

            $this->db->execute();

            $this->db->query('INSERT INTO admin (nip, nama, email, password, role, nip_super_admin) VALUES (:nip, :nama, :email, :role, :sa);');
            $this->db->bind(':nip', $nip);
            $this->db->bind(':nama', $nama);
            $this->db->bind(':email', $email);
            $this->db->bind(':role', $role);
            $this->db->bind(':sa', $nipSa);

            $this->db->execute();

            header('Location: ' . BASEURL . '/SuperAdmin/home');
        }
    }

    public function getVerif()
    {
        $this->db->query('
        SELECT
            admin.nama AS nama_admin,
            mahasiswa.nama AS nama_mahasiswa,
            verifikasi_admin.status_verifikasi,
            verifikasi_admin.tanggal_verifikasi
        FROM
            verifikasi_admin
            LEFT JOIN admin ON verifikasi_admin.nip_admin = admin.nip
            INNER JOIN mahasiswa ON verifikasi_admin.nim = mahasiswa.nim;
        ');
        return $this->db->resultSet();
    }


    public function edit()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nip = $_POST['nip'];
            $nama = $_POST['nama'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            $this->db->query('UPDATE super_admin SET nama = :nama, email = :email, password = :password WHERE nip = :nip;');
            $this->db->bind(':nip', $nip);
            $this->db->bind(':nama', $nama);
            $this->db->bind(':email', $email);
            $this->db->bind(':password', $password);

            $this->db->execute();

            header('Location: ' . BASEURL . '/SuperAdmin/profil');
        }


    }

    public function getModule()
    {
        $this->db->query('SELECT tipe, judul, isi FROM pemberitahuan WHERE nip_super_admin = :nip;');
        $this->db->bind(':nip', $_SESSION['superAdmin']);
        return $this->db->resultSet();
    }


}
