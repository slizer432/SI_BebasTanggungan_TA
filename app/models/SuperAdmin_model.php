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
        $this->db->query('SELECT * FROM super_admin WHERE nip = :nip;');
        $this->db->bind(':nip', $_SESSION['superAdmin']);
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
        $this->db->query('SELECT * FROM log_aktivitas_admin;');
        return $this->db->resultSet();
    }

    public function addMhs()
    {
        if (isset($_POST['nim'])) {

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

            $this->db->query('INSERT INTO mahasiswa (nim, nama, program_studi, email, password) VALUES (:nim, :nama, :major, :email);');
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
        if (isset($_POST['nip'])) {
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
        $this->db->query('SELECT * FROM verifikasi_admin;');
        return $this->db->resultSet();
    }

    public function edit()
    {
        if (isset($_POST['nip'])) {
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
}