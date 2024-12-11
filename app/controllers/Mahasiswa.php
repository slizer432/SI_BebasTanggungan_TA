<?php

class Mahasiswa extends Controller
{
    private $data;

    public function index()
    {
        $this->view('not_found');
    }

    public function home()
    {
        $this->model('Mahasiswa_model')->isLoggedIn();
        $data = $this->model('Mahasiswa_model')->getData();
        $data['title'] = 'Home';
        $data['date'] = $this->model('Mahasiswa_model')->getDate();
        $data['verifikasi'] = $this->model('Mahasiswa_model')->getVerifikasi();
        $data['pengajuan'] = $this->model('Mahasiswa_model')->getPengajuan();
        $this->view('mahasiswa/home', $data);
    }

    public function profil()
    {
        $this->model('Mahasiswa_model')->isLoggedIn();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'nim' => $_POST['nim'],
                'nama' => $_POST['nama'],
                'email' => $_POST['email'],
                'password' => $_POST['password'],
                'foto_profil' => null
            ];

            // Get current photo from database
            $currentData = $this->model('Mahasiswa_model')->getData();
            $data['foto_profil'] = $currentData['foto_profil'];

            // Handle file upload
            if (isset($_FILES['foto']) && $_FILES['foto']['error'] === 0) {
                $fileTmpName = $_FILES['foto']['tmp_name'];
                $fileExt = strtolower(pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION));
                $fileNameNew = "{$data['nim']}_{$data['nama']}.{$fileExt}";
                
                $uploadDir = $_SERVER['DOCUMENT_ROOT'] . '/SI_BebasTanggungan_TA/public/image/foto_mahasiswa/';
                $fileDestination = $uploadDir . $fileNameNew;

                if (!file_exists($uploadDir)) {
                    mkdir($uploadDir, 0777, true);
                }

                if (move_uploaded_file($fileTmpName, $fileDestination)) {
                    $data['foto_profil'] = $fileNameNew;
                }
            }

            if ($this->model('Mahasiswa_model')->update($data)) {
                header('Location: ' . BASEURL . '/mahasiswa/profil');
                exit;
            }
        }
        $data = $this->model('Mahasiswa_model')->getData();
        $data['title'] = 'Profile';
        $this->view('mahasiswa/profil', $data);
    }

    public function pengajuan()
    {
        $this->model('Mahasiswa_model')->isLoggedIn();
        $data = $this->model('Mahasiswa_model')->getData();
        $data['title'] = 'File Submission';
        $this->view('mahasiswa/pengajuan', $data);
    }

    public function panduan()
    {
        $this->model('Mahasiswa_model')->isLoggedIn();
        $data = $this->model('Mahasiswa_model')->getData();
        $data['panduan'] = $this->model('Mahasiswa_model')->getGuidline('Panduan Mahasiswa');
        $data['title'] = 'Guideline';
        $this->view('mahasiswa/panduan', $data);
    }

    public function kontak()
    {
        $this->model('Mahasiswa_model')->isLoggedIn();
        $data = $this->model('Mahasiswa_model')->getData();
        $data['title'] = 'Contact';
        $this->view('mahasiswa/kontak', $data);
    }

    public function upload_admin()
    {
        $this->model('Mahasiswa_model')->isLoggedIn();
        $data = $this->model('Mahasiswa_model')->getData();
        $data['terms'] = $this->model('Mahasiswa_model')->getGuidline('Ajukan Verifikasi Admin Prodi');
        $data['title'] = 'Admin Submission';
        $this->model('Mahasiswa_model')->uploadAdmin();
        $this->view('mahasiswa/pengajuan/upload_adm', $data);
    }

    public function upload_teknisi()
    {
        $this->model('Mahasiswa_model')->isLoggedIn();
        $data = $this->model('Mahasiswa_model')->getData();
        $data['terms'] = $this->model('Mahasiswa_model')->getGuidline('Ajukan Verifikasi Teknisi');
        $data['title'] = 'Technician Submission';
        $data['dokumen'] = $this->model('Mahasiswa_model')->uploadTeknisi();
        $this->view('mahasiswa/pengajuan/upload_teknisi', $data);
    }

    public function edit()
    {
        $this->model('Mahasiswa_model')->isLoggedIn();
        $data = $this->model('Mahasiswa_model')->getData();
        $data['title'] = 'Edit Profile';
        $this->view('mahasiswa/edit', $data);
    }

    public function logout()
    {
        $this->model('Mahasiswa_model')->logout();
    }
}