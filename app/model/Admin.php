<?php

require 'config.php';

class Admin extends Account
{
    private $nip;
    private $nama;
    private $email;
    private $password;
    private $role;
    private $nipSuperAdmin;

    public function __construct($nip)
    {

        $data = $this->getData($nip);

        $this->nip = $nip;
        $this->nama = $data['nama'];
        $this->email = $data['email'];
        $this->password = $data['password'];
        $this->role = $data['role'];
        $this->nipSuperAdmin = $data['nip_super_admin'];

    }

    function getData($nip)
    {
        global $conn;

        $query = $conn->prepare('SELECT * FROM admin WHERE nip = :nip');
        $query->execute(['nip' => $nip]);
        $result = $query->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    function logIn()
    {
        global $conn;

        try {

            if (!$this->nama) {
                throw new Exception("Admin not found.");
            }

            // hash passwor jika belum
            $userPassword = $this->hashPassword($this->password);
            // verify Email dan password
            return $this->verify($this->email, $this->password, $userPassword);

        } catch (PDOException $e) {
            // Handle database errors
            echo "Database error: " . $e->getMessage();
        } catch (Exception $e) {
            // Handle other errors
            echo "Error: " . $e->getMessage();
        }
    }

    function getMahasiswa()
    {
        global $conn;

        $query = $conn->prepare('SELECT * FROM mahasiswa');
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    function terimaVerif()
    {
        global $conn;

        $query = $conn->prepare('UPDATE verifikasi_admin SET status_verifikasi = :status , nip_admin = :nip_admin WHERE nim = :nim');
    }
}