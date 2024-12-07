<?php

class Mahasiswa_model extends Controller
{

    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getData()
    {
        $this->db->query('SELECT * FROM mahasiswa WHERE nim = :nim');
        $this->db->bind(':nim', $_SESSION['mahasiswa']);
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
}