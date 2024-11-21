<?php
require 'config.php';
include 'tools.php';

class Mahasiswa
{

    private $nim;
    private $nama;
    private $prodi;
    private $email;
    private $password;

    public function __construct($nim)
    {
        $data = $this->getData($nim);

        $this->nim = $nim;
        $this->nama = $data['Nama'];
        $this->prodi = $data['Program_Studi'];
        $this->email = $data['Email'];
        $this->password = $data['Password'];
    }
    function getData($nim)
    {
        global $conn;

        $query = $conn->prepare('SELECT * FROM Mahasiswa WHERE Nim = :nim');
        $query->execute(['nim' => $nim]);
        $result = $query->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    function logIn()
    {
        global $conn;

        try {

            if (!$this->nama) {
                throw new Exception("User not found.");
            }

            // hash passwor jika belum
            $userPassword = hashPassword($this->password);
            var_dump($userPassword);

            // verify NIM dan password
            verify($this->nim, $this->password, $userPassword);
        } catch (PDOException $e) {
            // Handle database errors
            echo "Database error: " . $e->getMessage();
        } catch (Exception $e) {
            // Handle other errors
            echo "Error: " . $e->getMessage();
        }
    }

    function register($nim, $nama, $prodi, $email, $password)
    {
        global $conn;

        $query = $conn->prepare("INSERT INTO Mahasiswa (NIM, Nama, Program_Studi, Email, Password) VALUES (:nim, :nama, :prodi, :email, :password)");

        if (cekNim($nim)) {
            $query->execute(['nim' => $nim, 'nama' => $nama, 'prodi' => $prodi, 'email' => $email, 'password' => $password]);
            header('Location: ../index.php');
        } else {
            echo $error = 'NIM sudah terdaftar';
        }


    }
}