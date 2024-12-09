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
    
        return "$day, $month $date $year";
    }

    public function getGuidline($tipe)
    {
        $this->db->query('SELECT * FROM pemberitahuan WHERE tipe = :tipe');
        $this->db->bind(':tipe', $tipe);
        return $this->db->single();
    }
    
}