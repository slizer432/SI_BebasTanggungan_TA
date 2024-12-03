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
}