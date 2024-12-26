<?php

class Admin extends Controller
{
    public function index()
    {
        $this->view('not_found');
    }

    public function home()
    {
        $this->model('Admin_model')->isLoggedIn();
        $data = $this->model('Admin_model')->getData();
        $data['mhs'] = $this->model('Admin_model')->getMhs();
        $this->view('admin/lampiran', $data);
    }

    public function profil()
    {
        $this->model('Admin_model')->isLoggedIn();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->model('Admin_model')->update();
            header('Location: ' . BASEURL . '/admin/profil');
            exit;
        }
        $data = $this->model('Admin_model')->getData();
        $this->view('admin/profil', $data);
    }

    public function logout()
    {
        $this->model('Admin_model')->logout();
    }

    public function check($nim)
    {
        $this->model('Admin_model')->isLoggedIn();
        $data = $this->model('Admin_model')->getData();
        $data['mhs'] = $this->model('Admin_model')->getMahasiswaByNim($nim);
        $data['dokumen'] = $this->model('Admin_model')->getDokumenByNim($nim);
        switch ($data['role']) {
            case 'Admin Prodi':
                $this->view('admin/check_admin', $data);
                break;
            case 'Teknisi':
                $this->view('admin/check_teknisi', $data);
                break;
            case 'Admin Jurusan':
                $this->view('admin/check_admin_jurusan', $data);
                break;
        }
    }

    public function edit()
    {
        $this->model('Admin_model')->isLoggedIn();
        $data = $this->model('Admin_model')->getData();
        $this->view('admin/edit', $data);
    }

    public function terimaVerif($nim)
    {
        $this->model('Admin_model')->terimaVerif($nim);
    }

    public function terimaPengajuan($nim)
    {
        $this->model('Admin_model')->terimaPengajuan($nim);
    }

    public function tolakVerif()
    {
        $this->model('Admin_model')->tolakVerif();
    }
}