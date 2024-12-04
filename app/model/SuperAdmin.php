<?php

require 'config.php';
include_once 'Account.php';

class SuperAdmin extends Account
{

    private $nip;
    private $nama;
    private $email;
    private $password;

    public function __construct($nip)
    {
        $data = $this->getData($nip);

        $this->nip = $nip;
        $this->nama = $data['nama'];
        $this->email = $data['email'];
        $this->password = $data['password'];
    }

    function getData($nip)
    {
        global $conn;

        $query = $conn->prepare('SELECT * FROM super_admin WHERE nip = :nip');
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

    function registerAdmin($nip, $nama, $email, $password, $role)
    {
        global $conn;

        $query = $conn->prepare("INSERT INTO admin (nip, nama, email, password, role, nip_super_admin) VALUES (:nip, :nama, :email, :password, :role, 123456789012345678)");

        if ($this->cekEmail($email)) {
            $query->execute(['nip' => $nip, 'nama' => $nama, 'email' => $email, 'password' => $password, 'role' => $role]);
            header('Location: ../view/homeSuperAdmin.php');
        } else {
            echo $error = 'Nama sudah terdaftar';
        }

    }

    function registerMhs($nim, $nama, $prodi, $email, $password)
    {
        global $conn;

        $query = $conn->prepare("INSERT INTO mahasiswa (nim, nama, program_studi, email, password) VALUES (:nim, :nama, :prodi, :email, :password)");

        if ($this->cekNim($nim)) {
            $query->execute(['nim' => $nim, 'nama' => $nama, 'prodi' => $prodi, 'email' => $email, 'password' => $password]);
            header('Location: ../view/homeSuperAdmin.php');
        } else {
            echo $error = 'NIM sudah terdaftar';
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

    function getAdmin()
    {
        global $conn;

        $query = $conn->prepare('SELECT * FROM admin');
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    function delete($role, $user)
    {
        global $conn;

        switch ($role) {
            case 'admin':
                $query = $conn->prepare("DELETE FROM admin WHERE nip = :nip");
                $query->execute(['nip' => $user]);
                var_dump($user);
                break;

            case 'mahasiswa':
                $query = $conn->prepare("DELETE FROM mahasiswa WHERE nim = :user");
                $query->execute(['user' => $user]);
                break;
        }
    }

    function getLogActivity()
    {
        global $conn;

        $query = $conn->prepare('SELECT * FROM log_aktivitas_admin WHERE aktivitas IN ("Login", "Logout")');
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    function getVerifActivity()
    {
        global $conn;

        $query = $conn->prepare('SELECT * FROM log_aktivitas_admin WHERE aktivitas = "Verifikasi"');
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
    }
}