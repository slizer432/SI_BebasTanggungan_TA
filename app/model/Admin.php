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

    function terimaVerif($nim)
    {
        global $conn;

        switch ($this->role) {
            case 'Admin':
                $query = $conn->prepare('UPDATE verifikasi_admin SET status_verifikasi = :status , nip_admin = :nip_admin WHERE nim = :nim AND tahap_verifikasi = Admin');
                $query->execute(['status' => 'Verified', 'nim' => $nim, 'nip_admin' => $this->nip]);

                $query = $conn->prepare('UPDATE dokumen WHERE nim = :nim SET komentar = NULL AND jenis_dokumen IN :jenis_dokumen');
                $query->execute(['nim' => $nim, 'jenis_dokumen' => ['ttTugasAkhir', 'ttMagang', 'kompen', 'toeic']]);


                break;

            case 'Teknisi':
                $query = $conn->prepare('UPDATE verifikasi_admin SET status_verifikasi = :status , nip_admin = :nip_admin WHERE nim = :nim AND tahap_verifikasi = Teknisi');
                $query->execute(['status' => 'Verified', 'nim' => $nim, 'nip_admin' => $this->nip]);

                $query = $conn->prepare('UPDATE dokumen WHERE nim = :nim SET komentar = NULL AND jenis_dokumen IN :jenis_dokumen');
                $query->execute(['nim' => $nim, 'jenis_dokumen' => ['laporanTugasAkhir', 'tugasAkhir', 'publikasi', 'laporanMagang']]);
                break;
        }
        $this->log('verifikasi', $nim);

    }

    function tolakVerif($nim, $komen)
    {
        global $conn;

        switch ($this->role) {
            case 'Admin':
                $query = $conn->prepare('UPDATE verifikasi_admin SET status_verifikasi = :status , nip_admin = :nip_admin WHERE nim = :nim AND tahap_verifikasi = Admin');
                $query->execute(['status' => 'Unverified', 'nim' => $nim, 'nip_admin' => $this->nip]);

                foreach ($komen as $jenis_dokumen => $komentar) {
                    $query = $conn->prepare('UPDATE dokumen SET komentar = :komentar WHERE nim = :nim AND jenis_dokumen = :jenis_dokumen');
                    $query->execute(['nim' => $nim, 'komentar' => $komentar, 'jenis_dokumen' => $jenis_dokumen]);
                }
                break;

            case 'Teknisi':
                $query = $conn->prepare('UPDATE verifikasi_admin SET status_verifikasi = :status , nip_admin = :nip_admin WHERE nim = :nim AND tahap_verifikasi = Teknisi');
                $query->execute(['status' => 'Unverified', 'nim' => $nim, 'nip_admin' => $this->nip]);

                foreach ($komen as $jenis_dokumen => $komentar) {
                    $query = $conn->prepare('UPDATE dokumen SET komentar = :komentar WHERE nim = :nim AND jenis_dokumen = :jenis_dokumen');
                    $query->execute(['nim' => $nim, 'komentar' => $komentar, 'jenis_dokumen' => $jenis_dokumen]);
                }
                break;
        }
        $this->log('tolak', $nim);
    }

    function terimaBebasTanggungan($nim)
    {
        global $conn;

        $query = $conn->prepare('UPDATE pengajuan_bebas_tanggungan SET status = :status WHERE nim = :nim nip_admin = :nip_admin');
        $query->execute(['status' => 'Verified', 'nim' => $nim, 'nip_admin' => $this->nip]);
    }

    function tolakBebasTanggungan($nim)
    {
        global $conn;

        $query = $conn->prepare('UPDATE pengajuan_bebas_tanggungan SET status = :status WHERE nim = :nim nip_admin = :nip_admin');
        $query->execute(['status' => 'Rejected', 'nim' => $nim, 'nip_admin' => $this->nip]);
    }

    public function edit($nama, $email, $password, $nip, $file)
    {
        global $conn;

        // Update the Admin details
        $query = $conn->prepare('UPDATE admin SET nama = :nama, email = :email, password = :password WHERE nip = :nip');
        $query->execute(['nama' => $nama, 'email' => $email, 'password' => $password, 'nip' => $nip]);

        // Handle the photo upload
        $allowedExtensions = ['jpg', 'jpeg', 'png'];
        $fileExt = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        $fileNameNew = "{$nip}_profile.{$fileExt}";

        if (in_array($fileExt, $allowedExtensions)) {
            $this->handlePhotoUpload($file, $allowedExtensions, $fileNameNew);
        } else {
            echo "Invalid file type for profile photo!";
        }
    }

    public function handlePhotoUpload($file, $allowedExtensions, $fileNameNew)
    {
        global $conn;

        $fileTmpName = $file['tmp_name'];
        $fileSize = $file['size'];
        $fileError = $file['error'];

        if (in_array($file['extension'], $allowedExtensions)) {
            if ($fileError === 0) {
                if ($fileSize > 1000000) {
                    return "Your file is too big!";
                } else {
                    $fileDestination = "C:\\laragon\\www\\SI_BebasTanggungan_TA\\uploads\\{$fileNameNew}";

                    if (move_uploaded_file($fileTmpName, $fileDestination)) {
                        $query = $conn->prepare("UPDATE admin SET foto_profil = :foto WHERE nip = :nip");
                        $query->execute(['foto' => $fileNameNew, 'nip' => $this->nip]);
                    }
                }
            }
        }
    }

    public function log($aktivitas, $nim = '')
    {
        global $conn;

        switch ($aktivitas) {
            case 'login':
                $query = $conn->prepare('INSERT INTO log_aktivitas_admin (aktivitas, detail, nip_admin) VALUES (:aktivitas, :detail, :nip_admin)');
                $query->execute(['aktivitas' => $aktivitas, 'detail' => "Admin " . $this->nama . " melakukan login ke sistem.", 'nip_admin' => $this->nip]);
                break;

            case 'logout':
                $query = $conn->prepare('INSERT INTO log_aktivitas_admin (aktivitas, detail, nip_admin) VALUES (:aktivitas, :detail, :nip_admin)');
                $query->execute(['aktivitas' => $aktivitas, 'detail' => "Admin " . $this->nama . " melakukan logout dari sistem.", 'nip_admin' => $this->nip]);
                break;

            case 'verifikasi':
                $query = $conn->prepare('INSERT INTO log_aktivitas_admin (aktivitas, detail, nip_admin) VALUES (:aktivitas, :detail, :nip_admin)');
                $query->execute(['aktivitas' => $aktivitas, 'detail' => "Admin " . $this->nama . " melakukan verifikasi data mahasiswa." . $nim, 'nip_admin' => $this->nip]);
                break;

            case 'tolak':
                $query = $conn->prepare('INSERT INTO log_aktivitas_admin (aktivitas, detail, nip_admin) VALUES (:aktivitas, :detail, :nip_admin)');
                $query->execute(['aktivitas' => $aktivitas, 'detail' => "Admin " . $this->nama . " melakukan tolak data mahasiswa." . $nim, 'nip_admin' => $this->nip]);
                break;
        }
    }

    public function logout()
    {
        session_destroy();
        $this->log('logout');
        header('Location: ../../index.php');
    }
}