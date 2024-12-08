<?php

class login_model
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function hashPassword($userPassword)
    {
        if ($userPassword && password_needs_rehash($userPassword, PASSWORD_DEFAULT)) {
            return password_hash($userPassword, PASSWORD_DEFAULT);
        }
        return $userPassword;
    }


    public function login()
    {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $this->db->query('SELECT * FROM users WHERE username = :username');
        $this->db->bind(':username', $username);
        $user = $this->db->single();

        if ($user) {
            if (password_verify($password, $this->hashPassword($user['password']))) {
                switch ($user['role']) {
                    case 'Mahasiswa':
                        header('Location: ' . BASEURL . '/Mahasiswa/home');
                        $_SESSION['mahasiswa'] = $username;
                        exit;

                    case 'Super Admin':
                        header('Location: ' . BASEURL . '/superAdmin/home');
                        $_SESSION['superAdmin'] = $username;
                        exit;

                    case 'Admin Jurusan':
                        header('Location: ' . BASEURL . '/admin/home');
                        $_SESSION['adminJurusan'] = $username;
                        exit;

                    case 'Admin Prodi':
                        header('Location: ' . BASEURL . '/admin/home');
                        $_SESSION['adminProdi'] = $username;
                        exit;

                    case 'Teknisi':
                        header('Location: ' . BASEURL . '/admin/home');
                        $_SESSION['teknisi'] = $username;
                        exit;
                }
            }
        } else {
            header('Location: ' . BASEURL . '/');
            exit;
        }
        header('Location: ' . BASEURL . '/');
        exit;
    }
}