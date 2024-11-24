<?php

require 'config.php';
include_once 'Account.php';

class SuperAdmin extends Account
{

    private $id;
    private $nama;
    private $email;
    private $password;

    public function __construct($email)
    {
        $data = $this->getData($email);

        $this->nama = $data['Nama'];
        $this->email = $email;
        $this->password = $data['Password'];
    }

    function getData($email)
    {
        global $conn;

        $query = $conn->prepare('SELECT * FROM Super_Admin WHERE Email = :email');
        $query->execute(['email' => $email]);
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

    function registerAdmin($nama, $email, $password, $role)
    {
        global $conn;

        $query = $conn->prepare("INSERT INTO Admin (Nama, Email, Password, Role, ID_Super_Admin) VALUES (:nama, :email, :password, :role, 1)");

        if ($this->cekEmail($email)) {
            $query->execute(['nama' => $nama, 'email' => $email, 'password' => $password, 'role' => $role]);
            header('Location: ../view/homeSuperAdmin.php');
        } else {
            echo $error = 'Nama sudah terdaftar';
        }

    }

    function registerMhs($nim, $nama, $prodi, $email, $password)
    {
        global $conn;

        $query = $conn->prepare("INSERT INTO Mahasiswa (NIM, Nama, Program_Studi, Email, Password) VALUES (:nim, :nama, :prodi, :email, :password)");

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

        $query = $conn->prepare('SELECT * FROM Mahasiswa');
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    function getAdmin()
    {
        global $conn;

        $query = $conn->prepare('SELECT * FROM Admin');
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    function delete($role, $user)
    {
        global $conn;

        switch ($role) {
            case 'admin':
                $query = $conn->prepare("DELETE FROM Admin WHERE Email = :user");
                $query->execute(['user' => $user]);
                var_dump($user);
                break;

            case 'mahasiswa':
                $query = $conn->prepare("DELETE FROM Mahasiswa WHERE NIM = :user");
                $query->execute(['user' => $user]);
                break;
        }
    }
}