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
        $data = $this->model('Admin_model')->getData();
        $this->view('admin/profil', $data);
    }

    public function logout()
    {
        $this->model('Admin_model')->logout();
    }

    public function check_teknisi($nim)
    {
        $this->model('Admin_model')->isLoggedIn();
        $data = $this->model('Admin_model')->getData();
        $data['mhs'] = $this->model('Admin_model')->getMahasiswaByNim($nim);
        $data['dokumen'] = $this->model('Admin_model')->getDokumenByNim($nim);
        $this->view('admin/check_teknisi', $data);
    }

    public function edit()
    {
        $this->model('Admin_model')->isLoggedIn();
        $data = $this->model('Admin_model')->getData();
        $this->view('admin/edit', $data);
    }

    public function terimaVerif()
    {
        $this->model('Admin_model')->terimaVerif();
    }

    public function tolakVerif()
    {
        $this->model('Admin_model')->tolakVerif();
    }
}