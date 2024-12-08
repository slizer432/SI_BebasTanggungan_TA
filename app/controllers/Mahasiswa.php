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
        $this->view('mahasiswa/home', $data);
    }

    public function profil()
    {
        $this->model('Mahasiswa_model')->isLoggedIn();
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
        $data['title'] = 'Admin Submission';
        $data['dokumen'] = $this->model('Mahasiswa_model')->getDokumen();
        $this->view('mahasiswa/pengajuan/upload_adm', $data);
    }

    public function upload_teknisi()
    {
        $this->model('Mahasiswa_model')->isLoggedIn();
        $data = $this->model('Mahasiswa_model')->getData();
        $data['title'] = 'Technician Submission';
        $data['dokumen'] = $this->model('Mahasiswa_model')->getDokumen();
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