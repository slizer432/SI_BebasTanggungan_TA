<?php
require 'config.php';
include_once 'Account.php';

class Mahasiswa extends Account
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
        $this->nama = $data['nama'];
        $this->prodi = $data['program_studi'];
        $this->email = $data['email'];
        $this->password = $data['password'];
    }
    function getData($nim)
    {
        global $conn;

        $query = $conn->prepare('SELECT * FROM mahasiswa WHERE nim = :nim');
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
            $userPassword = $this->hashPassword($this->password);
            var_dump($userPassword);

            // verify NIM dan password
            return $this->verify($this->nim, $this->password, $userPassword);
        } catch (PDOException $e) {
            // Handle database errors
            echo "Database error: " . $e->getMessage();
        } catch (Exception $e) {
            // Handle other errors
            echo "Error: " . $e->getMessage();
        }
    }

    private function handleFileUpload($file, $allowedExtensions, $fileNameNew)
    {
        global $conn;
        $fileTmpName = $file['tmp_name'];
        $fileSize = $file['size'];
        $fileError = $file['error'];

        if (in_array($file['extension'], $allowedExtensions)) {
            if ($fileError === 0) {
                if ($fileSize < 1000000) {
                    $fileDestination = "C:\\laragon\\www\\SI_BebasTanggungan_TA\\uploads\\{$fileNameNew}";

                    if (move_uploaded_file($fileTmpName, $fileDestination)) {
                        $query = $conn->prepare("SELECT COUNT(*) FROM dokumen WHERE nim = :nim AND jenis_dokumen = :jenis_dokumen");
                        $query->execute(['nim' => $this->nim, 'jenis_dokumen' => $file['key']]);
                        $fileExistsInDB = $query->fetchColumn();

                        if ($fileExistsInDB == 0) {
                            $query = $conn->prepare("INSERT INTO dokumen (nim, jenis_dokumen, file_dokumen) VALUES (:nim, :jenis_dokumen, :nama_dokumen)");
                            $query->execute(['nim' => $this->nim, 'jenis_dokumen' => $file['key'], 'nama_dokumen' => $fileNameNew]);
                            return "File uploaded successfully!";
                        } else {
                            return "File uploaded and overwritten, but not inserted into database as it already exists.";
                        }
                    } else {
                        return "There was an error moving your file!";
                    }
                } else {
                    return "Your file is too big!";
                }
            } else {
                return "There was an error uploading your file!";
            }
        } else {
            return "Invalid file extension!";
        }
    }

    function uploadAdmin()
    {
        global $conn;
        $uploadResults = [];
        $allowedExtensions = ['pdf'];

        foreach ($_FILES as $key => $file) {
            $fileExt = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
            $file['extension'] = $fileExt;
            $file['key'] = $key;

            $fileNameNew = match ($key) {
                'ttTugasAkhir' => "{$this->nim}_{$this->nama}_Tanda Terima Penyerahan Laporan Tugas Akhir.{$fileExt}",
                'ttMagang' => "{$this->nim}_{$this->nama}_Tanda Terima Penyerahan Laporan Magang.{$fileExt}",
                'kompen' => "{$this->nim}_{$this->nama}_Surat Bebas Kompen.{$fileExt}",
                'toeic' => "{$this->nim}_{$this->nama}_Scan Hasil TOEIC.{$fileExt}",
                default => null,
            };

            if ($fileNameNew) {
                $uploadResults[$key] = $this->handleFileUpload($file, $allowedExtensions, $fileNameNew);
            } else {
                $uploadResults[$key] = "Invalid file type!";
            }
        }

        foreach ($uploadResults as $key => $result) {
            echo "File {$key}: {$result}<br>";
        }

        $query = $conn->prepare("INSERT INTO verifikasi_admin (nim, tahap_verifikasi, status_verifikasi) VALUES (:nim, :tahap_verifikasi, :status_verifikasi)");
        $query->execute(['nim' => $this->nim, 'tahap_verifikasi' => 'Admin', 'status_verifikasi' => 'Pending']);
    }

    public function uploadTeknisi()
    {
        global $conn;
        $uploadResults = [];

        foreach ($_FILES as $key => $file) {
            $fileExt = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
            $file['extension'] = $fileExt;
            $file['key'] = $key;

            $allowedExtensions = match ($key) {
                'tugasAkhir' => ['zip', 'rar'], // Only allow zip or rar for tugasAkhir
                default => ['pdf'], // All other files must be pdf
            };

            $fileNameNew = match ($key) {
                'laporanTugasAkhir' => "{$this->nim}_{$this->nama}_Laporan Tugas Akhir.{$fileExt}",
                'tugasAkhir' => (in_array($fileExt, $allowedExtensions)) ? "{$this->nim}_{$this->nama}_Aplikasi Tugas Akhir.{$fileExt}" : null,
                'publikasi' => "{$this->nim}_{$this->nama}_Surat Pernyataan Publikasi.{$fileExt}",
                default => null,
            };

            if ($fileNameNew) {
                $uploadResults[$key] = $this->handleFileUpload($file, $allowedExtensions, $fileNameNew);
            } else {
                $uploadResults[$key] = "Invalid file type!";
            }
        }

        foreach ($uploadResults as $key => $result) {
            echo "File {$key}: {$result}<br>";
        }
        $query = $conn->prepare("INSERT INTO verifikasi_admin (nim, tahap_verifikasi, status_verifikasi) VALUES (:nim, :tahap_verifikasi, :status_verifikasi)");
        $query->execute(['nim' => $this->nim, 'tahap_verifikasi' => 'Teknisi', 'status_verifikasi' => 'Pending']);
    }

    public function bebasTanggungan()
    {
        global $conn;

        $query = $conn->prepare('INSERT INTO pengajuan_bebas_tanggungan (nim, status) VALUES (:nim, :status)');
        $query->execute(['nim' => $this->nim, 'status' => 'Pending']);
    }

    public function edit($nama, $email, $password, $nim, $file)
    {
        global $conn;

        // Update the Mahasiswa details
        $query = $conn->prepare('UPDATE Mahasiswa SET Nama = :nama, Email = :email, Password = :password WHERE NIM = :nim');
        $query->execute(['nama' => $nama, 'email' => $email, 'password' => $password, 'nim' => $nim]);

        // Handle the photo upload
        $allowedExtensions = ['jpg', 'jpeg', 'png'];
        $fileExt = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        $fileNameNew = "{$nim}_profile.{$fileExt}";

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
                        $query = $conn->prepare("UPDATE mahasiswa SET foto_profil = :foto WHERE nim = :nim");
                        $query->execute(['foto' => $fileNameNew, 'nim' => $this->nim]);
                    }
                }
            }
        }
    }


}