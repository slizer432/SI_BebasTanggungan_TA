<?php

require 'config.php';

class Admin
{
    private $id;
    private $nama;
    private $email;
    private $password;
    private $role;
    private $idSuper;

    public function __construct($email)
    {

        $data = $this->getData($email);

        $this->nama = $data['Nama'];
        $this->email = $email;
        $this->password = $data['Password'];
        $this->role = $data['Role'];
        $this->idSuper = $data['ID_Super_Admin'];

    }

    function getData($email)
    {
        global $conn;

        $query = $conn->prepare('SELECT * FROM Admin WHERE Email = :email');
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
            $userPassword = hashPassword($this->password);
            // verify Email dan password
            verify($this->email, $this->password, $userPassword);

        } catch (PDOException $e) {
            // Handle database errors
            echo "Database error: " . $e->getMessage();
        } catch (Exception $e) {
            // Handle other errors
            echo "Error: " . $e->getMessage();
        }
    }

    function register($nama, $email, $password, $role)
    {
        global $conn;

        $query = $conn->prepare("INSERT INTO Admin (Nama, Email, Password, Role, ID_Super_Admin) VALUES (:nama, :email, :password, :role, 1)");

        if (cekNama($nama)) {
            $query->execute(['nama' => $nama, 'email' => $email, 'password' => $password, 'role' => $role]);
            header('Location: ../index.php');
        } else {
            echo $error = 'Nama sudah terdaftar';
        }

    }
}