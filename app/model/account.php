<?php

include 'tools.php';

// function untuk log in mahasiswa
function logInMhs($nim, $password)
{
    global $conn;

    try {
        // mengambil data mahasiswa di database
        $query = "SELECT * FROM Mahasiswa WHERE NIM = :nim";
        $stmt = $conn->prepare($query);
        $stmt->execute(['nim' => $nim]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$user) {
            throw new Exception("User not found.");
        }

        // hash passwor jika belum
        $userPassword = hashPassword($user['Password']);

        // verify NIM dan password
        verify($nim, $password, $userPassword);
    } catch (PDOException $e) {
        // Handle database errors
        echo "Database error: " . $e->getMessage();
    } catch (Exception $e) {
        // Handle other errors
        echo "Error: " . $e->getMessage();
    }
}

// function log in admin
function logInAdmin($email, $password)
{
    global $conn;

    try {
        // mengambil data admin di database
        $query = "SELECT * FROM Admin WHERE Email = :email";
        $stmt = $conn->prepare($query);
        $stmt->execute(['email' => $email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$user) {
            throw new Exception("Admin not found.");
        }

        // hash passwor jika belum
        $userPassword = hashPassword($user['Password']);

        // verify Email dan password
        verify($email, $password, $userPassword);
    } catch (PDOException $e) {
        // Handle database errors
        echo "Database error: " . $e->getMessage();
    } catch (Exception $e) {
        // Handle other errors
        echo "Error: " . $e->getMessage();
    }
}

function registerMhs($nim, $nama, $prodi, $email, $password)
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

function registerAdmin($nama, $email, $password, $role)
{
    global $conn;


    $query = $conn->prepare("INSERT INTO Admin (Nama, Email, Password, Role, ID_Super_Admin) VALUES (:nama, :email, :password, :role, 1)");

    if (cekNama($nama)) {
        $query->execute(['nama' => $nama, 'email' => $email, 'password' => $password, 'role' => $role]);
        header('Location: ../index.php');
    }
    echo 'Admin sudah terdaftar';

}
