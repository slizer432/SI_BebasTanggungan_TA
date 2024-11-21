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
            return verify($this->nim, $this->password, $userPassword);
        } catch (PDOException $e) {
            // Handle database errors
            echo "Database error: " . $e->getMessage();
        } catch (Exception $e) {
            // Handle other errors
            echo "Error: " . $e->getMessage();
        }
    }

    function pengajuanVerif()
    {

    }
}